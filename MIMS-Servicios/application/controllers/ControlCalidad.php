<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlCalidad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ControlCalidad_model','control');
	}

	function obtieneControlCalidad(){

		$codEmpresa = $this->input->post('codEmpresa');
		$id_orden = $this->input->post('id_orden');
		$id_cliente = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');

		$ControlCalidad = $this->control->obtieneControlCalidad($codEmpresa,$id_orden,$id_cliente,$id_proyecto);
		

		echo json_encode($ControlCalidad);


	}

	

}

	
     
?>