<?php
namespace Config;
class Database extends \CodeIgniter\Database\Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
    public string $defaultGroup = 'default';
    public array $default = [];
    public array $tests = [];
    public function __construct()
    {
        parent::__construct();
        $sqlite = env('DB_CONNECTION', 'mysql') === 'sqlite';
        $this->default = [
            'DSN' => '', 'hostname' => env('DB_HOST', '127.0.0.1'),
            'username' => env('DB_USERNAME', 'root'), 'password' => env('DB_PASSWORD', ''),
            'database' => env('DB_DATABASE', $sqlite ? WRITEPATH . 'icare.sqlite' : 'icare'),
            'DBDriver' => $sqlite ? 'SQLite3' : 'MySQLi', 'DBPrefix' => '',
            'pConnect' => false, 'DBDebug' => ENVIRONMENT !== 'production',
            'charset' => 'utf8mb4', 'DBCollat' => 'utf8mb4_unicode_ci',
            'swapPre' => '', 'encrypt' => (!$sqlite && env('MYSQL_ATTR_SSL_CA')) ? ['ssl_ca' => env('MYSQL_ATTR_SSL_CA'), 'ssl_verify' => filter_var(env('MYSQL_ATTR_SSL_VERIFY', true), FILTER_VALIDATE_BOOLEAN)] : false, 'compress' => false, 'strictOn' => true,
            'failover' => [], 'port' => (int) env('DB_PORT', 3306), 'foreignKeys' => true,
            'busyTimeout' => 10000,
            'dateFormat' => ['date'=>'Y-m-d', 'datetime'=>'Y-m-d H:i:s', 'time'=>'H:i:s'],
        ];
        $this->tests = $this->default;
    }
}
