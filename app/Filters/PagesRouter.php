<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PagesRouter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil URI dari request
        $uri = strtolower($request->getPath());
        $uriSegments = explode('/', $uri);

        // Path ke folder Pages
        $basePath = APPPATH . 'Pages';
        
        // Evaluasi apakah folder sesuai dengan URI
        $found = false;

        while (count($uriSegments) > 0) {
            $folderPath = $basePath . '/' . str_replace('/', DIRECTORY_SEPARATOR, implode('/', $uriSegments));
            if (is_dir($folderPath)) {
                $found = true;
                $uri = implode('/', $uriSegments);
                break;
            }
            $method = array_pop($uriSegments);
        }

        // Jika tidak ada yang cocok, kembalikan 404
        if(! $found) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        
        // Cek apakah ada folder dengan struktur tersebut
        if (is_dir($folderPath)) {
            // Pastikan ada file controller "PageController.php"
            $controllerPath = $folderPath . '/PageController.php';
            if (file_exists($controllerPath)) {
                // Ubah namespace dan jalankan controller
                $controllerNamespace = '\\App\\Pages\\' . str_replace('/', '\\', $uri) . '\\PageController';
                
                // Add route resource for the controller
                $routeCollection = service('routes');
                $routeCollection->resource($uri, ['controller' => $controllerNamespace]);

                return $routeCollection;
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah response
    }
}
