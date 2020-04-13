<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Clientes_model','cliente');
	}

	function obtieneClientes(){


		$Clientees = $this->cliente->obtieneClientees();
		$no = 0;
		$data = array();
		foreach ($Clientees as $Cliente) {
			$no++;
			$row = array();
			$row[] = $Cliente->nombreCliente;
			$row[] = $Cliente->rutCliente;
			$row[] = $Cliente->dvCliente;
			$row[] = '<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Edit" onclick="edit_Cliente('."'".$Cliente->idCliente."'".')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>';
			$row[] ='<a class="btn btn-block btn-outline-danger" href="javascript:void(0)" title="Hapus" onclick="delete_Cliente('."'".$Cliente->idCliente."'".')"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
			
			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->cliente->count_all(),
						"recordsFiltered" => $this->cliente->count_all(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);


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


	}

	
     
?>