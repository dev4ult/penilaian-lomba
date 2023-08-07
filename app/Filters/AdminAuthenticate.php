<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthenticate implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        if (session('user_role') != 'admin') {
            session()->setFlashdata('error', 'Anda tidak memiliki akses ke halaman tersebut');
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        //
    }
}
