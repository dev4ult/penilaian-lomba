<?php

namespace App\Controllers;

class DashboardController extends BaseController {
    public function index() {
        // $sidebar['path'] = "/";

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/dashboard');
        echo view('templates/footer');
    }
}
