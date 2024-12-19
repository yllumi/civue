<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Pages implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $segments = $request->uri->getSegments();
        $controller = implode('/', $segments);
        $request->setNamespace('App\Controllers\Pages');
        $request->setController($controller);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu diisi
    }
}