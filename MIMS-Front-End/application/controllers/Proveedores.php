<?php
class Proveedores extends CI_Controller{
  function __construct(){
    parent::__construct();
  }
 
  function listaProveedores(){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Proveedores/obtieneProveedores";
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
    
  
  }

  function  obtieneProveedorPorId($id){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Proveedores/obtieneProveedorPorId/".$id;
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }


  function  deleteProveedor($id){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Proveedores/deleteProveedor/".$id;
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }

  function updateProveedor()
{

    
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Proveedores/updateProveedor";
        
    $form_data = array(
                      'idProveedor' => $this->input->post('idProveedor'),
                      'rutProveedor' => $this->input->post('rutProveedor'),
                      'nombreProveedor' => $this->input->post('nombreProveedor'),
                      'dvProveedor' => $this->input->post('dvProveedor')
              );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }
 
  function agregarProveedor(){


    
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Proveedores/agregarProveedor";
        
    $form_data = array(
                      'codEmpresa' => $this->session->userdata('cod_emp'),
                      'nombreProveedor' => $this->input->post('nombreProveedor'),
                      'rutProveedor' => $this->input->post('rutProveedor'),
                      'dvProveedor' => $this->input->post('dvProveedor')
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
