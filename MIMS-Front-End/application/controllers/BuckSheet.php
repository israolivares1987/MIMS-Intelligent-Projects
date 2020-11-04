<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BuckSheet extends MY_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('CSVReader');
        $this->load->library('CallExternosClientes');
        $this->load->library('CallExternosProyectos');
        $this->load->library('CallExternosConsultas');
        $this->load->library('CallExternosJournal');
        $this->load->library('CallExternosEmpleados');
        $this->load->library('CallExternosOrdenes');
        $this->load->library('CallExternosBuckSheet');
        $this->load->library('CallExternosDominios');

        $this->load->library('CallExternosBitacora');
        
        $this->load->helper('file');
        $this->load->helper('url');
        $this->load->library('CallUtil');

        if($this->session->userdata('logged_in') !== TRUE){
          redirect('login');
        }
        
    }

    

    function listaBucksheet($id_orden_compra,$id_cliente,$id_proyecto){


        $codEmpresa = $this->session->userdata('cod_emp');
        $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
        $menu = $this->callutil->armaMenuClientes($response);
        $datos['arrClientes'] = $menu ;
  
  


    //Obtiene Datos Orden
    
    $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$id_orden_compra,$codEmpresa);
    

    $arrOrden = json_decode($Orden);

    
    if($arrOrden){
      
      foreach ($arrOrden as $llave => $valor) {
              
        $PurchaseOrderID = $valor->PurchaseOrderID;
        $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
        $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

      }

      //Obtiene Datos Proyecto

      $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);
                

      $arrProyecto = json_decode($Proyecto);

      if($arrProyecto){

        foreach ($arrProyecto as $llave => $valor) {
                
          $DescripcionProyecto = $valor->NombreProyecto;

        }

      }

      // Obtiene Datos Cliente
      
      $responseCliente = $this->callexternosclientes->obtieneCliente($id_cliente);
  
      $arrCliente = json_decode($responseCliente);
     
      $datos_cliente = array();
  
      if($arrCliente){
        
        foreach ($arrCliente as $key => $value) {
  

            $nombreCliente =  $value->nombreCliente;
            $razonSocial  =   $value->razonSocial;
          
        }
      }
    

      $datoarchivo     = $this->callexternosdominios->obtieneDatosRef('NOMBRE_ARCHIVO_EJEMPLO');

     foreach (json_decode($datoarchivo) as $llave => $valor) {
      
      $nombreArchivoEjemplo =$valor->domain_desc;

    }


    $datoap   = $this->callexternosdominios->obtieneDatosRef('ACTUAL_PREVIO');
    $select_ap = "";
    foreach (json_decode($datoap) as $llave => $valor) {
      
      $select_ap .='<option value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';

    }
    

        $datos['select_ap'] = $select_ap;
        $datos['nombreArchivoEjemplo'] = $nombreArchivoEjemplo;
        $datos['PurchaseOrderID'] = $PurchaseOrderID;
        $datos['PurchaseOrderDescription'] = $PurchaseOrderDescription;
        $datos['idCliente'] = $id_cliente;
        $datos['codProyecto'] = $id_proyecto;
        $datos['DescripcionProyecto'] = $DescripcionProyecto;
        $datos['nombreCliente'] = $nombreCliente;
        $datos['razonSocial'] = $razonSocial;
        $datos['PurchaseOrderNumber'] = $PurchaseOrderNumber;
        


        if ($this->session->userdata('rol_id')==='202'){


          $this->plantilla_activador('activador/listaBuckSheet', $datos);
          
      
        }elseif($this->session->userdata('rol_id')==='203'){
      
          $this->plantilla_calidad('calidad/listaBuckSheet', $datos);
      

        }elseif($this->session->userdata('rol_id')==='204'){
      
          $this->plantilla_ingenieria('ingenieria/listaBuckSheet', $datos);
      
        }elseif($this->session->userdata('rol_id')==='205'){
      
          $this->plantilla_supervisor('supervisor/listaBuckSheet', $datos);
      
        }



  }

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
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu ;

    $idOrden = $this->input->post('idOrden');
    $idCliente = $this->input->post('idCliente');
    $idProyecto = $this->input->post('idProyecto');
    $estadoFechas = false;
    $countErrorfechas=0;
    $error =0;


    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');


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
      


    if($this->form_validation->run() == false) {
      
        $error_msg = 'Archivo invalido, favor seleccionar archivo CSV.';
        $resp = false;
       
    } else {
       // If file uploaded
       if(is_uploaded_file($_FILES['fileURL']['tmp_name'])) {                            
           // Parse data from CSV file
           $csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);            
           
          
           
           // create array from CSV file
           if(!empty($csvData)){


                //Carga Bitacora
       
                $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                'accion'  => 'SUBE_WPANEL',
                'usuario'  =>  $this->session->userdata('n_usuario'),
                'rol' =>   $this->session->userdata('nombre_rol'),
                'objeto'  => 'WPANEL' ,
                'fechaCambio' =>  date_create()->format('Y-m-d'));

                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);



               foreach($csvData as $row){  

              

                
                
                



                $rowCount++;
                
                if (strlen($row['Revision']) < 1 || $row['Revision']=== "" || isset($row['Revision']) || empty($row['Revision']) || is_null($row['Revision']) ){

                  $revision = '0';

                }else{

                  $revision = $row['Revision'];
                }

                  //valida fechas

                 


                    if($row['PurchaseOrderID'] == $idOrden){


                      if($this->callutil->validarFecha($row['FechaRAS']) && 
                      $this->callutil->validarFecha($row['FechaComienzoFabricacion']) &&
                      $this->callutil->validarFecha($row['FechaTerminoFabricacion']) &&
                      $this->callutil->validarFecha($row['FechaGranallado']) &&
                      $this->callutil->validarFecha($row['FechaPintura']) &&
                      $this->callutil->validarFecha($row['FechaListoInspeccion']) &&
                      $this->callutil->validarFecha($row['FechaSalidaFabrica']) &&
                      $this->callutil->validarFecha($row['FechaEmbarque']) &&
                      $this->callutil->validarFecha($row['FechaTC']) &&
                      $this->callutil->validarFecha($row['FechaTV']) &&
                      $this->callutil->validarFecha($row['FechaCF'])){
   
                     $estadoFechas = true;
   
                     }  
                    

                      $prevCount = $this->callexternosbucksheet->getRows($idOrden,$row['NumeroLinea']); 
                 
                      if($prevCount > 0){

                            
                             if(!empty($row['FechaCF']) && $row['PACF'] == 'ACTUAL'){
                                
                              $EstadoLineaBucksheet = '7';
                              
                             }   


                             if(!empty($row['FechaComienzoFabricacion']) && $row['PAFCF'] == 'ACTUAL'){

                                $EstadoLineaBucksheet = '2';

                              }

                              if(!empty($row['FechaTerminoFabricacion']) && $row['PAFTF'] == 'ACTUAL'){
                            
                              $EstadoLineaBucksheet = '3';
                              
                             }

                             if(!empty($row['FechaPintura']) && $row['PAFP'] == 'ACTUAL'){
                            
                              $EstadoLineaBucksheet = '6';
                              
                             }   
                            


                             if(!empty($row['FechaListoInspeccion']) && $row['PAFLI'] == 'ACTUAL') { 
                            
                                $EstadoLineaBucksheet = '4';

                             }

                             if(!empty($row['FechaEmbarque']) && !empty($row['PackingList'])){  
                            
                             $EstadoLineaBucksheet = '5';


                             }
                       
                      
                      }else{

                        $EstadoLineaBucksheet = '1';

                        if(!empty($row['FechaCF']) && $row['PACF'] == 'ACTUAL'){
                                
                          $EstadoLineaBucksheet = '7';
                          
                         }   


                         if(!empty($row['FechaComienzoFabricacion']) && $row['PAFCF'] == 'ACTUAL'){

                            $EstadoLineaBucksheet = '2';

                          }

                          if(!empty($row['FechaTerminoFabricacion']) && $row['PAFTF'] == 'ACTUAL'){
                        
                          $EstadoLineaBucksheet = '3';
                          
                         }

                         if(!empty($row['FechaPintura']) && $row['PAFP'] == 'ACTUAL'){
                        
                          $EstadoLineaBucksheet = '6';
                          
                         }   
                        


                         if(!empty($row['FechaListoInspeccion']) && $row['PAFLI'] == 'ACTUAL') { 
                        
                            $EstadoLineaBucksheet = '4';

                         }

                         if(!empty($row['FechaEmbarque']) && !empty($row['PackingList'])){  
                        
                         $EstadoLineaBucksheet = '5';


                         }

                       

                      }

                      $fecha_hoy = date_create()->format('Y-m-d');

                     
                      $memData = array(
                        'PurchaseOrderID' => $row['PurchaseOrderID'],
                        'purchaseOrdername' => urldecode($PurchaseOrderDescription),
                        'SupplierName' => urldecode($SupplierName),
                        'EstadoLineaBucksheet' => $EstadoLineaBucksheet,
                        'lineaActivable' => $row['lineaActivable'],
                        'NumeroLinea' => $row['NumeroLinea'],
                        'ItemST' => $row['ItemST'],
                        'SubItemST' => $row['SubItemST'],
                        'STUnidad' => $row['STUnidad'],
                        'STCantidad' => $row['STCantidad'],
                        'TAGNumber' => $row['TAGNumber'],
                        'Stockcode' => $row['Stockcode'],
                        'Descripcion' => $row['Descripcion'],
                        'PlanoModelo' => $row['PlanoModelo'],
                        'Revision' =>  $revision,
                        'PaqueteConstruccionArea' => $row['PaqueteConstruccionArea'],
                        'PesoUnitario' => $row['PesoUnitario'],
                        'PesoTotal' => $row['PesoTotal'],
                        'FechaRAS' => $this->callutil->formatoFecha($row['FechaRAS']),
                        'DiasAntesRAS' => $this->callutil->diasDiffFechas($row['FechaRAS'], $fecha_hoy),
                        'FechaComienzoFabricacion' => $this->callutil->formatoFecha($row['FechaComienzoFabricacion']),
                        'PAFCF' => $row['PAFCF'],
                        'FechaTerminoFabricacion' => $this->callutil->formatoFecha($row['FechaTerminoFabricacion']),
                        'PAFTF' => $row['PAFTF'],
                        'FechaGranallado' => $this->callutil->formatoFecha($row['FechaGranallado']),
                        'PAFG' => $row['PAFG'],
                        'FechaPintura' => $this->callutil->formatoFecha($row['FechaPintura']),
                        'PAFP' => $row['PAFP'],
                        'FechaListoInspeccion' => $this->callutil->formatoFecha($row['FechaListoInspeccion']),
                        'PAFLI' => $row['PAFLI'],
                        'ActaLiberacionCalidad' => $row['ActaLiberacionCalidad'],
                        'FechaSalidaFabrica' => $this->callutil->formatoFecha($row['FechaSalidaFabrica']),
                        'PAFSF' => $row['PAFSF'],
                        'FechaEmbarque' => $this->callutil->formatoFecha($row['FechaEmbarque']),
                        'PackingList' => $row['PackingList'],
                        'GuiaDespacho' => $row['GuiaDespacho'],
                        'SCNNumber' => $row['SCNNumber'],
                        'UnidadesSolicitadas' => $row['UnidadesSolicitadas'],
                        'UnidadesRecibidas' => $row['UnidadesRecibidas'],
                        'MaterialReceivedReport' => $row['MaterialReceivedReport'],
                        'MaterialWithdrawalReport' => $row['MaterialWithdrawalReport'],
                        'Origen' => $row['Origen'],
                        'DiasViaje' => $row['DiasViaje'],
                        'TransmittalCliente' => $row['TransmittalCliente'],
                        'FechaTC' => $this->callutil->formatoFecha($row['FechaTC']),
                        'TransmittalVendor' => $row['TransmittalVendor'],
                        'FechaTV' => $this->callutil->formatoFecha($row['FechaTV']),
                        'TransmittalCF' => $row['TransmittalCF'],
                        'FechaCF' => $this->callutil->formatoFecha($row['FechaCF']),
                        'PACF' => $row['PACF'],                        
                        'Observacion7' => $row['Observacion7'],
                    );


                    if($estadoFechas){
                                        
                      if($prevCount > 0){
                          // Update member data
                         
                          $update = $this->callexternosbucksheet->update($memData,$idOrden,$row['NumeroLinea']);
                          
                          if($update){
                              $updateCount++;

                               //Carga Bitacora
       
                                   //Carga Bitacora
       
                                   $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                                   'accion'  => 'ACTUALIZA_WPANEL_LINEA_'.$row['NumeroLinea'],
                                   'usuario'  =>  $this->session->userdata('n_usuario'),
                                   'rol' =>   $this->session->userdata('nombre_rol'),
                                   'objeto'  => 'WPANEL' ,
                                   'fechaCambio' =>  date_create()->format('Y-m-d'));
 
                                   $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                                


                          }
                      }else{
                          // Insert member data
                          $insert = $this->callexternosbucksheet->insert($memData);
                          
                          if($insert){
                              $insertCount++;

                              $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                              'accion'  => 'INSERTA_WPANEL_LINEA_'.$row['NumeroLinea'],
                              'usuario'  =>  $this->session->userdata('n_usuario'),
                              'rol' =>   $this->session->userdata('nombre_rol'),
                              'objeto'  => 'WPANEL' ,
                              'fechaCambio' =>  date_create()->format('Y-m-d'));

                              $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);




                          }
                      }

                    }else{
                      
                      $countErrorfechas++;

                    }

                      if($estadoFechas){

                          // Status message with imported data count
                          $notAddCount = ($rowCount - ($insertCount + $updateCount));
                          $error_msg = 'WPanel importado correctamente. Total registros ('.$rowCount.') | Insertados ('.$insertCount.') | Actualizados('.$updateCount.') | No insertados ('.$notAddCount.')';
                          $resp = true;
                          $error = 0;

                      }else{

                         // Status message with imported data count
                         $notAddCount = ($rowCount - ($insertCount + $updateCount));
                         $error_msg = 'WPanel importado con errores. Total registros ('.$rowCount.') | Insertados ('.$insertCount.') | Actualizados('.$updateCount.') | No insertados ('.$notAddCount.') | Error Fechas('.$countErrorfechas.')';
                         $resp = true;
                         $error = 1;

                      }

                        

                


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
        $data['error']       = $error;

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
            );
            if(isset($_FILES['fileURL']['name']) && $_FILES['fileURL']['name'] != ""){
                // get mime by extension
                $mime = get_mime_by_extension($_FILES['fileURL']['name']);
                $fileExt = explode('.', $_FILES['fileURL']['name']);
                $ext = end($fileExt);
                if(($ext == 'csv') && in_array($mime, $mime_types)){
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
    

    function obtieneBucksheet(){

      

      $PurchaseOrderID = $this->input->post('id_orden');
      $respuesta = false;

        $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($PurchaseOrderID);


        $arrBucksheet = json_decode($bucksheet);
 

  $datos_bucksheet = array();

  if($arrBucksheet){
    $respuesta = true;
    
    foreach ($arrBucksheet as $key => $value) {


     

      $fecha_hoy = date_create()->format('Y-m-d');
      
      $datos_bucksheet[] = array(
        'PurchaseOrderID' => $value->PurchaseOrderID,
        'purchaseOrdername' => $value->purchaseOrdername,
        'EstadoLineaBucksheet' => $value->EstadoLineaBucksheet,
        'lineaActivable' => $value->lineaActivable,
        'NumeroLinea' => $value->NumeroLinea,
        'SupplierName' => $value->SupplierName,
        'ItemST' => $value->ItemST,
        'SubItemST' => $this->callutil->cambianull($value->SubItemST),
        'STUnidad' => $this->callutil->cambianull($value->STUnidad),
        'STCantidad' => $value->STCantidad,
        'TAGNumber' => $this->callutil->cambianull($value->TAGNumber),
        'Stockcode' => $this->callutil->cambianull($value->Stockcode),
        'Descripcion' => $value->Descripcion,
        'PlanoModelo' => $this->callutil->cambianull($value->PlanoModelo),
        'Revision' => $value->Revision,
        'PaqueteConstruccionArea' => $this->callutil->cambianull($value->PaqueteConstruccionArea),
        'PesoUnitario' => $this->callutil->cambianull($value->PesoUnitario),
        'PesoTotal' => $this->callutil->cambianull($value->PesoTotal),
        'FechaRAS' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaRAS)),
        'DiasAntesRAS' => $this->callutil->diasDiffFechas($value->FechaRAS, $fecha_hoy),
        'FechaComienzoFabricacion' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaComienzoFabricacion)),
        'PAFCF' => $this->callutil->cambianull($value->PAFCF),
        'FechaTerminoFabricacion' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaTerminoFabricacion)),
        'PAFTF' => $this->callutil->cambianull($value->PAFTF),
        'FechaGranallado' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaGranallado)),
        'PAFG' => $this->callutil->cambianull($value->PAFG),
        'FechaPintura' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaPintura)),
        'PAFP' => $this->callutil->cambianull($value->PAFP),
        'FechaListoInspeccion' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaListoInspeccion)),
        'PAFLI' => $this->callutil->cambianull($value->PAFLI),
        'ActaLiberacionCalidad' => $this->callutil->cambianull($value->ActaLiberacionCalidad),
        'FechaSalidaFabrica' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaSalidaFabrica)),
        'PAFSF' => $this->callutil->cambianull($value->PAFSF),
        'FechaEmbarque' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaEmbarque)),
        'PackingList' => $this->callutil->cambianull($value->PackingList),
        'GuiaDespacho' => $this->callutil->cambianull($value->GuiaDespacho),
        'SCNNumber' => $this->callutil->cambianull($value->SCNNumber),
        'UnidadesSolicitadas' => $this->callutil->cambianull($value->UnidadesSolicitadas),
        'UnidadesRecibidas' => $this->callutil->cambianull($value->UnidadesRecibidas),
        'MaterialReceivedReport' => $this->callutil->cambianull($value->MaterialReceivedReport),
        'MaterialWithdrawalReport' => $this->callutil->cambianull($value->MaterialWithdrawalReport),
        'Origen' => $this->callutil->cambianull($value->Origen),
        'DiasViaje' => $this->callutil->cambianull($value->DiasViaje),
        'TransmittalCliente' => $this->callutil->cambianull($value->TransmittalCliente),
        'FechaTC' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaTC)),
        'TransmittalVendor' => $this->callutil->cambianull($value->TransmittalVendor),
        'FechaTV' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaTV)),
        'TransmittalCF' => $this->callutil->cambianull($value->TransmittalCF),
        'FechaCF' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaCF)),
        'PACF' => $this->callutil->cambianull($value->PACF),
        'Observacion7' => $this->callutil->cambianull($value->Observacion7)

      );

    }
  }else{
  
    $respuesta = false;

  }
  
  $datos['bucksheets'] = $datos_bucksheet;
  $datos['resp']      = $respuesta;

  echo json_encode($datos);

  
  
      }

function obtieneBucksheetDet()
      {

        $PurchaseOrderID = $this->input->post('id_orden');
        $NumeroLinea = $this->input->post('numero_linea');

        $response = $this->callexternosbucksheet->obtieneBucksheetDet($PurchaseOrderID,$NumeroLinea);
      
        $arrBucksheet = json_decode($response);
 

        $datos_bucksheet = array();
      
        if($arrBucksheet){
          $respuesta = true;
          
          foreach ($arrBucksheet as $key => $value) {
    
      
            
            $datos_bucksheet[] = array(
              'PurchaseOrderID' => $value->PurchaseOrderID,
              'purchaseOrdername' => $value->purchaseOrdername,
              'EstadoLineaBucksheet' => $value->EstadoLineaBucksheet,
              'lineaActivable' => $value->lineaActivable,
              'NumeroLinea' => $value->NumeroLinea,
              'SupplierName' => $value->SupplierName,
              'ItemST' => $value->ItemST,
              'SubItemST' => $value->SubItemST,
              'STUnidad' => $value->STUnidad,
              'STCantidad' => $value->STCantidad,
              'TAGNumber' => $value->TAGNumber,
              'Stockcode' => $value->Stockcode,
              'Descripcion' => $value->Descripcion,
              'PlanoModelo' => $value->PlanoModelo,
              'Revision' => $this->callutil->cambianull($value->Revision),
              'PaqueteConstruccionArea' => $value->PaqueteConstruccionArea,
              'PesoUnitario' => $value->PesoUnitario,
              'PesoTotal' => $value->PesoTotal,
              'FechaRAS' => $this->callutil->formatoFechaSalida($value->FechaRAS),
              'DiasAntesRAS' => $value->DiasAntesRAS,
              'FechaComienzoFabricacion' => $this->callutil->formatoFechaSalida($value->FechaComienzoFabricacion),
              'PAFCF' => $this->callutil->cambianull($value->PAFCF),
              'FechaTerminoFabricacion' => $this->callutil->formatoFechaSalida($value->FechaTerminoFabricacion),
              'PAFTF' => $this->callutil->cambianull($value->PAFTF),
              'FechaGranallado' => $this->callutil->formatoFechaSalida($value->FechaGranallado),
              'PAFG' => $this->callutil->cambianull($value->PAFG),
              'FechaPintura' => $this->callutil->formatoFechaSalida($value->FechaPintura),
              'PAFP' => $this->callutil->cambianull($value->PAFP),
              'FechaListoInspeccion' => $this->callutil->formatoFechaSalida($value->FechaListoInspeccion),
              'PAFLI' => $this->callutil->cambianull($value->PAFLI),
              'ActaLiberacionCalidad' => $value->ActaLiberacionCalidad,
              'FechaSalidaFabrica' => $this->callutil->formatoFechaSalida($value->FechaSalidaFabrica),
              'PAFSF' => $this->callutil->cambianull($value->PAFSF),
              'FechaEmbarque' => $this->callutil->formatoFechaSalida($value->FechaEmbarque),
              'PackingList' => $value->PackingList,
              'GuiaDespacho' => $value->GuiaDespacho,
              'SCNNumber' => $value->SCNNumber,
              'UnidadesSolicitadas' => $value->UnidadesSolicitadas,
              'UnidadesRecibidas' => $value->UnidadesRecibidas,
              'MaterialReceivedReport' => $value->MaterialReceivedReport,
              'MaterialWithdrawalReport' => $value->MaterialWithdrawalReport,
              'Origen' => $value->Origen,
              'DiasViaje' => $value->DiasViaje,
              'TransmittalCliente' => $value->TransmittalCliente,
              'FechaTC' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaTC)),
              'TransmittalVendor' => $this->callutil->cambianull($value->TransmittalVendor),
              'FechaTV' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaTV)),
              'TransmittalCF' => $this->callutil->cambianull($value->TransmittalCF),
              'FechaCF' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaCF)),
              'PACF' => $this->callutil->cambianull($value->PACF),              
              'Observacion7' => $this->callutil->cambianull($value->Observacion7)
      
            );
      
          }
        }else{
        
          $respuesta = false;
      
        }
        
        $datos['bucksheet'] = $datos_bucksheet;
        $datos['resp']      = $respuesta;
      
        echo json_encode($datos);

  
  
      }


      function updateBuckSheet()
      {

        if(!is_null($this->input->post('FechaCF')) && $this->input->post('PACF') == 'ACTUAL'){
                                
          $EstadoLineaBucksheet = '7';
          
         }   


         if(!is_null($this->input->post('FechaComienzoFabricacion')) && $this->input->post('PAFCF') == 'ACTUAL'){

          $EstadoLineaBucksheet = '2';

        }
        
        if(!is_null($this->input->post('FechaTerminoFabricacion')) && $this->input->post('PAFTF') == 'ACTUAL'){
      
        $EstadoLineaBucksheet = '3';
        
       }

         if(!is_null($this->input->post('FechaPintura')) && $this->input->post('PAFP') == 'ACTUAL'){
        
          $EstadoLineaBucksheet = '6';
          
         }   
        


         if( !is_null($this->input->post('FechaListoInspeccion')) && $this->input->post('PAFLI') == 'ACTUAL'){ 
      
          $EstadoLineaBucksheet = '4';

       }
       
       if(!is_null($this->input->post('FechaEmbarque')) &&  !is_null($this->input->post('PackingList'))){  
      
       $EstadoLineaBucksheet = '5';


        }

      
       
     
    
        $Orden = $this->callexternosordenes->obtieneOrden($this->input->post('idProyecto'),
                                                          $this->input->post('idCliente'),
                                                          $this->input->post('PurchaseOrderID'),
                                                          $this->input->post('codEmpresa'));
    

        $arrOrden = json_decode($Orden);
    
        
        if($arrOrden){
          
          foreach ($arrOrden as $llave => $valor) {
                  
            $SupplierName = $valor->SupplierName;
            $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
            $PurchaseOrderID = $valor->PurchaseOrderID;
            $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
    
          }
        }



        $memData = array(
          'PurchaseOrderID' => $this->input->post('PurchaseOrderID'),
          'purchaseOrdername' => urldecode($PurchaseOrderDescription),
          'SupplierName' => urldecode($SupplierName),
          'EstadoLineaBucksheet' =>  $EstadoLineaBucksheet,
          'NumeroLinea' => $this->input->post('NumeroLinea'),
          'lineaActivable' => $this->input->post('lineaActivable'),
          'STCantidad' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('STCantidad')),
          'TAGNumber' => $this->input->post('TAGNumber'),
          'Stockcode' => $this->input->post('Stockcode'),
          'Descripcion' => $this->input->post('Descripcion'),
          'PlanoModelo' => $this->input->post('PlanoModelo'),
          'Revision' => $this->input->post('Revision'),
          'PaqueteConstruccionArea' => $this->input->post('PaqueteConstruccionArea'),
          'PesoUnitario' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('PesoUnitario')),
          'PesoTotal' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('PesoTotal')),
          'FechaRAS' => $this->callutil->formatoFecha($this->input->post('FechaRAS')),
          'DiasAntesRAS' => $this->input->post('DiasAntesRAS'),
          'FechaComienzoFabricacion' => $this->callutil->formatoFecha($this->input->post('FechaComienzoFabricacion')),
          'PAFCF' => $this->input->post('PAFCF'),
          'FechaTerminoFabricacion' => $this->callutil->formatoFecha($this->input->post('FechaTerminoFabricacion')),
          'PAFTF' => $this->input->post('PAFTF'),
          'FechaGranallado' => $this->callutil->formatoFecha($this->input->post('FechaGranallado')),
          'PAFG' => $this->input->post('PAFG'),
          'FechaPintura' => $this->callutil->formatoFecha($this->input->post('FechaPintura')),
          'PAFP' => $this->input->post('PAFP'),
          'FechaListoInspeccion' => $this->callutil->formatoFecha($this->input->post('FechaListoInspeccion')),
          'PAFLI' => $this->input->post('PAFLI'),
          'ActaLiberacionCalidad' => $this->input->post('ActaLiberacionCalidad'),
          'FechaSalidaFabrica' => $this->callutil->formatoFecha($this->input->post('FechaSalidaFabrica')),
          'PAFSF' => $this->input->post('PAFSF'),
          'FechaEmbarque' => $this->callutil->formatoFecha($this->input->post('FechaEmbarque')),
          'PackingList' => $this->input->post('PackingList'),
          'GuiaDespacho' => $this->input->post('GuiaDespacho'),
          'SCNNumber' => $this->input->post('SCNNumber'),
          'Origen' => $this->input->post('Origen'),
          'DiasViaje' => $this->input->post('DiasViaje'),
          'TransmittalCliente' => $this->input->post('TransmittalCliente'),
          'FechaTC' =>  $this->callutil->formatoFecha($this->input->post('FechaTC')),
          'TransmittalVendor' => $this->input->post('TransmittalVendor'),
          'FechaTV' =>  $this->callutil->formatoFecha($this->input->post('FechaTV')),
          'TransmittalCF' => $this->input->post('TransmittalCF'),
          'FechaCF' =>  $this->callutil->formatoFecha($this->input->post('FechaCF')),
          'PACF' => $this->input->post('PACF'),
          'Observacion7' => $this->input->post('Observacion7')
        );

        $response = $this->callexternosbucksheet->updateBuckSheetLinea($memData);
        $data = array();

        if($response){

            $data['resp']        = true;
            $data['mensaje']     = 'Registro actualizado correctamente';



            $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
            'accion'  => 'ACTUALIZA_WPANEL_LINEA_'.$this->input->post('NumeroLinea'),
            'usuario'  =>  $this->session->userdata('n_usuario'),
            'rol' =>   $this->session->userdata('nombre_rol'),
            'objeto'  => 'WPANEL' ,
            'fechaCambio' =>  date_create()->format('Y-m-d'));

            $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);


    
          }else{
            $data['resp']        = false;
            $data['mensaje']     = 'Error al actualizar registro';
          }
        
    
        echo json_encode($data);
       
  
  
      }


      function eliminaBuckSheet(){


        $PurchaseOrderID       = $this->input->post('PurchaseOrderID');
        $numeroLinea       = $this->input->post('numeroLinea');
        $resp = false;
        $mensaje = "";
    
    
       
          $bucksheet = $this->callexternosbucksheet->eliminaBuckSheet($PurchaseOrderID,$numeroLinea);
        
          if($bucksheet){
    
            $resp = true;
            $mensaje = "Linea ".$numeroLinea." del BuckeSheet Eliminado correctamente";


            
            $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
            'accion'  => 'ELIMINA_WPANEL_LINEA_'.$numeroLinea,
            'usuario'  =>  $this->session->userdata('n_usuario'),
            'rol' =>   $this->session->userdata('nombre_rol'),
            'objeto'  => 'WPANEL' ,
            'fechaCambio' =>  date_create()->format('Y-m-d'));

            $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

    
          }else{
    
            $resp = false;
            $mensaje = "Error al Eliminar Linea, datos sin actualizar";
          }
      
      
    
          $data['resp']       = $resp;
          $data['mensaje']    = $mensaje;
          
          
    
    
         
        echo json_encode($data);





      }

    // export Data
   // Export data in CSV format 
   public function exportCSV($PurchaseOrderID){ 
    // file name 
    $filename = 'wpanel_'.$PurchaseOrderID.'_'.date('Ymd').date('H:i:s').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: text/csv;charset=UTF-8" );
    
    // get data 
    $usersData = $this->callexternosbucksheet->obtieneBucksheet($PurchaseOrderID);
 

    $arrBucksheet = json_decode($usersData);

    
    // file creation 
    $file = fopen('php://output', 'w');
   

    $header = array("PurchaseOrderID",
    "purchaseOrdername",
    "EstadoLineaBucksheet",
    'lineaActivable',
    "NumeroLinea",
    "SupplierName",
    "ItemST",
    "SubItemST",
    "STUnidad",
    "STCantidad",
    "TAGNumber",
    "Stockcode",
    "Descripcion",
    "PlanoModelo",
    "Revision",
    "PaqueteConstruccionArea",
    "PesoUnitario",
    "PesoTotal",
    "FechaRAS",
    "DiasAntesRAS",
    "FechaComienzoFabricacion",
    "PAFCF",
    "FechaTerminoFabricacion",
    "PAFTF",
    "FechaGranallado",
    "PAFG",
    "FechaPintura",
    "PAFP",
    "FechaListoInspeccion",
    "PAFLI",
    "ActaLiberacionCalidad",
    "FechaSalidaFabrica",
    "PAFSF",
    "FechaEmbarque",
    "PackingList",
    "GuiaDespacho",
    "SCNNumber",
    "UnidadesSolicitadas",
    "UnidadesRecibidas",
    "MaterialReceivedReport",
    "MaterialWithdrawalReport",
    "Origen",
    "DiasViaje",
    "TransmittalCliente",
    "FechaTC",
    "TransmittalVendor",
    "FechaTV",
    "TransmittalCF",
    "FechaCF",
    "PACF",
    "Observacion7"); 

    fputcsv($file, $header, ';', chr(27));
    
    foreach ($arrBucksheet as $key => $value){ 

      
      $datos_bucksheet = array(

        'PurchaseOrderID' => $value->PurchaseOrderID,
        'purchaseOrdername' => $value->purchaseOrdername,
        'EstadoLineaBucksheet' => $value->EstadoLineaBucksheet,
        'lineaActivable' =>  $value->lineaActivable,
        'NumeroLinea' => $value->NumeroLinea,
        'SupplierName' => $value->SupplierName,
        'ItemST' => $value->ItemST,
        'SubItemST' => $value->SubItemST,
        'STUnidad' => $value->STUnidad,
        'STCantidad' => $value->STCantidad,
        'TAGNumber' =>  $value->TAGNumber,
        'Stockcode' =>  $value->Stockcode,
        'Descripcion' => $value->Descripcion,
        'PlanoModelo' =>  $value->PlanoModelo,
        'Revision' => $value->Revision,
        'PaqueteConstruccionArea' =>  $value->PaqueteConstruccionArea,
        'PesoUnitario' => $value->PesoUnitario,
        'PesoTotal' => $value->PesoTotal,
        'FechaRAS' => $this->callutil->formatoFechaSalida($value->FechaRAS),
        'DiasAntesRAS' => $value->DiasAntesRAS,
        'FechaComienzoFabricacion' => $this->callutil->formatoFechaSalida($value->FechaComienzoFabricacion),
        'PAFCF' => $value->PAFCF,
        'FechaTerminoFabricacion' => $this->callutil->formatoFechaSalida($value->FechaTerminoFabricacion),
        'PAFTF' => $value->PAFTF,
        'FechaGranallado' => $this->callutil->formatoFechaSalida($value->FechaGranallado),
        'PAFG' => $value->PAFG,
        'FechaPintura' => $this->callutil->formatoFechaSalida($value->FechaPintura),
        'PAFP' => $value->PAFP,
        'FechaListoInspeccion' => $this->callutil->formatoFechaSalida($value->FechaListoInspeccion),
        'PAFLI' => $value->PAFLI,
        'ActaLiberacionCalidad' => $value->ActaLiberacionCalidad,
        'FechaSalidaFabrica' => $this->callutil->formatoFechaSalida($value->FechaSalidaFabrica),
        'PAFSF' => $value->PAFSF,
        'FechaEmbarque' => $this->callutil->formatoFechaSalida($value->FechaEmbarque),
        'PackingList' => $value->PackingList,
        'GuiaDespacho' => $value->GuiaDespacho,
        'SCNNumber' =>  $value->SCNNumber,
        'UnidadesSolicitadas' => $value->UnidadesSolicitadas,
        'UnidadesRecibidas' => $value->UnidadesRecibidas,
        'MaterialReceivedReport' => $value->MaterialReceivedReport,
        'MaterialWithdrawalReport' => $value->MaterialWithdrawalReport,
        'Origen' => $value->Origen,
        'DiasViaje' => $value->DiasViaje,
        'TransmittalCliente' =>  $value->TransmittalCliente,
        'FechaTC' =>  $this->callutil->formatoFechaSalida($value->FechaTC),
        'TransmittalVendor' =>  $value->TransmittalVendor,
        'FechaTV' =>  $this->callutil->formatoFechaSalida($value->FechaTV),
        'TransmittalCF' =>  $value->TransmittalCF,
        'FechaCF' =>  $this->callutil->formatoFechaSalida($value->FechaCF),
        'PACF' => $value->PACF,
        'Observacion7' =>  $value->Observacion7
      );



      $this->my_fputcsv($file, $datos_bucksheet, $delimiter = ';', $enclosure = '', $escape = '');
    }
    fclose($file); 
    
    
    $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
    'accion'  => 'DESCARGA_WPANEL',
    'usuario'  =>  $this->session->userdata('n_usuario'),
    'rol' =>   $this->session->userdata('nombre_rol'),
    'objeto'  => 'WPANEL' ,
    'fechaCambio' =>  date_create()->format('Y-m-d'));

    $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
    

    exit; 

   }
      

   public  function my_fputcsv($handle, $fields, $delimiter = ',', $enclosure = '"', $escape = '\\')
   {
    $first = 1;
    foreach ($fields as $field) {
      if ($first == 0) fwrite($handle, $delimiter);
  
      $f = str_replace($enclosure, $enclosure.$enclosure, $field);
      if ($enclosure != $escape) {
        $f = str_replace($escape.$enclosure, $escape, $f);
      }
      if (strpbrk($f, " \t\n\r".$delimiter.$enclosure.$escape) || strchr($f, "\000")) {
        fwrite($handle, $enclosure.$f.$enclosure);
      } else {
        fwrite($handle, $f);
      }
  
      $first = 0;
    }
    fwrite($handle, "\n");
  }

}
