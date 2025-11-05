<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FolioModel;

class Folios extends BaseController
{
    protected $folioModel;

    public function __construct()
    {
        $this->folioModel = new FolioModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['folios'] = $this->folioModel->orderBy('folio_id', 'DESC')->findAll();
        echo view('layouts/header');
        echo view('folios/index', $data);
        echo view('layouts/footer');
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $post = $this->request->getPost();

            $data = [
                'programacion_id' => (int) $post['programacion_id'],
                'numero_folio'    => trim($post['numero_folio']),
                'cantidad_pares'  => (int) $post['cantidad_pares'],
                'estado'          => $post['estado']
            ];

            if (! $this->folioModel->insert($data)) {
                return redirect()->back()->withInput()->with('errors', $this->folioModel->errors());
            }

            return redirect()->to('/folios')->with('success', 'Folio agregado correctamente.');
        }

        echo view('layouts/header');
        echo view('folios/create');
        echo view('layouts/footer');
    }

    // Acción POST para eliminar (segura)
    public function delete($id = null)
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/folios')->with('error', 'Método no permitido.');
        }

        if ($id === null || ! is_numeric($id)) {
            return redirect()->to('/folios')->with('error', 'ID inválido.');
        }

        $folio = $this->folioModel->find($id);
        if (!$folio) {
            return redirect()->to('/folios')->with('error', 'Folio no encontrado.');
        }

        if ($this->folioModel->delete($id)) {
            return redirect()->to('/folios')->with('success', 'Folio eliminado correctamente.');
        }

        return redirect()->to('/folios')->with('error', 'No se pudo eliminar el folio.');
    }

    // Confirmación GET (muestra vista de confirmación)
    public function confirmDelete($id = null)
    {
        if ($id === null || ! is_numeric($id)) {
            return redirect()->to('/folios')->with('error', 'ID inválido.');
        }

        $data['folio'] = $this->folioModel->find($id);
        if (!$data['folio']) {
            return redirect()->to('/folios')->with('error', 'Folio no encontrado.');
        }

        echo view('layouts/header');
        echo view('folios/delete_confirm', $data);
        echo view('layouts/footer');
    }
}

