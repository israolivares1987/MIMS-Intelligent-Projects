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


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheet();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}


	function obtieneBuckSheetGuia(){


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setGuia($this->input->post('GuiaDespacho'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheetGuia();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}


	function obtieneBuckSheetBodega(){


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheetBodega();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}

	function obtieneBuckSheetRRInicial(){


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheetRRInicial();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}

	

	function obtieneBuckSheetPackingList(){


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));
		$this->bucksheet->setPackingList($this->input->post('PackingList'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheetPackingList();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}


	
	

	function obtieneBuckSheetGuiasWpanel(){


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheetGuiasWpanel();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}


	function obtieneBuckSheetPackingListWpanel(){


		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheetPackingListWpanel();
	
				
		//output to json format
		echo json_encode($BuckSheets);
	}

	


	




	function obtieneBucksheetDet(){ 

		$this->bucksheet->setidOc($this->input->post('ID_OC'));
		$this->bucksheet->setNumeroLinea($this->input->post('NUMERO_DE_LINEA'));
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));

		$datas = $this->bucksheet->obtieneBucksheetDet();

		echo json_encode($datas);

	}


	 function getRows(){

		$ID_OC = $this->input->post('ID_OC');
		$NumeroLinea = $this->input->post('NUMERO_DE_LINEA');
		$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));


		$con = array(
			'where' => array(
				'ID_OC' => $ID_OC,
				'NUMERO_DE_LINEA' => $NumeroLinea
			),
			'returnType' => 'count'
		);


		$prevCount = $this->bucksheet->getRows($con);
		
		
		echo $prevCount;
	 }
	 
	 function update(){

				// Update member data
				$form_data = $this->input->post();

	            $update = $this->bucksheet->update($form_data,$this->input->post('codEmpresa'),$this->input->post('ID_OC'),$this->input->post('NUMERO_DE_LINEA'));
		
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
		

		$update = $this->bucksheet->update($form_data,$this->input->post('COD_EMPRESA'),$this->input->post('ID_OC'),$this->input->post('NUMERO_DE_LINEA'));
		echo json_encode($update);


		}
	

		function eliminaBuckSheet(){

			$ID_OC = $this->input->post('ID_OC');
			$numeroLinea = $this->input->post('NUMERO_DE_LINEA');
			$codEmpresa = $this->input->post('COD_EMPRESA');
	
			$delete = $this->bucksheet->eliminaBuckSheet($codEmpresa,$ID_OC,$numeroLinea);
			
			
			echo json_encode($delete);
		 }

		 function obtieneNumeroLinea(){



			$ID_OC = $this->input->post('ID_OC');
			$id_proyecto = $this->input->post('id_proyecto');
			$codEmpresa = $this->input->post('COD_EMPRESA');

			$numeroLinea = $this->bucksheet->obtieneNumeroLinea($codEmpresa,$ID_OC,$id_proyecto);

			echo json_encode($numeroLinea);
		 }
		

		 function insertOrderItem(){

			
			$var = $this->input->post('NUMERO_DE_LINEA');
			$codEmpresa = $this->input->post('codEmpresa');


			if(strlen($var) == 0  || is_null($var) || empty($var) || $var === 'null'){
	
				$valor = $this->bucksheet->obtieneNumeroLinea($codEmpresa,$this->input->post('ID_OC'));
		
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


		 function obtieneBuckSheetError(){

			
			$this->bucksheet->setidOc($this->input->post('ID_OC'));
			$this->bucksheet->setidError($this->input->post('idError'));
			$this->bucksheet->setcodEmpresa($this->input->post('codEmpresa'));
	
			$BuckSheets = $this->bucksheet->obtieneBuckSheetError();
		
					
			//output to json format
			echo json_encode($BuckSheets);
		}

		function insertError(){

		
	
			$form_data = $this->input->post();
	
		
	
			$insert = $this->bucksheet->insertError($form_data);
			
			echo json_encode($insert);
		}

	}

    
?>