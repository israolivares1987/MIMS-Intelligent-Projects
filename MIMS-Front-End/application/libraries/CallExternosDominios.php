<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosDominios
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosDominios {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
  /**
     * Funcion general que retorna los datos segun dominios
     */
    public function obtieneDatosRef($dominio){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Dominios/obtieneDatosRef";
  
        $form_data = array(
            'dominio'	=> $dominio
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    public function obtieneDatoRef($dominio,$dato){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Dominios/obtieneDatoRef";
  
        $form_data = array(
            'dominio'	=> $dominio,
            'dato' => $dato
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    public function editarIva($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Dominios/editarIva";
  
        $form_data = $update;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    
}
