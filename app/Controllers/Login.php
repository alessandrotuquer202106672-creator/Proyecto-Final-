<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login_view');
    }

    public function autenticar()
    {
        $usuario = $this->request->getPost('usuario');
        $contraseña = $this->request->getPost('contraseña');

        $usuarioModel = new UsuarioModel();
        $user = $usuarioModel->verificarUsuario($usuario, $contraseña);

        if ($user) {
            session()->set([
                'usuario_id' => $user['usuario_id'],
                'nombre'     => $user['nombre'],
                'rol'        => $user['rol'],
                'logueado'   => true
            ]);

            // Redirigir según rol
            switch ($user['rol']) {
                case 'admin':
                    return redirect()->to('/dashboard/admin');
                case 'supervisor':
                    return redirect()->to('/dashboard/supervisor');
                case 'operador':
                    return redirect()->to('/dashboard/operador');
            }
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
