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

function iniciosesion($user_name,$password,$cod_emp){
  
          $base_url_servicios =$this->obtienebaseservicios();                
          $api_url = $base_url_servicios."Login/validateUser";
    
          $form_data = array(
            'user_name'		=>$user_name,
            'password'		=>$password,
            'cod_emp'		  =>$cod_emp
        );
    
        $client = curl_init($api_url);
    
        curl_setopt($client, CURLOPT_POST, true);
    
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($client);
    
        curl_close($client);
    
        return $response;
  
  
}

function validateUserRol($rol_id){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/validateUserRol";

  $form_data = array(
    'rol_id'		=>$rol_id
);

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_POST, true);

curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

curl_close($client);

return $response;


}


function setSession($userId, $sessionId){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/setSession";

  $form_data = array(
    'userId'		=>$userId,
    'sessionId'		=>$sessionId
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
