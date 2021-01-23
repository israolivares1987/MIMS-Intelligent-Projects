<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garantias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Garantias_model', 'garantias');
	}

	function listasGarantias(){
	  
		$idProyecto 		= $this->input->post('idProyecto');
		$idCliente	= $this->input->post('idCliente');
		$idOrden	= $this->input->post('idOrden');
		$codEmpresa	= $this->input->post('codEmpresa');



		$garantias = $this->garantias->listasGarantias($idCliente,$idProyecto,$idOrden, $codEmpresa);
		echo json_encode($garantias);
				  	
	}

	function guardarGarantias(){

		
		$form_data = $this->input->post();

		$insert = $this->garantias->guardarGarantias($form_data);
		
		if($insert > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("status" => $status,"id_insertado" => $insert));
	}

	


		function eliminaEdp(){

			$ID_EDP 	= $this->input->post('ID_EDP');
	
			$delete = $this->edp->eliminaEdp($ID_EDP);
			
			echo json_encode($delete);	
	
		}

}

	
     
?>