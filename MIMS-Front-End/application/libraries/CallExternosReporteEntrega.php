<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternos
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    
class CallExternosReporteEntrega {
 
 
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
        



function listaRRDetForRE($codEmpresa,$codigoCliente,$codigoProyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteEntrega/listaRRDetForRE";

  $form_data = array(
    'codEmpresa'		=>$codEmpresa,
    'codigoCliente' 	=>$codigoCliente,
    'codigoProyecto' 	=>$codigoProyecto,
    'orden' 	=> $orden,
    'sku' 	=> $sku,
    'proveedor' 	=> $proveedor,
    'tagnumber' => $tagnumber,
    'descripcion' => $descripcion
);

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}

function obtieneFiltrosRE($codEmpresa,$id_clientes,$id_proyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteEntrega/obtieneFiltrosRE";

  $form_data = array(
    'codEmpresa'		=> $codEmpresa,
    'id_proyecto' => $id_proyecto,
    'id_clientes' => $id_clientes,
    'orden' 	=> $orden,
    'sku' 	=> $sku,
    'proveedor' 	=> $proveedor,
    'tagnumber' => $tagnumber,
    'descripcion' => $descripcion

);

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;


}


function agregarRE($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteEntrega/agregarRE";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function agregarREDet($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteEntrega/agregarREDet";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}

function obtieneCabeceraRE($idre){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteEntrega/obtieneCabeceraRE";

  $form_data = array(
    'idre'		=>$idre
);

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}

function listaREDet($codEmpresa,$id_re){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteEntrega/listaREDet";

  $form_data = array(
    'codEmpresa'		=>$codEmpresa,
    'id_re' => $id_re
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
