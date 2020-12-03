<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    /**
     * Carga plantilla vista
     *
     * @param array $param
	 * @param array $nav
     * @return void
     */

	public function plantilla_admin($view, $datos = array()){

		$this->load->view('Admin/Adminheader');
		$this->load->view('Admin/navbar');
        $this->load->view('Admin/Adminleft_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('Admin/Adminfooter'); 
	}


    public function plantilla_ingenieria($view, $datos = array()){

		$this->load->view('ingenieria/header');
        $this->load->view('ingenieria/navbar');
        $this->load->view('ingenieria/left_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('ingenieria/footer'); 
	}
	

	public function plantilla_supervisor($view, $datos = array()){

		$this->load->view('supervisor/header');
        $this->load->view('supervisor/navbar');
        $this->load->view('supervisor/left_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('supervisor/footer'); 
	}

	public function plantilla_activador($view, $datos = array()){

		$this->load->view('activador/header');
        $this->load->view('activador/navbar');
        $this->load->view('activador/left_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('activador/footer'); 
	}


	public function plantilla_calidad($view, $datos = array()){

		$this->load->view('calidad/header');
        $this->load->view('calidad/navbar');
        $this->load->view('calidad/left_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('calidad/footer'); 
	}

	public function plantilla_bodega($view, $datos = array()){

		$this->load->view('bodega/header');
        $this->load->view('bodega/navbar');
        $this->load->view('bodega/left_menu');
        $this->load->view($view, $datos);
        $this->load->view('bodega/footer'); 
	}


	public function creaDirectorio($directorio)
	{
		$retorno = false;
		$carpeta = 'uploads/'.$directorio;

		if (!file_exists($carpeta)) {
			mkdir($carpeta, 0777, true);
			$retorno = true;
		}

		return $retorno;
	}

	public function uploadFile($param){

		$retorno 		= false;
		$array_upload 	= array();

		$this->creaDirectorio('pro'.$param['userFile']['id_proyecto_or']);
				
		$config['upload_path'] 		= './uploads/pro'.$param['userFile']['id_proyecto_or'];
		$config['allowed_types'] 	= 'jpg|png|jpeg|pdf|dwg';
		$config['max_size'] 		= '10000';
		$config['file_name'] 		= $param['userFile']['file_name'];
		$config['overwrite'] 		= TRUE;

		#Recepcion de parametros input FILE
		$_FILES = array();
		$_FILES['userFile']['name'] 		= $param['userFile']['name'];
		$_FILES['userFile']['type'] 		= $param['userFile']['type'];
		$_FILES['userFile']['tmp_name']		= $param['userFile']['tmp_name'];
		$_FILES['userFile']['error'] 		= $param['userFile']['error'];
		$_FILES['userFile']['size'] 		= $param['userFile']['size'];

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('userFile')){
			
			#Contiene informaciónn de archivo subido$
			$retorno  = $this->upload->data();

		}else{

			$retorno = false;

			}
		

		return $retorno;

	}


}

/* End of file MY_Controller.php */
