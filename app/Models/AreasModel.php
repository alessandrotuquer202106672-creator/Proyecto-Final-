<?php

namespace App\Models;

use CodeIgniter\Model;

class AreasModel extends Model
{
    protected $table         = 'areas';
    protected $primaryKey ='area_id';
    protected $allowedFields = [
        'area_id', 'nombre','orden',
    ];
    //protected $returnType    = \App\Entities\User::class;
    //protected $useTimestamps = true;
}