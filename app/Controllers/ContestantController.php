<?php

namespace App\Controllers;

use App\Models\ContestantsModel;
use App\Models\ContestantMembersModel;

class ContestantController extends BaseController {
    protected $contestants_model, $member_model;

    protected $data;

    public function __construct() {
        $this->contestants_model = new ContestantsModel();
        $this->member_model = new ContestantMembersModel();
    }

    public function index() {
        // $sidebar['path'] = "/";

        $this->data['contestants'] = $this->contestants_model->findAll();

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-contestant', $this->data);
        echo view('templates/footer');
    }

    public function search() {
        $this->data['search_keyword'] = $this->request->getPost('search-keyword');

        // $sidebar['path'] = "/";

        if ($this->data['search_keyword']) {
            $this->data['contestants'] = $this->contestants_model
                ->like('team_name', $this->data['search_keyword'])
                ->orLike('leader', $this->data['search_keyword'])
                ->orLike('school', $this->data['search_keyword']);
        }

        $this->data['contestants'] = $this->contestants_model->findAll();

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-contestant', $this->data);
        echo view('templates/footer');
    }

    public function get_add() {
        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/add-contestant');
        echo view('templates/footer');
    }

    public function post_add() {
        $team_credential_fields = [
            "team_name" => $this->request->getPost('team'),
            "leader" => $this->request->getPost('leader'),
            "school" => $this->request->getPost('school'),
            "phone_number" => $this->request->getPost('phone-number'),
        ];

        $total_member = $this->request->getPost('total-member');


        $validationRules = [
            "team_name" => "is_unique[contestants.team_name]"
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('error', 'Nama Tim sudah dipakai peserta lain');
            return redirect()->to(base_url('/contestant/add'));
        }

        $insert = $this->contestants_model->insert($team_credential_fields);

        // return $this->response->setJSON(['total member' => $total_member, 'data' => $member_data]);

        if ($insert) {
            $contestant_id = $this->contestants_model->getInsertID();
            $member_data = [];
            for ($i = 0; $i < (int) $total_member; $i++) {
                array_push($member_data, [
                    "contestant_id" => $contestant_id,
                    "full_name" => $this->request->getPost('member-name-' . $i + 1),
                    "student_id" => $this->request->getPost('nis-' . $i + 1)
                ]);
            }


            $insert_all_member = $this->member_model->insertBatch($member_data);

            if ($insert_all_member) {
                session()->setFlashdata('success', 'Peserta berhasil ditambahkan!');
            }
        }

        return redirect()->to(base_url('/contestants'));
    }

    public function get_detail_json($contestant_id) {
        $contestant = $this->contestants_model->find($contestant_id);

        if ($contestant) {
            $contestant_data = [
                'team' => $contestant['team_name'],
                'leader' => $contestant['leader'],
                'school' =>  $contestant['school'],
                'phone_number' => $contestant['phone_number'],
            ];

            $member = $this->member_model->where('contestant_id', $contestant['contestant_id'])->findAll();
            $contestant_data['member'] = $member;

            return $this->response->setJSON($contestant_data);
        }

        return $this->response->setJSON([
            "status" => 404,
            "message" => "Peserta tidak ditemukan"
        ]);
    }

    public function get_edit($contestant_id) {

        $contestant = $this->contestants_model->find($contestant_id);
        if ($contestant_id && $contestant) {

            $this->data['contestant'] = $contestant;
            $this->data['members'] = $this->member_model->where('contestant_id', $contestant_id)->findAll();

            echo view('templates/header');
            // echo view('templates/sidebar', $sidebar);
            echo view('pages/edit-contestant', $this->data);
            echo view('templates/footer');

            return;
        }

        session()->setFlashdata('error', 'Peserta tidak ditemukan');
        return redirect()->to(base_url('contestants'));
    }

    public function put_edit() {
        $contestant_id = $this->request->getPost('contestant-id');

        $contestant = $this->contestants_model->find($contestant_id);

        if ($contestant_id && $contestant) {

            $put_fields = [
                "team_name" => $this->request->getPost('team'),
                "leader" => $this->request->getPost('leader'),
                "school" => $this->request->getPost('school'),
                "phone_number" => $this->request->getPost('phone-number'),
            ];

            $validationRules = [
                'team_name' => 'is_unique[contestants.team_name, contestant_id, ' . $contestant_id  . ']'
            ];

            if (!$validationRules) {
                session()->setFlashdata('error', 'Nama tim sudah dipakai peserta lain!');
                return redirect()->to(base_url('contestant/edit/' . $contestant_id));
            }




            $update = $this->contestants_model->update($contestant_id, $put_fields);

            if ($update) {
                $delete_all_member = $this->member_model->where('contestant_id', $contestant_id)->delete();

                if ($delete_all_member) {
                    $total_member = $this->request->getPost('total-member');

                    $member_data = [];
                    for ($i = 0; $i < (int) $total_member; $i++) {
                        array_push($member_data, [
                            "contestant_id" => $contestant_id,
                            "full_name" => $this->request->getPost('member-name-' . $i + 1),
                            "student_id" => $this->request->getPost('nis-' . $i + 1)
                        ]);
                    }

                    $insert_all_member = $this->member_model->insertBatch($member_data);

                    if ($insert_all_member) {
                        session()->setFlashdata('success', 'Peserta berhasil diubah datanya!');
                    }
                }
            }

            return redirect()->to(base_url('contestant/edit/' . $contestant_id));
        }

        return redirect()->to(base_url('contestants'));
    }

    public function delete_contestant($contestant_id) {
        $contestant = $this->contestants_model->find($contestant_id);

        if ($contestant_id && $contestant) {
            $delete = $this->contestants_model->delete($contestant_id);

            if ($delete) {
                session()->setFlashdata('success', 'Peserta dengan nama Tim ' . $contestant['team_name'] . ' berhasil dihapus!');
            }
        }

        return redirect()->to(base_url('contestants'));
    }
}
