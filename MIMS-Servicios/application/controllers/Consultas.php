<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas_model');
	}
	

	function obtieneDatosTotales($codEmpresa){

		$proyectos = $this->Consultas_model->obtieneDatosTotalesProyectos($codEmpresa);
		$proveedores = $this->Consultas_model->obtieneDatosTotalesProveedores($codEmpresa);
		$ordenes = $this->Consultas_model->obtieneDatosTotalesOrdenes($codEmpresa);
		$suppliers = $this->Consultas_model->obtieneDatosTotalesSuppliers($codEmpresa);
		
		$output = array(
			"totalProyectos" => $proyectos,
			"totalProveedores" => $proveedores,
			"totalOrdenes" => $ordenes,
			"totalSuppliers" => $suppliers

	    );

		//output to json format
		echo json_encode(array_filter($output),true);
	}

	
	}

	
     
?>