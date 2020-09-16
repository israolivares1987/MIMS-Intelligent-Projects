<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdjuntoTecnico extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdjuntoTecnico_model','tecnico');
	}
 
	function listasAdjuntoTecnico(){

		$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');

		$AdjuntoTecnico = $this->tecnico->listasAdjuntoTecnico($cod_empresa,$id_orden);
		

		echo json_encode($AdjuntoTecnico);


	}

	function agregarAdjuntoTecnico(){

		$cod_empresa      = $this->input->post('cod_empresa');
		$id_orden  = $this->input->post('id_orden');
		$id_requerimiento           = $this->input->post('id_requerimiento');
		$disciplina       = $this->input->post('disciplina');
		$instalacion_definitiva       = $this->input->post('instalacion_definitiva'); 
		$area_proyecto       = $this->input->post('area_proyecto'); 
		$tipo_pm       = $this->input->post('tipo_pm');   
		$inspeccion_requerida = $this->input->post('inspeccion_requerida');   
		$nivel_inspeccion = $this->input->post('nivel_inspeccion'); 
		$documentos_antes_iniciar = $this->input->post('documentos_antes_iniciar'); 
		$alcance_tecnico_trabajo = $this->input->post('alcance_tecnico_trabajo'); 
		$instruccion_requirente = $this->input->post('instruccion_requirente'); 
		

		$insert= array(
			'cod_empresa' => $cod_empresa,
			'id_orden'   => $id_orden,
			'id_requerimiento'   => $id_requerimiento,
			'disciplina'   => $disciplina,
			'instalacion_definitiva' => $instalacion_definitiva,
			'area_proyecto'       => $area_proyecto,
			'tipo_pm' => $tipo_pm,
			'inspeccion_requerida' => $inspeccion_requerida,
			'nivel_inspeccion' => $nivel_inspeccion,
			'documentos_antes_iniciar' => $documentos_antes_iniciar,
			'alcance_tecnico_trabajo' => $alcance_tecnico_trabajo,
			'instruccion_requirente' => $instruccion_requirente,
		  );

	
		$AdjuntoTecnico = $this->tecnico->agregarAdjuntoTecnico($insert);

		if($AdjuntoTecnico > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $AdjuntoTecnico));
		
	}

	function listaAdjuntoTecnico(){

		$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id = $this->input->post('id');
		
		$AdjuntoTecnico = $this->tecnico->listaAdjuntoTecnico($cod_empresa,$id_orden, $id);

		echo json_encode($AdjuntoTecnico);
		
	}

	function editaAdjuntoTecnico(){

		$id      = $this->input->post('id');
		$cod_empresa      = $this->input->post('cod_empresa');
		$id_orden  = $this->input->post('id_orden');
		$id_requerimiento           = $this->input->post('id_requerimiento');
		$disciplina       = $this->input->post('disciplina');
		$instalacion_definitiva       = $this->input->post('instalacion_definitiva'); 
		$area_proyecto       = $this->input->post('area_proyecto'); 
		$tipo_pm       = $this->input->post('tipo_pm');   
		$inspeccion_requerida = $this->input->post('inspeccion_requerida');   
		$nivel_inspeccion = $this->input->post('nivel_inspeccion'); 
		$documentos_antes_iniciar = $this->input->post('documentos_antes_iniciar'); 
		$alcance_tecnico_trabajo = $this->input->post('alcance_tecnico_trabajo'); 
		$instruccion_requirente = $this->input->post('instruccion_requirente'); 
		

		$update= array(
			'cod_empresa' => $cod_empresa,
			'id_orden'   => $id_orden,
			'id_requerimiento'   => $id_requerimiento,
			'disciplina'   => $disciplina,
			'instalacion_definitiva' => $instalacion_definitiva,
			'area_proyecto'       => $area_proyecto,
			'tipo_pm' => $tipo_pm,
			'inspeccion_requerida' => $inspeccion_requerida,
			'nivel_inspeccion' => $nivel_inspeccion,
			'documentos_antes_iniciar' => $documentos_antes_iniciar,
			'alcance_tecnico_trabajo' => $alcance_tecnico_trabajo,
			'instruccion_requirente' => $instruccion_requirente
		  );

	
		$AdjuntoTecnico = $this->tecnico->editaAdjuntoTecnico($update,array('id' =>$id,'id_orden'=>$id_orden));

		echo json_encode($AdjuntoTecnico);
		
	}

	function eliminaAdjuntoTecnico(){  


		$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id = $this->input->post('id');
		
		$AdjuntoTecnico = $this->tecnico->eliminaAdjuntoTecnico($cod_empresa,$id_orden, $id);

		echo json_encode($AdjuntoTecnico);


	}
	


	function guardarArchivoTecnico(){

		$id_archivo_tecnico      = $this->input->post('id_archivo_tecnico');
		$id_orden  = $this->input->post('id_orden');
		$documentos_tecnicos_considera  = $this->input->post('documentos_tecnicos_considera');
		$cod_empresa       = $this->input->post('cod_empresa');	
		$tipo_archivo       = $this->input->post('tipo_archivo');		
		$archivo_original       = $this->input->post('archivo_original');	

		

		$dataInsert = array(	
			'id_archivo_tecnico' => $id_archivo_tecnico ,
			'id_orden' => $id_orden ,
			'documentos_tecnicos_considera' => $documentos_tecnicos_considera,
			'cod_empresa' => $cod_empresa,
			'tipo_archivo' => $tipo_archivo,
			'archivo_original' =>  $archivo_original
			);

	
		$AdjuntoTecnico = $this->tecnico->guardarArchivoTecnico($dataInsert);

		if($AdjuntoTecnico > 0){

			$status = true;

		}else{

			$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $AdjuntoTecnico));
		
	}

	function listasArchivosTecnico(){

		$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$tipo_archivo = $this->input->post('tipo_archivo');


		$AdjuntoTecnico = $this->tecnico->listasArchivosTecnico($cod_empresa,$id_orden,$tipo_archivo);

		echo json_encode($AdjuntoTecnico);
		
	}


	function eliminarAdjuntosTecnicos(){  


		$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id_secuencia = $this->input->post('id_secuencia');
		
		$AdjuntoTecnico = $this->tecnico->eliminarAdjuntosTecnicos($cod_empresa,$id_orden, $id_secuencia);

		echo json_encode($AdjuntoTecnico);


	}

}

	
     
?>