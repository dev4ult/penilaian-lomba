<?php

namespace App\Controllers;

class UserController extends BaseController {
    public function index() {
        // $sidebar['path'] = "/";

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-user');
        echo view('templates/footer');
    }
}
