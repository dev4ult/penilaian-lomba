<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AuthController extends BaseController {
    protected $users_model;


    public function __construct() {

        $this->users_model = new UsersModel();
    }

    public function index() {
        echo view('templates/header-login');
        echo view('pages/login');
        echo view('templates/footer');
    }

    public function login() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->users_model->where('username', $username)->first();

        if ($user) {
            if (password_verify((string) $password, $user['password'])) {
                session()->set([
                    'user_id'   => $user['user_id'],
                    'user_role' => $user['role'],
                    'logged_in' => true,
                ]);

                session()->setFlashdata('success', 'Berhasil login!');
                return redirect()->to(base_url('/'));
            }
        }

        session()->setFlashdata('error', 'Username atau password salah!');
        return redirect()->to(base_url('login'));
    }

    public function logout() {
        session_destroy();
        return redirect()->to(base_url('login'));
    }
}
