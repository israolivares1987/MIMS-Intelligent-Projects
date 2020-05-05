<?php
class OrdenesItem extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosOrdenesItem');
    $this->load->library('CallUtil');
    

 
  }

  function obtieneItemOrdenes(){

    $idCliente       = $this->input->post('idCliente');
    $idProyecto      = $this->input->post('idProyecto');
    $idOrden      = $this->input->post('idOrden');

  

    $respuesta = false;

    $ordenesItem = $this->callexternosordenesitem->obtieneItemOrdenes($idOrden,$idProyecto,$idCliente);

    $arrOrdenesItem = json_decode($ordenesItem);
 

  $datos_ordenesItem = array();

  if($arrOrdenesItem){
    $respuesta = true;
    
    foreach ($arrOrdenesItem as $key => $value) {
      
      $datos_ordenesItem[] = array(
        'codEmpresa'=> $value->codEmpresa,
        'idCliente'=> $value->idCliente,
        'idProyecto'=> $value->idProyecto,
        'PurchaseOrderID'=> $value->PurchaseOrderID,
        'id_item'=> $value->id_item,
        'descripcion'=> $value->descripcion,
        'revision'=> $value->revision,
        'unidad'=> $value->unidad,
        'cantidad'=> $this->callutil->formatoNumero($value->cantidad), 
        'precio_unitario'=> $this->callutil->formatoDinero($value->precio_unitario),
        'valor_neto'=> $this->callutil->formatoDinero($value->valor_neto),
        'estado'=> $value->estado
      );

    }
  }


						

    $datos['ordenes_item'] = $datos_ordenesItem;
    $datos['resp']    = $respuesta;

    echo json_encode($datos);
    

  }

    }