<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
	}

	

	function validateUser()
	{


		$user_name = $this->input->post('user_name');
		$password= $this->input->post('password');
		$cod_emp = $this->input->post('cod_emp');

		$validate_user = $this->Consultas->validate_user($user_name,$password,$cod_emp);
   
		if($validate_user->num_rows() > 0){
		  
			$data  = $validate_user->row_array();
			$name  = $data['n_usuario'];
			$email = $data['email'];
			$level = $data['rol_id'];
			$estado = $data['estado'];
			$iconoEmpresa = $data['icono_empresa'];
			$sesdata = array(
				'n_usuario'  => $name,
				'email'     => $email,
				'rol_id'     => $level,
				'estado'     => $estado,
				'icono' => $iconoEmpresa,
				'Error' => '0',
				'DescripcionError' => 'Sin Error'
				
			);

			if ($estado ==='0'){

				$sesdata = array(
					'Error' => 99,
					'DescripcionError' => 'Usuario se encuentra desabilitado, favor contactarse con el administrador'
				);
				
			  }

			}else{

				$sesdata = array(
					'user_name'  => $user_name,
					'password'     => $password,
					'cod_emp'     => $cod_emp,
					'Error' => 1,
					'DescripcionError' => 'Usuario y/o password incorrectos'
				);



			}
		
		echo json_encode($sesdata);		

	}
	

	function validateUserRol()
	{


		$rol_id = $this->input->post('rol_id');
		

		$validate_rol = $this->Consultas->obtiene_datos_usuario($rol_id);
   
		 if($validate_rol->num_rows() > 0){
		  
			$data  = $validate_rol->row_array();
			$paginaInicio  = $data['pagina_inicio'];
			
			$sesdata = array(
				'pagina_inicio'  => $paginaInicio
			);

			} 
		
		echo json_encode($sesdata);		
		}


	}

	
     
?>