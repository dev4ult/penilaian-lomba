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

        $this->data['users'] = $this->users_model->findAll();

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-user', $this->data);
        echo view('templates/footer');
    }

    public function search() {
        $this->data['search_keyword'] = $this->request->getPost('search-keyword');
        $this->data['filter_role'] = $this->request->getPost('filter-role');

        if ($this->data['filter_role']) {
            $this->data['users'] = $this->users_model
                ->where('role', $this->data['filter_role']);
        }

        if ($this->data['search_keyword']) {
            $this->data['users'] = $this->users_model
                ->Like('username', $this->data['search_keyword']);
        }

        $this->data['users'] = $this->users_model->findAll();

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-user', $this->data);
        echo view('templates/footer');
    }

    public function post_add() {
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('password-conf');

        if ($password != $confirm_password) {
            session()->setFlashdata('error', 'Password Konfirmasi tidak sesuai!');
            return redirect()->to(base_url('users'));
        }

        $validationRules = [
            'username' => 'is_unique[users.username]',
            'staff_id' => 'is_unique[users.staff_id]',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('error', 'Username atau NIS/P sudah diambil user lain');
            return redirect()->to('users');
        }

        $post_fields = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash((string) $password, PASSWORD_DEFAULT),
            'full_name' => $this->request->getPost('full-name'),
            'phone_number' => $this->request->getPost('phone-number'),
            'staff_id' => $this->request->getPost('nip-nis'),
            'role' => $this->request->getPost('role'),
        ];

        $insert = $this->users_model->insert($post_fields);

        if ($insert) {
            session()->setFlashdata('success', 'Berhasil menambahkan user baru!');
        }

        return redirect()->to(base_url('users'));
    }

    public function get_detail_json($user_id) {
        $user = $this->users_model->find($user_id);

        if ($user) return $this->response->setJSON($user);

        return $this->response->setJSON([
            "status" => 404,
            "message" => "User tidak ditemukan"
        ]);
    }

    public function put_edit() {
        $user_id = $this->request->getPost('user-id');
        $password = $this->request->getPost('password');

        $put_fields = [
            'username' => $this->request->getPost('username'),
            // 'password' => $password,
            'full_name' => $this->request->getPost('full-name'),
            'phone_number' => $this->request->getPost('phone-number'),
            'staff_id' => $this->request->getPost('nip-nis'),
            'role' => $this->request->getPost('role'),
        ];

        $user = $this->users_model->find($user_id);

        if ($user_id && $user) {

            $validationRules = [
                'username' => 'is_unique[users.username, user_id,' . $user_id . ']',
                'staff_id' => 'is_unique[users.staff_id, user_id,' . $user_id . ']',
            ];

            if (!$this->validate($validationRules)) {
                session()->setFlashdata('error', 'Username atau NIS/P sudah diambil user lain');
                return redirect()->to(base_url('users'));
            }

            if ($password) {
                $put_fields['password'] = password_hash((string) $password, PASSWORD_DEFAULT);
            }

            $update = $this->users_model->update($user_id, $put_fields);

            if ($update) {
                session()->setFlashdata('success', 'User ' . $put_fields['username'] . ' berhasil diubah datanya!');
            }

            return redirect()->to(base_url('/users'));
        }
    }

    public function delete_user($user_id) {
        $user = $this->users_model->find($user_id);


        if ($user_id && $user) {
            $delete = $this->users_model->delete($user_id);

            if ($delete) {
                session()->setFlashdata('success', 'User ' . $user['username'] . ' berhasil dihapus!');
            }
        }


        return redirect()->to(base_url('users'));
    }
}
