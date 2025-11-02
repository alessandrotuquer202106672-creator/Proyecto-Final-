<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'Usuarios';
    protected $primaryKey = 'usuario_id';
    protected $allowedFields = ['nombre', 'usuario', 'contraseña', 'rol', 'area_id'];

    public function verificarUsuario($usuario, $contraseña)
    {
        $user = $this->where('usuario', $usuario)->first();

        if ($user && $user['contraseña'] === $contraseña) {
            return $user; // Login correcto
        }
        return null; // Falló el login
    }
}
