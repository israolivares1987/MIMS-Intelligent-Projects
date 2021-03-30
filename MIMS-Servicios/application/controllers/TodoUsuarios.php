<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoUsuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Todo_usuarios_model','todo');
	
	}

	function obtieneTodoUsuarios(){

		$codEmpresa = $this->input->post('codEmpresa');
		$codUsuario = $this->input->post('codUsuario');
		
		$data = $this->todo->obtieneTodoUsuarios($codEmpresa,$codUsuario);

		echo json_encode($data);


	}


	function obtieneTodoUsuario(){

		$codEmpresa = $this->input->post('codEmpresa');
		$codUsuario = $this->input->post('codUsuario');
		$id_todo = $this->input->post('id_todo');

		$data = $this->todo->obtieneTodoUsuario($codEmpresa,$codUsuario,$id_todo);

		echo json_encode($data);


	}


	function guardarTodoUsuario(){



	
		$insert=  $this->input->post();
	
		$todo = $this->todo->guardarTodoUsuario($insert);
	
		if($todo > 0){
	
			$status = true;
	
		}else{
	
			$status = false;
		}
	
		echo json_encode(array("resp" => $status,"id_insertado" => $todo));
		
	}



	function actualizaEstadoTodo(){

		$codEmpresa  = $this->input->post('codEmpresa');  
		$id_usuario = $this->input->post('id_usuario');  
		$id_todo      = $this->input->post('id_todo');
		$estado  = $this->input->post('estado');
	
		$update= array(
			'estado'  => $estado
		  );
	
		$Todo = $this->todo->actualizaEstadoTodo($update,array('codEmpresa' => $codEmpresa,
																	  'id_usuario' => $id_usuario,
																	  'id_todo' => $id_todo));

		echo json_encode($Todo);
		
	}


	function editaTodoUsuario(){

		$codEmpresa  = $this->input->post('codEmpresa');  
		$descripcion_todo  = $this->input->post('descripcion_todo');  
		$fecha_inicio      = $this->input->post('fecha_inicio');
		$fecha_termino  = $this->input->post('fecha_termino');
		$id_usuario = $this->input->post('id_usuario');  
		$id_todo      = $this->input->post('id_todo');
		$lista_todo      = $this->input->post('lista_todo');

		

		$update= array(
			'lista_todo'  => $lista_todo,
			'descripcion_todo'  => $descripcion_todo,
			'fecha_inicio'           => $fecha_inicio,
			'fecha_termino'       => $fecha_termino
		  );
	
		$Todo = $this->todo->editaTodoUsuario($update,array('codEmpresa' => $codEmpresa,
																	  'id_usuario' => $id_usuario,
																	  'id_todo' => $id_todo));

		echo json_encode($Todo);
		
	}


	function eliminaTodoUsuario(){  


		$id_todo = $this->input->post('id_todo');
		$codEmpresa = $this->input->post('codEmpresa');
		$cod_usuario = $this->input->post('cod_usuario');
		
		$todo = $this->todo->eliminaTodoUsuario($codEmpresa,$cod_usuario,$id_todo);

		echo json_encode($todo);


    }



}


     
?>