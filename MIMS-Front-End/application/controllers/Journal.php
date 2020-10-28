<?php
class Journal extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosJournal');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('form_validation');
    $this->load->helper('file');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallExternosBitacora');
    
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }


  }

 


   function controlCalidad($idCliente,$idOrden,$codProyecto){

      
    $codEmpresa = $this->session->userdata('cod_emp');

    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu ;

    $datos['idCliente'] = $idCliente;
    $datos['idOrden'] = $idOrden;
    $datos['codProyecto'] = $codProyecto;

    //Obtiene datos para cabecera

      //Obtiene Datos Proyecto

      $Proyecto = $this->callexternosproyectos->obtieneProyecto($codProyecto, $idCliente);
                

      $arrProyecto = json_decode($Proyecto);

      if($arrProyecto){

        foreach ($arrProyecto as $llave => $valor) {
                
          $DescripcionProyecto = $valor->NombreProyecto;

        }

      }
        //Obtiene Datos Orden
                  
        $Orden = $this->callexternosordenes->obtieneOrden($codProyecto,$idCliente,$idOrden,$codEmpresa);
                  

        $arrOrden = json_decode($Orden);

        if($arrOrden){
          
          foreach ($arrOrden as $llave => $valor) {
                  
            $PurchaseOrderID = $valor->PurchaseOrderID;
            $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
            $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

          }
        }

     // Obtiene Datos Cliente
      
     $responseCliente = $this->callexternosclientes->obtieneCliente($idCliente);
  
     $arrCliente = json_decode($responseCliente);
    
     $datos_cliente = array();
 
     if($arrCliente){
       
       foreach ($arrCliente as $key => $value) {
 

           $nombreCliente =  $value->nombreCliente;
           $razonSocial  =   $value->razonSocial;
         
       }
     }

    //Obtiene Datos para el Home

    $datosap     = $this->callexternosdominios->obtieneDatosRef('TIPO_INTERACCION_CC');
    $select_cc = "";
    foreach (json_decode($datosap) as $llave => $valor) {
      $select_cc .='<option value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';
    }

   
   
   //llena arreglo con datos

   $datos['idCliente'] = $idCliente;
   $datos['idOrden'] = $idOrden;
   $datos['codProyecto'] = $codProyecto;
   $datos['DescripcionProyecto'] = $DescripcionProyecto;
   $datos['nombreCliente'] = $nombreCliente;
   $datos['PurchaseOrderDescription'] = $PurchaseOrderDescription;
   $datos['select_cc'] = $select_cc;
   $datos['nombreEmpleador'] = $this->session->userdata('nombres').' '.$this->session->userdata('paterno').' '.$this->session->userdata('materno');


   if ($this->session->userdata('rol_id')==='202'){


    $this->plantilla_activador('activador/listControlCalidad', $datos);
    

  }elseif($this->session->userdata('rol_id')==='203'){

    $this->plantilla_calidad('calidad/listControlCalidad', $datos);

  }elseif($this->session->userdata('rol_id')==='204'){

    $this->plantilla_ingenieria('ingenieria/listControlCalidad', $datos);

  }elseif($this->session->userdata('rol_id')==='205'){

    $this->plantilla_supervisor('supervisor/listControlCalidad', $datos);

  }




   

  }



  function cambiosOrden($idCliente,$idOrden,$codProyecto){

      
    $codEmpresa = $this->session->userdata('cod_emp');

    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu ;

    $datos['idCliente'] = $idCliente;
    $datos['idOrden'] = $idOrden;
    $datos['codProyecto'] = $codProyecto;
    $datos['nombreEmpleador'] = $this->session->userdata('nombres').' '.$this->session->userdata('paterno').' '.$this->session->userdata('materno');

    //Obtiene datos para cabecera

      //Obtiene Datos Proyecto

      $Proyecto = $this->callexternosproyectos->obtieneProyecto($codProyecto, $idCliente);
                

      $arrProyecto = json_decode($Proyecto);

      if($arrProyecto){

        foreach ($arrProyecto as $llave => $valor) {
                
          $DescripcionProyecto = $valor->NombreProyecto;

        }

      }
        //Obtiene Datos Orden
                  
        $Orden = $this->callexternosordenes->obtieneOrden($codProyecto,$idCliente,$idOrden,$codEmpresa);
                  

        $arrOrden = json_decode($Orden);

        if($arrOrden){
          
          foreach ($arrOrden as $llave => $valor) {
                  
            $PurchaseOrderID = $valor->PurchaseOrderID;
            $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
            $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

          }
        }

     // Obtiene Datos Cliente
      
     $responseCliente = $this->callexternosclientes->obtieneCliente($idCliente);
  
     $arrCliente = json_decode($responseCliente);
    
     $datos_cliente = array();
 
     if($arrCliente){
       
       foreach ($arrCliente as $key => $value) {
 

           $nombreCliente =  $value->nombreCliente;
           $razonSocial  =   $value->razonSocial;
         
       }
     }

    //Obtiene Datos para el Home

    $datosap     = $this->callexternosdominios->obtieneDatosRef('TIPO_INTERACCION_CO');
    $select_cc = "";
    foreach (json_decode($datosap) as $llave => $valor) {
      $select_cc .='<option value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';
    }

   
   
   //llena arreglo con datos

   $datos['idCliente'] = $idCliente;
   $datos['idOrden'] = $idOrden;
   $datos['codProyecto'] = $codProyecto;
   $datos['DescripcionProyecto'] = $DescripcionProyecto;
   $datos['nombreCliente'] = $nombreCliente;
   $datos['PurchaseOrderDescription'] = $PurchaseOrderDescription;
   $datos['select_cc'] = $select_cc;
   $datos['nombreEmpleador'] = $this->session->userdata('nombres').' '.$this->session->userdata('paterno').' '.$this->session->userdata('materno');


   if ($this->session->userdata('rol_id')==='202'){


    $this->plantilla_activador('activador/listCambioOrden', $datos);
    

  }elseif($this->session->userdata('rol_id')==='203'){

    $this->plantilla_calidad('calidad/listCambioOrden', $datos);

  }elseif($this->session->userdata('rol_id')==='204'){

    $this->plantilla_ingenieria('ingenieria/listCambioOrden', $datos);

  }elseif($this->session->userdata('rol_id')==='205'){

    $this->plantilla_supervisor('supervisor/listCambioOrden', $datos);

  }





  }




  function obtienejournalCalidad(){ 


    $id_orden_compra = $this->input->post('id_orden_compra');
		$tipo = 1;
		$id_cliente = $this->input->post('id_cliente');
    $respuesta = false;

  $journal = $this->callexternosjournal->obtienejournal($id_orden_compra,$tipo,$id_cliente);
  

 $arrJournal = json_decode($journal);
 

  $datos_journal = array();

  if($arrJournal){
    $respuesta = true;
    
    foreach ($arrJournal as $key => $value) {

      $respaldo = '';

      if(strlen($value->respaldos) > 0 && $value->respaldos !='null'  ){
        $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/controlcalidad/'.$value->respaldos.'" download="'.$value->respaldos_original.'"><i class="fas fa-download"></i> Descarga</a>';
      }else{
        $respaldo = '';
      }

      
      $datos_journal[] = array(
        'id_interaccion' => $value->id_interaccion,
        'nombre_empleado'   => $value->nombre_empleado,
        'fecha_ingreso'   => $this->callutil->formatoFechaSalida($value->fecha_ingreso),
        'numero_referencial' => $value->numero_referencial,
        'solicitado_por' => $value->solicitado_por,
        'aprobado_por' => $value->aprobado_por,
        'comentarios_generales' => $value->comentarios_generales,
        'respaldos' =>  $respaldo ,
        'tipo_interaccion' => $value->tipo_interaccion,
      );

    }
  }
  
  $datos['journals'] = $datos_journal;
  $datos['resp']      = $respuesta;

  echo json_encode($datos);

  }





  function guardarJournal(){

    $tipo = $this->input->post('tipo');
    $id_orden_compra = $this->input->post('id_orden_compra');
    $id_cliente =$this->input->post('id_cliente');
    $id_proyecto = $this->input->post('id_proyecto');
    $id_empleado = $this->input->post('id_empleado');
    $nombre_empleado = $this->input->post('nombre_empleado');
    $tipo_interaccion = $this->input->post('tipo_interaccion');
    $fecha_ingreso = $this->callutil->formatoFecha($this->input->post('fecha_ingreso'));
    $numero_referencial = $this->input->post('numero_referencial');
    $solicitado_por = $this->input->post('solicitado_por');
    $aprobado_por = $this->input->post('aprobado_por');
    $comentarios_generales = $this->input->post('comentarios_generales');
    $target_path = $this->config->item('BASE_ARCHIVOS')."controlcalidad/";
    $resp = false;
    $error_msg = "";
    $respaldo = "";
    $idInsertado=0;


 
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
                  'tipo' => $tipo ,
                  'id_orden_compra' => $id_orden_compra ,
                  'id_cliente' => $id_cliente,
                  'id_proyecto' => $id_proyecto,
                  'id_empleado' =>  $id_empleado,
                  'nombre_empleado' => $nombre_empleado,
                  'tipo_interaccion' => $tipo_interaccion,
                  'fecha_ingreso' => $fecha_ingreso,
                  'numero_referencial' => $numero_referencial,
                  'solicitado_por' =>  $solicitado_por,
                  'aprobado_por' => $aprobado_por,
                  'comentarios_generales' => $comentarios_generales,
                  'respaldos' => $respaldo,
                  'respaldos_original'   => $respaldos_original
                  );
    
                  $journal = $this->callexternosjournal->agregarControlCalidad($dataInsert);
    
                  $journals = json_decode($journal) ;
            
                  $resp =  $journals->status;
                  $idInsertado = $journals->id_insertado;
            
                  
    
                  if($resp){
    
                    $error_msg = 'Registro cargado correctamente.';
                    $resp =  true;
    
    
                    $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                    'accion'  => 'INSERTA_JOURNAL',
                    'usuario'  =>  $this->session->userdata('n_usuario'),
                    'rol' =>   $this->session->userdata('nombre_rol'),
                    'objeto'  => 'JOURNAL' ,
                    'fechaCambio' =>  date_create()->format('Y-m-d'));
            
                    $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                    
    
                  }else{
    
                    $error_msg = 'Inconvenientes al cargar registro, favor reintente.';
                    $resp =  false;
    
                  }
    
                }else{
    
                  $error_msg = 'Archivo no cargado, favor reintentar.';
                  $resp =  false;
    
                }

          }  

        }else{
            
            $dataInsert = array(	
              'tipo' => $tipo ,
              'id_orden_compra' => $id_orden_compra ,
              'id_cliente' => $id_cliente,
              'id_proyecto' => $id_proyecto,
              'id_empleado' =>  $id_empleado,
              'nombre_empleado' => $nombre_empleado,
              'tipo_interaccion' => $tipo_interaccion,
              'fecha_ingreso' => $fecha_ingreso,
              'numero_referencial' => $numero_referencial,
              'solicitado_por' =>  $solicitado_por,
              'aprobado_por' => $aprobado_por,
              'comentarios_generales' => $comentarios_generales
              );

              $journal = $this->callexternosjournal->agregarControlCalidad($dataInsert);

              $journals = json_decode($journal) ;
        
              $resp =  $journals->status;
              $idInsertado = $journals->id_insertado;
  
          
          }



    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

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
    

function enviarMail(){

          $id_control_calidad = $this->input->post('id_control_calidad');
          $email =$this->input->post('email');
          $codEmpresa = $this->input->post('cod_empresa'); 
          $tipo_interaccion="";
          $tituloOrden = "";

          //Obtiene datos de Journal

          $controlCalidad = $this->callexternosjournal->obtiene_journal_x_id($id_control_calidad);
          $arrControlCalidad = json_decode($controlCalidad);
      
 
          if($arrControlCalidad){
            
            foreach ($arrControlCalidad as $key => $value) {

             
           
              $id_orden_compra = $value->id_orden_compra;
                $id_cliente = $value->id_cliente;
                $id_proyecto = $value->id_proyecto;
                $id_empleado = $value->id_empleado;
                $nombre_empleado = $value->nombre_empleado;
                $tipo = $value->tipo;

                if ($tipo === '1'){
                  
                  $tituloOrden = "Cambios en Control de Calidad";
                  $datosEstados  = $this->callexternosdominios->obtieneDatoRef('TIPO_INTERACCION_CC',$value->tipo_interaccion);

                }else{

                  $tituloOrden = "Cambios en la Orden";
                  $datosEstados  = $this->callexternosdominios->obtieneDatoRef('TIPO_INTERACCION_CO',$value->tipo_interaccion);
                }
            
            
                  foreach (json_decode($datosEstados) as $llave => $valor) {
                    
                    $tipo_interaccion = $valor->domain_desc;
            
                  }
                
                $fecha_ingreso= $value->fecha_ingreso;
                $fecha_accion= $value->fecha_accion;
                $numero_referencial= $value->numero_referencial;
                $solicitado_por= $value->solicitado_por;
                $aprobado_por= $value->aprobado_por;
                $comentarios_generales= $value->comentarios_generales;
                $respaldos= $value->respaldos;
   
            }
       
      
                

      
            
          }

          //Obtiene Datos Proyecto

          $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);
          

          $arrProyecto = json_decode($Proyecto);
      
          if($arrProyecto){

            foreach ($arrProyecto as $llave => $valor) {
                    
              $DescripcionProyecto = $valor->NombreProyecto;
      
            }
        
          }
        
  
          //Obtiene Datos Orden
          
          $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$id_orden_compra,$codEmpresa);
          

          $arrOrden = json_decode($Orden);
      
          
          if($arrOrden){
            
            foreach ($arrOrden as $llave => $valor) {
                    
              $PurchaseOrderID = $valor->PurchaseOrderID;
              $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
              $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
      
            }
           
      
               
           
          }

$htmlContent ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$htmlContent .='<html xmlns="http://www.w3.org/1999/xhtml">';
$htmlContent .='<head>';
$htmlContent .='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$htmlContent .='<title>'.$tituloOrden.'</title>';
$htmlContent .='</head>';
$htmlContent .='<body>';
$htmlContent .='<div style="display: block; padding:0 32px; margin: auto;">';
$htmlContent .='<table cellpadding="0" cellspacing="0" border="0" width="100&#37;" align="center" style="width: 100&#37;; *width: 520px; max-width:520px; margin:32px auto;">';
$htmlContent .='<thead>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='MIMS-Intelligent-Projects';
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='</thead>';
$htmlContent .='<tbody>';
$htmlContent .='<tr>';
$htmlContent .='<td style="padding:36px 0 32px 0; vertical-align: top; font-size: 15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; word-wrap: break-word; word-break:normal;">';
$htmlContent .='<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0 0 18px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Estimado cliente:';
$htmlContent .='</p>';
$htmlContent .='<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal; ">';
$htmlContent .='Se ha ingresado un nuevo registro en modulo "'.$tituloOrden.'".';
$htmlContent .='<br /><br />';
$htmlContent .='<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal; ">';
$htmlContent .='El detalle es el siguiente:</p><br />';
$htmlContent .='<table cellpadding="0" cellspacing="0" border="1" width="100&#37;" align="center" style="width: 100&#37;; *width: 520px; max-width:520px; margin:32px auto;">';
$htmlContent .='<thead>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Proyecto';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .= $DescripcionProyecto;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Archivo adjunto';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$respaldos;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Orden de Compra';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$id_orden_compra;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Nombre Empleado';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$nombre_empleado;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Fecha Ingreso';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$fecha_ingreso;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .= 'Número Referencial';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .= $numero_referencial;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Tipo Interacción';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$tipo_interaccion;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Solicitado por';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$solicitado_por;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Aprobado por';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$aprobado_por;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Comentarios Generales';
$htmlContent .='</th>';
$htmlContent .='<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;">';
$htmlContent .=$comentarios_generales;
$htmlContent .='</th>';
$htmlContent .='</tr>';
$htmlContent .='</thead>';
$htmlContent .='</table>';
$htmlContent .='<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin:0; word-wrap: break-word; word-break:normal;">';
$htmlContent .='<br />';
$htmlContent .='<br />';
$htmlContent .='<br />';
$htmlContent .='<i style="color: #000000;">Su equipo de MIMS-Intelligent-Projects</i>';
$htmlContent .='</p>';
$htmlContent .='</td>';
$htmlContent .='</tr>';
$htmlContent .='</tbody>';
$htmlContent .='<tfoot>';
$htmlContent .='<tr>';
$htmlContent .='<td style="padding: 12px 20px 14px 20px; font-size: 11px; line-height: 16px; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #666666; background: #efefef; word-wrap: break-word; word-break:normal;">';
$htmlContent .='Nota: No responda a este correo electronico. Si tiene alguna duda, pongase en contacto con nosotros mediante nuestro sitio web:<br />';
$htmlContent .='<a href="https://help.mimsprojects.com" target="_blank" style="color: #1428a0; text-decoration: underline;">';
$htmlContent .='Ir al centro de atencion al cliente de MIMS Intelligent Projects</a>';
$htmlContent .='</td>';
$htmlContent .='</tr>';
$htmlContent .='<tr>';
$htmlContent .='<td style="padding:20px 0 20px 0; text-align: center; font-size: 11px; line-height: 1; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #acacac; vertical-align: middle; word-wrap: break-word; word-break:normal;">';
$htmlContent .='<img src="https://mimsprojects.com/MIMS-Intelligent-Projects/MIMS-Front-End/assets/dist/img/logo-mims.png" border="0" alt="" style=" width: 100&#37;; *width:62px; max-width: 62px; vertical-align:middle; margin:0 12px;" /> ';
$htmlContent .='Copyright@, MIMS Intelligent Projects All rights reserved';
$htmlContent .='</td>';
$htmlContent .='</tr>';
$htmlContent .='</tfoot>';
$htmlContent .='</table>';
$htmlContent .='</div>';
$htmlContent .='</body>';
$htmlContent .='</html>';


        

          $subject="Nuevo registro Control de calidad Orden: ".$PurchaseOrderNumber." ".$PurchaseOrderDescription;

          $file = $this->config->item('BASE_ARCHIVOS')."controlcalidad/".$respaldos;



          $respuesta =$this->callutil->sendEmail($email,$subject,$htmlContent,$file);

          echo json_encode($respuesta);

    }

    function desactivaJournal(){
      

      $id_interaccion       = $this->input->post('id_interaccion');
      $id_orden      = $this->input->post('id_orden');
      $codEmpresa       = $this->session->userdata('cod_emp');


       $delete = $this->callexternosjournal->desactivaJournal($id_interaccion,$id_orden,$codEmpresa);

        if($delete){

          $data['resp'] = true;
          $data['mensaje'] = 'Registro eliminado correctamente';

        }else{
          $data['resp'] = false;
          $data['mensaje'] = 'Error al eliminar el regitro';
        }

      

       echo json_encode($data);




    }


    function obtieneJournalOrden(){ 


      $id_orden_compra = $this->input->post('id_orden_compra');
      $tipo = 2;
      $id_cliente = $this->input->post('id_cliente');
      $respuesta = false;
  
    $journal = $this->callexternosjournal->obtienejournal($id_orden_compra,$tipo,$id_cliente);
    
  
   $arrJournal = json_decode($journal);
   
  
    $datos_journal = array();
  
    if($arrJournal){
      $respuesta = true;
      
      foreach ($arrJournal as $key => $value) {
  
        $respaldo = '';
  
        if(strlen($value->respaldos) > 0 && $value->respaldos !='null'  ){
          $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/controlcalidad/'.$value->respaldos.'" download="'.$value->respaldos_original.'"><i class="fas fa-download"></i> Descarga</a>';
        }else{
          $respaldo = '';
        }
  
        
        $datos_journal[] = array(
          'id_interaccion' => $value->id_interaccion,
          'nombre_empleado'   => $value->nombre_empleado,
          'fecha_ingreso'   => $this->callutil->formatoFechaSalida($value->fecha_ingreso),
          'numero_referencial' => $value->numero_referencial,
          'solicitado_por' => $value->solicitado_por,
          'aprobado_por' => $value->aprobado_por,
          'comentarios_generales' => $value->comentarios_generales,
          'respaldos' =>  $respaldo ,
          'tipo_interaccion' => $value->tipo_interaccion,
        );
  
      }
    }
    
    $datos['journals'] = $datos_journal;
    $datos['resp']      = $respuesta;
  
    echo json_encode($datos);
  
    }


    function obtienejournalCalidadDet(){ 


      $id_orden_compra = $this->input->post('id_orden_compra');
      $tipo = 1;
      $id_cliente = $this->input->post('id_cliente');
      $id_interaccion =  $this->input->post('id_interaccion');
      $respuesta = false;
  
      $journal = $this->callexternosjournal->obtiene_journal_x_id($id_interaccion);
    
  
   $arrJournal = json_decode($journal);

    $datos_journal = array();
  
    if($arrJournal){
      $respuesta = true;
      
      foreach ($arrJournal as $key => $value) {
  
            
        $datos_journal[] = array(
          'id_interaccion' => $value->id_interaccion,
          'nombre_empleado'   => $value->nombre_empleado,
          'fecha_ingreso'   => $this->callutil->formatoFechaSalida($value->fecha_ingreso),
          'numero_referencial' => $value->numero_referencial,
          'solicitado_por' => $value->solicitado_por,
          'aprobado_por' => $value->aprobado_por,
          'comentarios_generales' => $value->comentarios_generales,
          'tipo_interaccion' => $value->tipo_interaccion,
        );
  
      }
    }
    
    $datos['journals'] = $datos_journal;
    $datos['resp']      = $respuesta;
  
    echo json_encode($datos);
  
    }

    function actualizarJournal(){

      $tipo = $this->input->post('tipo');
      $id_orden_compra = $this->input->post('id_orden_compra');
      $id_cliente =$this->input->post('id_cliente');
      $id_proyecto = $this->input->post('id_proyecto');
      $id_empleado = $this->input->post('id_empleado');
      $nombre_empleado = $this->input->post('nombre_empleado');
      $tipo_interaccion = $this->input->post('tipo_interaccion');
      $fecha_ingreso = $this->callutil->formatoFecha($this->input->post('fecha_ingreso'));
      $numero_referencial = $this->input->post('numero_referencial');
      $solicitado_por = $this->input->post('solicitado_por');
      $aprobado_por = $this->input->post('aprobado_por');
      $comentarios_generales = $this->input->post('comentarios_generales');
      $target_path = $this->config->item('BASE_ARCHIVOS')."controlcalidad/";
      $resp = false;
      $error_msg = "";
      $respaldos = $this->input->post('respaldos');
      $respaldo = "";
      $idInsertado= $this->input->post('id_interaccion');
  

     
  
  
      if(is_uploaded_file($_FILES['respaldos']['tmp_name'])) {   
  

                
                            $archivo = $this->checkFileValidation($nameArchivo);
                            $respArchivo = $archivo['resp'];

                            
                            if($respArchivo== false){

                              

                              $error_msg = 'Archivo invalido, favor seleccionar archivo valido.';
                              $resp = false;
                            

                            }else{ 
                
                        
                
                
                          /* create new name file */
                          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
                          $respaldos_original = $_FILES["respaldos"]["name"];
                          $extension  = pathinfo( $_FILES["respaldos"]["name"], PATHINFO_EXTENSION ); // jpg
                          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                
                          $source       = $_FILES['respaldos']['tmp_name'];
                          $destination  = $target_path . $basename; 
                          /* move the file */
                
                
                          if(move_uploaded_file( $source, $destination )) {
                            
                            
                            // Comienzo Insert
                
                            $respaldo = $basename;
                
                            $dataUpdate = array(	
                              'id_interaccion' =>$idInsertado,
                              'tipo' => $tipo ,
                              'id_orden_compra' => $id_orden_compra ,
                              'id_cliente' => $id_cliente,
                              'id_proyecto' => $id_proyecto,
                              'id_empleado' =>  $id_empleado,
                              'nombre_empleado' => $nombre_empleado,
                              'tipo_interaccion' => $tipo_interaccion,
                              'fecha_ingreso' => $fecha_ingreso,
                              'numero_referencial' => $numero_referencial,
                              'solicitado_por' =>  $solicitado_por,
                              'aprobado_por' => $aprobado_por,
                              'comentarios_generales' => $comentarios_generales,
                              'respaldos' => $respaldo,
                              'respaldos_original' => $respaldos_original
                              );
                
                              $journal = $this->callexternosjournal->actualizarControlCalidad($dataUpdate);
                
                              $journals = json_decode($journal) ;
                        
                              $resp =  $journals->status;

                                                      
                
                              if($resp){
                
                                $error_msg = 'Registro Actualizado correctamente.';
                                $resp =  true;


                                $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                                'accion'  => 'ACTUALIZAR_JOURNAL',
                                'usuario'  =>  $this->session->userdata('n_usuario'),
                                'rol' =>   $this->session->userdata('nombre_rol'),
                                'objeto'  => 'JOURNAL' ,
                                'fechaCambio' =>  date_create()->format('Y-m-d'));
                        
                                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                                
                
                              }else{
                
                                $error_msg = 'Inconvenientes al actualizar registro, favor reintente.';
                                $resp =  false;
                
                              }
                            
                  
                  
                          } else{
                            
                            $error_msg = 'Archivo no fue cargado, favor reintentar.';
                            $resp =  false;
                          }
                        
                      
                        } 
      } else{

        $dataUpdate = array(	
          'id_interaccion' =>$idInsertado,
          'tipo' => $tipo ,
          'id_orden_compra' => $id_orden_compra ,
          'id_cliente' => $id_cliente,
          'id_proyecto' => $id_proyecto,
          'id_empleado' =>  $id_empleado,
          'nombre_empleado' => $nombre_empleado,
          'tipo_interaccion' => $tipo_interaccion,
          'fecha_ingreso' => $fecha_ingreso,
          'numero_referencial' => $numero_referencial,
          'solicitado_por' =>  $solicitado_por,
          'aprobado_por' => $aprobado_por,
          'comentarios_generales' => $comentarios_generales
          );

          $journal = $this->callexternosjournal->actualizarControlCalidad($dataUpdate);

          $journals = json_decode($journal) ;
    
          $resp =  $journals->status;
         
          if($resp){

            $error_msg = 'Registro Actualizado correctamente.';
            $resp =  true;


            $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
            'accion'  => 'ACTUALIZAR_JOURNAL',
            'usuario'  =>  $this->session->userdata('n_usuario'),
            'rol' =>   $this->session->userdata('nombre_rol'),
            'objeto'  => 'JOURNAL' ,
            'fechaCambio' =>  date_create()->format('Y-m-d'));
    
            $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
            

          }else{

            $error_msg = 'Inconvenientes al actualizar registro, favor reintente.';
            $resp =  false;

          }
      



      }

          
        
  
  
      $data['resp']        = $resp;
      $data['mensaje']     = $error_msg;
      $data['idInsertado'] = $idInsertado;
   
  
      echo json_encode($data);
  
    }



  }