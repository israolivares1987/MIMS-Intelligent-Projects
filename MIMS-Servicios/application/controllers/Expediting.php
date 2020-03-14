<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
	}

	

	function obtieneExpediting(){

		$Expediting = $this->Consultas->obtieneExpediting();
		
		if($Expediting->num_rows() > 0 ){
		  
			$dataExpediting  = $Expediting->result_array();
			
        

			$sesdata = array(
				'Expediting'  => $dataExpediting
			);

			} 

		echo json_encode($sesdata);


	}

	function obtieneProyectos(){


		$cod_empresa = $this->input->post('cod_empresa');
		

		$proveedores = $this->Consultas->obtieneProveedores($cod_empresa);
		

		foreach ($proveedores as $proveedor) {


			$nombreProveedor = $proveedor->nombreProveedor;
			$idProveedor = $proveedor->idProveedor;
			$html = '<li class="nav-item has-treeview">
            <a href="#" class="nav-link text-sm">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                '.$nombreProveedor.'
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';

				$proyectosProveedores = $this->Consultas->obtieneProyectosProveedores($idProveedor);

				 foreach ($proyectosProveedores as $proyectosProveedor) {

					$DescripcionProyecto = $proyectosProveedor->DescripcionProyecto;
					$NumeroProyecto = $proyectosProveedor->NumeroProyecto;
					$idProveedor = $proyectosProveedor->idProveedor;

					$html .='  <li class="nav-item has-treeview">
					<a href="#" class="nav-link text-sm" >
					  <i class="far fa-circle nav-icon"></i>
					  <p>
						'.$DescripcionProyecto.'
						<i class="right fas fa-angle-left"></i>
					  </p>
					</a>
					<ul class="nav nav-treeview ">';
				       
					$proyectosOrdenes = $this->Consultas->obtienePurchaseOrders($NumeroProyecto,$idProveedor);


					foreach ($proyectosOrdenes as $proyectosOrden) {

						$PurchaseOrderID = $proyectosOrden->PurchaseOrderID;

						$linkHtml = BASE_SERVICIOS_HOME."Activador/listaBucksheet/".$PurchaseOrderID;

						$PurchaseOrderDescription = $proyectosOrden->PurchaseOrderDescription;

						$html .='  <li class="nav-item menu-open">
						<a href="'.$linkHtml.'" class="nav-link text-sm">
						  <i class="far fa-dot-circle nav-icon"></i>
						  <p>'.$PurchaseOrderDescription.'</p>
						</a>
					  </li>';
					  
					

					}

					$html .=' </ul>
					</li>
				  </ul>
				</li>';


				 }	
				 

		}
		
		$sesdata = array(
			'Proyectos'  => $html
		);
    
    
	   echo json_encode($sesdata);	
    
    
	  }
	  

	  function obtieneProyectosFull(){


		$Expeditings = $this->Consultas->obtieneExpediting();
		$no = 0;
		$data = array();
		foreach ($Expeditings as $Expediting) {
			$no++;
			$row = array("TransactionID" => $BuckSheet->TransactionID,
			"TransactionDate" => $BuckSheet->TransactionDate,
			"PO_Item" => $BuckSheet->PO_Item,
			"PO_Subitem" => $BuckSheet->PO_Subitem,
			"ProductID" => $BuckSheet->ProductID,
			"PurchaseOrderID" => $BuckSheet->PurchaseOrderID,
			"Description" => $BuckSheet->Description,
			"Destination" => $BuckSheet->Destination,
			"Unit" => $BuckSheet->Unit,
			"UnitsOrdered" => $BuckSheet->UnitsOrdered,
			"UnitsReceived" => $BuckSheet->UnitsReceived,
			"UnitsMRF" => $BuckSheet->UnitsMRF,
			"UnitsShrinkage" => $BuckSheet->UnitsShrinkage,
			"DateCreated" => $BuckSheet->DateCreated,
			"CreatedBy" => $BuckSheet->CreatedBy,
			"RECEIVED_QUANTITY" => $BuckSheet->RECEIVED_QUANTITY,
			"RAS" => $BuckSheet->RAS,
			"PROMISE_DATE" => $BuckSheet->PROMISE_DATE,
			"PROMISE_DATE_F_A" => $BuckSheet->PROMISE_DATE_F_A,
			"BEGIN_FAB" => $BuckSheet->BEGIN_FAB,
			"BEGIN_FAB_F_A" => $BuckSheet->BEGIN_FAB_F_A,
			"COMPLETED_FAB" => $BuckSheet->COMPLETED_FAB,
			"COMPLETED_FAB_F_A" => $BuckSheet->COMPLETED_FAB_F_A,
			"READY_FOR_INSPECTION" => $BuckSheet->READY_FOR_INSPECTION,
			"READY_FOR_INSPECTION_F_A" => $BuckSheet->READY_FOR_INSPECTION_F_A,
			"FINAL_INSPECTION" => $BuckSheet->FINAL_INSPECTION,
			"FINAL_INSPECTION_F_A" => $BuckSheet->FINAL_INSPECTION_F_A,
			"EXITWORKS" => $BuckSheet->EXITWORKS,
			"PORT_OF_EXPORT" => $BuckSheet->PORT_OF_EXPORT,
			"SHIP_DAYS" => $BuckSheet->SHIP_DAYS,
			"FORECAST_DELIVERY" => $BuckSheet->FORECAST_DELIVERY,
			"CrateNumber" => $BuckSheet->CrateNumber,
			"PACKING_LIST_NUMBER" => $BuckSheet->PACKING_LIST_NUMBER,
			"ASN_NUMBER" => $BuckSheet->ASN_NUMBER,
			"SCN_NUMBER" => $BuckSheet->SCN_NUMBER,
			"TRANSPORT_MODE" => $BuckSheet->TRANSPORT_MODE,
			"MRR_NUMBER" => $BuckSheet->MRR_NUMBER,
			"POSSESSION_MRR" => $BuckSheet->POSSESSION_MRR,
			"ACTUAL_DELIVERY_AT_SITE" => $BuckSheet->ACTUAL_DELIVERY_AT_SITE,
			"UOSD" => $BuckSheet->UOSD,
			"DELIVERY_DESTINATION" => $BuckSheet->DELIVERY_DESTINATION,
			"REMARKS" => $BuckSheet->REMARKS,
			"MWR_Number" => $BuckSheet->MWR_Number,
			"Date_Now" => $BuckSheet->Date_Now);
			
			

			$data[] = $row;
		}

		$output = array(
						"data" => $data
				);

				
		//output to json format
		echo json_encode(array_filter($output),true);



	}



	}

	
     
?>