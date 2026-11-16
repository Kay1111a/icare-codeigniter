<?php
namespace App\Libraries\Bridge;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class Responses
{
    public function make($content = '', $status = 200, array $headers = []) { return new Response($content ?? '', $status, $headers); }
    public function json($data = [], $status = 200, array $headers = [], $options = 0) { return new JsonResponse($data, $status, $headers, $options); }
    public function noContent($status = 204, array $headers = []) { return $this->make('', $status, $headers); }
    public function stream($callback, $status = 200, array $headers = []) { return new StreamedResponse($callback, $status, $headers); }
    public function streamDownload($callback, $name = null, array $headers = [], $disposition = 'attachment') {
        $response = new StreamedResponse($callback, 200, $headers);
        if ($name !== null) $response->headers->set('Content-Disposition', $response->headers->makeDisposition($disposition, $name));
        return $response;
    }
    public function download($file, $name = null, array $headers = [], $disposition = 'attachment') {
        $response = new BinaryFileResponse($file, 200, $headers, true, $disposition);
        if ($name !== null) $response->setContentDisposition($disposition, $name);
        return $response;
    }
    public function file($file, array $headers = []) { return new BinaryFileResponse($file, 200, $headers); }
}
