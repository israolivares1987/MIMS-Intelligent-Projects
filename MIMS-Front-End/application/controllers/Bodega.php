<?php
class Bodega extends MY_Controller{
  
  
    function __construct(){

    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosBuckSheet');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosProveedores');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('form_validation');
    $this->load->library('CallExternosTodo');
    $this->load->library('CallExternosBodegas');
    $this->load->library('CallExternosReporteRecepcion');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosBitacora');
    $this->load->library('ci_qr_code');
    $this->config->load('qr_code');
    $this->load->helper('file');
    

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

  }


public function index_bodega(){


  $cod_usuario = $this->session->userdata('cod_user');
  $listaTodo = "";
  $number = 0; 
  $codEmpresa = $this->session->userdata('cod_emp');
 
  
// Obtiene Todo


$todo = $this->callexternostodo->obtieneTodoUsuarios($codEmpresa,$cod_usuario);

$arrTodo = json_decode($todo);

if($arrTodo){
 
 
 foreach ($arrTodo as $key => $value) {

   $number ++;

   if ($value->dif > 3){

     $color = 'badge badge-success';

   }else{

     $color = 'badge badge-danger';

   }


   if ($value->estado > 0){


     $class = '';
   

   }else{

     $class = 'class="done"';

   }

   $listaTodo .= '<li '.$class.'>
   <span class="handle">
     <i class="fas fa-ellipsis-v"></i>
     <i class="fas fa-ellipsis-v"></i>
   </span>
   <div  class="icheck-primary d-inline ml-2">
     <input type="checkbox" value="'.$value->id_todo.'" name="todo'.$number.'" id="todoCheck'.$number.'" onclick="cambiarEstado(this)">
     <label for="todoCheck'.$number.'"></label>
   </div>

   <span class="text">'.$value->lista_todo.'</span>
  

   <span class="text">'.$value->descripcion_todo.'</span>
   <small class="'.$color.'"><i class="far fa-clock"></i> '.$value->dif.'</small>
   <div class="tools">
  
   <button data-toggle="tooltip" data-placement="left" title="Editar To Do" 
   onclick="obtiene_todo('.$value->id_todo.','. $cod_usuario.')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-edit"></i></button>

   <button data-toggle="tooltip" data-placement="left" title="Eliminar To Do" 
   onclick="eliminar_todo('.$value->id_todo.','. $cod_usuario.')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>
   </div>
 </li>';


   
 }
}

$datos['select_listaTodo']  = $this->callutil->obtiene_select_def('var_lista_todo','LISTA_TO_DO','var_lista_todo');


$datos['listaTodo'] = $listaTodo ;


    // Obtiene select Clientes

    $clientes = $this->callexternosclientes->listaClientes($codEmpresa);

    $arrClientes = json_decode($clientes);

    $htmlclientes = "";
    
    $htmlclientes .= '<select class="form-control" id="clientes">';
    $htmlclientes .= '<option value="">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $htmlclientes .= '</select>';
    $datos['select_clientes'] = $htmlclientes;


    // Obtiene select Proyectos

    $htmlproyectos = "";

    $htmlproyectos .= '<select class="form-control" id="proyectos">';
    $htmlproyectos .= '<option value="">Seleccione</option>';
    $htmlproyectos .= '</select>';
    $datos['select_proyectos'] = $htmlproyectos;



    // Obtiene select Ordenes

    $htmlordenes = "";

    $htmlordenes .= '<select class="form-control" id="ordenes">';
    $htmlordenes .= '<option value="">Seleccione</option>';
    $htmlordenes .= '</select>';
    $datos['select_ordenes'] = $htmlordenes;



    $this->plantilla_bodega('bodega/home_bodega', $datos);


  }

  public function JSON_Proyectos(){

		if($this->input->is_ajax_request()){

        $id_clientes  = $this->input->post('id_clientes');

        // Obtiene select Ordenes

        $proyectos = $this->callexternosproyectos->obtieneProyectosCliente($id_clientes);

        $arrProyectos = json_decode($proyectos);

        $htmlproyectos = "";
        
        $htmlproyectos .= '<select class="form-control" id="proyectos">';
        $htmlproyectos .= '<option value="">Seleccione</option>';
        
        foreach ($arrProyectos as $key => $value) {

          $htmlproyectos .= '<option data-name="'.trim($value->NombreProyecto).'" value="'.$value->NumeroProyecto.'">'.$value->NombreProyecto.'</option>';
        
        }

        $htmlproyectos .= '</select>';


			$todo = array(	
							'proyectos' 	=> $htmlproyectos
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
	}


  public function JSON_Ordenes(){

		if($this->input->is_ajax_request()){

        $codEmpresa = $this->session->userdata('cod_emp');
        $id_clientes  = $this->input->post('id_clientes');
        $id_proyecto  = $this->input->post('id_proyecto');

        // Obtiene select Ordenes

        $ordenes = $this->callexternosordenes->obtieneOrdenes($id_proyecto,$id_clientes,$codEmpresa);

        $arrOrdenes = json_decode($ordenes);

        $htmlordenes = "";
        
        $htmlordenes .= '<select class="form-control" id="ordenes">';
        $htmlordenes .= '<option value="">Seleccione</option>';
        
        foreach ($arrOrdenes as $key => $value) {

          $htmlordenes .= '<option data-name="'.trim($value->PurchaseOrderNumber).'" value="'.$value->PurchaseOrderID.'">'.$value->PurchaseOrderNumber.'</option>';
        
        }

        $htmlordenes .= '</select>';


			$todo = array(	
							'ordenes' 	=> $htmlordenes
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
  }
  

  public function JSON_Ordenes_Guias(){

		if($this->input->is_ajax_request()){

        $id_orden  = $this->input->post('orden');
        $codEmpresa = $this->session->userdata('cod_emp');

        // Obtiene select Ordenes

        $bucksheet = $this->callexternosbucksheet->obtieneBuckSheetGuiasWpanel($codEmpresa,$id_orden);

        $arrBucksheet = json_decode($bucksheet);

        $htmlbucksheet = "";
        
        $htmlbucksheet .= '<select class="form-control" id="guias">';
        $htmlbucksheet .= '<option value="">Seleccione Guia</option>';
        
        foreach ($arrBucksheet as $key => $value) {

          $htmlbucksheet .= '<option data-name="'.trim($value->GUIA_DESPACHO).'" value="'.$value->GUIA_DESPACHO.'">'.$value->GUIA_DESPACHO.'</option>';
        
        }

        $htmlbucksheet .= '</select>';


			$todo = array(	
							'guias' 	=> $htmlbucksheet
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
  }


  public function JSON_Ordenes_Packinglist(){

		if($this->input->is_ajax_request()){

        $id_orden  = $this->input->post('orden');
        $codEmpresa = $this->session->userdata('cod_emp');

        // Obtiene select Ordenes

        $bucksheet = $this->callexternosbucksheet->obtieneBuckSheetPackingListWpanel($codEmpresa,$id_orden);

        $arrBucksheet = json_decode($bucksheet);

        $htmlbucksheet = "";
        
        $htmlbucksheet .= '<select class="form-control" id="packinglist">';
        $htmlbucksheet .= '<option value="">Seleccione Packinglist</option>';
        
        foreach ($arrBucksheet as $key => $value) {

          $htmlbucksheet .= '<option data-name="'.trim($value->PACKINGLIST).'" value="'.$value->PACKINGLIST.'">'.$value->PACKINGLIST.'</option>';
        
        }

        $htmlbucksheet .= '</select>';


			$todo = array(	
							'packinglist' 	=> $htmlbucksheet
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
  }


  public function JSON_Wpanel(){


		if($this->input->is_ajax_request()){

        $datos  = $this->input->post('datos');
        $id_orden_compra  = $this->input->post('orden');
        $guia_despacho  = $this->input->post('guia_despacho');
        $codEmpresa = $this->session->userdata('cod_emp');
        $id_cliente  = $this->input->post('cliente');
        $id_proyecto  = $this->input->post('proyecto');
        $packinglist = $this->input->post('packinglist');
        $fecha_entrega = $this->input->post('fecha_entrega');
        $respuesta = false;
        $mensaje_error = "";
         
        $datos_bucksheet = array();

        if (strlen($fecha_entrega) < 1 || $fecha_entrega === ""){

        $respuesta= false;
        $idInsertado = 0;
        $mensaje_error = "Fecha de Entrega es Obligatorio";
  

        }else{  
          
          
          //Obtiene Datos Proyecto

                 $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);
                 $arrProyecto = json_decode($Proyecto);
             
                 if($arrProyecto){
       
                   foreach ($arrProyecto as $llave => $valor) {
                           
                     $DescripcionProyecto = $valor->NombreProyecto;
             
                   }
               
                 }
          
                 //Obtiene Datos Orden
                 
                 $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$id_orden_compra,$codEmpresa);
                 
       
                 $arrOrden = json_decode($Orden);
             
                 
                 if($arrOrden){
                   
                   foreach ($arrOrden as $llave => $valor) {
                           
                     $PurchaseOrderID = $valor->PurchaseOrderID;
                     $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
                     $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
                     $proveedor = $valor->SupplierName;
             
                   }
                 }

                // Obtiene Datos Cliente

                $responseCliente = $this->callexternosclientes->obtieneCliente($id_cliente);
                $arrCliente = json_decode($responseCliente);
               
                $datos_cliente = array();
            
                if($arrCliente){
                  
                  foreach ($arrCliente as $key => $value) {
                      $nombreCliente= $value->nombreCliente;
                  }
                }


          //Crea Cabecera RR

          $insertcab= array(
            'cod_empresa' => $codEmpresa ,
            'fecha_creacion' =>  date_create()->format('Y-m-d H:i:s'),
            'usuario_creacion' => $this->session->userdata('n_usuario'),
            'fecha_entrega' => $this->callutil->formatoFecha($fecha_entrega),
            'id_cliente' => $id_cliente ,
            'descripcion_cliente' => $nombreCliente ,
            'id_proyecto' => $id_proyecto ,
            'descripcion_proyecto' => $DescripcionProyecto ,
            'id_orden_compra' => $PurchaseOrderID ,
            'id_orden_cliente' => $PurchaseOrderNumber ,
            'descripcion_orden' => $PurchaseOrderDescription ,
            'guia_despacho' => $guia_despacho ,
            'proveedor' => $proveedor
          );


          $rrcab = $this->callexternosreporterecepcion->agregarRR($insertcab);
          $rrins = json_decode($rrcab) ;
        
          $resp =  $rrins->resp;
          $idInsertado = $rrins->id_insertado;

          $i = 1;
          $num = 1;

          foreach ($datos as $v) {
          
           
          $NumeroLinea =$v[$i];


          $response = $this->callexternosbucksheet->obtieneBucksheetDet($codEmpresa,$PurchaseOrderID, $NumeroLinea);

          $arrBucksheet = json_decode($response);
        
            foreach ($arrBucksheet as $key => $value) {

               
      
              $rr_det=array(
                'cod_empresa' =>  $codEmpresa ,
                'numero_linea_det' => $num,
                'numero_linea_wpanel' => $value->NUMERO_DE_LINEA,
                'id_rr_cab' => $idInsertado ,
                'id_orden_compra' => $PurchaseOrderID ,
                'tag_number' => $value->NUMERO_DE_TAG ,
                'stockcode' => $value->STOCKCODE ,
                'descripcion' => $value->DESCRIPCION_LINEA ,
                'id_orden_cliente' => $PurchaseOrderNumber  ,
                'packing_list' => $value->PACKINGLIST ,
                'guia_despacho' => $value->GUIA_DESPACHO ,
                'st_cantidad' => $value->UNIDADES_SOLICITADAS ,
                'numero_viaje' => $value->NUMERO_DE_VIAJE,
                'item_oc' => $value->ITEM_OC,
                'st_cantidad_recibida' => '0',
                'id_bodega' => "",
                'id_carpa' => "" ,
                'id_patio' => "" ,
                'id_posicion' => "" ,
                'observacion' => "",
                'observacion_exb' => "",
                'inspeccion_requerida' => ""
                );

                $num++; 
           
                $rrdet = $this->callexternosreporterecepcion->agregarRRDet($rr_det);
                $rrdetins = json_decode($rrdet) ;
                $respdet =  $rrdetins->resp;
                $idInsertadodet = $rrdetins->id_insertado;
                $respuesta= true;
            }




            

        }


         // actualiza CABECERA

        

     $dataUpdate = array(	
      'id_rr_recepcion' => 'RR-'.$idInsertado ,
      'id_rr' => $idInsertado
      );

      $edp= $this->callexternosreporterecepcion->actualizarCabeceraRR($dataUpdate);

    }

        $datos['respuesta'] = $respuesta;
        $datos['idInsertado'] = $idInsertado;
        $datos['error'] = $mensaje_error;


			
      echo json_encode($datos);
      
		}else{
			show_404();
		}
  }
  


  public function reporteDiario(){


    $number = 0; 
    $codEmpresa = $this->session->userdata('cod_emp');
   
    
  
  
      // Obtiene select Clientes
  
      $clientes = $this->callexternosclientes->listaClientes($codEmpresa);
  
      $arrClientes = json_decode($clientes);
  
      $htmlclientes = "";
      
      $htmlclientes .= '<select class="form-control" id="clientes">';
      $htmlclientes .= '<option value="">Seleccione</option>';
      
      foreach ($arrClientes as $key => $value) {
  
        $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
      
      }
  
      $htmlclientes .= '</select>';
      $datos['select_clientes'] = $htmlclientes;
  
  
      // Obtiene select Proyectos
  
      $htmlproyectos = "";
  
      $htmlproyectos .= '<select class="form-control" id="proyectos">';
      $htmlproyectos .= '<option value="">Seleccione</option>';
      $htmlproyectos .= '</select>';
      $datos['select_proyectos'] = $htmlproyectos;
  
  
 



    
  
  
  
      $this->plantilla_bodega('bodega/reporteDiario', $datos);
  
  
    }  



  
public function crearRRDet($NumRR){

  //Obtiene cabecera
  $rrcab = $this->callexternosreporterecepcion->obtieneCabeceraRR($NumRR);

  $arrRRcab = json_decode($rrcab);

  $codEmpresa = $this->session->userdata('cod_emp');
 

  if($arrRRcab){
 
    
    foreach ($arrRRcab as $key => $value) {

      $cod_empresa = $value->cod_empresa;
      $id_rr_recepcion = $value->id_rr_recepcion;
      $id_rr = $value->id_rr;
      $fecha_entrega = $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_entrega));
      $fecha_creacion = $value->fecha_creacion;
      $usuario_creacion = $value->usuario_creacion;
      $descripcion_cliente  = $value->descripcion_cliente;
      $descripcion_proyecto = $value->descripcion_proyecto;
      $id_orden_compra = $value->id_orden_compra;
      $id_orden_cliente = $value->id_orden_cliente;
      $descripcion_orden = $value->descripcion_orden;
      $guia_despacho = $value->guia_despacho;
      $proveedor = $value->proveedor;  
    }
  }


     // Obtiene select Bodega
  
     $bodegas = $this->callexternosbodegas->obtieneBodegas($codEmpresa);
  
     $arrBodegas = json_decode($bodegas);
 
     $htmlbodegas = "";
     
     $htmlbodegas .= '<select class="form-control" name="id_bodegas_cab" id="id_bodegas_cab">';
     $htmlbodegas .= '<option value="">Seleccione Bodega</option>';
     
     foreach ($arrBodegas as $key => $value) {
 
       $htmlbodegas .= '<option data-name="'.trim($value->nombre_bodega).'" value="'.$value->nombre_bodega.'">'.$value->nombre_bodega.'</option>';
     
     }

     $htmlbodegas .= '</select>';


  $datos['select_bodegas'] = $htmlbodegas;  
  $datos['id_rr'] = $id_rr;
  $datos['id_rr_recepcion'] = $id_rr_recepcion;
  $datos['fecha_creacion'] = $fecha_creacion;
  $datos['usuario_creacion'] = $usuario_creacion;
  $datos['descripcion_cliente'] = $descripcion_cliente;
  $datos['descripcion_proyecto'] = $descripcion_proyecto;
  $datos['id_orden_compra'] = $id_orden_compra;
  $datos['id_orden_cliente'] = $id_orden_cliente;
  $datos['descripcion_orden'] = $descripcion_orden;
  $datos['fecha_entrega'] = $fecha_entrega;
  $datos['guia_despacho'] = $guia_despacho;
  $datos['proveedor'] = $proveedor;

    $this->plantilla_bodega('bodega/crearRRDet', $datos);


  }


  function listaRRDet(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $id_rr_cab = $this->input->post('id_rr_cab');
    $responserrdet = $this->callexternosreporterecepcion->listaRRDet($codEmpresa,$id_rr_cab);
    $respuesta = false;
    $boton_activo  = false;
    $count = 0;
    $count_estados= 0;

    $arrRRDet = json_decode($responserrdet);
   
    $datos_rrdet = array();

    if($arrRRDet){
      $respuesta = true;
      
      foreach ($arrRRDet as $key => $value) {
        
        $count = $count +1;

        $datos_rrdet[] = array(
          'id_rr_det' => $value->id_rr_det,
          'cod_empresa' => $value->cod_empresa,
          'numero_linea_det' => $value->numero_linea_det,
          'item_oc' => $value->item_oc,
          'numero_linea_wpanel' => $value->numero_linea_wpanel,
          'id_rr_cab' => $value->id_rr_cab,
          'id_orden_compra' => $value->id_orden_compra,
          'tag_number' => $value->tag_number,
          'stockcode' => $value->stockcode,
          'descripcion' => $value->descripcion,
          'id_orden_cliente' => $value->id_orden_cliente,
          'packing_list' => $value->packing_list,
          'numero_viaje' => $value->numero_viaje,
          'guia_despacho' => $value->guia_despacho,
          'st_cantidad' => $value->st_cantidad,
          'st_cantidad_recibida' => $value->st_cantidad_recibida,
          'id_bodega' => $value->id_bodega,
          'id_carpa' => $value->id_carpa,
          'id_patio' => $value->id_patio,
          'id_posicion' => $value->id_posicion,
          'observacion' => $value->observacion,
          'observacion_exb' => $this->callutil->cambianull($value->observacion_exb),
          'inspeccion_requerida' =>$value->inspeccion_requerida
        );

        if ($value->estado_rr_det === '1'){

          $count_estados = $count_estados + 1;

        }
        
        
      }
    }

    if($count_estados == $count){

      $boton_activo= true;

    }else{

      $boton_activo= false;
    }

    $datos['rr_dets'] = $datos_rrdet;
    $datos['botonCierre'] = $boton_activo;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }



  public function crearRR(){


    $number = 0; 
    $codEmpresa = $this->session->userdata('cod_emp');
   
    
  
  
      // Obtiene select Clientes
  
      $clientes = $this->callexternosclientes->listaClientes($codEmpresa);
  
      $arrClientes = json_decode($clientes);
  
      $htmlclientes = "";
      
      $htmlclientes .= '<select class="form-control" id="clientes">';
      $htmlclientes .= '<option value="">Seleccione</option>';
      
      foreach ($arrClientes as $key => $value) {
  
        $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
      
      }
  
      $htmlclientes .= '</select>';
      $datos['select_clientes'] = $htmlclientes;
  
  
      // Obtiene select Proyectos
  
      $htmlproyectos = "";
  
      $htmlproyectos .= '<select class="form-control" id="proyectos">';
      $htmlproyectos .= '<option value="">Seleccione</option>';
      $htmlproyectos .= '</select>';
      $datos['select_proyectos'] = $htmlproyectos;
  
  
  
      // Obtiene select Ordenes
  
      $htmlordenes = "";
  
      $htmlordenes .= '<select class="form-control" id="ordenes">';
      $htmlordenes .= '<option value="">Seleccione</option>';
      $htmlordenes .= '</select>';
      $datos['select_ordenes'] = $htmlordenes;
  
  
      // Obtiene select Guias
  
      $htmlguias = "";
  
      $htmlguias .= '<select class="form-control" id="guias">';
      $htmlguias .= '<option value="">Seleccione</option>';
      $htmlguias .= '</select>';
      $datos['select_guias'] = $htmlguias;


      // Obtiene select PackingList
  
        $htmlpackinglist = "";
  
        $htmlpackinglist .= '<select class="form-control" id="packinglist">';
        $htmlpackinglist .= '<option value="">Seleccione</option>';
        $htmlpackinglist .= '</select>';
        $datos['select_packinglist'] = $htmlpackinglist;
  
  
  
      $this->plantilla_bodega('bodega/crearRR', $datos);
  
  
    }


    function obtieneRRDet(){


      $codEmpresa = $this->session->userdata('cod_emp');
      $id_rr_cab = $this->input->post('id_rr_recepcion');
      $id_rr_det = $this->input->post('id_rr_det');
      $responserrdet = $this->callexternosreporterecepcion->obtieneRRDet($codEmpresa,$id_rr_det,$id_rr_cab);

      $respuesta = false;
      $selected = 1;

   
      $arrRRDet = json_decode($responserrdet);
     
      $datos_rrdet = array();
  
      if($arrRRDet){
        $respuesta = true;
        
        foreach ($arrRRDet as $key => $value) {

          $responseBodegas = $this->callexternosbodegas->obtieneBodegas($codEmpresa);
    
          $datosBodegas = json_decode($responseBodegas);
          $html = '';
    
          $html .= '<select name="id_bodega" class="form-control" id="id_bodega">'; 
    
          if($datosBodegas){
    
            $seleccionado = '';
    
            foreach ($datosBodegas as $key1 => $value1) {
    
              if($selected > 0){
                $seleccionado = ($value->id_bodega == $value1->nombre_bodega) ? 'selected' : '';
              }
    
              $html .= '<option '.$seleccionado.' value="'.$value1->nombre_bodega.'">'.$value1->nombre_bodega.'</option>';
            }
    
          }else{
            $html .= '<option value="0">No existen Bodegas</option>';
          }
    
          $html .= '</select>';
   
          $datos_rrdet = array(
            'id_rr_det' => $value->id_rr_det,
            'cod_empresa' => $value->cod_empresa,
            'numero_linea_wpanel' => $value->numero_linea_wpanel,
            'numero_linea_det' => $value->numero_linea_det,
            'id_rr_cab' => $value->id_rr_cab,
            'id_orden_compra' => $value->id_orden_compra,
            'tag_number' => $value->tag_number,
            'stockcode' => $value->stockcode,
            'descripcion' => $value->descripcion,
            'id_orden_cliente' => $value->id_orden_cliente,
            'packing_list' => $value->packing_list,
            'guia_despacho' => $value->guia_despacho,
            'st_cantidad' => $value->st_cantidad,
            'st_cantidad_recibida' => $value->st_cantidad_recibida,
            'id_bodega' => $value->id_bodega,
            'select_bodega' => $html,
            'id_carpa' => $value->id_carpa,
            'id_patio' => $value->id_patio,
            'id_posicion' => $value->id_posicion,
            'observacion' => $value->observacion,
            'observacion_exb' => $value->observacion_exb,
            'inspeccion_requerida' =>$value->inspeccion_requerida
          );
          
        }
      }
  
  
      echo json_encode($datos_rrdet);
      
    
    }
  

    function ActualizaRRDet(){  

     
      $id_rr_det = $this->input->post('id_rr_det');
      $cod_empresa = $this->session->userdata('cod_emp');
      $id_rr_cab = $this->input->post('id_rr_cab');
      $st_cantidad = $this->input->post('st_cantidad');
      $st_cantidad_recibida = $this->input->post('st_cantidad_recibida');
      $id_bodega = $this->input->post('id_bodega');
      $id_carpa = $this->input->post('id_carpa');
      $id_patio = $this->input->post('id_patio');
      $id_posicion = $this->input->post('id_posicion');
      $observacion = $this->input->post('observacion');
      $id_orden_compra = $this->input->post('id_orden_compra');
      $numero_linea_wpanel = $this->input->post('numero_linea_wpanel');


      $observacion_exb = $this->input->post('observacion_exb');
      $inspeccion_requerida =  $this->input->post('inspeccion_requerida');
      $boton_activo ="";


      $resp = false;
      $mensaje = "";
  
  
      $data = array();
  
      $st_cantidad_recibida_valida = $this->form_validation->set_rules('st_cantidad_recibida', 'st_cantidad_recibida', 'required|trim');
      
      if(!$st_cantidad_recibida_valida->run()){
          
  
        $error_msg = 'Campos faltantes, favor revisar.';
        $resp =  false;
  
      
  
      }else{

        if($st_cantidad_recibida > $st_cantidad){

          $error_msg = 'Cantidad recibida es mayor a la cantidad solicitada.';
          $resp =  false;


        }else{



          if($st_cantidad_recibida <=0){

          $error_msg = 'Cantidad recibida debe ser mayor a 0.';
          $resp =  false;

          }else{

            $update= array(
  
              'id_rr_det' => $id_rr_det ,
              'cod_empresa' => $cod_empresa ,
              'numero_linea_wpanel' => $numero_linea_wpanel,
              'id_rr_cab' => $id_rr_cab ,
              'st_cantidad' => $st_cantidad ,
              'st_cantidad_recibida' => $st_cantidad_recibida ,
              'id_bodega' => $id_bodega ,
              'id_carpa' => $id_carpa ,
              'id_patio' => $id_patio ,
              'id_posicion' => $id_posicion ,
              'observacion' => $observacion,
              'observacion_exb' => $observacion_exb,
              'inspeccion_requerida' =>  $inspeccion_requerida,
              'estado_rr_det'=> '1'
    
            );
      
            $rrdet = $this->callexternosreporterecepcion->ActualizaRRDet($update);
        
      
                    if($rrdet){
              
                      $error_msg = 'Linea RR actualizado correctamente.';
                      $resp =  true;
              
              
                      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                      'accion'  => 'ACTUALIZA_RR',
                      'usuario'  =>  $this->session->userdata('n_usuario'),
                      'id_registro' =>  $id_rr_det,
                      'rol' =>   $this->session->userdata('nombre_rol'),
                      'objeto'  => 'RR' ,
                      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
              
                      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                      // crea nueva linea en wpanel si cantidad recibida es menor a la cantidad solicitada

                      if($st_cantidad_recibida < $st_cantidad){

                      $diferencia = $st_cantidad - $st_cantidad_recibida;


                      $numerolineaResponse = $this->callexternosbucksheet->obtieneNumeroLinea($id_orden_compra,$cod_empresa, 0);

                      
                      $arrnumerolinea = json_decode($numerolineaResponse);
     
                          if($arrnumerolinea){
                            
                            foreach ($arrnumerolinea as $key => $value) {
                              
                              $numerolinea = $value->NumeroLinea;
                  
                            }
    
                          }  

                        //  var_dump($numerolinea);
                          // Obtiene datos del wpanel


                          $response = $this->callexternosbucksheet->obtieneBucksheetDet($cod_empresa,$id_orden_compra, $numero_linea_wpanel);

                    
                          $arrBucksheet = json_decode($response);
                      
                      
                                               
                          if ($arrBucksheet) {
                            $respuesta = true;
                      
                            foreach ($arrBucksheet as $key => $value) {
                      
                      
                      
                              $datos_bucksheet = array(
                                'COD_EMPRESA' => $cod_empresa,
                                'ID_OC' => $value->ID_OC,
                                'NUMERO_OC' => $value->NUMERO_OC,
                                'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
                                'ITEM_OC' => $value->ITEM_OC,
                                'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
                                'PROVEEDOR' => $value->PROVEEDOR,
                                'NUMERO_DE_LINEA' => $numerolinea,
                                'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
                                'ESTADO_DE_LINEA' =>  $value->ESTADO_DE_LINEA,
                                'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
                                'STOCKCODE' => $value->STOCKCODE,
                                'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
                                'UNIDADES_SOLICITADAS' => $diferencia,
                                'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
                                'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
                                'UNIDAD' => $value->UNIDAD,
                                'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
                                'REVISION' => $value->REVISION,
                                'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
                                'FECHA_LINEA_BASE' => $value->FECHA_LINEA_BASE,
                                'DIAS_ANTES_LB' => $value->DIAS_ANTES_LB,
                                'FECHA_COMIENZO_FABRICACION' => $value->FECHA_COMIENZO_FABRICACION,
                                'FECHA_COMIENZO_FABRICACION_REAL' => $value->FECHA_COMIENZO_FABRICACION_REAL,
                                'FECHA_TERMINO_FABRICACION' => $value->FECHA_TERMINO_FABRICACION,
                                'FECHA_TERMINO_FABRICACION_REAL' => $value->FECHA_TERMINO_FABRICACION_REAL,
                                'FECHA_GRANALLADO' => $value->FECHA_GRANALLADO,
                                'FECHA_GRANALLADO_REAL' => $value->FECHA_GRANALLADO_REAL,
                                'FECHA_PINTURA' => $value->FECHA_PINTURA,
                                'FECHA_PINTURA_REAL' => $value->FECHA_PINTURA_REAL,
                                'FECHA_LISTO_INSPECCION' => $value->FECHA_LISTO_INSPECCION,
                                'FECHA_LISTO_INSPECCION_REAL' => $value->FECHA_LISTO_INSPECCION_REAL,
                                
                                'FECHA_SALIDA_FABRICA' => $value->FECHA_SALIDA_FABRICA,
                                'FECHA_SALIDA_FABRICA_REAL' => $value->FECHA_SALIDA_FABRICA_REAL
                              );   
                            }

                               // Insert member data
                              $insert = $this->callexternosbucksheet->insert($datos_bucksheet);

                            
                      if ($insert) {

                         $insert_bitacora = array(
                          'codEmpresa' => $this->session->userdata('cod_emp'),
                          'accion'  => 'RR_INSERTA_WPANEL_LINEA_' . $numerolinea,
                          'id_registro' => $numerolinea,
                          'usuario'  =>  $this->session->userdata('n_usuario'),
                          'rol' =>   $this->session->userdata('nombre_rol'),
                          'objeto'  => 'RR_WPANEL',
                          'fechaCambio' =>  date_create()->format('Y-m-d')
                        );

                        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                      }


                          } 

                      
                        
                      }





                    }else{
                  
                          $error_msg = 'Inconvenientes al actualizar RR, favor reintente.';
                          $resp =  false;
                  
                        }

          }

         
  
        }

      }


      $data['resp']        = $resp;
      $data['mensaje']     = $error_msg;
   
   
  
      echo json_encode($data);
  


    }


    function ActualizarBodegaDet(){  

     
      $cod_empresa = $this->session->userdata('cod_emp');
      $id_rr_cab = $this->input->post('id_rr_cab_bod');
      $id_bodega = $this->input->post('id_bodegas_cab');
      $id_carpa = $this->input->post('id_carpa_cab');
      $id_patio = $this->input->post('id_patio_cab');
      $id_posicion = $this->input->post('id_posicion_cab');
     
      $resp = false;
      $mensaje = "";
  
  
      $data = array();
  
      $st_cantidad_recibida_valida = $this->form_validation->set_rules('id_bodegas_cab', 'id_bodegas_cab', 'required|trim');
      
      if(!$st_cantidad_recibida_valida->run()){
          
  
        $error_msg = 'Campos faltantes, favor revisar.';
        $resp =  false;
  
      
  
      }else{

      
            $update= array(

              'cod_empresa' => $cod_empresa ,
              'id_rr_cab' => $id_rr_cab ,
              'id_bodega' => $id_bodega ,
              'id_carpa' => $id_carpa ,
              'id_patio' => $id_patio ,
              'id_posicion' => $id_posicion
  
            );
      
            $rrdet = $this->callexternosreporterecepcion->ActualizarBodegaDet($update);
        
      
                    if($rrdet){
              
                      $error_msg = 'Bodega actualizada correctamente.';
                      $resp =  true;
              
              
                      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                      'accion'  => 'ACTUALIZA_RR_BODEGA',
                      'usuario'  =>  $this->session->userdata('n_usuario'),
                      'id_registro' =>  $id_rr_cab,
                      'rol' =>   $this->session->userdata('nombre_rol'),
                      'objeto'  => 'RR' ,
                      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
              
                      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                     
                    }else{
                  
                          $error_msg = 'Inconvenientes al actualizar RR, favor reintente.';
                          $resp =  false;
                  
                        }

      }
    
  
      $data['resp']        = $resp;
      $data['mensaje']     = $error_msg;
  
      echo json_encode($data);
  

    }


    function cerrarRR(){

      $codEmpresa = $this->session->userdata('cod_emp');
      $id_rr = $this->input->post('id_rr');

    // actualiza estado Cabecera

     $dataUpdate = array(	
      'estado_rr' => '1' ,
      'id_rr' => $id_rr
      );

      $cabrr= $this->callexternosreporterecepcion->actualizarCabeceraRR($dataUpdate);
      
    // Actualiza Linea de Wpanel
    
    
    $responserrdet = $this->callexternosreporterecepcion->listaRRDet($codEmpresa,$id_rr);
    $arrRRDet = json_decode($responserrdet);

    if($arrRRDet){
     
      foreach ($arrRRDet as $key => $value) {
        
        if(strlen($value->observacion_exb) < 1 || $value->observacion_exb === "" || isset($value->observacion_exb) || empty($value->observacion_exb) || is_null($value->observacion_exb)){
          $observacion_exb = 'N';
          $estado_linea_wpanel = '8';
        }else{
          $observacion_exb = 'S';  
          $estado_linea_wpanel = '9';
        }


     

        $memData = array(
          'COD_EMPRESA' => $value->cod_empresa,
          'ID_OC' =>  $value->id_orden_compra,
          'ESTADO_DE_LINEA' => $estado_linea_wpanel,
          'NUMERO_DE_LINEA' =>  $value->numero_linea_wpanel,
          'REPORTE_DE_RECEPCION_RR' =>  'RR-'.$value->id_rr_cab,
          'REPORTE_DE_EXCEPCION_EXB' => $observacion_exb,
          'INSPECCION_DE_INGENIERIA' => $value->inspeccion_requerida,
          'UNIDADES_RECIBIDAS'  => $value->st_cantidad_recibida
          
        );

        
        $response = $this->callexternosbucksheet->updateBuckSheetLinea($memData);
       

        }
   
      }

      $data['resp']        = true;
      $data['mensaje']     = 'RR Creada correctamente';
  
      echo json_encode($data);




    }

    function muestraPDFRR($NumRR){

   // Obtiene todos los datos

      $archivo_qr = base_url()."global/tmp/qr_codes/QR_RR_".$NumRR.".png"; 
      $archivo_mims = base_url()."assets/dist/img/logo-mims.png";

      //Obtiene cabecera
      $rrcab = $this->callexternosreporterecepcion->obtieneCabeceraRR($NumRR);

      $arrRRcab = json_decode($rrcab);

      $codEmpresa = $this->session->userdata('cod_emp');


      if($arrRRcab){

        
        foreach ($arrRRcab as $key => $value) {

          $cod_empresa = $value->cod_empresa;
          $id_rr_recepcion = $value->id_rr_recepcion;
          $id_rr = $value->id_rr;
          $fecha_creacion = $value->fecha_creacion;
          $fecha_entrega =  $value->fecha_entrega;
          $usuario_creacion = $value->usuario_creacion;
          $id_cliente  = $value->id_cliente;
          $descripcion_cliente  = $value->descripcion_cliente;
          $descripcion_proyecto = $value->descripcion_proyecto;
          $id_proyecto = $value->id_proyecto;
          $id_orden_compra = $value->id_orden_compra;
          $id_orden_cliente = $value->id_orden_cliente;
          $descripcion_orden = $value->descripcion_orden;
          $guia_despacho = $value->guia_despacho;
          $proveedor = $value->proveedor;  
        }
      }


  //Obtiene Datos Proyecto

  $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);


  $arrProyecto = json_decode($Proyecto);

  if($arrProyecto){

    foreach ($arrProyecto as $llave => $valor) {
            
      $DescripcionProyecto = $valor->NombreProyecto;

    }

  }


  //Obtiene Datos Orden
  
  $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$id_orden_compra,$codEmpresa);
  

  $arrOrden = json_decode($Orden);

  
  if($arrOrden){
    
    foreach ($arrOrden as $llave => $valor) {
            
      $PurchaseOrderID = $valor->PurchaseOrderID;
      $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
      $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

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


      $archivo_template = $this->config->item('BASE_ARCHIVOS')."templates/ReporteRRMIMS.html";
      //$archivo_final = $this->config->item('BASE_ARCHIVOS')."/reporterecepcion/".$id_rr_recepcion.".pdf";

      # Reemplazamos los valores del template

      $contenidoOriginal = file_get_contents($archivo_template);
      $contenidoRemplazado =  str_replace("[CLIENTE]",$nombreCliente,$contenidoOriginal);
      $contenidoRemplazado =  str_replace("[PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_RR]",$id_rr,$contenidoRemplazado);

      $contenidoRemplazado =  str_replace("[NOMBRE_PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ORDEN_COMPRA_CLIENTE]",$PurchaseOrderNumber,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[DESC_ORDEN_COMPRA_CLIENTE]",$PurchaseOrderDescription,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_ORDEN_COMPRA]",$PurchaseOrderID,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_USUARIO]",$this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno'),$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_EMISION]", date_create()->format('Y-m-d H:i:s'),$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[GUIA_DESPACHO]",$guia_despacho,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[PROVEEDOR]",$proveedor,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_ENTREGA]",$fecha_entrega,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[PROVEEDOR_CONTACTO]","",$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[PROVEEDOR_TELEFONO]","",$contenidoRemplazado);


      // obtiene detalles de RR


      $responserrdet = $this->callexternosreporterecepcion->listaRRDet($codEmpresa,$NumRR);
      $arrRRDet = json_decode($responserrdet);

      $det_rr ="";
      
      if($arrRRDet){
        
        foreach ($arrRRDet as $key => $value) {
          
          $det_rr .="<tr>";
          $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
          <span lang=ES>".$value->numero_linea_det."</span>
        </p>
      </td>";
      $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                <span lang=ES>".$value->item_oc."</span>
              </p>
            </td>";
      $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
          <span lang=ES>".$value->tag_number."</span>
        </p>
      </td>";
      $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                <span lang=ES>".$value->stockcode."</span>
              </p>
            </td>";

            $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
            border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                    <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
            margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                      <span lang=ES>".$value->descripcion."</span>
                    </p>
                  </td>";

                  $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->st_cantidad."</span>
                          </p>
                        </td>";      
                  
            
                  $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->st_cantidad_recibida."</span>
                          </p>
                        </td>";      

            
                  $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->id_bodega."</span>
                          </p>
                        </td>";  
                      

                              $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                              border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                      <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                              margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                        <span lang=ES>".$value->id_patio."</span>
                                      </p>
                                    </td>"; 

                                    $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                              <span lang=ES>".$value->id_posicion."</span>
                                            </p>
                                          </td>"; 
                                          $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                              <span lang=ES>".$value->observacion."</span>
                                            </p>
                                          </td>"; 
                                          $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                          border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                          margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                    <span lang=ES>".$this->callutil->cambianull($value->observacion_exb)."</span>
                                                  </p>
                                                </td>"; 

                                                $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                                border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                                margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                          <span lang=ES>".$value->inspeccion_requerida."</span>
                                                        </p>
                                                      </td>"; 

        $det_rr .="</tr>";                                              
          
        }
      }

      
      //file_put_contents($archivo_template, $contenidoRemplazado);
      

      $contenidoRemplazado =  str_replace("[DETALLE_RR]",$det_rr,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[CODIGO_QR]",$archivo_qr,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[LOGO_MIMS]",$archivo_mims,$contenidoRemplazado);
      

      echo $contenidoRemplazado;


    }

    function creaPDFRR($NumRR){

      $archivo_qr = base_url()."global/tmp/qr_codes/QR_RR_".$NumRR.".png"; 
      $archivo_mims = base_url()."assets/dist/img/logo-mims.png";
      $this->generateQRRR($NumRR);

      //Obtiene cabecera
      $rrcab = $this->callexternosreporterecepcion->obtieneCabeceraRR($NumRR);

      $arrRRcab = json_decode($rrcab);

      $codEmpresa = $this->session->userdata('cod_emp');


      if($arrRRcab){

        
        foreach ($arrRRcab as $key => $value) {

          $cod_empresa = $value->cod_empresa;
          $id_rr_recepcion = $value->id_rr_recepcion;
          $id_rr = $value->id_rr;
          $fecha_creacion = $value->fecha_creacion;
          $fecha_entrega =  $value->fecha_entrega;
          $usuario_creacion = $value->usuario_creacion;
          $id_cliente  = $value->id_cliente;
          $descripcion_cliente  = $value->descripcion_cliente;
          $descripcion_proyecto = $value->descripcion_proyecto;
          $id_proyecto = $value->id_proyecto;
          $id_orden_compra = $value->id_orden_compra;
          $id_orden_cliente = $value->id_orden_cliente;
          $descripcion_orden = $value->descripcion_orden;
          $guia_despacho = $value->guia_despacho;
          $proveedor = $value->proveedor;  
        }
      }


  //Obtiene Datos Proyecto

  $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);


  $arrProyecto = json_decode($Proyecto);

  if($arrProyecto){

    foreach ($arrProyecto as $llave => $valor) {
            
      $DescripcionProyecto = $valor->NombreProyecto;

    }

  }


  //Obtiene Datos Orden
  
  $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$id_orden_compra,$codEmpresa);
  

  $arrOrden = json_decode($Orden);

  
  if($arrOrden){
    
    foreach ($arrOrden as $llave => $valor) {
            
      $PurchaseOrderID = $valor->PurchaseOrderID;
      $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
      $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

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


      $archivo_template = $this->config->item('BASE_ARCHIVOS')."templates/ReporteRRMIMS.html";
      //$archivo_final = $this->config->item('BASE_ARCHIVOS')."/reporterecepcion/".$id_rr_recepcion.".pdf";

      # Reemplazamos los valores del template

      $contenidoOriginal = file_get_contents($archivo_template);
      $contenidoRemplazado =  str_replace("[CLIENTE]",$nombreCliente,$contenidoOriginal);
      $contenidoRemplazado =  str_replace("[PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_RR]",$id_rr,$contenidoRemplazado);

      $contenidoRemplazado =  str_replace("[NOMBRE_PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ORDEN_COMPRA_CLIENTE]",$PurchaseOrderNumber,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[DESC_ORDEN_COMPRA_CLIENTE]",$PurchaseOrderDescription,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_ORDEN_COMPRA]",$PurchaseOrderID,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_USUARIO]",$this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno'),$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_EMISION]", date_create()->format('Y-m-d H:i:s'),$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[GUIA_DESPACHO]",$guia_despacho,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[PROVEEDOR]",$proveedor,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_ENTREGA]",$fecha_entrega,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[PROVEEDOR_CONTACTO]","",$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[PROVEEDOR_TELEFONO]","",$contenidoRemplazado);


      // obtiene detalles de RR


      $responserrdet = $this->callexternosreporterecepcion->listaRRDet($codEmpresa,$NumRR);
      $arrRRDet = json_decode($responserrdet);

      $det_rr ="";
      
      if($arrRRDet){
        
        foreach ($arrRRDet as $key => $value) {
          
          $det_rr .="<tr>";
          $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
          <span lang=ES>".$value->numero_linea_det."</span>
        </p>
      </td>";
      $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                <span lang=ES>".$value->item_oc."</span>
              </p>
            </td>";
      $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
          <span lang=ES>".$value->tag_number."</span>
        </p>
      </td>";
      $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                <span lang=ES>".$value->stockcode."</span>
              </p>
            </td>";

            $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
            border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                    <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
            margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                      <span lang=ES>".$value->descripcion."</span>
                    </p>
                  </td>";

                  $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->st_cantidad."</span>
                          </p>
                        </td>";      
                  
            
                  $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->st_cantidad_recibida."</span>
                          </p>
                        </td>";      

            
                  $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->id_bodega."</span>
                          </p>
                        </td>";  
                      

                              $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                              border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                      <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                              margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                        <span lang=ES>".$value->id_patio."</span>
                                      </p>
                                    </td>"; 

                                    $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                              <span lang=ES>".$value->id_posicion."</span>
                                            </p>
                                          </td>"; 
                                          $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                              <span lang=ES>".$value->observacion."</span>
                                            </p>
                                          </td>"; 
                                          $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                          border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                          margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                    <span lang=ES>".$this->callutil->cambianull($value->observacion_exb)."</span>
                                                  </p>
                                                </td>"; 

                                                $det_rr .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                                border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                                margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                          <span lang=ES>".$value->inspeccion_requerida."</span>
                                                        </p>
                                                      </td>"; 

        $det_rr .="</tr>";                                              
          
        }
      }

      
      //file_put_contents($archivo_template, $contenidoRemplazado);
      

      $contenidoRemplazado =  str_replace("[DETALLE_RR]",$det_rr,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[CODIGO_QR]",$archivo_qr,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[LOGO_MIMS]",$archivo_mims,$contenidoRemplazado);
      

     
      //finamos un nombre para el archivo. No es necesario agregar la extension .pdf
      $filename   = $NumRR . "-" . time(); // 5dab1961e93a7-1571494241
      // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
      
      $this->callutil->generatePDF($NumRR,$contenidoRemplazado, $filename, true, 'legal', 'landscape', 1);




    }

    public function generateQRRR($num)
    {
      $qr_code_config = array();
      $qr_code_config['cacheable'] = $this->config->item('cacheable');
      $qr_code_config['cachedir'] = $this->config->item('cachedir');
      $qr_code_config['imagedir'] = $this->config->item('imagedir');
      $qr_code_config['errorlog'] = $this->config->item('errorlog');
      $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
      $qr_code_config['quality'] = $this->config->item('quality');
      $qr_code_config['size'] = $this->config->item('size');
      $qr_code_config['black'] = $this->config->item('black');
      $qr_code_config['white'] = $this->config->item('white');
      $this->ci_qr_code->initialize($qr_code_config);

      $image_name = "QR_RR_".$num . ".png";


      $params['data'] =  base_url() . 'index.php/Bodega/muestraPDFRR/'.$num;
      $params['level'] = 'H';
      $params['size'] = 2;

      $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
      $this->ci_qr_code->generate($params);

      $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;

    }



    public function crearRE(){


      $number = 0; 
      $codEmpresa = $this->session->userdata('cod_emp');
     
      
    
    
        // Obtiene select Clientes
    
        $clientes = $this->callexternosclientes->listaClientes($codEmpresa);
    
        $arrClientes = json_decode($clientes);
    
        $htmlclientes = "";
        
        $htmlclientes .= '<select class="form-control" id="clientes">';
        $htmlclientes .= '<option value="">Seleccione</option>';
        
        foreach ($arrClientes as $key => $value) {
    
          $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
        
        }
    
        $htmlclientes .= '</select>';
        $datos['select_clientes'] = $htmlclientes;
    
    
        // Obtiene select Proyectos
    
        $htmlproyectos = "";
    
        $htmlproyectos .= '<select class="form-control" id="proyectos">';
        $htmlproyectos .= '<option value="">Seleccione</option>';
        $htmlproyectos .= '</select>';
        $datos['select_proyectos'] = $htmlproyectos;
    
    
    
        // Obtiene select Ordenes
    
        $htmlordenes = "";
    
        $htmlordenes .= '<select class="form-control" id="ordenes">';
        $htmlordenes .= '<option value="">Seleccione</option>';
        $htmlordenes .= '</select>';
        $datos['select_ordenes'] = $htmlordenes;
  


        // Obtiene select SKU
    
        $htmlsku = "";
    
        $htmlsku .= '<select class="form-control" id="sku">';
        $htmlsku .= '<option value="">Seleccione</option>';
        $htmlsku .= '</select>';
        $datos['select_sku'] = $htmlsku;
  
  
           // Obtiene select Proveedores
        
           $htmlproveedores = "";
        
           $htmlproveedores .= '<select class="form-control" id="proveedores">';
           $htmlproveedores .= '<option value="">Seleccione</option>';
           $htmlproveedores .= '</select>';
           $datos['select_proveedores'] = $htmlproveedores;


        // Obtiene select tagNumber
    
          $htmltagNumber = "";
    
          $htmltagNumber .= '<select class="form-control" id="tagnumber">';
          $htmltagNumber .= '<option value="">Seleccione</option>';
          $htmltagNumber .= '</select>';
          $datos['select_tagnumber'] = $htmltagNumber;


           // Obtiene select Descripcion
    
           $htmldescripcion = "";
    
           $htmldescripcion .= '<select class="form-control" id="descripcion">';
           $htmldescripcion .= '<option value="">Seleccione</option>';
           $htmldescripcion .= '</select>';
           $datos['select_descripcion'] = $htmldescripcion;
    
    
    
        $this->plantilla_bodega('bodega/crearRE', $datos);
    
    
      }















//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function index_man_bodega(){


  $codEmpresa = $this->session->userdata('cod_emp');
  $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);

  $menu = $this->callutil->armaMenuClientes($response);

 
  $datos['arrClientes'] = $menu ;


    // Datos Empresas

    $responseEmpresas = $this->callexternosempresas->obtieneEmpresas($codEmpresa);
    $respuesta = false;

    $arrEmpresas = json_decode($responseEmpresas);

    if($arrEmpresas){
      $respuesta = true;
      
      foreach ($arrEmpresas as $key => $value) {

        $nombreEmpresa = $value->nombre;
        $razonSocial = $value->razon_social;
        
      }
    }





    $datos['nombreEmpresa'] = $nombreEmpresa;
    $datos['razonSocial'] = $razonSocial;

    if ($this->session->userdata('rol_id')==='202'){


      $this->plantilla_activador('mantenedores/listBodegas', $datos);

    }elseif($this->session->userdata('rol_id')==='204'){

      $this->plantilla_ingenieria('mantenedores/listBodegas', $datos);

    
    }elseif($this->session->userdata('rol_id')==='206'){

      $this->plantilla_ingenieria('mantenedores/listBodegas', $datos);

    }

  

}


function obtieneBodegas(){


  $codEmpresa = $this->input->post('codEmpresa');
  $responseBodegas = $this->callexternosbodegas->obtieneBodegas($codEmpresa);


  $datos_bodegas=array();
  $respuesta = false;

  $arrBodegas= json_decode($responseBodegas);
 
  if($arrBodegas){
    $respuesta = true;
    
    foreach ($arrBodegas as $key => $value) {

      $datos_bodegas[] = array(
        'codEmpresa'=> $this->callutil->cambianull($value->codEmpresa),
        'id_bodega'=> $this->callutil->cambianull($value->id_bodega),
        'nombre_bodega'=> $this->callutil->cambianull($value->nombre_bodega),
      );
    }
  }

  $datos['bodegas'] = $datos_bodegas;
  $datos['resp']      = $respuesta;

  echo json_encode($datos);
  

}

function agregarBodega(){  

  
  $codEmpresa  = $this->input->post('codEmpresa');  
  $nombre_bodega      = $this->input->post('nombre_bodega');

  
  $resp = false;
  $mensaje = "";




  $data = array();

  $nombre = $this->form_validation->set_rules('nombre_bodega', 'Nombre Bodega', 'required|trim');
 
  
  if(!$nombre->run()){
      
    $data['resp']     = false;
    $data['mensaje']  = "Campos faltantes, favor revisar.";
  

  }else{

    $insert= array(
      'codEmpresa'  => $codEmpresa,  
      'nombre_bodega'      => $nombre_bodega
    );

    $bodega = $this->callexternosbodegas->agregarBodega($insert);
    $bodegains = json_decode($bodega) ;
      
    $resp =  $bodegains->resp;
    $idInsertado = $bodegains->id_insertado;

    

    if($resp){

      $error_msg = 'Bodega creado correctamente.';
      $resp =  true;


      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'INSERTA_BODEGA',
      'id_registro' =>  $idInsertado,
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'BODEGA' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
      

    }else{

      $error_msg = 'Inconvenientes al crear bodega, favor reintente.';
      $resp =  false;

    }

}

  $data['resp']        = $resp;
  $data['mensaje']     = $error_msg;
  $data['idInsertado'] = $idInsertado;


  echo json_encode($data);

}

function obtieneBodega(){

  $id_bodega = $this->input->post('id_bodega');
  $codEmpresa = $this->session->userdata('cod_emp');

  $responseBodega= $this->callexternosbodegas->obtieneBodega($codEmpresa,$id_bodega);
  $respuesta = false;

  $arrBodega = json_decode($responseBodega);
 
  $datos_bodega = array();

  if($arrBodega){
    
    foreach ($arrBodega as $key => $value) {

      $datos_bodega = array(
        'codEmpresa'=> $this->callutil->cambianull($value->codEmpresa),
        'id_bodega'=> $this->callutil->cambianull($value->id_bodega),
        'nombre_bodega'=> $this->callutil->cambianull($value->nombre_bodega),
      );
      
      
    }
  }

  echo json_encode($datos_bodega);



}


function editarBodega(){  

  $codEmpresa  = $this->input->post('codEmpresa');  
  $id_bodega = $this->input->post('id_bodega');  
  $nombre_bodega      = $this->input->post('nombre_bodega');

  $resp = false;
  $mensaje = "";


  $data = array();

  $nombre = $this->form_validation->set_rules('nombre_bodega', 'Nombre Bodega', 'required|trim');
 
  
  if(!$nombre->run()){
      

    $error_msg = 'Campos faltantes, favor revisar.';
    $resp =  false;

  

  }else{

    $update= array(

      'codEmpresa'  => $codEmpresa,  
      'id_bodega'  => $id_bodega,  
      'nombre_bodega'      => $nombre_bodega
    );

    $bodega = $this->callexternosbodegas->editarBodega($update);


    if($bodega){

      $error_msg = 'Bodega actualizado correctamente.';
      $resp =  true;


      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'ACTUALIZA_BODEGA',
      'id_registro' =>  $id_bodega,
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'BODEGA' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));


      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
      

    }else{

      $error_msg = 'Inconvenientes al actualizar bodega, favor reintente.';
      $resp =  false;

    }

}

  $data['resp']        = $resp;
  $data['mensaje']     = $error_msg;


  echo json_encode($data);

}

function eliminaBodega(){  


  $id_bodega = $this->input->post('id_bodega');  
  $codEmpresa = $this->session->userdata('cod_emp');
  $resp = false;
  $mensaje = "";


 
    $proveedor = $this->callexternosbodegas->eliminaBodega($codEmpresa,$id_bodega);
  

    if($proveedor){

      $resp = true;
      $mensaje = "Bodega Eliminado correctamente";


      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'ELIMINA_BODEGA',
      'id_registro' =>  $id_bodega,
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'BODEGA' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));


      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

    }else{

      $resp = false;
      $mensaje = "Error al Eliminar proveedor, datos sin actualizar";
    }



    $data['resp']       = $resp;
    $data['mensaje']    = $mensaje;
    
    


   
  echo json_encode($data);



}






    

}
