<?php

namespace App\Controllers;

class DashboardController extends BaseController {
    public function index() {
        $navbar['path'] = "/";

        echo view('templates/header');
        echo view('templates/navbar', $navbar);
        echo view('pages/dashboard');
        echo view('templates/footer');
    }
}
