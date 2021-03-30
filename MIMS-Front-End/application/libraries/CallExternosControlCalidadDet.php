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
class CallExternosControlCalidadDet {
 
 
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
        
  function obtieneControlCalidadDet($codEmpresa,$id_orden,$id_cliente,$id_proyecto){
     


     $base_url_servicios =$this->obtienebaseservicios();               
     $api_url = $base_url_servicios."ControlCalidadDet/obtieneControlCalidadDet";
        
     $form_data = array(
      'cod_empresa' => $codEmpresa,
      'id_orden' => $id_orden,
      'id_cliente' => $id_cliente,
      'id_proyecto' => $id_proyecto,
      );

    


      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);
  
      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
      $response = curl_exec($client);
  
      curl_close($client);
  
      return $response;
    
  
  }



  function guardaControlCalidadDet($insert){

    $base_url_servicios = $this->obtienebaseservicios();                
    $api_url = $base_url_servicios."ControlCalidadDet/guardaControlCalidadDet";
  
    $form_data = $insert;

  
    $client = curl_init($api_url);
  
    curl_setopt($client, CURLOPT_POST, true);
  
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
    $response = curl_exec($client);
  
    curl_close($client);
  
  
  
    return $response;
  
  }


  function eliminaControlCalidadDet($id_control_calidad_det,$id_orden,$id_cliente,$id_proyecto){
     


    $base_url_servicios =$this->obtienebaseservicios();               
    $api_url = $base_url_servicios."ControlCalidadDet/eliminaControlCalidadDet";
       
    $form_data = array(
     'id_control_calidad_det' => $id_control_calidad_det,
     'id_orden' => $id_orden,
     'id_cliente' => $id_cliente,
     'id_proyecto' => $id_proyecto,
     );

   


     $client = curl_init($api_url);

     curl_setopt($client, CURLOPT_POST, true);
 
     curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
 
     curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
 
     $response = curl_exec($client);
 
     curl_close($client);
 
     return $response;
   
 
 }



 function obtieneControlCalidadDetxId($codEmpresa,$id_orden,$id_cliente,$id_proyecto,$id_control_calidad,$id_control_calidad_det){
     


  $base_url_servicios =$this->obtienebaseservicios();               
  $api_url = $base_url_servicios."ControlCalidadDet/obtieneControlCalidadDetxId";
     
  $form_data = array(
   'id_control_calidad_det' => $id_control_calidad_det,
   'id_orden' => $id_orden,
   'id_cliente' => $id_cliente,
   'id_proyecto' => $id_proyecto,
   'id_control_calidad' => $id_control_calidad,
   'cod_empresa' => $codEmpresa
   );

 


   $client = curl_init($api_url);

   curl_setopt($client, CURLOPT_POST, true);

   curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

   curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

   $response = curl_exec($client);

   curl_close($client);

   return $response;
 

}

function actualizaControlCalidadDet($dataInsert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ControlCalidadDet/actualizaControlCalidadDet";

  $form_data = $dataInsert;


  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}



  
    
}
