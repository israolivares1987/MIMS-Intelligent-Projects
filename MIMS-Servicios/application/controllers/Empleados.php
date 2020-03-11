<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empleados_model');
	}

	function obtieneEmployees(){


		$Employees = $this->Empleados_model->obtieneEmployees();
		$no = 0;
		$data = array();
		foreach ($Employees as $employee) {
			$no++;
			$row = array();
			$row[] = $employee->FirstName;
			$row[] = $employee->LastName;
			$row[] = $employee->EmailAddress;
			$row[] = $employee->JobTitle;
			$row[] = $employee->BusinessPhone;
			$row[] = $employee->HomePhone;
			$row[] = $employee->MobilePhone;
			$row[] = $employee->CountryRegion;
			$row[] = $employee->StateProvince;
			$row[] = $employee->City;
			$row[] = $employee->Address;
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_employees('."'".$employee->ID."'".')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>';
			$row[] ='<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_employees('."'".$employee->ID."'".')"><i class="glyphicon glyphicon-trash"></i>Delete</a>';


			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->Empleados_model->count_all(),
						"recordsFiltered" => $this->Empleados_model->count_all(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);


	}


	function obtieneEmpleadoPorId($id)
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
	
			}





	}

	
     
?>