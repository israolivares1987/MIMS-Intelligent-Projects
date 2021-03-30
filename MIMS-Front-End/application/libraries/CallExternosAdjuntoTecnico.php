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
class CallExternosAdjuntoTecnico {
 
 
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
        
  function listasAdjuntoTecnico($cod_empresa,$id_orden){
     
     $base_url_servicios =$this->obtienebaseservicios();               
     $api_url = $base_url_servicios."AdjuntoTecnico/listasAdjuntoTecnico";
        
     $form_data = array(
      'cod_empresa' => $cod_empresa,
      'id_orden' => $id_orden
      );

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);
  
      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
      $response = curl_exec($client);
  
      curl_close($client);
  
      return $response;
    
  
  }


function agregarAdjuntoTecnico($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."AdjuntoTecnico/agregarAdjuntoTecnico";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function eliminaAdjuntoTecnico($cod_empresa,$id_orden, $id){
     
  $base_url_servicios =$this->obtienebaseservicios();               
  $api_url = $base_url_servicios."AdjuntoTecnico/eliminaAdjuntoTecnico";
     
  $form_data = array(
   'cod_empresa' => $cod_empresa,
   'id_orden' => $id_orden,
   'id' => $id
   );

   $client = curl_init($api_url);

   curl_setopt($client, CURLOPT_POST, true);

   curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

   curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

   $response = curl_exec($client);

   curl_close($client);

   return $response;
 

}


function listasArchivosTecnico($cod_empresa,$id_orden, $tipo_archivo){
     
  $base_url_servicios =$this->obtienebaseservicios();               
  $api_url = $base_url_servicios."AdjuntoTecnico/listasArchivosTecnico";
     
  $form_data = array(
   'cod_empresa' => $cod_empresa,
   'id_orden' => $id_orden,
   'tipo_archivo' => $tipo_archivo
   );


   $client = curl_init($api_url);

   curl_setopt($client, CURLOPT_POST, true);

   curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

   curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

   $response = curl_exec($client);

   curl_close($client);

   return $response;
 

}


function guardarArchivoTecnico($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."AdjuntoTecnico/guardarArchivoTecnico";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}



function listaAdjuntoTecnico($cod_empresa,$id_orden, $id){
     
  $base_url_servicios =$this->obtienebaseservicios();               
  $api_url = $base_url_servicios."AdjuntoTecnico/listaAdjuntoTecnico";
     
  $form_data = array(
   'cod_empresa' => $cod_empresa,
   'id_orden' => $id_orden,
   'id' => $id
   );

   $client = curl_init($api_url);

   curl_setopt($client, CURLOPT_POST, true);

   curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

   curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

   $response = curl_exec($client);

   curl_close($client);

   return $response;
 

}

function editaAdjuntoTecnico($update){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."AdjuntoTecnico/editaAdjuntoTecnico";

  $form_data = $update;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function eliminarAdjuntosTecnicos($cod_empresa,$id_orden, $id_secuencia){
     
  $base_url_servicios =$this->obtienebaseservicios();               
  $api_url = $base_url_servicios."AdjuntoTecnico/eliminarAdjuntosTecnicos";
     
  $form_data = array(
   'cod_empresa' => $cod_empresa,
   'id_orden' => $id_orden,
   'id_secuencia' => $id_secuencia
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
