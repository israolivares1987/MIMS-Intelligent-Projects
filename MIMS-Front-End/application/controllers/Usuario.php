<?php
class Usuario extends MY_Controller{
  
  function __construct(){
    parent::__construct();

    $this->load->library('CallExternosUsuario' , null , 'wsusuario');

    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function getCountUsuario(){
    $value     = $this->wsusuario->getCountUsuario();
    echo json_encode($value);
  }

 

  function obtieneUsuario(){
    $id_usuario = $this->input->post('id');
    $responseUsuario = $this->wsusuario->obtieneUsuario($id_usuario);
    
    $respuesta = false;
    $arrUsuario = json_decode($responseUsuario);
   
    $datos_usuario = array();

    if($arrUsuario){
      foreach ($arrUsuario as $key => $value) {
        
        $datos_usuario= array(
          'id'        => $value->id,
          'cod_user'  => $value->cod_user,
          'cod_emp'   => $value->cod_emp,
          'nombres'   => $value->nombres,
          'rol_id'    => $value->rol_id,
          'n_usuario' => $value->n_usuario,
          'password'  => $value->password,
          'paterno'   => $value->paterno,
          'materno'   => $value->materno,
          'email'     => $value->email
        );
        
      }
    }
    
    echo json_encode($datos_usuario);
  }

  function listaUsuario(){
    $responseUsuarios = $this->wsusuario->listaUsuario();
    $respuesta = false;

    $arrUsuarios = json_decode($responseUsuarios);
   
    $datos_usuarios = array();

    if($arrUsuarios){
      $respuesta = true;
      
      foreach ($arrUsuarios as $key => $value) {

        $datos_usuarios[] = array(
          'id'        => $value->id,
          'cod_user'  => $value->cod_user,
          'cod_emp'   => $value->cod_emp,
          'nombres'   => $value->nombres,
          'rol_id'    => $value->rol_id,
          'n_usuario' => $value->n_usuario,
          'paterno'   => $value->paterno,
          'materno'   => $value->materno,
          'email'     => $value->email
        );
      }
    }
   
    $datos['usuarios']  = $datos_usuarios;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  }

  function agregarUsuario(){
    $nombres          = $this->input->post('nombreusuario');
    $apellidoPaterno  = $this->input->post('apellidoPaterno');
    $apellidoMaterno  = $this->input->post('apellidoMaterno');
    $usuario          = $this->input->post('usuario');
    $correo           = $this->input->post('EmailAddress');
    $password         = md5($this->input->post('inputPassword3')); 

    $cod_emp          = $this->input->post('id_empresa');
    $rol_id           = $this->input->post('id_rol');

  
    $resp = false;
    $mensaje = "";
   
    $insert= array(
      'nombres'    => $nombres,
      'n_usuario'  => $usuario,
      'password'   => $password,
      'paterno'    => $apellidoPaterno,
      'materno'    => $apellidoMaterno,
      'email'      => $correo,
      'cod_emp'    => $cod_emp,
      'rol_id'     => $rol_id,
      'estado'     => 1,
      'avatar'     => '4.jpg'
    );
   
    $usuario = $this->wsusuario->agregarUsuario($insert);
    $miUsuario = json_decode($usuario) ;
    
    $resp =  $miUsuario->resp;
    $idInsertado = $miUsuario->id_insertado;
        
    if($resp){
      $error_msg = 'Usuario creado correctamente.';
      $resp =  true;
    }else{
      $error_msg = 'Inconvenientes al crear un usuario, favor reintente.';
      $resp =  false;
    }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
    echo json_encode($data);
  }

  function getRoles(){
    $responseRoles = $this->wsusuario->listaRoles();
    $respuesta = false;
    $arrRol = json_decode($responseRoles);
   
    $datos_rol = array();

    if($arrRol){
      $respuesta = true;
      
      foreach ($arrRol as $key => $value) {

        $datos_rol[] = array(
          'rol_id'  => $value->rol_id,
          'nombre'  => $value->nombre
        );
      }
    }
  
    $datos['roles']  = $datos_rol;
    $datos['resp']   = $respuesta;

    echo json_encode($datos);
  }

  function setAsignacionUsuario(){
    $id_usuario = $this->input->post('id_usuario');
    $id_empresa = $this->input->post('id_empresa');
    $id_rol     = $this->input->post('id_rol');

    $resp = false;
    $mensaje = "";
    
    $update= array(
      'id'      => $id_usuario,
      'cod_emp' => $id_empresa,
      'rol_id'  => $id_rol
    );
    
    
    $usuario = $this->wsusuario->asignarRolEmpresaUsuario($update);
    
    if($usuario){
      $resp = true;
      $mensaje = "Usuario actualizado correctamente";
    }else{
      $resp = false;
      $mensaje = "Error al actualizar usuario, datos sin actualizar";
    }
    $data['resp']        = $resp;
    $data['mensaje']     = $mensaje;
  
    echo json_encode($data);
  }

  function editarUsuario(){
    $id               = $this->input->post('IDUsuario');
    $nombres          = $this->input->post('nombreusuario');
    $apellidoPaterno  = $this->input->post('apellidoPaterno');
    $apellidoMaterno  = $this->input->post('apellidoMaterno');
    $usuario          = $this->input->post('usuario');
    $correo           = $this->input->post('EmailAddress');
    
    $cod_emp          = $this->input->post('id_empresa');
    $rol_id           = $this->input->post('id_rol');

    $resp = false;
    $mensaje = "";
    
    
    
    $update= array(
      'id'         => $id,
      'nombres'    => $nombres,
      'n_usuario'  => $usuario,
      'paterno'    => $apellidoPaterno,
      'materno'    => $apellidoMaterno,
      'email'      => $correo,
      'cod_emp'    => $cod_emp,
      'rol_id'     => $rol_id,
      'estado'     => 1,
      'avatar'     => '4.jpg'
    );
    
    $usuario = $this->wsusuario->editarUsuario($update);
    if($usuario){
      $resp = true;
      $mensaje = "Usuario actualizado correctamente";
    }else{
      $resp = false;
      $mensaje = "Error al actualizar el usuario, datos sin actualizar";
    }
    $data['resp']        = $resp;
    $data['mensaje']     = $mensaje;
  
    echo json_encode($data);
  }

  function eliminarUsuario(){
    $IDUsuario      = $this->input->post('id_usuario');
    $resp = false;
    $mensaje = "";

    $usuario = $this->wsusuario->eliminaUsuario($IDUsuario);
  
    if($usuario){
      $resp = true;
      $mensaje = "Usuario Eliminado correctamente";
    }else{
      $resp = false;
      $mensaje = "Error al Eliminar el usuario";
    }

    $data['resp']       = $resp;
    $data['mensaje']    = $mensaje;
   
     echo json_encode($data);
  }

}
?>