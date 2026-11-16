<?php
namespace App\Libraries\Bridge;
abstract class SchemaMigration extends \CodeIgniter\Database\Migration
{
    protected function alreadyApplied(string $name): bool
    {
        Runtime::container();
        $schema = app('db')->connection()->getSchemaBuilder();
        return $schema->hasTable('migrations') && $schema->hasColumn('migrations', 'migration')
            && app('db')->table('migrations')->where('migration', $name)->exists();
    }
}
