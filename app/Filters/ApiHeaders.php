<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ApiHeaders implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {}
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $response->setHeader('X-Content-Type-Options', 'nosniff')->setHeader('X-Frame-Options', 'DENY')
            ->setHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->setHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        if (str_starts_with(trim($request->getUri()->getPath(), '/'), 'api/')) {
            $response->setHeader('Cache-Control', 'no-store, private');
            $response->setHeader('Content-Security-Policy', "default-src 'none'; frame-ancestors 'none'");
            $origin = $request->getHeaderLine('Origin');
            $allowed = array_filter(array_map('trim', explode(',', env('CORS_ALLOWED_ORIGINS', env('FRONTEND_URL', env('APP_URL', 'http://localhost:8080'))))));
            if ($origin !== '' && in_array($origin, $allowed, true)) {
                $response->setHeader('Access-Control-Allow-Origin', $origin)->setHeader('Vary', 'Origin');
                $response->setHeader('Access-Control-Allow-Methods', 'GET, HEAD, POST, PUT, PATCH, DELETE, OPTIONS');
                $response->setHeader('Access-Control-Allow-Headers', 'Authorization, Content-Type, Accept, X-Requested-With, X-Cron-Secret');
                $response->setHeader('Access-Control-Max-Age', '600');
                $response->setHeader('Access-Control-Expose-Headers', 'Content-Disposition, Retry-After');
            }
        }
        if ($request->isSecure()) $response->setHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        return $response;
    }
}
