<?php
class Ingenieria extends MY_Controller{
  
  
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
    $this->load->helper('file');
    

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

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

    

    $this->plantilla_ingenieria('ingenieria/listProyectos', $datos);
  
   }

   public function index_ingenieria(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu ;

    


    $this->plantilla_ingenieria('ingenieria/home_ingenieria', $datos);


  }


}
