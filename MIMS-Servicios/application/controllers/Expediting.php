<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
	}

	

	function obtieneExpediting(){

		$Expediting = $this->Consultas->obtieneExpediting();
		
		if($Expediting->num_rows() > 0 ){
		  
			$dataExpediting  = $Expediting->result_array();
			
        

			$sesdata = array(
				'Expediting'  => $dataExpediting
			);

			} 

		echo json_encode($sesdata);


	}




	}

	
     
?>