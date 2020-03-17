<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proveedores_model');
	}

	function obtieneProveedores(){


		$Proveedores = $this->Proveedores_model->obtieneProveedores();
		$no = 0;
		$data = array();
		foreach ($Proveedores as $Proveedor) {
			$no++;
			$row = array();
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Edit" onclick="edit_proveedor('."'".$Proveedor->idProveedor."'".')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>';
			$row[] ='<a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_proveedor('."'".$Proveedor->idProveedor."'".')"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
			$row[] = $Proveedor->nombreProveedor;
			$row[] = $Proveedor->rutProveedor;
			$row[] = $Proveedor->dvProveedor;
			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->Proveedores_model->count_all(),
						"recordsFiltered" => $this->Proveedores_model->count_all(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);


	}


	function obtieneProveedorPorId($id)
	{
		$data = $this->Proveedores_model->get_by_id($id);
		
		echo json_encode($data);
	}

	function updateProveedor()
	{

		$data = array(
			'idProveedor' => $this->input->post('idProveedor'),	
			'nombreProveedor' => $this->input->post('nombreProveedor'),
				'rutProveedor' => $this->input->post('rutProveedor'),
				'dvProveedor' => $this->input->post('dvProveedor')
			);

		$this->Proveedores_model->update(array('idProveedor' => $this->input->post('idProveedor')), $data);
		echo json_encode(array("status" => TRUE));


		}


		function deleteProveedor($id)
		{
					
			$this->Proveedores_model->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}
	
		function agregarProveedor()
		{
			
			
			$data = array(
				'codEmpresa' => $this->input->post('codEmpresa'),	
			    'nombreProveedor' => $this->input->post('nombreProveedor'),
				'rutProveedor' => $this->input->post('rutProveedor'),
				'dvProveedor' => $this->input->post('dvProveedor')
				);
	
		
			$insert = $this->Proveedores_model->save($data);
	
			echo json_encode(array("status" => TRUE));
	
			}





	}

	
     
?>