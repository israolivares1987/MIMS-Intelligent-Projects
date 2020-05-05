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

}

	
     
?>