<?php
namespace App\Filters;

use App\Libraries\Bridge\Api;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ApiAccess implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            $domain = Api::fromCodeIgniter($request);
            Api::begin($domain);
            $result = Api::authorize(Api::route((int) $arguments[0]), $domain);
            if ($result) return Api::toCodeIgniter($result);
        } catch (\Throwable $e) { return Api::toCodeIgniter(Api::error($e)); }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
