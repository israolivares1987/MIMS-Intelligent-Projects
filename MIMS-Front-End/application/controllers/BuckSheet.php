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
        
        $this->load->helper('file');
        $this->load->library('CallUtil');
        
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
                
          $DescripcionProyecto = $valor->nombre_proyecto;

        }

      }

      $responseCliente = $this->callexternosclientes->obtieneCliente($id_cliente);
  
      $arrCliente = json_decode($responseCliente);
     
      $datos_cliente = array();
  
      if($arrCliente){
        
        foreach ($arrCliente as $key => $value) {
  

            $nombreCliente =  $value->nombreCliente;
            $razonSocial  =   $value->razonSocial;
          
        }
      }
    
     


  
        $datos['PurchaseOrderID'] = $PurchaseOrderID;
        $datos['PurchaseOrderDescription'] = $PurchaseOrderDescription;
        $datos['idCliente'] = $id_cliente;
        $datos['codProyecto'] = $id_proyecto;
        $datos['DescripcionProyecto'] = $DescripcionProyecto;
        $datos['nombreCliente'] = $nombreCliente;
        $datos['razonSocial'] = $razonSocial;
        $datos['PurchaseOrderNumber'] = $PurchaseOrderNumber;
        

        $this->plantilla_activador('activador/listaBuckSheet', $datos);

  }

 }


    public function save($PurchaseOrderID,$purchaseOrdername) {

    $data = array();
    $memData = array();
    $success_msg="";
    $error_msg = "";
    $insertCount = 0;
    $updateCount = 0;
    $rowCount = 0; 


    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');

    if($this->form_validation->run() == false) {
      
        $error_msg = 'Archivo invalido, favor seleccionar archivo CSV.';
       
    } else {
       // If file uploaded
       if(is_uploaded_file($_FILES['fileURL']['tmp_name'])) {                            
           // Parse data from CSV file
           $csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);            
           // create array from CSV file
           if(!empty($csvData)){

               foreach($csvData as $row){  
                $rowCount++;

                $memData = array(
                    'PurchaseOrderID' => $PurchaseOrderID,
                    'purchaseOrdername' => urldecode($purchaseOrdername),
                    'NumeroLinea' => $row['NumeroLinea'],
                    'ItemST' => $row['ItemST'],
                    'SubItemST' => $row['SubItemST'],
                    'STUnidad' => $row['STUnidad'],
                    'STCantidad' => $row['STCantidad'],
                    'TAGNumber' => $row['TAGNumber'],
                    'Stockcode' => $row['Stockcode'],
                    'Descripcion' => $row['Descripcion'],
                    'PlanoModelo' => $row['PlanoModelo'],
                    'Revision ' => $row['Revision '],
                    'PaqueteConstruccionArea' => $row['PaqueteConstruccionArea'],
                    'PesoUnitario' => $row['PesoUnitario'],
                    'PesoTotal' => $row['PesoTotal'],
                    'FechaRAS' => $row['FechaRAS'],
                    'DiasAntesRAS' => $row['DiasAntesRAS'],
                    'FechaComienzoFabricacion' => $row['FechaComienzoFabricacion'],
                    'PAFCF' => $row['PAFCF'],
                    'FechaTerminoFabricacion' => $row['FechaTerminoFabricacion'],
                    'PAFTF' => $row['PAFTF'],
                    'FechaGranallado' => $row['FechaGranallado'],
                    'PAFG' => $row['PAFG'],
                    'FechaPintura' => $row['FechaPintura'],
                    'PAFP' => $row['PAFP'],
                    'FechaListoInspeccion' => $row['FechaListoInspeccion'],
                    'PAFLI' => $row['PAFLI'],
                    'ActaLiberacionCalidad' => $row['ActaLiberacionCalidad'],
                    'FechaSalidaFabrica' => $row['FechaSalidaFabrica'],
                    'PAFSF' => $row['PAFSF'],
                    'FechaEmbarque' => $row['FechaEmbarque'],
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
                
                    // Check whether register already exists in the database
                    
                    $prevCount = $this->callexternosbucksheet->getRows($PurchaseOrderID,$row['NumeroLinea']); 
                                        
                    if($prevCount > 0){
                        // Update member data
                       
                        $update = $this->callexternosbucksheet->update($memData,$PurchaseOrderID,$row['NumeroLinea']);
                        
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
                
               }

           }


            // Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'BuckSheet importado correctamente. Total registros ('.$rowCount.') | Insertados ('.$insertCount.') | Actualizados('.$updateCount.') | No insertados ('.$notAddCount.')';


       }

    }

        $codEmpresa = $this->session->userdata('cod_emp');
        $responseMenuLeft = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
        $json_datosMenuLeft = $responseMenuLeft;
        $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
        $datos['arrClientes'] = $arrayDatosMenu['Clientes'];
        $datos['PurchaseOrderID'] = $PurchaseOrderID;
        $datos['purchaseOrdername'] = $purchaseOrdername;
        $datos['error_msg'] = $error_msg;
        $datos['success_msg'] = $successMsg;


        $this->plantilla_activador('activador/listaBuckSheet', $datos);

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
    
    // export Data
    public function exportData() {
        $storData = array();
        $metaData[] = array('firstname' => 'FirstName', 'lastname' => 'LastName', 'email' => 'Email', 'phone' => 'Phone', 'status' => 'Status');       
        $this->customer->setStatus(1);
        $customerInfo = $this->customer->getcustomerList(); 
        foreach($customerInfo as $key=>$row) {
            $storData[] = array(
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'status' => $row['status'],
            );
        }
        $data = array_merge($metaData,$storData);
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"csv-sample-customer".".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        foreach ($data as $data) {
            fputcsv($handle, $data);
        }
            fclose($handle);
        exit;
    }

    function obtieneBucksheet($PurchaseOrderID){


        $response = $this->callexternosbucksheet->obtieneBucksheet($PurchaseOrderID);
        echo $response;
  
  
      }

      function obtieneBucksheetDet($PurchaseOrderID,$NumeroLinea)
      {


        $response = $this->callexternosbucksheet->obtieneBucksheetDet($PurchaseOrderID,$NumeroLinea);
        echo $response;
  
  
      }


      function updateBuckSheet()
      {

        $memData = array(
          'PurchaseOrderID' => $this->input->post('PurchaseOrderID'),
          'NumeroLinea' => $this->input->post('numeroLinea'),
          'STCantidad' => $this->input->post('STCantidad'),
          'TAGNumber' => $this->input->post('TAGNumber'),
          'Stockcode' => $this->input->post('Stockcode'),
          'Descripcion' => $this->input->post('Descripcion'),
          'PlanoModelo' => $this->input->post('PlanoModelo'),
          'Revision ' => $this->input->post('Revision'),
          'PaqueteConstruccionArea' => $this->input->post('PaqueteConstruccionArea'),
          'PesoUnitario' => $this->input->post('PesoUnitario'),
          'PesoTotal' => $this->input->post('PesoTotal'),
          'FechaRAS' => $this->input->post('FechaRAS'),
          'DiasAntesRAS' => $this->input->post('DiasAntesRAS'),
          'FechaComienzoFabricacion' => $this->input->post('FechaComienzoFabricacion'),
          'PAFCF' => $this->input->post('PAFCF'),
          'FechaTerminoFabricacion' => $this->input->post('FechaTerminoFabricacion'),
          'PAFTF' => $this->input->post('PAFTF'),
          'FechaGranallado' => $this->input->post('FechaGranallado'),
          'PAFG' => $this->input->post('PAFG'),
          'FechaPintura' => $this->input->post('FechaPintura'),
          'PAFP' => $this->input->post('PAFP'),
          'FechaListoInspeccion' => $this->input->post('FechaListoInspeccion'),
          'PAFLI' => $this->input->post('PAFLI'),
          'ActaLiberacionCalidad' => $this->input->post('ActaLiberacionCalidad'),
          'FechaSalidaFabrica' => $this->input->post('FechaSalidaFabrica'),
          'PAFSF' => $this->input->post('PAFSF'),
          'FechaEmbarque' => $this->input->post('FechaEmbarque'),
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

        $response = $this->callexternosbucksheet->updateBuckSheetLinea($memData,$this->input->post('PurchaseOrderID'),$this->input->post('numeroLinea'));
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



      



}
