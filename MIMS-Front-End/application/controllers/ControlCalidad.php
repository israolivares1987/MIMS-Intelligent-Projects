<?php
class ControlCalidad extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosControlCalidad');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosJournal');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('form_validation');
    $this->load->helper('file');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallExternosBitacora');
    
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function obtieneControlCalidad(){


    $codEmpresa = $this->input->post('codEmpresa');
    $id_orden = $this->input->post('id_orden');
    $id_cliente = $this->input->post('id_cliente');
    $id_proyecto = $this->input->post('id_proyecto');


    $datosCalidad    = $this->callexternoscontrolcalidad->obtieneControlCalidad($codEmpresa,$id_orden,$id_cliente,$id_proyecto);
    $datos_calidad = array();

    if($datosCalidad){

      $arrCalidad= json_decode($datosCalidad);

      foreach ($arrCalidad as $key => $value) {
          $datos_calidad[] = array(
            'codEmpresa' => $value->codEmpresa,
            'id_control_calidad'   => $value->id_control_calidad,
            'descripcion_control_calidad'   => $value->descripcion_control_calidad
          );

    }

      $respuesta        = true;
      $mensaje   = 'Sin Error';

    }else{

      $respuesta      = false;
      $mensaje    = 'Error al obtener control calidad';
    }

    $datos['datos_calidad'] = $datos_calidad;
    $datos['resp']      = $respuesta;
    $datos['mensaje']      = $mensaje;

    echo json_encode($datos);
    
  
  }




  function dossierCalidad($idCliente,$idOrden,$codProyecto,$filtro){

      
    $codEmpresa = $this->session->userdata('cod_emp');

    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $tipo = 1;
    $datos['arrClientes'] = $menu ;

    $datos['idCliente'] = $idCliente;
    $datos['idOrden'] = $idOrden;
    $datos['codProyecto'] = $codProyecto;
    
    //Obtiene datos para cabecera

      //Obtiene Datos Proyecto

      $Proyecto = $this->callexternosproyectos->obtieneProyecto($codProyecto, $idCliente);
                

      $arrProyecto = json_decode($Proyecto);

      if($arrProyecto){

        foreach ($arrProyecto as $llave => $valor) {
                
          $DescripcionProyecto = $valor->NombreProyecto;

        }

      }
        //Obtiene Datos Orden
                  
        $Orden = $this->callexternosordenes->obtieneOrden($codProyecto,$idCliente,$idOrden,$codEmpresa);
                  

        $arrOrden = json_decode($Orden);

        if($arrOrden){
          
          foreach ($arrOrden as $llave => $valor) {
                  
            $PurchaseOrderID = $valor->PurchaseOrderID;
            $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
            $PurchaseOrderDescription = $valor->PurchaseOrderDescription;

          }
        }

     // Obtiene Datos Cliente
      
     $responseCliente = $this->callexternosclientes->obtieneCliente($idCliente);
  
     $arrCliente = json_decode($responseCliente);
    
     $datos_cliente = array();
 
     if($arrCliente){
       
       foreach ($arrCliente as $key => $value) {
 

           $nombreCliente =  $value->nombreCliente;
           $razonSocial  =   $value->razonSocial;
         
       }
     }


   //llena arreglo con datos

   $datos['idCliente'] = $idCliente;
   $datos['idOrden'] = $idOrden;
   $datos['tipoJournal'] = $tipo;
   $datos['codProyecto'] = $codProyecto;
   $datos['DescripcionProyecto'] = $DescripcionProyecto;
   $datos['nombreCliente'] = $nombreCliente;
   $datos['PurchaseOrderDescription'] = $PurchaseOrderDescription;
   $datos['PurchaseOrderNumber'] = $PurchaseOrderNumber;  
   $datos['nombreEmpleador'] = $this->session->userdata('nombres').' '.$this->session->userdata('paterno').' '.$this->session->userdata('materno');


   if ($this->session->userdata('rol_id')==='202'){

    $this->plantilla_activador('activador/listControlCalidad', $datos);
    
  }elseif($this->session->userdata('rol_id')==='203'){

    $this->plantilla_calidad('calidad/listControlCalidad', $datos);

  }elseif($this->session->userdata('rol_id')==='204'){

    $this->plantilla_ingenieria('ingenieria/listControlCalidad', $datos);

  }elseif($this->session->userdata('rol_id')==='205'){

    $this->plantilla_supervisor('supervisor/listControlCalidad', $datos);

  }




   

  }




  }