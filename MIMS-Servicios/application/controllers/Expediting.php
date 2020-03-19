<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyectos_model');
		$this->load->model('Consultas_model');
	}

	

	function obtieneExpediting($idProveedor,$idProyecto){
	  
  
		$Expeditings = $this->Proyectos_model->obtieneExpediting($idProveedor,$idProyecto);
		
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
			$row[] ='<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Hapus" onclick="abrirBuckSheet('."'".$Expediting->PurchaseOrderID."'".')"><i class="glyphicon glyphicon-trash"></i>BuckSheet</a>';
			
		

			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->Proyectos_model->count_all_Expediting($idProveedor),
						"recordsFiltered" => $this->Proyectos_model->count_all_Expediting($idProveedor),
						"data" => $data
				);
		//output to json format
		echo json_encode($output);
				  	
	}
				
	

	function obtieneClientesProyectos(){

		$html = "";
		$cod_empresa = $this->input->post('cod_empresa');
		

		$proveedores = $this->Consultas_model->obtieneProveedores($cod_empresa);

		
		
		if($proveedores->num_rows() > 0){


			$proveedores = $proveedores->result();

			
		    foreach ($proveedores as $proveedor) {

			$nombreProveedor = $proveedor->nombreProveedor;
			$idProveedor = $proveedor->idProveedor;
			$link = BASE_SERVICIOS_HOME."Activador/listProyectosProveedor/".$idProveedor;
			$html .= '<li class="nav-item">
			<a href="'.$link.'" class="nav-link">
			  <i class="far fa-circle nav-icon"></i>
			  <p style="font-size: 12px;">'.$nombreProveedor.'</p>
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
			$row[] ='<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Hapus" onclick="reloadTableOrdenes('."'".$Proyecto->idProveedor."'".','."'".$Proyecto->NumeroProyecto."'".')"><i class="glyphicon glyphicon-trash"></i>Lista Ordenes</a>';
			
		

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




	}

	
     
?>