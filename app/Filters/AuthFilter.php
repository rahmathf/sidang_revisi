<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = NULL)
    {
        $session = session();
        // dd(empty(session('id')));
        if (!$session->get('id')) {
            if ($request->uri->getPath() != 'login')
                return redirect()->to('/login')->with('pesan', 'HARAP LOGIN TERLEBIH DAHULU!');
        } else {
            // dd($request->uri->getPath());
            return $request->uri->getPath() == 'login' ? redirect()->back() : null;
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL)
    {
        // if ($request->uri->getPath() == "login") {
        //     return redirect()->back();
        // }
    }
}
