<?php
class Empresa extends MY_Controller{
  
  function __construct(){
    parent::__construct();

    $this->load->library('CallExternosEmpresas' , null , 'wsempresa');

    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

  }

  function getCountEmpresa(){
    $value     = $this->wsempresa->getCountEmpresa();
    echo json_encode($value);
    
  }

  function listaEmpresa(){
  
    $responseEmpleados = $this->wsempresa->listaEmpresa();
    $respuesta = false;

    $arrEmpresa = json_decode($responseEmpleados);
   
    $datos_empresa = array();

    if($arrEmpresa){
      $respuesta = true;
      
      foreach ($arrEmpresa as $key => $value) {

        $datos_empresa[] = array(
          'id'            => $value->id,
          'cod_empresa'   => $value->cod_empresa,
          'nombre'        => $value->nombre,
          'razon_social'  => $value->razon_social,
          'rut_empresa'   => $value->rut_empresa,
          'dv_empresa'    => $value->dv_empresa,
          'direccion'     => $value->direccion,
          'telefono'      => $value->telefono,
          'correo'        => $value->correo,
          'icono_empresa' => $value->icono_empresa
        );
        
      }
    }

    $datos['empresas'] = $datos_empresa;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  }

  function rut($r) {
    $s = 1;
    for ($m = 0; $r != 0; $r/= 10) $s = ($s + $r % 10 * (9 - $m++ % 6)) % 11;
    return chr($s ? $s + 47 : 75);
  }

  function agregarEmpresa(){

    $nombreEmpresa = $this->input->post('nombreEmpresa');
    $razonsocial   = $this->input->post('razonsocial');
    $rutempresa    = $this->input->post('rutempresa');
    $direccion     = $this->input->post('direccion');
    $telefono      = $this->input->post('telefono');
    $EmailAddress  = $this->input->post('EmailAddress'); 

    $resp = false;
    $mensaje = "";
    
    $guionYVerificador = substr($rutempresa,-1);
    
    $insert= array(
      'nombre'        => $nombreEmpresa,
      'razon_social'  => $razonsocial,
      'rut_empresa'   => $rutempresa,
      'dv_empresa'    => $guionYVerificador,
      'direccion'     => $direccion,
      'telefono'      => $telefono,
      'EmailAddress'  => $EmailAddress
    );
   
    $empresa = $this->wsempresa->agregarEmpresa($insert);
    $miEmpresa = json_decode($empresa) ;
    
    $resp =  $miEmpresa->resp;
    $idInsertado = $miEmpresa->id_insertado;
        
    if($resp){
      $error_msg = 'Empresa creada correctamente.';
      $resp =  true;
    }else{
      $error_msg = 'Inconvenientes al crear una empresa, favor reintente.';
      $resp =  false;
    }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
    echo json_encode($data);
 
  }

  function obtieneEmpresa(){
    $id_empresa = $this->input->post('id_empresa');
    $responseEmpresa = $this->wsempresa->obtieneEmpresas($id_empresa);
    $respuesta = false;
    $arrEmpresa = json_decode($responseEmpresa);
   
    $datos_empresa = array();

    if($arrEmpresa){
      foreach ($arrEmpresa as $key => $value) {
        $datos_empresa= array(
          'nombre'        => $value->nombre,
          'razon_social'  => $value->razon_social,
          'rut_empresa'   => $value->rut_empresa."-".$value->dv_empresa,
          'direccion'     => $value->direccion,
          'telefono'      => $value->telefono,
          'EmailAddress'  => $value->correo,
          'cod_empresa'   => $value->cod_empresa
        );
        
      }
    }
    
    echo json_encode($datos_empresa);
 }

  function editarEmpresa(){
    $nombreEmpresa = $this->input->post('nombreEmpresa');
    $razonsocial   = $this->input->post('razonsocial');
    $rutempresa    = $this->input->post('rutempresa');
    $direccion     = $this->input->post('direccion');
    $telefono      = $this->input->post('telefono');
    $EmailAddress  = $this->input->post('EmailAddress'); 
    $cod_empresa   = $this->input->post('IDEmpresa');

    $resp = false;
    $mensaje = "";
    
    $guionYVerificador = substr($rutempresa,-1);
    
    $insert= array(
      'cod_empresa'   => $cod_empresa,
      'nombre'        => $nombreEmpresa,
      'razon_social'  => $razonsocial,
      'rut_empresa'   => $rutempresa,
      'dv_empresa'    => $guionYVerificador,
      'direccion'     => $direccion,
      'telefono'      => $telefono,
      'EmailAddress'  => $EmailAddress
    );
    
    $empresa = $this->wsempresa->editarEmpresa($insert);
    if($empresa){
      $resp = true;
      $mensaje = "Empleado actualizado correctamente";
    }else{
      $resp = false;
      $mensaje = "Error al actualizar empleado, datos sin actualizar";
    }
    $data['resp']        = $resp;
    $data['mensaje']     = $mensaje;
  
    echo json_encode($data);
    
 }

  function eliminarEmpresa(){
    $IDEmpresa       = $this->input->post('id_empresa');
    $resp = false;
    $mensaje = "";

    $empleado = $this->wsempresa->eliminaEmpresa($IDEmpresa);
  
    if($empleado){
      $resp = true;
      $mensaje = "Empleado Eliminado correctamente";
    }else{
      $resp = false;
      $mensaje = "Error al Eliminar empleado, datos sin actualizar";
    }

    $data['resp']       = $resp;
    $data['mensaje']    = $mensaje;
   
     echo json_encode($data);
  }


 

}
?>