<?php
namespace App\Libraries\Bridge;

use App\Auth\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

final class Api
{
    public static $testActor = null;
    public static bool $disableThrottle = false;
    private static ?array $routes = null;
    public static function routes(): array { return self::$routes ??= require app_path('Config/ApiContracts.php'); }
    public static function route(int $index): array { return self::routes()[$index] ?? throw new \OutOfBoundsException('Unknown route.'); }

    public static function begin(Request $request): void
    {
        Runtime::$httpRequest = true;
        Runtime::setRequest($request);
        app('auth')->logout();
        $actor = null;
        if (app()->environment('testing') && self::$testActor !== null) {
            $actor = self::$testActor;
        } elseif ($plain = $request->bearerToken()) {
            $token = AccessToken::resolve($plain);
            $owner = $token?->tokenable;
            if (($owner instanceof \App\Models\User || $owner instanceof \App\Models\Student) && $owner->is_active) {
                $actor = $owner->withAccessToken($token);
                $token->forceFill(['last_used_at' => now()])->save();
            }
        }
        app('auth')->setUser($actor);
        $skip = ['password', 'password_confirmation', 'current_password'];
        $clean = function ($values) use (&$clean, $skip) {
            foreach ($values as $key => $value) {
                if (is_array($value)) $values[$key] = $clean($value);
                elseif (is_string($value)) {
                    if (!in_array($key, $skip, true)) $value = trim($value);
                    $values[$key] = $value === '' ? null : $value;
                }
            }
            return $values;
        };
        $request->merge($clean($request->all()));
        (new \App\Http\Middleware\SanitizeInput())->handle($request, fn() => null);
    }

    public static function authorize(array $route, Request $request): ?Response
    {
        if (!(app()->environment('testing') && self::$disableThrottle)) self::throttle($request, 'api');
        foreach ($route['middleware'] as $spec) {
            [$name, $args] = array_pad(explode(':', $spec, 2), 2, '');
            if ($name === 'auth') {
                if (!$request->user()) abort(401, 'Unauthenticated.');
            } elseif ($name === 'throttle') {
                if (!(app()->environment('testing') && self::$disableThrottle)) self::throttle($request, $args, $route['path']);
            } else {
                $class = match ($name) {
                    'actor' => \App\Http\Middleware\EnsureActor::class,
                    'role' => \App\Http\Middleware\EnsureRole::class,
                    'password.fresh' => \App\Http\Middleware\EnsurePasswordChanged::class,
                    default => throw new \LogicException('Unmapped access control: ' . $name),
                };
                $result = (new $class())->handle($request, fn() => null, ...($args !== '' ? explode(',', $args) : []));
                if ($result instanceof Response) return $result;
            }
        }
        return null;
    }

    private static function throttle(Request $request, string $name, string $path = ''): void
    {
        $ip = $request->ip() ?: 'unknown';
        $limits = match ($name) {
            'api' => [['api:' . ($request->user() ? get_class($request->user()).':'.$request->user()->id : $ip), 120, 60]],
            'login' => [['login:'.strtolower((string) ($request->input('email') ?: $request->input('student_id'))).'|'.$ip, 5, 60], ['login-ip:'.$ip, 20, 60]],
            'public-form' => [['public-form:'.$ip, 20, 60]],
            default => [[$path.':'.$ip, (int) explode(',', $name)[0], ((int) (explode(',', $name)[1] ?? 1)) * 60]],
        };
        $limiter = new \Illuminate\Cache\RateLimiter(app('cache')->store());
        foreach ($limits as [$key, $max, $seconds]) {
            if ($limiter->tooManyAttempts($key, $max)) abort(429, 'Too Many Attempts.', ['Retry-After' => (string) $limiter->availableIn($key)]);
        }
        foreach ($limits as [$key, $max, $seconds]) $limiter->hit($key, $seconds);
    }

    public static function invoke(array $route, Request $request, array $values): Response
    {
        preg_match_all('/\{([^}]+)\}/', $route['path'], $names);
        $parameters = array_combine($names[1], $values) ?: [];
        $request->setRouteResolver(fn() => new class($parameters) {
            public function __construct(private array $parameters) {}
            public function parameter($key, $default = null) { return $this->parameters[$key] ?? $default; }
            public function parameters() { return $this->parameters; }
        });
        $controller = app($route['controller']);
        if ($controller instanceof \CodeIgniter\Controller && function_exists('service')) {
            $controller->initController(service('request'), service('response'), service('logger'));
        }
        $method = new \ReflectionMethod($controller, $route['action']);
        $args = [];
        foreach ($method->getParameters() as $parameter) {
            $type = $parameter->getType();
            $class = $type instanceof \ReflectionNamedType && !$type->isBuiltin() ? $type->getName() : null;
            if ($class && is_a($class, Request::class, true)) { $args[] = $request; continue; }
            if ($class && is_a($class, Model::class, true)) {
                $id = array_shift($values);
                $model = (new $class())->resolveRouteBinding($id);
                if (!$model) throw (new ModelNotFoundException())->setModel($class, [$id]);
                $args[] = $model;
                continue;
            }
            if ($values) { $args[] = array_shift($values); continue; }
            if ($parameter->isDefaultValueAvailable()) { $args[] = $parameter->getDefaultValue(); continue; }
            throw new \LogicException('Missing route argument: ' . $parameter->getName());
        }
        $result = $method->invokeArgs($controller, $args);
        $response = $result instanceof Response ? $result : response()->json($result, $result instanceof Model && $result->wasRecentlyCreated ? 201 : 200);
        return $response->prepare($request);
    }

    public static function error(\Throwable $error): Response
    {
        if ($error instanceof ValidationException) return response()->json(['message' => $error->getMessage(), 'errors' => $error->errors()], 422);
        if ($error instanceof ModelNotFoundException) return response()->json(['message' => 'Record not found.'], 404);
        if ($error instanceof HttpExceptionInterface) {
            $status = $error->getStatusCode();
            return response()->json(['message' => $error->getMessage() ?: (Response::$statusTexts[$status] ?? 'Request failed.')], $status, $error->getHeaders());
        }
        report($error);
        $body = ['message' => 'Server Error'];
        if (config('app.debug') || app()->environment('testing')) $body += ['exception' => get_class($error), 'detail' => $error->getMessage(), 'file' => $error->getFile(), 'line' => $error->getLine()];
        return response()->json($body, 500);
    }

    public static function toCodeIgniter(Response $result): \CodeIgniter\HTTP\ResponseInterface
    {
        $native = service('response');
        $native->setStatusCode($result->getStatusCode());
        foreach ($result->headers->all() as $name => $values) $native->setHeader($name, implode(', ', $values));
        if ($result instanceof \Symfony\Component\HttpFoundation\StreamedResponse || $result instanceof \Symfony\Component\HttpFoundation\BinaryFileResponse) {
            ob_start();
            try { $result->sendContent(); $body = ob_get_contents(); } finally { ob_end_clean(); }
        } else $body = $result->getContent();
        return $native->setBody($body === false ? '' : $body);
    }

    public static function fromCodeIgniter($request): Request
    {
        $server = $_SERVER;
        foreach ($request->headers() as $header) $server['HTTP_' . strtoupper(str_replace('-', '_', $header->getName()))] = $header->getValueLine();
        $server['CONTENT_TYPE'] = $request->getHeaderLine('Content-Type');
        $server['REMOTE_ADDR'] = $request->getIPAddress();
        // A GET must not inherit form data from another request.
        $method = strtoupper($request->getMethod());
        $post = $method === 'POST' ? ($request->getPost() ?? []) : [];
        return Request::create((string) $request->getUri(), $method, $post, [], $_FILES, $server, (string) $request->getBody());
    }
}
