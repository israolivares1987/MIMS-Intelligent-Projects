<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosProveedores
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosProveedores {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    function obtieneSupplier($codEmpresa){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."Proveedores/obtieneSuppliersEmpresa";
  
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

    function agregarProveedor($insert){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proveedores/agregarProveedor";
      
        $form_data = $insert;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }

      function obtieneProveedor($codEmpresa,$id_proveedor){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proveedores/obtieneProveedor";
      
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'id_proveedor'	=> $id_proveedor
        );
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }


      function editarProveedor($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proveedores/editarProveedor";
      
        $form_data = $update;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }

      function eliminaProveedor($codEmpresa,$id_proveedor){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proveedores/eliminaProveedor";
      
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'id_proveedor'	=> $id_proveedor
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
