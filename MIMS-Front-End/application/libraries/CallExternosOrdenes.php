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

class CallExternosOrdenes {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }


    function eliminaOrden($delete){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Ordenes/eliminaOrden";
  
        $form_data = $delete;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    function obtieneOrdenes($idProyecto,$idCliente,$codEmpresa){
 
        $base_url_servicios =  $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Ordenes/obtieneOrdenes";


        $form_data = array(
            'idProyecto'	=> $idProyecto,
            'idCliente'    => $idCliente,
            'codEmpresa'   => $codEmpresa
        );


        
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;


    }

    function obtieneOrdenesActivador($idCliente,$idProyecto, $codActivador,$codEmpresa){
 
        $base_url_servicios =  $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Ordenes/obtieneOrdenes";


        $form_data = array(
            'idProyecto'	=> $idProyecto,
            'idCliente'    => $idCliente,
            'codActivador' => $codActivador,
            'codEmpresa'   => $codEmpresa
        );


        
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;


    }
    



    function guardaOrden($data){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Ordenes/guardaOrden";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }

    function actualizaOrden($data){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Ordenes/actualizaOrden";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }

    function obtieneOrden($id_proyecto,$id_cliente,$orden_id,$codEmpresa){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Ordenes/obtieneOrderById";
  
        
        $form_data = array(
            'id_proyecto'	=> $id_proyecto,
            'id_cliente'    => $id_cliente,
            'orden_id'      => $orden_id,
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
