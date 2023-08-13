<?php

namespace App\Controllers;

use App\Models\ContestsModel;
use App\Models\EvaluationCategoriesModel;
use App\Models\RegisteredConstestantsModel;
use App\Models\ContestantEvaluationsModel;
use App\Models\ContestantEvaluationsByCategoryModel;
use Dompdf\Dompdf;

class RecapController extends BaseController {

    protected $contests_model, $categories_model, $reg_contestants_model, $contestant_evals, $contestant_evals_by_category;

    protected $dompdf;

    protected $data;

    public function __construct() {
        $this->contests_model = new ContestsModel();
        $this->categories_model = new EvaluationCategoriesModel();
        $this->reg_contestants_model = new RegisteredConstestantsModel();
        $this->contestant_evals = new ContestantEvaluationsModel();
        $this->contestant_evals_by_category = new ContestantEvaluationsByCategoryModel();

        $this->dompdf = new Dompdf();
    }


    public function generate_recap() {
        $contest_id = $this->request->getPost('contest-id');

        $contest = $this->contests_model->find($contest_id);

        if ($contest_id && $contest) {
            $this->data['contest'] = $contest;

            $categories = $this->categories_model->where('contest_id', $contest_id)->findAll();
            $this->data['categories'] = $categories;

            $checkbox = [];

            foreach ($categories as $category) {
                array_push($checkbox, $this->request->getPost('category-' . $category['eval_category_id']));
            }

            // return $this->response->setJSON($checkbox);


            if (count(array_unique($checkbox)) == 1) {
                session()->setFlashdata('error', 'Tidak ada yang dapat ditampilkan dalam rekap nilai sebagai nilai penentu lomba!');
                return redirect()->to(base_url('contest/' . $contest_id));
            }

            $reg_contestants = $this->reg_contestants_model
                ->join('contestants', 'registered_contestants.contestant_id = contestants.contestant_id')
                ->where('contest_id', $contest_id)
                ->findAll();

            $eval_by_categories = $this->contestant_evals_by_category
                ->join('contestants', 'contestant_evals_by_category.contestant_id = contestants.contestant_id')
                ->where('contest_id', $contest_id)
                ->findAll();

            $this->data['eval_by_categories'] = $eval_by_categories;

            $index_deleted = 0;
            foreach ($eval_by_categories as $index => $eval_category) {
                if (!in_array($eval_category['category_id'], $checkbox)) {
                    array_splice($eval_by_categories, $index - $index_deleted, 1);
                    $index_deleted += 1;
                }
            }

            // return $this->response->setJSON($eval_by_categories);


            $main_evaluation = [];
            $category_evaluation = [];

            foreach ($reg_contestants as $contestant) {
                $total_eval = 0;

                foreach ($eval_by_categories as $eval_category) {
                    if ($eval_category['contestant_id'] == $contestant['contestant_id']) {
                        $total_eval += (int) $eval_category['total_evaluation'];
                    }
                }

                array_push($main_evaluation, [
                    'school' =>  $contestant['school'],
                    'total_eval' => $total_eval
                ]);

                foreach ($categories as $category) {
                    $total_eval = 0;

                    foreach ($this->data['eval_by_categories'] as $eval_category) {
                        if ($eval_category['contestant_id'] == $contestant['contestant_id'] && $eval_category['category_id'] == $category['eval_category_id']) {
                            $total_eval += (int) $eval_category['total_evaluation'];
                        }
                    }

                    array_push($category_evaluation, [
                        'school' =>  $contestant['school'],
                        'category_id' => $category['eval_category_id'],
                        'total_eval' => $total_eval
                    ]);
                }
            }

            // return $this->response->setJSON($category_evaluation);



            array_multisort(array_column($category_evaluation, 'total_eval'), SORT_DESC, $category_evaluation);
            array_multisort(array_column($main_evaluation, 'total_eval'), SORT_DESC, $main_evaluation);

            $this->data['main_table_eval'] = $main_evaluation;
            $this->data['category_table_eval'] = $category_evaluation;
            // return $this->response->setJSON($main_evaluation);


            $filename = $this->request->getPost('filename');

            // load HTML content
            $this->dompdf->loadHtml(view('templates/recap_pdf', $this->data));

            // (optional) setup the paper size and orientation
            $this->dompdf->setPaper('A4', 'portrait');

            // render html as PDF
            $this->dompdf->render();

            // output the generated pdf
            $this->dompdf->stream($filename);

            return redirect()->to(base_url('contest/' . $contest_id));
        }

        session()->setFlashdata('error', 'Lomba tidak dapat ditemukan!');
        return redirect()->to(base_url('contests'));
    }
}
