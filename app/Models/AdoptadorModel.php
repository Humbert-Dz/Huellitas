<?php

namespace App\Models;

use CodeIgniter\Model;

class AdoptadorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adoptadores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['nombre', 'apellido_paterno', 'apellido_paterno', 'sexo', 'estado', 'municipio', 'localidad', 'calle', 'numero_casa', 'telefono', 'correo'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';


    // Validation
    protected $validationRules      = [];
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

