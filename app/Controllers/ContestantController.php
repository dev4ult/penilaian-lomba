<?php

namespace App\Controllers;

class ContestantController extends BaseController {
    public function index() {
        // $sidebar['path'] = "/";

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-contestant');
        echo view('templates/footer');
    }
}
