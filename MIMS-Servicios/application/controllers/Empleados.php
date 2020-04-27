<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empleados_model', 'empleados');
	}

	function obtieneEmployees(){

		$cod_empresa = $this->input->post('cod_empresa');
		
		$Employees = $this->empleados->obtieneEmployees($cod_empresa);

		echo json_encode($Employees);
		
	}


/* 	function obtieneEmpleadoPorId($id)
	{
		$data = $this->Empleados_model->get_by_id($id);
		
		echo json_encode($data);
	}

	function updateEmpleado()
	{

		$data = array(
			'ID' => $this->input->post('ID'),	
			'FirstName' => $this->input->post('FirstName'),
				'LastName' => $this->input->post('LastName'),
				'EmailAddress' => $this->input->post('EmailAddress'),
				'JobTitle' => $this->input->post('JobTitle'),
				'BusinessPhone' => $this->input->post('BusinessPhone'),
				'HomePhone' => $this->input->post('HomePhone'),
				'MobilePhone' => $this->input->post('MobilePhone'),
				'CountryRegion' => $this->input->post('CountryRegion'),
				'StateProvince' => $this->input->post('StateProvince'),
				'City' => $this->input->post('City'),
				'Address' => $this->input->post('Address')

			);

		$this->Empleados_model->update(array('ID' => $this->input->post('ID')), $data);
		echo json_encode(array("status" => TRUE));


		}


		function deleteEmpleado($id)
		{
					
			$this->Empleados_model->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}
	
		function agregarEmpleado()
		{
			
			
			$data = array(
				'FirstName' => $this->input->post('FirstName'),
					'LastName' => $this->input->post('LastName'),
					'EmailAddress' => $this->input->post('EmailAddress'),
					'JobTitle' => $this->input->post('JobTitle'),
					'BusinessPhone' => $this->input->post('BusinessPhone'),
					'HomePhone' => $this->input->post('HomePhone'),
					'MobilePhone' => $this->input->post('MobilePhone'),
					'CountryRegion' => $this->input->post('CountryRegion'),
					'StateProvince' => $this->input->post('StateProvince'),
					'City' => $this->input->post('City'),
					'Address' => $this->input->post('Address')
				);
	
		
			$insert = $this->Empleados_model->save($data);
	
			echo json_encode(array("status" => TRUE));
	
			} */





	}

	
     
?>