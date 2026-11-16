<?php
namespace Tests\Support;

use PHPUnit\Framework\Assert;

final class PendingCommand
{
    private array $answers = [];
    private array $expected = [];
    private ?int $code = null;
    private string $output = '';

    public function __construct(private string $command, private array $parameters) {}
    public function expectsConfirmation($question, $answer) {
        $this->expected[] = $question;
        $this->answers[] = $answer;
        return $this;
    }
    public function expectsOutputToContain($text) { $this->expected[] = $text; return $this; }
    public function assertExitCode($expected) {
        $this->run();
        Assert::assertSame($expected, $this->code, $this->output);
        return $this;
    }
    public function assertSuccessful() { return $this->assertExitCode(0); }
    private function run(): void {
        if ($this->code !== null) return;
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, implode("\n", $this->answers) . "\n");
        rewind($stream);
        try { $this->code = app('command.bus')->call($this->command, $this->parameters, null, $stream); }
        finally { fclose($stream); }
        $this->output = app('command.bus')->output();
        foreach ($this->expected as $text) Assert::assertStringContainsString($text, $this->output);
    }
}
