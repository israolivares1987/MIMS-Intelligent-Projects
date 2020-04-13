<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosProyectos
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    
class CallExternosProyectos {
    
    
    function obtieneMenuProyectos($codEmpresa){

        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."Expediting/obtieneClientesProyectos";
  
        $form_data = array(
                    'cod_empresa'		=>$codEmpresa
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
