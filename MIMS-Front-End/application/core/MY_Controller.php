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
    public function plantilla_ingenieria($view, $datos = array()){

		$this->load->view('ingenieria/header');
        $this->load->view('ingenieria/navbar');
        $this->load->view('ingenieria/left_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('ingenieria/footer'); 
	}
	
	public function plantilla_activador($view, $datos = array()){

		$this->load->view('activador/header');
        $this->load->view('activador/navbar');
        $this->load->view('activador/left_menu',$datos);
        $this->load->view($view, $datos);
        $this->load->view('activador/footer'); 
	}
    
    #Checkea session activa y redirecciona segun parametro
	public function checkSession($param){

		if (!$this->session->userdata('is_logued')) {
			$this->removeCache();
			redirect($param['redirect'],'refresh');
		}
	}

	#Checkea session activa y redirecciona inicio
	public function checkSessionOn(){

		if ($this->session->userdata('is_logued')) {
			$this->removeCache();
			redirect('inicio_controller/inicio','refresh');

		}
	}

	#Elimina cache generado
	public function removeCache(){
		
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}


	/**
	 * @descripcion: Obtiene JSON de regiones desde WS
	 */
	public function getRegiones(){
		$this->load->model('my_model');

		$data = array();
		$data = $this->my_model->getRegion();

		return $data;	
	}


	/**
	 * @descripcion: Obtiene JSON de comunas dada una region
	 */
	public function getComunasRegion($region = false){
		$this->load->model('my_model');
		$data = array();
		$data = $this->my_model->getComunasRegion($region);

		return $data;	
	}

}

/* End of file MY_Controller.php */
