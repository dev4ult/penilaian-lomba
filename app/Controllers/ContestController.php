<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ContestController extends BaseController {
    protected $users_model;

    protected $data;

    public function __construct() {
        $this->users_model = new UsersModel();
    }

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
        // $sidebar['path'] = "/";

        $this->data['judges'] = $this->users_model->where('role', 'juri')->findAll();

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/add-contest', $this->data);
        echo view('templates/footer');
    }

    public function post_add() {
        $contest_data = [
            'contest_name' => $this->request->getPost('contest-name'),
            'organizer' => $this->request->getPost('organizer'),
            'description' => $this->request->getPost('description'),
            'date' => $this->request->getPost('date'),
            'time' => $this->request->getPost('time'),
            'held_on' => $this->request->getPost('held-on'),
            'category' => $this->request->getPost('category'),
        ];
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
