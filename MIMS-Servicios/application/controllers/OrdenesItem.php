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
	
	function guardaOrdenItem(){

		$status = false;

		$data = $this->input->post();

		

		$insert = $this->ordenesitem->guardaOrdenItem($data);
	
		if($insert){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode($status);

	}

	function editarOrdenItem(){

		$id_order 		= $this->input->post('orden_id');
		$id_proyecto	= $this->input->post('id_proyecto');
		$id_cliente 	= $this->input->post('id_cliente');
		$item_id 	= $this->input->post('item_id');
		$codEmpresa 	= $this->input->post('codEmpresa');

		$datos_orden = $this->ordenesitem->editarOrdenItem($id_order,$id_proyecto,$id_cliente,$item_id,$codEmpresa);
		echo json_encode($datos_orden);

	}

	function actualizaOrdenItem(){

		$data = $this->input->post();

		$update = $this->ordenesitem->actualizaOrdenItem($data);

		echo json_encode($update);

	}


	function eliminaOrdenItem(){

		$id_cliente 	= $this->input->post('id_cliente');
		$id_proyecto 	= $this->input->post('id_proyecto');
		$orden 			= $this->input->post('orden');
		$orden_item 			= $this->input->post('orden_item');
		$cod_empresa	= $this->input->post('codEmpresa');
	  
		$delete = $this->ordenesitem->eliminaOrdenItem($id_cliente, $id_proyecto,$cod_empresa,$orden,$orden_item );
		
		echo json_encode($delete);	
	  
	  }
	  
	  function getRows(){

		$idProyecto = $this->input->post('idProyecto');
		$idOrden = $this->input->post('idOrden');
		$ItemId = $this->input->post('ItemId');


		$con = array(
			'where' => array(
				'PurchaseOrderID' => $idOrden,
				'id_item' => $ItemId,
				'idProyecto' => $idProyecto
			),
			'returnType' => 'count'
		);


		$prevCount = $this->ordenesitem->getRows($con);
		
		
		echo $prevCount;
	 }
	 
	 function update(){

			
				$form_data = $this->input->post();

	$update = $this->ordenesitem->update($form_data,$this->input->post('PurchaseOrderID'),$this->input->post('id_item'),$this->input->post('idProyecto') );
		
	echo json_encode($update);
	 }

		
	 function insert(){

		$form_data = $this->input->post();
	
		$insert = $this->ordenesitem->insert($form_data);
		
		echo json_encode($insert);
	}


}

	
     
?>