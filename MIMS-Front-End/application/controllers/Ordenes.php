<?php
class Ordenes extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('CallUtil');
    

 
  }

  function obtieneOrdenes(){

    $idCliente       = $this->input->post('idCliente');
    $idProyecto      = $this->input->post('idProyecto');

    $respuesta = false;

    $ordenes = $this->callexternosordenes->obtieneOrdenes($idProyecto,$idCliente);

    $arrOrdenes = json_decode($ordenes);
 

  $datos_ordenes = array();

  if($arrOrdenes){
    $respuesta = true;
    
    foreach ($arrOrdenes as $key => $value) {

      $Support = '';

      if(strlen($value->Support) > 0 && $value->Support !='null'  ){
        $Support = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/ordenes/'.$value->Support.'" download="'.$value->Support.'"><i class="fas fa-download"></i> Descarga</a>';
      }else{
        $Support = '';
      }

      
      $datos_ordenes[] = array(
        'PurchaseOrderID' => $value->PurchaseOrderID,
        'PurchaseOrderNumber'   => $value->PurchaseOrderNumber,
        'PurchaseOrderDescription'   => $value->PurchaseOrderDescription,
        "SupplierName" => $value->SupplierName,
        'ExpediterID'   => $value->ExpediterID,
        'Requestor'   => $value->Requestor,
        'Currency'   => $value->Currency,
        'ValorNeto'   => $value->ValorNeto,
        'ValorTotal'   => $value->ValorTotal,
        'Budget'   => $value->Budget,
        'CostCodeBudget'   => $value->CostCodeBudget,
        'OrderDate'   => $this->callutil->formatoFechaSalida($value->OrderDate),
        'DateRequired'   => $this->callutil->formatoFechaSalida($value->DateRequired),
        'DatePromised'   => $this->callutil->formatoFechaSalida($value->DatePromised),
        'ShipDate'   => $this->callutil->formatoFechaSalida($value->ShipDate),
        'ShippingMethodID'   => $value->ShippingMethodID,
        'DateCreated'   => $this->callutil->formatoFechaSalida($value->DateCreated),
        "POStatus" => $value->POStatus,
        'Support' =>  $Support,
      );

    }
  }


						

    $datos['ordenes'] = $datos_ordenes;
    $datos['resp']    = $respuesta;

    echo json_encode($datos);
    

  }

    }