<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BuckSheet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('CSVReader');
        $this->load->library('CallExternosProyectos');
        $this->load->helper('file');
        $this->load->library('CallExternosBuckSheet');
        
    }

    function listaBucksheet($PurchaseOrderID,$purchaseOrdername){


        $codEmpresa = $this->session->userdata('cod_emp');
        $responseMenuLeft = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
        $json_datosMenuLeft = $responseMenuLeft;
        $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
        $datos['arrClientes'] = $arrayDatosMenu['Clientes'];
        $datos['PurchaseOrderID'] = $PurchaseOrderID;
        $datos['purchaseOrdername'] = $purchaseOrdername;


        $this->load->view('activador/header');
        $this->load->view('activador/navbar');
        $this->load->view('activador/left_menu', $datos);
        $this->load->view('activador/listaBuckSheet',$datos);
        $this->load->view('activador/footer');
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
      
        $error_msg = 'Invalid file, please select only CSV file.';
       
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

               // Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
						



           }
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


        $this->load->view('activador/header');
        $this->load->view('activador/navbar');
        $this->load->view('activador/left_menu', $datos);
        $this->load->view('activador/listaBuckSheet',$datos);
        $this->load->view('activador/footer');
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
}
