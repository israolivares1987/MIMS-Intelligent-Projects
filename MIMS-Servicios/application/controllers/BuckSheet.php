<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuckSheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BuckSheet_model','bucksheet');
		setlocale(LC_ALL,"es_CL");
	}



	function obtieneBuckSheet(){


		$this->bucksheet->setPurchaseOrderID($this->input->post('PurchaseOrderID'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheet();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}

	function obtieneBucksheetDet(){ 

		$this->bucksheet->setPurchaseOrderID($this->input->post('PurchaseOrderID'));
		$this->bucksheet->setNumeroLinea($this->input->post('NumeroLinea'));

		$datas = $this->bucksheet->obtieneBucksheetDet();

		echo json_encode($datas);

	}


	 function getRows(){

		$PurchaseOrderID = $this->input->post('PurchaseOrderID');
		$NumeroLinea = $this->input->post('NumeroLinea');


		$con = array(
			'where' => array(
				'PurchaseOrderID' => $PurchaseOrderID,
				'NumeroLinea' => $NumeroLinea
			),
			'returnType' => 'count'
		);


		$prevCount = $this->bucksheet->getRows($con);
		
		
		echo $prevCount;
	 }
	 
	 function update(){

				// Update member data
				$form_data = $this->input->post();

	            $update = $this->bucksheet->update($form_data,$this->input->post('PurchaseOrderID'),$this->input->post('NumeroLinea'));
		
	echo $update;
	 }

		
	 function insert(){

		
	
		$form_data = $this->input->post();

	

		$insert = $this->bucksheet->insert($form_data);
		
		echo json_encode($insert);
	}


	function updatexlinea()
	{

		
		// Update member data
		$form_data = $this->input->post();
		

		$update = $this->bucksheet->update($form_data,$this->input->post('PurchaseOrderID'),$this->input->post('NumeroLinea'));
		echo json_encode($update);


		}
	

		function eliminaBuckSheet(){

			$PurchaseOrderID = $this->input->post('PurchaseOrderID');
			$numeroLinea = $this->input->post('numeroLinea');
	
	
		
	
	
			$delete = $this->bucksheet->eliminaBuckSheet($PurchaseOrderID,$numeroLinea);
			
			
			echo json_encode($delete);
		 }

		 function obtieneNumeroLinea(){



			$PurchaseOrderID = $this->input->post('PurchaseOrderID');
			$codEmpresa = $this->input->post('codEmpresa');
			$id_proyecto = $this->input->post('id_proyecto');

			$numeroLinea = $this->bucksheet->obtieneNumeroLinea($PurchaseOrderID,$codEmpresa,$id_proyecto);

			echo json_encode($numeroLinea);
		 }
		

		 function insertOrderItem(){

			
			$var = $this->input->post('NumeroLinea');


			if(strlen($var) == 0  || is_null($var) || empty($var) || $var === 'null'){
	
				$valor = $this->bucksheet->obtieneNumeroLinea($this->input->post('PurchaseOrderID'));
		
			}else{
		
				$valor = $var;
		
			}
	
			$form_data = $this->input->post();
	
			if(!array_key_exists("NumeroLinea", $form_data)){
				$data['NumeroLinea'] =$valor;
			}
	

				// insert member data
			$form_data = $this->input->post();
		
 
			$insert = $this->bucksheet->insertOrderItem($form_data);
			
			if($insert > 0){

				$status = true;
	
			}else{
	
				$insert = false;
			}
	
			echo json_encode(array("resp" => $status,"id_insertado" => $insert));



		 }

	}

    
?>