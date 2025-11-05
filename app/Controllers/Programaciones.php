<?php namespace App\Controllers;

use App\Models\ProgramacionModel;
use App\Models\FolioModel;
use CodeIgniter\Controller;

class Programaciones extends Controller
{
    protected $programModel;
    protected $folioModel;
    protected $helpers = ['form','url'];

    public function __construct()
    {
        $this->programModel = new ProgramacionModel();
        $this->folioModel   = new FolioModel();
    }

    public function index()
    {
        $data['programaciones'] = $this->programModel->orderBy('programacion_id','DESC')->findAll();
        echo view('programaciones/index', $data);
    }

    public function show($id)
    {
        $program = $this->programModel->find($id);
        if (!$program) return redirect()->to('/programaciones');
        $data['program'] = $program;
        $data['folios'] = $this->folioModel->where('programacion_id',$id)->findAll();
        echo view('programaciones/show',$data);
    }

    public function create()
    {
        echo view('programaciones/create');
    }

    public function store()
    {
        $post = $this->request->getPost();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'estilo'=>'required|max_length[100]',
            'cantidad_total'=>'required|integer',
            'pares_por_folio'=>'required|integer',
            'fecha_inicio'=>'required|valid_date[Y-m-d]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $insertId = $this->programModel->insert([
            'estilo'=>$post['estilo'],
            'cantidad_total'=>$post['cantidad_total'],
            'pares_por_folio'=>$post['pares_por_folio'],
            'fecha_inicio'=>$post['fecha_inicio'],
            'responsable_id'=> $post['responsable_id'] ?? null
        ]);

        if (isset($post['folio_numero']) && is_array($post['folio_numero'])) {
            $folios = [];
            foreach ($post['folio_numero'] as $i => $num) {
                if (trim($num) === '') continue;
                $folios[] = [
                    'programacion_id' => $insertId,
                    'numero_folio' => $num,
                    'cantidad_pares' => (int) ($post['folio_cantidad'][$i] ?? $post['pares_por_folio']),
                    'estado' => $post['folio_estado'][$i] ?? 'en_proceso'
                ];
            }
            if (!empty($folios)) $this->folioModel->insertBatch($folios);
        }

        return redirect()->to('/programaciones')->with('message','Programación creada.');
    }

    public function edit($id)
    {
        $program = $this->programModel->find($id);
        if (!$program) return redirect()->to('/programaciones');
        $data['program'] = $program;
        $data['folios'] = $this->folioModel->where('programacion_id',$id)->findAll();
        echo view('programaciones/edit',$data);
    }

    public function update($id)
    {
        $post = $this->request->getPost();
        $this->programModel->update($id, [
            'estilo'=>$post['estilo'],
            'cantidad_total'=>$post['cantidad_total'],
            'pares_por_folio'=>$post['pares_por_folio'],
            'fecha_inicio'=>$post['fecha_inicio'],
            'responsable_id'=> $post['responsable_id'] ?? null
        ]);

        $this->folioModel->where('programacion_id',$id)->delete();

        if (isset($post['folio_numero']) && is_array($post['folio_numero'])) {
            $folios = [];
            foreach ($post['folio_numero'] as $i => $num) {
                if (trim($num) === '') continue;
                $folios[] = [
                    'programacion_id' => $id,
                    'numero_folio' => $num,
                    'cantidad_pares' => (int) ($post['folio_cantidad'][$i] ?? $post['pares_por_folio']),
                    'estado' => $post['folio_estado'][$i] ?? 'en_proceso'
                ];
            }
            if (!empty($folios)) $this->folioModel->insertBatch($folios);
        }

        return redirect()->to('/programaciones')->with('message','Programación actualizada.');
    }

    public function delete($id)
    {
        $this->folioModel->where('programacion_id',$id)->delete();
        $this->programModel->delete($id);
        return redirect()->to('/programaciones')->with('message','Programación eliminada.');
    }
}
