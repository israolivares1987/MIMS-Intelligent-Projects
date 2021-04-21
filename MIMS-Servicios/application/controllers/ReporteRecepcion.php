<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteRecepcion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReporteRecepcion_model','rr');
	}

	

	function agregarRR(){

		$insert=  $this->input->post(); 

		$RR = $this->rr->agregarRR($insert);

		if($RR > 0){

			$status = true;

		}else{

			$RR = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $RR));
		
	}

	function agregarRRDet(){

		$insert=  $this->input->post(); 

		$RR = $this->rr->agregarRRDet($insert);

		if($RR > 0){

			$status = true;

		}else{

			$RR = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $RR));
		
	}


	function obtieneCabeceraRR(){

		$idrr = $this->input->post('idrr');
		
		$CabeceraRR = $this->rr->obtieneCabeceraRR($idrr);
		

		echo json_encode($CabeceraRR);

	}

	function actualizarCabeceraRR()
	{
		

		$update = $this->input->post();

	
			$updateEdp = $this->rr->actualizarCabeceraRR($update,array('id_rr' =>$this->input->post('id_rr')));

			echo json_encode(array("status" => $updateEdp));

		}

		function actualizarDetalleRR()
		{
			
	
			$update = $this->input->post();
	
		
				$updateEdp = $this->rr->actualizarDetalleRR($update,array('id_rr_det' =>$this->input->post('id_rr_det')));
	
				echo json_encode(array("status" => $updateEdp));
	
			}	


			function ActualizarBodegaDet()
			{
				
		
				$update = $this->input->post();
		
			
					$updateEdp = $this->rr->actualizarDetalleRR($update,array('id_rr_cab' =>$this->input->post('id_rr_cab')));
		
					echo json_encode(array("status" => $updateEdp));
		
				}	


			function listaRRDet(){

				$codEmpresa = $this->input->post('codEmpresa');
				$id_rr_cab = $this->input->post('id_rr_cab');
				
				$CabeceraRR = $this->rr->listaRRDet($codEmpresa,$id_rr_cab);
				
		
				echo json_encode($CabeceraRR);
		
			}	

			function obtieneRRDet(){

				$codEmpresa = $this->input->post('codEmpresa');
				$id_rr_cab = $this->input->post('id_rr_cab');
				$id_rr_det = $this->input->post('id_rr_det');
				
				$CabeceraRR = $this->rr->obtieneRRDet($codEmpresa,$id_rr_det,$id_rr_cab);
				
		
				echo json_encode($CabeceraRR);
		
			}	
			
			function obtieneRR(){

				$codEmpresa = $this->input->post('codEmpresa');

				$codigoProyecto = $this->input->post('codigoProyecto');
				$codigoCliente = $this->input->post('codigoCliente');
				
				$CabeceraRR = $this->rr->obtieneRR($codEmpresa,$codigoProyecto,$codigoCliente);
				
		
				echo json_encode($CabeceraRR);
		
			}
		

			
			
			

}

	
     
?>