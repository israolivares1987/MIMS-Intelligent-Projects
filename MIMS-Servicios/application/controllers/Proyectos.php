<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyectos_model');
		$this->load->model('Consultas_model');
		$this->load->model('Clientes_model', 'clientes');
	}


	function obtieneProyectosxCliente(){

		
		$cod_empresa = $this->input->post('cod_empresa');
		

		$clientes = $this->clientes->obtieneProyectosxCliente($cod_empresa);


	   echo json_encode($clientes);	
    
    
	}

	function obtieneProyectosClientes(){

		$cliente = $this->input->post('cliente');

		$proyectos = $this->Proyectos_model->obtieneProyectosCliente($cliente);

		echo json_encode($proyectos);

	}

	function guardaProyecto(){

		$id_cliente 		= $this->input->post('id_cliente');
		$nombre_proyecto 	= $this->input->post('nombre_proyecto');
		$codEmpresa 	= $this->input->post('codEmpresa');

		$descripcion_proyecto 	= $this->input->post('descripcion_proyecto');
		$lugar_proyecto 	= $this->input->post('lugar_proyecto');


		$data = array(
			'codEmpresa' 			=> $codEmpresa,
			'idCliente'  			=> $id_cliente,
			'NombreProyecto'	=> $nombre_proyecto,
			'DescripcionProyecto' => $descripcion_proyecto,
			'Lugar' => $lugar_proyecto,
			'estadoProyecto'		=> 1
		);

		$insert = $this->Proyectos_model->guardaProyecto($data);

		echo json_encode(array('status'=>'OK'));

	}

	
	function obtieneProyectoById(){

		$id = $this->input->post('id_proyecto');
		$id_cliente = $this->input->post('id_cliente');

		$datos_proyecto = $this->Proyectos_model->obtieneProyectoById($id,$id_cliente);

		echo json_encode($datos_proyecto);

	}
	function actualizaProyecto(){

		$id_cliente  = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');
		$cod_empresa = $this->input->post('codEmpresa');
		$nombre_proyecto = $this->input->post('nombre_proyecto');
		$estado = $this->input->post('estado');
		$lugar_proyecto=  $this->input->post('lugar_proyecto');
		$descripcion_proyecto = $this->input->post('descripcion_proyecto');

		$resp = false;



		$up = array(
			'DescripcionProyecto'	=> $descripcion_proyecto,
			'estadoProyecto'		=> $estado,
			'NombreProyecto'		=> $nombre_proyecto,
			'Lugar'		=> $lugar_proyecto,
		);

		$update = $this->Proyectos_model->actualizaProyecto($up, $id_cliente, $id_proyecto,$cod_empresa);


		if($update){
			$resp = true;
			echo json_encode(array('status' => $resp));	
		}else{
			echo json_encode(array('status' => $resp));	
		}

		

	}


	function eliminaProyecto(){

		$id_cliente  = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');
		$cod_empresa = $this->input->post('codEmpresa');

		$delete = $this->Proyectos_model->eliminaProyecto($id_cliente, $id_proyecto,$cod_empresa);
		
		echo json_encode($delete);	

	}

}

	
     
?>