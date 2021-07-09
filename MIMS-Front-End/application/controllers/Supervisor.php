<?php
class Supervisor extends MY_Controller{
  
  
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

    

    $this->plantilla_supervisor('supervisor/listProyectos', $datos);
  
   }

   public function index_supervisor(){

    $cod_usuario = $this->session->userdata('cod_user');
    $listaTodo = "";
    $number = 0;
      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu ;

    
 // Obtiene Todo

    


 $todo = $this->callexternostodo->obtieneTodoUsuarios($codEmpresa,$cod_usuario);

 $arrTodo = json_decode($todo);

 if($arrTodo){
   
   
   foreach ($arrTodo as $key => $value) {

     $number ++;

     if ($value->dif > 3){

       $color = 'badge badge-success';

     }else{

       $color = 'badge badge-danger';

     }


     if ($value->estado > 0){


       $class = '';
     

     }else{

       $class = 'class="done"';

     }

     $listaTodo .= '<li '.$class.'>
     <span class="handle">
       <i class="fas fa-ellipsis-v"></i>
       <i class="fas fa-ellipsis-v"></i>
     </span>
     <div  class="icheck-primary d-inline ml-2">
       <input type="checkbox" value="'.$value->id_todo.'" name="todo'.$number.'" id="todoCheck'.$number.'" onclick="cambiarEstado(this)">
       <label for="todoCheck'.$number.'"></label>
     </div>

     <span class="text">'.$value->lista_todo.'</span>
    

     <span class="text">'.$value->descripcion_todo.'</span>
     <small class="'.$color.'"><i class="far fa-clock"></i> '.$value->dif.'</small>
     <div class="tools">
    
     <button data-toggle="tooltip" data-placement="left" title="Editar To Do" 
     onclick="obtiene_todo('.$value->id_todo.','. $cod_usuario.')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-edit"></i></button>

     <button data-toggle="tooltip" data-placement="left" title="Eliminar To Do" 
     onclick="eliminar_todo('.$value->id_todo.','. $cod_usuario.')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>
     </div>
   </li>';


     
   }
 }

 $datos['select_listaTodo']  = $this->callutil->obtiene_select_def('var_lista_todo','LISTA_TO_DO','var_lista_todo');


 $datos['listaTodo'] = $listaTodo ;


  // Se obtiene datos totales


  $datosTotales = $this->callexternosconsultas->obtieneDatosTotales($codEmpresa);


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

  

    $this->plantilla_supervisor('supervisor/home_supervisor', $datos);


  }


}
