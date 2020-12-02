<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosUsuario
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosUsuario {
    
    public function obtienebaseservicios(){
        $CI =& get_instance();
        return $CI->config->item('BASE_SERVICIOS');
    }
    
    function getCountUsuario(){
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/getCountUsuario";
  
        $form_data = array();
           
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
        return $response;
    }

    function listaUsuario(){
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/getListUsuarios";
        $form_data = array();
          
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
        return $response;
    }

    function agregarUsuario($insert){
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/addNewUsuario";
  
        $form_data = $insert;
  
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
  
        return $response;

    }

    function listaRoles(){
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/getListaRoles";
  
        $form_data = array();
  
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
  
        return $response;
    }

    function asignarRolEmpresaUsuario($update){
  
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/asignarRolEmpresaUsuario";
  
        $form_data = $update;
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);

        return $response;
    }

    function obtieneUsuario($id){
        $base_url_servicios =$this->obtienebaseservicios();           
          
        $api_url = $base_url_servicios."Usuarios/obtieneUsurio";
  
        $form_data = array(
           'id'	=>$id
        );
  
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
  
        return $response;
    }

    function editarUsuario($update){
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/editarUsuario";
  
        $form_data = $update;
  
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
 
        curl_close($client);
        return $response;
    }

    function eliminaUsuario($idusuario){
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Usuarios/eliminaUsuario";
        $client = curl_init($api_url);
        
        $form_data = array(
        'id' => $idusuario
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

?>