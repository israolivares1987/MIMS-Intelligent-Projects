<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas_model','consulta');
	}

	

	function validateUser()
	{


		$user_name = $this->input->post('user_name');
		$password= $this->input->post('password');
		$cod_emp = $this->input->post('cod_emp');

		$validate_user = $this->consulta->validate_user($user_name,$password,$cod_emp);
		
   
		if($validate_user->num_rows() > 0){
		  

			

			$data  = $validate_user->row_array();
			$name  = $data['n_usuario'];
			$email = $data['email'];
			$level = $data['rol_id'];
			$estado = $data['estado'];
			$iconoEmpresa = $data['icono_empresa'];
			$avatar = $data['avatar'];
			$nombres = $data['nombres'];
			$paterno = $data['paterno'];
			$materno = $data['materno'];
			$id_usuario = $data['id'];
			$cod_user = $data['cod_user'];

			$validate_rol = $this->consulta->obtiene_datos_usuario($level);
		  
			$data_Rol  = $validate_rol->row_array();
			$nombreRol  = $data_Rol['nombre'];



			$sesdata = array(
				'n_usuario'  => $name,
				'email'     => $email,
				'rol_id'     => $level,
				'estado'     => $estado,
				'icono' => $iconoEmpresa,
				'Error' => '0',
				'DescripcionError' => 'Sin Error',
				'avatar' => $avatar,
				'nombres'  => $nombres,
                'paterno'  => $paterno,
				'materno'  => $materno,
				'nombre_rol' => $nombreRol,
				'id_usuario' => $id_usuario,
				'cod_user' => $cod_user
				
			);

			if ($estado ==='0'){

				$sesdata = array(
					'Error' => 99,
					'DescripcionError' => 'Usuario se encuentra deshabilitado, favor contactarse con el administrador'
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
		

		$validate_rol = $this->consulta->obtiene_datos_usuario($rol_id);
   
		 if($validate_rol->num_rows() > 0){
		  
			$data  = $validate_rol->row_array();
			$paginaInicio  = $data['pagina_inicio'];
			
			$sesdata = array(
				'pagina_inicio'  => $paginaInicio
			);

			} 
		
		echo json_encode($sesdata);		
		}

		function setSession(){

			$userId = $this->input->post('userId');
			$sessionId = $this->input->post('sessionId');
		
		$this->consulta->setSession($userId, $sessionId);
		
		}


		function cuentaSession(){

			$user_name = $this->input->post('user_name');
			$cod_emp = $this->input->post('cod_emp');
			$sessionId = $this->input->post('sessionId');
		
		$login = $this->consulta->cuentaSession($user_name,$cod_emp, $sessionId);

		echo json_encode($login);	
		
		}


		function consultaSession(){

			$user_name = $this->input->post('user_name');
			$sessionId = $this->input->post('sessionId');
		
	     	$login = $this->consulta->consultaSession($userId, $sessionId);

		echo json_encode($login);	
		
		}



		function eliminarSession(){

			$userId = $this->input->post('userId');
			$sessionId = $this->input->post('sessionId');
		
		$delete = $this->consulta->eliminarSession($userId, $sessionId);

		echo json_encode($delete);
		
		}

		
		function obtiene_user()
		{
	
			$user_name = $this->input->post('user_name');
			$cod_emp = $this->input->post('cod_emp');
	
			$validate_user = $this->consulta->obtiene_user($user_name,$cod_emp);

			echo json_encode($validate_user);		
	
		}


		function actualiza_password_user()
		{
	
			$user_name = $this->input->post('user_name');
			$cod_emp = $this->input->post('cod_emp');
			$password = $this->input->post('password');

			$uniqidStr = $this->input->post('uniqidStr');


			$update= array(
				'password'  => $password,
				'tokenpassword' => $uniqidStr,
				'estado' => '2',
				'tokendate' => date('Y-m-d H:i:s')
			  );
		
			$validate_user = $this->consulta->actualiza_password_user($update,array('email' =>$user_name,'cod_emp' =>$cod_emp));

			echo json_encode($validate_user);		
	
		}


		function obtiene_user_token()
		{


			$cod_emp = $this->input->post('cod_emp');
			$tokenpassword = $this->input->post('tokenpassword');

			$validate_user = $this->consulta->obtiene_user_token($cod_emp,$tokenpassword);

			echo json_encode($validate_user);		
	


		}

		function actualiza_password_new(){ 

		$cod_user = $this->input->post('cod_user');
		$password = $this->input->post('password');
		$cod_emp = $this->input->post('cod_emp');

		$update= array(
			'password'  => $password,
			'estado' => '1',
			'tokenpassword' => null,
			'tokendate' => null
		  );

		$validate_user = $this->consulta->actualiza_password_new($update,array('cod_user' =>$cod_user,'cod_emp' =>$cod_emp));

		echo json_encode($validate_user);

		}

	}



     
?>