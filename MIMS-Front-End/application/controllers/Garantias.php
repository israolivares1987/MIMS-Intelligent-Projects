<?php
class Garantias extends MY_Controller{
  
  function __construct(){

    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallExternosGarantias');
    
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
 

  function listasGarantias(){
  
    $codEmpresa = $this->input->post('codEmpresa');
    $idCliente = $this->input->post('idCliente');
    $idProyecto = $this->input->post('idProyecto');
    $idOrden = $this->input->post('idOrden');

    $listasgarantias = $this->callexternosgarantias->listasGarantias($idCliente,$idProyecto,$idOrden, $codEmpresa);

    
    $respuesta = false;
    $respaldo = '';

    $arrlistasgarantias = json_decode($listasgarantias);
   
    $datos_garantias = array();

    if($arrlistasgarantias){
      $respuesta = true;
      
      foreach ($arrlistasgarantias as $key => $value) {

      
        if(strlen($value->RESPALDO) > 0 && $value->RESPALDO !='null'  ){
          $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/garantias/'.$value->RESPALDO.'" download="'.$value->RESPALDO_ORIGINAL.'"><i class="fas fa-download"></i> Descarga</a>';
        }else{
          $respaldo = '';
        }

        $fecha_hoy = date_create()->format('Y-m-d');


        $datos_garantias[] = array(
          'COD_EMPRESA' => $value->COD_EMPRESA,
          'ID_GARANTIA' => $value->ID_GARANTIA,
          'ID_CLIENTE' => $value->ID_CLIENTE,
          'ID_PROYECTO' => $value->ID_PROYECTO,
          'ID_EMPLEADO' => $value->ID_EMPLEADO,
          'FECHA_EMISION' => $this->callutil->formatoFechaSalida($value->FECHA_EMISION),
          'NUMERO_DOCTO' => $value->NUMERO_DOCTO,
          'TIPO_GARANTIA' => $value->TIPO_GARANTIA,
          'REFERENCIA' => $value->REFERENCIA,
          'MONTO' => $this->callutil->formatoDinero($value->MONTO),
          'VENCIMIENTO' => $this->callutil->formatoFechaSalida($value->VENCIMIENTO),
          'DIAS_VENCIMIENTO' => $this->callutil->diasDiffFechas($value->VENCIMIENTO, $fecha_hoy),
          'RESPALDO' =>  $respaldo
        );
        
      }
    }

    $datos['garantias'] = $datos_garantias;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);


  
  }


  

  function guardarGarantias(){

    
    $codEmpresa = $this->session->userdata('cod_emp');
    $ID_CLIENTE = $this->input->post('ID_CLIENTE_GARA');
    $ID_ORDEN = $this->input->post('ID_ORDEN_GARA');
    $ID_PROYECTO = $this->input->post('ID_PROYECTO_GARA');
    $ID_EMPLEADO = $this->input->post('ID_EMPLEADO_GARA');
    $FECHA_EMISION = $this->callutil->formatoFecha($this->input->post('FECHA_EMISION'));
    $NUMERO_DOCTO = $this->input->post('NUMERO_DOCTO');
    $TIPO_GARANTIA = $this->input->post('TIPO_GARANTIA');
    $REFERENCIA = $this->input->post('REFERENCIA');
    $VENCIMIENTO = $this->callutil->formatoFecha($this->input->post('VENCIMIENTO'));
      

    $target_path = $this->config->item('BASE_ARCHIVOS')."garantias/";
    $resp = false;
    $error_msg = "";
    $respaldo = "";
    $idInsertado=0;
    $nameArchivo = "RESPALDO_GARA";
    $MontoInsoluto = 0;


 //Obtiene Datos Orden




 $Orden = $this->callexternosordenes->obtieneOrden($ID_PROYECTO,$ID_CLIENTE,$ID_ORDEN,$codEmpresa);      

 $arrOrden = json_decode($Orden);

 if($arrOrden){
   
   foreach ($arrOrden as $llave => $valor) {
           
     $PurchaseOrderID = $valor->PurchaseOrderID;
     $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
     $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
     $montoOrden =  $valor->ValorTotal;

   }
 }

        $MONTO  = $montoOrden * 0.05;

            


        
 
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

                  $error_msg = 'Monto ingresado es menor al monto Insoluto, favor verificar.';
                  $resp = false;

                }else{

                     // Comienzo Insert
    
                $respaldo = $basename;
    
                $dataInsert = array(	
                  'COD_EMPRESA' => $codEmpresa,
                  'ID_CLIENTE' => $ID_CLIENTE ,
                  'ID_ORDEN' => $ID_ORDEN,
                  'ID_PROYECTO' => $ID_PROYECTO ,
                  'ID_EMPLEADO' => $ID_EMPLEADO ,
                  'FECHA_EMISION' => $FECHA_EMISION ,
                  'NUMERO_DOCTO' => $NUMERO_DOCTO ,
                  'TIPO_GARANTIA' => $TIPO_GARANTIA ,
                  'REFERENCIA' => $REFERENCIA ,
                  'MONTO' => $MONTO ,
                  'VENCIMIENTO' => $VENCIMIENTO ,
                  'RESPALDO' => $respaldo ,
                  'RESPALDO_ORIGINAL' => $respaldos_original 
                  );
    
                  $garantiaInsert = $this->callexternosgarantias->guardarGarantias($dataInsert);

           
    
                  $garantiaInserts = json_decode($garantiaInsert) ;
            
                  $resp =  $garantiaInserts->status;
                  $idInsertado = $garantiaInserts->id_insertado;

                  if($resp){
    
                    $error_msg = 'Registro cargado correctamente.';
                    $resp =  true;
    
    
                    $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                    'accion'  => 'INSERTA_GARANTIA',
                    'id_registro' =>  $idInsertado,
                    'usuario'  =>  $this->session->userdata('n_usuario'),
                    'rol' =>   $this->session->userdata('nombre_rol'),
                    'objeto'  => 'GARANTIAS' ,
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

          if($MontoInsoluto <  0 ){

            $error_msg = 'Monto ingresado es menor al monto Insoluto, favor verificar.';
            $resp = false;

          }else{
            
            $dataInsert = array(	
              'COD_EMPRESA' => $codEmpresa,
              'ID_CLIENTE' => $ID_CLIENTE ,
              'ID_ORDEN' => $ID_ORDEN,
              'ID_PROYECTO' => $ID_PROYECTO ,
              'ID_EMPLEADO' => $ID_EMPLEADO ,
              'FECHA_EMISION' => $FECHA_EMISION ,
              'NUMERO_DOCTO' => $NUMERO_DOCTO ,
              'TIPO_GARANTIA' => $TIPO_GARANTIA ,
              'REFERENCIA' => $REFERENCIA ,
              'MONTO' => $MONTO ,
              'VENCIMIENTO' => $VENCIMIENTO 
              );

              $garantiaInsert = $this->callexternosgarantias->guardarGarantias($dataInsert);

       

              $garantiaInserts = json_decode($garantiaInsert) ;
        
              $resp =  $garantiaInserts->status;
              $idInsertado = $garantiaInserts->id_insertado;

              if($resp){

                $error_msg = 'Registro cargado correctamente.';
                $resp =  true;


                $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                'accion'  => 'INSERTA_GARANTIA',
                'id_registro' =>  $idInsertado,
                'usuario'  =>  $this->session->userdata('n_usuario'),
                'rol' =>   $this->session->userdata('nombre_rol'),
                'objeto'  => 'GARANTIAS' ,
                'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
        
                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

              }else{

                $error_msg = 'Inconvenientes al cargar registro, favor reintente.';
                $resp =  false;

              }
  
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

  }

