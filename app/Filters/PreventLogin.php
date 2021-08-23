<?php

namespace App\Filters;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Filters\FilterInterface;

class PreventLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($request->uri->getPath() == 'login') {
            return redirect()->back();
        }
    }
    public function after(RequestInterface $requestInterface, ResponseInterface $responseInterface, $arg = null)
    {
        # code...
    }
}
