<?php
class Activador extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index_empleados(){

    $codEmpresa = $this->session->userdata('cod_emp');
    $responseMenuLeft = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);


    $json_datosMenuLeft = $responseMenuLeft;
    $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
    $datos['arrClientes'] = $arrayDatosMenu['Clientes'];

    $this->load->view('activador/header');
    $this->load->view('activador/navbar');
    $this->load->view('activador/left_menu', $datos);
    $this->load->view('activador/listEmpleados');
    $this->load->view('activador/footer'); 
  
   }

   function index_activador(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];


    //Obtiene Datos para el Home


    $Totales = $this->obtieneDatosTotales($codEmpresa);
    
    $json_totales = $Totales;
    $arrayDatosTotales = json_decode($json_totales,true);
    $datos['totalProyectos'] = $arrayDatosTotales['totalProyectos'];
    $datos['totalProveedores'] = $arrayDatosTotales['totalProveedores'];
    $datos['totalOrdenes'] = $arrayDatosTotales['totalOrdenes'];
    $datos['totalSuppliers'] = $arrayDatosTotales['totalSuppliers'];


    

    $this->load->view('activador/header');
    $this->load->view('activador/navbar');
    $this->load->view('activador/left_menu', $datos);
    $this->load->view('activador/home_activador', $datos);
    $this->load->view('activador/footer');
  }



  function listProyectosCliente($idProveedor){

      
      $codEmpresa = $this->session->userdata('cod_emp');
      $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);
      $datos['arrClientes'] = $arrayDatos['Clientes'];
      $datos['idCliente'] = $idProveedor;


      //Obtiene datos del proveedor

      $responseDatos = $this->callexternosclientes->obtieneDatosCliente($idProveedor);
      $array = json_decode($responseDatos);
      $datos['nombreCliente'] = $array->nombreCliente;
      $datos['rutCliente'] = $array->rutCliente;
      $datos['dvCliente'] = $array->dvCliente;

      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/left_menu', $datos);
      $this->load->view('activador/listProyectos',$datos);
      $this->load->view('activador/footer');
    }
    
    
    function obtieneDatosTotales($codEmpresa){

        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."Consultas/obtieneDatosTotales/".$codEmpresa;
  
  
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;


      } 

  }
