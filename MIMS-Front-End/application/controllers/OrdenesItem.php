<?php
class OrdenesItem extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosOrdenesItem');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('CallExternosBuckSheet');
    $this->load->library('CallUtil');
    $this->load->library('form_validation');
    $this->load->helper('file');
    $this->load->helper('url');
    $this->load->library('CSVReader');
    $this->load->library('CallExternosBitacora');
    
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
 
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
              'unidad'=> $this->callutil->cambianull($value->unidad),
              'cantidad'=> $this->callutil->formatoNumero($value->cantidad), 
              'precio_unitario'=> $this->callutil->formatoDinero($value->precio_unitario),
              'valor_neto'=> $this->callutil->formatoDinero($value->valor_neto),
              'fecha_requerida' =>$this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_requerida)),
              'estado'=> $value->estado,
              'PurchaseOrderNumber'=> $this->callutil->cambianull($value->PurchaseOrderNumber),
              'PurchaseOrderDescription'=> $this->callutil->cambianull($value->PurchaseOrderDescription)

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
    $or_item_cantidad   = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_item_cantidad'));
    $or_item_valor_unitario         = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_item_valor_unitario'));
    $or_item_valor_neto        = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_item_valor_neto'));
    $or_item_status        = $this->input->post('or_item_select_status');
    $id_order_item       = $this->input->post('id_order_item');
    $id_orden_item_proyecto            = $this->input->post('id_orden_item_proyecto');
    $id_orden_item_cliente    = $this->input->post('id_orden_item_cliente');
    $or_fecha_requerida = $this->input->post('or_fecha_requerida');
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
                  'fecha_requerida' =>     $this->callutil->formatoFecha($or_fecha_requerida),
                  'estado'                => $or_item_status
                );

                $ordenes    = $this->callexternosordenesitem->guardaOrdenItem($data);
              


                if($ordenes){

                  $error_msg = 'Orden Item cargada correctamente';
                  $resp =  true;

                  $numerolineaResponse = $this->callexternosbucksheet->obtieneNumeroLinea($id_order_item,$codEmpresa, $id_orden_item_proyecto);

                 

                  $arrnumerolinea = json_decode($numerolineaResponse);
 

                
                      if($arrnumerolinea){
                        
                        foreach ($arrnumerolinea as $key => $value) {
                          
                          $numerolinea = $value->NumeroLinea;
              
                        }

                      }  

                 $cargaWpanel = $this->ordenItem_to_wpanel($numerolinea,
                                                            $id_orden_item_proyecto,
                                                            $id_orden_item_cliente,
                                                            $id_order_item,
                                                            $codEmpresa,
                                                            $or_item_id_item,
                                                            $or_item_unidad,
                                                            $or_item_cantidad,
                                                            $or_item_descripcion);

                
                $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                'accion'  => 'INSERTA_ORDEN_ITEM',
                'id_registro' =>  '0',
                'usuario'  =>  $this->session->userdata('n_usuario'),
                'rol' =>   $this->session->userdata('nombre_rol'),
                'objeto'  => 'ORDEN_ITEM' ,
                'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
        
                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                           
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
          'or_act_item_cantidad'=> $this->callutil->formatoNumero($value->cantidad), 
          'or_act_item_valor_unitario'=> $this->callutil->formatoNumero($value->precio_unitario),
          'or_act_item_valor_neto'=> $this->callutil->formatoNumero($value->valor_neto),
          'or_act_fecha_requerida' =>     $this->callutil->formatoFechaSalida($value->fecha_requerida),
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
    $or_act_item_cantidad   = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_item_cantidad'));
    $or_act_item_valor_neto   = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_item_valor_neto'));
    $or_act_item_valor_unitario         = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_item_valor_unitario'));
    $or_act_fecha_requerida =    $this->input->post('or_act_fecha_requerida');
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
      'fecha_requerida'                      =>$this->callutil->formatoFecha($or_act_fecha_requerida),
      'estado'                => $s_act_item_status
    );
                $ordenes    = $this->callexternosordenesitem->actualizaOrdenItem($data_update);

                if($ordenes){

                  $error_msg = 'Orden Item actualizada correctamente';
                  $resp =  true;


                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'ACTUALIZA_ORDEN_ITEM',
                  'id_registro' =>  $id_orden_item,
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN_ITEM' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
          
                  $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

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


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ELIMINA_ORDEN_ITEM',
        'id_registro' =>  $orden_item,
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'ORDEN_ITEM' ,
        'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

      }else{
        $data['resp'] = false;
        $data['mensaje'] = 'Error al eliminar el regitro';
      }


        echo json_encode($data);

}


  
public function save() {

  $data = array();
  $memData = array();
  $successMsg="";
  $error_msg = "";
  $insertCount = 0;
  $updateCount = 0;
  $rowCount = 0; 
  $codEmpresa = $this->session->userdata('cod_emp');
  $idOrden = $this->input->post('PurchaseOrderID');
  $idCliente = $this->input->post('idCliente');
  $idProyecto = $this->input->post('idProyecto');
  $id_item	= $this->input->post('id_item'); 
  $descripcion	= $this->input->post('descripcion');
  $revision	= $this->input->post('revision');
  $unidad	= $this->input->post('unidad');
  $cantidad	= $this->callutil->formatoNumeroMilesEntrada($this->input->post('cantidad'));
  $precio_unitario	= $this->callutil->formatoNumeroMilesEntrada($this->input->post('precio_unitario'));
  $valor_neto= $this->callutil->formatoNumeroMilesEntrada($this->input->post('valor_neto'));
  $estado = 1;   
  $nameArchivo = 'fileOrdenItem';


  $archivo = $this->checkFileValidation($nameArchivo);
  $respArchivo = $archivo['resp'];

  
  if($respArchivo== false){

    


    $error_msg = 'Archivo invalido, favor seleccionar archivo valido.';
    $resp = false;
  

  }else{  

      
     if(is_uploaded_file($_FILES[$nameArchivo]['tmp_name'])) {                            

        $csvData = $this->csvreader->parse_csv($_FILES[$nameArchivo]['tmp_name']);            
      
    
                        // create array from CSV file
                        if(!empty($csvData)){

                            foreach($csvData as $row){  


                            $rowCount++;
                            
                          
                                                 
                            
                            
                            $memData = array(
                                'codEmpresa' => $codEmpresa,
                                'PurchaseOrderID' => $idOrden,
                                'idCliente' => $idCliente,
                                'idProyecto' => $idProyecto,
                                'id_item' => $row['id_item'],
                                'descripcion' => $row['descripcion'],
                                'revision' => $row['revision'],
                                'unidad' => $row['unidad'],
                                'cantidad' => $row['cantidad'],
                                'precio_unitario' => $row['precio_unitario'],
                                'valor_neto' => $row['cantidad'] * $row['precio_unitario'],
                                'estado' => $estado
                            );
                            
                                // Check whether register already exists in the database


                                if($row['PurchaseOrderID'] == $idOrden){


                                  $prevCount = $this->callexternosordenesitem->getRows($idProyecto,$idOrden,$row['id_item']); 
                                                    
                                  if($prevCount > 0){
                                      // Update member data
                                      
                                      $update = $this->callexternosordenesitem->update($memData);
                                      
                                      if($update){
                                          $updateCount++;


                                          $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                                          'accion'  => 'ACTUALIZA_ORDEN_ITEM',
                                          'id_registro' =>  $row['id_item'],
                                          'usuario'  =>  $this->session->userdata('n_usuario'),
                                          'rol' =>   $this->session->userdata('nombre_rol'),
                                          'objeto'  => 'ORDEN_ITEM' ,
                                          'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
                                  
                                          $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                                      }
                                  }else{
                                      // Insert member data
                                      $insert = $this->callexternosordenesitem->insert($memData);



                                      $numerolineaResponse = $this->callexternosbucksheet->obtieneNumeroLinea($idOrden,$codEmpresa, $idProyecto);
                                  
                                                   
                                           $arrnumerolinea = json_decode($numerolineaResponse);
                                   
                                  
                                                  
                                                        if($arrnumerolinea){
                                                          
                                                          foreach ($arrnumerolinea as $key => $value) {
                                                            
                                                            $numerolinea = $value->NumeroLinea;
                                                
                                                          }
                                  
                                                        }  
                                  
                                                          $cargaWpanel = $this->ordenItem_to_wpanel($numerolinea,
                                                                                                    $idProyecto,
                                                                                                    $idCliente,
                                                                                                    $idOrden,
                                                                                                    $codEmpresa,
                                                                                                    $row['id_item'],
                                                                                                    $row['unidad'],
                                                                                                    $row['cantidad'],
                                                                                                    $row['descripcion']);          
                                                      
                                                 


                                      
                                      if($insert){
                                          $insertCount++;

                                      
                                          $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                                          'accion'  => 'INSERTA_ORDEN_ITEM',
                                          'id_registro' =>  $row['id_item'],
                                          'usuario'  =>  $this->session->userdata('n_usuario'),
                                          'rol' =>   $this->session->userdata('nombre_rol'),
                                          'objeto'  => 'ORDEN_ITEM' ,
                                          'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
                                  
                                          $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);



                                      }
                                  }

                                      // Status message with imported data count
                                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                                        $error_msg = 'Orden Items importado correctamente. Total registros ('.$rowCount.') | Insertados ('.$insertCount.') | Actualizados('.$updateCount.') | No insertados ('.$notAddCount.')';
                                        $resp = true;

                                }else{

                                  $error_msg = 'Orden en archivo no coincide con la orden seleccionada '.
                                                'Orden de Archivo: '.$row['PurchaseOrderID'].
                                                ' Orden seleccionada: '.$idOrden;
                                  $resp = false;

                                }
                              
                            
                            }

                        }   

            }else{
              
            $error_msg = 'Archivo con problemas, favor comunicarse con soporte.';
            $resp = false;

          }  
    }


      $data['resp']        = $resp;
      $data['mensaje']     = $error_msg;

      echo json_encode($data);

}

    // checkFileValidation
    public function checkFileValidation($str) {   
    


      $mime_types = array(
          'text/csv',
          'text/x-csv', 
          'application/csv', 
          'application/x-csv', 
          'application/excel',
          'text/x-comma-separated-values', 
          'text/comma-separated-values', 
          'application/octet-stream', 
          'application/vnd.ms-excel',
          'application/vnd.msexcel', 
          'text/plain',
          'application/msword',
          'application/vnd.openxmlformats officedocument.wordprocessingml.document',
          'image/jpeg',
          'application/pdf',
          'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
  
      $fileExtArray = array(
        'csv',
        'CSV', 
        'pdf', 
        'PDF', 
        'xls',
        'xlsx', 
        'XLS', 
        'XLSX', 
        'doc',
        'docx', 
        'DOC',
        'DOCX'
    );
      if(isset($_FILES[$str]['name']) && $_FILES[$str]['name'] != ""){
          // get mime by extension
          $mime = get_mime_by_extension($_FILES[$str]['name']);
          $fileExt = explode('.', $_FILES[$str]['name']);
          $ext = end($fileExt);
  
          if(in_array($ext, $fileExtArray) && in_array($mime, $mime_types)){
            $resp=  true;
            $error_msg = 'Archivo OK';
  
  
          }else{
            $error_msg = 'Please choose correct file.';
            $resp = false;
          }
      }else{
          $error_msg =  'Please choose a file.';
          $resp = false;
      }
  
      $data = array(
        'mensaje'  => $error_msg,
        'resp' => $resp
      );
  
      return $data;
  
  }

  function ordenItem_to_wpanel($numerolinea,$idProyecto,$idCliente,$idOrden,$codEmpresa,$OrdenItemID,$Unidad,$Cantidad,$Descripcion){

    $SupplierName = "";
    $PurchaseOrderNumber = "";
    $PurchaseOrderID = "";
    $PurchaseOrderDescription = "";
    $codEmpresa = $this->session->userdata('cod_emp');


      //Obtiene Datos Orden
    
      $Orden = $this->callexternosordenes->obtieneOrden($idProyecto,$idCliente,$idOrden,$codEmpresa);
    

      $arrOrden = json_decode($Orden);
  
      
      if($arrOrden){
        
        foreach ($arrOrden as $llave => $valor) {
                
          $SupplierName = $valor->SupplierName;
          $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
          $PurchaseOrderID = $valor->PurchaseOrderID;
          $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
  
        }
      }


      $EstadoLineaBucksheet = '1';
              
      $memData = array(
        'COD_EMPRESA' =>   $codEmpresa,
        'ID_OC' => $PurchaseOrderID,
        'NUMERO_OC' => urldecode($PurchaseOrderDescription),
        'TIPO_DE_LINEA' => 'NO ACTIVABLE',
        'PROVEEDOR' => urldecode($SupplierName),
        'ESTADO_DE_LINEA' => $EstadoLineaBucksheet,
        'NUMERO_DE_LINEA' => $numerolinea,
        'UNIDADES_SOLICITADAS' => $OrdenItemID,
        'UNIDAD' => $Unidad,
        'CANTIDAD_UNITARIA' => $Cantidad,
        'DESCRIPCION_LINEA' => $Descripcion,
        'REVISION' =>  '1'
    );


    $insert = $this->callexternosbucksheet->insertOrderItem($memData);
  
  }

    }