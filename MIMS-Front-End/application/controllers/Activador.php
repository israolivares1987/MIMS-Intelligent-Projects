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
    $datos['arrProyectos'] = $arrayDatosMenu['Proyectos'];

    $this->load->view('activador/header');
    $this->load->view('activador/navbar');
    $this->load->view('activador/left_menu', $datos);
    $this->load->view('activador/listEmpleados');
    $this->load->view('activador/footer');
  
  
  
  
   }

    function listaBucksheet($PurchaseOrderID){


          $codEmpresa = $this->session->userdata('cod_emp');
          $responseMenuLeft = $this->obtieneMenuProyectos($codEmpresa);
    
    
          $json_datosMenuLeft = $responseMenuLeft;
          $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
          $datos['arrProyectos'] = $arrayDatosMenu['Proyectos'];
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
      $datos['arrProyectos'] = $arrayDatosMenu['Proyectos'];

      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/left_menu', $datos);
      $this->load->view('activador/listProveedores');
      $this->load->view('activador/footer');

      


    }



    function index_activador(){

      
      $codEmpresa = $this->session->userdata('cod_emp');

      $response = $this->obtieneMenuProyectos($codEmpresa);


      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);



         $datos['arrProyectos'] = $arrayDatos['Proyectos'];

   $this->load->view('activador/header');
   $this->load->view('activador/navbar');
   $this->load->view('activador/left_menu', $datos);
   $this->load->view('activador/footer');



    }
    




    function obtieneMenuProyectos($codEmpresa){

      $base_url_servicios =BASE_SERVICIOS;                
      $api_url = $base_url_servicios."Expediting/obtieneProyectos";

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

  }
