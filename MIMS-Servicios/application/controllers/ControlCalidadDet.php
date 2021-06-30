<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlCalidadDet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ControlCalidadDet_model','controldet');
	}

	function obtieneControlCalidadDet(){

		$codEmpresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id_cliente = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');

		$ControlCalidad = $this->controldet->obtieneControlCalidadDet($codEmpresa,$id_orden,$id_cliente,$id_proyecto);
		

		echo json_encode($ControlCalidad);


	}

	function guardaControlCalidadDet(){


		$insert= $this->input->post();
 
	
		$CalidadDet = $this->controldet->guardaControlCalidadDet($insert);

		if($CalidadDet > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $CalidadDet));
		
	}


	function eliminaControlCalidadDet(){  


		$id_control_calidad_det = $this->input->post('id_control_calidad_det');
		$id_orden = $this->input->post('id_orden');
		$id_cliente = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');
		
		$calidad = $this->controldet->eliminaControlCalidadDet($id_control_calidad_det,$id_orden,$id_cliente,$id_proyecto);

		echo json_encode($calidad);


	}
	

	function obtieneControlCalidadDetxId(){  


		$codEmpresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id_cliente = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');
		$id_control_calidad_det = $this->input->post('id_control_calidad_det');
		$id_control_calidad = $this->input->post('id_control_calidad');
		
		$calidad = $this->controldet->obtieneControlCalidadDetxId($codEmpresa,$id_control_calidad,$id_control_calidad_det,$id_orden,$id_cliente,$id_proyecto);

		echo json_encode($calidad);


    }

	
	function actualizaControlCalidadDet(){

		$id_orden = $this->input->post('id_orden');
		$id_cliente =$this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');
		$estado_porc_cc_det = $this->input->post('estado_porc_cc_det');
		$archivo_cc_det = $this->input->post('archivo_cc_det');
		$archivo_cc_original = $this->input->post('archivo_cc_original');		
		$estado_cc_det = $this->input->post('estado_cc_det');
		$id_control_calidad_det = $this->input->post('id_control_calidad_det');
		$id_control_calidad = $this->input->post('id_control_calidad');
	

      if(isset($archivo_cc_det)){

		$dataUpdate = array(	
			'id_orden' => $id_orden ,
			'id_cliente' => $id_cliente,
			'id_proyecto' => $id_proyecto,
			'estado_porc_cc_det' => $estado_porc_cc_det,
			'id_control_calidad_det' => $id_control_calidad_det,
			'estado_cc_det' => $estado_cc_det,
			'id_control_calidad' => $id_control_calidad,
			'archivo_cc_det' => $archivo_cc_det,
			'archivo_cc_original' => $archivo_cc_original
			);


	  }else{

		$dataUpdate = array(	
			'id_orden' => $id_orden ,
			'id_cliente' => $id_cliente,
			'id_proyecto' => $id_proyecto,
			'estado_porc_cc_det' => $estado_porc_cc_det,
			'id_control_calidad_det' => $id_control_calidad_det,
			'estado_cc_det' => $estado_cc_det,
			'id_control_calidad' => $id_control_calidad
			);


	  }
		
 
	
		$calidaddet = $this->controldet->actualizaControlCalidadDet($dataUpdate,array('id_orden' =>$id_orden,'id_control_calidad' =>$id_control_calidad,'id_control_calidad_det' =>$id_control_calidad_det));

		echo json_encode($calidaddet);
		
	}



}

	
     
?>