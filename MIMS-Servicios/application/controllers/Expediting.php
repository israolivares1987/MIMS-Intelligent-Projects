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


	function obtieneProyectos($idProveedor){
	  
  
		$Proyectos = $this->Proyectos_model->obtieneProyectos($idProveedor);
		
		$no = 0;
		$data = array();
		foreach ($Proyectos as $Proyecto) {
			$no++;
			$row = array();

		
				  
			$row[] = $Proyecto->NumeroProyecto;
			$row[] = $Proyecto->DescripcionProyecto;
			$row[] = $Proyecto->estadoProyecto;
			$row[] ='<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Hapus" onclick="reloadTableOrdenes('."'".$Proyecto->idCliente."'".','."'".$Proyecto->NumeroProyecto."'".')"><i class="glyphicon glyphicon-trash"></i>Lista Ordenes</a>';
			
		

			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->Proyectos_model->count_all_Proyectos($idProveedor),
						"recordsFiltered" => $this->Proyectos_model->count_all_Proyectos($idProveedor),
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

	function guardaProyecto(){

		$id_cliente 		= $this->input->post('id_cliente');
		$nombre_proyecto 	= $this->input->post('nombre_proyecto');
		$codEmpresa 	= $this->input->post('codEmpresa');


		$data = array(
			'codEmpresa' 			=> $codEmpresa,
			'idCliente'  			=> $id_cliente,
			'DescripcionProyecto'	=> $nombre_proyecto,
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

	function obtieneDatosRef(){

		$dominio = $this->input->post('dominio');

		$datos_dominio = $this->Proyectos_model->obtieneDatosRef($dominio);

		echo json_encode($datos_dominio);

	}

	function actualizaProyecto(){

		$id_cliente  = $this->input->post('id_cliente');
		$id_proyecto = $this->input->post('id_proyecto');
		$cod_empresa = $this->input->post('codEmpresa');
		$nombre_proyecto = $this->input->post('nombre_proyecto');
		$estado = $this->input->post('estado');
		$resp = false;

		$up = array(
			'DescripcionProyecto'	=> $nombre_proyecto,
			'estadoProyecto'		=> $estado
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