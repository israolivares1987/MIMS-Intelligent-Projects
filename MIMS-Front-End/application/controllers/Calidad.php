<?php
class Calidad extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosTodo');
    $this->load->library('CallUtil');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
      
    }
  }

 

   function index_calidad(){


    $html = "";	 
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $cod_usuario = $this->session->userdata('cod_user');
    $listaTodo = "";
    $number = 0;
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
 


    $this->plantilla_calidad('calidad/home_calidad',$datos);

  }
    
  }
