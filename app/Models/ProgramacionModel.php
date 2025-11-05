<?php namespace App\Models;

use CodeIgniter\Model;

class ProgramacionModel extends Model
{
    protected $table      = 'programaciones';
    protected $primaryKey = 'programacion_id';
    protected $allowedFields = ['estilo','cantidad_total','pares_por_folio','fecha_inicio','responsable_id'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}
