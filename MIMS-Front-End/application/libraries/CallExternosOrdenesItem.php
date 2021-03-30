<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosOrdenesItem
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosOrdenesItem {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }



    function obtieneItemOrdenes($idOrden,$idProyecto,$idCliente){
 
        $base_url_servicios =  $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."OrdenesItem/obtieneItemOrdenes";


        $form_data = array(
            'idOrden'	=> $idOrden,
            'idProyecto'	=> $idProyecto,
            'idCliente'    => $idCliente
        );


        
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;


    }


    function guardaOrdenItem($data){
 
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."OrdenesItem/guardaOrdenItem";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }


    function editarOrdenItem($id_proyecto,$id_cliente,$orden_id,$item_id,$codEmpresa)
    {
 

        $form_data = array(
            'id_proyecto'	=> $id_proyecto,
            'id_cliente'    => $id_cliente,
            'orden_id'      => $orden_id,
            'item_id'       => $item_id,
            'codEmpresa'    => $codEmpresa
        );

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."OrdenesItem/editarOrdenItem";
  
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }


    function actualizaOrdenItem($data){
 
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."OrdenesItem/actualizaOrdenItem";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }

    function eliminaOrdenItem($data){
 
        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."OrdenesItem/eliminaOrdenItem";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }


    function getRows($idProyecto,$idOrden,$ItemId){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."OrdenesItem/getRows";
        

        $form_data = array(
          'idProyecto'	=> $idProyecto,
          'idOrden'		=> $idOrden,
          'ItemId'		=> $ItemId
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function update($memData){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."OrdenesItem/update";

        $form_data = $memData;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function insert($memData){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."OrdenesItem/insert";

        $form_data = $memData ;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }
    
}
