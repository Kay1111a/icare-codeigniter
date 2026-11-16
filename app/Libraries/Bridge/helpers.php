<?php

// Small helpers for iCARE's standalone data, validation and mail components.
// The HTTP lifecycle, routing, filters and CLI entry point belong to CodeIgniter.
use App\Libraries\Bridge\Runtime;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpKernel\Exception\HttpException;

if (!function_exists('app')) {
    function app($abstract = null, array $parameters = []) {
        $container = Runtime::container();
        return $abstract === null ? $container : $container->make($abstract, $parameters);
    }
}
// CodeIgniter requests config classes; the preserved domain code requests
// dotted keys. Keep these two configuration systems explicitly distinguishable.
if (!function_exists('config')) {
    function config($key = null, $default = null) {
        if (is_string($key) && (str_contains($key, '\\') || (isset($key[0]) && ctype_upper($key[0])))) {
            return \CodeIgniter\Config\Factories::config($key, ['getShared' => $default ?? true]);
        }
        $repo = Runtime::container()->make('config');
        if ($key === null) return $repo;
        if (is_array($key)) { $repo->set($key); return null; }
        if (is_string($key) && !str_contains($key, '.') && !$repo->has($key) && class_exists(\CodeIgniter\Config\Factories::class)) {
            return \CodeIgniter\Config\Factories::config($key, ['getShared' => $default ?? true]);
        }
        return $repo->get($key, $default);
    }
}
if (!function_exists('base_path')) { function base_path($path = '') { return dirname(__DIR__, 3) . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('app_path')) { function app_path($path = '') { return base_path('app') . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('storage_path')) { function storage_path($path = '') { return base_path('storage') . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('database_path')) { function database_path($path = '') { return base_path('database') . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('resource_path')) { function resource_path($path = '') { return base_path('resources') . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('public_path')) { function public_path($path = '') { return base_path('public') . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('config_path')) { function config_path($path = '') { return app_path('Config/Domain') . ($path !== '' ? DIRECTORY_SEPARATOR . $path : ''); } }
if (!function_exists('now')) { function now($tz = null) { return Carbon::now($tz); } }
if (!function_exists('today')) { function today($tz = null) { return Carbon::today($tz); } }
if (!function_exists('request')) {
    function request($key = null, $default = null) {
        $request = app('request');
        return $key === null ? $request : (is_array($key) ? $request->only($key) : $request->input($key, $default));
    }
}
if (!function_exists('response')) {
    function response($content = null, $status = 200, array $headers = []) {
        $factory = app(\App\Libraries\Bridge\Responses::class);
        return func_num_args() === 0 ? $factory : $factory->make($content, $status, $headers);
    }
}
if (!function_exists('auth')) { function auth($guard = null) { return app('auth')->guard($guard); } }
if (!function_exists('bcrypt')) { function bcrypt($value, $options = []) { return app('hash')->make($value, $options); } }
if (!function_exists('validator')) { function validator($data = null, $rules = [], $messages = [], $attributes = []) { return $data === null ? app('validator') : app('validator')->make($data, $rules, $messages, $attributes); } }
if (!function_exists('abort')) { function abort($code, $message = '', array $headers = []) { throw new HttpException($code, $message, null, $headers); } }
if (!function_exists('abort_if')) { function abort_if($condition, $code, $message = '', array $headers = []) { if ($condition) abort($code, $message, $headers); } }
if (!function_exists('abort_unless')) { function abort_unless($condition, $code, $message = '', array $headers = []) { if (!$condition) abort($code, $message, $headers); } }
if (!function_exists('report')) { function report($exception) { app('log')->error((string) $exception); } }
if (!function_exists('encrypt')) { function encrypt($value, $serialize = true) { return app('encrypter')->encrypt($value, $serialize); } }
if (!function_exists('decrypt')) { function decrypt($value, $unserialize = true) { return app('encrypter')->decrypt($value, $unserialize); } }
if (!function_exists('url')) { function url($path = null, $parameters = [], $secure = null) { return rtrim(config('app.url'), '/') . '/' . ltrim((string) $path, '/'); } }
if (!function_exists('asset')) { function asset($path, $secure = null) { return url($path); } }
if (!function_exists('dispatch')) {
    function dispatch($job) {
        return new class($job) {
            public function __construct(private $job) {}
            public function afterResponse() { Runtime::defer($this->job); return $this; }
        };
    }
}
if (!function_exists('fake')) { function fake($locale = null) { return app(\Faker\Generator::class); } }

// Domain cache is separate from CodeIgniter's framework cache.
function domain_cache() { return app('cache'); }
if (!function_exists('__')) { function __($key, array $replace = [], $locale = null) { return app('translator')->get($key, $replace, $locale); } }
if (!function_exists('trans')) { function trans($key = null, array $replace = [], $locale = null) { return $key === null ? app('translator') : __($key, $replace, $locale); } }
