<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas_model','consultas');
	}
	

	function obtieneDatosTotales()
	{


		$codEmpresa =  $this->input->post('codEmpresa');


		$obtieneDatosTotalesProyectos = $this->consultas->obtieneDatosTotalesProyectos($codEmpresa);
		$obtieneTotClientesxEmp = $this->consultas->obtieneTotClientesxEmp($codEmpresa);


		$obtieneDatosTotalesLineasActCompras = $this->consultas->obtieneDatosTotalesLineasActCompras($codEmpresa);
		$obtieneDatosTotalesLineasActObra = $this->consultas->obtieneDatosTotalesLineasActObra($codEmpresa);


		$obtieneDatosOrdenesObra = $this->consultas->obtieneDatosOrdenesObra($codEmpresa);
		$obtieneDatosTotalOrdenesCompras = $this->consultas->obtieneDatosTotalOrdenesCompras($codEmpresa);



		$obtieneDatosAdminMMCompras = $this->consultas->obtieneDatosAdminMMCompras($codEmpresa);
		$obtieneDatosAdminMMObras = $this->consultas->obtieneDatosAdminMMObras($codEmpresa);
		
	
		foreach ($obtieneDatosAdminMMCompras as $llave => $valor) {
      
			$valorObtieneDatosAdminMMCompras = $valor->ValorNeto;
	  
		  }

		  foreach ($obtieneDatosAdminMMObras as $llave => $valor) {
      
			$valorObtieneDatosAdminMMObras = $valor->ValorNeto;
	  
		  }
		


		$output = array(
			
			"totalProyectos" => $obtieneDatosTotalesProyectos,
			"totalClientes" => $obtieneTotClientesxEmp,

			"totalLineasActivablesPlanCompras" => $obtieneDatosTotalesLineasActCompras,
			"totalLineasActivablesPlanObra" => $obtieneDatosTotalesLineasActObra,

			"totalOrdenesObra" => $obtieneDatosOrdenesObra,
			"totalOrdenesCompras" => $obtieneDatosTotalOrdenesCompras,

			"totalOrdenesAdminCompras" => $valorObtieneDatosAdminMMCompras,
			"totalOrdenesAdminObras" => $valorObtieneDatosAdminMMObras


		);
		
		//output to json format
		echo json_encode($output);
	}



	function obtieneDatosTotalesxActivador()
	{


		$codEmpresa =  $this->input->post('codEmpresa');
		$Email =  $this->input->post('Email');



		$obtieneDatosTotalesProyectos = $this->consultas->obtieneDatosTotalesProyectosActivador($codEmpresa,$Email);
		$obtieneTotClientesxEmp = $this->consultas->obtieneTotClientesxEmpActivador($codEmpresa,$Email);


		$obtieneDatosTotalesLineasActCompras = $this->consultas->obtieneDatosTotalesLineasActComprasActivador($codEmpresa,$Email);
		$obtieneDatosTotalesLineasActObra = $this->consultas->obtieneDatosTotalesLineasActObraActivador($codEmpresa,$Email);


		$obtieneDatosOrdenesObra = $this->consultas->obtieneDatosOrdenesObraActivador($codEmpresa,$Email);
		$obtieneDatosTotalOrdenesCompras = $this->consultas->obtieneDatosTotalOrdenesComprasActivador($codEmpresa,$Email);



		$obtieneDatosAdminMMCompras = $this->consultas->obtieneDatosAdminMMComprasActivador($codEmpresa,$Email);
		$obtieneDatosAdminMMObras = $this->consultas->obtieneDatosAdminMMObrasActivador($codEmpresa,$Email);
		
	
		foreach ($obtieneDatosAdminMMCompras as $llave => $valor) {
      
			$valorObtieneDatosAdminMMCompras = $valor->ValorNeto;
	  
		  }

		  foreach ($obtieneDatosAdminMMObras as $llave => $valor) {
      
			$valorObtieneDatosAdminMMObras = $valor->ValorNeto;
	  
		  }
		


		$output = array(
			
			"totalProyectos" => $obtieneDatosTotalesProyectos,
			"totalClientes" => $obtieneTotClientesxEmp,

			"totalLineasActivablesPlanCompras" => $obtieneDatosTotalesLineasActCompras,
			"totalLineasActivablesPlanObra" => $obtieneDatosTotalesLineasActObra,

			"totalOrdenesObra" => $obtieneDatosOrdenesObra,
			"totalOrdenesCompras" => $obtieneDatosTotalOrdenesCompras,

			"totalOrdenesAdminCompras" => $valorObtieneDatosAdminMMCompras,
			"totalOrdenesAdminObras" => $valorObtieneDatosAdminMMObras


		);
		
		//output to json format
		echo json_encode($output);
	}



   function obtieneTotalesBodega(){

	$codEmpresa =  $this->input->post('codEmpresa');
	$cliente =  $this->input->post('cliente');
	$proyecto =  $this->input->post('proyecto');


	$cantidadRR  = $this->consultas->obtieneCantidadRR($codEmpresa,$cliente,$proyecto);
	$cantidadRE  = '0';
    $cantidadExb = $this->consultas->obtieneCantidadEXB($codEmpresa,$cliente,$proyecto);
    $cantidadEI  = $this->consultas->obtieneCantidadEI($codEmpresa,$cliente,$proyecto);
    $sumaviajes  = $this->consultas->obtieneSumaViajes($codEmpresa,$cliente,$proyecto);
    $cantGuias   = $this->consultas->obtieneCantidadGuiasDespacho($codEmpresa,$cliente,$proyecto);
    $canGuiasSR  =$this->consultas->obtieneCantidadGuiasDespachoSinRecep($codEmpresa,$cliente,$proyecto);
       
	$output = array(
			
		"cantidadRR" => $cantidadRR,
		"cantidadRE" => $cantidadRE,
		"cantidadExb" => $cantidadExb,
		"cantidadEI" => $cantidadEI,
		"sumaviajes" => $sumaviajes,
		"cantGuias" => $cantGuias,
		"canGuiasSR" => $canGuiasSR

	);

	$respuesta = array(
			
		"respuesta" => $output

	);
	
	//output to json format
	echo json_encode($respuesta);

   }


	
	}

	
     
?>