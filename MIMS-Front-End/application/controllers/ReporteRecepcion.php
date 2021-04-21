<?php
class ReporteRecepcion extends MY_Controller{
  
  
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


public function index_historico_rr(){

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
    $htmlproyectos .= '<option value="0">Seleccione</option>';
    $htmlproyectos .= '</select>';
    $datos['select_proyectos'] = $htmlproyectos;



    // Obtiene select Ordenes

    $htmlordenes = "";

    $htmlordenes .= '<select class="form-control" id="ordenes">';
    $htmlordenes .= '<option value="0">Seleccione</option>';
    $htmlordenes .= '</select>';
    $datos['select_ordenes'] = $htmlordenes;



    $this->plantilla_bodega('bodega/historicoRR', $datos);



  }  


  function obtieneRR(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $codigoProyecto = $this->input->post('codigoProyecto');
    $codigoCliente = $this->input->post('codigoCliente');

    $responserr = $this->callexternosreporterecepcion->obtieneRR($codEmpresa,$codigoProyecto,$codigoCliente);
    $respuesta = false;


    $arrRR = json_decode($responserr);
   
    $datos_rr = array();

    if($arrRR){
      $respuesta = true;
      
      foreach ($arrRR as $key => $value) {
        

        $datos_rr[] = array(
          'id_rr' => $value->id_rr,
          'cod_empresa' => $value->cod_empresa,
          'id_rr_recepcion' => $value->id_rr_recepcion,
          'fecha_creacion' => $value->fecha_creacion,
          'usuario_creacion' => $value->usuario_creacion,
          'fecha_entrega' => $value->fecha_entrega,
          'id_cliente' => $value->id_cliente,
          'descripcion_cliente' => $value->descripcion_cliente,
          'id_proyecto' => $value->id_proyecto,
          'descripcion_proyecto' => $value->descripcion_proyecto,
          'id_orden_compra' => $value->id_orden_compra,
          'id_orden_cliente' => $value->id_orden_cliente,
          'descripcion_orden' => $value->descripcion_orden,
          'guia_despacho' => $value->guia_despacho,
          'proveedor' => $value->proveedor,
          'estado_rr' => $value->estado_rr
          
        );
        
        
      }
    }

    $datos['rrs'] = $datos_rr;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }


}
