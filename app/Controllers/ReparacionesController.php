<?php

namespace App\Controllers;

use App\Models\ReparacionesModel;

class ReparacionesController extends BaseController
{
    public function index(): string
    {
        $reparaciones = new ReparacionesModel();
        $datos['datos'] = $reparaciones->findAll();

        return view('reparaciones', $datos);
    }

    public function agregarReparacion()
    {
        $reparaciones = new ReparacionesModel();

        $datos = [
            'movimiento_id' => $this->request->getPost('txt_movimiento_id'),
            'motivo'        => $this->request->getPost('txt_motivo'),
            'cantidad'      => $this->request->getPost('txt_cantidad'),
            'fecha'         => $this->request->getPost('txt_fecha'),
            'usuario_id'    => $this->request->getPost('txt_usuario_id'),
        ];

        $reparaciones->insert($datos);
        return redirect()->to(base_url('reparaciones'));
    }

    public function eliminarReparaciones($id)
    {
        $reparaciones = new ReparacionesModel();
        $reparaciones->delete($id);
        return redirect()->to(base_url('reparaciones'));
    }

    public function buscarReparaciones($id)
    {
        $reparaciones = new ReparacionesModel();
        $datos['datos'] = $reparaciones->where('reparacion_id', $id)->first();

        return view('form_editar_reparaciones', $datos);
    }

    public function modificarReparaciones()
    {
        $reparaciones = new ReparacionesModel();

        $id = $this->request->getPost('txt_reparacion_id');
        $datos = [
            'movimiento_id' => $this->request->getPost('txt_movimiento_id'),
            'motivo'        => $this->request->getPost('txt_motivo'),
            'cantidad'      => $this->request->getPost('txt_cantidad'),
            'fecha'         => $this->request->getPost('txt_fecha'),
            'usuario_id'    => $this->request->getPost('txt_usuario_id'),
        ];

        $reparaciones->update($id, $datos);
        return redirect()->to(base_url('reparaciones'));
    }
}
