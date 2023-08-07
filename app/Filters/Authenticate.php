<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Authenticate implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        if (!session('logged_in')) {
            session()->setFlashdata('error', 'Silahkan Login terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        //
    }
}
