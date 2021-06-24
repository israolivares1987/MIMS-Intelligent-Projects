<?php
class ReporteEntrega extends MY_Controller{
  
  
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
    $this->load->library('CallExternosReporteEntrega');

    
    $this->load->library('ci_qr_code');
    $this->config->load('qr_code');
    $this->load->helper('file');
    

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

  }


  function listaRRDetForREFinal(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $codigoProyecto = $this->input->post('codigoProyecto');
    $codigoCliente = $this->input->post('codigoCliente');
    $orden = $this->input->post('orden');
    $sku = $this->input->post('sku');
    $proveedor = $this->input->post('proveedor');
    $tagnumber = $this->input->post('tagnumber');
    $descripcion = $this->input->post('descripcion');

    $responserrdet = $this->callexternosreporteentrega->listaRRDetForREFinal($codEmpresa,$codigoCliente,$codigoProyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion);

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
       
      if ($value->saldo > 0){ 

        $datos_rrdet[] = array(
          'stockcode' => $value->stockcode,
          'descripcion' => $value->descripcion,
          'st_cantidad' => $value->st_cantidad,
          'st_cantidad_recibida' => $value->st_cantidad_recibida,
          'saldo' => $value->saldo
        );
      }

       
        
        
      }
    }

    $datos['rr_dets'] = $datos_rrdet;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }



  function listaRRDetForRE(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $codigoProyecto = $this->input->post('codigoProyecto');
    $codigoCliente = $this->input->post('codigoCliente');
    $orden = $this->input->post('orden');
    $sku = $this->input->post('sku');
    $proveedor = $this->input->post('proveedor');
    $tagnumber = $this->input->post('tagnumber');
    $descripcion = $this->input->post('descripcion');

    $responserrdet = $this->callexternosreporteentrega->listaRRDetForRE($codEmpresa,$codigoCliente,$codigoProyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion);

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
          'id_rr_det' => $value->id_rr_det,
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
          'saldo' => $value->saldo,
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
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }



  public function agregarRE(){


		if($this->input->is_ajax_request()){

        $datos  = $this->input->post('datos');
        $codEmpresa = $this->session->userdata('cod_emp');
        $id_cliente  = $this->input->post('cliente');
        $id_proyecto  = $this->input->post('proyecto');
        $respuesta = false;
        $mensaje_error = "";
        $nombre = $this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno');
         
        $datos_bucksheet = array();

          
          //Obtiene Datos Proyecto

                 $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);
                 $arrProyecto = json_decode($Proyecto);
             
                 if($arrProyecto){
       
                   foreach ($arrProyecto as $llave => $valor) {
                           
                     $DescripcionProyecto = $valor->NombreProyecto;
             
                   }
               
                 }
          

          //Crea Cabecera RE

          $insertcab= array(
            'cod_empresa' => $codEmpresa,
            'id_cliente' => $id_cliente,
            'id_proyecto' => $id_proyecto,
            'emisor_re' =>   $nombre,
            'estado_re' =>   1,
            'descripcion_proyecto' => $DescripcionProyecto,
            'fecha_emision' => date_create()->format('Y-m-d'),
            'fecha_solicitud' => date_create()->format('Y-m-d'),
            'estado_re_sistema' => 1,

          );


          $rrcab = $this->callexternosreporteentrega->agregarRE($insertcab);
          $rrins = json_decode($rrcab) ;
        
          $resp =  $rrins->resp;
          $idInsertado = $rrins->id_insertado;

          $i = 1;
          $num = 1;

          foreach ($datos as $v) {




            $ordenCompra = $this->callexternosreporteentrega->obtienePrimeraOrden($codEmpresa, $id_cliente, $id_proyecto,$v[1]);

            $arrordenCompra = json_decode($ordenCompra);
             
                 if($arrordenCompra){
       
                   foreach ($arrordenCompra as $llave => $valor) {
                           
                     $ultimaorden = $valor->id_orden_compra;
             
                   }
               
                 }


            $datosRRdet = $this->callexternosreporteentrega->obtieneDatosRROrden($codEmpresa,$id_cliente, $id_proyecto,$ultimaorden,$v[1]);
            $arrdatosRRdet = json_decode($datosRRdet);
             
            if($arrdatosRRdet){
  
              foreach ($arrdatosRRdet as $llave => $valor) {
                      
                

                $rrdet = $this->callexternosreporterecepcion->obtieneRRDet($codEmpresa,$valor->id_rr_det,$valor->id_rr_cab);
                $respuesta = false;
            
            
                $arrRR = json_decode($rrdet);
               
                $datos_rr = array();
            
                if($arrRR){
    
                  
                  foreach ($arrRR as $key => $value) {
                    
    
                    $re_det=array(
                      'cod_empresa' => $codEmpresa,
                      'numero_linea_det' => $num,
                      'id_re_cab' => $idInsertado,
                      'id_orden_compra' => $ultimaorden,
                      'id_rr_cab' => $value->id_rr_cab,
                      'id_rr_det' => $value->id_rr_det,
                      'item_oc' => '',
                      'tag_number' => $value->tag_number,
                      'stockcode' =>  $value->stockcode,
                      'descripcion' => $value->descripcion,
                      'st_cantidad_recibida' => $v[4],
                      'st_cantidad_entregada' => '0',
                      'st_cantidad_saldo' => '0',
                      'id_bodega' => $value->id_bodega,
                      'id_patio' => $value->id_patio,
                      'id_posicion' => $value->id_posicion,
                      'observacion' => $value->observacion,
                      'estado_re_det' => '1',
                      'observacion_exb' => $value->observacion_exb,
                      'observacion_II' => $value->inspeccion_requerida
      
                      );
                  }
                }

        
              }
          
            }


                $num++; 
           
                $redet = $this->callexternosreporteentrega->agregarREDet($re_det);
                $redetins = json_decode($redet) ;
                $respdet =  $redetins->resp;
                $idInsertadodet = $redetins->id_insertado;
                $respuesta= true; 

          



              

                

        }


        $datos['respuesta'] = $respuesta;
        $datos['idInsertado'] = $idInsertado;
        $datos['error'] = $mensaje_error;


			
      echo json_encode($datos);
      
		}else{
			show_404();
	}

}

public function crearREDet($NumRR){

  //Obtiene cabecera
  $recab = $this->callexternosreporteentrega->obtieneCabeceraRE($NumRR);

  $arrRecab = json_decode($recab);

  $codEmpresa = $this->session->userdata('cod_emp');
 

  if($arrRecab){
 
    
    foreach ($arrRecab as $key => $value) {

      $id_re = $value->id_re;
      $cod_empresa = $value->cod_empresa;
      $id_proyecto = $value->id_proyecto;
      $descripcion_proyecto = $value->descripcion_proyecto;
      $area_proyecto = $value->area_proyecto;
      $descripcion_area = $value->descripcion_area;
      $fecha_emision = $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_emision));
      $emisor_re = $value->emisor_re;
      $estado_re = $value->estado_re;
      $solicitante = $value->solicitante;
      $identificacion_solicitante = $value->identificacion_solicitante;
      $cargo_solicitante = $value->cargo_solicitante;
      $fecha_solicitud = $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_solicitud));
      $entrega_directa = $value->entrega_directa;
      $fecha_entrega_sitio = $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_entrega_sitio));
      $fecha_completada_usuario = $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_completada_usuario));
      $lugar_fisico = $value->lugar_fisico;
      $estado_re_sistema = $value->estado_re_sistema;
    }
  }

    $datos['id_re'] = $id_re;

    $this->plantilla_bodega('bodega/crearREDet', $datos);


  }

  public function JSON_Filtros_RE(){

		if($this->input->is_ajax_request()){

        $codEmpresa = $this->session->userdata('cod_emp');
        $id_clientes  = $this->input->post('id_clientes');
        $id_proyecto  = $this->input->post('id_proyecto');
        $orden = $this->input->post('orden');
        $sku = $this->input->post('sku');
        $proveedor = $this->input->post('proveedor');
        $tagnumber = $this->input->post('tagnumber');
        $descripcion = $this->input->post('descripcion');

        // Obtiene select Ordenes

        $filtros = $this->callexternosreporteentrega->obtieneFiltrosRE($codEmpresa,$id_clientes,$id_proyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion);

        $arrFiltro = json_decode($filtros);

        

        $ordenRR = $arrFiltro->ordenRR;
        $skuRR = $arrFiltro->skuRR;
        $proveedorRR = $arrFiltro->proveedorRR;
        $tagnumberRR = $arrFiltro->tagnumberRR;
        $descripcionRR = $arrFiltro->descripcionRR; 


      
 
        $htmlordenes = "";
        
        $htmlordenes .= '<select class="form-control" id="ordenes">';
        $htmlordenes .= '<option value="">Seleccione</option>';
        
        foreach ($ordenRR as $key => $value) {

          $htmlordenes .= '<option data-name="'.trim($value->filtro).'" value="'.$value->filtro.'">'.$value->filtro.'</option>';
        
        }

        $htmlordenes .= '</select>';


          // Obtiene select SKU
    
          $htmlsku = "";
    
          $htmlsku .= '<select class="form-control" id="sku">';
          $htmlsku .= '<option value="">Seleccione</option>';

          foreach ($skuRR as $key => $value) {

            $htmlsku .= '<option data-name="'.trim($value->filtro).'" value="'.$value->filtro.'">'.$value->filtro.'</option>';
          
          }

          $htmlsku .= '</select>';

    
    
          // Obtiene select Proveedores
      
          $htmlproveedores = "";
      
          $htmlproveedores .= '<select class="form-control" id="proveedores">';
          $htmlproveedores .= '<option value="">Seleccione</option>';

          foreach ($proveedorRR as $key => $value) {

            $htmlproveedores .= '<option data-name="'.trim($value->filtro).'" value="'.$value->filtro.'">'.$value->filtro.'</option>';
          
          }

          $htmlproveedores .= '</select>';



      // Obtiene select tagNumber

        $htmltagNumber = "";

        $htmltagNumber .= '<select class="form-control" id="tagnumber">';
        $htmltagNumber .= '<option value="">Seleccione</option>';

        foreach ($tagnumberRR as $key => $value) {

          $htmltagNumber .= '<option data-name="'.trim($value->filtro).'" value="'.$value->filtro.'">'.$value->filtro.'</option>';
        
        }


        $htmltagNumber .= '</select>';


          // Obtiene select Descripcion

          $htmldescripcion = "";

          $htmldescripcion .= '<select class="form-control" id="descripcion">';
          $htmldescripcion .= '<option value="">Seleccione</option>';

          foreach ($descripcionRR as $key => $value) {

            $htmldescripcion .= '<option data-name="'.trim($value->filtro).'" value="'.$value->filtro.'">'.$value->filtro.'</option>';
          
          }


          $htmldescripcion .= '</select>';



			$todo = array(	
							'ordenes' 	=> $htmlordenes,
              'sku' 	=> $htmlsku,
              'proveedores' 	=> $htmlproveedores,
              'tagnumber' 	=> $htmltagNumber,
              'descripcion' 	=> $htmldescripcion
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
  }


  function listaREDet(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $id_re = $this->input->post('id_re');
    $responseredet = $this->callexternosreporteentrega->listaREDet($codEmpresa,$id_re);
    $respuesta = false;
    $boton_activo  = false;
    $count = 0;
    $count_estados= 0;

    $arrREDet = json_decode($responseredet);
   

    $datos_redet = array();

    if($arrREDet){
      $respuesta = true;
      
      foreach ($arrREDet as $key => $value) {
        
        $count = $count +1;
        $saldo = $value->st_cantidad_recibida - $value->st_cantidad_entregada;

        $datos_redet[] = array(
          'id_re_det' => $value->id_re_det,
          'cod_empresa' => $value->cod_empresa,
          'numero_linea_det' => $value->numero_linea_det,
          'id_re_cab' => $value->id_re_cab,
          'id_orden_compra' => $value->id_orden_compra,
          'item_oc' => $value->item_oc,
          'tag_number' => $value->tag_number,
          'stockcode' => $value->stockcode,
          'descripcion' => $value->descripcion,
          'st_cantidad_recibida' => $value->st_cantidad_recibida,
          'st_cantidad_entregada' => $value->st_cantidad_entregada,
          'st_cantidad_saldo' =>  $saldo,
          'id_bodega' => $value->id_bodega,
          'id_patio' => $value->id_patio,
          'id_posicion' => $value->id_posicion,
          'observacion' => $value->observacion,
          'estado_re_det' => $value->estado_re_det,
          'observacion_exb' => $value->observacion_exb,
          'observacion_II' => $value->observacion_II          
        );

        if ($value->estado_re_det === '2'){

          $count_estados = $count_estados + 1;

        }
        
        
      }
    }

    if($count_estados == $count){

      $boton_activo= true;

    }else{

      $boton_activo= false;
    }

    $datos['re_dets'] = $datos_redet;
    $datos['botonCierre'] = $boton_activo;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }


function ActualizaCabRE(){


     
    $cod_empresa = $this->session->userdata('cod_emp');
    $id_re = $this->input->post('id_re');
    $area_proyecto = $this->input->post('area_proyecto');
    $descripcion_area = $this->input->post('descripcion_area');
    $solicitante = $this->input->post('solicitante');
    $identificacion_solicitante = $this->input->post('identificacion_solicitante');
    $cargo_solicitante = $this->input->post('cargo_solicitante');
    $fecha_solicitud = $this->callutil->formatoFecha($this->input->post('fecha_solicitud'));
    $entrega_directa = $this->input->post('entrega_directa');
    $fecha_entrega_sitio = $this->callutil->formatoFecha($this->input->post('fecha_entrega_sitio'));
    $fecha_completada_usuario = $this->callutil->formatoFecha($this->input->post('fecha_completada_usuario'));
    $lugar_fisico = $this->input->post('lugar_fisico');
   
    $resp = false;
    $mensaje = "";


    $data = array();

    $area_proyecto_valida = $this->form_validation->set_rules('area_proyecto', 'area_proyecto', 'required|trim');
    $solicitante_valida = $this->form_validation->set_rules('solicitante', 'solicitante', 'required|trim');
    
    if(!$area_proyecto_valida->run() || !$solicitante_valida->run()){
        

      $error_msg = 'Campos faltantes, favor revisar.';
      $resp =  false;

    

    }else{

    
          $update= array(

            'id_re' => $id_re,
            'cod_empresa' => $cod_empresa,
            'area_proyecto' => $area_proyecto,
            'descripcion_area' => $descripcion_area,
            'solicitante' => $solicitante,
            'identificacion_solicitante' => $identificacion_solicitante,
            'cargo_solicitante' => $cargo_solicitante,
            'fecha_solicitud' => $fecha_solicitud,
            'entrega_directa' => $entrega_directa,
            'fecha_entrega_sitio' => $fecha_entrega_sitio,
            'fecha_completada_usuario' => $fecha_completada_usuario,
            'lugar_fisico' => $lugar_fisico
           

          );
    
          $rrdet = $this->callexternosreporteentrega->ActualizaCabRE($update);


      
    
                  if($rrdet){
            
                    $error_msg = 'Información de Reserva Actualizada Correctamente';
                    $resp =  true;
            
            
                    $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                    'accion'  => 'ACTUALIZA_RE_CABECERA',
                    'usuario'  =>  $this->session->userdata('n_usuario'),
                    'id_registro' =>  $id_re,
                    'rol' =>   $this->session->userdata('nombre_rol'),
                    'objeto'  => 'RE' ,
                    'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
            
                    $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

                   
                  }else{
                
                        $error_msg = 'Inconvenientes al actualizar RE, favor reintente.';
                        $resp =  false;
                
                      }

    }
  

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;

    echo json_encode($data);


  }


  public function obtieneCabRE(){


    $id_re = $this->input->post('id_re');
    //Obtiene cabecera
    $recab = $this->callexternosreporteentrega->obtieneCabeceraRE($id_re);
  
    $arrRecab = json_decode($recab);
    $resp = false;
   
  
    if($arrRecab){
   
      
      foreach ($arrRecab as $key => $value) {



        $datos_redet[] = array(

        'id_re' => $value->id_re,
        'cod_empresa' => $value->cod_empresa,
        'id_proyecto' => $value->id_proyecto,
        'descripcion_proyecto' => $value->descripcion_proyecto,
        'area_proyecto' => $value->area_proyecto,
        'descripcion_area' => $value->descripcion_area,
        'fecha_emision' => $value->fecha_emision,
        'emisor_re' => $value->emisor_re,
        'estado_re' => $value->estado_re,
        'solicitante' => $value->solicitante,
        'identificacion_solicitante' => $value->identificacion_solicitante,
        'cargo_solicitante' => $value->cargo_solicitante,
        'fecha_solicitud' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_solicitud)),
        'entrega_directa' => $value->entrega_directa,
        'fecha_entrega_sitio' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_entrega_sitio)),
        'fecha_completada_usuario' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_completada_usuario)),
        'lugar_fisico' => $value->lugar_fisico,
        'estado_re_sistema' => $value->estado_re_sistema,
        'select_entrega_directa' => $this->callutil->obtiene_select_def_act('entrega_directa',$value->entrega_directa,'SI_NO')

        );

        $resp = true;
        
      }
    }

   
    $datos['re_dets'] = $datos_redet;
    $datos['resp']      = $resp;

    echo json_encode($datos);

    
  
  
    }


    function obtieneREDet(){


      $codEmpresa = $this->session->userdata('cod_emp');
      $id_re = $this->input->post('id_re');
      $id_det_re = $this->input->post('id_det_re');

      
      $responseredet = $this->callexternosreporteentrega->obtieneREDet($codEmpresa,$id_re,$id_det_re);
      $respuesta = false;
      $boton_activo  = false;
      $count = 0;
      $count_estados= 0;
  
      $arrREDet = json_decode($responseredet);
     
      $datos_redet = array();
  
      if($arrREDet){
        $respuesta = true;
        
        foreach ($arrREDet as $key => $value) {
          
          $count = $count +1;
          $saldo = $value->st_cantidad_recibida - $value->st_cantidad_entregada;
  
          $datos_redet[] = array(
            'id_re_det' => $value->id_re_det,
            'cod_empresa' => $value->cod_empresa,
            'numero_linea_det' => $value->numero_linea_det,
            'id_re_cab' => $value->id_re_cab,
            'id_orden_compra' => $value->id_orden_compra,
            'item_oc' => $value->item_oc,
            'tag_number' => $value->tag_number,
            'stockcode' => $value->stockcode,
            'descripcion' => $value->descripcion,
            'st_cantidad_recibida' => $value->st_cantidad_recibida,
            'st_cantidad_entregada' => $value->st_cantidad_entregada,
            'st_cantidad_saldo' =>  $saldo,
            'id_bodega' => $value->id_bodega,
            'id_patio' => $value->id_patio,
            'id_posicion' => $value->id_posicion,
            'observacion' => $value->observacion,
            'estado_re_det' => $value->estado_re_det,
            'observacion_exb' => $value->observacion_exb,
            'observacion_II' => $value->observacion_II          
          );

          
        }
      }
  
      $datos['re_dets'] = $datos_redet;
      $datos['resp']      = $respuesta;
  
      echo json_encode($datos);
      
    
    }


    function ActualizaREDet(){
             

      $cod_empresa = $this->session->userdata('cod_emp');
      $id_re_det = $this->input->post('id_re_det');
      $id_re_cab = $this->input->post('id_re_cab');
      $st_cantidad_entregada = $this->input->post('st_cantidad_entregada');
      $stockcode = $this->input->post('stockcode');
      


      
     
      $resp = false;
      $error_msg = "";
  
  
      $data = array();
  
      $st_cantidad_entregada_valida = $this->form_validation->set_rules('st_cantidad_entregada', 'st_cantidad_entregada', 'required|trim');

      if(!$st_cantidad_entregada_valida->run() ){
          
  
        $error_msg = 'Campos faltantes, favor revisar.';
        $resp =  false;
  
      
  
      }else{
  
            $saldoResp = $this->callexternosreporteentrega->obtieneSaldoStockCode($cod_empresa,$stockcode);

            $ArrsaldoStockcode = json_decode($saldoResp);
            

            foreach ($ArrsaldoStockcode as $key => $value) {
            
            $saldoStockcode = $value->saldo;
            
          }



            
            if ($saldoStockcode == 0 || $st_cantidad_entregada > $saldoStockcode || $st_cantidad_entregada < 1){

              $resp = false;
              $error_msg = "Cantidad ingresada supera el saldo, el saldo es 0 o la cantidad ingresada es menor a 1";

            }else{

              $update= array(
  
                'id_re_det' => $id_re_det,
                'id_re_cab' => $id_re_cab,
                'st_cantidad_entregada' => $st_cantidad_entregada,
                'cod_empresa' => $cod_empresa,
                'st_cantidad_saldo' => $saldoStockcode - $st_cantidad_entregada,
                'estado_re_det' => 2
    
              );
        
              $rrdet = $this->callexternosreporteentrega->ActualizaREDet($update);
          
         
  
  
                      if($rrdet){
                
                        $error_msg = 'Detalle Información de Reserva Actualizada Correctamente';
                        $resp =  true;
                
                
                        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                        'accion'  => 'ACTUALIZA_RE_DETALLE',
                        'usuario'  =>  $this->session->userdata('n_usuario'),
                        'id_registro' =>  $id_re_det,
                        'rol' =>   $this->session->userdata('nombre_rol'),
                        'objeto'  => 'RE' ,
                        'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));
                
                        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

            
         }else{
  
          $error_msg = 'Inconvenientes al actualizar Detalle RE, favor reintente.';
          $resp =  false;
  
        }
      }
  
      
    
  
      $data['resp']        = $resp;
      $data['mensaje']     = $error_msg;
  
      echo json_encode($data);
  




    }

  }


  function muestraReservaPDFRE($NumRR){

    // Obtiene todos los datos
 
       $archivo_qr = base_url()."global/tmp/qr_codes/QR_REV_RE_".$NumRR.".png"; 
       $archivo_mims = base_url()."assets/dist/img/logo-mims.png";
 
       //Obtiene cabecera
       $recab = $this->callexternosreporteentrega->obtieneCabeceraRE($NumRR);


 
       $arrREcab = json_decode($recab);
 
       $codEmpresa = $this->session->userdata('cod_emp');
 
 
       if($arrREcab){
 
         
         foreach ($arrREcab as $key => $value) {
 
          $id_re = $value->id_re;
          $cod_empresa = $value->cod_empresa;
          $id_cliente = $value->id_cliente;
          $id_proyecto = $value->id_proyecto;
          $descripcion_proyecto = $value->descripcion_proyecto;
          $area_proyecto = $value->area_proyecto;
          $descripcion_area = $value->descripcion_area;
          $fecha_emision = $value->fecha_emision;
          $emisor_re = $value->emisor_re;
          $estado_re = $value->estado_re;
          $solicitante = $value->solicitante;
          $identificacion_solicitante = $value->identificacion_solicitante;
          $cargo_solicitante = $value->cargo_solicitante;
          $fecha_solicitud = $value->fecha_solicitud;
          $datosEstados  = $this->callutil->obtieneDatoRef('SI_NO',$value->entrega_directa);

                foreach (json_decode($datosEstados) as $llave => $valor) {
                            
                  $entrega_directa = $valor->domain_desc;
          
                }


          $fecha_entrega_sitio = $value->fecha_entrega_sitio;
          $fecha_completada_usuario = $value->fecha_completada_usuario;
          $lugar_fisico = $value->lugar_fisico;
          $estado_re_sistema = $value->estado_re_sistema;
          
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

 
 
       $archivo_template = $this->config->item('BASE_ARCHIVOS')."templates/ReporteRESERVAREMIMS.html";
       //$archivo_final = $this->config->item('BASE_ARCHIVOS')."/reporterecepcion/".$id_rr_recepcion.".pdf";
 
       # Reemplazamos los valores del template
 
       $contenidoOriginal = file_get_contents($archivo_template);
       $contenidoRemplazado =  str_replace("[CLIENTE]",$nombreCliente,$contenidoOriginal);
       $contenidoRemplazado =  str_replace("[PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[ID_RE]",$id_re,$contenidoRemplazado);
 
       $contenidoRemplazado =  str_replace("[NOMBRE_PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[AREA_PROYECTO]",$area_proyecto,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[DESCRIPCION_AREA]",$descripcion_area,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[FECHA_EMISION]",$fecha_emision,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[EMISOR_RE]",$emisor_re,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[ESTADO_RE]", $estado_re,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[SOLICITANTE]",$solicitante,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[IDENTIFICACION_SOLICITANTE]",$identificacion_solicitante,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[CARGO_SOLICITANTE]",$cargo_solicitante,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[FECHA_SOLICITUD]",$fecha_solicitud,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[ENTREGA_DIRECTA]",$entrega_directa,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[FECHA_ENTREGA]",$fecha_entrega_sitio,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[LUGAR_FISICO]",$lugar_fisico,$contenidoRemplazado);
 
 
       // obtiene detalles de RR
 
 
       $responseredet = $this->callexternosreporteentrega->listaREDet($codEmpresa,$id_re);
       $arrREDet = json_decode($responseredet);
 
       $det_re ="";
       
       if($arrREDet){
         
         foreach ($arrREDet as $key => $value) {


            //Obtiene Datos Orden

  
                  $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$value->id_orden_compra,$codEmpresa);
                  
                  $arrOrden = json_decode($Orden);

                  
                  if($arrOrden){
                    
                    foreach ($arrOrden as $llave => $valor) {
                            
                      $PurchaseOrderID = $valor->PurchaseOrderID;
                      $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
                      $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

                    }   
                  
                  }
           


           $det_re .="<tr>";
           $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
 border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
         <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
 margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
           <span lang=ES>".$value->numero_linea_det."</span>
         </p>
       </td>";
       $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
       border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
               <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
       margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                 <span lang=ES>".$PurchaseOrderNumber."-".$PurchaseOrderDescription."</span>
               </p>
             </td>";
             $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
             border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                     <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
             margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                       <span lang=ES>".$value->item_oc."</span>
                     </p>
                   </td>";      
       $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
 border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
         <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
 margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
           <span lang=ES>".$value->tag_number."</span>
         </p>
       </td>";
       $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
       border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
               <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
       margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                 <span lang=ES>".$value->stockcode."</span>
               </p>
             </td>";
 
             $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
             border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                     <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
             margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                       <span lang=ES>".$value->descripcion."</span>
                     </p>
                   </td>";
 
                   $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                   border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                           <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                   margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                             <span lang=ES>".$value->st_cantidad_recibida."</span>
                           </p>
                         </td>";      
                   
             
                   $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                   border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                           <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                   margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                             <span lang=ES>".$value->st_cantidad_entregada."</span>
                           </p>
                         </td>";      
                  
                         $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                         border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                 <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                         margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                   <span lang=ES>".$value->st_cantidad_saldo."</span>
                                 </p>
                               </td>"; 
 
             
                   $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                   border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                           <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                   margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                             <span lang=ES>".$value->id_bodega."</span>
                           </p>
                         </td>";  
                       
 
                               $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                               border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                       <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                               margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                         <span lang=ES>".$value->id_patio."</span>
                                       </p>
                                     </td>"; 
 
                                     $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                     border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                             <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                     margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                               <span lang=ES>".$value->id_posicion."</span>
                                             </p>
                                           </td>"; 
                                           $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                     border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                             <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                     margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                               <span lang=ES>".$value->observacion."</span>
                                             </p>
                                           </td>"; 
                                           $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                           border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                   <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                           margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                     <span lang=ES>".$this->callutil->cambianull($value->observacion_exb)."</span>
                                                   </p>
                                                 </td>"; 
 
                                                 $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                                 border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                         <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                                 margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                           <span lang=ES>".$value->observacion_II."</span>
                                                         </p>
                                                       </td>"; 
 
         $det_re .="</tr>";                                              
           
         }
       }
 
       
       //file_put_contents($archivo_template, $contenidoRemplazado);
       
 
       $contenidoRemplazado =  str_replace("[DETALLE_RE]",$det_re,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[CODIGO_QR]",$archivo_qr,$contenidoRemplazado);
       $contenidoRemplazado =  str_replace("[LOGO_MIMS]",$archivo_mims,$contenidoRemplazado);
       
 
       echo $contenidoRemplazado;
 
 
     }


     function creaReservaPDFRE($NumRR){

     // Obtiene todos los datos
 
     $archivo_qr = base_url()."global/tmp/qr_codes/QR_REV_RE_".$NumRR.".png"; 
     $archivo_mims = base_url()."assets/dist/img/logo-mims.png";
     $this->generateQRRERESERVA($NumRR);
     //Obtiene cabecera
     $recab = $this->callexternosreporteentrega->obtieneCabeceraRE($NumRR);



     $arrREcab = json_decode($recab);

     $codEmpresa = $this->session->userdata('cod_emp');


     if($arrREcab){

       
       foreach ($arrREcab as $key => $value) {

        $id_re = $value->id_re;
        $cod_empresa = $value->cod_empresa;
        $id_cliente = $value->id_cliente;
        $id_proyecto = $value->id_proyecto;
        $descripcion_proyecto = $value->descripcion_proyecto;
        $area_proyecto = $value->area_proyecto;
        $descripcion_area = $value->descripcion_area;
        $fecha_emision = $value->fecha_emision;
        $emisor_re = $value->emisor_re;
        $estado_re = $value->estado_re;
        $solicitante = $value->solicitante;
        $identificacion_solicitante = $value->identificacion_solicitante;
        $cargo_solicitante = $value->cargo_solicitante;
        $fecha_solicitud = $value->fecha_solicitud;
        $datosEstados  = $this->callutil->obtieneDatoRef('SI_NO',$value->entrega_directa);

              foreach (json_decode($datosEstados) as $llave => $valor) {
                          
                $entrega_directa = $valor->domain_desc;
        
              }


        $fecha_entrega_sitio = $value->fecha_entrega_sitio;
        $fecha_completada_usuario = $value->fecha_completada_usuario;
        $lugar_fisico = $value->lugar_fisico;
        $estado_re_sistema = $value->estado_re_sistema;
        
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



     $archivo_template = $this->config->item('BASE_ARCHIVOS')."templates/ReporteRESERVAREMIMS.html";
     //$archivo_final = $this->config->item('BASE_ARCHIVOS')."/reporterecepcion/".$id_rr_recepcion.".pdf";

     # Reemplazamos los valores del template

     $contenidoOriginal = file_get_contents($archivo_template);
     $contenidoRemplazado =  str_replace("[CLIENTE]",$nombreCliente,$contenidoOriginal);
     $contenidoRemplazado =  str_replace("[PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[ID_RE]",$id_re,$contenidoRemplazado);

     $contenidoRemplazado =  str_replace("[NOMBRE_PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[AREA_PROYECTO]",$area_proyecto,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[DESCRIPCION_AREA]",$descripcion_area,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[FECHA_EMISION]",$fecha_emision,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[EMISOR_RE]",$emisor_re,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[ESTADO_RE]", $estado_re,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[SOLICITANTE]",$solicitante,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[IDENTIFICACION_SOLICITANTE]",$identificacion_solicitante,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[CARGO_SOLICITANTE]",$cargo_solicitante,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[FECHA_SOLICITUD]",$fecha_solicitud,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[ENTREGA_DIRECTA]",$entrega_directa,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[FECHA_ENTREGA]",$fecha_entrega_sitio,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[LUGAR_FISICO]",$lugar_fisico,$contenidoRemplazado);


     // obtiene detalles de RR


     $responseredet = $this->callexternosreporteentrega->listaREDet($codEmpresa,$id_re);
     $arrREDet = json_decode($responseredet);

     $det_re ="";
     
     if($arrREDet){
       
       foreach ($arrREDet as $key => $value) {


          //Obtiene Datos Orden


                $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$value->id_orden_compra,$codEmpresa);
                
                $arrOrden = json_decode($Orden);

                
                if($arrOrden){
                  
                  foreach ($arrOrden as $llave => $valor) {
                          
                    $PurchaseOrderID = $valor->PurchaseOrderID;
                    $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
                    $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

                  }   
                
                }
         


         $det_re .="<tr>";
         $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
       <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
         <span lang=ES>".$value->numero_linea_det."</span>
       </p>
     </td>";
     $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
     border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
             <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
     margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
               <span lang=ES>".$PurchaseOrderNumber."-".$PurchaseOrderDescription."</span>
             </p>
           </td>";
           $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
           border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                   <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
           margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                     <span lang=ES>".$value->item_oc."</span>
                   </p>
                 </td>";      
     $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
       <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
         <span lang=ES>".$value->tag_number."</span>
       </p>
     </td>";
     $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
     border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
             <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
     margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
               <span lang=ES>".$value->stockcode."</span>
             </p>
           </td>";

           $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
           border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                   <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
           margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                     <span lang=ES>".$value->descripcion."</span>
                   </p>
                 </td>";

                 $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                 border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                         <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                 margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                           <span lang=ES>".$value->st_cantidad_recibida."</span>
                         </p>
                       </td>";      
                 
           
                 $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                 border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                         <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                 margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                           <span lang=ES>".$value->st_cantidad_entregada."</span>
                         </p>
                       </td>";      
                
                       $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                       border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                               <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                       margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                 <span lang=ES>".$value->st_cantidad_saldo."</span>
                               </p>
                             </td>"; 

           
                 $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                 border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                         <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                 margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                           <span lang=ES>".$value->id_bodega."</span>
                         </p>
                       </td>";  
                     

                             $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                             border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                     <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                             margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                       <span lang=ES>".$value->id_patio."</span>
                                     </p>
                                   </td>"; 

                                   $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                   border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                           <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                   margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                             <span lang=ES>".$value->id_posicion."</span>
                                           </p>
                                         </td>"; 
                                         $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                   border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                           <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                   margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                             <span lang=ES>".$value->observacion."</span>
                                           </p>
                                         </td>"; 
                                         $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                         border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                 <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                         margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                   <span lang=ES>".$this->callutil->cambianull($value->observacion_exb)."</span>
                                                 </p>
                                               </td>"; 

                                               $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                               border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                       <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                               margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                         <span lang=ES>".$value->observacion_II."</span>
                                                       </p>
                                                     </td>"; 

       $det_re .="</tr>";                                              
         
       }
     }

     
     //file_put_contents($archivo_template, $contenidoRemplazado);
     

     $contenidoRemplazado =  str_replace("[DETALLE_RE]",$det_re,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[CODIGO_QR]",$archivo_qr,$contenidoRemplazado);
     $contenidoRemplazado =  str_replace("[LOGO_MIMS]",$archivo_mims,$contenidoRemplazado);
      

     
      //finamos un nombre para el archivo. No es necesario agregar la extension .pdf
      $filename   = $NumRR . "-" . time(); // 5dab1961e93a7-1571494241
      // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
      
      $this->callutil->generatePDF($NumRR,$contenidoRemplazado, $filename, true, 'legal', 'landscape', 1);




    }


     public function generateQRRERESERVA($num)
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
 
       $image_name = "QR_REV_RE_".$num . ".png";
 
 
       $params['data'] =  base_url() . 'index.php/ReporteEntrega/muestraReservaPDFRE/'.$num;
       $params['level'] = 'H';
       $params['size'] = 2;
 
       $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
       $this->ci_qr_code->generate($params);
 
       $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;
 
     }


     function cerrarRE(){

      $codEmpresa = $this->session->userdata('cod_emp');
      $id_re = $this->input->post('id_re');

    // actualiza estado Cabecera



     $dataUpdate = array(	
      'estado_re' => '2' ,
      'id_re' => $id_re
      );

      $cabrr= $this->callexternosreporteentrega->actualizarCabeceraRE($dataUpdate);
      
   
    
    $responseredet = $this->callexternosreporteentrega->listaREDet($codEmpresa,$id_re);
    $arrREDet = json_decode($responseredet);

    if($arrREDet){

    
      foreach ($arrREDet as $key => $value) {
        
      //Actualiza Linea RR

      $update= array(
  
        'id_rr_det' => $value->id_rr_det,
        're_generada' => $id_re
      );

      $rrdet = $this->callexternosreporterecepcion->ActualizaRRDet($update);
       

        }
   
      }

      $data['resp']        = true;
      $data['mensaje']     = 'RE Creada correctamente';
  
      echo json_encode($data);




    }


function finalizarRE(){


  $cod_usuario = $this->session->userdata('cod_user');
  $listaTodo = "";
  $number = 0; 
  $codEmpresa = $this->session->userdata('cod_emp');


    // Obtiene select Clientes

    $clientes = $this->callexternosclientes->listaClientes($codEmpresa);

    $arrClientes = json_decode($clientes);

    $htmlclientes = "";
    
    $htmlclientes .= '<select class="form-control" id="clientes">';
    $htmlclientes .= '<option value="0">Seleccione</option>';
    
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



    $this->plantilla_bodega('bodega/finalizarRE', $datos);



  }  


  function obtieneREFinal(){

    $codEmpresa = $this->session->userdata('cod_emp');
    $codigoProyecto = $this->input->post('id_proyecto');
    $codigoCliente = $this->input->post('id_cliente');
 

    $responsere= $this->callexternosreporteentrega->obtieneREFinal($codEmpresa,$codigoCliente,$codigoProyecto);
 
    $respuesta = false;


    $arrRE = json_decode($responsere);
   
    $datos_re = array();

    if($arrRE){
      $respuesta = true;
      
      foreach ($arrRE as $key => $value) {
        
        $datosDirecto  = $this->callutil->obtieneDatoRef('SI_NO',$value->entrega_directa);



        foreach (json_decode($datosDirecto) as $llave => $valor) {
                    
          $entrega_directa = $valor->domain_desc;
  
        }
        

        $datos_re[] = array(
          'id_re' => $value->id_re,
          'cod_empresa' => $value->cod_empresa,
          'id_cliente' => $value->id_cliente,
          'id_proyecto' => $value->id_proyecto,
          'descripcion_proyecto' => $value->descripcion_proyecto,
          'area_proyecto' => $value->area_proyecto,
          'descripcion_area' => $value->descripcion_area,
          'fecha_emision' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_emision)),
          'emisor_re' => $value->emisor_re,
          'estado_re' => $value->estado_re,
          'solicitante' => $value->solicitante,
          'identificacion_solicitante' => $value->identificacion_solicitante,
          'cargo_solicitante' => $value->cargo_solicitante,
          'fecha_solicitud' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_solicitud)),
          'entrega_directa' =>  $entrega_directa,
          'fecha_entrega_sitio' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_entrega_sitio)),
          'fecha_completada_usuario' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_completada_usuario)),
          'lugar_fisico' => $value->lugar_fisico,
          'estado_re_sistema' => $value->estado_re_sistema,

        );        
        
      }
    }

 

    $datos['re_final'] = $datos_re;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  

  }

  function finalizarReservaRE(){

    $codEmpresa = $this->session->userdata('cod_emp');
    $id_re = $this->input->post('id_re_final');

  // actualiza estado Cabecera



   $dataUpdate = array(	
    'estado_re' => '3' ,
    'fecha_completada_usuario' => date_create()->format('Y-m-d H:i:s'),
    'id_re' => $id_re
    );

    $cabrr= $this->callexternosreporteentrega->actualizarCabeceraRE($dataUpdate);
    
 
    if($cabrr){

      $data['resp']        = true;
      $data['mensaje']     = 'Reporte de Entrega Finalizado';
  


    }else{

      $data['resp']        = false;
      $data['mensaje']     = 'Error al Finalizar RE';
  
    }
  

  

    echo json_encode($data);




  }


  function creaFinalPDFRE($NumRR){

    // Obtiene todos los datos

    $archivo_qr = base_url()."global/tmp/qr_codes/QR_RE".$NumRR.".png"; 
    $archivo_mims = base_url()."assets/dist/img/logo-mims.png";
    $this->generateQRRE($NumRR);
    //Obtiene cabecera
    $recab = $this->callexternosreporteentrega->obtieneCabeceraRE($NumRR);



    $arrREcab = json_decode($recab);

    $codEmpresa = $this->session->userdata('cod_emp');


    if($arrREcab){

      
      foreach ($arrREcab as $key => $value) {

       $id_re = $value->id_re;
       $cod_empresa = $value->cod_empresa;
       $id_cliente = $value->id_cliente;
       $id_proyecto = $value->id_proyecto;
       $descripcion_proyecto = $value->descripcion_proyecto;
       $area_proyecto = $value->area_proyecto;
       $descripcion_area = $value->descripcion_area;
       $fecha_emision = $value->fecha_emision;
       $emisor_re = $value->emisor_re;
       $estado_re = $value->estado_re;
       $solicitante = $value->solicitante;
       $identificacion_solicitante = $value->identificacion_solicitante;
       $cargo_solicitante = $value->cargo_solicitante;
       $fecha_solicitud = $value->fecha_solicitud;
       $datosEstados  = $this->callutil->obtieneDatoRef('SI_NO',$value->entrega_directa);

             foreach (json_decode($datosEstados) as $llave => $valor) {
                         
               $entrega_directa = $valor->domain_desc;
       
             }


       $fecha_entrega_sitio = $value->fecha_entrega_sitio;
       $fecha_completada_usuario = $value->fecha_completada_usuario;
       $lugar_fisico = $value->lugar_fisico;
       $estado_re_sistema = $value->estado_re_sistema;
       
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



    $archivo_template = $this->config->item('BASE_ARCHIVOS')."templates/ReporteREMIMS.html";
    //$archivo_final = $this->config->item('BASE_ARCHIVOS')."/reporterecepcion/".$id_rr_recepcion.".pdf";

    # Reemplazamos los valores del template

    $contenidoOriginal = file_get_contents($archivo_template);
    $contenidoRemplazado =  str_replace("[CLIENTE]",$nombreCliente,$contenidoOriginal);
    $contenidoRemplazado =  str_replace("[PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[ID_RE]",$id_re,$contenidoRemplazado);

    $contenidoRemplazado =  str_replace("[NOMBRE_PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[AREA_PROYECTO]",$area_proyecto,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[DESCRIPCION_AREA]",$descripcion_area,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[FECHA_EMISION]",$fecha_emision,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[EMISOR_RE]",$emisor_re,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[ESTADO_RE]", $estado_re,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[SOLICITANTE]",$solicitante,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[IDENTIFICACION_SOLICITANTE]",$identificacion_solicitante,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[CARGO_SOLICITANTE]",$cargo_solicitante,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[FECHA_SOLICITUD]",$fecha_solicitud,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[ENTREGA_DIRECTA]",$entrega_directa,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[FECHA_ENTREGA]",$fecha_entrega_sitio,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[LUGAR_FISICO]",$lugar_fisico,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[FECHA_FINALIZADA]",$fecha_completada_usuario,$contenidoRemplazado);

    // obtiene detalles de RR


    $responseredet = $this->callexternosreporteentrega->listaREDet($codEmpresa,$id_re);
    $arrREDet = json_decode($responseredet);

    $det_re ="";
    
    if($arrREDet){
      
      foreach ($arrREDet as $key => $value) {


         //Obtiene Datos Orden


               $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$value->id_orden_compra,$codEmpresa);
               
               $arrOrden = json_decode($Orden);

               
               if($arrOrden){
                 
                 foreach ($arrOrden as $llave => $valor) {
                         
                   $PurchaseOrderID = $valor->PurchaseOrderID;
                   $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
                   $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

                 }   
               
               }
        


        $det_re .="<tr>";
        $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
      <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
        <span lang=ES>".$value->numero_linea_det."</span>
      </p>
    </td>";
    $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
              <span lang=ES>".$PurchaseOrderNumber."-".$PurchaseOrderDescription."</span>
            </p>
          </td>";
          $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
          border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
          margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                    <span lang=ES>".$value->item_oc."</span>
                  </p>
                </td>";      
    $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
      <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
        <span lang=ES>".$value->tag_number."</span>
      </p>
    </td>";
    $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
              <span lang=ES>".$value->stockcode."</span>
            </p>
          </td>";

          $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
          border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
          margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                    <span lang=ES>".$value->descripcion."</span>
                  </p>
                </td>";

                $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                          <span lang=ES>".$value->st_cantidad_recibida."</span>
                        </p>
                      </td>";      
                
          
                $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                          <span lang=ES>".$value->st_cantidad_entregada."</span>
                        </p>
                      </td>";      
               
                      $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                <span lang=ES>".$value->st_cantidad_saldo."</span>
                              </p>
                            </td>"; 

          
                $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                          <span lang=ES>".$value->id_bodega."</span>
                        </p>
                      </td>";  
                    

                            $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                            border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                    <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                            margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                      <span lang=ES>".$value->id_patio."</span>
                                    </p>
                                  </td>"; 

                                  $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                            <span lang=ES>".$value->id_posicion."</span>
                                          </p>
                                        </td>"; 
                                        $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                            <span lang=ES>".$value->observacion."</span>
                                          </p>
                                        </td>"; 
                                        $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                        border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                        margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                  <span lang=ES>".$this->callutil->cambianull($value->observacion_exb)."</span>
                                                </p>
                                              </td>"; 

                                              $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                              border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                      <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                              margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                        <span lang=ES>".$value->observacion_II."</span>
                                                      </p>
                                                    </td>"; 

      $det_re .="</tr>";                                              
        
      }
    }

    
    //file_put_contents($archivo_template, $contenidoRemplazado);
    

    $contenidoRemplazado =  str_replace("[DETALLE_RE]",$det_re,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[CODIGO_QR]",$archivo_qr,$contenidoRemplazado);
    $contenidoRemplazado =  str_replace("[LOGO_MIMS]",$archivo_mims,$contenidoRemplazado);
     

    
     //finamos un nombre para el archivo. No es necesario agregar la extension .pdf
     $filename   = $NumRR . "-" . time(); // 5dab1961e93a7-1571494241
     // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
     
     $this->callutil->generatePDF($NumRR,$contenidoRemplazado, $filename, true, 'legal', 'landscape', 1);




   }


    public function generateQRRE($num)
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

      $image_name = "QR_RE".$num . ".png";


      $params['data'] =  base_url() . 'index.php/ReporteEntrega/muestraPDFRE/'.$num;
      $params['level'] = 'H';
      $params['size'] = 2;

      $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
      $this->ci_qr_code->generate($params);

      $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;

    }


    function muestraPDFRE($NumRR){

      // Obtiene todos los datos
  
      $archivo_qr = base_url()."global/tmp/qr_codes/QR_RE_".$NumRR.".png"; 
      $archivo_mims = base_url()."assets/dist/img/logo-mims.png";
      //Obtiene cabecera
      $recab = $this->callexternosreporteentrega->obtieneCabeceraRE($NumRR);
  
  
  
      $arrREcab = json_decode($recab);
  
      $codEmpresa = $this->session->userdata('cod_emp');
  
  
      if($arrREcab){
  
        
        foreach ($arrREcab as $key => $value) {
  
         $id_re = $value->id_re;
         $cod_empresa = $value->cod_empresa;
         $id_cliente = $value->id_cliente;
         $id_proyecto = $value->id_proyecto;
         $descripcion_proyecto = $value->descripcion_proyecto;
         $area_proyecto = $value->area_proyecto;
         $descripcion_area = $value->descripcion_area;
         $fecha_emision = $value->fecha_emision;
         $emisor_re = $value->emisor_re;
         $estado_re = $value->estado_re;
         $solicitante = $value->solicitante;
         $identificacion_solicitante = $value->identificacion_solicitante;
         $cargo_solicitante = $value->cargo_solicitante;
         $fecha_solicitud = $value->fecha_solicitud;
         $datosEstados  = $this->callutil->obtieneDatoRef('SI_NO',$value->entrega_directa);
  
               foreach (json_decode($datosEstados) as $llave => $valor) {
                           
                 $entrega_directa = $valor->domain_desc;
         
               }
  
  
         $fecha_entrega_sitio = $value->fecha_entrega_sitio;
         $fecha_completada_usuario = $value->fecha_completada_usuario;
         $lugar_fisico = $value->lugar_fisico;
         $estado_re_sistema = $value->estado_re_sistema;
         
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
  
  
  
      $archivo_template = $this->config->item('BASE_ARCHIVOS')."templates/ReporteREMIMS.html";
      //$archivo_final = $this->config->item('BASE_ARCHIVOS')."/reporterecepcion/".$id_rr_recepcion.".pdf";
  
      # Reemplazamos los valores del template
  
      $contenidoOriginal = file_get_contents($archivo_template);
      $contenidoRemplazado =  str_replace("[CLIENTE]",$nombreCliente,$contenidoOriginal);
      $contenidoRemplazado =  str_replace("[PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ID_RE]",$id_re,$contenidoRemplazado);
  
      $contenidoRemplazado =  str_replace("[NOMBRE_PROYECTO]",$DescripcionProyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[AREA_PROYECTO]",$area_proyecto,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[DESCRIPCION_AREA]",$descripcion_area,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_EMISION]",$fecha_emision,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[EMISOR_RE]",$emisor_re,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ESTADO_RE]", $estado_re,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[SOLICITANTE]",$solicitante,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[IDENTIFICACION_SOLICITANTE]",$identificacion_solicitante,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[CARGO_SOLICITANTE]",$cargo_solicitante,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_SOLICITUD]",$fecha_solicitud,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[ENTREGA_DIRECTA]",$entrega_directa,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_ENTREGA]",$fecha_entrega_sitio,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[LUGAR_FISICO]",$lugar_fisico,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[FECHA_FINALIZADA]",$fecha_completada_usuario,$contenidoRemplazado);
  
      // obtiene detalles de RR
  
  
      $responseredet = $this->callexternosreporteentrega->listaREDet($codEmpresa,$id_re);
      $arrREDet = json_decode($responseredet);
  
      $det_re ="";
      
      if($arrREDet){
        
        foreach ($arrREDet as $key => $value) {
  
  
           //Obtiene Datos Orden
  
  
                 $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto,$id_cliente,$value->id_orden_compra,$codEmpresa);
                 
                 $arrOrden = json_decode($Orden);
  
                 
                 if($arrOrden){
                   
                   foreach ($arrOrden as $llave => $valor) {
                           
                     $PurchaseOrderID = $valor->PurchaseOrderID;
                     $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
                     $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
  
                   }   
                 
                 }
          
  
  
          $det_re .="<tr>";
          $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
          <span lang=ES>".$value->numero_linea_det."</span>
        </p>
      </td>";
      $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                <span lang=ES>".$PurchaseOrderNumber."-".$PurchaseOrderDescription."</span>
              </p>
            </td>";
            $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
            border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                    <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
            margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                      <span lang=ES>".$value->item_oc."</span>
                    </p>
                  </td>";      
      $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
          <span lang=ES>".$value->tag_number."</span>
        </p>
      </td>";
      $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
      border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
              <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
      margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                <span lang=ES>".$value->stockcode."</span>
              </p>
            </td>";
  
            $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
            border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                    <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
            margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                      <span lang=ES>".$value->descripcion."</span>
                    </p>
                  </td>";
  
                  $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->st_cantidad_recibida."</span>
                          </p>
                        </td>";      
                  
            
                  $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->st_cantidad_entregada."</span>
                          </p>
                        </td>";      
                 
                        $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                        border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                        margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                  <span lang=ES>".$value->st_cantidad_saldo."</span>
                                </p>
                              </td>"; 
  
            
                  $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                  border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                          <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                  margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                            <span lang=ES>".$value->id_bodega."</span>
                          </p>
                        </td>";  
                      
  
                              $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                              border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                      <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                              margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                        <span lang=ES>".$value->id_patio."</span>
                                      </p>
                                    </td>"; 
  
                                    $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                              <span lang=ES>".$value->id_posicion."</span>
                                            </p>
                                          </td>"; 
                                          $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                    border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                            <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                    margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                              <span lang=ES>".$value->observacion."</span>
                                            </p>
                                          </td>"; 
                                          $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                          border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                          margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                    <span lang=ES>".$this->callutil->cambianull($value->observacion_exb)."</span>
                                                  </p>
                                                </td>"; 
  
                                                $det_re .= "<td width=\"7%\" valign=top style='width:7.58%;border:solid #5B9BD5 1.0pt;
                                                border-top:none;padding:0cm 7.2pt 0cm 7.2pt'>
                                                        <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0cm;
                                                margin-bottom:6.0pt;margin-left:0cm;text-align:center'>
                                                          <span lang=ES>".$value->observacion_II."</span>
                                                        </p>
                                                      </td>"; 
  
        $det_re .="</tr>";                                              
          
        }
      }
  
      
      //file_put_contents($archivo_template, $contenidoRemplazado);
      
  
      $contenidoRemplazado =  str_replace("[DETALLE_RE]",$det_re,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[CODIGO_QR]",$archivo_qr,$contenidoRemplazado);
      $contenidoRemplazado =  str_replace("[LOGO_MIMS]",$archivo_mims,$contenidoRemplazado);
       
      
      echo $contenidoRemplazado;
       
  
  
     }
  


     public function index_historico_re(){

      $cod_usuario = $this->session->userdata('cod_user');
      $listaTodo = "";
      $number = 0; 
      $codEmpresa = $this->session->userdata('cod_emp');
    
    
        // Obtiene select Clientes
    
        $clientes = $this->callexternosclientes->listaClientes($codEmpresa);
    
        $arrClientes = json_decode($clientes);
    
        $htmlclientes = "";
        
        $htmlclientes .= '<select class="form-control" id="clientes">';
        $htmlclientes .= '<option value="0">Seleccione</option>';
        
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
    
    
    
        $this->plantilla_bodega('bodega/historicoRE', $datos);
    
    
    
      }  

      function obtieneRE(){

        $codEmpresa = $this->session->userdata('cod_emp');
        $codigoProyecto = $this->input->post('codigoProyecto');
        $codigoCliente = $this->input->post('codigoCliente');
     
    
        $responsere= $this->callexternosreporteentrega->obtieneRE($codEmpresa,$codigoCliente,$codigoProyecto);
     
        $respuesta = false;
    
    
        $arrRE = json_decode($responsere);
       
        $datos_re = array();
    
        if($arrRE){
          $respuesta = true;
          
          foreach ($arrRE as $key => $value) {
            
            $datosDirecto  = $this->callutil->obtieneDatoRef('SI_NO',$value->entrega_directa);
    
    
    
            foreach (json_decode($datosDirecto) as $llave => $valor) {
                        
              $entrega_directa = $valor->domain_desc;
      
            }
            
    
            $datos_re[] = array(
              'id_re' => $value->id_re,
              'cod_empresa' => $value->cod_empresa,
              'id_cliente' => $value->id_cliente,
              'id_proyecto' => $value->id_proyecto,
              'descripcion_proyecto' => $value->descripcion_proyecto,
              'area_proyecto' => $value->area_proyecto,
              'descripcion_area' => $value->descripcion_area,
              'fecha_emision' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_emision)),
              'emisor_re' => $value->emisor_re,
              'estado_re' => $value->estado_re,
              'solicitante' => $value->solicitante,
              'identificacion_solicitante' => $value->identificacion_solicitante,
              'cargo_solicitante' => $value->cargo_solicitante,
              'fecha_solicitud' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_solicitud)),
              'entrega_directa' =>  $entrega_directa,
              'fecha_entrega_sitio' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_entrega_sitio)),
              'fecha_completada_usuario' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_completada_usuario)),
              'lugar_fisico' => $value->lugar_fisico,
              'estado_re_sistema' => $value->estado_re_sistema,
    
            );        
            
          }
        }
    
     
    
        $datos['re_final'] = $datos_re;
        $datos['resp']      = $respuesta;
    
        echo json_encode($datos);
        
      
    
      }


}
