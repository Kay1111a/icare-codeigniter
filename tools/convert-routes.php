<?php
// One-time, reproducible conversion of the supplied API route declarations.
namespace MigrationTools;

final class RouteEntry
{
    public bool $active = true;
    public array $wheres = [];
    public function __construct(public array $methods, public string $path, public array $action, public array $middleware = []) {}
    public function middleware($value) { $this->middleware = array_merge($this->middleware, (array) $value); return $this; }
    public function whereIn($key, $values) { $this->wheres[$key] = implode('|', array_map(fn($x) => preg_quote($x, '~'), $values)); return $this; }
    public function whereNumber($key) { $this->wheres[$key] = '[0-9]+'; return $this; }
}
final class ResourceEntry
{
    public function __construct(private array $entries) {}
    public function only($actions) { foreach ($this->entries as $action => $entry) $entry->active = in_array($action, $actions, true); return $this; }
    public function except($actions) { foreach ($this->entries as $action => $entry) $entry->active = !in_array($action, $actions, true); return $this; }
}
final class Registrar
{
    public function __construct(private array $attributes) {}
    public function middleware($value) { $this->attributes['middleware'] = array_merge($this->attributes['middleware'] ?? [], (array) $value); return $this; }
    public function prefix($value) { $this->attributes['prefix'] = $value; return $this; }
    public function group($callback) { Routes::$stack[] = $this->attributes; $callback(); array_pop(Routes::$stack); }
    public function __call($method, $args) { Routes::$stack[] = $this->attributes; $entry = Routes::$method(...$args); array_pop(Routes::$stack); return $entry; }
}
final class Routes
{
    public static array $stack = [['prefix' => 'api']];
    public static array $entries = [];
    public static function middleware($value) { return new Registrar(['middleware' => (array) $value]); }
    public static function prefix($value) { return new Registrar(['prefix' => $value]); }
    public static function __callStatic($method, $args) {
        [$path, $action] = $args;
        $prefix = ''; $middleware = [];
        foreach (self::$stack as $attributes) {
            $prefix .= '/' . trim($attributes['prefix'] ?? '', '/');
            $middleware = array_merge($middleware, $attributes['middleware'] ?? []);
        }
        $path = trim(preg_replace('~/+~', '/', $prefix . '/' . $path), '/');
        $entry = new RouteEntry([strtoupper($method)], $path, $action, $middleware);
        self::$entries[] = $entry;
        return $entry;
    }
    public static function apiResource($path, $controller) {
        $singular = ['students'=>'student','users'=>'user','cases'=>'case','referrals'=>'referral','appointments'=>'appointment','testing-records'=>'testingRecord'];
        $parameter = $singular[$path] ?? rtrim(str_replace('-', '_', $path), 's');
        $entries = [];
        foreach (['index'=>['get',''], 'store'=>['post',''], 'show'=>['get','/{'.$parameter.'}'], 'update'=>['put','/{'.$parameter.'}'], 'destroy'=>['delete','/{'.$parameter.'}']] as $name => [$method, $suffix]) {
            $entries[$name] = self::$method($path.$suffix, [$controller, $name]);
            if ($name === 'update') $entries[$name]->methods[] = 'PATCH';
        }
        return new ResourceEntry($entries);
    }
}

if ($argc !== 3) { fwrite(STDERR, "Usage: php tools/convert-routes.php SOURCE_API_PHP OUTPUT_PHP\n"); exit(1); }
$source = file_get_contents($argv[1]);
$source = str_replace('use Illuminate\\Support\\Facades\\Route;', 'use MigrationTools\\Routes as Route;', $source);
$source = str_replace('App\\Http\\Controllers\\Api', 'App\\Controllers\\Api', $source);
eval('?>' . $source);
$result = [];
foreach (Routes::$entries as $entry) {
    if (!$entry->active) continue;
    $result[] = ['methods' => $entry->methods, 'path' => $entry->path, 'controller' => $entry->action[0], 'action' => $entry->action[1], 'middleware' => array_values(array_unique($entry->middleware)), 'wheres' => $entry->wheres];
}
file_put_contents($argv[2], "<?php\n// Explicit API contracts converted from the uploaded iCARE source.\nreturn " . var_export($result, true) . ";\n");
echo count($result) . " route contracts converted.\n";
