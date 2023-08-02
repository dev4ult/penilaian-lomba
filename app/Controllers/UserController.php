<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UserController extends BaseController {
    protected $users_model;
    protected $data;

    public function __construct() {
        $this->users_model = new UsersModel();
    }

    public function index() {
        // $sidebar['path'] = "/";


        $this->data['users'] = $this->users_model->findAll(1);
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-user', $this->data);
        echo view('templates/footer');
    }
}
