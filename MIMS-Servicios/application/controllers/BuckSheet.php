<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuckSheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Consultas');
		$this->load->model('Proyectos_model');
	}

	

	function obtieneBuckSheet(){


		$PurchaseOrderID = $this->input->post('PurchaseOrderID');


		$BuckSheets = $this->Proyectos_model->obtieneBuckSheet($PurchaseOrderID);
		$no = 0;
		$data = array();
		foreach ($BuckSheets as $BuckSheet) {
			$no++;
			$row = array("TransactionID" => $BuckSheet->TransactionID,
			"TransactionDate"=> $BuckSheet->TransactionDate,
			"PO_Item" => $BuckSheet->PO_Item,
			"PO_Subitem" => $BuckSheet->PO_Subitem,
			"Product" => $BuckSheet->Product,
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
			"BEGIN_FAB_F_A" => $BuckSheet->BEGIN_FAB_F_A,
			"MRR_NUMBER" => $BuckSheet->MRR_NUMBER,
			"POSSESSION_MRR" => $BuckSheet->POSSESSION_MRR,
			"ACTUAL_DELIVERY_AT_SITE" => $BuckSheet->ACTUAL_DELIVERY_AT_SITE,
			"UOSD" => $BuckSheet->UOSD,
			"DELIVERY_DESTINATION" => $BuckSheet->DELIVERY_DESTINATION,
			"REMARKS" => $BuckSheet->REMARKS,
			"MWR_Number" => $BuckSheet->MWR_Number);
			
			

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