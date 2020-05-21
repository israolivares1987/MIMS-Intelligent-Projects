<?php
class Clientes extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
  }
 

  function index(){


    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
  
    $menu = $this->callutil->armaMenuClientes($response);

   
    $datos['arrClientes'] = $menu ;


      // Datos Empresas

      $responseEmpresas = $this->callexternosempresas->obtieneEmpresas($codEmpresa);
      $respuesta = false;

      $arrEmpresas = json_decode($responseEmpresas);

      if($arrEmpresas){
        $respuesta = true;
        
        foreach ($arrEmpresas as $key => $value) {

          $nombreEmpresa = $value->nombre;
          $razonSocial = $value->razon_social;
          
        }
      }





      $datos['nombreEmpresa'] = $nombreEmpresa;
      $datos['razonSocial'] = $razonSocial;

      $this->plantilla_ingenieria('mantenedores/listClientes', $datos);

  }


  function listaClientes(){


    $codEmpresa = $this->input->post('codEmpresa');
    $responseClientes = $this->callexternosclientes->listaClientes($codEmpresa);
    $respuesta = false;

    $arrClientes = json_decode($responseClientes);
   
    $datos_clientes = array();

    if($arrClientes){
      $respuesta = true;
      
      foreach ($arrClientes as $key => $value) {

        $datos_clientes[] = array(
          'idCliente' => $value->idCliente,
          'nombreCliente'   => $value->nombreCliente,
          'razonSocial'   => $value->razonSocial,
          'rutCliente' => $value->rutCliente,
          'dvCliente'       => $value->dvCliente,
          'direccion' => $value->direccion,
          'contacto' => $value->contacto,
          'telefono' => $value->telefono,
          'correo' => $value->correo
        );
        
      }
    }

    $datos['clientes'] = $datos_clientes;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }

  function agregarCliente(){  

    

    $nombreCliente      = $this->input->post('nombreCliente');
    $razonSocial  = $this->input->post('razonSocial');
    $rutCliente           = $this->input->post('rutCliente');
    $dvCliente       = $this->input->post('dvCliente');
    $direccion       = $this->input->post('direccion'); 
    $contacto       = $this->input->post('contacto'); 
    $telefono       = $this->input->post('telefono');  
    $correo          = $this->input->post('correo');  
    $codEmpresa  = $this->input->post('codEmpresa');  
    $resp = false;
    $mensaje = "";


    $data = array();

    $nombre = $this->form_validation->set_rules('nombreCliente', 'Nombre Cliente', 'required|trim');
    $razon = $this->form_validation->set_rules('razonSocial', 'Razon Social', 'required|trim');
    $rut = $this->form_validation->set_rules('rutCliente', 'Rut Cliente', 'required|trim');
    $dv = $this->form_validation->set_rules('dvCliente', 'Dv Cliente', 'required|trim');
    
    if(!$nombre->run() && !$razon->run() && !$rut->run() && !$dv->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campos faltantes, favor revisar.";
    

    }else{

      $insert= array(
        'codEmpresa' => $codEmpresa,
        'nombreCliente'   => $nombreCliente,
        'razonSocial'   => $razonSocial,
        'rutCliente' => $rutCliente,
        'dvCliente'       => $dvCliente,
        'direccion' => $direccion,
        'contacto' => $contacto,
        'telefono' => $telefono,
        'correo' => $correo
      );

      $cliente = $this->callexternosclientes->agregarCliente($insert);
      $clienteins = json_decode($cliente) ;
        
      $resp =  $clienteins->resp;
      $idInsertado = $clienteins->id_insertado;

      

      if($resp){

        $error_msg = 'Cliente creado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al crear cliente, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }

  function obtieneCliente(){
  
    $id_cliente = $this->input->post('id_cliente');

    $responseCliente = $this->callexternosclientes->obtieneCliente($id_cliente);
    $respuesta = false;

    $arrCliente = json_decode($responseCliente);
   
    $datos_cliente = array();

    if($arrCliente){
      
      foreach ($arrCliente as $key => $value) {

        $datos_clientes = array(
          'idCliente' => $value->idCliente,
          'codEmpresa' => $value->codEmpresa,
          'nombreCliente'   => $value->nombreCliente,
          'razonSocial'   => $value->razonSocial,
          'rutCliente' => $value->rutCliente,
          'dvCliente'       => $value->dvCliente,
          'direccion' => $value->direccion,
          'contacto' => $value->contacto,
          'telefono' => $value->telefono,
          'correo' => $value->correo
        );
        
        
      }
    }

    echo json_encode($datos_clientes);


  
  }


  function editarCliente(){  

    $idCliente        = $this->input->post('idCliente');
    $nombreCliente      = $this->input->post('nombreCliente');
    $razonSocial  = $this->input->post('razonSocial');
    $rutCliente           = $this->input->post('rutCliente');
    $dvCliente       = $this->input->post('dvCliente');
    $direccion       = $this->input->post('direccion'); 
    $contacto       = $this->input->post('contacto'); 
    $telefono       = $this->input->post('telefono');  
    $correo          = $this->input->post('correo');  
    $codEmpresa  = $this->input->post('codEmpresa');  
    $resp = false;
    $mensaje = "";


    $data = array();

    $nombre = $this->form_validation->set_rules('nombreCliente', 'Nombre Cliente', 'required|trim');
    $razon = $this->form_validation->set_rules('razonSocial', 'Razon Social', 'required|trim');
    $rut = $this->form_validation->set_rules('rutCliente', 'Rut Cliente', 'required|trim');
    $dv = $this->form_validation->set_rules('dvCliente', 'Dv Cliente', 'required|trim');
    
    if(!$nombre->run() || !$razon->run() || !$rut->run() || !$dv->run()){
        

      $error_msg = 'Campos faltantes, favor revisar.';
      $resp =  false;

    

    }else{

      $update= array(

        'idCliente' => $idCliente,
        'codEmpresa' => $codEmpresa,
        'nombreCliente'   => $nombreCliente,
        'razonSocial'   => $razonSocial,
        'rutCliente' => $rutCliente,
        'dvCliente'       => $dvCliente,
        'direccion' => $direccion,
        'contacto' => $contacto,
        'telefono' => $telefono,
        'correo' => $correo
      );

      $cliente = $this->callexternosclientes->editarCliente($update);
  

      if($cliente){

        $error_msg = 'Cliente actualizado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al actualizar cliente, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);

  }

  function eliminaCliente(){  


    $idCliente       = $this->input->post('id_cliente');
    $resp = false;
    $mensaje = "";


   
      $cliente = $this->callexternosclientes->eliminaCliente($idCliente);
    
 
      if($cliente){

        $resp = true;
        $mensaje = "Cliente Eliminado correctamente";

      }else{

        $resp = false;
        $mensaje = "Error al Eliminar cliente, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }

  


  }