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
class CallExternosConsultas {
    
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
  
        function obtieneDatosTotales($codEmpresa){
  
          $base_url_servicios =$this->obtienebaseservicios();                
          $api_url = $base_url_servicios."Consultas/obtieneDatosTotales/".$codEmpresa;
    
    
    
          $client = curl_init($api_url);
    
          curl_setopt($client, CURLOPT_POST, true);
    
          curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    
          $response = curl_exec($client);
    
          curl_close($client);
    
          return $response;
  
  
        }
    
}
