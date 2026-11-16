<?php
namespace Tests;

use App\Libraries\Bridge\Api;
use App\Libraries\Bridge\Runtime;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends CIUnitTestCase
{
    use FeatureTestTrait { call as private nativeCall; }

    protected function setUp(): void
    {
        Runtime::reset();
        copy(ICARE_SCHEMA_DATABASE, ICARE_TEST_DATABASE);
        parent::setUp();
        Runtime::container();
        Api::$testActor = null;
        Api::$disableThrottle = true;
        $this->headers = ['Accept' => 'application/json'];
        $_GET = $_POST = $_REQUEST = $_FILES = [];
        \App\Support\AccountEmail::forget();
    }

    protected function tearDown(): void
    {
        Runtime::flushDeferred();
        \Carbon\Carbon::setTestNow();
        \Illuminate\Support\Carbon::setTestNow();
        Api::$testActor = null;
        Runtime::reset();
        \Mockery::close();
        parent::tearDown();
    }

    public function actingAs($user, $guard = null)
    {
        \Tests\Support\TokenAuth::actingAs($user);
        return $this;
    }

    public function withHeader($name, $value) { $this->headers[$name] = $value; return $this; }
    public function withHeaders(array $headers = []) { $this->headers = array_merge($this->headers, $headers); return $this; }
    public function withoutMiddleware($middleware = null) {
        // Original tests use this only to avoid login throttling while testing OTPs.
        if ($middleware !== \Illuminate\Routing\Middleware\ThrottleRequests::class) throw new \LogicException('Access filters cannot be disabled by this test adapter.');
        Api::$disableThrottle = true;
        return $this;
    }
    public function call(string $method, string $path, ?array $params = null)
    {
        $native = $this->nativeCall($method, $path, $params)->response();
        Runtime::flushDeferred();
        $headers = [];
        foreach ($native->headers() as $header) $headers[$header->getName()] = $header->getValueLine();
        return TestResponse::fromBaseResponse(new Response($native->getBody(), $native->getStatusCode(), $headers));
    }
    public function json($method, $path, array $data = [], array $headers = [])
    {
        $this->withHeaders($headers);
        $_GET = $_POST = $_REQUEST = $_FILES = [];
        $extract = function (&$values, &$files) use (&$extract) {
            foreach ($values as $key => &$value) {
                if ($value instanceof UploadedFile) { $files[$key] = $value; unset($values[$key]); }
                elseif (is_array($value)) { $nested = []; $extract($value, $nested); if ($nested) $files[$key] = $nested; }
            }
        };
        $extract($data, $_FILES);
        if ($_FILES) array_walk_recursive($data, function (&$value) { if (is_scalar($value)) $value = (string) $value; });
        $this->bodyFormat = '';
        $this->requestBody = $_FILES ? '' : json_encode($data, JSON_THROW_ON_ERROR);
        $this->headers['Content-Type'] = $_FILES ? 'multipart/form-data' : 'application/json';
        try { return $this->call(strtoupper($method), $path, $_FILES ? $data : null); }
        finally { $_FILES = []; }
    }
    public function post(string $path, ?array $params = null) { return $this->json('POST', $path, $params ?? []); }
    public function getJson($path, array $headers = []) { return $this->json('GET', $path, [], $headers); }
    public function postJson($path, array $data = [], array $headers = []) { return $this->json('POST', $path, $data, $headers); }
    public function putJson($path, array $data = [], array $headers = []) { return $this->json('PUT', $path, $data, $headers); }
    public function patchJson($path, array $data = [], array $headers = []) { return $this->json('PATCH', $path, $data, $headers); }
    public function deleteJson($path, array $data = [], array $headers = []) { return $this->json('DELETE', $path, $data, $headers); }
    public function assertDatabaseHas($table, array $data) { $this->assertTrue(app('db')->table($table)->where($data)->exists(), 'Missing database row in '.$table); return $this; }
    public function assertDatabaseMissing($table, array $data) { $this->assertFalse(app('db')->table($table)->where($data)->exists(), 'Unexpected database row in '.$table); return $this; }
    public function travel($amount) {
        return new class($amount) {
            public function __construct(private int $amount) {}
            public function __call($unit, $args) { \Carbon\Carbon::setTestNow(now()->add($unit, $this->amount)); }
        };
    }
    public function artisan($command, array $parameters = [])
    {
        if (str_contains($command, ' ')) {
            $parts = explode(' ', $command); $command = array_shift($parts);
            foreach ($parts as $option) $parameters[$option] = true;
        }
        return new \Tests\Support\PendingCommand($command, $parameters);
    }
}
