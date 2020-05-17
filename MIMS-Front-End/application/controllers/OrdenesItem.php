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


  function guardaOrdenItem(){

    $or_item_id_item    = $this->input->post('or_item_id_item');
    $or_item_descripcion     = $this->input->post('or_item_descripcion');
    $or_item_revision   = $this->input->post('or_item_revision');
    $or_item_unidad   = $this->input->post('or_item_select_unidad');
    $or_item_cantidad   = $this->input->post('or_item_cantidad');
    $or_item_valor_unitario         = $this->input->post('or_item_valor_unitario');
    $or_item_valor_neto        = $this->input->post('or_item_valor_neto');
    $or_item_status        = $this->input->post('or_item_select_status');
    $id_order_item       = $this->input->post('id_order_item');
    $id_orden_item_proyecto            = $this->input->post('id_orden_item_proyecto');
    $id_orden_item_cliente    = $this->input->post('id_orden_item_cliente');
    $codEmpresa       = $this->session->userdata('cod_emp');

  

                $data = array(
                  'codEmpresa'                => $codEmpresa,
                  'idCliente'                 => $id_orden_item_cliente,
                  'idProyecto'                => $id_orden_item_proyecto,
                  'PurchaseOrderID'       => $id_order_item,
                  'id_item'  => $or_item_id_item,
                  'descripcion'                => $or_item_descripcion,
                  'revision'            => $or_item_revision,
                  'unidad'                => $or_item_unidad,
                  'cantidad'        => $or_item_cantidad,
                  'precio_unitario'                  => $or_item_valor_unitario,
                  'valor_neto'                 => $or_item_valor_neto,
                  'estado'                => $or_item_status
                );

                $ordenes    = $this->callexternosordenesitem->guardaOrdenItem($data);

                if($ordenes){

                  $error_msg = 'Orden Item cargada correctamente';
                  $resp =  true;
            
                }else{
                  $error_msg = 'Error en cargar Orden Item, favor revisar con Soporte';
                  $resp =  false;
                }


      

      $data = array(
        'mensaje'  => $error_msg,
        'resp' => $resp
      );


    echo json_encode($data);

  }

  function editarOrdenItem(){

    $orden_id     = $this->input->post('order_id');
    $id_proyecto  = $this->input->post('id_proyecto');
    $id_cliente   = $this->input->post('id_cliente');
    $item_id   = $this->input->post('item_id');
    $codEmpresa   = $this->session->userdata('cod_emp');
    $data         = array();
    $datos        = array();

    $orden        = $this->callexternosordenesitem->editarOrdenItem($id_proyecto,$id_cliente,$orden_id,$item_id,$codEmpresa);



    if($orden){

      foreach (json_decode($orden) as $key => $value) {


        $data= array(
          'codEmpresa'=> $value->codEmpresa,
          'id_act_orden_item_cliente'=> $value->idCliente,
          'id_act_orden_item_proyecto'=> $value->idProyecto,
          'id_act_order_item'=> $value->PurchaseOrderID,
          'id_act_item'=> $value->id_item,
          'or_act_item_descripcion'=> $value->descripcion,
          'or_act_item_revision'=> $value->revision,
          's_act_item_unidad'=> $this->callutil->obtiene_select_def_act('or_act_select_unidad',$value->unidad,'UNIDAD_MEDIDA'),
          'or_act_item_cantidad'=> $value->cantidad, 
          'or_act_item_valor_unitario'=> $value->precio_unitario,
          'or_act_item_valor_neto'=> $value->valor_neto,
          's_act_item_status'=> $this->callutil->obtiene_select_def_act('or_act_select_estado',$value->estado,'ESTADO_ITEM_ORDEN')
        );
  

      }

    }

    $datos['formulario'] = $data;

    echo json_encode($datos);


  }

  function actualizaOrdenItem(){


    $or_act_item_descripcion    = $this->input->post('or_act_item_descripcion');
    $or_act_item_revision     = $this->input->post('or_act_item_revision');
    $s_act_item_unidad   = $this->input->post('or_act_select_unidad');
    $or_act_item_cantidad   = $this->input->post('or_act_item_cantidad');
    $or_act_item_valor_neto   = $this->input->post('or_act_item_valor_neto');
    $or_act_item_valor_unitario         = $this->input->post('or_act_item_valor_unitario');
    $s_act_item_status        = $this->input->post('or_act_select_estado');
  

    $id_proyecto_or       = $this->input->post('id_act_orden_item_proyecto');
    $id_cliente_or       = $this->input->post('id_act_orden_item_cliente');
    $id_order_or       = $this->input->post('id_act_order_item');
    $id_orden_item   = $this->input->post('or_act_id_item');

    $codEmpresa       = $this->session->userdata('cod_emp');


   
    $data_update = array(
      'codEmpresa'                => $codEmpresa,
      'idCliente'                 => $id_cliente_or,
      'idProyecto'                => $id_proyecto_or,
      'PurchaseOrderID'       => $id_order_or,
      'id_item'  => $id_orden_item,
      'descripcion'                => $or_act_item_descripcion,
      'revision'            => $or_act_item_revision,
      'unidad'                => $s_act_item_unidad,
      'cantidad'        => $or_act_item_cantidad,
      'precio_unitario'                  => $or_act_item_valor_unitario,
      'valor_neto'                 => $or_act_item_valor_neto,
      'estado'                => $s_act_item_status
    );
                $ordenes    = $this->callexternosordenesitem->actualizaOrdenItem($data_update);

                if($ordenes){

                  $error_msg = 'Orden Item actualizada correctamente';
                  $resp =  true;

                }else{
                  $error_msg = 'Error en actualizar Orden Item , favor revisar con Soporte';
                  $resp =  false;
                }
              
      $data = array(
        'mensaje'  => $error_msg,
        'resp' => $resp
      );


    echo json_encode($data);

  }

  function eliminaOrdenItem(){

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');
    $orden            = $this->input->post('orden');
    $orden_item            = $this->input->post('orden_item');
    $codEmpresa       = $this->session->userdata('cod_emp');


      $data = array(
        'id_cliente'  => $id_cliente,
        'id_proyecto' => $id_proyecto,
        'orden'       => $orden,
        'orden_item'       => $orden_item,
        'codEmpresa'  => $codEmpresa
      );

      $delete = $this->callexternosordenesitem->eliminaOrdenItem($data);

      if($delete){

        $data['resp'] = true;
        $data['mensaje'] = 'Registro eliminado correctamente';

      }else{
        $data['resp'] = false;
        $data['mensaje'] = 'Error al eliminar el regitro';
      }


        echo json_encode($data);

}


  



    }