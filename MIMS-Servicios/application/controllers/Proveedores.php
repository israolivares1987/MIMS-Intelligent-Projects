<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proveedores_model','proveedores');
	
	}

	function obtieneSuppliersEmpresa(){

		$codEmpresa = $this->input->post('codEmpresa');
		
		$data = $this->proveedores->obtieneSuppliers($codEmpresa);

		echo json_encode($data);


	}

}

	
     
?>