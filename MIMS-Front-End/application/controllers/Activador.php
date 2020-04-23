<?php
class Activador extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

 

   function index_activador(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];


    //Obtiene Datos para el Home


    $Totales = $this->callexternosconsultas->obtieneDatosTotales($codEmpresa);
    
    $json_totales = $Totales;
    $arrayDatosTotales = json_decode($json_totales,true);
    $datos['totalProyectos'] = $arrayDatosTotales['totalProyectos'];
    $datos['totalClientes'] = $arrayDatosTotales['totalClientes'];
    $datos['totalOrdenes'] = $arrayDatosTotales['totalOrdenes'];
    $datos['totalSuppliers'] = $arrayDatosTotales['totalSuppliers'];


    $this->plantilla_activador('activador/home_activador', $datos);

  }



  function listProyectosCliente($idCliente){

      
      $codEmpresa = $this->session->userdata('cod_emp');
      $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);
      $datos['arrClientes'] = $arrayDatos['Clientes'];
      $datos['idCliente'] = $idCliente;


      //Obtiene datos del proveedor

      $responseDatos = $this->callexternosclientes->obtieneDatosCliente($idCliente);
      $array = json_decode($responseDatos);
      $datos['nombreCliente'] = $array->nombreCliente;
      $datos['rutCliente'] = $array->rutCliente;
      $datos['dvCliente'] = $array->dvCliente;


      $this->plantilla_activador('activador/listProyectos', $datos);
    }
    
  }
