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


	function editarIva(){

		$domain_id  = $this->input->post('domain_id');  
		$domain      = $this->input->post('domain');
	
		$update= array(
			'domain_id' => $domain_id
		  );
	
		$ivadato = $this->dominios->editarIva($update,array('domain' =>$domain));

		echo json_encode($ivadato);
		
	}

	function editarAvance(){

		$domain_id  = $this->input->post('domain_id');  
		$domain      = $this->input->post('domain');
		$domain_desc = $this->input->post('domain_desc');
	
		$update= array(
			'domain_desc' => $domain_desc
		  );
	
		$ivadato = $this->dominios->editarAvance($update,array('domain' =>$domain, 'domain_id'=>$domain_id));

		echo json_encode($ivadato);
	
	}


	


}

	
     
?>