<?php
class Proyectos extends CI_Controller{
  function __construct(){
    parent::__construct();
  }

  function obtieneProyectosProveedor($idProyecto,$idProveedor){

    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Expediting/obtieneExpediting/".$idProveedor."/".$idProyecto;

    
    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;

  }

  function obtieneProyectos($idProveedor){

    $base_url_servicios =BASE_SERVICIOS;                
    $api_url = $base_url_servicios."Expediting/obtieneProyectos/".$idProveedor;



    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;


  } 

    }