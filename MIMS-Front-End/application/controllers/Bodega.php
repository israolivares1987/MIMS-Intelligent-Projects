<?php
class Bodega extends MY_Controller{
  
  
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


public function index_bodega(){


  $cod_usuario = $this->session->userdata('cod_user');
  $listaTodo = "";
  $number = 0; 
  $codEmpresa = $this->session->userdata('cod_emp');
 
  
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


    // Obtiene select Clientes

    $clientes = $this->callexternosclientes->listaClientes($codEmpresa);

    $arrClientes = json_decode($clientes);

    $htmlclientes = "";
    
    $htmlclientes .= '<select class="form-control" id="clientes">';
    $htmlclientes .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $htmlclientes .= '</select>';
    $datos['select_clientes'] = $htmlclientes;


    // Obtiene select Proyectos

    $htmlproyectos = "";

    $htmlproyectos .= '<select class="form-control" id="proyectos">';
    $htmlproyectos .= '<option value="0">Seleccione</option>';
    $htmlproyectos .= '</select>';
    $datos['select_proyectos'] = $htmlproyectos;



    // Obtiene select Ordenes

    $htmlordenes = "";

    $htmlordenes .= '<select class="form-control" id="ordenes">';
    $htmlordenes .= '<option value="0">Seleccione</option>';
    $htmlordenes .= '</select>';
    $datos['select_ordenes'] = $htmlordenes;



    $this->plantilla_bodega('bodega/home_bodega', $datos);


  }

  public function JSON_Proyectos(){

		if($this->input->is_ajax_request()){

        $id_clientes  = $this->input->post('id_clientes');

        // Obtiene select Ordenes

        $proyectos = $this->callexternosproyectos->obtieneProyectosCliente($id_clientes);

        $arrProyectos = json_decode($proyectos);

        $htmlproyectos = "";
        
        $htmlproyectos .= '<select class="form-control" id="proyectos">';
        $htmlproyectos .= '<option value="0">Seleccione</option>';
        
        foreach ($arrProyectos as $key => $value) {

          $htmlproyectos .= '<option data-name="'.trim($value->NombreProyecto).'" value="'.$value->NumeroProyecto.'">'.$value->NombreProyecto.'</option>';
        
        }

        $htmlproyectos .= '</select>';


			$todo = array(	
							'proyectos' 	=> $htmlproyectos
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
	}


  public function JSON_Ordenes(){

		if($this->input->is_ajax_request()){

        $codEmpresa = $this->session->userdata('cod_emp');
        $id_clientes  = $this->input->post('id_clientes');
        $id_proyecto  = $this->input->post('id_proyecto');

        // Obtiene select Ordenes

        $ordenes = $this->callexternosordenes->obtieneOrdenes($id_proyecto,$id_clientes,$codEmpresa);

        $arrOrdenes = json_decode($ordenes);

        $htmlordenes = "";
        
        $htmlordenes .= '<select class="form-control" id="ordenes">';
        $htmlordenes .= '<option value="0">Seleccione</option>';
        
        foreach ($arrOrdenes as $key => $value) {

          $htmlordenes .= '<option data-name="'.trim($value->PurchaseOrderNumber).'" value="'.$value->PurchaseOrderID.'">'.$value->PurchaseOrderNumber.'</option>';
        
        }

        $htmlordenes .= '</select>';


			$todo = array(	
							'ordenes' 	=> $htmlordenes
						);
			
			echo json_encode($todo);
		}else{
			show_404();
		}
	}





public function crearRR(){


  $number = 0; 
  $codEmpresa = $this->session->userdata('cod_emp');
 
  


    // Obtiene select Clientes

    $clientes = $this->callexternosclientes->listaClientes($codEmpresa);

    $arrClientes = json_decode($clientes);

    $htmlclientes = "";
    
    $htmlclientes .= '<select class="form-control" id="clientes">';
    $htmlclientes .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $htmlclientes .= '</select>';
    $datos['select_clientes'] = $htmlclientes;


    // Obtiene select Proyectos

    $htmlproyectos = "";

    $htmlproyectos .= '<select class="form-control" id="proyectos">';
    $htmlproyectos .= '<option value="0">Seleccione</option>';
    $htmlproyectos .= '</select>';
    $datos['select_proyectos'] = $htmlproyectos;



    // Obtiene select Ordenes

    $htmlordenes = "";

    $htmlordenes .= '<select class="form-control" id="ordenes">';
    $htmlordenes .= '<option value="0">Seleccione</option>';
    $htmlordenes .= '</select>';
    $datos['select_ordenes'] = $htmlordenes;



    $this->plantilla_bodega('bodega/crearRR', $datos);


  }


  

public function crearRE(){


  $number = 0; 
  $codEmpresa = $this->session->userdata('cod_emp');
 
  


    // Obtiene select Clientes

    $clientes = $this->callexternosclientes->listaClientes($codEmpresa);

    $arrClientes = json_decode($clientes);

    $htmlclientes = "";
    
    $htmlclientes .= '<select class="form-control" id="clientes">';
    $htmlclientes .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $htmlclientes .= '</select>';
    $datos['select_clientes'] = $htmlclientes;


    // Obtiene select Proyectos

    $htmlproyectos = "";

    $htmlproyectos .= '<select class="form-control" id="proyectos">';
    $htmlproyectos .= '<option value="0">Seleccione</option>';
    $htmlproyectos .= '</select>';
    $datos['select_proyectos'] = $htmlproyectos;



    // Obtiene select Ordenes

    $htmlordenes = "";

    $htmlordenes .= '<select class="form-control" id="ordenes">';
    $htmlordenes .= '<option value="0">Seleccione</option>';
    $htmlordenes .= '</select>';
    $datos['select_ordenes'] = $htmlordenes;



    $this->plantilla_bodega('bodega/crearRE', $datos);


  }


  public function crearEXB(){


    $number = 0; 
    $codEmpresa = $this->session->userdata('cod_emp');
   
    
  
  
      // Obtiene select Clientes
  
      $clientes = $this->callexternosclientes->listaClientes($codEmpresa);
  
      $arrClientes = json_decode($clientes);
  
      $htmlclientes = "";
      
      $htmlclientes .= '<select class="form-control" id="clientes">';
      $htmlclientes .= '<option value="0">Seleccione</option>';
      
      foreach ($arrClientes as $key => $value) {
  
        $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
      
      }
  
      $htmlclientes .= '</select>';
      $datos['select_clientes'] = $htmlclientes;
  
  
      // Obtiene select Proyectos
  
      $htmlproyectos = "";
  
      $htmlproyectos .= '<select class="form-control" id="proyectos">';
      $htmlproyectos .= '<option value="0">Seleccione</option>';
      $htmlproyectos .= '</select>';
      $datos['select_proyectos'] = $htmlproyectos;
  
  
  
      // Obtiene select Ordenes
  
      $htmlordenes = "";
  
      $htmlordenes .= '<select class="form-control" id="ordenes">';
      $htmlordenes .= '<option value="0">Seleccione</option>';
      $htmlordenes .= '</select>';
      $datos['select_ordenes'] = $htmlordenes;
  
  
  
      $this->plantilla_bodega('bodega/crearEXB', $datos);
  
  
    }
    public function crearEI(){


      $number = 0; 
      $codEmpresa = $this->session->userdata('cod_emp');
     
      
    
    
        // Obtiene select Clientes
    
        $clientes = $this->callexternosclientes->listaClientes($codEmpresa);
    
        $arrClientes = json_decode($clientes);
    
        $htmlclientes = "";
        
        $htmlclientes .= '<select class="form-control" id="clientes">';
        $htmlclientes .= '<option value="0">Seleccione</option>';
        
        foreach ($arrClientes as $key => $value) {
    
          $htmlclientes .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
        
        }
    
        $htmlclientes .= '</select>';
        $datos['select_clientes'] = $htmlclientes;
    
    
        // Obtiene select Proyectos
    
        $htmlproyectos = "";
    
        $htmlproyectos .= '<select class="form-control" id="proyectos">';
        $htmlproyectos .= '<option value="0">Seleccione</option>';
        $htmlproyectos .= '</select>';
        $datos['select_proyectos'] = $htmlproyectos;
    
    
    
        // Obtiene select Ordenes
    
        $htmlordenes = "";
    
        $htmlordenes .= '<select class="form-control" id="ordenes">';
        $htmlordenes .= '<option value="0">Seleccione</option>';
        $htmlordenes .= '</select>';
        $datos['select_ordenes'] = $htmlordenes;
    
    
    
        $this->plantilla_bodega('bodega/crearEI', $datos);
    
    
      } 
}
