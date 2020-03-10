<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
		$this->load->model('Empleados_model');
	}

	

	function validateUser()
	{


		$user_name = $this->input->post('user_name');
		$password= $this->input->post('password');
		$cod_emp = $this->input->post('cod_emp');

		$validate_user = $this->Consultas->validate_user($user_name,$password,$cod_emp);
   
		if($validate_user->num_rows() > 0){
		  
			$data  = $validate_user->row_array();
			$name  = $data['n_usuario'];
			$email = $data['email'];
			$level = $data['rol_id'];
			$estado = $data['estado'];
			$iconoEmpresa = $data['icono_empresa'];
			$sesdata = array(
				'n_usuario'  => $name,
				'email'     => $email,
				'rol_id'     => $level,
				'estado'     => $estado,
				'icono' => $iconoEmpresa,
				'Error' => '0',
				'DescripcionError' => 'Sin Error'
				
			);

			if ($estado ==='0'){

				$sesdata = array(
					'Error' => 99,
					'DescripcionError' => 'Usuario se encuentra desabilitado, favor contactarse con el administrador'
				);
				
			  }

			}else{

				$sesdata = array(
					'user_name'  => $user_name,
					'password'     => $password,
					'cod_emp'     => $cod_emp,
					'Error' => 1,
					'DescripcionError' => 'Usuario y/o password incorrectos'
				);



			}
		
		echo json_encode($sesdata);		

	}
	

	function validateUserRol()
	{


		$rol_id = $this->input->post('rol_id');
		

		$validate_rol = $this->Consultas->obtiene_datos_usuario($rol_id);
   
		 if($validate_rol->num_rows() > 0){
		  
			$data  = $validate_rol->row_array();
			$paginaInicio  = $data['pagina_inicio'];
			
			$sesdata = array(
				'pagina_inicio'  => $paginaInicio
			);

			} 
		
		echo json_encode($sesdata);		

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