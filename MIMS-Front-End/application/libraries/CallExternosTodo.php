<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosTodo
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosTodo {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    function obtieneTodoUsuarios($codEmpresa,$codUsuario){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."TodoUsuarios/obtieneTodoUsuarios";
  
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'codUsuario'  => $codUsuario
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }
    

    function obtieneTodoUsuario($codEmpresa,$codUsuario,$id_todo){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."TodoUsuarios/obtieneTodoUsuario";
  
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'codUsuario'  => $codUsuario,
            'id_todo' => $id_todo
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }

    function guardarTodoUsuario($insert){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."TodoUsuarios/guardarTodoUsuario";


        $form_data = $insert;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }


      function actualizaEstadoTodo($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."TodoUsuarios/actualizaEstadoTodo";


        $form_data = $update;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }


      function editaTodoUsuario($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."TodoUsuarios/editaTodoUsuario";


        $form_data = $update;
      
        $client = curl_init($api_url);
      
        curl_setopt($client, CURLOPT_POST, true);
      
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
      
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($client);
      
        curl_close($client);
      
      
      
        return $response;
      
      }


      function eliminaTodoUsuario($codEmpresa,$cod_usuario,$id_todo){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."TodoUsuarios/eliminaTodoUsuario";
  
        $form_data = array(
            'codEmpresa'	=> $codEmpresa,
            'cod_usuario'  => $cod_usuario,
            'id_todo' => $id_todo
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
