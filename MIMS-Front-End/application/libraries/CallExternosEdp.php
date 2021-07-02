<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosOrdenes
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosEdp {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }



    function listasEdp($idCliente,$idProyecto,$idOrden, $codEmpresa){
 
        $base_url_servicios =  $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Edp/listasEdp";


        $form_data = array(
            'idProyecto'	=> $idProyecto,
            'idCliente'    => $idCliente,
            'codEmpresa'   => $codEmpresa,
            'idOrden'     => $idOrden
        );


        
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;


    }

    function insertEdp($memData){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."Edp/insertEdp";

        $form_data = $memData ;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }


      function actualizarEdp($memData){

       

        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Edp/actualizarEdp";
    
        $form_data = $memData;
                
                    $client = curl_init($api_url);
            
                    curl_setopt($client, CURLOPT_POST, true);
            
                    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
            
                    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            
                    $response = curl_exec($client);
            
                    curl_close($client);

                    return $response;
    
    }

    function eliminaEdp($ID_EDP){

       

        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Edp/eliminaEdp";
    
        $form_data = array(
            'ID_EDP'	=> $ID_EDP
        );
                
                    $client = curl_init($api_url);
            
                    curl_setopt($client, CURLOPT_POST, true);
            
                    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
            
                    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            
                    $response = curl_exec($client);
            
                    curl_close($client);
            
                    return $response;
    
    }
    
    function obtieneEdp($id_edp,$codEmpresa){
 
        $base_url_servicios =  $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Edp/obtieneEdp";


        $form_data = array(
            'id_edp'	=> $id_edp,
            'codEmpresa'    => $codEmpresa
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
