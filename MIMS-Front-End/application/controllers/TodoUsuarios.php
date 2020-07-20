<?php
class TodoUsuarios extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosTodo');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
  }
 


  function guardarTodoUsuario(){  

    
    $descripcion_todo  = $this->input->post('var_descripcion_todo');  
    $var_fecha_inicio      = $this->callutil->formatoFecha($this->input->post('var_fecha_inicio'));
    $var_fecha_termino  = $this->callutil->formatoFecha($this->input->post('var_fecha_termino'));

    $codEmpresa = $this->session->userdata('cod_emp');
    $cod_usuario = $this->session->userdata('cod_user');
    $idInsertado = 0;
    
    $resp = false;
    $error_msg = "";

  


    $data = array();

    $descripcion = $this->form_validation->set_rules('var_descripcion_todo', 'Descripcion', 'required|trim');
    $fecha_inicio = $this->form_validation->set_rules('var_fecha_inicio', 'Fecha Inicio', 'required|trim');
    $fecha_termino = $this->form_validation->set_rules('var_fecha_termino', 'Fecha Termino', 'required|trim');
   
    
    if(!$descripcion->run() || !$fecha_inicio->run()  || !$fecha_termino->run()){
        
      $error_msg = 'Datos Faltantes, favor revisar.';
      $resp =  false;
    

    }else{

      $insert= array(
        'codEmpresa'  => $codEmpresa,  
        'id_usuario'      => $cod_usuario,
        'descripcion_todo'  => $descripcion_todo,
        'fecha_inicio'           => $var_fecha_inicio,
        'fecha_termino'       => $var_fecha_termino
      );

      $todo = $this->callexternostodo->guardarTodoUsuario($insert);
      $todoins = json_decode($todo) ;
        
      $resp =  $todoins->resp;
      $idInsertado = $todoins->id_insertado;

      

      if($resp){

        $error_msg = 'To-Do creado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al crear To-Do, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }




  function actualizaEstadoTodo(){  

    $codEmpresa  = $this->input->post('codEmpresa');  
    $id_usuario = $this->input->post('id_usuario');  
    $id_todo      = $this->input->post('id_todo');
    
    $resp = false;
    $mensaje = "";


    $data = array();

    $nombre = $this->form_validation->set_rules('id_todo', 'Id to Do', 'required|trim');
   
    
    if(!$nombre->run()){
        

      $error_msg = 'Campos faltantes, favor revisar.';
      $resp =  false;

    

    }else{

      $todo = $this->callexternostodo->obtieneTodoUsuario($codEmpresa,$id_usuario,$id_todo);

      $arrTodo = json_decode($todo);
  
      if($arrTodo){
        
        
        foreach ($arrTodo as $key => $value) {
  
          $estadoTodo = $value->estado;
        }
      }
  
  
      if ($estadoTodo > 0){
  
        $estado = 0;
  
      }else{
  
        $estado = 1;
  
      }

      $update= array(

        'codEmpresa'  => $codEmpresa,  
        'id_usuario'  => $id_usuario,  
        'id_todo'      => $id_todo,
        'estado'  => $estado
      );

      $todo = $this->callexternostodo->actualizaEstadoTodo($update);
  

      if($todo){

        $error_msg = 'To-Do actualizado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al actualizar To-Do, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);

  }



  function obtieneTodoUsuario(){

    $codEmpresa     = $this->input->post('codEmpresa');
    $id_usuario  = $this->input->post('cod_usuario');
    $id_todo   = $this->input->post('id_todo');
  
    $data         = array();
    $datos        = array();

    $todo        =  $this->callexternostodo->obtieneTodoUsuario($codEmpresa,$id_usuario,$id_todo);

    if($todo){

      foreach (json_decode($todo) as $key => $value) {
        
        $data = array(
          'descripcion_todo'     => $value->descripcion_todo,
          'fecha_inicio'     => $this->callutil->formatoFechaSalida($value->fecha_inicio),
          'fecha_termino'       => $this->callutil->formatoFechaSalida($value->fecha_termino)
        );

      }

    }

    $datos['formulario'] = $data;

    echo json_encode($datos);


  }

  function editaTodoUsuario(){  

    
    $descripcion_todo  = $this->input->post('var_edit_descripcion_todo');  
    $var_fecha_inicio      = $this->callutil->formatoFecha($this->input->post('var_edit_fecha_inicio'));
    $var_fecha_termino  = $this->callutil->formatoFecha($this->input->post('var_edit_fecha_termino'));

    $codEmpresa = $this->session->userdata('cod_emp');
    $id_usuario  = $this->input->post('var_edit_id_usuario');
    $id_todo   = $this->input->post('var_edit_id_todo');
    
    $resp = false;
    $error_msg = "";

    $data = array();

    $descripcion = $this->form_validation->set_rules('var_edit_descripcion_todo', 'Descripcion', 'required|trim');
    $fecha_inicio = $this->form_validation->set_rules('var_edit_fecha_inicio', 'Fecha Inicio', 'required|trim');
    $fecha_termino = $this->form_validation->set_rules('var_edit_fecha_termino', 'Fecha Termino', 'required|trim');
   
    
    if(!$descripcion->run() || !$fecha_inicio->run()  || !$fecha_termino->run()){
        
      $error_msg = 'Datos Faltantes, favor revisar.';
      $resp =  false;
    

    }else{

      $update= array(
        'codEmpresa'  => $codEmpresa,  
        'id_usuario'      => $id_usuario,
        'descripcion_todo'  => $descripcion_todo,
        'fecha_inicio'           => $var_fecha_inicio,
        'fecha_termino'       => $var_fecha_termino,
        'id_todo'      => $id_todo
      );

   

      $todo = $this->callexternostodo->editaTodoUsuario($update);
   
      

      if($todo){

        $error_msg = 'To-Do actualizado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al actualizar To-Do, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);

  }

  function eliminaTodoUsuario(){  


    $id_todo       = $this->input->post('id_todo');
    $cod_usuario = $this->input->post('cod_usuario');
    $codEmpresa = $this->session->userdata('cod_emp');
    $resp = false;
    $mensaje = "";


   
      $todo = $this->callexternostodo->eliminaTodoUsuario($codEmpresa,$cod_usuario,$id_todo);
    
 
      if($todo){

        $resp = true;
        $mensaje = "To Do Eliminado correctamente";

      }else{

        $resp = false;
        $mensaje = "Error al Eliminar To do, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }


}