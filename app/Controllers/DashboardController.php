<?php

namespace App\Controllers;

class DashboardController extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('pages/dashboard');
        echo view('templates/footer');
    }
}
