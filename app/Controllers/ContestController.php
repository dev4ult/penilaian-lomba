<?php

namespace App\Controllers;

class ContestController extends BaseController {
    public function index() {
        // $sidebar['path'] = "/";

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-contest');
        echo view('templates/footer');
    }
}
