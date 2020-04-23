<?php
class Proyectos extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');

 
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
    }

    $datos['ordenes'] = $datos_ordenes;
    $datos['resp']    = $respuesta;

    echo json_encode($datos);
    

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
          'estado'            => $value->estado_proyecto
        );

      }
    }
    
    $datos['proyectos'] = $datos_proyectos;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  
}

    }