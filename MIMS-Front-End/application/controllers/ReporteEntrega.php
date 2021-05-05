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
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }



  public function crearRE(){


		if($this->input->is_ajax_request()){

        $datos  = $this->input->post('datos');
      
        $respuesta = false;
        $mensaje_error = "";
         
        $datos_bucksheet = array();


          //Crea Cabecera RE

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
                'st_cantidad' => $value->NUMERO_DE_ELEMENTOS ,
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


}
