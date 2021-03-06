<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyectos_model');
		$this->load->model('Consultas_model');
		$this->load->model('Clientes_model', 'clientes');
	}

	

	function obtieneExpediting($idCliente,$idProyecto){
	  
  
		$Expeditings = $this->Proyectos_model->obtieneExpediting($idCliente,$idProyecto);
		
		$no = 0;
		$data = array();
		foreach ($Expeditings as $Expediting) {
			$no++;
			$row = array();

			if($Expediting->OrderDate != null){
                $date = date_create($Expediting->OrderDate);
                $OrderDate = date_format($date, 'd/m/Y');
                }else{
    
                  $OrderDate= null;
                }
    
                if($Expediting->DateRequired != null){
                  $date = date_create($Expediting->DateRequired);
                  $DateCreated = date_format($date, 'd/m/Y');
                  }else{
      
                    $DateCreated= null;
                  }

				  
			$row[] = $Expediting->idProyecto;
			$row[] = $Expediting->PurchaseOrderID;
			$row[] = $Expediting->PurchaseOrderDescription;
			$row[] = $Expediting->Supplier;
			$row[] = $Expediting->Employee;
			$row[] = $OrderDate;
			$row[] = $DateCreated;
			$row[] ='<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Hapus" onclick="abrirBuckSheet('."'".$Expediting->PurchaseOrderID."'".','."'".$Expediting->PurchaseOrderDescription."'".')"><i class="glyphicon glyphicon-trash"></i>BuckSheet</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->Proyectos_model->count_all_Expediting($idCliente),
						"recordsFiltered" => $this->Proyectos_model->count_all_Expediting($idCliente),
						"data" => $data
				);
		//output to json format
		echo json_encode($output);
				  	
	}
				
	

	function obtieneProyectosxCliente(){

		$html = "";
		$cod_empresa = $this->input->post('cod_empresa');
		

		$clientes = $this->clientes->obtieneclientesxempresa($cod_empresa);

		
		
		if($clientes->num_rows() > 0){


			$clientes = $clientes->result();

			
		    foreach ($clientes as $cliente) {

			$nombreCliente = $cliente->nombreCliente;
			$idCliente = $cliente->idCliente;
			$link = $this->config->item('BASE_SERVICIOS_HOME')."index.php/Activador/listProyectosCliente/".$idCliente;
			$html .= '<li class="nav-item">
			<a href="'.$link.'" class="nav-link">
			  <i class="far fa-circle nav-icon"></i>
			  <p style="font-size: 12px;">'.$nombreCliente.'</p>
			</a>
		  </li>';

		   }
		   
		}

		$sesdata = array(
			'Clientes'  => $html
		);
		
		
    
    
	   echo json_encode($sesdata);	
    
    
	}


	function obtieneProyectos($idCliente){
	  
  
		$Proyectos = $this->Proyectos_model->obtieneProyectos($idCliente);
		
		$no = 0;
		$data = array();
		foreach ($Proyectos as $Proyecto) {
			$no++;
			$row = array();

		
				  
			$row[] = $Proyecto->codigo_proyecto;
			$row[] = $Proyecto->descripcion_proyecto;
			$row[] = $Proyecto->estado_proyecto;
			$row[] ='<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Hapus" onclick="reloadTableOrdenes('."'".$Proyecto->idCliente."'".','."'".$Proyecto->descripcion_proyecto."'".')"><i class="glyphicon glyphicon-trash"></i>Lista Ordenes</a>';
			
		

			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->Proyectos_model->count_all_Proyectos($idCliente),
						"recordsFiltered" => $this->Proyectos_model->count_all_Proyectos($idCliente),
						"data" => $data
				);
		//output to json format
		echo json_encode($output);
				  	
	}


	function obtieneProyectosClientes(){

		$cliente = $this->input->post('cliente');

		$proyectos = $this->Proyectos_model->obtieneProyectosCliente($cliente);

		echo json_encode($proyectos);

	}


	

	function obtieneOrderById(){

		$id_order 		= $this->input->post('orden_id');
		$id_proyecto	= $this->input->post('id_proyecto');
		$id_cliente 	= $this->input->post('id_cliente');
		$codEmpresa 	= $this->input->post('codEmpresa');

		$datos_orden = $this->Proyectos_model->obtieneOrderById($id_order,$id_proyecto,$id_cliente,$codEmpresa);
		echo json_encode($datos_orden);

	}

	function obtieneDatosRef(){

		$dominio = $this->input->post('dominio');

		$datos_dominio = $this->Proyectos_model->obtieneDatosRef($dominio);

		echo json_encode($datos_dominio);

	}


	function obtieneDatoRef(){

		$dominio = $this->input->post('dominio');
		$dato = $this->input->post('dato');

		$datos_dominio = $this->Proyectos_model->obtieneDatoRef($dominio,$dato);

		echo json_encode($datos_dominio);

	}




	function eliminaOrden(){

		$id_cliente 	= $this->input->post('id_cliente');
		$id_proyecto 	= $this->input->post('id_proyecto');
		$orden 			= $this->input->post('orden');
		$cod_empresa	= $this->input->post('codEmpresa');

		$delete = $this->Proyectos_model->eliminaOrden($id_cliente, $id_proyecto,$cod_empresa,$orden);
		
		echo json_encode($delete);	

	}


	
	function obtieneSuppliersEmpresa(){

		$codEmpresa = $this->input->post('codEmpresa');
		
		$data = $this->Proyectos_model->obtieneSuppliers($codEmpresa);

		echo json_encode($data);


	}

	function obtieneEmployeeEmpresa(){

		$codEmpresa = $this->input->post('codEmpresa');
		
		$data = $this->Proyectos_model->obtieneEmployee($codEmpresa);

		echo json_encode($data);


	}

	function guardaOrden(){

		$data = $this->input->post();

		$insert = $this->Proyectos_model->guardaOrden($data);

		echo json_encode($insert);

	}


	function actualizaOrden(){

		$data = $this->input->post();

		$update = $this->Proyectos_model->actualizaOrden($data);

		echo json_encode($update);

	}

}

	
     
?>