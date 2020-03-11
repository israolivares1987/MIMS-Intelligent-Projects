<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuckSheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
	}

	

	function obtieneBuckSheet(){


		$PurchaseOrderID = $this->input->post('PurchaseOrderID');


		$BuckSheet = $this->Consultas->obtieneBuckSheet($PurchaseOrderID);
		

		if($BuckSheet->num_rows() > 0 ){
		  
			
			$dataBuckSheet  = $BuckSheet->result_array();
			
        

			$sesdata = array(
				'BuckSheet'  => $dataBuckSheet
			);

		}else{

			$sesdata = array(
				'BuckSheet'  => null
			);

		}

		echo json_encode($sesdata);


	}
	
	}

	
     
?>