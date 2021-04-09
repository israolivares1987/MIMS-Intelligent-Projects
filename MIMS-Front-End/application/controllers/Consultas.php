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
    $this->load->library('CallUtil');
    $this->load->library('CallExternosOrdenesItem');
    $this->load->library('CallExternosOrdenes');
    $this->load->helper('file');
    $this->load->helper('url');

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
            if($value->cod_tipo_interaccion === '16' && $value->id_interaccion_ref === '0' ){
              $countAdverCalidad++;
            }
            
          }
       }

         //contar advertencias de activacion
      $journalactivacion = $this->callexternosjournal->obtienejournal($id_orden_compra,2,$id_cliente);
      $arrJournalActivacion = json_decode($journalactivacion);     
       if ($arrJournalActivacion) {
           foreach ($arrJournalActivacion as $key => $value) {
            if($value->cod_tipo_interaccion === '14' && $value->id_interaccion_ref === '0'){
              $countAdverActivacion++;
            }
            
          }
       }


       //contar despachos, atrasos
       
       $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($codEmpresa,$id_orden_compra);


       $arrBucksheet = json_decode($bucksheet);
   

       if ($arrBucksheet) {
   
         foreach ($arrBucksheet as $key => $value) {
   
          if ($value->TIPO_DE_LINEA==='ACTIVABLE') {

            $countTotalWpanel++;
          }
          if (!empty($value->FECHA_EMBARQUE) && !empty($value->PACKINGLIST)) {

            $countDespachos++;
          }


        

          if ( $this->callutil->diasDiffFechaswpanel($value->FECHA_TCF,$fecha_hoy) < 0 && $value->PA_TCF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }
  
          if ( $this->callutil->diasDiffFechaswpanel($value->FECHA_COMIENZO_FABRICACION,$fecha_hoy)  < 0 && $value->PA_FCF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

      

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_TERMINO_FABRICACION,$fecha_hoy)  < 0 &&  $value->PA_FTF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {
            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_PINTURA,$fecha_hoy) < 0  && $value->PA_FP == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_LISTO_INSPECCION,$fecha_hoy)  < 0  && $value->PA_FLI == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_GRANALLADO,$fecha_hoy)  < 0  && $value->PA_FG == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_SALIDA_FABRICA,$fecha_hoy)  < 0  && $value->PA_FSF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

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


    function obtieneTotalesBodega()
    {
  
      $proyecto = $this->input->post('id_proyecto');
      $id_cliente = $this->input->post('id_cliente');
      $codEmpresa = $this->session->userdata('cod_emp');

      $cantidadRR = 0;
      $cantidadRE = 0;
      $cantidadExb= 0;
      $cantidadEI =0;
      $sumaviajes = 0;
      $cantGuias = 0;
      $canGuiasSR = 0;


      //contar advertencias de Bodega
        $countBodega = $this->callexternosconsultas->obtieneTotalesBodega($codEmpresa,$id_cliente,$proyecto);
        $arrcountBodega = json_decode($countBodega);  

         if ($arrcountBodega) {
             foreach ($arrcountBodega as $key => $value) {

              $cantidadRR = $value->cantidadRR;
              $cantidadRE = $value->cantidadRE;
              $cantidadExb= $value->cantidadExb;
              $cantidadEI = $value->cantidadEI;
              $sumaviajes = $value->sumaviajes;
              $cantGuias  = $value->cantGuias;
              $canGuiasSR = $value->canGuiasSR;
                      
            
            }
              
            }
         
  
           
  
        $datos['cantidadRR'] = $cantidadRR; 
        $datos['cantidadRE'] = $cantidadRE; 
        $datos['cantidadExb'] = $cantidadExb; 
        $datos['cantidadEI'] = $cantidadEI;
        $datos['sumaviajes'] = $sumaviajes;
        $datos['cantGuias'] = $cantGuias;
        $datos['canGuiasSR'] = $canGuiasSR;
       
        echo json_encode($datos);
      }





    function obtieneSelect(){
    
      $codEmpresa = $this->session->userdata('cod_emp');
      $idOrden = $this->input->post('id_orden_compra');
      $tipo = $this->input->post('tipo');
      $idCliente = $this->input->post('id_cliente');
      $data = array();
    
      $data['select_cc_ref']  = $this->obtiene_select_journal_advertencia('id_interaccion_ref',$idOrden,$tipo,$idCliente);
    
    
      echo json_encode($data);
    
    }


    function obtiene_select_journal_advertencia($nameId,$idOrden,$tipo,$idCliente){
    
      $datosap_ref     =  $this->callexternosjournal->obtienejournalAdvertencias($idOrden,$tipo,$idCliente);
      $datosap_refArray = json_decode($datosap_ref);
      $html = '';

      $html .= '<select name="'.$nameId.'" class="form-control form-control-sm" id="'.$nameId.'" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">'; 

      if($datosap_refArray){

        $seleccionado = '';

        foreach ($datosap_refArray as $key => $value) {

          $html .= '<option '.$seleccionado.' value="'.$value->id_interaccion.'">'.$value->tipo_interaccion.'</option>';
        }

      }else{
        $html .= '<option value="">No existen Advertencias de Calidad</option>';
      }

      $html .= '</select>';
      return $html;
    
    }

    
    function obtiene_select_supplier($codEmpresa, $nameId, $selected = 0){
    
          $supplier = $this->callexternosproveedores->obtieneSupplier($codEmpresa);
          $datosSupplier = json_decode($supplier);
          $html = '';
    
          $html .= '<select name="'.$nameId.'" class="form-control form-control-sm" id="'.$nameId.'">'; 
    
          if($datosSupplier){
    
            $seleccionado = '';
    
            foreach ($datosSupplier as $key => $value) {
    
              if($selected > 0){
                $seleccionado = ($selected == $value->SupplierName) ? 'selected' : '';
              }
    
              $html .= '<option '.$seleccionado.' value="'.$value->SupplierName.'">'.$value->SupplierName.'</option>';
            }
    
          }else{
            $html .= '<option value="0">No existen Proveedores</option>';
          }
    
          $html .= '</select>';
          return $html;
    }
    
    function obtiene_select_employee($codEmpresa, $nameId, $selected = 0){
    
          $employee = $this->callexternosempleados->listaActivadores($codEmpresa);
    
          $datosEmployee = json_decode($employee);
          $html = '';
    
          $html .= '<select name="'.$nameId.'" class="form-control form-control-sm" id="'.$nameId.'">'; 
    
          if($datosEmployee){
    
            $seleccionado = '';
    
            foreach ($datosEmployee as $key => $value) {
    
              if($selected > 0){
                $seleccionado = ($selected == $value->cod_user) ? 'selected' : '';
              }
    
              $html .= '<option value="'.$value->cod_user.'">'.$value->nombres.' '.$value->paterno.'</option>';
            }
          }else{
            $html .= '<option value="0">No existen Activadores</option>';
          }
    
          $html .= '</select>';
          return $html;
    }
    
    function obtiene_select_def($id, $domain, $name){
    
          $def  = $this->callexternosdominios->obtieneDatosRef($domain);
          $html = '';
    
          $datosdef = json_decode($def);
    
          $html .= '<select name="'.$name.'" class="form-control form-control-sm" id="'.$id.'">';
          
          if($datosdef){
            foreach ($datosdef as $key => $value) {
              $html .= '<option value="'.$value->domain_id.'">'.$value->domain_desc.'</option>';
            }
          }else{
            $html .= '<option value="0">No existen datos</option>';
          }
    
          $html .= '</select>';
    
          return $html;
    
    }
    
    function obtiene_select_def_act($inputId,$selected,$domain){
      
      $def  = $this->callexternosdominios->obtieneDatosRef($domain);
      $html = '';
    
      $datosdef = json_decode($def);
    
      $html .= '<select name="'.$inputId.'" class="form-control form-control-sm" id="'.$inputId.'">';
      
      if($datosdef){
        foreach ($datosdef as $key => $value) {
    
          $seleccionado = ($selected == $value->domain_id) ? 'selected' : '';        
    
          $html .= '<option '.$seleccionado.' value="'.$value->domain_id.'">'.$value->domain_desc.'</option>';
        }
      }else{
        $html .= '<option value="0">No existen datos</option>';
      }
    
      $html .= '</select>';
    
      return $html;
    
    }



  }

 

 
