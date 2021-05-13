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



  public function agregarRE(){


		if($this->input->is_ajax_request()){

        $datos  = $this->input->post('datos');
        $codEmpresa = $this->session->userdata('cod_emp');
        $id_cliente  = $this->input->post('cliente');
        $id_proyecto  = $this->input->post('proyecto');
        $respuesta = false;
        $mensaje_error = "";
         
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
            'id_proyecto' => $id_proyecto,
            'descripcion_proyecto' => $DescripcionProyecto,
            'estado_re_sistema' => 1,

          );


          $rrcab = $this->callexternosreporteentrega->agregarRE($insertcab);
          $rrins = json_decode($rrcab) ;
        
          $resp =  $rrins->resp;
          $idInsertado = $rrins->id_insertado;

          $i = 1;
          $num = 1;

          foreach ($datos as $v) {

              $re_det=array(
                'cod_empresa' => $codEmpresa,
                'numero_linea_det' => $num,
                'id_re_cab' => $idInsertado,
                'id_orden_compra' => $v[2],
                'item_oc' => $v[3],
                'tag_number' => $v[4],
                'stockcode' => $v[5],
                'descripcion' => $v[6],
                'st_cantidad_recibida' => $v[12],
                'st_cantidad_entregada' => '0',
                'st_cantidad_saldo' => '0',
                'id_bodega' => $v[13],
                'id_patio' => $v[15],
                'id_posicion' => $v[16],
                'observacion' => $v[17],
                'estado_re_det' => '1',
                'observacion_exb' => $v[18],
                'observacion_II' => $v[19]

                );

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
