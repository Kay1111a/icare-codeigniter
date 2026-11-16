<?php
namespace App\Commands;

use App\Models\User;
use App\Support\AccountEmail;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

final class CreateAdmin extends BaseCommand
{
    protected $group = 'iCARE';
    protected $name = 'icare:admin';
    protected $description = 'Create the initial system administrator on an empty installation.';
    protected $usage = 'icare:admin <email>';

    public function run(array $params)
    {
        \App\Libraries\Bridge\Runtime::container();
        $email = strtolower(trim($params[0] ?? ''));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            CLI::error('Supply a valid email: php spark icare:admin you@example.edu');
            return EXIT_ERROR;
        }
        if (User::query()->exists() || AccountEmail::takenByOther($email)) {
            CLI::error('Accounts already exist. Use the existing administrator account tools.');
            return EXIT_ERROR;
        }
        $password = 'Ic!' . bin2hex(random_bytes(12)) . '7';
        User::create([
            'name' => 'System Administrator', 'first_name' => 'System', 'last_name' => 'Administrator',
            'email' => $email, 'employee_id' => 'ICARE-SYS-001', 'role' => 'system_admin',
            'unit' => 'OSS', 'password' => bcrypt($password), 'is_active' => true,
            'must_change_password' => true, 'temp_password_expires_at' => now()->addDay(),
        ]);
        CLI::write('Created ' . $email, 'green');
        CLI::write('Temporary password (shown once): ' . $password);
        CLI::write('Sign in within 24 hours and change this password.');
        return EXIT_SUCCESS;
    }
}
