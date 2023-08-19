<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluationAspectsModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'evaluation_aspects';
    protected $primaryKey       = 'aspect_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'aspect_id',
        'eval_sub_category_id',
        'aspect_name',
        'aspect_range_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'eval_sub_category_id' => 'required',
        'aspect_name' => 'required',
        'aspect_range_id' => 'required'
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
