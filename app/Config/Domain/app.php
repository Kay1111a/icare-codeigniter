<?php
return [
 'name' => env('APP_NAME', 'iCARE'),
 'env' => env('APP_ENV', env('CI_ENVIRONMENT', 'production')),
 'debug' => (bool) env('APP_DEBUG', false),
 'url' => env('APP_URL', 'http://localhost:8080'),
 'frontend_url' => env('FRONTEND_URL', env('APP_URL', 'http://localhost:8080')),
 'timezone' => env('APP_TIMEZONE', 'Asia/Manila'),
 'locale' => 'en', 'fallback_locale' => 'en', 'faker_locale' => 'en_US',
 'key' => env('APP_KEY'), 'cipher' => 'AES-256-CBC',
];
