<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosJournal
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosJournal {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    
    function obtienejournal($id_orden_compra,$tipo,$id_cliente){

        
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Journal/obtienejournal";
  
        $form_data = array(
                    'id_orden_compra'		=>$id_orden_compra,
                    'tipo'              	=>$tipo,
                    'id_cliente'            =>$id_cliente
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
