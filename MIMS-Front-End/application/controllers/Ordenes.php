<?php
class Ordenes extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosBuckSheet');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosProveedores');
    $this->load->library('CallExternosOrdenesItem');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosOrdenes');
        $this->load->library('form_validation');
    $this->load->helper('file');
    $this->load->library('CallExternosBitacora');
    
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

 
  }

  function obtieneOrdenes(){

    $idCliente       = $this->input->post('idCliente');
    $idProyecto      = $this->input->post('idProyecto');
    $codEmpresa       = $this->session->userdata('cod_emp');

    $respuesta = false;

    $ordenes = $this->callexternosordenes->obtieneOrdenes($idProyecto,$idCliente,$codEmpresa);

    $arrOrdenes = json_decode($ordenes);
 

          $datos_ordenes = array();

          if($arrOrdenes){
            $respuesta = true;
            
            foreach ($arrOrdenes as $key => $value) {

              $Support = '';

              if(strlen($value->Support) > 0 && $value->Support !='null'  ){
                $Support = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/ordenes/'.$value->Support.'" download="'.$value->Support_original.'"><i class="fas fa-download"></i> Descarga</a>';
              }else{
                $Support = '';
              }

              if(strcmp($value->Categorizacion, 'PAQUETE DE COMPRA') !== 0){
                             
               
              $datos_ordenes[] = array('codEmpresa' => $value->codEmpresa,
                'PurchaseOrderID' => $value->PurchaseOrderID,
                'Criticidad' => $this->callutil->cambianull($value->Criticidad),
                'idRequerimiento' => $value->idRequerimiento,
                'PurchaseOrderNumber'   => $this->callutil->cambianull($value->PurchaseOrderNumber),
                'Categorizacion'  => $value->Categorizacion,
                'PurchaseOrderDescription'   => $this->callutil->cambianull($value->PurchaseOrderDescription),
                'Revision'   => $value->Revision,
                'nombreCliente'   => $this->callutil->cambianull($value->nombreCliente),
                'SupplierName' => $this->callutil->cambianull($value->SupplierName),
                'ExpediterID'   => $value->ExpediterID,
                'EstadoPlano'   =>$this->callutil->cambianull($value->EstadoPlano),
                'ObservacionesEp'   => $this->callutil->cambianull($value->ObservacionesEp),
                'Requestor'   => $this->callutil->cambianull($value->Requestor),
                'Comprador'   => $this->callutil->cambianull($value->Comprador),
                'Currency'   => $value->Currency,
                'ValorNeto'   => $this->callutil->formatoDinero($value->ValorNeto),
                'ValorTotal'   => $this->callutil->formatoDinero($value->ValorTotal),
                'Budget'   => $this->callutil->formatoDinero($value->Budget),
                'CostCodeBudget'   => $this->callutil->cambianull($value->CostCodeBudget),
                'OrderDate'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->OrderDate)),
                'DateRequired'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DateRequired)),
                'DateEta'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DateEta)),
                'DatePromised'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DatePromised)),
                'ShipDate'   => $this->callutil->formatoFechaSalida($value->ShipDate),
                'ShippingMethodID'   => $this->callutil->cambianull($value->ShippingMethodID),
                'DateCreated'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DateCreated)),
                "POStatus" => $this->callutil->cambianull($value->POStatus),
                'Support' =>  $Support,
                'NombreProyecto' => $this->callutil->cambianull($value->NombreProyecto),
                'DescripcionProyecto' => $this->callutil->cambianull($value->DescripcionProyecto),
                'TipoCambio' => $this->callutil->formatoDinero($value->TipoCambio),
                'ValorNetoUsd' => $this->callutil->formatoDineroDecimalUSD($value->ValorNetoUsd),
                'FechaAdjudicadaProgramada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicadaProgramada)),
                'FechaAdjudicada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicada)),
                'Tiempo_Ejecución' => $this->callutil->cambianull($value->Tiempo_Ejecución),
                'Dias_a_Hoy' => $this->callutil->cambianull($value->Dias_a_Hoy),
                'Avance_Esperado' => $this->callutil->cambianull($value->Avance_Esperado),
                'fecha_hoy' => $this->callutil->cambianull($value->fecha_hoy),
                'Avance_Real' => $this->callutil->cambianull($value->Avance_Real),
                'Alerta' => $this->callutil->cambianull($value->Alerta)
              );
            }
            
          

            }
          }


						

        $datos['ordenes'] = $datos_ordenes;
        $datos['resp']    = $respuesta;

        echo json_encode($datos);
    

  }


  function obtieneOrdenesPaq(){

    $idCliente       = $this->input->post('idCliente');
    $idProyecto      = $this->input->post('idProyecto');
    $codEmpresa       = $this->session->userdata('cod_emp');

    $respuesta = false;

    $ordenes = $this->callexternosordenes->obtieneOrdenes($idProyecto,$idCliente,$codEmpresa);

    $arrOrdenes = json_decode($ordenes);
 

          $datos_ordenes = array();

          if($arrOrdenes){
            $respuesta = true;
            
            foreach ($arrOrdenes as $key => $value) {

              $Support = '';

              if(strlen($value->Support) > 0 && $value->Support !='null'  ){
                $Support = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/ordenes/'.$value->Support.'" download="'.$value->Support_original.'"><i class="fas fa-download"></i> Descarga</a>';
              }else{
                $Support = '';
              }

              if(strcmp($value->Categorizacion, 'PAQUETE DE COMPRA') === 0){
                             
              $datos_ordenes[] = array('codEmpresa' => $value->codEmpresa,
                'PurchaseOrderID' => $value->PurchaseOrderID,
                'Criticidad' => $this->callutil->cambianull($value->Criticidad),
                'idRequerimiento' => $value->idRequerimiento,
                'PurchaseOrderNumber'   => $this->callutil->cambianull($value->PurchaseOrderNumber),
                'Categorizacion'  => $value->Categorizacion,
                'PurchaseOrderDescription'   => $this->callutil->cambianull($value->PurchaseOrderDescription),
                'Revision'   => $value->Revision,
                'nombreCliente'   => $this->callutil->cambianull($value->nombreCliente),
                'SupplierName' => $this->callutil->cambianull($value->SupplierName),
                'ExpediterID'   => $value->ExpediterID,
                'EstadoPlano'   =>$this->callutil->cambianull($value->EstadoPlano),
                'ObservacionesEp'   => $this->callutil->cambianull($value->ObservacionesEp),
                'Requestor'   => $this->callutil->cambianull($value->Requestor),
                'Comprador'   => $this->callutil->cambianull($value->Comprador),
                'Currency'   => $value->Currency,
                'ValorNeto'   => $this->callutil->formatoDinero($value->ValorNeto),
                'ValorTotal'   => $this->callutil->formatoDinero($value->ValorTotal),
                'Budget'   => $this->callutil->formatoDinero($value->Budget),
                'CostCodeBudget'   => $this->callutil->cambianull($value->CostCodeBudget),
                'OrderDate'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->OrderDate)),
                'DateRequired'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DateRequired)),
                'DateEta'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DateEta)),
                'DatePromised'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DatePromised)),
                'ShipDate'   => $this->callutil->formatoFechaSalida($value->ShipDate),
                'ShippingMethodID'   => $this->callutil->cambianull($value->ShippingMethodID),
                'DateCreated'   => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->DateCreated)),
                "POStatus" => $this->callutil->cambianull($value->POStatus),
                'Support' =>  $Support,
                'NombreProyecto' => $this->callutil->cambianull($value->NombreProyecto),
                'DescripcionProyecto' => $this->callutil->cambianull($value->DescripcionProyecto),
                'TipoCambio' => $this->callutil->formatoDinero($value->TipoCambio),
                'ValorNetoUsd' => $this->callutil->formatoDineroDecimalUSD($value->ValorNetoUsd),
                'FechaAdjudicadaProgramada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicadaProgramada)),
                'FechaAdjudicada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicada)),
                'Tiempo_Ejecución' => $this->callutil->cambianull($value->Tiempo_Ejecución),
                'Dias_a_Hoy' => $this->callutil->cambianull($value->Dias_a_Hoy),
                'Avance_Esperado' => $this->callutil->cambianull($value->Avance_Esperado),
                'fecha_hoy' => $this->callutil->cambianull($value->fecha_hoy),
                'Avance_Real' => $this->callutil->cambianull($value->Avance_Real),
                'Alerta' => $this->callutil->cambianull($value->Alerta)
              );
            }



            }
          }


						

        $datos['ordenes'] = $datos_ordenes;
        $datos['resp']    = $respuesta;

        echo json_encode($datos);
    

  }



  function obtieneOrdenesActivador(){

    $idCliente       = $this->input->post('idCliente');
    $idProyecto      = $this->input->post('idProyecto');
    $codActivador      = $this->input->post('codActivador');
    $codEmpresa       = $this->session->userdata('cod_emp');

    $respuesta = false;

    $ordenes = $this->callexternosordenes->obtieneOrdenesActivador($idCliente,$idProyecto, $codActivador,$codEmpresa);

    $arrOrdenes = json_decode($ordenes);
 

          $datos_ordenes = array();

          if($arrOrdenes){
            $respuesta = true;
            
            foreach ($arrOrdenes as $key => $value) {

              $Support = '';

              if(strlen($value->Support) > 0 && $value->Support !='null'  ){
                $Support = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/ordenes/'.$value->Support.'" download="'.$value->Support_original.'"><i class="fas fa-download"></i> Descarga</a>';
              }else{
                $Support = '';
              }

    
              if(strcmp($value->Categorizacion, 'PAQUETE DE COMPRA') !== 0){

              $datos_ordenes[] = array('codEmpresa' => $value->codEmpresa,
                'PurchaseOrderID' => $value->PurchaseOrderID,
                'Criticidad' => $this->callutil->cambianull($value->Criticidad),
                'idRequerimiento' => $value->idRequerimiento,
                'PurchaseOrderNumber'   => $value->PurchaseOrderNumber,
                'Categorizacion'  => $value->Categorizacion,
                'PurchaseOrderDescription'   => $value->PurchaseOrderDescription,
                'Revision'   => $value->Revision,
                'nombreCliente'   => $value->nombreCliente,
                "SupplierName" => $value->SupplierName,
                'ExpediterID'   => $value->ExpediterID,
                'EstadoPlano'   =>$this->callutil->cambianull($value->EstadoPlano),
                'ObservacionesEp'   => $this->callutil->cambianull($value->ObservacionesEp),
                'Requestor'   => $value->Requestor,
                'Comprador'   => $value->Comprador,
                'Currency'   => $value->Currency,
                'ValorNeto'   => $this->callutil->formatoDinero($value->ValorNeto),
                'ValorTotal'   => $this->callutil->formatoDinero($value->ValorTotal),
                'Budget'   => $this->callutil->formatoDinero($value->Budget),
                'CostCodeBudget'   => $value->CostCodeBudget,
                'OrderDate'   => $this->callutil->formatoFechaSalida($value->OrderDate),
                'DateRequired'   => $this->callutil->formatoFechaSalida($value->DateRequired),
                'DateEta'   => $this->callutil->formatoFechaSalida($value->DateEta),
                'DatePromised'   => $this->callutil->formatoFechaSalida($value->DatePromised),
                'ShipDate'   => $this->callutil->formatoFechaSalida($value->ShipDate),
                'ShippingMethodID'   => $this->callutil->cambianull($value->ShippingMethodID),
                'DateCreated'   => $this->callutil->formatoFechaSalida($value->DateCreated),
                "POStatus" => $this->callutil->cambianull($value->POStatus),
                'Support' =>  $Support,
                "NombreProyecto" => $this->callutil->cambianull($value->NombreProyecto),
                "DescripcionProyecto" => $this->callutil->cambianull($value->DescripcionProyecto),
                'TipoCambio' => $this->callutil->formatoDinero($value->TipoCambio),
                'ValorNetoUsd' => $this->callutil->formatoDineroDecimalUSD($value->ValorNetoUsd),
                'FechaAdjudicadaProgramada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicadaProgramada)),
                'FechaAdjudicada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicada)),
                'Tiempo_Ejecución' => $this->callutil->cambianull($value->Tiempo_Ejecución),
                'Dias_a_Hoy' => $this->callutil->cambianull($value->Dias_a_Hoy),
                'Avance_Esperado' => $this->callutil->cambianull($value->Avance_Esperado),
                'fecha_hoy' => $this->callutil->cambianull($value->fecha_hoy),
                'Avance_Real' => $this->callutil->cambianull($value->Avance_Real),
                'Alerta' => $this->callutil->cambianull($value->Alerta)
              );
            }

            }
          }


						

        $datos['ordenes'] = $datos_ordenes;
        $datos['resp']    = $respuesta;

        echo json_encode($datos);
    

  }


  function obtieneOrdenesActivadorPaq(){

    $idCliente       = $this->input->post('idCliente');
    $idProyecto      = $this->input->post('idProyecto');
    $codActivador      = $this->input->post('codActivador');
    $codEmpresa       = $this->session->userdata('cod_emp');

    $respuesta = false;

    $ordenes = $this->callexternosordenes->obtieneOrdenesActivador($idCliente,$idProyecto, $codActivador,$codEmpresa);

    $arrOrdenes = json_decode($ordenes);
 

          $datos_ordenes = array();

          if($arrOrdenes){
            $respuesta = true;
            
            foreach ($arrOrdenes as $key => $value) {

              $Support = '';

              if(strlen($value->Support) > 0 && $value->Support !='null'  ){
                $Support = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/ordenes/'.$value->Support.'" download="'.$value->Support_original.'"><i class="fas fa-download"></i> Descarga</a>';
              }else{
                $Support = '';
              }

    
              if(strcmp($value->Categorizacion, 'PAQUETE DE COMPRA') == 0){

              $datos_ordenes[] = array('codEmpresa' => $value->codEmpresa,
                'PurchaseOrderID' => $value->PurchaseOrderID,
                'Criticidad' => $this->callutil->cambianull($value->Criticidad),
                'idRequerimiento' => $value->idRequerimiento,
                'PurchaseOrderNumber'   => $value->PurchaseOrderNumber,
                'Categorizacion'  => $value->Categorizacion,
                'PurchaseOrderDescription'   => $value->PurchaseOrderDescription,
                'Revision'   => $value->Revision,
                'nombreCliente'   => $value->nombreCliente,
                "SupplierName" => $value->SupplierName,
                'ExpediterID'   => $value->ExpediterID,
                'EstadoPlano'   =>$this->callutil->cambianull($value->EstadoPlano),
                'ObservacionesEp'   => $this->callutil->cambianull($value->ObservacionesEp),
                'Requestor'   => $value->Requestor,
                'Comprador'   => $value->Comprador,
                'Currency'   => $value->Currency,
                'ValorNeto'   => $this->callutil->formatoDinero($value->ValorNeto),
                'ValorTotal'   => $this->callutil->formatoDinero($value->ValorTotal),
                'Budget'   => $this->callutil->formatoDinero($value->Budget),
                'CostCodeBudget'   => $value->CostCodeBudget,
                'OrderDate'   => $this->callutil->formatoFechaSalida($value->OrderDate),
                'DateRequired'   => $this->callutil->formatoFechaSalida($value->DateRequired),
                'DateEta'   => $this->callutil->formatoFechaSalida($value->DateEta),
                'DatePromised'   => $this->callutil->formatoFechaSalida($value->DatePromised),
                'ShipDate'   => $this->callutil->formatoFechaSalida($value->ShipDate),
                'ShippingMethodID'   => $this->callutil->cambianull($value->ShippingMethodID),
                'DateCreated'   => $this->callutil->formatoFechaSalida($value->DateCreated),
                "POStatus" => $this->callutil->cambianull($value->POStatus),
                'Support' =>  $Support,
                "NombreProyecto" => $this->callutil->cambianull($value->NombreProyecto),
                "DescripcionProyecto" => $this->callutil->cambianull($value->DescripcionProyecto),
                'TipoCambio' => $this->callutil->formatoDinero($value->TipoCambio),
                'ValorNetoUsd' => $this->callutil->formatoDineroDecimalUSD($value->ValorNetoUsd),
                'FechaAdjudicadaProgramada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicadaProgramada)),
                'FechaAdjudicada' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FechaAdjudicada)),
                'Tiempo_Ejecución' => $this->callutil->cambianull($value->Tiempo_Ejecución),
                'Dias_a_Hoy' => $this->callutil->cambianull($value->Dias_a_Hoy),
                'Avance_Esperado' => $this->callutil->cambianull($value->Avance_Esperado),
                'fecha_hoy' => $this->callutil->cambianull($value->fecha_hoy),
                'Avance_Real' => $this->callutil->cambianull($value->Avance_Real),
                'Alerta' => $this->callutil->cambianull($value->Alerta)
              );
            }
            }
          }


						

        $datos['ordenes'] = $datos_ordenes;
        $datos['resp']    = $respuesta;

        echo json_encode($datos);
    

  }





  function guardaOrden(){




    $or_purchase_order    = $this->input->post('or_purchase_order');
    $or_criticidad      = $this->input->post('or_select_criticidad');
    $or_idrequerimiento      = $this->input->post('or_idrequerimiento');
    $or_select_categorizacion    = $this->input->post('or_select_categorizacion');
    $or_purchase_desc     = $this->input->post('or_purchase_desc');
    $or_revision = $this->input->post('or_revision');
    $or_select_supplier   = $this->input->post('or_select_supplier');
    
    $or_estado_plano   = $this->input->post('or_estado_plano');
    $or_observacion_ep   = $this->input->post('or_observacion_ep');
  
    $or_select_employee   = $this->input->post('or_select_employee');
    $or_select_currency   = $this->input->post('or_select_currency');
    $or_requestor         = $this->input->post('or_requestor');
    $or_valor_neto        = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_valor_neto'));
    $or_valor_total       = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_valor_total'));
    $or_budget            = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_budget'));
    $or_costcodebudget    = $this->input->post('or_costcodebudget');
    $or_comprador         = $this->input->post('or_comprador');
    $or_order_date        = date('Y-m-d', strtotime($this->input->post('or_order_date')));
    $or_date_required     = date('Y-m-d', strtotime($this->input->post('or_date_required')));
    $or_date_eta     = date('Y-m-d', strtotime($this->input->post('or_date_eta')));
    
    $or_date_promised     = date('Y-m-d', strtotime($this->input->post('or_date_promised')));
    $or_ship_date         = date('Y-m-d', strtotime($this->input->post('or_ship_date')));
    $or_select_shipping   = $this->input->post('or_select_shipping');
    $or_select_status     = $this->input->post('or_select_status');
    $id_proyecto_or       = $this->input->post('id_proyecto_or');
    $id_cliente_or       = $this->input->post('id_cliente');


    $or_tipo_cambio = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_tipo_cambio'));
   
    $or_fecha_adjudicada_programada = date('Y-m-d', strtotime($this->input->post('or_fecha_adjudicada_programada')));
    $or_fecha_adjudicada= date('Y-m-d', strtotime($this->input->post('or_fecha_adjudicada')));


    if ($or_valor_neto > 0 && $or_tipo_cambio > 0){

  
      $or_valor_neto_usd = $this->callutil->num_format(($or_valor_neto / $or_tipo_cambio),2);
                            
    }else {
      $or_valor_neto_usd = 0;
    }





    $path_completo = '';
    $codEmpresa       = $this->session->userdata('cod_emp');
    $target_path = $this->config->item('BASE_ARCHIVOS')."ordenes/";
    $error_msg = '';
    $resp =  false;

    $nameArchivo = 'or_support';


    $this->form_validation->set_rules($nameArchivo, 'Upload File', 'callback_checkFileValidation');



    if($this->form_validation->run() == false) {
      
        $error_msg = 'Archivo invalido, favor seleccionar archivo soportado.';
        $resp =  false;
       
    } else {
 
        if(is_uploaded_file($_FILES['or_support']['tmp_name'])) {   


          /* create new name file */
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $respaldo_original = $_FILES["or_support"]["name"];
          $extension  = pathinfo( $_FILES["or_support"]["name"], PATHINFO_EXTENSION ); // jpg
          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

          $source       = $_FILES['or_support']['tmp_name'];
          $destination  = $target_path . $basename; 
          /* move the file */


          if(move_uploaded_file( $source, $destination )) {
             
            
            // Comienzo Insert

            $respaldo = $basename;



            #arreglo para insert

                $data = array(
                  'codEmpresa'                => $codEmpresa,
                  'idCliente'                 => $id_cliente_or,
                  'idProyecto'                => $id_proyecto_or,
                  'PurchaseOrderNumber'       => $or_purchase_order,
                  'Criticidad'                => $or_criticidad,
                  'idRequerimiento'           => $or_idrequerimiento,
                  'Categorizacion'           =>  $or_select_categorizacion,
                  'PurchaseOrderDescription'  => $or_purchase_desc,
                  'Revision'                  => $or_revision,
                  'SupplierName'                => $or_select_supplier,
                  'EstadoPlano' => $or_estado_plano ,
                  'ObservacionesEp' => $or_observacion_ep,
                  'Comprador'            => $or_comprador,
                  'ExpediterID'                => $or_select_employee,
                  'Requestor'        => $or_requestor,
                  'Currency'                  => $or_select_currency,
                  'ValorNeto'                 => $or_valor_neto,
                  'ValorTotal'                => $or_valor_total,
                  'Budget'                    => $or_budget,
                  'CostCodeBudget'            =>$or_costcodebudget ,
                  'OrderDate'                 => $or_order_date,
                  'DateRequired'              => $or_date_required,
                  'DateEta'                   => $or_date_eta,
                  'DatePromised'              => $or_date_promised,
                  'ShipDate'                  => $or_ship_date,
                  'ShippingMethodID'          => $or_select_shipping,
                  'DateCreated'               => date('Y-m-d'),
                  'POStatus'                  => $or_select_status,
                  'Support'                   => $respaldo,
                  'Support_original'          => $respaldo_original,
                  'TipoCambio' => $or_tipo_cambio ,
                  'ValorNetoUsd' => $or_valor_neto_usd ,
                  'FechaAdjudicadaProgramada' => $or_fecha_adjudicada_programada ,
                  'FechaAdjudicada' => $or_fecha_adjudicada
                );

                $ordenes    = $this->callexternosordenes->guardaOrden($data);
            
                if($ordenes){

                  $error_msg = 'Orden cargada correctamente';
                  $resp =  true;

                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'INSERTA_ORDEN',
                  'id_registro' =>  '0',
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
          
                  $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
            
                }else{
                  $error_msg = 'Error en cargar Orden, favor revisar con Soporte';
                  $resp =  false;
                }


          }else{

            $error_msg = 'Archivo no fue movido correctamente, favor revisar con Soporte';
             $resp =  false;
          }

        }else{

          $error_msg = 'Archivo erroneo, favor revisar.';
          $resp =  false;


        }

      }

      $data = array(
        'mensaje'  => $error_msg,
        'resp' => $resp
      );


    echo json_encode($data);

  }


  function editarOrden(){

    $orden_id     = $this->input->post('order_id');
    $id_proyecto  = $this->input->post('id_proyecto');
    $id_cliente   = $this->input->post('id_cliente');
    $codEmpresa   = $this->session->userdata('cod_emp');
    $data         = array();
    $datos        = array();

    $orden        = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$orden_id,$codEmpresa);

    if($orden){

      foreach (json_decode($orden) as $key => $value) {
        
        $data = array(
          'purchase_number'     => $value->PurchaseOrderNumber,
          'id_requerimiento'           => $value->idRequerimiento,
          'select_criticidad'   => $this->callutil->obtiene_select_def_act('or_act_select_criticidad',$value->Criticidad,'CRITICIDAD'),
          'select_categorizacion' => $this->callutil->obtiene_select_def_act('or_act_select_categorizacion',$value->Categorizacion,'CATEGORIZACION_ORDENES'),
          'purchase_desc'       => $value->PurchaseOrderDescription,
          'revision'            => $value->Revision,
          'select_supplier'            => $this->obtiene_select_supplier($codEmpresa,'or_act_supplier',$value->SupplierName),
          'select_employee'     => $this->obtiene_select_employee($codEmpresa,'or_act_select_employee',$value->ExpediterID),
          'select_currency'     => $this->callutil->obtiene_select_def_act('or_act_select_currency',$value->Currency,'CURRENCY_ORDEN'),
          'requestor'           => $value->Requestor,
          'EstadoPlano'         => $value->EstadoPlano,
          'ObservacionesEp'     => $value->ObservacionesEp,
          'valor_neto'          => $this->callutil->formatoNumero($value->ValorNeto),
          'valor_total'         => $this->callutil->formatoNumero($value->ValorTotal),
          'comprador'           => $value->Comprador,
          'budget'              => $this->callutil->formatoNumero($value->Budget),
          'costcodebudget'      => $value->CostCodeBudget,
          'order_date'          => date('d-m-Y', strtotime($value->OrderDate)),
          'date_required'       => date('d-m-Y', strtotime($value->DateRequired)),
          'date_eta'            => $this->callutil->cambianull(date('d-m-Y', strtotime($value->DateEta))),
          'date_promised'       => date('d-m-Y', strtotime($value->DatePromised)),
          'ship_date'           => date('d-m-Y', strtotime($value->ShipDate)),
          'select_shipping'     => $this->callutil->obtiene_select_def_act('or_act_select_shipping',$value->ShippingMethodID,'SHIPPING_METHOD'),
          'select_status'       => $this->callutil->obtiene_select_def_act('or_act_select_status',$value->POStatus,'PO_STATUS'),
          'orden_id'            => $orden_id,
          'id_proyecto'         => $id_proyecto,
          'id_cliente'          => $id_cliente,
          'nombre_proyecto'     => $id_cliente,
          'TipoCambio' => $this->callutil->formatoNumero($value->TipoCambio),
          'ValorNetoUsd' => $this->callutil->formatoNumero($value->ValorNetoUsd),                                       
          'FechaAdjudicadaProgramada' => date('d-m-Y', strtotime($value->FechaAdjudicadaProgramada)),
          'FechaAdjudicada' => date('d-m-Y', strtotime($value->FechaAdjudicada))

        );

      }

    }

    $datos['formulario'] = $data;

    echo json_encode($datos);


  }



  function actualizaOrden(){


    $or_purchase_order    = $this->input->post('or_act_purchase_order');
    $or_idrequerimiento      = $this->input->post('or_act_idrequerimiento');
    $or_criticidad      = $this->input->post('or_act_select_criticidad');
    $or_categorizacion   = $this->input->post('or_act_select_categorizacion');
    $or_purchase_desc     = $this->input->post('or_act_purchase_desc');
    $or_revision        = $this->input->post('or_act_revision');
    $or_supplier   = $this->input->post('or_act_supplier');

    $or_estado_plano   = $this->input->post('or_act_estado_plano');
    $or_observacion_ep   = $this->input->post('or_act_observacion_ep');

    $or_select_employee   = $this->input->post('or_act_select_employee');
    $or_select_currency   = $this->input->post('or_act_select_currency');
    $or_requestor         = $this->input->post('or_act_requestor');
    $or_valor_neto        = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_valor_neto'));
    $or_valor_total       = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_valor_total'));
    $or_budget            = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_budget'));
    $or_costcodebudget    = $this->input->post('or_act_costcodebudget');
    $or_comprador         = $this->input->post('or_act_comprador');
    $or_order_date        = date('Y-m-d', strtotime($this->input->post('or_act_order_date')));
    $or_date_required     = date('Y-m-d', strtotime($this->input->post('or_act_date_required')));
    $or_date_eta          = date('Y-m-d', strtotime($this->input->post('or_act_date_eta')));
    $or_date_promised     = date('Y-m-d', strtotime($this->input->post('or_act_date_promised')));
    $or_ship_date         = date('Y-m-d', strtotime($this->input->post('or_act_ship_date')));
    $or_select_shipping   = $this->input->post('or_act_select_shipping');
    $or_select_status     = $this->input->post('or_act_select_status');

    $id_proyecto_or       = $this->input->post('id_act_proyecto');
    $id_cliente_or       = $this->input->post('id_act_cliente');
    $id_order_or       = $this->input->post('id_act_order');

    $or_tipo_cambio            = $this->callutil->formatoNumeroMilesEntrada($this->input->post('or_act_tipo_cambio'));
    


    if ($or_valor_neto > 0 && $or_tipo_cambio > 0){

      $or_valor_neto_usd = $this->callutil->num_format(($or_valor_neto / $or_tipo_cambio),2);
    }else {
      $or_valor_neto_usd = 0;
    }



    $or_fecha_adjudicada_programada = date('Y-m-d', strtotime($this->input->post('or_act_fecha_adjudicada_programada')));
    $or_fecha_adjudicada= date('Y-m-d', strtotime($this->input->post('or_act_fecha_adjudicada')));

    $path_completo = '';
    $codEmpresa       = $this->session->userdata('cod_emp');
    $target_path = $this->config->item('BASE_ARCHIVOS')."ordenes/";
    $error_msg = '';
    $resp =  false;


    $orden   = $this->callexternosordenes->obtieneOrden($id_proyecto_or,$id_cliente_or,$id_order_or,$codEmpresa);

    if($orden){

      foreach (json_decode($orden) as $key => $value) {
        
        $Support = $value->Support;
       

      }

    }

    $nameArchivo = 'or_act_support';


    $archivo = $this->checkFileValidation($nameArchivo);
    $respArchivo = $archivo['resp'];


    if ($or_select_status === '6'){

      $or_ship_date = date_create()->format('Y-m-d');


    }


    if($respArchivo == false) {
      
                #arreglo para insert

                $data = array(
                  'codEmpresa'                => $codEmpresa,
                  'idCliente'                 => $id_cliente_or,
                  'idProyecto'                => $id_proyecto_or,
                  'PurchaseOrderID'           => $id_order_or,
                  'Criticidad'                => $or_criticidad ,
                  'idRequerimiento'           => $or_idrequerimiento,
                  'PurchaseOrderNumber'       => $or_purchase_order,
                  'Categorizacion'            => $or_categorizacion,
                  'PurchaseOrderDescription'  => $or_purchase_desc,
                  'Revision'  => $or_revision,
                  'SupplierName'                => $or_supplier,
                   'EstadoPlano'  => $or_estado_plano  ,
                   'ObservacionesEp' =>  $or_observacion_ep,
                  'Comprador'            => $or_comprador,
                  'ExpediterID'                => $or_select_employee,
                  'Requestor'        => $or_requestor,
                  'Currency'                  => $or_select_currency,
                  'ValorNeto'                 => $or_valor_neto,
                  'ValorTotal'                => $or_valor_total,
                  'Budget'                    => $or_budget,
                  'CostCodeBudget'            =>$or_costcodebudget ,
                  'OrderDate'                 => $or_order_date,
                  'DateRequired'              => $or_date_required,
                  'DateEta'                   => $or_date_eta,
                  'DatePromised'              => $or_date_promised,
                  'ShipDate'                  => $or_ship_date,
                  'ShippingMethodID'          => $or_select_shipping,
                  'POStatus'                  => $or_select_status,
                  'TipoCambio' => $or_tipo_cambio ,
                  'ValorNetoUsd' => $or_valor_neto_usd ,
                  'FechaAdjudicadaProgramada' => $or_fecha_adjudicada_programada ,
                  'FechaAdjudicada' => $or_fecha_adjudicada

                );
                $ordenes    = $this->callexternosordenes->actualizaOrden($data);
                if($ordenes){

                  $error_msg = 'Orden actualizada correctamente';
                  $resp =  true;


                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'ACTUALIZA_ORDEN',
                  'id_registro' =>  $id_order_or,
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
          
                  $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                }else{
                  $error_msg = 'Error en actualizar Orden, favor revisar con Soporte';
                  $resp =  false;
                }
       
    } else {
 
        if(is_uploaded_file($_FILES[$nameArchivo ]['tmp_name'])) {   


          /* create new name file */
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $respaldo_original = $_FILES["or_act_support"]["name"];
          $extension  = pathinfo( $_FILES[$nameArchivo ]["name"], PATHINFO_EXTENSION ); // jpg
          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

          $source       = $_FILES[$nameArchivo ]['tmp_name'];
          $destination  = $target_path . $basename; 
          /* move the file */
          
          if(move_uploaded_file( $source, $destination )) {
             
            
            // Comienzo Insert

            $respaldo = $basename;



            #arreglo para insert

                $update = array(
                  'codEmpresa'                => $codEmpresa,
                  'idCliente'                 => $id_cliente_or,
                  'idProyecto'                => $id_proyecto_or,
                  'PurchaseOrderID'           => $id_order_or,
                  'Criticidad'                => $or_criticidad ,
                  'idRequerimiento'           => $or_idrequerimiento,
                  'PurchaseOrderNumber'       => $or_purchase_order,
                  'Categorizacion'            => $or_categorizacion,
                  'PurchaseOrderDescription'  => $or_purchase_desc,
                  'Revision'                  => $or_revision,
                  'SupplierName'                => $or_supplier,
                  'EstadoPlano'  => $or_estado_plano  ,
                  'ObservacionesEp' =>  $or_observacion_ep,
                  'Comprador'            => $or_comprador,
                  'ExpediterID'                => $or_select_employee,
                  'Requestor'        => $or_requestor,
                  'Currency'                  => $or_select_currency,
                  'ValorNeto'                 => $or_valor_neto,
                  'ValorTotal'                => $or_valor_total,
                  'Budget'                    => $or_budget,
                  'CostCodeBudget'            =>$or_costcodebudget ,
                  'OrderDate'                 => $or_order_date,
                  'DateRequired'              => $or_date_required,
                  'DateEta'                   => $or_date_eta,
                  'DatePromised'              => $or_date_promised,
                  'ShipDate'                  => $or_ship_date,
                  'ShippingMethodID'          => $or_select_shipping,
                  'POStatus'                  => $or_select_status,
                  'Support'                   => $respaldo,
                  'Support_original'          => $respaldo_original,
                  'TipoCambio' => $or_tipo_cambio ,
                  'ValorNetoUsd' => $or_valor_neto_usd ,
                  'FechaAdjudicadaProgramada' => $or_fecha_adjudicada_programada ,
                  'FechaAdjudicada' => $or_fecha_adjudicada 
                );

                $ordenes    = $this->callexternosordenes->actualizaOrden($update);

                if($ordenes){

                  $error_msg = 'Orden actualizada correctamente';
                  $resp =  true;

                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'ACTUALIZA_ORDEN',
                  'id_registro' =>  $id_order_or,
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
          
                  $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
            
                }else{
                  $error_msg = 'Error en actualizar Orden, favor revisar con Soporte';
                  $resp =  false;
                }


          }else{

            $error_msg = 'Archivo no fue movido correctamente, favor revisar con Soporte';
             $resp =  false;
          }

        }else{

          $error_msg = 'Archivo erroneo, favor revisar.';
          $resp =  false;


        }

      }

      $data = array(
        'mensaje'  => $error_msg,
        'resp' => $resp
      );


    echo json_encode($data);

  }


  function eliminaOrden(){

        $id_cliente       = $this->input->post('id_cliente');
        $id_proyecto      = $this->input->post('id_proyecto');
        $orden            = $this->input->post('orden');
        $codEmpresa       = $this->session->userdata('cod_emp');


        //consulta si existen bucksheet
        $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($orden,true);

        $arrBucksheet = json_decode($bucksheet);

        //consulta si existen item
        $ordenesItem = $this->callexternosordenesitem->obtieneItemOrdenes($orden,$id_proyecto,$id_cliente);

        $arrOrdenesItem = json_decode($ordenesItem);

        if(count($arrBucksheet) > 0 || count($arrOrdenesItem) > 0){
        
          $data['resp'] = false;
          $data['mensaje'] = 'Existen datos asociados a esta orden. No se pudo eliminar.';
        
        }else{

          $data = array(
            'id_cliente'  => $id_cliente,
            'id_proyecto' => $id_proyecto,
            'orden'       => $orden,
            'codEmpresa'  => $codEmpresa
          );

          $delete = $this->callexternosordenes->eliminaOrden($data);

          if($delete){

            $data['resp'] = true;
            $data['mensaje'] = 'Registro eliminado correctamente';

            $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
            'accion'  => 'ELIMINA_ORDEN',
            'id_registro' =>  $orden,
            'usuario'  =>  $this->session->userdata('n_usuario'),
            'rol' =>   $this->session->userdata('nombre_rol'),
            'objeto'  => 'ORDEN' ,
            'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
    
            $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

          }else{
            $data['resp'] = false;
            $data['mensaje'] = 'Error al eliminar el regitro';
          }

        }

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


function obtieneSelectOrden(){
    
  $codEmpresa = $this->session->userdata('cod_emp');
  $data = array();
  

 

  $data['select_employee']  = $this->obtiene_select_employee($codEmpresa, 'or_select_employee');
  $data['select_supplier']  = $this->obtiene_select_supplier($codEmpresa, 'or_select_supplier');
  $data['select_currency']  = $this->callutil->obtiene_select_def('or_select_currency','CURRENCY_ORDEN','or_select_currency');
  $data['select_criticidad']  = $this->callutil->obtiene_select_def('or_select_criticidad','CRITICIDAD','or_select_criticidad');
  $data['select_shipping']  = $this->callutil->obtiene_select_def('or_select_shipping','SHIPPING_METHOD','or_select_shipping');
  $data['select_status']    = $this->callutil->obtiene_select_def('or_select_status','PO_STATUS','or_select_status');
  $data['select_categorizacion']    = $this->callutil->obtiene_select_def('or_select_categorizacion','CATEGORIZACION_ORDENES','or_select_categorizacion');
  
  $data['select_item_unidad']    = $this->callutil->obtiene_select_def('or_item_select_unidad','UNIDAD_MEDIDA','or_item_select_unidad');
  $data['select_item_status']    = $this->callutil->obtiene_select_def('or_item_select_status','ESTADO_ITEM_ORDEN','or_item_select_status');
 
  $data['select_disciplina']    = $this->callutil->obtiene_select_def('or_disciplina','DISCIPLINA','or_disciplina');
  $data['select_tipo_pm']    = $this->callutil->obtiene_select_def('or_tipo_pm','TIPO_PM','or_tipo_pm');
  $data['select_nivel_inspeccion']    =$this->callutil->obtiene_select_def('or_nivel_inspeccion','NIVEL_INSPECCION','or_nivel_inspeccion');

  

  $data['select_instalacion_definitiva']    = $this->callutil->obtiene_select_def('or_instalacion_definitiva','SI_NO','or_instalacion_definitiva');
  $data['select_inspeccion_requerida']    =$this->callutil->obtiene_select_def('or_inspeccion_requerida','SI_NO','or_inspeccion_requerida');
  $data['select_documentos_antes_iniciar']    =$this->callutil->obtiene_select_def('or_documentos_antes_iniciar','SI_NO','or_documentos_antes_iniciar');



  echo json_encode($data);

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




function obtiene_select_supplier($codEmpresa, $nameId, $selected = ""){

  $employee = $this->callexternosproveedores->obtieneSupplier($codEmpresa);

  $datosEmployee = json_decode($employee);
  $html = '';

  $html .= '<select name="'.$nameId.'" class="form-control form-control-sm" id="'.$nameId.'">'; 

  if($datosEmployee){

    $seleccionado = '';

    foreach ($datosEmployee as $key => $value) {
    
     

      if($selected === $value->SupplierName){
        $seleccionado = 'selected';
      }

      $html .= '<option  '.$seleccionado.'value="'.$value->SupplierName.'">'.$value->SupplierName.'</option>';
    }
  }else{
    $html .= '<option value="">No existen Proveedores</option>';
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