<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model','usuario');
    }

	function addNewUsuario(){
	 
		$array    = $this->usuario->getMaxCodUsuario();
		$cod_user = $array[0]->valor;
		
		$nombres    = $this->input->post('nombres');
		$n_usuario  = $this->input->post('n_usuario');
		$rol_id     = $this->input->post('rol_id');
		$password   = $this->input->post('password'); 
		$paterno    = $this->input->post('paterno'); 
		$materno    = $this->input->post('materno');   
		$email 	    = $this->input->post('email');   
        $estado 	= $this->input->post('estado');
        $avatar 	= $this->input->post('avatar');

		$cod_emp 	= $this->input->post('cod_emp');
		$rol_id 	= $this->input->post('rol_id');

		$insert= array(
			'cod_user'	=> $cod_user,
			'cod_emp'   => $cod_emp,
			'nombres'  	=> $nombres,
			'n_usuario' => $n_usuario,
			'rol_id'   	=> $rol_id,
			'password' 	=> $password,
			'paterno'  	=> $paterno,
			'materno'  	=> $materno,
			'email'    	=> $email,
			'estado'   	=> $estado,
			'avatar'   	=> $avatar,
		);

		$usuario = $this->usuario->addNewUsuario($insert);

		if($usuario > 0){
				$status = true;
		}else{
				$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $usuario));
	}

	function getCountUsuario(){
		$count = $this->usuario->getCountUsuario();
		if($count == null){
			echo json_encode(0);
		}else{
			echo json_encode($count);
		}
	}

	function getListUsuarios(){
		$data = $this->usuario->getListadoUsuarios();
		echo json_encode($data);
	}

	function getListaRoles(){
		$data = $this->usuario->getListaroles();
		echo json_encode($data);
	}

	function asignarRolEmpresaUsuario(){
		$id 	 = $this->input->post('id');
		$cod_emp = $this->input->post('cod_emp');
		$rol_id  = $this->input->post('rol_id');

		$update= array(
			'cod_emp' => $cod_emp,
			'rol_id'  => $rol_id
		);
		$usuarioUpdate = $this->usuario->asignarEmpresaRolUsuario($update,array('id' => $id ));
		echo json_encode($usuarioUpdate);
	}

	function obtieneUsurio(){
		$id = $this->input->post('id');
		$usuario = $this->usuario->obtieneUsuario($id);
		echo json_encode($usuario);
	}

	function editarUsuario(){
		$id			= $this->input->post('id');
		$nombres    = $this->input->post('nombres');
		$n_usuario  = $this->input->post('n_usuario');
		$rol_id     = $this->input->post('rol_id');
		
		$paterno    = $this->input->post('paterno'); 
		$materno    = $this->input->post('materno');   
		$email 	    = $this->input->post('email');   
        $estado 	= $this->input->post('estado');
        $avatar 	= $this->input->post('avatar');

		$cod_emp 	= $this->input->post('cod_emp');
		$rol_id 	= $this->input->post('rol_id');

		$update= array(
			'cod_user'	=> $cod_user,
			'cod_emp'   => $cod_emp,
			'nombres'  	=> $nombres,
			'n_usuario' => $n_usuario,
			'rol_id'   	=> $rol_id,
			
			'paterno'  	=> $paterno,
			'materno'  	=> $materno,
			'email'    	=> $email,
			'estado'   	=> $estado,
			'avatar'   	=> $avatar,
			
		);
		
		$usuario = $this->usuario->editarUsuario($update,array('id' =>$id));
		echo json_encode($usuario);
	}

	function eliminaUsuario(){
		$id_usuario = $this->input->post('id');
		$usuario = $this->usuario->eliminaUsuario($id_usuario);
		echo json_encode($usuario);
	}
    
}