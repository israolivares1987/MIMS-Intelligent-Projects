<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dominios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dominios_model', 'dominios');
	}


	function obtieneDatosRef(){

		$dominio = $this->input->post('dominio');

		$datos_dominio = $this->dominios->obtieneDatosRef($dominio);

		echo json_encode($datos_dominio);

	}


	function obtieneDatoRef(){

		$dominio = $this->input->post('dominio');
		$dato = $this->input->post('dato');

		$datos_dominio = $this->dominios->obtieneDatoRef($dominio,$dato);

		echo json_encode($datos_dominio);

	}

}

	
     
?>