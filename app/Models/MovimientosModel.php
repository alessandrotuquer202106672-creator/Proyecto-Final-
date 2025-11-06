<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimientosModel extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'movimiento_id';

    protected $allowedFields = [
        'folio_id',
        'area_origen_id',
        'area_destino_id',
        'fecha',
        'usuario_id',
        'tipo',
    ];

    // Si quieres devolver los datos como objetos
    // protected $returnType = \App\Entities\Movimiento::class;

    // Si tu tabla tiene campos created_at y updated_at
    // protected $useTimestamps = true;
}
