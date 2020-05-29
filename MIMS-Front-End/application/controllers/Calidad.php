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


    $html = "";	 
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
  
    $menu = $this->callutil->armaMenuClientes($response);

   
    $datos['arrClientes'] = $menu ;

    $this->plantilla_calidad('calidad/home_calidad',$datos);

  }
    
  }
