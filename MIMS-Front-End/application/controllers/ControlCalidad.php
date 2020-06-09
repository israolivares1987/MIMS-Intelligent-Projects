<?php
class ControlCalidad extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosControlCalidad');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
  }

  function obtieneControlCalidad(){


    $codEmpresa = $this->input->post('codEmpresa');
    $id_orden = $this->input->post('id_orden');
    $id_cliente = $this->input->post('id_cliente');
    $id_proyecto = $this->input->post('id_proyecto');


    $datosCalidad    = $this->callexternoscontrolcalidad->obtieneControlCalidad($codEmpresa,$id_orden,$id_cliente,$id_proyecto);
    $datos_calidad = array();

    if($datosCalidad){

      $arrCalidad= json_decode($datosCalidad);

      foreach ($arrCalidad as $key => $value) {
          $datos_calidad[] = array(
            'codEmpresa' => $value->codEmpresa,
            'id_control_calidad'   => $value->id_control_calidad,
            'descripcion_control_calidad'   => $value->descripcion_control_calidad
          );

    }

      $respuesta        = true;
      $mensaje   = 'Sin Error';

    }else{

      $respuesta      = false;
      $mensaje    = 'Error al obtener control calidad';
    }

    $datos['datos_calidad'] = $datos_calidad;
    $datos['resp']      = $respuesta;
    $datos['mensaje']      = $mensaje;

    echo json_encode($datos);
    
  
  }



  }