<?php
namespace App\Commands;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
class RetryFailedEmails extends BaseCommand
{
    protected $group = 'iCARE';
    protected $name = 'emails:retry-failed';
    protected $description = 'iCARE emails:retry-failed task.';
    public function run(array $params)
    {
        $options = [];
        foreach ([] as $key) {
            $value = CLI::getOption($key);
            if ($value !== null) $options['--'.$key] = $value;
        }
        $bus = app('command.bus');
        $code = $bus->call($this->name, $options);
        CLI::write($bus->output());
        return $code;
    }
}
