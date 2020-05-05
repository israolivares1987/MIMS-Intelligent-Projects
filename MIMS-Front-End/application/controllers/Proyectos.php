<?php
class Proyectos extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallUtil');

 
  }

  
  function listaProyectosCliente($idCliente){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
  
    $menu = $this->callutil->armaMenuClientes($response);

   
    $datos['arrClientes'] = $menu ;
    $datos['idCliente'] = $idCliente;


    //Obtiene datos del proveedor

    $responseDatos = $this->callexternosclientes->obtieneCliente($idCliente);
    $array = json_decode($responseDatos);

    foreach ($array as $key => $value)
			{

        $datos['nombreCliente'] = $value->nombreCliente;
        $datos['rutCliente'] = $value->rutCliente;
        $datos['dvCliente'] = $value->dvCliente;

			}   

    $this->plantilla_activador('activador/listProyectos', $datos);
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
          'NumeroProyecto'   => $value->NumeroProyecto,
          'NombreProyecto'   => $value->NombreProyecto,
          'DescripcionProyecto'  => $value->DescripcionProyecto,
          'estadoProyecto'       => $value->estadoProyecto,
          'Lugar'       => $value->Lugar,
          'idCliente'       => $value->idCliente
        );
       
      }
    }
    
    $datos['proyectos'] = $datos_proyectos;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  
}


    }