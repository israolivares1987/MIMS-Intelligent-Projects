<?php
class Clientes extends MY_Controller{
  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
  }
 

  function index(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $responseMenuLeft = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);


    $json_datosMenuLeft = $responseMenuLeft;
    $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
    $datos['arrClientes'] = $arrayDatosMenu['Clientes'];

    //Si es rol ingenieria. no carga proyectos en menu lateral
    if($this->session->userdata('rol_id') == 204){

      $this->plantilla_ingenieria('ingenieria/listClientes', $datos);

    }else{
      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/left_menu', $datos);
      $this->load->view('activador/listClientes');
      $this->load->view('activador/footer');
    }

  }


  function listaClientes(){
     
    $response = $this->callexternosclientes->listaClientes();
    echo $response;
    
  
  }

  function  obtieneClientePorId($id){
     
     
      $response = $this->callexternosclientes->obtieneClientePorId($id);
      echo $response;
      
  
  }


  function  deleteCliente($id){
     
    $response = $this->callexternosclientes->deleteCliente($id);
    echo $response;
  
  }

  function updateCliente()
{

    
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Clientes/updateCliente";
        
    $form_data = array(
                      'idCliente' => $this->input->post('idCliente'),
                      'rutCliente' => $this->input->post('rutCliente'),
                      'nombreCliente' => $this->input->post('nombreCliente'),
                      'dvCliente' => $this->input->post('dvCliente')
              );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }
 
  function agregarCliente(){


    
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Clientes/agregarCliente";
        
    $form_data = array(
                      'codEmpresa' => $this->session->userdata('cod_emp'),
                      'nombreCliente' => $this->input->post('nombreCliente'),
                      'rutCliente' => $this->input->post('rutCliente'),
                      'dvCliente' => $this->input->post('dvCliente')
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
