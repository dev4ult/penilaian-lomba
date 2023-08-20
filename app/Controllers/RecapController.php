<?php

namespace App\Controllers;

// require_once 'vendor/autoload.php';

use App\Models\ContestsModel;
use App\Models\ContestantsModel;
use App\Models\RegisteredConstestantsModel;
use App\Models\ContestantEvaluationsModel;

use App\Models\EvaluationCategoriesModel;
use App\Models\EvaluationSubCategoriesModel;
use App\Models\EvaluationAspectsModel;

use App\Models\ContestantEvaluationsByAspectModel;
use App\Models\ContestantEvaluationsByCategoryModel;

use Dompdf\Dompdf;
use Mpdf\Mpdf;

class RecapController extends BaseController {

    protected $contests_model, $contestants_model, $reg_contestants_model, $contestant_evals_model;

    protected $categories_model, $sub_categories_model, $aspects_model;

    protected $contestant_evals_by_aspect_model, $contestant_evals_by_category_model;

    protected $dompdf;

    protected $mpdf;

    protected $data;

    public function __construct() {
        $this->contests_model = new ContestsModel();
        $this->contestants_model = new ContestantsModel();
        $this->reg_contestants_model = new RegisteredConstestantsModel();
        $this->contestant_evals_model = new ContestantEvaluationsModel();

        $this->categories_model = new EvaluationCategoriesModel();
        $this->sub_categories_model = new EvaluationSubCategoriesModel();
        $this->aspects_model = new EvaluationAspectsModel();


        $this->contestant_evals_by_aspect_model = new ContestantEvaluationsByAspectModel();
        $this->contestant_evals_by_category_model = new ContestantEvaluationsByCategoryModel();

        $this->dompdf = new Dompdf();
        $this->mpdf = new Mpdf();
    }


    public function generate_contest_recap() {
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

            $eval_by_categories = $this->contestant_evals_by_category_model
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
            $this->dompdf->loadHtml(view('templates/recap-contest-pdf', $this->data));

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

    public function generate_contestant_recap() {
        $reg_contestant_id = $this->request->getPost('reg-contestant-id');
        $reg_contestant = $this->reg_contestants_model->find($reg_contestant_id);
        $queue_number = $this->request->getPost('queue-number');
        $duration = $this->request->getPost('duration');

        // return $this->response->setJSON(['contestant' => $contestant]);
        if ($reg_contestant_id && $reg_contestant) {

            $this->data['queue'] = $queue_number;
            $this->data['duration'] = $duration;
            $contest_id = $reg_contestant['contest_id'];
            $contestant_id = $reg_contestant['contestant_id'];

            $this->data['contest'] = $this->contests_model->find($contest_id);
            $this->data['contestant'] = $this->contestants_model->find($contestant_id);

            $this->data['judges'] = $this->contestant_evals_model
                ->select('users.full_name as full_name, users.user_id as user_id')
                ->join('users', 'contestant_evaluations.user_id = users.user_id')
                ->where('contest_id', $contest_id)
                ->where('contestant_id', $contestant_id)
                ->findAll();


            $contest_categories = $this->categories_model
                ->where('contest_id', $contest_id)
                ->findAll();

            // return $this->response->setJSON($contest_categories);

            $this->data['contest_categories'] = $contest_categories;

            $contest_sub_categories = [];
            $contest_aspects = [];

            foreach ($contest_categories as $category) {

                $sub_categories = $this->sub_categories_model
                    ->where('eval_category_id', $category['eval_category_id'])
                    ->findAll();


                if ($sub_categories) {
                    foreach ($sub_categories as $sub_category) {

                        array_push($contest_sub_categories, $sub_category);

                        $aspects = $this->aspects_model
                            ->where('eval_sub_category_id', $sub_category['eval_sub_category_id'])->findAll();

                        if ($aspects) {
                            foreach ($aspects as $aspect) {
                                $aspect['sub_category_id'] = $sub_category['eval_sub_category_id'];
                                array_push($contest_aspects, $aspect);
                            }
                        }
                    }
                }
            }

            $this->data['contest_sub_categories'] = $contest_sub_categories;

            $this->data['contest_aspects'] = $contest_aspects;

            $this->data['category_evaluations'] = $this->contestant_evals_by_category_model
                ->where('contest_id', $contest_id)
                ->where('contestant_id', $contestant_id)
                ->findAll();

            $this->data['aspect_evaluations'] = $this->contestant_evals_by_aspect_model
                ->join('evaluation_aspects', 'contestant_evals_by_aspect.aspect_id = evaluation_aspects.aspect_id')
                ->where('contest_id', $contest_id)
                ->where('contestant_id', $contestant_id)
                ->findAll();


            $this->response->setHeader("Content-Type", "application/pdf");

            // $this->mpdf->WriteHTML('<columns column-count="2" column-gap="7" />');
            // $this->mpdf->Bookmark('Start of the document');
            $this->mpdf->WriteHTML(view('templates/recap-contestant-pdf', $this->data));


            // Output a PDF file directly to the browser
            $this->mpdf->Output('Rekapitulasi Peserta ' . $this->data['contestant']['team_name'] . '.pdf', 'D');
            // $this->mpdf->Output();
        }

        // session()->setFlashdata('error', 'Peserta atau Lomba tidak dapat ditemukan');
        // return redirect()->to(base_url('contests'));
    }
}
