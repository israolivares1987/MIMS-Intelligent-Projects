<?php
class Activador extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosBuckSheet');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosProveedores');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('form_validation');
    $this->load->library('CallExternosTodo');
    $this->load->helper('file');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

 

   function index_activador(){

    

    $html = "";	 
    $codEmpresa = $this->session->userdata('cod_emp');
    $cod_usuario = $this->session->userdata('cod_user');
    $email = $this->session->userdata('email');
    $listaTodo = "";
    $number = 0;
    
    // Obtiene menu lateral
    
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
  
    $menu = $this->callutil->armaMenuClientes($response);

   
    $datos['arrClientes'] = $menu ;


 

    
  // Se obtiene datos totales


  $datosTotales = $this->callexternosconsultas->obtieneDatosTotalesxActivador($codEmpresa,$email);


  $arrTotalessss = json_decode($datosTotales);

  $arrTotales = $this->callutil->objectToArray($arrTotalessss);
  

      $datos['totalProyectos'] =  $this->callutil->formatoNumero($arrTotales['totalProyectos']);
      $datos['totalClientes'] =   $this->callutil->formatoNumero($arrTotales['totalClientes']);
      $datos['totalLineasActivablesPlanCompras'] =  $this->callutil->formatoNumero($arrTotales['totalLineasActivablesPlanCompras']);
      $datos['totalLineasActivablesPlanObra'] =   $this->callutil->formatoNumero($arrTotales['totalLineasActivablesPlanObra']);
      $datos['totalOrdenesCompras'] =  $this->callutil->formatoNumero($arrTotales['totalOrdenesCompras']);
      $datos['totalOrdenesObra'] =   $this->callutil->formatoNumero($arrTotales['totalOrdenesObra']);
      $datos['totalOrdenesAdminCompras'] =  $this->callutil->formatoDinero($arrTotales['totalOrdenesAdminCompras']);
      $datos['totalOrdenesAdminObras'] =  $this->callutil->formatoDinero($arrTotales['totalOrdenesAdminObras']);


    $this->plantilla_activador('activador/home_activador', $datos);

  }

  function proyectos(){

    $codEmpresa = $this->session->userdata('cod_emp');

    $clientes = $this->callexternosclientes->listaClientes($codEmpresa);

    $arrClientes = json_decode($clientes);

    $html = "";
    
    $html .= '<select class="form-control" id="select_clientes">';
    $html .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $html .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    
    $datoarchivo     = $this->callexternosdominios->obtieneDatosRef('NOMBRE_ARCHIVO_EJEMPLO_ITEM');

    foreach (json_decode($datoarchivo) as $llave => $valor) {
     
     $nombreArchivoEjemploItem =$valor->domain_desc;

   }

    $html .= '</select>';
    $datos['select_clientes'] = $html;
    $datos['nombreArchivoEjemploItem'] = $nombreArchivoEjemploItem;

    

    $this->plantilla_activador('activador/listProyectos', $datos);
  
   }

  }
