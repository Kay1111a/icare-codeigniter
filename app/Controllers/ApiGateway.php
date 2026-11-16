<?php
namespace App\Controllers;

use App\Libraries\Bridge\Api;

final class ApiGateway extends BaseController
{
    public function handle($routeId, ...$values)
    {
        try { $result = Api::invoke(Api::route((int) $routeId), request(), $values); }
        catch (\Throwable $e) { $result = Api::error($e); }
        return Api::toCodeIgniter($result);
    }
    public function notFound() { return $this->response->setStatusCode(404)->setJSON(['message' => 'API endpoint not found.']); }
    public function options() { return $this->response->setStatusCode(204)->setBody(''); }
}
