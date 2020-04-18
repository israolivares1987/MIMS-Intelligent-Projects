<?php
class Ingenieria extends MY_Controller{
  
  
    function __construct(){

    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function proyectos(){

    $codEmpresa = $this->session->userdata('cod_emp');

    $clientes = $this->callexternosclientes->obtieneClientePorEmpresa($codEmpresa);

    $arrClientes = json_decode($clientes);
    $html = "";
    
    $html .= '<select class="form-control" id="select_clientes">';
    $html .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

          $html .= '<option value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $html .= '</select>';

    $datos['select_clientes'] = $html;

    $this->plantilla_ingenieria('ingenieria/listProyectos', $datos);
  
   }

   public function index_ingenieria(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];


    //Obtiene Datos para el Home


    $Totales = $this->callexternosconsultas->obtieneDatosTotales($codEmpresa);
    
    $json_totales = $Totales;
    $arrayDatosTotales = json_decode($json_totales,true);
    $datos['totalProyectos'] = $arrayDatosTotales['totalProyectos'];
    $datos['totalClientes'] = $arrayDatosTotales['totalClientes'];
    $datos['totalOrdenes'] = $arrayDatosTotales['totalOrdenes'];
    $datos['totalSuppliers'] = $arrayDatosTotales['totalSuppliers'];


    $this->plantilla_ingenieria('ingenieria/home_ingenieria', $datos);


  }


  function listProyectosCliente($idProveedor){

      
      $codEmpresa = $this->session->userdata('cod_emp');
      $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);
      $datos['arrClientes'] = $arrayDatos['Clientes'];
      $datos['idCliente'] = $idProveedor;


      //Obtiene datos del proveedor

      $responseDatos = $this->callexternosclientes->obtieneDatosCliente($idProveedor);
      $array = json_decode($responseDatos);
      $datos['nombreCliente'] = $array->nombreCliente;
      $datos['rutCliente'] = $array->rutCliente;
      $datos['dvCliente'] = $array->dvCliente;

      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/left_menu', $datos);
      $this->load->view('activador/listProyectos',$datos);
      $this->load->view('activador/footer');
    }
    
  }
