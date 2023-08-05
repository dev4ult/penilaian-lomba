<?php

namespace App\Models;

use CodeIgniter\Model;

class ContestsModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'contests';
    protected $primaryKey       = 'contest_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'contest_name',
        'picture',
        'organizer',
        'description',
        'date',
        'time_start',
        'time_end',
        'held_on',
        'category'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'contest_name' => 'required',
        'organizer' => 'required',
        'description' => 'required',
        'date' => 'required',
        'time_start' => 'required',
        'time_end' => 'required',
        'held_on' => 'required',
        'category' => 'required'
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
