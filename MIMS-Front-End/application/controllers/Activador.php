<?php
class Activador extends CI_Controller{
  function __construct(){
    parent::__construct();
   
     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index_empleados(){

    $codEmpresa = $this->session->userdata('cod_emp');
    $responseMenuLeft = $this->obtieneMenuProyectos($codEmpresa);


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
    $response = $this->obtieneMenuProyectos($codEmpresa);
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

    function listaBucksheet($PurchaseOrderID){


          $codEmpresa = $this->session->userdata('cod_emp');
          $responseMenuLeft = $this->obtieneMenuProyectos($codEmpresa);
    
    
          $json_datosMenuLeft = $responseMenuLeft;
          $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
          $datos['arrClientes'] = $arrayDatosMenu['Clientes'];
          $datos['PurchaseOrderID'] = $PurchaseOrderID;

          $arraySesion = array("PurchaseOrderID" => $PurchaseOrderID);		

	      	$this->session->set_userdata($arraySesion);

          $this->load->view('activador/header');
          $this->load->view('activador/navbar');
          $this->load->view('activador/left_menu', $datos);
          $this->load->view('activador/listaBuckSheet',$datos);
          $this->load->view('activador/footer');
    }


    function listaProveedor(){


      $codEmpresa = $this->session->userdata('cod_emp');
      $responseMenuLeft = $this->obtieneMenuProyectos($codEmpresa);


      $json_datosMenuLeft = $responseMenuLeft;
      $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
      $datos['arrClientes'] = $arrayDatosMenu['Clientes'];

      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/left_menu', $datos);
      $this->load->view('activador/listProveedores');
      $this->load->view('activador/footer');

    }

    function listProyectosProveedor($idProveedor){

      
      $codEmpresa = $this->session->userdata('cod_emp');
      $response = $this->obtieneMenuProyectos($codEmpresa);
      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);
      $datos['arrClientes'] = $arrayDatos['Clientes'];
      $datos['idProveedor'] = $idProveedor;


      //Obtiene datos del proveedor

      $responseDatos = $this->obtieneDatosProveedor($idProveedor);
      $array = json_decode($responseDatos);
      $datos['nombreProveedor'] = $array->nombreProveedor;
      $datos['rutProveedor'] = $array->rutProveedor;
      $datos['dvProveedor'] = $array->dvProveedor;

      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/left_menu', $datos);
      $this->load->view('activador/listProyectos',$datos);
      $this->load->view('activador/footer');
    }

    

    function obtieneMenuProyectos($codEmpresa){

      $base_url_servicios =BASE_SERVICIOS;                
      $api_url = $base_url_servicios."Expediting/obtieneClientesProyectos";

      $form_data = array(
                  'cod_empresa'		=>$codEmpresa
      );

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);

      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($client);

      curl_close($client);

      return $response;

    }


    function obtieneBucksheet($PurchaseOrderID){


      $base_url_servicios =BASE_SERVICIOS;                
      $api_url = $base_url_servicios."BuckSheet/obtieneBuckSheet";


          
      $form_data = array(
                  'PurchaseOrderID'		=>$PurchaseOrderID
      );

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);

      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($client);

      curl_close($client);

      echo $response;


    }

      
      function obtieneDatosProveedor($idProveedor){

        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."Proveedores/obtieneProveedorPorId/".$idProveedor;
  
  
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;


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
