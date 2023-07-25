<?php

namespace App\Controllers;

class AuthController extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('pages/login');
        echo view('templates/footer');
    }
}
