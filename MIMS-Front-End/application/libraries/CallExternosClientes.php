<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternos
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    
class CallExternosClientes {
    
        
  function listaClientes(){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Clientes/obtieneClientes";
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
    
  
  }

  function  obtieneClientePorId($id){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Clientes/obtieneClientePorId/".$id;
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;
  
  }


  function  deleteCliente($id){
     
    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Clientes/deleteCliente/".$id;
        
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

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
