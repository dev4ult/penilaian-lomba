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
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/edit-contest');
        echo view('templates/footer');
    }

    public function put_edit() {
    }

    public function get_contestant_eval() {
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/edit-contestant-eval');
        echo view('templates/footer');
    }

    public function get_eval_aspect() {
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/detail-evaluation');
        echo view('templates/footer');
    }
}
