<?php
namespace App\Commands;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
class RunBackup extends BaseCommand
{
    protected $group = 'iCARE';
    protected $name = 'backup:run';
    protected $description = 'iCARE backup:run task.';
    public function run(array $params)
    {
        $options = [];
        foreach (['type', 'trigger', 'user'] as $key) {
            $value = CLI::getOption($key);
            if ($value !== null) $options['--'.$key] = $value;
        }
        $bus = app('command.bus');
        $code = $bus->call($this->name, $options);
        CLI::write($bus->output());
        return $code;
    }
}
