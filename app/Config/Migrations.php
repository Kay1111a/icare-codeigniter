<?php
namespace Config;
class Migrations extends \CodeIgniter\Config\BaseConfig
{
    public bool $enabled = true;
    // Separate from an imported Laravel migration ledger.
    public string $table = 'ci_migrations';
    public string $timestampFormat = 'Y-m-d-His';
    public bool $lock = true;
}
