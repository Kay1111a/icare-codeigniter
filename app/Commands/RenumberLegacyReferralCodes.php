<?php
namespace App\Commands;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
class RenumberLegacyReferralCodes extends BaseCommand
{
    protected $group = 'iCARE';
    protected $name = 'referrals:renumber-legacy-codes';
    protected $description = 'iCARE referrals:renumber-legacy-codes task.';
    public function run(array $params)
    {
        $options = [];
        foreach (['dry-run'] as $key) {
            $value = CLI::getOption($key);
            if ($value !== null) $options['--'.$key] = $value;
        }
        $bus = app('command.bus');
        $code = $bus->call($this->name, $options);
        CLI::write($bus->output());
        return $code;
    }
}
