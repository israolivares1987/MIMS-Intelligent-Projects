<?php
class Edp extends MY_Controller{
  
  function __construct(){

    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosDominios');
    
    $this->load->library('CallExternosOrdenes');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
    $this->load->library('form_validation');
    $this->load->helper('file');
    $this->load->library('CallExternosBitacora');
    $this->load->library('CallExternosEdp');
    

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 

  function listasEdp(){
  
    $codEmpresa = $this->input->post('codEmpresa');
    $idCliente = $this->input->post('idCliente');
    $idProyecto = $this->input->post('idProyecto');
    $idOrden = $this->input->post('idOrden');

    $listasEdt = $this->callexternosedp->listasEdp($idCliente,$idProyecto,$idOrden, $codEmpresa);
    $respuesta = false;
    $respaldo = '';
    $monto_pagado = 0;
    $monto_por_pagar= 0;

   
    $arrlistasEdt = json_decode($listasEdt);
   
    $datos_edt = array();

    if($arrlistasEdt){
      $respuesta = true;
      
      foreach ($arrlistasEdt as $key => $value) {

      
        if(strlen($value->RESPALDO) > 0 && $value->RESPALDO !='null'  ){
          $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/edp/'.$value->RESPALDO.'" download="'.$value->RESPALDO_ORIGINAL.'"><i class="fas fa-download"></i> Descarga</a>';
        }else{
          $respaldo = '';
        }

          if($value->ESTADO_EDP ==='PAGADO'){

            $monto_pagado = $monto_pagado + $value->IMPORTE_EDP;
          }


          if($value->ESTADO_EDP ==='POR PAGAR'){

            $monto_por_pagar= $monto_por_pagar + $value->IMPORTE_EDP;
          }


        $datos_edt[] = array(
          'ID_EDP' => $value->ID_EDP,
          'COD_EMPRESA' => $value->COD_EMPRESA,
          'ID_CLIENTE' => $value->ID_CLIENTE,
          'ID_PROYECTO' => $value->ID_PROYECTO,
          'ID_ORDEN' => $value->ID_ORDEN,
          'ID_EMPLEADO' => $value->ID_EMPLEADO,
          'FECHA_INGRESO' => $this->callutil->formatoFechaSalida($value->FECHA_INGRESO),
          'NUM_EDP' => $value->NUM_EDP,
          'ESTADO_EDP' => $value->ESTADO_EDP,
          'FECHA_PAGO' => $this->callutil->formatoFechaSalida($value->FECHA_PAGO),
          'AP_PROVEEDOR' => $value->AP_PROVEEDOR,
          'PROVEEDOR' => $value->PROVEEDOR,
          'IMPORTE_EDP' => $this->callutil->formatoDinero($value->IMPORTE_EDP),
          'RESPALDO' =>  $respaldo,
          'RESPALDO_ORIGINAL' => $value->RESPALDO_ORIGINAL,
          'ACCION' => $value->ACCION,
          'COMENTARIOS' => $value->COMENTARIOS
        );
        
      }
    }

    $datos['edps'] = $datos_edt;
    $datos['monto_por_pagar'] = $this->callutil->formatoDinero($monto_por_pagar);
    $datos['monto_pagado'] = $this->callutil->formatoDinero($monto_pagado);
    $datos['resp']      = $respuesta;

    echo json_encode($datos);


  
  }


  

  function guardarEdp(){

    
    $codEmpresa = $this->session->userdata('cod_emp');
    $ID_CLIENTE = $this->input->post('ID_CLIENTE');
    $ID_PROYECTO = $this->input->post('ID_PROYECTO');
    $ID_ORDEN = $this->input->post('ID_ORDEN');
    $ID_EMPLEADO = $this->input->post('ID_EMPLEADO');
    $FECHA_INGRESO = $this->callutil->formatoFecha($this->input->post('FECHA_INGRESO'));
    $NUM_EDP = $this->input->post('NUM_EDP');
    $ESTADO_EDP = $this->input->post('ESTADO_EDP');
    $FECHA_PAGO = $this->callutil->formatoFecha($this->input->post('FECHA_PAGO'));
    $AP_PROVEEDOR = $this->input->post('AP_PROVEEDOR');
    $PROVEEDOR = $this->input->post('PROVEEDOR');
    $IMPORTE_EDP = $this->callutil->formatoNumeroMilesEntrada($this->input->post('IMPORTE_EDP'));
    $SALDO_INSOLUTO_EDP = $this->input->post('SALDO_INSOLUTO_EDP');
    $RESPALDO = $this->input->post('RESPALDO');
    $RESPALDO_ORIGINAL = $this->input->post('RESPALDO_ORIGINAL');
    $ACCION = $this->input->post('ACCION');
    $COMENTARIOS = $this->input->post('COMENTARIOS');

    $target_path = $this->config->item('BASE_ARCHIVOS')."edp/";
    $resp = false;
    $error_msg = "";
    $respaldo = "";
    $idInsertado=0;
    $nameArchivo = "RESPALDO";
    $MontoInsoluto = 0;


 //Obtiene Datos Orden




 $Orden = $this->callexternosordenes->obtieneOrden($ID_PROYECTO,$ID_CLIENTE,$ID_ORDEN,$codEmpresa);      

 $arrOrden = json_decode($Orden);

 if($arrOrden){
   
   foreach ($arrOrden as $llave => $valor) {
           
     $PurchaseOrderID = $valor->PurchaseOrderID;
     $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
     $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
     $montoOrden =  $valor->ValorNeto;

   }
 }

 $totalSaldo = 0;

              $listasEdt = $this->callexternosedp->listasEdp($ID_CLIENTE,$ID_PROYECTO,$ID_ORDEN, $codEmpresa);
              $respuesta = false;
              $respaldo = '';
          
              $arrlistasEdt = json_decode($listasEdt);
             
              $datos_edt = 0;
          
              if($arrlistasEdt){
                $respuesta = true;
                
                foreach ($arrlistasEdt as $key => $value) {
          
                  $datos_edt = $value->IMPORTE_EDP;

                  $totalSaldo = $totalSaldo + $datos_edt;
                  
                }
              }

              if($AP_PROVEEDOR ==='ACTUAL'){
                
                $ESTADO_EDP = '1';

              }     
        
 
        if(is_uploaded_file($_FILES[$nameArchivo]['tmp_name'])) {  

          $archivo = $this->checkFileValidation($nameArchivo);
          $respArchivo = $archivo['resp'];
        
          if($respArchivo == false){

    

            $error_msg = 'Archivo invalido, favor seleccionar archivo valido.';
            $resp = false;
          
        
          }else{ 

              /* create new name file */
              $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
              $respaldos_original   = $_FILES[$nameArchivo]["name"];
              $extension  = pathinfo( $_FILES[$nameArchivo]["name"], PATHINFO_EXTENSION ); // jpg
              $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

              $source       = $_FILES[$nameArchivo]['tmp_name'];
              $destination  = $target_path . $basename; 
              
              
             
              
              /* move the file */

              if(move_uploaded_file( $source, $destination )) {
             

                if($MontoInsoluto <  0 ){

                  $error_msg = 'Monto ingresado es mayor al monto Insoluto, favor verificar.';
                  $resp = false;

                }else{

                     // Comienzo Insert
    
                $respaldo = $basename;
    
                $dataInsert = array(	
                  'COD_EMPRESA' => $codEmpresa,
                  'ID_CLIENTE' => $ID_CLIENTE ,
                  'ID_PROYECTO' => $ID_PROYECTO ,
                  'ID_ORDEN' => $ID_ORDEN ,
                  'ID_EMPLEADO' => $ID_EMPLEADO ,
                  'FECHA_INGRESO' => $FECHA_INGRESO ,
                  'NUM_EDP' => $NUM_EDP ,
                  'ESTADO_EDP' => $ESTADO_EDP ,
                  'FECHA_PAGO' => $FECHA_PAGO ,
                  'AP_PROVEEDOR' => $AP_PROVEEDOR ,
                  'PROVEEDOR' => $PROVEEDOR ,
                  'IMPORTE_EDP' => $IMPORTE_EDP ,
                  'RESPALDO' =>  $respaldo ,
                  'RESPALDO_ORIGINAL' => $respaldos_original,
                  'COMENTARIOS' => $COMENTARIOS 

                  );
    
                  $edpInsert = $this->callexternosedp->insertEdp($dataInsert);

           
    
                  $edpInserts = json_decode($edpInsert) ;
            
                  $resp =  $edpInserts->status;
                  $idInsertado = $edpInserts->id_insertado;

                  if($resp){
    
                    $error_msg = 'Registro cargado correctamente.';
                    $resp =  true;
    
    
                    $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                    'accion'  => 'INSERTA_EDP',
                    'id_registro' =>  $idInsertado,
                    'usuario'  =>  $this->session->userdata('n_usuario'),
                    'rol' =>   $this->session->userdata('nombre_rol'),
                    'objeto'  => 'EDP' ,
                    'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
            
                    $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                    
    
                  }else{
    
                    $error_msg = 'Inconvenientes al cargar registro, favor reintente.';
                    $resp =  false;
    
                  }

                }

    
                }else{
    
                  $error_msg = 'Archivo no cargado, favor reintentar.';
                  $resp =  false;
    
                }

          }  

        }else{

           
            $dataInsert = array(	
              'COD_EMPRESA' => $codEmpresa,
              'ID_CLIENTE' => $ID_CLIENTE ,
              'ID_PROYECTO' => $ID_PROYECTO ,
              'ID_ORDEN' => $ID_ORDEN ,
              'ID_EMPLEADO' => $ID_EMPLEADO ,
              'FECHA_INGRESO' => $FECHA_INGRESO ,
              'NUM_EDP' => $NUM_EDP ,
              'ESTADO_EDP' => $ESTADO_EDP ,
              'FECHA_PAGO' => $FECHA_PAGO ,
              'AP_PROVEEDOR' => $AP_PROVEEDOR ,
              'PROVEEDOR' => $PROVEEDOR ,
              'IMPORTE_EDP' => $IMPORTE_EDP ,
              'COMENTARIOS' => $COMENTARIOS 
              );

              $edpInsert = $this->callexternosedp->insertEdp($dataInsert);
    
              $edpInserts = json_decode($edpInsert) ;
        
              $resp =  $edpInserts->status;
              $idInsertado = $edpInserts->id_insertado;

              if($resp){
    
                $error_msg = 'Registro cargado correctamente.';
                $resp =  true;


                $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                'accion'  => 'INSERTA_EDP',
                'id_registro' =>  $idInsertado,
                'usuario'  =>  $this->session->userdata('n_usuario'),
                'rol' =>   $this->session->userdata('nombre_rol'),
                'objeto'  => 'EDP' ,
                'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
        
                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                
              

              }else{

                $error_msg = 'Inconvenientes al cargar registro, favor reintente.';
                $resp =  false;

              }

          
          }



    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;


    // actualiza NUM_EDP

    $dataUpdate = array(	
      'NUM_EDP' => 'EDP-'.$idInsertado ,
      'ID_EDP' => $idInsertado
      );

      $edp= $this->callexternosedp->actualizarEdp($dataUpdate);

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
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'image/bmp',
        'image/gif',
        'image/png',
        'image/tiff',
        'message/rfc822',
        'video/mp4'
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
      'DOCX',
      'bmp',
      'BMP',
      'gif',
      'GIF',
      'jpeg',
      'JPEG',
      'jpg',
      'JPG',
      'png',
      'PNG',
      'tif',
      'tiff',
      'TIF',
      'TIFF',
      'EML',
      'eml',
      'MP4',
      'mp4'
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


function eliminaEdp(){  


  $ID_EDP  = $this->input->post('ID_EDP');
 
  $resp = false;
  $mensaje = "";


 
    $edp = $this->callexternosedp->eliminaEdp($ID_EDP);
  

    if($edp){

      $resp = true;
      $mensaje = "Registro Eliminado correctamente";

      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'ELIMINA_EDP',
      'id_registro' =>  $ID_EDP,
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'EDP' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

    }else{

      $resp = false;
      $mensaje = "Error al Eliminar registro, datos sin actualizar";
    }



    $data['resp']       = $resp;
    $data['mensaje']    = $mensaje;
    
    


   
  echo json_encode($data);



}



function obtieneEdp(){

  $id_edp     = $this->input->post('id_edp');
  $codEmpresa   = $this->session->userdata('cod_emp');
  $datos_edt         = array();
  $datos        = array();

  $edp        = $this->callexternosedp->obtieneEdp($id_edp,$codEmpresa);

  if($edp){

    foreach (json_decode($edp) as $key => $value) {
      
      $datos_edt = array(
        'ID_EDP' => $value->ID_EDP,
        'COD_EMPRESA' => $value->COD_EMPRESA,
        'ID_CLIENTE' => $value->ID_CLIENTE,
        'ID_PROYECTO' => $value->ID_PROYECTO,
        'ID_ORDEN' => $value->ID_ORDEN,
        'ID_EMPLEADO' => $value->ID_EMPLEADO,
        'FECHA_INGRESO' => $this->callutil->formatoFechaSalida($value->FECHA_INGRESO),
        'NUM_EDP' => $value->NUM_EDP,
        'select_act_estado_edp' => $this->callutil->obtiene_select_def_act('ACT_ESTADO_EDP',$value->ESTADO_EDP,'ESTADO_EDP'),
        'FECHA_PAGO' => $this->callutil->formatoFechaSalida($value->FECHA_PAGO),
        'select_act_apedp' => $this->callutil->obtiene_select_def_act('ACT_AP_PROVEEDOR',$value->AP_PROVEEDOR,'ACTUAL_PREVIO'),
        'PROVEEDOR' => $value->PROVEEDOR,
        'IMPORTE_EDP' => $value->IMPORTE_EDP,
        'ACCION' => $value->ACCION,
        'COMENTARIOS' => $value->COMENTARIOS
      );

    }

  }

  $datos['datos_edt'] = $datos_edt;

  echo json_encode($datos);


}



function ActualizaEdp(){

    
  $codEmpresa = $this->session->userdata('cod_emp');
  $ID_EDP = $this->input->post('ID_EDP');
  $ID_EMPLEADO = $this->input->post('ACT_ID_EMPLEADO');
  $FECHA_INGRESO = $this->callutil->formatoFecha($this->input->post('ACT_FECHA_INGRESO'));
  $ESTADO_EDP = $this->input->post('ACT_ESTADO_EDP');
  $FECHA_PAGO = $this->callutil->formatoFecha($this->input->post('ACT_FECHA_PAGO'));
  $AP_PROVEEDOR = $this->input->post('ACT_AP_PROVEEDOR');
  $PROVEEDOR = $this->input->post('ACT_PROVEEDOR');
  $IMPORTE_EDP = $this->callutil->formatoNumeroMilesEntrada($this->input->post('ACT_IMPORTE_EDP'));
  $RESPALDO = $this->input->post('ACT_RESPALDO');
  $RESPALDO_ORIGINAL = $this->input->post('ACT_RESPALDO_ORIGINAL');
  $ACCION = $this->input->post('ACT_ACCION');
  $COMENTARIOS = $this->input->post('ACT_COMENTARIOS');

  $target_path = $this->config->item('BASE_ARCHIVOS')."edp/";
  $resp = false;
  $error_msg = "";
  $respaldo = "";
  $idInsertado=0;
  $nameArchivo = "ACT_RESPALDO";
  $MontoInsoluto = 0;


        
            if($AP_PROVEEDOR ==='ACTUAL'){
              
              $ESTADO_EDP = '1';

            }     


      if(is_uploaded_file($_FILES[$nameArchivo]['tmp_name'])) {  

        $archivo = $this->checkFileValidation($nameArchivo);
        $respArchivo = $archivo['resp'];
      
        if($respArchivo == false){

          $error_msg = 'Archivo invalido, favor seleccionar archivo valido.';
          $resp = false;
        
      
        }else{ 

            /* create new name file */
            $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
            $respaldos_original   = $_FILES[$nameArchivo]["name"];
            $extension  = pathinfo( $_FILES[$nameArchivo]["name"], PATHINFO_EXTENSION ); // jpg
            $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

            $source       = $_FILES[$nameArchivo]['tmp_name'];
            $destination  = $target_path . $basename; 
            
            
           
            
            /* move the file */

            if(move_uploaded_file( $source, $destination )) {
           

                   // Comienzo Insert
  
              $respaldo = $basename;
  
              $dataInsert = array(	
                'ID_EDP' => $ID_EDP,
                'COD_EMPRESA' => $codEmpresa,
                'ESTADO_EDP' => $ESTADO_EDP ,
                'FECHA_INGRESO' => $FECHA_INGRESO,
                'FECHA_PAGO' => $FECHA_PAGO ,
                'AP_PROVEEDOR' => $AP_PROVEEDOR ,
                'PROVEEDOR' => $PROVEEDOR ,
                'IMPORTE_EDP' => $IMPORTE_EDP ,
                'RESPALDO' =>  $respaldo ,
                'RESPALDO_ORIGINAL' => $respaldos_original,
                'COMENTARIOS' => $COMENTARIOS 
                );

                $edpInsert = $this->callexternosedp->actualizarEdp($dataInsert);
  

                $edpInserts = json_decode($edpInsert) ;
          
                $resp =  $edpInserts->status;

                if($resp){
  
                  $error_msg = 'Registro actualizado correctamente.';
                  $resp =  true;
  
  
                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'ACTUALIZA_EDP',
                  'id_registro' =>  $ID_EDP,
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'EDP' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
          
                  $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                  
  
                }else{
  
                  $error_msg = 'Inconvenientes al actualizar registro, favor reintente.';
                  $resp =  false;
  
                }

  
              }else{
  
                $error_msg = 'Archivo no cargado, favor reintentar.';
                $resp =  false;
  
              }

        }  

      }else{

     
          
        $dataInsert = array(	
          'ID_EDP' => $ID_EDP,
          'COD_EMPRESA' => $codEmpresa,
          'ESTADO_EDP' => $ESTADO_EDP ,
          'FECHA_INGRESO' => $FECHA_INGRESO,
          'FECHA_PAGO' => $FECHA_PAGO ,
          'AP_PROVEEDOR' => $AP_PROVEEDOR ,
          'PROVEEDOR' => $PROVEEDOR ,
          'IMPORTE_EDP' => $IMPORTE_EDP ,
          'COMENTARIOS' => $COMENTARIOS 
          );


          $edpInsert = $this->callexternosedp->actualizarEdp($dataInsert);
  
            $edpInserts = json_decode($edpInsert) ;
      
            $resp =  $edpInserts->status;


            if($resp){
  
              $error_msg = 'Registro actualizado correctamente.';
              $resp =  true;


              $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
              'accion'  => 'ACTUALIZA_EDP',
              'id_registro' =>  $ID_EDP,
              'usuario'  =>  $this->session->userdata('n_usuario'),
              'rol' =>   $this->session->userdata('nombre_rol'),
              'objeto'  => 'EDP' ,
              'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
      
              $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
              
            

            }else{

              $error_msg = 'Inconvenientes al actualizar  registro, favor reintente.';
              $resp =  false;

            }
        
        }


  $data['resp']        = $resp;
  $data['mensaje']     = $error_msg;

  echo json_encode($data);

}

  }

