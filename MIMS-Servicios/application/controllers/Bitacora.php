<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacora extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bitacora_model','bitacora');
	}



	function agregarBitacora(){

		

		$insert= $this->input->post();

	
		$Bitacora = $this->bitacora->agregarBitacora($insert);

		if($Bitacora > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $Bitacora));
		
	}



}

	
     
?>