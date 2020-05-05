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
    
    
  }

 


   function controlCalidad($idCliente,$idOrden,$codProyecto){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];

    $datos['idCliente'] = $idCliente;
    $datos['idOrden'] = $idOrden;
    $datos['codProyecto'] = $codProyecto;

    //Obtiene datos para cabecera

      //Obtiene Datos Proyecto

      $Proyecto = $this->callexternosproyectos->obtieneProyecto($codProyecto, $idCliente);
                

      $arrProyecto = json_decode($Proyecto);

      if($arrProyecto){

        foreach ($arrProyecto as $llave => $valor) {
                
          $DescripcionProyecto = $valor->nombre_proyecto;

        }

      }
        //Obtiene Datos Orden
                  
        $Orden = $this->callexternosproyectos->obtieneOrden($codProyecto,$idCliente,$idOrden,$codEmpresa);
                  

        $arrOrden = json_decode($Orden);


        if($arrOrden){
          
          foreach ($arrOrden as $llave => $valor) {
                  
            $PurchaseOrderID = $valor->PurchaseOrderID;
            $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
            $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

          }
        
          // Obtiene datos del cliente


          $Cliente = $this->callexternosclientes->obtieneClientePorId($idCliente);

          $arrCliente = json_decode($Cliente);
          $nombreCliente = $arrCliente->nombreCliente;
  
               
 
    }

    //Obtiene Datos para el Home

    $datosap     = $this->callexternosproyectos->obtieneDatosRef('TIPO_INTERACCION_CC');
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

    $this->plantilla_activador('activador/listControlCalidad', $datos);

  }



  function cambiosOrden(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];



    //Obtiene Datos para el Home

    $this->plantilla_activador('activador/listCambioOrden', $datos);

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
        $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/controlcalidad/'.$value->respaldos.'" download="'.$value->respaldos.'"><i class="fas fa-download"></i> Descarga</a>';
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

    $this->form_validation->set_rules('archivo0', 'Upload File', 'callback_checkFileValidation');



    if($this->form_validation->run() == false) {
      
        $error_msg = 'Archivo invalido, favor seleccionar archivo soportado.';
        $resp =  false;
       
    } else {
 
        if(is_uploaded_file($_FILES['archivo0']['tmp_name'])) {   


          /* create new name file */
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $extension  = pathinfo( $_FILES["archivo0"]["name"], PATHINFO_EXTENSION ); // jpg
          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

          $source       = $_FILES['archivo0']['tmp_name'];
          $destination  = $target_path . $basename; 
          /* move the file */


          if(move_uploaded_file( $source, $destination )) {
             
            
            // Comienzo Insert

            $respaldo = $basename;

            $dataInsert = array(	
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
              'respaldos' => $respaldo
              );

              $journal = $this->callexternosjournal->agregarControlCalidad($dataInsert);

              $journals = json_decode($journal) ;
        
              $resp =  $journals->status;
              $idInsertado = $journals->id_insertado;
        
              

              if($resp){

                $error_msg = 'Registro cargado correctamente.';
                $resp =  true;
                

              }else{

                $error_msg = 'Inconvenientes al cargar registro, favor reintente.';
                $resp =  false;

              }
             
  
  
          } else{
            
            $dataInsert = array(	
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
            if(isset($_FILES['archivo0']['name']) && $_FILES['archivo0']['name'] != ""){
                // get mime by extension
                $mime = get_mime_by_extension($_FILES['archivo0']['name']);
                $fileExt = explode('.', $_FILES['archivo0']['name']);
                $ext = end($fileExt);

                if(in_array($ext, $fileExtArray) && in_array($mime, $mime_types)){
                    return true;
                }else{
                    $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
                return false;
            }
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

                $datosEstados     = $this->callexternosproyectos->obtieneDatoRef('TIPO_INTERACCION_CC',$arrControlCalidad->tipo_interaccion);

              
            
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
                    
              $DescripcionProyecto = $valor->nombre_proyecto;
      
            }
        
          }
        
  
          //Obtiene Datos Orden
          
          $Orden = $this->callexternosproyectos->obtieneOrden($id_proyecto,$id_cliente,$id_orden_compra,$codEmpresa);
          

          $arrOrden = json_decode($Orden);
      
          
          if($arrOrden){
            
            foreach ($arrOrden as $llave => $valor) {
                    
              $PurchaseOrderID = $valor->PurchaseOrderID;
              $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
              $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
      
            }
           
      
               
           
          }


          $htmlContent = '<h1>Proyecto: '.$DescripcionProyecto.' Orden: '.$PurchaseOrderID.' </h1>';
          $htmlContent .= '<p>You can attach the files in this email.</p>';


          $htmlContent .= '<table cellspacing="0">';
          $htmlContent .= '<thead>';
          $htmlContent .= '<tr>';
          $htmlContent .= '<th>Orden de Compra</th>';
          $htmlContent .= '<th>Nombre Empleado</th>';
          $htmlContent .= '<th>Fecha Ingreso</th>';
          $htmlContent .= '<th>Numero Referencial</th>';
          $htmlContent .= '<th>Tipo Interaccion</th>';
          $htmlContent .= '<th>Solicitado por</th>';
          $htmlContent .= '<th>Aprobado por</th>';
          $htmlContent .= '<th>Comentarios Generales</th>';
          $htmlContent .= '<th>Respaldos</th>';
          $htmlContent .= '<th>Acciones</th>';
          $htmlContent .= '</tr>';
          $htmlContent .= '</thead>';
          $htmlContent .= '<tbody>';
          $htmlContent .= '<tr>';
          $htmlContent .= '<th>'.$id_orden_compra.'</th>';
          $htmlContent .= '<th>'.$nombre_empleado.'</th>';
          $htmlContent .= '<th>'.$fecha_ingreso.'</th>';
          $htmlContent .= '<th>'.$numero_referencial.'</th>';
          $htmlContent .= '<th>'.$tipo_interaccion.'</th>';
          $htmlContent .= '<th>'.$solicitado_por.'</th>';
          $htmlContent .= '<th>'.$aprobado_por.'</th>';
          $htmlContent .= '<th>'.$comentarios_generales.'</th>';
          $htmlContent .= '</tr>';
          
          $htmlContent .= '</tbody>';
          $htmlContent .= '</table>';


        

          $subject="Nuevo registro Control de calidad Orden: ".$PurchaseOrderNumber." ".$PurchaseOrderDescription;

          $file = $this->config->item('BASE_ARCHIVOS')."controlcalidad/".$respaldos;



          $this->sendEmail($email,$subject,$htmlContent,$file);

    }




public function sendEmail($email,$subject,$message,$file)
    {

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://mail.mimsprojects.com',
      'smtp_port' => 465,
      'smtp_user' => 'controlcalidad@mimsprojects.com', 
      'smtp_pass' => 'r9x0ptj~y5)T', 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('controlcalidad@mimsprojects.com');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($message);
          $this->email->attach($file);
          if($this->email->send())
         {
          $resp= true;
          $error_msg= 'Correo enviado correctamente';
         
         }
         else
        {

          $resp= true;
          $error_msg= show_error($this->email->print_debugger());

        }

        $data['resp']        = $resp;
        $data['mensaje']     = $error_msg;

        echo json_encode($data);
    }
  }