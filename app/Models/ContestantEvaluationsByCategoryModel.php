<?php

namespace App\Models;

use CodeIgniter\Model;

class ContestantEvaluationsByCategoryModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'contestant_evals_by_category';
    protected $primaryKey       = 'contestant_eval_category_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'contest_id',
        'contestant_id',
        'category_id',
        'user_id',
        'total_evaluation'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'contest_id' => 'required',
        'contestant_id' => 'required',
        'category_id' => 'required',
        'user_id' => 'required',
        'total_evaluation' => 'required'
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
