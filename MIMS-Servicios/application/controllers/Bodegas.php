<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bodegas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bodegas_model','bodegas');
	
	}

	function obtieneBodegas(){

		$codEmpresa = $this->input->post('codEmpresa');
		
		$data = $this->bodegas->obtieneBodegas($codEmpresa);

		echo json_encode($data);


	}


	function agregarBodega(){

		$insert= $this->input->post(); 
		$Bodega = $this->bodegas->agregarBodega($insert);
	
		if($Bodega > 0){
	
			$status = true;
	
		}else{
	
			$status = false;
		}
	
		echo json_encode(array("resp" => $status,"id_insertado" => $Bodega));
		
	}
	
	
	
	
	function obtieneBodega(){
	
		$id_bodega = $this->input->post('id_bodega');
		$codEmpresa = $this->input->post('codEmpresa');
		
		$proveedor= $this->bodegas->obtieneBodega($codEmpresa ,$id_bodega);
	
		echo json_encode($proveedor);
		
	}


	function editarBodega(){

	
		$update= $this->input->post(); 
	
		$Bodega = $this->bodegas->editarBodega($update,array('id_bodega' => $this->input->post('id_bodega')));

		echo json_encode($Bodega);
		
	}

	function eliminaBodega(){  


		$id_bodega = $this->input->post('id_bodega');
		$codEmpresa = $this->input->post('codEmpresa');
		
		$Bodega = $this->bodegas->eliminaBodega($codEmpresa,$id_bodega);

		echo json_encode($Bodega);


    }



}


     
?>