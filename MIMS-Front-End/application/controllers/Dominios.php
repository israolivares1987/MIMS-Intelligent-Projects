<?php
class Dominios extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosDominios');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
  }
 

  function index_iva(){


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

      if ($this->session->userdata('rol_id')==='202'){


        $this->plantilla_activador('mantenedores/listValorIva', $datos);
  
      }elseif($this->session->userdata('rol_id')==='204'){
  
        $this->plantilla_ingenieria('mantenedores/listValorIva', $datos);
  
      }

    

  }

  function obtieneIva(){


    $datosap     = $this->callexternosdominios->obtieneDatosRef('VALOR_IVA');
    
    foreach (json_decode($datosap) as $llave => $valor) {
  
      $datos_iva[] = array(
        'valor_iva' => $valor->domain_id,
        'domain_desc' => $valor->domain_desc,
      );


    }

 

    $datos['iva'] = $datos_iva;

    echo json_encode($datos);
    
  
  }


  function editarIva(){ 

    $var_iva = $this->input->post('var_iva');
    $resp = false;
    $mensaje = "";


    $data = array();

    $iva = $this->form_validation->set_rules('var_iva', 'Iva', 'required|trim');
    
    if(!$iva->run()){
        

      $error_msg = 'Campos faltantes, favor revisar.';
      $resp =  false;

    

    }else{

      $update= array(

        'domain_id' => $var_iva,
        'domain' => 'VALOR_IVA'
      );

      $ivadato = $this->callexternosdominios->editarIva($update);
  

      if($ivadato){

        $error_msg = 'IVA actualizado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al actualizar IVA, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);
  
  
  }

  }