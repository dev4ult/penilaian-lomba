<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ContestsModel;
use App\Models\ContestantsModel;

class DashboardController extends BaseController {

    protected $users_model, $contests_model, $contestants_model;

    protected $data;

    protected $user_logged_id;

    public function __construct() {
        $this->users_model = new UsersModel();
        $this->contests_model = new ContestsModel();
        $this->contestants_model = new ContestantsModel();

        $this->user_logged_id = session('user_id');
    }

    public function index() {
        // $sidebar['path'] = "/";

        $this->data['user'] = $this->users_model->find($this->user_logged_id);

        $this->data['total_users'] = count($this->users_model->findAll());
        $this->data['total_contests'] = count($this->contests_model->findAll());
        $this->data['total_contestants'] = count($this->contestants_model->findAll());

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/dashboard', $this->data);
        echo view('templates/footer');
    }
}
