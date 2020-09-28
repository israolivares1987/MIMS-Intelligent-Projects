<?php
class Empleados extends MY_Controller{
  
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosDominios');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosBitacora');
    

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index_empleados(){

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



      $datocargo     = $this->callexternosdominios->obtieneDatosRef('JOB_ID');
      $select_car = "";
     foreach (json_decode($datocargo) as $llave => $valor) {
      
      $select_car .='<option value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';

    }

     
     $datos['select_car'] = $select_car;

    $datos['nombreEmpresa'] = $nombreEmpresa;
    $datos['razonSocial'] = $razonSocial;


    if ($this->session->userdata('rol_id')==='202'){


      $this->plantilla_activador('mantenedores/listEmpleados', $datos);

    }elseif($this->session->userdata('rol_id')==='204'){

      $this->plantilla_ingenieria('mantenedores/listEmpleados', $datos);

    }
    
  
   }


  function listaEmpleados(){
  
    $codEmpresa = $this->input->post('codEmpresa');

    $responseEmpleados = $this->callexternosempleados->listaEmpleados($codEmpresa);
    $respuesta = false;

    $arrEmpleados = json_decode($responseEmpleados);
   
    $datos_empleados = array();

    if($arrEmpleados){
      $respuesta = true;
      
      foreach ($arrEmpleados as $key => $value) {

        $datos_empleados[] = array(
          'ID' => $value->ID,
          'LastName'   => $value->LastName,
          'FirstName'   => $value->FirstName,
          'EmailAddress' => $value->EmailAddress,
          'JobTitle'       => $value->JobTitle,
          'cargo'       => $value->cargo,
          'BusinessPhone' => $value->BusinessPhone,
          'HomePhone' => $value->HomePhone,
          'MobilePhone' => $value->MobilePhone
        );
        
      }
    }

    $datos['empleados'] = $datos_empleados;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);


  
  }



  function obtieneEmpleado(){
  
    $id_empleado = $this->input->post('id_empleado');

    $responseEmpleado = $this->callexternosempleados->obtieneEmpleado($id_empleado);
    $respuesta = false;

    $arrEmpleado = json_decode($responseEmpleado);
   
    $datos_empleado = array();

    if($arrEmpleado){
      
      foreach ($arrEmpleado as $key => $value) {

        $datos_empleado= array(
          'ID' => $value->ID,
          'LastName'   => $value->LastName,
          'FirstName'   => $value->FirstName,
          'EmailAddress' => $value->EmailAddress,
          'JobId'       => $value->JobId,
          'JobTitle'       => $value->JobTitle,
          'BusinessPhone' => $value->BusinessPhone,
          'HomePhone' => $value->HomePhone,
          'MobilePhone' => $value->MobilePhone
        );
        
      }
    }

    echo json_encode($datos_empleado);


  
  }

  function editarEmpleado(){  

    

    $ID       = $this->input->post('ID');
    $LastName      = $this->input->post('LastName');
    $FirstName  = $this->input->post('FirstName');
    $EmailAddress           = $this->input->post('EmailAddress');
    $BusinessPhone       = $this->input->post('BusinessPhone');
    $JobId         = $this->input->post('JobId');
    $JobTitle       = $this->input->post('JobTitle'); 
    $HomePhone       = $this->input->post('HomePhone'); 
    $MobilePhone       = $this->input->post('MobilePhone');   
    $resp = false;
    $mensaje = "";


    $data = array();

    $this->form_validation->set_rules('FirstName', 'Primer Nombre', 'required|trim');

    if(!$this->form_validation->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campo Primer Nombre es obligatorio.";
    
    }else{

      $update= array(
        'ID' => $ID,
        'LastName'   => $LastName,
        'FirstName'   => $FirstName,
        'EmailAddress' => $EmailAddress,
        'JobId' => $JobId,
        'JobTitle'       => $JobTitle,
        'BusinessPhone' => $BusinessPhone,
        'HomePhone' => $HomePhone,
        'MobilePhone' => $MobilePhone
      );


      $empleado = $this->callexternosempleados->editarEmpleado($update);
    
 
			if($empleado){

				$resp = true;
        $mensaje = "Empleado actualizado correctamente";


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ACTUALIZA_EMPLEADOS',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'EMPLEADOS' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

			}else{

        $resp = false;
        $mensaje = "Error al actualizar empleado, datos sin actualizar";
			}
	
	

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


    }

    echo json_encode($data);

  }


  function agregarEmpleado(){  

    

    $LastName      = $this->input->post('LastName');
    $FirstName  = $this->input->post('FirstName');
    $EmailAddress           = $this->input->post('EmailAddress');
    $BusinessPhone       = $this->input->post('BusinessPhone');
    $JobId         = $this->input->post('JobId');
    $JobTitle       = $this->input->post('JobTitle'); 
    $HomePhone       = $this->input->post('HomePhone'); 
    $MobilePhone       = $this->input->post('MobilePhone');  
    $codEmpresa  = $this->input->post('codEmpresa');  
    $resp = false;
    $mensaje = "";


    $data = array();

    $this->form_validation->set_rules('FirstName', 'Primer Nombre', 'required|trim');

    if(!$this->form_validation->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campo Primer Nombre es obligatorio.";
    

    }else{

      $insert= array(
        'codEmpresa' => $codEmpresa,
        'LastName'   => $LastName,
        'FirstName'   => $FirstName,
        'EmailAddress' => $EmailAddress,
        'JobId' => $JobId,
        'JobTitle'       => $JobTitle,
        'BusinessPhone' => $BusinessPhone,
        'HomePhone' => $HomePhone,
        'MobilePhone' => $MobilePhone
      );

      $empleados = $this->callexternosempleados->agregarEmpleado($insert);
      $empleado = json_decode($empleados) ;
        
      $resp =  $empleado->resp;
      $idInsertado = $empleado->id_insertado;

      

      if($resp){

        $error_msg = 'Empleado creado correctamente.';
        $resp =  true;


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'INSERTA_EMPLEADOS',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'EMPLEADOS' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

      }else{

        $error_msg = 'Inconvenientes al crear empleado, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }




    function eliminaEmpleado(){  


      $ID       = $this->input->post('id_empleado');
      $resp = false;
      $mensaje = "";
  
  
     
        $empleado = $this->callexternosempleados->eliminaEmpleado($ID);
      
   
        if($empleado){
  
          $resp = true;
          $mensaje = "Empleado Eliminado correctamente";


          $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ELIMINA_EMPLEADOS',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'EMPLEADOS' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
  
        }else{
  
          $resp = false;
          $mensaje = "Error al Eliminar empleado, datos sin actualizar";
        }
    
    
  
        $data['resp']       = $resp;
        $data['mensaje']    = $mensaje;
        
        
  
  
       
      echo json_encode($data);



    }


  

  }
