<?php
class Empleados extends CI_Controller{
  function __construct(){
    parent::__construct();
  }
 
  function listaEmpleados(){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Empleados/obtieneEmployees";
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
    
  
  }

  function  obtieneEmpleadoPorId($id){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Empleados/obtieneEmpleadoPorId/".$id;
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }


  function  deleteEmpleado($id){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Empleados/deleteEmpleado/".$id;
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }

  function updateEmpleado(){


    
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Empleados/updateEmpleado";
        
    $form_data = array(
                      'ID' => $this->input->post('ID'),
                      'FirstName' => $this->input->post('FirstName'),
                      'LastName' => $this->input->post('LastName'),
                      'EmailAddress' => $this->input->post('EmailAddress'),
                      'JobTitle' => $this->input->post('JobTitle'),
                      'BusinessPhone' => $this->input->post('BusinessPhone'),
                      'HomePhone' => $this->input->post('HomePhone'),
                      'MobilePhone' => $this->input->post('MobilePhone'),
                      'CountryRegion' => $this->input->post('CountryRegion'),
                      'StateProvince' => $this->input->post('StateProvince'),
                      'City' => $this->input->post('City'),
                      'Address' => $this->input->post('Address')
              );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }
 
  function agregarEmpleado(){


    
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Empleados/agregarEmpleado";
        
    $form_data = array(
                      'FirstName' => $this->input->post('FirstName'),
                      'LastName' => $this->input->post('LastName'),
                      'EmailAddress' => $this->input->post('EmailAddress'),
                      'JobTitle' => $this->input->post('JobTitle'),
                      'BusinessPhone' => $this->input->post('BusinessPhone'),
                      'HomePhone' => $this->input->post('HomePhone'),
                      'MobilePhone' => $this->input->post('MobilePhone'),
                      'CountryRegion' => $this->input->post('CountryRegion'),
                      'StateProvince' => $this->input->post('StateProvince'),
                      'City' => $this->input->post('City'),
                      'Address' => $this->input->post('Address')
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
