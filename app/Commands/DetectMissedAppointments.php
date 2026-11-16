<?php
namespace App\Commands;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
class DetectMissedAppointments extends BaseCommand
{
    protected $group = 'iCARE';
    protected $name = 'app:detect-missed-appointments';
    protected $description = 'iCARE app:detect-missed-appointments task.';
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
