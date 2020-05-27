<?php
class Calidad extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallUtil');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

 

   function index_calidad(){

    $this->plantilla_calidad('calidad/home_calidad', $datos);

  }
    
  }
