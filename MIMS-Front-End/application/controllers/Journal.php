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


    $nameArchivo = 'respaldos';


  $archivo = $this->checkFileValidation($nameArchivo);
  $respArchivo = $archivo['resp'];

  
  if($respArchivo== false){

    

    $error_msg = 'Archivo invalido, favor seleccionar archivo valido.';
    $resp = false;
  

  }else{ 

   
 
        if(is_uploaded_file($_FILES['respaldos']['tmp_name'])) {   


          /* create new name file */
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $respaldos_original   = $_FILES["respaldos"]["name"];
          $extension  = pathinfo( $_FILES["respaldos"]["name"], PATHINFO_EXTENSION ); // jpg
          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

          $source       = $_FILES['respaldos']['tmp_name'];
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
             
  
  
          } else{
            
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
        
        }else{

          $error_msg = 'Archivo no cargado, favor reintentar.';
          $resp =  false;
        


        } 
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

          //Obtiene datos de Journal

          $controlCalidad = $this->callexternosjournal->obtiene_journal_x_id($id_control_calidad);
          $arrControlCalidad = json_decode($controlCalidad);
      
       
          if($arrControlCalidad){
            
       
      
                $id_orden_compra = $arrControlCalidad->id_orden_compra;
                $id_cliente = $arrControlCalidad->id_cliente;
                $id_proyecto = $arrControlCalidad->id_proyecto;
                $id_empleado = $arrControlCalidad->id_empleado;
                $nombre_empleado = $arrControlCalidad->nombre_empleado;
                $tipo = $arrControlCalidad->tipo;

                if ($tipo === '1'){

                  $datosEstados  = $this->callexternosdominios->obtieneDatoRef('TIPO_INTERACCION_CC',$arrControlCalidad->tipo_interaccion);

                }else{

                  $datosEstados  = $this->callexternosdominios->obtieneDatoRef('TIPO_INTERACCION_CO',$arrControlCalidad->tipo_interaccion);
                }
            
            
                  foreach (json_decode($datosEstados) as $llave => $valor) {
                    
                    $tipo_interaccion = $valor->domain_desc;
            
                  }
                
                $fecha_ingreso= $arrControlCalidad->fecha_ingreso;
                $fecha_accion= $arrControlCalidad->fecha_accion;
                $numero_referencial= $arrControlCalidad->numero_referencial;
                $solicitado_por= $arrControlCalidad->solicitado_por;
                $aprobado_por= $arrControlCalidad->aprobado_por;
                $comentarios_generales= $arrControlCalidad->comentarios_generales;
                $respaldos= $arrControlCalidad->respaldos;
   

      
            
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


          $htmlContent = '<h1>Proyecto: '.$DescripcionProyecto.' Orden: '.$PurchaseOrderID.' </h1>';
          $htmlContent .= '<p>Archivo adjunto: '. $respaldos.'</p>';


          $htmlContent .= '<table cellspacing="0">';
          $htmlContent .= '<thead>';
          $htmlContent .= '</thead>';
          $htmlContent .= '<tbody>';
          
          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Orden de Compra</th>';
          $htmlContent .= '<th>'.$id_orden_compra.'</th>';
          $htmlContent .= '</tr>';

          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Nombre Empleado</th>';
          $htmlContent .= '<th>'.$nombre_empleado.'</th>';
          $htmlContent .= '</tr>';
          
          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Fecha Ingreso</th>';
          $htmlContent .= '<th>'.$fecha_ingreso.'</th>';
          $htmlContent .= '</tr>';

          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Numero Referencial</th>';
          $htmlContent .= '<th>'.$numero_referencial.'</th>';
          $htmlContent .= '</tr>';

          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Tipo Interaccion</th>';
          $htmlContent .= '<th>'.$tipo_interaccion.'</th>';
          $htmlContent .= '</tr>';
          $htmlContent .= '<tr>';

          $htmlContent .= '<th>Solicitado por</th>';
          $htmlContent .= '<th>'.$solicitado_por.'</th>';
          $htmlContent .= '</tr>';

          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Aprobado por</th>';
          $htmlContent .= '<th>'.$aprobado_por.'</th>';
          $htmlContent .= '</tr>';

          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Comentarios Generales</th>';
          $htmlContent .= '<th>'.$comentarios_generales.'</th>';
          $htmlContent .= '</tr>';          
          $htmlContent .= '</tbody>';
          $htmlContent .= '</table>';


        

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