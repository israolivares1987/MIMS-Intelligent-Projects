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

               foreach($csvData as $row){  


                $rowCount++;
                
                if (strlen($row['Revision']) < 1 || $row['Revision']=== "" || isset($row['Revision']) || empty($row['Revision']) || is_null($row['Revision']) ){

                  $revision = '0';

                }else{

                  $revision = $row['Revision'];
                }

            


                    if($row['PurchaseOrderID'] == $idOrden){

                      $prevCount = $this->callexternosbucksheet->getRows($idOrden,$row['NumeroLinea']); 
                 
                      if($prevCount > 0){

                      
                             if(!is_null($row['FechaComienzoFabricacion']) && $row['PAFCF'] == 'Actual'){

                                $EstadoLineaBucksheet = '2';

                              }
                              
                             if(!is_null($row['FechaTerminoFabricacion']) && $row['PAFTF'] == 'Actual'){
                            
                              $EstadoLineaBucksheet = '3';
                              
                             }
                             if(!is_null($row['FechaListoInspeccion']) && $row['PAFLI'] == 'Actual') { 
                            
                                $EstadoLineaBucksheet = '4';

                             }
                             if(!is_null($row['FechaEmbarque']) && !is_null($row['PackingList'])){  
                            
                             $EstadoLineaBucksheet = '5';


                             }
                       
                      
                      }else{


                        $EstadoLineaBucksheet = '1';

                      }
                      
                      $memData = array(
                        'PurchaseOrderID' => $row['PurchaseOrderID'],
                        'purchaseOrdername' => urldecode($PurchaseOrderDescription),
                        'SupplierName' => urldecode($SupplierName),
                        'EstadoLineaBucksheet' => $EstadoLineaBucksheet,
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
                        'DiasAntesRAS' => $this->callutil->diasDiffFechas($row['FechaRAS'], $row['FechaSalidaFabrica']),
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
                        'Observacion1' => $row['Observacion1'],
                        'Observacion2' => $row['Observacion2'],
                        'Observacion3' => $row['Observacion3'],
                        'Observacion4' => $row['Observacion4'],
                        'Observacion5' => $row['Observacion5'],
                        'Observacion6' => $row['Observacion6'],
                        'Observacion7' => $row['Observacion7'],
                    );


                    
                                        
                      if($prevCount > 0){
                          // Update member data
                         
                          $update = $this->callexternosbucksheet->update($memData,$idOrden,$row['NumeroLinea']);
                          
                          if($update){
                              $updateCount++;
                          }
                      }else{
                          // Insert member data
                          $insert = $this->callexternosbucksheet->insert($memData);
                          
                          if($insert){
                              $insertCount++;
                          }
                      }

                          // Status message with imported data count
                            $notAddCount = ($rowCount - ($insertCount + $updateCount));
                            $error_msg = 'BuckSheet importado correctamente. Total registros ('.$rowCount.') | Insertados ('.$insertCount.') | Actualizados('.$updateCount.') | No insertados ('.$notAddCount.')';
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

      //Obtiene Datos Proyecto
    
      $Proyecto = $this->callexternosproyectos->obtieneProyecto($idProyecto, $idCliente);
                

      $arrProyecto = json_decode($Proyecto);

      if($arrProyecto){

        foreach ($arrProyecto as $llave => $valor) {
                
          $DescripcionProyecto = $valor->NombreProyecto;

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

      
      $datos_bucksheet[] = array(
        'PurchaseOrderID' => $value->PurchaseOrderID,
        'purchaseOrdername' => $value->purchaseOrdername,
        'EstadoLineaBucksheet' => $this->callutil->cambianull($value->EstadoLineaBucksheet),
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
        'SCNNumber' => $value->SCNNumber,
        'UnidadesSolicitadas' => $value->UnidadesSolicitadas,
        'UnidadesRecibidas' => $value->UnidadesRecibidas,
        'MaterialReceivedReport' => $value->MaterialReceivedReport,
        'MaterialWithdrawalReport' => $value->MaterialWithdrawalReport,
        'Origen' => $value->Origen,
        'DiasViaje' => $value->DiasViaje,
        'Observacion1' => $value->Observacion1,
        'Observacion2' => $value->Observacion2,
        'Observacion3' => $value->Observacion3,
        'Observacion4' => $value->Observacion4,
        'Observacion5' => $value->Observacion5,
        'Observacion6' => $value->Observacion6,
        'Observacion7' => $value->Observacion7

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
              'Observacion1' => $value->Observacion1,
              'Observacion2' => $value->Observacion2,
              'Observacion3' => $value->Observacion3,
              'Observacion4' => $value->Observacion4,
              'Observacion5' => $value->Observacion5,
              'Observacion6' => $value->Observacion6,
              'Observacion7' => $value->Observacion7
      
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


        if(!is_null($this->input->post('FechaComienzoFabricacion')) && $this->input->post('PAFCF') == 'Actual'){

          $EstadoLineaBucksheet = '2';

        }
        
        if(!is_null($this->input->post('FechaTerminoFabricacion')) && $this->input->post('PAFTF') == 'Actual'){
      
        $EstadoLineaBucksheet = '3';
        
       }
       
       if( !is_null($this->input->post('FechaListoInspeccion')) && $this->input->post('PAFLI') == 'Actual'){ 
      
          $EstadoLineaBucksheet = '4';

       }
       
       if(!is_null($this->input->post('FechaEmbarque')) &&  !is_null($this->input->post('PackingList'))){  
      
       $EstadoLineaBucksheet = '5';


        }


        $memData = array(
          'PurchaseOrderID' => $this->input->post('PurchaseOrderID'),
          'EstadoLineaBucksheet' =>  $EstadoLineaBucksheet,
          'NumeroLinea' => $this->input->post('NumeroLinea'),
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
          'Observacion1' => $this->input->post('Observacion1'),
          'Observacion2' => $this->input->post('Observacion2'),
          'Observacion3' => $this->input->post('Observacion3'),
          'Observacion4' => $this->input->post('Observacion4'),
          'Observacion5' => $this->input->post('Observacion5'),
          'Observacion6' => $this->input->post('Observacion6'),
          'Observacion7' => $this->input->post('Observacion7')
        );

        $response = $this->callexternosbucksheet->updateBuckSheetLinea($memData);
        $data = array();

        if($response){

            $data['resp']        = true;
            $data['mensaje']     = 'Registro actualizado correctamente';
    
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
    $filename = 'bucksheet_'.$PurchaseOrderID.'_'.date('Ymd').date('H:i:s').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
    
    // get data 
    $usersData = $this->callexternosbucksheet->obtieneBucksheet($PurchaseOrderID);
 

    $arrBucksheet = json_decode($usersData);

    
    // file creation 
    $file = fopen('php://output', 'w');
  
    $header = array("PurchaseOrderID",
    "purchaseOrdername",
    "NumeroLinea",
    "SupplierName",
    "EstadoLineaBucksheet",
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
    "Observacion1",
    "Observacion2",
    "Observacion3",
    "Observacion4",
    "Observacion5",
    "Observacion6",
    "Observacion7",
    "created",
    "modified"); 

    fputcsv($file, $header, ';', chr(27));
    
    foreach ($arrBucksheet as $key => $value){ 


      $datos_bucksheet = array(
        'PurchaseOrderID' => $this->callutil->clean_string($value->PurchaseOrderID),
        'purchaseOrdername' => $this->callutil->clean_string($value->purchaseOrdername),
        'EstadoLineaBucksheet' => $this->callutil->clean_string($value->EstadoLineaBucksheet),
        'NumeroLinea' => $this->callutil->clean_string($value->NumeroLinea),
        'SupplierName' => $this->callutil->clean_string($value->SupplierName),
        'ItemST' => $this->callutil->clean_string($value->ItemST),
        'SubItemST' => $this->callutil->clean_string($value->SubItemST),
        'STUnidad' => $this->callutil->clean_string($value->STUnidad),
        'STCantidad' => $this->callutil->clean_string($value->STCantidad),
        'TAGNumber' =>  $this->callutil->clean_string($value->TAGNumber),
        'Stockcode' =>  $this->callutil->clean_string($value->Stockcode),
        'Descripcion' => $this->callutil->clean_string($value->Descripcion),
        'PlanoModelo' =>  $this->callutil->clean_string($value->PlanoModelo),
        'Revision' => $this->callutil->clean_string($value->Revision),
        'PaqueteConstruccionArea' =>  $this->callutil->clean_string($value->PaqueteConstruccionArea),
        'PesoUnitario' => $this->callutil->clean_string($value->PesoUnitario),
        'PesoTotal' => $this->callutil->clean_string($value->PesoTotal),
        'FechaRAS' => $this->callutil->formatoFechaSalida($value->FechaRAS),
        'DiasAntesRAS' => $this->callutil->clean_string($value->DiasAntesRAS),
        'FechaComienzoFabricacion' => $this->callutil->formatoFechaSalida($value->FechaComienzoFabricacion),
        'PAFCF' => $this->callutil->clean_string($value->PAFCF),
        'FechaTerminoFabricacion' => $this->callutil->formatoFechaSalida($value->FechaTerminoFabricacion),
        'PAFTF' => $this->callutil->clean_string($value->PAFTF),
        'FechaGranallado' => $this->callutil->formatoFechaSalida($value->FechaGranallado),
        'PAFG' => $this->callutil->clean_string($value->PAFG),
        'FechaPintura' => $this->callutil->formatoFechaSalida($value->FechaPintura),
        'PAFP' => $this->callutil->clean_string($value->PAFP),
        'FechaListoInspeccion' => $this->callutil->formatoFechaSalida($value->FechaListoInspeccion),
        'PAFLI' => $this->callutil->clean_string($value->PAFLI),
        'ActaLiberacionCalidad' => $this->callutil->clean_string($value->ActaLiberacionCalidad),
        'FechaSalidaFabrica' => $this->callutil->formatoFechaSalida($value->FechaSalidaFabrica),
        'PAFSF' => $this->callutil->clean_string($value->PAFSF),
        'FechaEmbarque' => $this->callutil->formatoFechaSalida($value->FechaEmbarque),
        'PackingList' => $this->callutil->clean_string($value->PackingList),
        'GuiaDespacho' => $this->callutil->clean_string($value->GuiaDespacho),
        'SCNNumber' =>  $this->callutil->clean_string($value->SCNNumber),
        'UnidadesSolicitadas' => $this->callutil->clean_string($value->UnidadesSolicitadas),
        'UnidadesRecibidas' => $this->callutil->clean_string($value->UnidadesRecibidas),
        'MaterialReceivedReport' => $this->callutil->clean_string($value->MaterialReceivedReport),
        'MaterialWithdrawalReport' => $this->callutil->clean_string($value->MaterialWithdrawalReport),
        'Origen' => $this->callutil->clean_string($value->Origen),
        'DiasViaje' => $this->callutil->clean_string($value->DiasViaje),
        'Observacion1' =>  $this->callutil->clean_string($value->Observacion1),
        'Observacion2' =>  $this->callutil->clean_string($value->Observacion2),
        'Observacion3' =>  $this->callutil->clean_string($value->Observacion3),
        'Observacion4' =>  $this->callutil->clean_string($value->Observacion4),
        'Observacion5' =>  $this->callutil->clean_string($value->Observacion5),
        'Observacion6' =>  $this->callutil->clean_string($value->Observacion6),
        'Observacion7' =>  $this->callutil->clean_string($value->Observacion7),
        'created' => $this->callutil->formatoFechaSalida($this->callutil->clean_string($value->created)),
        'modified' => $this->callutil->formatoFechaSalida($this->callutil->clean_string($value->modified))
      );




      fputcsv($file,$datos_bucksheet, ';', chr(27));
    }
    fclose($file); 
    exit; 
   }
      



}
