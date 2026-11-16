<?php
namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

final class ApplicationKey extends BaseCommand
{
    protected $group = 'iCARE';
    protected $name = 'icare:key';
    protected $description = 'Set APP_KEY for a new installation without replacing an existing key.';

    public function run(array $params)
    {
        $path = ROOTPATH . '.env';
        if (!is_file($path)) {
            CLI::error('Copy .env.example to .env first.');
            return EXIT_ERROR;
        }
        $contents = file_get_contents($path);
        if (env('APP_KEY') || preg_match('/^APP_KEY\s*=\s*["\x27]?base64:/m', $contents)) {
            CLI::error('APP_KEY already exists; it was kept. Preserve the Laravel key when importing existing data.');
            return EXIT_ERROR;
        }
        $key = 'APP_KEY=base64:' . base64_encode(random_bytes(32));
        $contents = preg_match('/^APP_KEY\s*=/m', $contents)
            ? preg_replace('/^APP_KEY\s*=.*$/m', $key, $contents)
            : $contents . "\n" . $key . "\n";
        if (file_put_contents($path, $contents, LOCK_EX) === false) {
            CLI::error('Could not write .env.');
            return EXIT_ERROR;
        }
        CLI::write('APP_KEY generated.', 'green');
        return EXIT_SUCCESS;
    }
}
