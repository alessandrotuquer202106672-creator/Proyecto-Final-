<?php

namespace App\Controllers;

use App\Models\MovimientosModel;
use CodeIgniter\Controller;

class Movimientos extends Controller
{
    protected $movimientosModel;

    public function __construct()
    {
        $this->movimientosModel = new MovimientosModel();
        helper(['form', 'url']);
    }

    // 📋 Mostrar todos los movimientos
    public function index()
    {
        $data['datos'] = $this->movimientosModel->findAll();

        echo view('movimientos', $data);
    }

    // ➕ Agregar un nuevo movimiento
    public function agregar_movimiento()
    {
        $data = [
            'folio_id'        => $this->request->getPost('folio_id'),
            'area_origen_id'  => $this->request->getPost('area_origen_id'),
            'area_destino_id' => $this->request->getPost('area_destino_id'),
            'cantidad'        => $this->request->getPost('cantidad'),
            'fecha'           => $this->request->getPost('fecha'),
            'usuario_id'      => $this->request->getPost('usuario_id'),
            'tipo'            => $this->request->getPost('tipo'),
        ];

        $this->movimientosModel->insert($data);

        return redirect()->to(base_url('movimientos'))->with('mensaje', 'Movimiento agregado con éxito');
    }

    // 🗑️ Eliminar movimiento
    public function eliminar_movimiento($id = null)
    {
        $this->movimientosModel->delete($id);
        return redirect()->to(base_url('movimientos'))->with('mensaje', 'Movimiento eliminado');
    }

    // ✏️ Cargar datos de un movimiento para editar
    public function editar_movimiento($id = null)
    {
        $data['movimiento'] = $this->movimientosModel->find($id);

        if (!$data['movimiento']) {
            return redirect()->to(base_url('movimientos'))->with('error', 'Movimiento no encontrado');
        }

        echo view('editar_movimiento', $data);
    }

    // 💾 Guardar los cambios de la edición
    public function actualizar_movimiento()
    {
        $id = $this->request->getPost('movimiento_id');

        $data = [
            'folio_id'        => $this->request->getPost('folio_id'),
            'area_origen_id'  => $this->request->getPost('area_origen_id'),
            'area_destino_id' => $this->request->getPost('area_destino_id'),
            'cantidad'        => $this->request->getPost('cantidad'),
            'fecha'           => $this->request->getPost('fecha'),
            'usuario_id'      => $this->request->getPost('usuario_id'),
            'tipo'            => $this->request->getPost('tipo'),
        ];

        $this->movimientosModel->update($id, $data);

        return redirect()->to(base_url('movimientos'))->with('mensaje', 'Movimiento actualizado con éxito');
    }
}
