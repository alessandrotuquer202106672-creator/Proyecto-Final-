<?php namespace App\Models;

use CodeIgniter\Model;

class FolioModel extends Model
{
    protected $table      = 'folios';
    protected $primaryKey = 'folio_id';
    protected $allowedFields = ['programacion_id','numero_folio','cantidad_pares','estado'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}
