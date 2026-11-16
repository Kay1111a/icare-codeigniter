<?php
namespace Config;
class Filters extends \CodeIgniter\Config\Filters
{
    public array $aliases = [
        'apiAccess' => \App\Filters\ApiAccess::class,
        'apiHeaders' => \App\Filters\ApiHeaders::class,
        'invalidchars' => \CodeIgniter\Filters\InvalidChars::class,
        'forcehttps' => \CodeIgniter\Filters\ForceHTTPS::class,
    ];
    public array $required = ['before' => ['forcehttps'], 'after' => ['apiHeaders']];
    public array $globals = ['before' => ['invalidchars'], 'after' => []];
    public array $methods = [];
    public array $filters = [];
}
