<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosBodegas
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosBodegas {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    function obtieneBodegas($codEmpresa){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."Bodegas/obtieneBodegas";
  
        $form_data = array(
            'codEmpresa'	=> $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }

    function agregarBodega($insert){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Bodegas/agregarBodega";
      
        $form_data = $insert;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }

      function obtieneBodega($codEmpresa,$id_bodega){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Bodegas/obtieneBodega";
      
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'id_bodega'	=> $id_bodega
        );
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }


      function editarBodega($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Bodegas/editarBodega";
      
        $form_data = $update;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }

      function eliminaBodega($codEmpresa,$id_bodega){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Bodegas/eliminaBodega";
      
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'id_bodega'	=> $id_bodega
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
