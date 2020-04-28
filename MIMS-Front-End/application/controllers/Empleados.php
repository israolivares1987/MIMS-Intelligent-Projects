<?php
class Empleados extends CI_Controller{
  
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index_empleados(){

    $codEmpresa = $this->session->userdata('cod_emp');
    $responseMenuLeft = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);


    $json_datosMenuLeft = $responseMenuLeft;
    $arrayDatosMenu = json_decode($json_datosMenuLeft,true);
    $datos['arrClientes'] = $arrayDatosMenu['Clientes'];

    $this->load->view('activador/header');
    $this->load->view('activador/navbar');
    $this->load->view('activador/left_menu', $datos);
    $this->load->view('activador/listEmpleados');
    $this->load->view('activador/footer'); 
  
   }

  }
