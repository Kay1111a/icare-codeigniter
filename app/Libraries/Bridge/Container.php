<?php
namespace App\Libraries\Bridge;

final class Container extends \Illuminate\Container\Container
{
    public function basePath($path = '') { return base_path($path); }
    public function storagePath($path = '') { return storage_path($path); }
    public function resourcePath($path = '') { return resource_path($path); }
    public function configPath($path = '') { return config_path($path); }
    public function publicPath($path = '') { return public_path($path); }
    public function databasePath($path = '') { return database_path($path); }
    public function langPath($path = '') { return app_path('Language') . ($path ? '/' . $path : ''); }
    public function bootstrapPath($path = '') { return base_path('writable') . ($path ? '/' . $path : ''); }
    public function getNamespace() { return 'App\\'; }
    public function getLocale() { return $this['config']->get('app.locale', 'en'); }
    public function version() { return 'iCARE / CodeIgniter 4'; }
    public function environment(...$environments) {
        $env = $this['config']->get('app.env', 'production');
        return $environments ? in_array($env, is_array($environments[0]) ? $environments[0] : $environments, true) : $env;
    }
    public function runningInConsole() { return PHP_SAPI === 'cli' && !Runtime::$httpRequest; }
    public function runningUnitTests() { return $this->environment('testing'); }
    public function isProduction() { return $this->environment('production'); }
    public function hasDebugModeEnabled() { return (bool) $this['config']->get('app.debug', false); }
    public function register($provider) {
        $instance = is_string($provider) ? new $provider($this) : $provider;
        $instance->register();
        if (method_exists($instance, 'boot')) $this->call([$instance, 'boot']);
        return $instance;
    }
    public function terminating($callback) { Runtime::defer($callback); }
}
