<?php
namespace App\Controllers;
class Home extends BaseController
{
    public function index()
    {
        $file = FCPATH . 'build/index.html';
        if (!is_file($file)) return $this->response->setStatusCode(503)->setBody('Build the iCARE frontend with npm install and npm run build.');
        return $this->response->setContentType('text/html')->setBody(file_get_contents($file));
    }
    public function health() { return $this->response->setJSON(['message'=>'iCARE API is running.', 'framework'=>'CodeIgniter 4']); }
}
