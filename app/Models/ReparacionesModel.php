<?php

namespace App\Models;

use CodeIgniter\Model;

class ReparacionesModel extends Model
{
    protected $table            = 'reparaciones';          // Nombre de la tabla en la base de datos
    protected $primaryKey       = 'reparacion_id';         // Llave primaria

    // Campos que se pueden insertar o actualizar
    protected $allowedFields    = [
        'movimiento_id',
        'motivo',
        'cantidad',
        'fecha',
        'usuario_id'
    ];

    // Si usas created_at / updated_at en tu tabla, activa esto:
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
}