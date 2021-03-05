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
class CallExternosReporteRecepcion {
 
 
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

  }  
        

function agregarRR($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/agregarRR";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}

function obtieneCabeceraRR($idrr){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/obtieneCabeceraRR";

  $form_data = array(
    'idrr'		=>$idrr
);

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}

function agregarRRDet($insert){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/agregarRRDet";

  $form_data = $insert;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}



function actualizarCabeceraRR($update){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/actualizarCabeceraRR";

  $form_data = $update;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function actualizarDetalleRR($update){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/actualizarDetalleRR";

  $form_data = $update;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function listaRRDet($codEmpresa,$id_rr_cab){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/listaRRDet";

  $form_data = array(
    'codEmpresa'		=>$codEmpresa,
    'id_rr_cab' => $id_rr_cab
);

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function obtieneRRDet($codEmpresa,$id_rr_det,$id_rr_cab){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/obtieneRRDet";

  $form_data = array(
    'codEmpresa'		=>$codEmpresa,
    'id_rr_cab' => $id_rr_cab,
    'id_rr_det' => $id_rr_det
);

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}


function ActualizaRRDet($update){

  $base_url_servicios = $this->obtienebaseservicios();                
  $api_url = $base_url_servicios."ReporteRecepcion/actualizarDetalleRR";

  $form_data = $update;

  $client = curl_init($api_url);

  curl_setopt($client, CURLOPT_POST, true);

  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($client);

  curl_close($client);



  return $response;

}
    
}
