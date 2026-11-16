<?php
namespace App\Libraries\Bridge;

use Illuminate\Config\Repository;
use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

final class Runtime
{
    private static ?Container $container = null;
    private static array $deferred = [];
    public static bool $httpRequest = false;

    public static function container(): Container
    {
        if (self::$container !== null) return self::$container;
        $app = self::$container = new Container();
        IlluminateContainer::setInstance($app);
        Facade::setFacadeApplication($app);
        $app->instance('app', $app);
        // Blade's component-name resolver only needs getNamespace().
        $app->instance(\Illuminate\Contracts\Foundation\Application::class, $app);
        $app->instance('env', env('APP_ENV', env('CI_ENVIRONMENT', 'production')));
        $app->instance(Container::class, $app);
        $app->instance(\Illuminate\Contracts\Container\Container::class, $app);
        $app->instance(\Illuminate\Container\Container::class, $app);
        $app->instance('path', app_path());
        $app->instance('path.storage', storage_path());
        $app->instance('path.public', public_path());
        $app->instance('path.lang', app_path('Language'));

        $app->instance('config', new Repository());
        foreach (glob(config_path('*.php')) as $file) {
            $app['config']->set(pathinfo($file, PATHINFO_FILENAME), require $file);
        }
        date_default_timezone_set($app['config']->get('app.timezone', 'UTC'));
        $app->alias('config', \Illuminate\Contracts\Config\Repository::class);
        $app->instance('events', new Dispatcher($app));
        $app->alias('events', \Illuminate\Contracts\Events\Dispatcher::class);

        $app->instance('request', Request::create($app['config']->get('app.url', 'http://localhost:8080')));
        $app->alias('request', Request::class);
        $app->instance('auth', new \App\Auth\AuthManager());
        $app['request']->setUserResolver(fn($guard = null) => $app['auth']->guard($guard)->user());

        $defaultConnection = $app['config']->get('database.default', 'mysql');
        $capsule = new Capsule($app);
        foreach ($app['config']->get('database.connections', []) as $name => $connection) {
            $capsule->addConnection($connection, $name);
        }
        $capsule->getDatabaseManager()->setDefaultConnection($defaultConnection);
        $capsule->setEventDispatcher($app['events']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $app->instance('db', $capsule->getDatabaseManager());
        $app->bind('db.connection', fn() => $app['db']->connection());
        $app->bind('db.schema', fn() => $app['db']->connection()->getSchemaBuilder());
        $app->alias('db', \Illuminate\Database\DatabaseManager::class);
        $app->alias('db.connection', \Illuminate\Database\ConnectionInterface::class);

        $logger = new \Monolog\Logger('icare');
        $logger->pushHandler(new \Monolog\Handler\StreamHandler(base_path('writable/logs/domain.log')));
        $app->instance('log', $logger);
        $app->alias('log', \Psr\Log\LoggerInterface::class);

        $files = new \Illuminate\Filesystem\Filesystem();
        $app->instance('files', $files);
        foreach ([storage_path('app/public'), storage_path('framework/cache/data'), storage_path('framework/views'), base_path('writable/logs')] as $directory) {
            if (!is_dir($directory)) mkdir($directory, 0775, true);
        }
        $loader = new \Illuminate\Translation\FileLoader($files, app_path('Language'));
        $translator = new \Illuminate\Translation\Translator($loader, 'en');
        $app->instance('translator', $translator);
        $app->alias('translator', \Illuminate\Contracts\Translation\Translator::class);

        foreach ([
            \Illuminate\Bus\BusServiceProvider::class,
            \Illuminate\Hashing\HashServiceProvider::class,
            \Illuminate\Cache\CacheServiceProvider::class,
            \Illuminate\Filesystem\FilesystemServiceProvider::class,
            \Illuminate\Encryption\EncryptionServiceProvider::class,
            \Illuminate\Validation\ValidationServiceProvider::class,
            \Illuminate\View\ViewServiceProvider::class,
            \Illuminate\Mail\MailServiceProvider::class,
            \Illuminate\Notifications\NotificationServiceProvider::class,
        ] as $provider) $app->register($provider);
        foreach ([
            'cache.store' => [\Illuminate\Contracts\Cache\Repository::class],
            'filesystem' => [\Illuminate\Contracts\Filesystem\Factory::class],
            'view' => [\Illuminate\Contracts\View\Factory::class, \Illuminate\View\Factory::class],
            'validator' => [\Illuminate\Contracts\Validation\Factory::class],
            'hash' => [\Illuminate\Contracts\Hashing\Hasher::class],
            'mail.manager' => [\Illuminate\Contracts\Mail\Factory::class],
            'mailer' => [\Illuminate\Contracts\Mail\Mailer::class, \Illuminate\Contracts\Mail\MailQueue::class],
            'encrypter' => [\Illuminate\Contracts\Encryption\Encrypter::class, \Illuminate\Contracts\Encryption\StringEncrypter::class],
        ] as $binding => $aliases) foreach ($aliases as $alias) $app->alias($binding, $alias);
        $app->instance('command.bus', new CommandBus());
        $app->instance(\Illuminate\Contracts\Console\Kernel::class, $app['command.bus']);
        $app->singleton(\Illuminate\Http\Client\Factory::class, fn() => new \Illuminate\Http\Client\Factory($app['events']));
        $app->singleton(\Faker\Generator::class, fn() => \Faker\Factory::create('en_US'));

        Request::macro('validate', function (array $rules, ...$params) {
            return app('validator')->make($this->all(), $rules, $params[0] ?? [], $params[1] ?? [])->validate();
        });
        \Illuminate\Pagination\Paginator::currentPageResolver(fn($name = 'page') => max(1, (int) request()->query($name, 1)));
        \Illuminate\Pagination\Paginator::currentPathResolver(fn() => request()->url());
        \Illuminate\Pagination\Paginator::queryStringResolver(fn() => request()->query());
        \Illuminate\Database\Eloquent\Factories\Factory::guessFactoryNamesUsing(fn($model) => 'Database\\Factories\\' . class_basename($model) . 'Factory');
        register_shutdown_function([self::class, 'flushDeferred']);
        return $app;
    }

    public static function setRequest(Request $request): void
    {
        $app = self::container();
        $app->instance('request', $request);
        Facade::clearResolvedInstance('request');
        $request->setUserResolver(fn($guard = null) => $app['auth']->guard($guard)->user());
    }

    public static function defer(callable $callback): void { self::$deferred[] = $callback; }
    public static function reset(): void
    {
        self::flushDeferred();
        if (self::$container && self::$container->bound('db')) {
            foreach (self::$container['db']->getConnections() as $connection) $connection->disconnect();
        }
        self::$container = null;
        self::$httpRequest = false;
        Facade::clearResolvedInstances();
        \Illuminate\Database\Eloquent\Model::clearBootedModels();
    }
    public static function flushDeferred(): void
    {
        $callbacks = self::$deferred;
        self::$deferred = [];
        foreach ($callbacks as $callback) {
            try { $callback(); } catch (\Throwable $e) { if (self::$container) self::$container['log']->error((string) $e); }
        }
    }
}
