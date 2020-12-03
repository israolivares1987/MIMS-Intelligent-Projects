<?php
class Admin extends MY_Controller{
  
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosDominios');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
    

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index_admin(){

    $datos['select_car'] = "1";

    $datos['nombreEmpresa'] = "2";
    $datos['razonSocial'] = "3";
    
    $this->plantilla_admin('Admin/Index_admin', $datos);
  }

  function index_empresa(){
    $datos['select_car'] = "1";

    $datos['nombreEmpresa'] = "2";
    $datos['razonSocial'] = "3";
    
    $this->plantilla_admin('Admin/index_empresa', $datos);
  }

  function index_usuario(){
    $datos['select_car'] = "1";

    $datos['nombreEmpresa'] = "2";
    $datos['razonSocial'] = "3";
    
    $this->plantilla_admin('Admin/index_usuario', $datos);
  }

}

