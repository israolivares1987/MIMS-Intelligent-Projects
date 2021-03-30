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

		$data = $this->input->post();
		$data['estadoProyecto'] = 1;

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

		$up = $this->input->post();

		$resp = false;
		$update = $this->Proyectos_model->actualizaProyecto($up, $this->input->post('idCliente'), $this->input->post('NumeroProyecto'),$this->input->post('codEmpresa'));


		if($update){
			$resp = true;
			echo json_encode(array('status' => $resp));	
		}else{
			echo json_encode(array('status' => $resp));	
		}

		

	}


	function eliminaProyecto(){


		$id_cliente  = $this->input->post('idCliente');
		$id_proyecto = $this->input->post('NumeroProyecto');
		$cod_empresa = $this->input->post('codEmpresa');

		$delete = $this->Proyectos_model->eliminaProyecto($id_cliente, $id_proyecto,$cod_empresa);
		
		echo json_encode($delete);	

	}

}

	
     
?>