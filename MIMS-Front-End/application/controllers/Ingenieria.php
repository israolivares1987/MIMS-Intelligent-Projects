<?php
class Ingenieria extends MY_Controller{
  
  
    function __construct(){

    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosBuckSheet');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function proyectos(){

    $codEmpresa = $this->session->userdata('cod_emp');

    $clientes = $this->callexternosclientes->obtieneClientePorEmpresa($codEmpresa);

    $arrClientes = json_decode($clientes);

    $html = "";
    
    $html .= '<select class="form-control" id="select_clientes">';
    $html .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $html .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $html .= '</select>';
    $datos['select_clientes'] = $html;

    $this->plantilla_ingenieria('ingenieria/listProyectos', $datos);
  
   }

   public function index_ingenieria(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];


    //Obtiene Datos para el Home


    $Totales = $this->callexternosconsultas->obtieneDatosTotales($codEmpresa);
    
    $json_totales             = $Totales;
    $arrayDatosTotales        = json_decode($json_totales,true);
    $datos['totalProyectos']  = $arrayDatosTotales['totalProyectos'];
    $datos['totalClientes']   = $arrayDatosTotales['totalClientes'];
    $datos['totalOrdenes']    = $arrayDatosTotales['totalOrdenes'];
    $datos['totalSuppliers']  = $arrayDatosTotales['totalSuppliers'];


    $this->plantilla_ingenieria('ingenieria/home_ingenieria', $datos);


  }


  function listProyectosCliente(){

      $datos = array();
      $id_clientes = $this->input->post('cliente');
      $respuesta = false;

      $proyectos    = $this->callexternosproyectos->obtieneProyectosCliente($id_clientes);
      $arrProyectos = json_decode($proyectos);
      $html ="";

      $datos_proyectos = array();

      if($arrProyectos){
        $respuesta = true;
        
        foreach ($arrProyectos as $key => $value) {

          $datos_proyectos[] = array(
            'codigo_proyecto'   => $value->codigo_proyecto,
            'nombre_proyecto'   => $value->descripcion_proyecto,
            'estado'            => $value->estado_proyecto,
            'id_clientes'       => $id_clientes
          );

        }
      }
      
      $datos['proyectos'] = $datos_proyectos;
      $datos['resp']      = $respuesta;

      echo json_encode($datos);
    
  }


  function guardarProyecto(){

    $this->load->library('form_validation');

    $id_cliente       = $this->input->post('id_cliente');
    $nombre_proyecto  = $this->input->post('nombre_proyecto');
    $codEmpresa       = $this->session->userdata('cod_emp');
    $data = array();


    $this->form_validation->set_rules('nombre_proyecto', 'Nombre proyecto', 'required|trim');

    if(!$this->form_validation->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campo Nombre Proyecto es obligatorio.";
    
    }else{

      $proyectos = $this->callexternosproyectos->guardaProyecto($id_cliente, $nombre_proyecto,$codEmpresa);


      if($proyectos){

        $data['resp']        = true;
        $data['mensaje']     = 'Proyeto creado correctamente';

      }else{
        $data['resp']        = false;
        $data['mensaje']     = 'Error al crear proyecto';
      }
    }

    echo json_encode($data);

  }


  function editarProyecto(){

    $id_proyecto = $this->input->post('id_proyecto');
    $id_cliente = $this->input->post('id_cliente');

    $proyecto         = $this->callexternosproyectos->obtieneProyecto($id_proyecto,$id_cliente);
    $datosEstados     = $this->callexternosproyectos->obtieneDatosRef('ESTADO_PROYECTO');
    $select_estados   = '<select class="form-control" id="act_estado">'; 
    $nombre_proyecto  = '';

    $data = array();

    foreach (json_decode($proyecto) as $key => $value) {

      $nombre_cliente  = $value->nombre_cliente;
      $nombre_proyecto = $value->nombre_proyecto;

      foreach (json_decode($datosEstados) as $llave => $valor) {
        
        $selected = ($valor->domain_id == $value->estado_proyecto) ? 'selected' : '';
        $select_estados .='<option '.$selected.' value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';

      }

    } 

    $select_estados .= '</select>';

    $data['nombre_cliente']     = $nombre_cliente;
    $data['nombre_proyecto']    = $nombre_proyecto;
    $data['select_estado']      = $select_estados;
    $data['id_proyecto']        = $id_proyecto;


    echo json_encode($data);

  }

  function actualizaProyecto(){

    $this->load->library('form_validation');

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');
    $nombre_proyecto  = $this->input->post('nombre_proyecto');
    $estado           = $this->input->post('estado');
    $codEmpresa       = $this->session->userdata('cod_emp');

    $resp = false;
    $mensaje = "";


    $data = array();

    $this->form_validation->set_rules('nombre_proyecto', 'Nombre proyecto', 'required|trim');

    if(!$this->form_validation->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campo Nombre Proyecto es obligatorio.";
    
    }else{

      $update = array(
        'id_cliente'        => $id_cliente,
        'id_proyecto'       => $id_proyecto,
        'nombre_proyecto'  => $nombre_proyecto,
        'estado'            => $estado,
        'codEmpresa'        => $codEmpresa
      );

      $proyectos = $this->callexternosproyectos->actualizaProyecto($update);

      if($proyectos){

        $resp = true;
        $mensaje = "Proyecto actualizado correctamente";

      }else{

        $mensaje = "Error al actualizar el proyecto";

      }

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


    }

    echo json_encode($data);


  }

  function eliminaProyecto(){

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');
    $codEmpresa       = $this->session->userdata('cod_emp');


    $data = array(
      'id_cliente'  => $id_cliente,
      'id_proyecto' => $id_proyecto,
      'codEmpresa'  => $codEmpresa
    );

    $ordenes = $this->callexternosproyectos->obtieneOrdenesProyecto($id_proyecto,$id_cliente);

    $data_ordenes = json_decode($ordenes);

    if(count($data_ordenes->data) > 0){

      $data['resp'] = false;
      $data['mensaje'] = 'Existen ordenes asociadas al proyecto. No se pudo eliminar.';

    }else{

      $delete = $this->callexternosproyectos->actualizaProyecto($data);

      if($delete){

        $data['resp'] = true;
        $data['mensaje'] = 'Registro eliminado correctamente';

      }else{
        $data['resp'] = false;
        $data['mensaje'] = 'Error al eliminar el regitro';
      }

    }


    

    echo json_encode($data);

  }

  function eliminaOrden(){

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');
    $orden            = $this->input->post('orden');
    $codEmpresa       = $this->session->userdata('cod_emp');


    //consulta si existen bucksheet
    $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($orden,true);

    $data_buck = json_decode($bucksheet);

    if(count($data_buck->data) > 0){
    
      $data['resp'] = false;
      $data['mensaje'] = 'Existen datos asociados a esta orden. No se pudo eliminar.';
    
    }else{

      $data = array(
        'id_cliente'  => $id_cliente,
        'id_proyecto' => $id_proyecto,
        'orden'       => $orden,
        'codEmpresa'  => $codEmpresa
      );

      $delete = $this->callexternosproyectos->eliminaOrden($data);

      if($delete){

        $data['resp'] = true;
        $data['mensaje'] = 'Registro eliminado correctamente';

      }else{
        $data['resp'] = false;
        $data['mensaje'] = 'Error al eliminar el regitro';
      }

    }

    echo json_encode($data);

  }

  function obtieneOrdenes(){

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');

    $respuesta = false;

    $ordenes = $this->callexternosproyectos->obtieneOrdenesProyecto($id_proyecto,$id_cliente);

    $data_ordenes = json_decode($ordenes);

    $html = '';

    $datos_ordenes = array();

    //Pregunto si trae datos
    if(count($data_ordenes->data)){

      foreach ($data_ordenes->data as $key => $value) {

        $datos_ordenes[] = array(
          'codigo_proyecto'     => $value[0],
          'order_id'            => $value[1],
          'order_description'   => $value[2],
          'supplier'            => $value[3],
          'employee'            => $value[4],
          'order_date'          => $value[5],
          'date_required'       => $value[6]
        );

      }

      $respuesta = true;
    }

    $datos['ordenes'] = $datos_ordenes;
    $datos['resp']    = $respuesta;

    echo json_encode($datos);
    

  }

  function obtieneSelectOrden(){
    
    $codEmpresa = $this->session->userdata('cod_emp');
    $data = array();
    

    $supplier = $this->callexternosproyectos->obtieneSupplier($codEmpresa);
    
    
    $data['select_supplier']  = $this->obtiene_select_supplier($codEmpresa, 'or_select_supplier');
    $data['select_employee']  = $this->obtiene_select_employee($codEmpresa, 'or_select_employee');
    $data['select_currency']  = $this->obtiene_select_def('or_select_currency','CURRENCY_ORDEN','or_select_currency');
    $data['select_shipping']  = $this->obtiene_select_def('or_select_shipping','SHIPPING_METHOD','or_select_shipping');
    $data['select_status']    = $this->obtiene_select_def('or_select_status','PO_STATUS','or_select_status');

    echo json_encode($data);

  }

  function obtiene_select_supplier($codEmpresa, $nameId, $selected = 0){

    $supplier = $this->callexternosproyectos->obtieneSupplier($codEmpresa);
    $datosSupplier = json_decode($supplier);
    $html = '';

    $html .= '<select name="'.$nameId.'" class="form-control form-control-sm" id="'.$nameId.'">'; 

    if($datosSupplier){

      $seleccionado = '';
  
      foreach ($datosSupplier as $key => $value) {

        if($selected > 0){
          $seleccionado = ($selected == $value->SupplierID) ? 'selected' : '';
        }

        $html .= '<option '.$seleccionado.' value="'.$value->SupplierID.'">'.$value->SupplierName.'</option>';
      }

    }else{
      $html .= '<option value="0">No existen Supplier</option>';
    }

    $html .= '</select>';
    return $html;
  }

  function obtiene_select_employee($codEmpresa, $nameId, $selected = 0){

    $employee = $this->callexternosproyectos->obtieneEmployee($codEmpresa);
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

    $def  = $this->callexternosproyectos->obtieneDatosRef($domain);
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
    
    $def  = $this->callexternosproyectos->obtieneDatosRef($domain);
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

  function guardaOrden(){

    $or_purchase_order    = $this->input->post('or_purchase_order');
    $or_purchase_desc     = $this->input->post('or_purchase_desc');
    $or_select_supplier   = $this->input->post('or_select_supplier');
    $or_select_employee   = $this->input->post('or_select_employee');
    $or_select_currency   = $this->input->post('or_select_currency');
    $or_requestor         = $this->input->post('or_requestor');
    $or_valor_neto        = $this->input->post('or_valor_neto');
    $or_valor_total       = $this->input->post('or_valor_total');
    $or_budget            = $this->input->post('or_budget');
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

    //Pregunta si viene un archivo
    if($_FILES['or_support']['size'] > 0){

      #parametros carga FILE
      $uploadFile['userFile'] = array(
            'id_proyecto_or'	=> $id_proyecto_or,
            'name'			      => $_FILES['or_support']['name'],
            'type'		  	    => $_FILES['or_support']['type'],
            'tmp_name'		    => $_FILES['or_support']['tmp_name'],
            'error'		    	  => $_FILES['or_support']['error'],
            'size'			      => $_FILES['or_support']['size'],
            'file_name'		    => 'or_'.$id_proyecto_or.'_'.$_FILES['or_support']['name']
      );

      $array_upload = $this->uploadFile($uploadFile);

      if (!file_exists($array_upload['full_path'])) {

        $path_imagen	  = '';
        $nombre_imagen	= '';
        

      }else{

        $path_imagen	= $array_upload['file_path'];
        $nombre_imagen	= $array_upload['orig_name'];
      }

      $path_completo =  $path_imagen.$nombre_imagen;

    }

    #arreglo para insert

    $data = array(
      'codEmpresa'                => $codEmpresa,
      'idCliente'                 => $id_cliente_or,
      'idProyecto'                => $id_proyecto_or,
      'PurchaseOrderNumber'       => $or_purchase_order,
      'PurchaseOrderDescription'  => $or_purchase_desc,
      'SupplierID'                => $or_select_supplier,
      'EmployeeID'                => $or_select_employee,
      'IngenieroRequestor'        => $or_requestor,
      'Currency'                  => $or_select_currency,
      'ValorNeto'                 => $or_valor_neto,
      'ValorTotal'                => $or_valor_total,
      'Budget'                    => $or_budget,
      'OrderDate'                 => $or_order_date,
      'DateRequired'              => $or_date_required,
      'DatePromised'              => $or_date_promised,
      'ShipDate'                  => $or_ship_date,
      'ShippingMethodID'          => $or_select_shipping,
      'DateCreated'               => date('Y-m-d'),
      'POStatus'                  => $or_select_status,
      'Support'                   => $path_completo
    );

    $ordenes    = $this->callexternosproyectos->guardaOrden($data);

    if($ordenes){

      $data = array(
        'resp' => true
      );

    }else{
      $data = array(
        'resp' => false
      );
    }

    echo json_encode($data);

  }


  function editarOrden(){

    $orden_id     = $this->input->post('order_id');
    $id_proyecto  = $this->input->post('id_proyecto');
    $id_cliente   = $this->input->post('id_cliente');
    $codEmpresa   = $this->session->userdata('cod_emp');
    $data         = array();
    $datos        = array();

    $orden        = $this->callexternosproyectos->obtieneOrden($id_proyecto,$id_cliente,$orden_id,$codEmpresa);

    if($orden){

      foreach (json_decode($orden) as $key => $value) {
        
        $data = array(
          'purchase_number'     => $value->PurchaseOrderNumber,
          'purchase_desc'       => $value->PurchaseOrderDescription,
          'select_supplier'     => $this->obtiene_select_supplier($codEmpresa,'or_act_select_supplier',$value->SupplierID),
          'select_employee'     => $this->obtiene_select_employee($codEmpresa,'or_act_select_employee',$value->EmployeeID),
          'select_currency'     => $this->obtiene_select_def_act('or_act_select_currency',$value->Currency,'CURRENCY_ORDEN'),
          'requestor'           => $value->IngenieroRequestor,
          'valor_neto'          => $value->ValorNeto,
          'valor_total'         => $value->ValorTotal,
          'budget'              => $value->Budget,
          'order_date'          => date('d-m-Y', strtotime($value->OrderDate)),
          'date_required'       => date('d-m-Y', strtotime($value->DateRequired)),
          'date_promised'       => date('d-m-Y', strtotime($value->DatePromised)),
          'ship_date'           => date('d-m-Y', strtotime($value->ShipDate)),
          'select_shipping'     => $this->obtiene_select_def_act('or_act_select_shipping',$value->ShippingMethodID,'SHIPPING_METHOD'),
          'select_status'       => $this->obtiene_select_def_act('or_act_select_status',$value->POStatus,'PO_STATUS'),
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
    $or_purchase_desc     = $this->input->post('or_act_purchase_desc');
    $or_select_supplier   = $this->input->post('or_act_select_supplier');
    $or_select_employee   = $this->input->post('or_act_select_employee');
    $or_select_currency   = $this->input->post('or_act_select_currency');
    $or_requestor         = $this->input->post('or_act_requestor');
    $or_valor_neto        = $this->input->post('or_act_valor_neto');
    $or_valor_total       = $this->input->post('or_act_valor_total');
    $or_budget            = $this->input->post('or_act_budget');
    $or_order_date        = date('Y-m-d', strtotime($this->input->post('or_act_order_date')));
    $or_date_required     = date('Y-m-d', strtotime($this->input->post('or_act_date_required')));
    $or_date_promised     = date('Y-m-d', strtotime($this->input->post('or_act_date_promised')));
    $or_ship_date         = date('Y-m-d', strtotime($this->input->post('or_act_ship_date')));
    $or_select_shipping   = $this->input->post('or_act_select_shipping');
    $or_select_status     = $this->input->post('or_act_select_status');
    $id_proyecto_or       = $this->input->post('id_act_proyecto');
    $id_order_or       = $this->input->post('id_act_order');
    $id_cleinte       = $this->input->post('id_act_cliente');

    $codEmpresa       = $this->session->userdata('cod_emp');


    $update = array(
      'codEmpresa'                => $codEmpresa,
      'idCliente'                 => $id_cleinte,
      'idProyecto'                => $id_proyecto_or,
      'PurchaseOrderID'           => $id_order_or,
      'PurchaseOrderNumber'       => $or_purchase_order,
      'PurchaseOrderDescription'  => $or_purchase_desc,
      'SupplierID'                => $or_select_supplier,
      'EmployeeID'                => $or_select_employee,
      'IngenieroRequestor'        => $or_requestor,
      'Currency'                  => $or_select_currency,
      'ValorNeto'                 => $or_valor_neto,
      'ValorTotal'                => $or_valor_total,
      'Budget'                    => $or_budget,
      'OrderDate'                 => $or_order_date,
      'DateRequired'              => $or_date_required,
      'DatePromised'              => $or_date_promised,
      'ShipDate'                  => $or_ship_date,
      'ShippingMethodID'          => $or_select_shipping,
      'POStatus'                  => $or_select_status
    );

    $ordenes    = $this->callexternosproyectos->actualizaOrden($update);

    if($ordenes){

      $data = array(
        'resp' => true
      );

    }else{
      $data = array(
        'resp' => false
      );
    }

    echo json_encode($data);

  }

    
}
