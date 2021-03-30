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
class CallExternosControlCalidad {
 
 
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
        
  function obtieneControlCalidad($codEmpresa,$id_orden,$id_cliente,$id_proyecto){
     
     $base_url_servicios =$this->obtienebaseservicios();               
     $api_url = $base_url_servicios."ControlCalidad/obtieneControlCalidad";
        
     $form_data = array(
      'codEmpresa' => $codEmpresa,
      'id_orden' => $id_orden,
      'id_cliente' => $id_cliente,
      'id_proyecto' => $id_proyecto
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
