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

    public function detail($contest_id) {
        // $sidebar['path'] = "/";

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/detail-contest');
        echo view('templates/footer');
    }

    public function get_add() {
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/add-contest');
        echo view('templates/footer');
    }

    public function post_add() {
    }

    public function get_edit() {
    }

    public function put_edit() {
    }
}
