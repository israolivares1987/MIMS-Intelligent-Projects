<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas_model');
		$this->load->model('Clientes_model', 'clientes');
	}
	

	function obtieneDatosTotales($codEmpresa){

		$proyectos = $this->Consultas_model->obtieneDatosTotalesProyectos($codEmpresa);
		$clientes = $this->clientes->obtieneTotClientesxEmp($codEmpresa);
		$ordenes = $this->Consultas_model->obtieneDatosTotalesOrdenes($codEmpresa);
		$suppliers = $this->Consultas_model->obtieneDatosTotalesSuppliers($codEmpresa);
		
		$output = array(
			"totalProyectos" => $proyectos,
			"totalClientes" => $clientes,
			"totalOrdenes" => $ordenes,
			"totalSuppliers" => $suppliers

	    );

		//output to json format
		echo json_encode(array_filter($output),true);
	}

	
	}

	
     
?>