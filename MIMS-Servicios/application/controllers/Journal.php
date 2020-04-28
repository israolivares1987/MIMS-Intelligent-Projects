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


	
	
	function obtieneClientePorId($id)
	{
		$data = $this->cliente->get_by_id($id);
		
		echo json_encode($data);
	}



	function updateCliente()
	{

		$data = array(
			'idCliente' => $this->input->post('idCliente'),	
			'nombreCliente' => $this->input->post('nombreCliente'),
				'rutCliente' => $this->input->post('rutCliente'),
				'dvCliente' => $this->input->post('dvCliente')
			);

		$this->cliente->update(array('idCliente' => $this->input->post('idCliente')), $data);
		echo json_encode(array("status" => TRUE));


		}


		function deleteCliente($id)
		{
					
			$this->cliente->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}
	
		function agregarCliente()
		{
			
			
			$data = array(
				'codEmpresa' => $this->input->post('codEmpresa'),	
			    'nombreCliente' => $this->input->post('nombreCliente'),
				'rutCliente' => $this->input->post('rutCliente'),
				'dvCliente' => $this->input->post('dvCliente')
				);
	
		
			$insert = $this->cliente->save($data);
	
			echo json_encode(array("status" => TRUE));
	
			}

	function obtieneClientePorEmpresa(){

		$codEmpresa = $this->input->post('codEmpresa');	

		$clientes = $this->cliente->obtieneClientePorEmpresa($codEmpresa);

		echo json_encode($clientes);
		
	}		


}

	
     
?>