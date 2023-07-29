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

    public function get_add() {
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/add-contestant');
        echo view('templates/footer');
    }

    public function post_add() {
    }
}
