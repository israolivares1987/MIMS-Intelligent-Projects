<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empresas_model','empresas');
	}

	function obtieneEmpresas(){

		$codEmpresa = $this->input->post('codEmpresa');
		
		

		$empresa = $this->empresas->obtieneEmpresa($codEmpresa);
		echo json_encode($empresa);


	}


	
	
}

	
     
?>