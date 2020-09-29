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

    $respuesta = false;

    $ordenes = $this->callexternosordenes->obtieneOrdenes($idProyecto,$idCliente);

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

              
              $datos_ordenes[] = array('codEmpresa' => $value->codEmpresa,
                'PurchaseOrderID' => $value->PurchaseOrderID,
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
                'DatePromised'   => $this->callutil->formatoFechaSalida($value->DatePromised),
                'ShipDate'   => $this->callutil->formatoFechaSalida($value->ShipDate),
                'ShippingMethodID'   => $this->callutil->cambianull($value->ShippingMethodID),
                'DateCreated'   => $this->callutil->formatoFechaSalida($value->DateCreated),
                "POStatus" => $this->callutil->cambianull($value->POStatus),
                'Support' =>  $Support
              );

            }
          }


						

        $datos['ordenes'] = $datos_ordenes;
        $datos['resp']    = $respuesta;

        echo json_encode($datos);
    

  }

  function guardaOrden(){

    $or_purchase_order    = $this->input->post('or_purchase_order');
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
    $or_date_promised     = date('Y-m-d', strtotime($this->input->post('or_date_promised')));
    $or_ship_date         = date('Y-m-d', strtotime($this->input->post('or_ship_date')));
    $or_select_shipping   = $this->input->post('or_select_shipping');
    $or_select_status     = $this->input->post('or_select_status');
    $id_proyecto_or       = $this->input->post('id_proyecto_or');
    $id_cliente_or       = $this->input->post('id_cliente');

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
                  'DatePromised'              => $or_date_promised,
                  'ShipDate'                  => $or_ship_date,
                  'ShippingMethodID'          => $or_select_shipping,
                  'DateCreated'               => date('Y-m-d'),
                  'POStatus'                  => $or_select_status,
                  'Support'                   => $respaldo,
                  'Support_original'          => $respaldo_original
                );

                $ordenes    = $this->callexternosordenes->guardaOrden($data);

                if($ordenes){

                  $error_msg = 'Orden cargada correctamente';
                  $resp =  true;

                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'INSERTA_ORDEN',
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d'));
          
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
          'select_categorizacion'     => $this->callutil->obtiene_select_def_act('or_act_select_categorizacion',$value->Categorizacion,'CATEGORIZACION_ORDENES'),
          'purchase_desc'       => $value->PurchaseOrderDescription,
          'revision'            => $value->Revision,
          'select_supplier'     => $this->obtiene_select_supplier($codEmpresa,'or_act_select_supplier',$value->SupplierName),
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
          'date_promised'       => date('d-m-Y', strtotime($value->DatePromised)),
          'ship_date'           => date('d-m-Y', strtotime($value->ShipDate)),
          'select_shipping'     => $this->callutil->obtiene_select_def_act('or_act_select_shipping',$value->ShippingMethodID,'SHIPPING_METHOD'),
          'select_status'       => $this->callutil->obtiene_select_def_act('or_act_select_status',$value->POStatus,'PO_STATUS'),
          'orden_id'            => $orden_id,
          'id_proyecto'         => $id_proyecto,
          'id_cliente'          => $id_cliente
        );

      }

    }

    $datos['formulario'] = $data;

    echo json_encode($datos);


  }



  function actualizaOrden(){


    $or_purchase_order    = $this->input->post('or_act_purchase_order');
    $or_idrequerimiento      = $this->input->post('or_act_idrequerimiento');
    $or_categorizacion   = $this->input->post('or_act_select_categorizacion');
    $or_purchase_desc     = $this->input->post('or_act_purchase_desc');
    $or_revision        = $this->input->post('or_act_revision');
    $or_select_supplier   = $this->input->post('or_act_select_supplier');

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
    $or_date_promised     = date('Y-m-d', strtotime($this->input->post('or_act_date_promised')));
    $or_ship_date         = date('Y-m-d', strtotime($this->input->post('or_act_ship_date')));
    $or_select_shipping   = $this->input->post('or_act_select_shipping');
    $or_select_status     = $this->input->post('or_act_select_status');

    $id_proyecto_or       = $this->input->post('id_act_proyecto');
    $id_cliente_or       = $this->input->post('id_act_cliente');
    $id_order_or       = $this->input->post('id_act_order');



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
                  'idRequerimiento'           => $or_idrequerimiento,
                  'PurchaseOrderNumber'       => $or_purchase_order,
                  'Categorizacion'            => $or_categorizacion,
                  'PurchaseOrderDescription'  => $or_purchase_desc,
                  'Revision'  => $or_revision,
                  'SupplierName'                => $or_select_supplier,
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
                  'DatePromised'              => $or_date_promised,
                  'ShipDate'                  => $or_ship_date,
                  'ShippingMethodID'          => $or_select_shipping,
                  'DateCreated'               => date('Y-m-d'),
                  'POStatus'                  => $or_select_status

                );
                $ordenes    = $this->callexternosordenes->actualizaOrden($data);

                if($ordenes){

                  $error_msg = 'Orden actualizada correctamente';
                  $resp =  true;


                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'ACTUALIZA_ORDEN_'.$id_order_or,
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d'));
          
                  $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                }else{
                  $error_msg = 'Error en actualizar Orden, favor revisar con Soporte';
                  $resp =  false;
                }
       
    } else {
 
        if(is_uploaded_file($_FILES[$nameArchivo ]['tmp_name'])) {   


          /* create new name file */
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $respaldo_original = $_FILES["or_support"]["name"];
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
                  'idRequerimiento'           => $or_idrequerimiento,
                  'PurchaseOrderNumber'       => $or_purchase_order,
                  'Categorizacion'            => $$or_categorizacion,
                  'PurchaseOrderDescription'  => $or_purchase_desc,
                  'Revision'                  => $or_revision,
                  'SupplierName'                => $or_select_supplier,
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
                  'DatePromised'              => $or_date_promised,
                  'ShipDate'                  => $or_ship_date,
                  'ShippingMethodID'          => $or_select_shipping,
                  'DateCreated'               => date('Y-m-d'),
                  'POStatus'                  => $or_select_status,
                  'Support'                   => $respaldo,
                  'Support_original'          => $respaldo_original 
                );

                $ordenes    = $this->callexternosordenes->actualizaOrden($update);

                if($ordenes){

                  $error_msg = 'Orden actualizada correctamente';
                  $resp =  true;

                  $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                  'accion'  => 'ACTUALIZA_ORDEN_'.$id_order_or,
                  'usuario'  =>  $this->session->userdata('n_usuario'),
                  'rol' =>   $this->session->userdata('nombre_rol'),
                  'objeto'  => 'ORDEN' ,
                  'fechaCambio' =>  date_create()->format('Y-m-d'));
          
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
            'accion'  => 'ELIMINA_ORDEN_'.$orden,
            'usuario'  =>  $this->session->userdata('n_usuario'),
            'rol' =>   $this->session->userdata('nombre_rol'),
            'objeto'  => 'ORDEN' ,
            'fechaCambio' =>  date_create()->format('Y-m-d'));
    
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
  

  $supplier = $this->callexternosproveedores->obtieneSupplier($codEmpresa);
  
  
  $data['select_supplier']  = $this->obtiene_select_supplier($codEmpresa, 'or_select_supplier');
  $data['select_employee']  = $this->obtiene_select_employee($codEmpresa, 'or_select_employee');
  $data['select_currency']  = $this->callutil->obtiene_select_def('or_select_currency','CURRENCY_ORDEN','or_select_currency');
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
            $seleccionado = ($selected == $value->ID) ? 'selected' : '';
          }

          $html .= '<option value="'.$value->ID.'">'.$value->FirstName.' '.$value->LastName.'</option>';
        }
      }else{
        $html .= '<option value="0">No existen Employee</option>';
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