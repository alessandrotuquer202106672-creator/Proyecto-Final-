<?php

namespace App\Controllers;

use App\Models\AreasModel;

class AreasController extends BaseController
{
    public function index(): string
    {
        //instanciar la clase *Model = crear un objeto
        $areas =new AreasModel();
        //utilizar el metodo para seleccionar todos los datos
        //findAll() = select * from clientes; 
        $datos['datos'] = $areas->findAll();
        //clientes es una vista a una pagina web  a la que el usuario ingresara
        return view('areas',$datos);
    }
    public function agregarArea()
    {
        //intanciar la clase clientesModel
        $areas = new AreasModel();
        // crear un array que reciba los datos del formulario
        $datos=[
            'area_id'=>$this->request->getPost('txt_id'),
            'nombre'=>$this->request->getPost('txt_nombre'),
            'orden'=>$this->request->getPost('txt_orden')
        ];
        //print_r($datos);
        $areas->insert($datos);
        //ejecutar el metodo insert para agregar datos en la tabla
        // de la base de datos
        return $this->index();
    }
    public function eliminarArea($id){
        //echo "Código seleccionado: ". $id;
        //crear un objeto de la clase ClientesModel
        $areas = new AreasModel();
        //ejecutar la eliminacion
        $areas->delete($id); //delete from Clientes where id=?;
        return $this->index();
    }
    public function buscarArea($codigo){
        echo "codigo seleccionado para busqueda: ". $codigo;
        $areas = new AreasModel();
        //select * from clientes where cliente_id=$codigo;
        $datos['datos']= $areas->where('area_id',$codigo)->first();
        //enviar los datos al formulario
        return view('form_editar_area',$datos);
    }
    public function modificarArea(){
        //crear un objeto de tipo AutoreModel = instanciar la clase de ClientesModel
        $areas = new AreasModel();
        $datos=[
            'nombre'=>$this->request->getPost('txt_nombre'),
            'orden'=>$this->request->getPost('txt_orden')
        ];
        //ejecutar los cambios en la tabla de la base de datos
        $codigo = $this->request->getPost('txt_id');
        //update(campo de condicion para actualizar, datos a actualizar)
        //update autores set............where codigo=$codigo
        $areas->update($codigo,$datos);
        //llamar y ejecutar el metodo index que carga los datos
        return $this->index();
    }
    
}