<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteEntrega extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReporteEntrega_model','re');
	}



	function listaRRDetForRE(){

		$codEmpresa = $this->input->post('codEmpresa');

		$codigoCliente = $this->input->post('codigoCliente');
		$codigoProyecto = $this->input->post('codigoProyecto');


		$orden = $this->input->post('orden');
		$sku = $this->input->post('sku');
		$proveedor = $this->input->post('proveedor');
		$tagnumber = $this->input->post('tagnumber');
		$descripcion = $this->input->post('descripcion');

		
		

		$CabeceraRR = $this->re->listaRRDetForRE($codEmpresa,$codigoCliente,$codigoProyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion);
		echo json_encode($CabeceraRR);

	}	



	function obtieneFiltrosRE(){

		$codEmpresa = $this->input->post('codEmpresa');
		$id_proyecto = $this->input->post('id_proyecto');
		$id_clientes = $this->input->post('id_clientes');
		
		$orden = $this->input->post('orden');
		$sku = $this->input->post('sku');
		$proveedor = $this->input->post('proveedor');
		$tagnumber = $this->input->post('tagnumber');
		$descripcion = $this->input->post('descripcion');


			$ordenRR = $this->re->obtieneOrdenesRE($codEmpresa,$id_proyecto,$id_clientes);
			$skuRR = $this->re->obtieneSkuRE($codEmpresa,$id_proyecto,$id_clientes);
			$proveedorRR = $this->re->obtieneProveedorRE($codEmpresa,$id_proyecto,$id_clientes);
			$tagnumberRR = $this->re->obtieneTagNumberRE($codEmpresa,$id_proyecto,$id_clientes);
			$descripcionRR = $this->re->obtieneDescripcionRE($codEmpresa,$id_proyecto,$id_clientes);

		$output = array(
			"ordenRR" => $ordenRR,
			"skuRR" => $skuRR,
			"proveedorRR" => $proveedorRR,
			"tagnumberRR" => $tagnumberRR,
			"descripcionRR" => $descripcionRR
		);
	

		echo json_encode($output);

	}
	

	function agregarRE(){

		$insert=  $this->input->post(); 

		$RE = $this->re->agregarRE($insert);

		if($RE > 0){

			$status = true;

		}else{

			$RR = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $RE));
		
	}

	function agregarREDet(){

		$insert=  $this->input->post(); 

		$Re = $this->re->agregarREDet($insert);

		if($Re > 0){

			$status = true;

		}else{

			$RR = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $Re));
		
	}
		


	function obtieneCabeceraRE(){

		$idre = $this->input->post('idre');
		
		$CabeceraRE = $this->re->obtieneCabeceraRE($idre);
		

		echo json_encode($CabeceraRE);

	}


	function listaREDet(){

		$codEmpresa = $this->input->post('codEmpresa');
		$id_re = $this->input->post('id_re');
		
		$CabeceraRE = $this->re->listaREDet($codEmpresa,$id_re);
		

		echo json_encode($CabeceraRE);

	}	

}

	
     
?>