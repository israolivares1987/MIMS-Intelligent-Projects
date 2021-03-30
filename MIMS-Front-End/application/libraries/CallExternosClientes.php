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
 
 
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
        
  function listaClientes($codEmpresa){
     
     $base_url_servicios =$this->obtienebaseservicios();               
     $api_url = $base_url_servicios."Clientes/listaClientes";
        
     $form_data = array(
      'codEmpresa' => $codEmpresa
      );

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);
  
      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
      $response = curl_exec($client);
  
      curl_close($client);
  
      return $response;
    
  
  }

  function obtieneCliente($id_cliente){
     
    $base_url_servicios =$this->obtienebaseservicios();                
    $api_url = $base_url_servicios."Clientes/obtieneCliente";
        
    $client = curl_init($api_url);
    

    $form_data = array(
    'id_cliente' => $id_cliente
        );

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);
    
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($client);
    
        curl_close($client);
    
        return $response;
  
  }


  function editarCliente($update){

    $base_url_servicios = $this->obtienebaseservicios();                
    $api_url = $base_url_servicios."Clientes/editarCliente";

    $form_data = $update;

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

 

    return $response;

}


function agregarCliente($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Clientes/agregarCliente";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function eliminaCliente($idCliente){  

$base_url_servicios =$this->obtienebaseservicios();                
$api_url = $base_url_servicios."Clientes/eliminaCliente";
    
$client = curl_init($api_url);


$form_data = array(
'idCliente' => $idCliente
    );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    return $response;




}

    
}
