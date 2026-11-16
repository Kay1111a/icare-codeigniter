<?php

$root = dirname(__DIR__);
$directory = $root . '/writable/tests/' . getmypid();
if (!is_dir($directory)) mkdir($directory, 0775, true);
define('ICARE_TEST_DATABASE', $directory . '/working.sqlite');
define('ICARE_SCHEMA_DATABASE', $directory . '/schema.sqlite');
file_put_contents(ICARE_TEST_DATABASE, '');
foreach ([
    'APP_ENV'=>'testing', 'CI_ENVIRONMENT'=>'testing', 'APP_DEBUG'=>'true',
    'DB_CONNECTION'=>'sqlite', 'DB_DATABASE'=>ICARE_TEST_DATABASE,
    'MAIL_MAILER'=>'array', 'CACHE_DRIVER'=>'array', 'BCRYPT_ROUNDS'=>'4',
    'APP_KEY'=>'base64:'.base64_encode(str_repeat('t', 32)),
] as $name => $value) {
    putenv($name . '=' . $value); $_ENV[$name] = $value; $_SERVER[$name] = $value;
}
require_once $root . '/vendor/autoload.php';
require $root . '/vendor/codeigniter4/framework/system/Test/bootstrap.php';
\App\Libraries\Bridge\Runtime::container();
ob_start();
try { service('migrations')->setNamespace('App')->latest(); }
finally { ob_end_clean(); }
\Config\Database::connect()->close();
\App\Libraries\Bridge\Runtime::reset();
copy(ICARE_TEST_DATABASE, ICARE_SCHEMA_DATABASE);
