<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Consultas extends MY_Controller
{



  public function __construct()
  {
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

    if ($this->session->userdata('logged_in') !== TRUE) {
      redirect('login');
    }
  }



  function consultasDatosWpanel()
  {

    $id_orden_compra = $this->input->post('id_orden_compra');
    $id_cliente = $this->input->post('id_cliente');

    $codEmpresa = $this->session->userdata('cod_emp');
    $countAdverCalidad = 0;
    $countDespachos = 0;
    $countTotalWpanel= 0;
    $fecha_hoy = date_create()->format('Y-m-d');
    $countAtrasados =0;
    $countAdverActivacion = 0;

    //contar advertencias de calidad
      $journal = $this->callexternosjournal->obtienejournal($id_orden_compra,1,$id_cliente);
      $arrJournal = json_decode($journal);     
       if ($arrJournal) {
           foreach ($arrJournal as $key => $value) {
            if($value->cod_tipo_interaccion === '16'){
              $countAdverCalidad++;
            }
            
          }
       }

         //contar advertencias de activacion
      $journalactivacion = $this->callexternosjournal->obtienejournal($id_orden_compra,2,$id_cliente);
      $arrJournalActivacion = json_decode($journalactivacion);     
       if ($arrJournalActivacion) {
           foreach ($arrJournalActivacion as $key => $value) {
            if($value->cod_tipo_interaccion === '14'){
              $countAdverActivacion++;
            }
            
          }
       }


       //contar despachos, atrasos
       
       $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($id_orden_compra);


       $arrBucksheet = json_decode($bucksheet);
   

       if ($arrBucksheet) {
   
         foreach ($arrBucksheet as $key => $value) {
   
          if ($value->lineaActivable==='ACTIVABLE') {

            $countTotalWpanel++;
          }
          if (!empty($value->FechaEmbarque) && !empty($value->PackingList)) {

            $countDespachos++;
          }


        

          if ( $this->callutil->diasDiffFechaswpanel($value->FechaCF,$fecha_hoy) < 0 && $value->PACF == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {

            $countAtrasados++;
          }
  
          if ( $this->callutil->diasDiffFechaswpanel($value->FechaComienzoFabricacion,$fecha_hoy)  < 0 && $value->PAFCF == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {

            $countAtrasados++;
          }

      

          if ($this->callutil->diasDiffFechaswpanel($value->FechaTerminoFabricacion,$fecha_hoy)  < 0 &&  $value->PAFTF == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {
            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FechaPintura,$fecha_hoy) < 0  && $value->PAFP == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FechaListoInspeccion,$fecha_hoy)  < 0  && $value->PAFLI == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FechaGranallado,$fecha_hoy)  < 0  && $value->PAFG == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FechaSalidaFabrica,$fecha_hoy)  < 0  && $value->PAFSF == 'PROGRAMADO' && $value->lineaActivable == 'ACTIVABLE') {

            $countAtrasados++;
          }


          

         }
       } 

      $datos['countAdverActivacion'] = $countAdverActivacion; 
      $datos['countAtrasados'] = $countAtrasados; 
      $datos['countTotalWpanel'] = $countTotalWpanel; 
      $datos['countDespachos'] = $countDespachos;
      $datos['countAdverCalidad'] = $countAdverCalidad;
     
      echo json_encode($datos);
    }

  }

 

 
