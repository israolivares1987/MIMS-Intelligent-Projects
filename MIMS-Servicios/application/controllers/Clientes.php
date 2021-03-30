<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Clientes_model','cliente');
	}

	function listaClientes(){

		$codEmpresa = $this->input->post('codEmpresa');

		$Clientes = $this->cliente->listaClientes($codEmpresa);
		

		echo json_encode($Clientes);


	}

	function agregarCliente(){

		$codEmpresa      = $this->input->post('codEmpresa');
		$nombreCliente  = $this->input->post('nombreCliente');
		$razonSocial           = $this->input->post('razonSocial');
		$rutCliente       = $this->input->post('rutCliente');
		$dvCliente       = $this->input->post('dvCliente'); 
		$direccion       = $this->input->post('direccion'); 
		$contacto       = $this->input->post('contacto');   
		$telefono = $this->input->post('telefono');   
		$correo = $this->input->post('correo');   

		$insert= array(
			'codEmpresa' => $codEmpresa,
			'nombreCliente'   => $nombreCliente,
			'razonSocial'   => $razonSocial,
			'rutCliente' => $rutCliente,
			'dvCliente'       => $dvCliente,
			'direccion' => $direccion,
			'contacto' => $contacto,
			'telefono' => $telefono,
			'correo' => $correo
		  );

	
		$Cliente = $this->cliente->agregarCliente($insert);

		if($Cliente > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $Cliente));
		
	}

	function obtieneCliente(){

		$id_cliente = $this->input->post('id_cliente');
		
		$cliente = $this->cliente->obtieneCliente($id_cliente);

		echo json_encode($cliente);
		
	}

	function editarCliente(){

		$codEmpresa      = $this->input->post('codEmpresa');
		$nombreCliente  = $this->input->post('nombreCliente');
		$razonSocial           = $this->input->post('razonSocial');
		$rutCliente       = $this->input->post('rutCliente');
		$dvCliente       = $this->input->post('dvCliente'); 
		$direccion       = $this->input->post('direccion'); 
		$contacto       = $this->input->post('contacto');   
		$telefono = $this->input->post('telefono');   
		$correo = $this->input->post('correo');   
		$idCliente = $this->input->post('idCliente');

		$update= array(
			'nombreCliente'   => $nombreCliente,
			'razonSocial'   => $razonSocial,
			'rutCliente' => $rutCliente,
			'dvCliente'       => $dvCliente,
			'direccion' => $direccion,
			'contacto' => $contacto,
			'telefono' => $telefono,
			'correo' => $correo
		  );

	
		$Cliente = $this->cliente->editarEmpleado($update,array('idCliente' =>$idCliente));

		echo json_encode($Cliente);
		
	}

	function eliminaCliente(){  


		$idCliente = $this->input->post('idCliente');
		
		$Cliente = $this->cliente->eliminaCliente($idCliente);

		echo json_encode($Cliente);


    }

}

	
     
?>