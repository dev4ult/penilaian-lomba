<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ContestsModel;
use App\Models\JudgesModel;
use App\Models\EvaluationCategoriesModel;
use App\Models\EvaluationSubCategoriesModel;
use App\Models\EvaluationAspectsModel;
use App\Models\ContestantsModel;
use App\Models\ContestantEvaluationsModel;
use App\Models\ContestantEvaluationsByCategoryModel;
use App\Models\RegisteredConstestantsModel;


class ContestController extends BaseController {
    protected $users_model, $contests_model, $judges_model, $eval_categories_model, $eval_sub_categories_model, $eval_aspects_model, $contestants_model, $contestant_eval_model, $contestant_eval_by_category_model, $reg_contestants_model;

    protected $user_logged;

    protected $data;

    public function __construct() {
        $this->users_model = new UsersModel();
        $this->contests_model = new ContestsModel();
        $this->judges_model = new JudgesModel();

        $this->eval_categories_model = new EvaluationCategoriesModel();
        $this->eval_sub_categories_model = new EvaluationSubCategoriesModel();
        $this->eval_aspects_model = new EvaluationAspectsModel();

        $this->contestants_model = new ContestantsModel();
        $this->contestant_eval_model = new ContestantEvaluationsModel();
        $this->contestant_eval_by_category_model = new ContestantEvaluationsByCategoryModel();

        $this->reg_contestants_model = new RegisteredConstestantsModel();

        $this->user_logged = session()->get('user_logged');
    }

    public function index() {
        // $sidebar['path'] = "/";

        $this->data['contests'] = $this->contests_model->findAll();

        echo view('templates/header');
        // echo view('templates/sidebar', $sidebar);
        echo view('pages/manage-contest', $this->data);
        echo view('templates/footer');
    }

    public function get_detail($contest_id) {
        // $sidebar['path'] = "/";

        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $this->data['contest'] = $contest;
            $this->data['judges'] = $this->judges_model->join('users', 'users.user_id = judges.user_id')->where('contest_id', $contest_id)->findAll();
            $this->data['categories'] = $this->eval_categories_model->where('contest_id', $contest_id)->findAll();

            $this->data['reg_contestants'] = $this->reg_contestants_model->join('contestants', 'contestants.contestant_id = registered_contestants.contestant_id')->where('contest_id', $contest_id)->findAll();

            $this->data['contestants'] = $this->contestants_model->findAll();

            echo view('templates/header');

            // echo view('templates/sidebar', $sidebar);
            echo view('pages/detail-contest', $this->data);
            echo view('templates/footer');

            return;
        }

        session()->setFlashdata('error', 'Lomba tidak ditemukan!');
        return redirect()->to(base_url('contests'));
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
        $time_start = $this->request->getPost('time-start');
        $time_end = $this->request->getPost('time-end');

        if (strtotime((string) $time_start) >= strtotime((string) $time_end)) {
            session()->setFlashdata('error', 'Waktu mulai tidak bisa lebih dari waktu selesai lomba');
            return redirect()->to(base_url('contest/add'));
        }

        $post_fields = [
            'contest_name' => $this->request->getPost('contest-name'),
            'organizer' => $this->request->getPost('organizer'),
            'description' => $this->request->getPost('description'),
            'date' => $this->request->getPost('date'),
            'time_start' => $time_start,
            'time_end' => $time_end,
            'held_on' => $this->request->getPost('held-on'),
            'category' => $this->request->getPost('category'),
        ];

        $validationRules = [
            'contest-name' => 'is_unique[contests.contest_name]'
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('error', 'Nama Lomba sudah ada atau tidak boleh sama dengan lomba lain!');
            return redirect()->to(base_url('contest/add'));
        }

        $picture = $this->request->getFile('picture');

        if ($picture->isValid()) {
            $imageValidationRules = [
                'picture' => 'uploaded[picture]|max_size[picture,16000]|mime_in[picture,image/jpg,image/jpeg,image/gif,image/png]'
            ];

            if (!$this->validate($imageValidationRules)) {
                session()->setFlashdata('error', 'Gambar tidak sesuai format atau melebihi 16 mb!');
                return redirect()->to(base_url('contest/add'));
            }

            $post_fields['picture'] = file_get_contents($picture->getTempName());
        }


        $insert = $this->contests_model->insert($post_fields);

        if ($insert) {
            $contest_id = $this->contests_model->getInsertID();

            $total_judges = (int) $this->request->getPost('total-judges');
            $total_eval_categories = (int) $this->request->getPost('total-eval-category');

            $data_judges = [];
            for ($i = 0; $i < $total_judges; $i++) {
                array_push($data_judges, [
                    "contest_id" => $contest_id,
                    "user_id" => $this->request->getPost('judge-' . $i + 1)
                ]);
            }

            if (count($data_judges) > 0) $this->judges_model->insertBatch($data_judges);



            $data_eval_categories = [];
            for ($i = 0; $i < $total_eval_categories; $i++) {
                array_push($data_eval_categories, [
                    "contest_id" => $contest_id,
                    "category_name" => $this->request->getPost('category-' . $i + 1)
                ]);
            }

            if (count($data_eval_categories)) $this->eval_categories_model->insertBatch($data_eval_categories);


            session()->setFlashdata('success', 'Lomba berhasil dibuat / dipublikasikan!');
        }

        return redirect()->to(base_url('contests'));
    }

    public function get_edit($contest_id) {

        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $this->data['contest'] = $contest;
            $this->data['judges'] = $this->judges_model->join('users', 'users.user_id = judges.user_id')->findAll();
            $this->data['judges_contest'] = $this->judges_model->join('users', 'users.user_id = judges.user_id')->where('contest_id', $contest_id)->findAll();
            $this->data['categories'] = $this->eval_categories_model->where('contest_id', $contest_id)->findAll();

            echo view('templates/header');
            // var_dump($this->data['judges']);
            // echo view('templates/sidebar', $sidebar);
            echo view('pages/edit-contest', $this->data);
            echo view('templates/footer');

            return;
        }

        session()->setFlashdata('error', 'Lomba tidak dapat ditemukan!');
        return redirect()->to(base_url('contests'));
    }

    public function put_edit() {
        $contest_id = $this->request->getPost('contest-id');
        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $time_start = $this->request->getPost('time-start');
            $time_end = $this->request->getPost('time-end');

            if (strtotime((string) $time_start) >= strtotime((string) $time_end)) {
                session()->setFlashdata('error', 'Waktu mulai tidak bisa lebih dari waktu selesai lomba');
                return redirect()->to(base_url('contest/edit/' . $contest_id));
            }

            $put_fields = [
                'contest_name' => $this->request->getPost('contest-name'),
                'organizer' => $this->request->getPost('organizer'),
                'description' => $this->request->getPost('description'),
                'date' => $this->request->getPost('date'),
                'time_start' => $time_start,
                'time_end' => $time_end,
                'held_on' => $this->request->getPost('held-on'),
                'category' => $this->request->getPost('category'),
            ];

            $validationRules = [
                'contest-name' => 'is_unique[contests.contest_name, contest_id, ' . $contest_id . ']'
            ];

            if (!$this->validate($validationRules)) {
                session()->setFlashdata('error', 'Nama Lomba sudah ada atau tidak boleh sama dengan lomba lain!');
                return redirect()->to(base_url('contest/edit/' . $contest_id));
            }

            $picture = $this->request->getFile('picture');

            if ($picture->isValid()) {
                $imageValidationRules = [
                    'picture' => 'uploaded[picture]|max_size[picture,16000]|mime_in[picture,image/jpg,image/jpeg,image/gif,image/png]'
                ];

                if (!$this->validate($imageValidationRules)) {
                    session()->setFlashdata('error', 'Gambar tidak sesuai format atau melebihi 16 mb!');
                    return redirect()->to(base_url('contest/add'));
                }

                $put_fields['picture'] = file_get_contents($picture->getTempName());
            }

            $update = $this->contests_model->update($contest_id, $put_fields);

            if ($update) {

                $total_judges = (int) $this->request->getPost('total-judges');
                // $total_eval_categories = (int) $this->request->getPost('total-eval-category');

                $this->judges_model->where('contest_id', $contest_id)->delete();

                $data_judges = [];
                for ($i = 0; $i < $total_judges; $i++) {
                    array_push($data_judges, [
                        "contest_id" => $contest_id,
                        "user_id" => $this->request->getPost('judge-' . $i + 1)
                    ]);
                }

                if (count($data_judges) > 0) $this->judges_model->insertBatch($data_judges);

                // $this->eval_categories_model->where('contest_id', $contest_id)->delete();

                // $data_eval_categories = [];
                // for ($i = 0; $i < $total_eval_categories; $i++) {
                //     array_push($data_eval_categories, [
                //         "contest_id" => $contest_id,
                //         "category_name" => $this->request->getPost('category-' . $i + 1)
                //     ]);
                // }

                // if (count($data_eval_categories)) $this->eval_categories_model->insertBatch($data_eval_categories);

                session()->setFlashdata('success', 'Lomba berhasil diubah informasinya!');

                return redirect()->to(base_url('contest/edit/' . $contest_id));
            }
        }

        session()->setFlashdata('error', 'Lomba tidak dapat ditemukan!');

        return redirect()->to(base_url('contests'));
    }

    public function get_register_contestants_json($contest_id) {

        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $reg_contestants = $this->reg_contestants_model->join('contestants', 'contestants.contestant_id = registered_contestants.contestant_id')->where('contest_id', $contest_id)->findAll();

            return $this->response->setJSON([
                'status' => 200,
                'data' => $reg_contestants
            ]);
        }

        return $this->response->setJSON([
            'status' => 404,
            'message' => 'Lomba tidak dapat ditemukan!'
        ]);
    }

    public function register_contestant() {
        $team_name = $this->request->getPost('team-name');
        $contest_id = $this->request->getPost('contest-id');

        $contestant = $this->contestants_model->where('team_name', $team_name)->first();

        // return $this->response->setJSON($contestant);

        if ($contestant) {
            $reg_contestant = $this->reg_contestants_model
                ->where('contest_id', $contest_id)
                ->where('contestant_id', $contestant['contestant_id'])
                ->find();

            if (!$reg_contestant) {


                $insert = $this->reg_contestants_model->insert([
                    'contest_id' => $contest_id,
                    'contestant_id' => $contestant['contestant_id']
                ]);

                if ($insert) {
                    return $this->response->setJSON([
                        'status' => 200,
                        'message' => 'Peserta dengan nama Tim ' . $team_name . ' berhasil didaftarkan!'
                    ]);
                }
            }

            return $this->response->setJSON([
                'status' => 400,
                'message' => 'Peserta dengan nama Tim ' . $team_name . ' sudah terdaftar dilomba ini'
            ]);
        }

        return $this->response->setJSON([
            'status' => 404,
            'message' => 'Peserta dengan nama Tim ' . $team_name . ' tidak ditemukan1'
        ]);
    }

    public function remove_contestant($contest_id, $contestant_id) {
        $reg_contestant = $this->reg_contestants_model
            ->where('contest_id', $contest_id)
            ->where('contestant_id', $contestant_id)->first();

        if ($reg_contestant) {
            $delete = $this->reg_contestants_model->where('contest_id', $contest_id)->where('contestant_id', $contestant_id)->delete();

            if ($delete) {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Peserta berhasil dihapus dari lomba ini!'
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => 404,
            'message' => 'Peserta tidak ditemukan dalam lomba ini!'
        ]);

        // return $this->response->setJSON(["contest" => $contest_id, "contestant_id" => $contestant_id]);
    }

    public function get_eval_aspect($contest_id) {

        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $this->data['contest'] = $contest;

            $this->data['categories'] = $this->eval_categories_model->where('contest_id', $contest_id)->findAll();

            foreach ($this->data['categories'] as $category) {
                $category_id = $category['eval_category_id'];
                $this->data['total_sub_categories'][$category_id] = count($this->eval_sub_categories_model->where('eval_category_id', $category_id)->findAll());
            }

            $this->data['sub_categories'] = $this->eval_sub_categories_model->findAll();
            $this->data['evaluation_aspects'] = $this->eval_aspects_model->findAll();

            echo view('templates/header');
            // echo view('templates/sidebar', $sidebar);
            echo view('pages/detail-evaluation', $this->data);
            echo view('templates/footer');

            return;
        }

        session()->setFlashdata('error', 'Lomba tidak dapat ditemukan!');
        return redirect()->to(base_url('contests'));
    }

    public function post_eval_aspect() {
        $contest_id = $this->request->getPost('contest-id');
        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $category_name = $this->request->getPost('category-name');

            $is_name_exist = $this->eval_categories_model->where('contest_id', $contest_id)->where('category_name', $category_name)->find();

            if ($is_name_exist) {
                session()->setFlashdata('error', 'Nama Kategori tersebut sudah ada dalam lomba ini!');
                return redirect()->to(base_url('contest/evaluation-aspect/' . $contest_id));
            }

            $post_fields = [
                'contest_id' => $contest_id,
                'category_name' => $category_name
            ];

            $insert_category = $this->eval_categories_model->insert($post_fields);

            if ($insert_category) {
                session()->setFlashdata('success', 'Kategori baru berhasil ditambah!');
            }

            return redirect()->to(base_url('contest/evaluation-aspect/' . $contest_id));
        }


        session()->setFlashdata('error', 'Lomba tidak dapat ditemukan!');
        return redirect()->to(base_url('contests'));
    }

    public function put_eval_aspect() {
        $contest_id = $this->request->getPost('contest-id');
        $category_id = $this->request->getPost('category-id');
        $category_name = $this->request->getPost('category-name');

        $sub_categories = json_decode((string) $this->request->getPost('evaluation-aspect'), true);

        $update_name = $this->eval_categories_model->update($category_id, ['category_name' => $category_name]);

        foreach ($sub_categories as $sub_category) {
            // print($sub_category['subCategoryId']);
            if ($sub_category['subCategoryId'] == null) {
                $post_fields = [
                    'eval_category_id' => $category_id,
                    'sub_category_name' => $sub_category['subCategoryName']
                ];

                $insert_sub = $this->eval_sub_categories_model->insert($post_fields);

                $aspect_data = [];

                $sub_category_id = $this->eval_sub_categories_model->getInsertID();

                foreach ($sub_category['aspects'] as $aspect) {
                    array_push($aspect_data, [
                        'eval_sub_category_id' => $sub_category_id,
                        'aspect_name' => $aspect['name'],
                        'aspect_range_id' => $aspect['range'],
                    ]);
                }

                $insert_aspect_batch = $this->eval_aspects_model->insertBatch($aspect_data);
            } else if ($sub_category['subCategoryId'] == 'delete' && $sub_category['deleteId'] != null) {
                $delete_sub = $this->eval_sub_categories_model->delete($sub_category['deleteId']);
            } else {
                $put_fields = [
                    'eval_category_id' => $category_id,
                    'sub_category_name' => $sub_category['subCategoryName']
                ];

                $update_sub = $this->eval_sub_categories_model->update($sub_category['subCategoryId'], $put_fields);

                foreach ($sub_category['aspects'] as $aspect) {
                    if ($aspect['aspectId'] == null) {
                        $post_aspect_fields = [
                            'eval_sub_category_id' => $sub_category['subCategoryId'],
                            'aspect_name' => $aspect['name'],
                            'aspect_range_id' => $aspect['range'],
                        ];

                        $insert_aspect = $this->eval_aspects_model->insert($post_aspect_fields);
                    } else if ($aspect['aspectId'] == 'delete' && $aspect['deleteId'] != null) {
                        $delete_aspect = $this->eval_aspects_model->delete($aspect['deleteId']);
                    } else {
                        $put_aspect_fields = [
                            'eval_sub_category_id' => $sub_category['subCategoryId'],
                            'aspect_name' => $aspect['name'],
                            'aspect_range_id' => $aspect['range'],
                        ];

                        // return $this->response->setJSON([$put_aspect_fields]);
                        $update_aspect = $this->eval_aspects_model->update($aspect['aspectId'], $put_aspect_fields);
                    }
                }
            }
        }

        return $this->response->setJSON([
            'status' => 200,
            'message' => 'Berhasil mengubah data penilaian kategori'
        ]);
    }

    public function delete_eval_aspect($contest_id, $category_id) {
        $category = $this->eval_categories_model->find($category_id);
        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest && $category_id && $category) {

            $delete = $this->eval_categories_model->delete($category_id);

            if ($delete) {
                session()->setFlashdata('success', 'Kategori Lomba berhasil dihapus!');
            }

            return redirect()->to(base_url('contest/evaluation-aspect/' . $contest_id));
        }

        session()->setFlashdata('error', 'Kategori Lomba tidak dapat ditemukan!');
        return redirect()->to(base_url('contests'));
    }

    public function get_contestant_eval($contest_id, $contestant_id) {

        $contest = $this->contests_model->find($contest_id);

        $reg_contestant = $this->reg_contestants_model
            ->join('contestants', 'registered_contestants.contestant_id = contestants.contestant_id')
            ->where('contest_id', $contest_id)
            ->where('contestants.contestant_id', $contestant_id)->first();

        if ($contestant_id && $reg_contestant && $contest_id && $contest) {
            $this->data['contest'] = $contest;
            $this->data['contestant'] = $reg_contestant;

            $this->data['categories'] = $this->eval_categories_model->where('contest_id', $contest_id)->findAll();

            $this->data['sub_categories'] = $this->eval_sub_categories_model->findAll();
            $this->data['evaluation_aspects'] = $this->eval_aspects_model->findAll();

            echo view('templates/header');
            // echo view('templates/sidebar', $sidebar);
            echo view('pages/edit-contestant-eval', $this->data);
            echo view('templates/footer');
        }
    }

    public function put_contestant_eval() {
        $contest_id = $this->request->getPost('contest-id');
        $contestant_id = $this->request->getPost('contestant-id');

        $reg_contestant = $this->reg_contestants_model
            ->join('contestants', 'registered_contestants.contestant_id = contestants.contestant_id')
            ->where('registered_contestants.contest_id', $contest_id)
            ->where('registered_contestants.contestant_id', $contestant_id)
            ->first();

        if ($contest_id && $contestant_id && $reg_contestant) {
            // check if user is registered as a judge
            // $user = $this->judges_model
            //     ->where('user_id', $this->user_logged['user_id'])
            //     ->where('contest_id', $contest_id)
            //     ->find();

            // if (!$user) {
            //     session()->setFlashdata('error', 'User tersebut tidak terdaftar sebagai juri!');
            //     return redirect()->to(base_url('contest/' . $contest_id));
            // }

            $total_eval = 0;

            $categories = $this->eval_categories_model->where('contest_id', $contest_id)->findAll();

            $sub_categories = $this->eval_sub_categories_model->findAll();
            $eval_aspects = $this->eval_aspects_model->findAll();

            $contestant_evaluation = [];
            $total_per_category = [];

            foreach ($categories as $category) {
                $total_category_eval = 0;
                $category_id = $category['eval_category_id'];

                foreach ($sub_categories as $sub_category) {
                    $sub_category_id = $sub_category['eval_sub_category_id'];

                    if ($sub_category['eval_category_id'] == $category_id) {

                        foreach ($eval_aspects as $aspect) {

                            if ($aspect['eval_sub_category_id'] == $sub_category_id) {
                                array_push($contestant_evaluation, [
                                    'Aspect Name' => $aspect['aspect_name'],
                                    'Value' => (int) $this->request->getPost('options-' . $aspect['aspect_id'])
                                ]);

                                $total_eval += (int) $this->request->getPost('options-' . $aspect['aspect_id']);
                                $total_category_eval += (int) $this->request->getPost('options-' . $aspect['aspect_id']);
                            }
                        }
                    }
                }

                array_push($total_per_category, [
                    'contest_id' => $contest_id,
                    'contestant_id' => $contestant_id,
                    'category_id' => $category_id,
                    'user_id' => 1,
                    'total_evaluation' => $total_category_eval
                ]);
            }

            $post_fields = [
                'contest_id' => $contest_id,
                'contestant_id' => $contestant_id,
                'user_id' => 1,
                'total_evaluation' => $total_eval
            ];

            $is_eval_exist = $this->contestant_eval_model
                ->where('contest_id', $contest_id)
                ->where('contestant_id', $contestant_id)
                ->where('user_id', 1)
                ->find();

            if ($is_eval_exist) {
                $update = $this->contestant_eval_model
                    ->where('contest_id', $contest_id)
                    ->where('contestant_id', $contestant_id)
                    ->where('user_id', 1)
                    ->set($post_fields)
                    ->update();

                foreach ($total_per_category as $category_eval_fields) {
                    $update_per_category = $this->contestant_eval_by_category_model
                        ->where('contest_id', $contest_id)
                        ->where('contestant_id', $contestant_id)
                        ->where('user_id', 1)
                        ->where('category_id', $category_eval_fields['category_id'])
                        ->set($category_eval_fields)
                        ->update();
                }
            } else {
                $insert = $this->contestant_eval_model->insert($post_fields);

                $insert_batch = $this->contestant_eval_by_category_model->insertBatch($total_per_category);
            }


            // return $this->response->setJSON($reg_contestant);
            session()->setFlashdata('success', 'Tim / Peserta ' .  $reg_contestant['team_name'] . ' / ' . $reg_contestant['leader'] . ' berhasil diberi nilai');
            return redirect()->to(base_url('contest/' . $contest_id));
        }

        session()->setFlashdata('error', 'Nama Lomba / Peserta tidak dapat ditemukan!');
        return redirect()->to(base_url('contests'));
    }
}
