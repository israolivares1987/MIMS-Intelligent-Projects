<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyectos_model');
		$this->load->model('Consultas_model');
		$this->load->model('Ordenes_model', 'ordenes');
	}

	function obtieneOrdenes(){
	  
		$idProyecto 		= $this->input->post('idProyecto');
		$idCliente	= $this->input->post('idCliente');
		$codEmpresa	= $this->input->post('codEmpresa');



		$Ordenes = $this->ordenes->obtieneOrdenes($idCliente,$idProyecto,$codEmpresa);
		echo json_encode($Ordenes);
				  	
	}


	function obtieneOrdenesActivador(){
	  
		$idProyecto 		= $this->input->post('idProyecto');
		$idCliente	= $this->input->post('idCliente');
		$codActivador = $this->input->post('codActivador');
		$codEmpresa	= $this->input->post('codEmpresa');


		$Ordenes = $this->ordenes->obtieneOrdenesActivador($idCliente,$idProyecto, $codActivador,$codEmpresa);
		echo json_encode($Ordenes);
				  	
	}

	
	

	function obtieneOrderById(){

		$id_order 		= $this->input->post('orden_id');
		$id_proyecto	= $this->input->post('id_proyecto');
		$id_cliente 	= $this->input->post('id_cliente');
		$codEmpresa 	= $this->input->post('codEmpresa');

		$datos_orden = $this->ordenes->obtieneOrderById($id_order,$id_proyecto,$id_cliente,$codEmpresa);
		echo json_encode($datos_orden);

	}

	function eliminaOrden(){

		$id_cliente 	= $this->input->post('id_cliente');
		$id_proyecto 	= $this->input->post('id_proyecto');
		$orden 			= $this->input->post('orden');
		$cod_empresa	= $this->input->post('codEmpresa');

		$delete = $this->ordenes->eliminaOrden($id_cliente, $id_proyecto,$cod_empresa,$orden);
		
		echo json_encode($delete);	

	}


	function guardaOrden(){

		$data = $this->input->post();

		$insert = $this->ordenes->guardaOrden($data);

		echo json_encode($insert);

	}


	function actualizaOrden(){

		$data = $this->input->post();

		$update = $this->ordenes->actualizaOrden($data);

		echo json_encode($update);

	}

}

	
     
?>