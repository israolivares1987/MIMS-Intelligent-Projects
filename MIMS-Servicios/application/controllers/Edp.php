<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Edp_model', 'edp');
	}

	function listasEdp(){
	  
		$idProyecto 		= $this->input->post('idProyecto');
		$idCliente	= $this->input->post('idCliente');
		$idOrden	= $this->input->post('idOrden');
		$codEmpresa	= $this->input->post('codEmpresa');



		$edp = $this->edp->listasEdp($idCliente,$idProyecto,$idOrden, $codEmpresa);
		echo json_encode($edp);
				  	
	}

	function insertEdp(){

		
		$form_data = $this->input->post();

		$insert = $this->edp->insertEdp($form_data);
		
		if($insert > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("status" => $status,"id_insertado" => $insert));
	}

	function actualizarEdp()
	{
		

		$update = $this->input->post();

	
			$updateEdp = $this->edp->actualizarEdp($update,array('ID_EDP' =>$this->input->post('ID_EDP')));

			echo json_encode(array("status" => $updateEdp));

		}


		function eliminaEdp(){

			$ID_EDP 	= $this->input->post('ID_EDP');
	
			$delete = $this->edp->eliminaEdp($ID_EDP);
			
			echo json_encode($delete);	
	
		}

}

	
     
?>