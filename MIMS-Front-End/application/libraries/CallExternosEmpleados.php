<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosEmpleados
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosEmpleados {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    
    function listaEmpleados($cod_empresa){
     
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Empleados/listaEmpleados";
            
        $client = curl_init($api_url);
        

        $form_data = array(
        'cod_empresa' => $cod_empresa
            );

            $client = curl_init($api_url);

            curl_setopt($client, CURLOPT_POST, true);
        
            curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        
            $response = curl_exec($client);
        
            curl_close($client);
        
            return $response;
      
      }


      function obtieneEmpleado($id_empleado){
     
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Empleados/obtieneEmpleado";
            
        $client = curl_init($api_url);
        

        $form_data = array(
        'id_empleado' => $id_empleado
            );

            $client = curl_init($api_url);

            curl_setopt($client, CURLOPT_POST, true);
        
            curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        
            $response = curl_exec($client);
        
            curl_close($client);
        
            return $response;
      
      }


      function editarEmpleado($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Empleados/editarEmpleado";
  
        $form_data = $update;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);

     
  
        return $response;

    }

    
    function agregarEmpleado($insert){

      $base_url_servicios = $this->obtienebaseservicios();                
      $api_url = $base_url_servicios."Empleados/agregarEmpleado";

      $form_data = $insert;

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);

      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($client);

      curl_close($client);

   

      return $response;

  }


  function eliminaEmpleado($id_empleado){  

    $base_url_servicios =$this->obtienebaseservicios();                
    $api_url = $base_url_servicios."Empleados/eliminaEmpleado";
        
    $client = curl_init($api_url);
    

    $form_data = array(
    'id_empleado' => $id_empleado
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
