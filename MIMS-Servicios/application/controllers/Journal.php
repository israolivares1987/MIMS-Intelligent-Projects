<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Journal_model','journal');
	}

	function obtienejournal(){

		$id_orden_compra = $this->input->post('id_orden_compra');
		$tipo = $this->input->post('tipo');
		$id_cliente = $this->input->post('id_cliente');


		$journals = $this->journal->obtienejournal($id_orden_compra,$tipo,$id_cliente);
				//output to json format
		echo json_encode($journals);


	}


	function obtienejournalLev(){

		$id_orden_compra = $this->input->post('id_orden_compra');
		$tipo = $this->input->post('tipo');
		$id_cliente = $this->input->post('id_cliente');
		$id_interaccion = $this->input->post('id_interaccion');
		$id_interaccion_ref = $this->input->post('id_interaccion_ref');


		$journals = $this->journal->obtienejournalLev($id_orden_compra,$tipo,$id_cliente,$id_interaccion,$id_interaccion_ref);
				//output to json format
		echo json_encode($journals);


	}


	
	
		function agregarControlCalidad()
		{
			

			$dataInsert = array(
				'tipo' => $this->input->post('tipo'),	
			    'id_orden_compra' => $this->input->post('id_orden_compra'),
				'id_cliente' => $this->input->post('id_cliente'),
				'id_proyecto' => $this->input->post('id_proyecto'),
				'id_empleado' => $this->input->post('id_empleado'),
				'nombre_empleado' => $this->input->post('nombre_empleado'),
				'tipo_interaccion' => $this->input->post('tipo_interaccion'),
				'fecha_ingreso' => $this->input->post('fecha_ingreso'),
				'numero_referencial' => $this->input->post('numero_referencial'),
				'solicitado_por' => $this->input->post('solicitado_por'),
				'aprobado_por' => $this->input->post('aprobado_por'),
				'comentarios_generales' => $this->input->post('comentarios_generales'),
				'respaldos' => $this->input->post('respaldos'),
				'respaldos_original' => $this->input->post('respaldos_original'),				
				'estado' =>'1',
				'id_interaccion_ref' => $this->input->post('id_interaccion_ref')
				);
	
		
			$insert = $this->journal->save($dataInsert);

			if($insert > 0){

				$status = true;

			}else{

				$status = false;
			}
	
			echo json_encode(array("status" => $status,"id_insertado" => $insert));
	
			}
 
		
			function obtiene_journal_x_id(){

				$id_interaccion = $this->input->post('id_control_calidad');
				
				$journals = $this->journal->get_by_id($id_interaccion);
				

				echo json_encode($journals);

			}

			
			function desactivaJournal(){

				$id_interaccion 	= $this->input->post('id_interaccion');
				$id_orden 	= $this->input->post('id_orden');
				$codEmpresa 			= $this->input->post('codEmpresa');
			
		
				$delete = $this->journal->desactivaJournal($id_interaccion, $id_orden,$cod_empresa);
				
				echo json_encode($delete);	
		
			}


			function actualizarControlCalidad()
			{
				
	
				$update = $this->input->post();
		
			
					$updateJournal = $this->journal->update($update,array('id_interaccion' =>$this->input->post('id_interaccion')));

					echo json_encode(array("status" => $updateJournal));
		
				}


				function obtienejournalAdvertencias(){

					$id_orden_compra = $this->input->post('id_orden_compra');
					$tipo = $this->input->post('tipo');
					$id_cliente = $this->input->post('id_cliente');
			
			
					$journals = $this->journal->obtienejournalAdvertencias($id_orden_compra,$tipo,$id_cliente);
							//output to json format
					echo json_encode($journals);
			
			
				}

				function obtienejournalHallazgos(){

					$id_orden_compra = $this->input->post('id_orden_compra');
					$tipo = $this->input->post('tipo');
					$id_cliente = $this->input->post('id_cliente');
			
			
					$journals = $this->journal->obtienejournalHallazgos($id_orden_compra,$tipo,$id_cliente);
							//output to json format
					echo json_encode($journals);
			
			
				}

				

}

	
     
?>