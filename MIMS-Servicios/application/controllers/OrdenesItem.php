<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdenesItem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('OrdenesItem_model', 'ordenesitem');
	}

	function obtieneItemOrdenes(){
	  
		$idOrden 		= $this->input->post('idOrden');
		$idProyecto 		= $this->input->post('idProyecto');
		$idCliente	= $this->input->post('idCliente');


		$Ordenes = $this->ordenesitem->obtieneItemOrdenes($idOrden,$idCliente,$idProyecto);
		echo json_encode($Ordenes);
				  	
	}
	


}

	
     
?>