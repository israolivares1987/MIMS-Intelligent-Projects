<?php
class TodoUsuarios extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosTodo');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosBitacora');
    $this->load->library('CallExternosDominios');

    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    
  }
 


  function guardarTodoUsuario(){  

    
    $descripcion_todo  = $this->input->post('var_descripcion_todo');  
    $var_lista_todo  = $this->input->post('var_lista_todo');  
    $var_fecha_inicio      = $this->callutil->formatoFecha($this->input->post('var_fecha_inicio'));
    $var_fecha_termino  = $this->callutil->formatoFecha($this->input->post('var_fecha_termino'));

    $codEmpresa = $this->session->userdata('cod_emp');
    $cod_usuario = $this->session->userdata('cod_user');
    $idInsertado = 0;
    
    $resp = false;
    $error_msg = "";

  


    $data = array();

    $fecha_inicio = $this->form_validation->set_rules('var_fecha_inicio', 'Fecha Inicio', 'required|trim');
    $fecha_termino = $this->form_validation->set_rules('var_fecha_termino', 'Fecha Termino', 'required|trim');
   
    
    if(!$fecha_inicio->run()  || !$fecha_termino->run()){
        
      $error_msg = 'Datos Faltantes, favor revisar.';
      $resp =  false;
    

    }else{

      $insert= array(
        'codEmpresa'  => $codEmpresa,  
        'id_usuario'      => $cod_usuario,
        'lista_todo'      => $var_lista_todo,
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


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'INSERTA_TO-DO',
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'TO-DO' ,
      'fechaCambio' =>  date_create()->format('Y-m-d'));

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

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


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ACTUALIZA_ESTADO_TO-DO',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'TO-DO' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));
  
        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

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
    $select_todo   = '<select class="form-control" id="edit_var_lista_todo" name="edit_var_lista_todo">'; 
    if($todo){

      foreach (json_decode($todo) as $key => $value) {
      

        $datoap   = $this->callexternosdominios->obtieneDatosRef('LISTA_TO_DO');


           foreach (json_decode($datoap) as $llave => $valor) {
      
              $selected = ($valor->domain_desc == $value->lista_todo) ? 'selected' : '';
              $select_todo .='<option '.$selected.' value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';
    
        }
        
  $select_todo .= '</select>';


        $data = array(
          'descripcion_todo'     => $value->descripcion_todo,
          'lista_todo'     => $value->lista_todo,
          'select_lista_todo'     => $select_todo,
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
    $lista_todo  = $this->input->post('edit_var_lista_todo'); 
    
    $var_fecha_inicio      = $this->callutil->formatoFecha($this->input->post('var_edit_fecha_inicio'));
    $var_fecha_termino  = $this->callutil->formatoFecha($this->input->post('var_edit_fecha_termino'));

    $codEmpresa = $this->session->userdata('cod_emp');
    $id_usuario  = $this->input->post('var_edit_id_usuario');
    $id_todo   = $this->input->post('var_edit_id_todo');
    
    $resp = false;
    $error_msg = "";

    $data = array();

   $fecha_inicio = $this->form_validation->set_rules('var_edit_fecha_inicio', 'Fecha Inicio', 'required|trim');
    $fecha_termino = $this->form_validation->set_rules('var_edit_fecha_termino', 'Fecha Termino', 'required|trim');
   
    
    if( !$fecha_inicio->run()  || !$fecha_termino->run()){
        
      $error_msg = 'Datos Faltantes, favor revisar.';
      $resp =  false;
    

    }else{

      $update= array(
        'codEmpresa'  => $codEmpresa,  
        'id_usuario'      => $id_usuario,
        'descripcion_todo'  => $descripcion_todo,
        'fecha_inicio'           => $var_fecha_inicio,
        'fecha_termino'       => $var_fecha_termino,
        'id_todo'      => $id_todo,
        'lista_todo' =>$lista_todo
      );

   

      $todo = $this->callexternostodo->editaTodoUsuario($update);
   
      

      if($todo){

        $error_msg = 'To-Do actualizado correctamente.';
        $resp =  true;

        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ACTUALIZA_TO-DO',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'TO-DO' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));
  
        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

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


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ELIMINA_TO-DO',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'TO-DO' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));
 
        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);


      }else{

        $resp = false;
        $mensaje = "Error al Eliminar To do, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }

  function obtieneTodoUsuarios(){

    $cod_usuario = $this->input->post('cod_usuario');
    $codEmpresa = $this->session->userdata('cod_emp');
    $datos_todo = array();
    $datos_select = array();
    $todo = $this->callexternostodo->obtieneTodoUsuarios($codEmpresa,$cod_usuario);
    $rol_id = $this->session->userdata('rol_id');


    $arrTodo = json_decode($todo);

  
    if($arrTodo){
      
      
      foreach ($arrTodo as $key => $value) {

        $datos_todo[] = array(
          'codEmpresa'     => $value->codEmpresa,
          'id_usuario'     => $value->id_usuario,
          'id_todo'     => $value->id_todo,
          'descripcion_todo'     => $value->descripcion_todo,
          'lista_todo'     => $value->lista_todo,
          'estado'        => $value->estado,
          'fecha_inicio'     => $this->callutil->formatoFechaSalida($value->fecha_inicio),
          'fecha_termino'       => $this->callutil->formatoFechaSalida($value->fecha_termino),
          'dif'       => $value->dif,
          'dias'    => $value->dias
        );


        
      }
    }

    $select_todo   = '<select class="form-control"  id="var_lista_todo" name="var_lista_todo">'; 
   
        $datoap   = $this->callexternosdominios->obtieneDatosRef('LISTA_TO_DO');
          foreach (json_decode($datoap) as $llave => $valor) {
      
            

            if ($this->session->userdata('rol_id')==='202' || $this->session->userdata('rol_id')==='203'){

              if($valor->rol_id ===$this->session->userdata('rol_id'))
              {
                $select_todo .='<option  value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';

              }     
          
            }else{
          
              $select_todo .='<option  value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';
    
            }           
        }
        
  $select_todo .= '</select>';

    
    $datos['formularios'] = $datos_todo;
    $datos['select_lista_todo'] = $select_todo;

    echo json_encode($datos);


  }

}