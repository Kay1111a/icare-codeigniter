<?php
namespace App\Libraries\Bridge;

// Runs the preserved reminder/backup handlers from Spark and authenticated cron
// endpoints. No Artisan or Laravel application is bootstrapped.
final class CommandBus
{
    private string $lastOutput = '';
    public function call($command, array $parameters = [], $outputBuffer = null, $inputStream = null): int
    {
        $console = new \Symfony\Component\Console\Application('iCARE tasks');
        $console->setAutoExit(false);
        foreach (glob(app_path('Console/Commands/*.php')) as $file) {
            $class = 'App\\Console\\Commands\\' . pathinfo($file, PATHINFO_FILENAME);
            $handler = new $class();
            $handler->setLaravel(app());
            $console->add($handler);
        }
        $interactiveConsole = PHP_SAPI === 'cli' && !Runtime::$httpRequest && !app()->environment('testing') && $inputStream === null;
        $output = $outputBuffer ?? ($interactiveConsole
            ? new \Symfony\Component\Console\Output\ConsoleOutput()
            : new \Symfony\Component\Console\Output\BufferedOutput());
        $input = new \Symfony\Component\Console\Input\ArrayInput(['command' => $command] + $parameters);
        $input->setInteractive($inputStream !== null || !Runtime::$httpRequest);
        if ($inputStream !== null) $input->setStream($inputStream);
        $result = $console->run($input, $output);
        $this->lastOutput = $output instanceof \Symfony\Component\Console\Output\BufferedOutput ? $output->fetch() : '';
        return $result;
    }
    public function output(): string { return $this->lastOutput; }
}
