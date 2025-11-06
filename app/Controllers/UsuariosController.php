<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuariosController extends BaseController
{
    public function index(): string
    {
        //instanciar la clase *Model = crear un objeto
        $usuarios =new UsuarioModel();
        //utilizar el metodo para seleccionar todos los datos
        //findAll() = select * from clientes; 
        $datos['datos'] = $usuarios->findAll();
        //clientes es una vista a una pagina web  a la que el usuario ingresara
        return view('usuarios',$datos);
    }
    public function agregarUsuario()
    {
        //intanciar la clase clientesModel
        $usuarios = new UsuarioModel();
        // crear un array que reciba los datos del formulario
        $datos=[
            'usuario_id'=>$this->request->getPost('txt_id'),
            'nombre'=>$this->request->getPost('txt_nombre'),
            'usuario'=>$this->request->getPost('txt_usuario'),
            'contraseña'=>$this->request->getPost('txt_contraseña'),
            'rol'=>$this->request->getPost('txt_rol'),
            'area_id'=>$this->request->getPost('txt_area')
        ];
        //print_r($datos);
        $usuarios->insert($datos);
        //ejecutar el metodo insert para agregar datos en la tabla
        // de la base de datos
        return $this->index();
    }
    public function eliminarUsuario($id){
        //echo "Código seleccionado: ". $id;
        //crear un objeto de la clase ClientesModel
        $usuario = new UsuarioModel();
        //ejecutar la eliminacion
        $usuario->delete($id); //delete from Clientes where id=?;
        return $this->index();
    }
    public function buscarUsuario($codigo){
        echo "codigo seleccionado para busqueda: ". $codigo;
        $usuarios = new UsuarioModel();
        //select * from clientes where cliente_id=$codigo;
        $datos['datos']= $usuarios->where('usuario_id',$codigo)->first();
        //enviar los datos al formulario
        return view('form_editar_usuario',$datos);
    }
    public function modificarUsuario(){
        //crear un objeto de tipo AutoreModel = instanciar la clase de ClientesModel
        $usuarios = new UsuarioModel();
        $datos=[
            'nombre'=>$this->request->getPost('txt_nombre'),
            'usuario'=>$this->request->getPost('txt_usuario'),
            'contraseña'=>$this->request->getPost('txt_contraseña'),
            'rol'=>$this->request->getPost('txt_rol'),
            'area_id'=>$this->request->getPost('txt_area')
        ];
        //ejecutar los cambios en la tabla de la base de datos
        $codigo = $this->request->getPost('txt_id');
        //update(campo de condicion para actualizar, datos a actualizar)
        //update autores set............where codigo=$codigo
        $usuarios->update($codigo,$datos);
        //llamar y ejecutar el metodo index que carga los datos
        return $this->index();
    }
    
}