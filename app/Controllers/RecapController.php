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
            $categories = $this->categories_model->where('contest_id', $contest_id)->findAll();

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
                ->where('contest_id', $contest_id)
                ->findAll();

            $index_deleted = 0;
            foreach ($eval_by_categories as $index => $eval_category) {
                if (!in_array($eval_category['category_id'], $checkbox)) {
                    array_splice($eval_by_categories, $index - $index_deleted, 1);
                    $index_deleted += 1;
                }
            }

            // return $this->response->setJSON($eval_by_categories);


            $main_evaluation = [];

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
            }

            array_multisort(array_column($main_evaluation, 'total_eval'), SORT_DESC, $main_evaluation);

            $this->data['main_table_eval'] = $main_evaluation;
            // return $this->response->setJSON($main_evaluation);


            $filename = $this->request->getPost('filename');

            // load HTML content
            $this->dompdf->loadHtml(view('templates/recap_pdf', $this->data));

            // (optional) setup the paper size and orientation
            $this->dompdf->setPaper('A4', 'landscape');

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
