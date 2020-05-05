<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empleados_model', 'empleados');
	}

	function listaEmpleados(){

		$cod_empresa = $this->input->post('cod_empresa');
		
		$Empleados = $this->empleados->listaEmpleados($cod_empresa);

		echo json_encode(array_filter($Empleados));
		
	}

	function obtieneEmpleado(){

		$id_empleado = $this->input->post('id_empleado');
		
		$Empleado = $this->empleados->obtieneEmpleado($id_empleado);

		echo json_encode($Empleado);
		
	}


	function editarEmpleado(){

		$ID       = $this->input->post('ID');
    $LastName      = $this->input->post('LastName');
    $FirstName  = $this->input->post('FirstName');
    $EmailAddress           = $this->input->post('EmailAddress');
    $BusinessPhone       = $this->input->post('BusinessPhone');
    $JobTitle       = $this->input->post('JobTitle'); 
    $HomePhone       = $this->input->post('HomePhone'); 
	$MobilePhone       = $this->input->post('MobilePhone');   
	$JobId         = $this->input->post('JobId');

		$update= array(
			'LastName'   => $LastName,
			'FirstName'   => $FirstName,
			'EmailAddress' => $EmailAddress,
			'JobId ' => $JobId,
			'JobTitle'       => $JobTitle,
			'BusinessPhone' => $BusinessPhone,
			'HomePhone' => $HomePhone,
			'MobilePhone' => $MobilePhone
		  );

	
		$Empleado = $this->empleados->editarEmpleado($update,array('ID' =>$ID));

		echo json_encode($Empleado);
		
	}


	function agregarEmpleado(){

		$LastName      = $this->input->post('LastName');
		$FirstName  = $this->input->post('FirstName');
		$EmailAddress           = $this->input->post('EmailAddress');
		$BusinessPhone       = $this->input->post('BusinessPhone');
		$JobTitle       = $this->input->post('JobTitle'); 
		$HomePhone       = $this->input->post('HomePhone'); 
		$MobilePhone       = $this->input->post('MobilePhone');   
		$codEmpresa = $this->input->post('codEmpresa');   
		$JobId         = $this->input->post('JobId');
		$insert= array(

			'codEmpresa' => $codEmpresa,
			'LastName'   => $LastName,
			'FirstName'   => $FirstName,
			'EmailAddress' => $EmailAddress,
			'JobTitle'       => $JobTitle,
			'JobId ' => $JobId,
			'BusinessPhone' => $BusinessPhone,
			'HomePhone' => $HomePhone,
			'MobilePhone' => $MobilePhone
		  );

	
		$Empleado = $this->empleados->agregarEmpleado($insert);

		if($Empleado > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $Empleado));
		
	}
	
	function eliminaEmpleado(){  


		$id_empleado = $this->input->post('id_empleado');
		
		$Empleado = $this->empleados->eliminaEmpleado($id_empleado);

		echo json_encode($Empleado);


    }

}

	
     
?>