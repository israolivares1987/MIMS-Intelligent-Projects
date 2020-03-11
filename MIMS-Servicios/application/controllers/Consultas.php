<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
	}

	
	function obtieneDatosFormsPurchaseOrders()
	{


		$Suppliers = $this->Consultas->obtiene_suppliers();
		$employees = $this->Consultas->obtiene_employees();

		 if($Suppliers->num_rows() > 0 ||$employees->num_rows() > 0 ){
		  
			$dataSuppliers  = $Suppliers->result_array();
			$listSuppliers  = $dataSuppliers;

			$dataemployees = $employees->result_array();
			$listemployees = $dataemployees;
			
			$sesdata = array(
				'employees'  => $listemployees,
				'Suppliers'  => $listSuppliers
			);

			} 
			
		echo json_encode($sesdata);		

    }

	
	}

	
     
?>