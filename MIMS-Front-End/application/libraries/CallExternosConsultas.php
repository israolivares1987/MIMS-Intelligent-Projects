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
          $api_url = $base_url_servicios."Consultas/obtieneDatosTotales";
    
          $form_data = array(
            'codEmpresa'		=>$codEmpresa
        );
          
    
        $client = curl_init($api_url);
    
        curl_setopt($client, CURLOPT_POST, true);
    
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($client);
    
        curl_close($client);
    
        return $response;
  
        }



        function obtieneDatosTotalesxActivador($codEmpresa,$email){
  
          $base_url_servicios =$this->obtienebaseservicios();                
          $api_url = $base_url_servicios."Consultas/obtieneDatosTotalesxActivador";
    
          $form_data = array(
            'codEmpresa'		=>$codEmpresa,
            'Email' => $email
        );
          
    
        $client = curl_init($api_url);
    
        curl_setopt($client, CURLOPT_POST, true);
    
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    
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


function cuentaSession($user_name,$cod_emp, $sessionId){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/cuentaSession";

  $form_data = array(
    'user_name'		=>$user_name,
    'cod_emp'		=>$cod_emp,
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


function consultaSession($userId, $sessionId){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/consultaSession";

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

function eliminarSession($userId, $sessionId){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/eliminarSession";

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

function obtiene_user($user_name, $cod_emp){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/obtiene_user";

  $form_data = array(
    'user_name'		=>$user_name,
    'cod_emp'		=>$cod_emp
   );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    return $response;


}


function actualiza_password_user($user_name,$password, $cod_emp, $uniqidStr){
  
  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/actualiza_password_user";

  $form_data = array(
    'user_name'		=> $user_name,
    'cod_emp'		=> $cod_emp,
    'password'  => $password,
    'uniqidStr' =>  $uniqidStr
   );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    return $response;


}


function obtiene_user_token($cod_emp,$tokenpassword){


  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/obtiene_user_token";

  $form_data = array(
    'cod_emp'		=>$cod_emp,
    'tokenpassword'		=>$tokenpassword
   );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);


    return $response;
  
 


}

function actualiza_password_new($cod_user,$password,$cod_emp){

  $base_url_servicios =$this->obtienebaseservicios();                
  $api_url = $base_url_servicios."Login/actualiza_password_new";

  $form_data = array(
    'cod_user'		=>$cod_user,
    'password'		=>$password,
    'cod_emp' => $cod_emp
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
