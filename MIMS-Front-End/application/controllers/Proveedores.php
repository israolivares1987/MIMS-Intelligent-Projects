<?php
class Proveedores extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosProveedores');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('form_validation');
    $this->load->library('CallExternosBitacora');
    $this->load->library('CallUtil');

    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
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

      if ($this->session->userdata('rol_id')==='202'){


        $this->plantilla_activador('mantenedores/listProveedores', $datos);
  
      }elseif($this->session->userdata('rol_id')==='204'){
  
        $this->plantilla_ingenieria('mantenedores/listProveedores', $datos);
  
      }

    

  }


  function listaProveedores(){


    $codEmpresa = $this->input->post('codEmpresa');
    $responseProveedores = $this->callexternosproveedores->obtieneSupplier($codEmpresa);
    $respuesta = false;

    $arrProveedores= json_decode($responseProveedores);
   
    $datos_proveedores = array();

    if($arrProveedores){
      $respuesta = true;
      
      foreach ($arrProveedores as $key => $value) {

        $datos_proveedores[] = array(
          'codEmpresa'=> $this->callutil->cambianull($value->codEmpresa),
          'SupplierID'=> $this->callutil->cambianull($value->SupplierID),
          'SupplierName'=> $this->callutil->cambianull($value->SupplierName),
          'ContactName'=> $this->callutil->cambianull($value->ContactName),
          'ContactTitle'=> $this->callutil->cambianull($value->ContactTitle),
          'Address'=> $this->callutil->cambianull($value->Address),
          'City'=> $this->callutil->cambianull($value->City),
          'PostalCode'=> $this->callutil->cambianull($value->PostalCode),
          'StateOrProvince'=> $this->callutil->cambianull($value->StateOrProvince),
          'Country'=> $this->callutil->cambianull($value->Country),
          'PhoneNumber'=> $this->callutil->cambianull($value->PhoneNumber),
          'FaxNumber'=> $this->callutil->cambianull($value->FaxNumber),
          'PaymentTerms'=> $this->callutil->cambianull($value->PaymentTerms),
          'EmailAddress'=> $this->callutil->cambianull($value->EmailAddress),
          'Notes'=> $this->callutil->cambianull($value->Notes),
          'DateCreated'=> $this->callutil->cambianull($value->DateCreated),

        );
        
      }
    }

    $datos['proveedores'] = $datos_proveedores;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }

  function agregarProveedor(){  

    
    $codEmpresa  = $this->input->post('codEmpresa');  
    $SupplierName      = $this->input->post('SupplierName');
    $ContactName  = $this->input->post('ContactName');
    $ContactTitle           = $this->input->post('ContactTitle');
    $Address       = $this->input->post('Address');
    $City       = $this->input->post('City'); 
    $PostalCode       = $this->input->post('PostalCode'); 
    $StateOrProvince       = $this->input->post('StateOrProvince');  
    $PhoneNumber          = $this->input->post('PhoneNumber');  
    $FaxNumber          = $this->input->post('FaxNumber');  
    $PaymentTerms          = $this->input->post('PaymentTerms');  
    $EmailAddress          = $this->input->post('EmailAddress');  
    $Notes          = $this->input->post('Notes'); 

    
    $resp = false;
    $mensaje = "";

  


    $data = array();

    $nombre = $this->form_validation->set_rules('SupplierName', 'Nombre Proveedor', 'required|trim');
   
    
    if(!$nombre->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campos faltantes, favor revisar.";
    

    }else{

      $insert= array(
        'codEmpresa'  => $codEmpresa,  
        'SupplierName'      => $SupplierName,
        'ContactName'  => $ContactName,
        'ContactTitle'           => $ContactTitle,
        'Address'       => $Address,
        'City'       => $City, 
        'PostalCode'       => $PostalCode, 
        'StateOrProvince'       => $StateOrProvince,  
        'PhoneNumber'          => $PhoneNumber,  
        'FaxNumber'          => $FaxNumber,  
        'PaymentTerms'          => $PaymentTerms,  
        'EmailAddress'          => $EmailAddress,  
        'Notes'          => $Notes, 
      );

      $proveedor = $this->callexternosproveedores->agregarProveedor($insert);
      $proveedorins = json_decode($proveedor) ;
        
      $resp =  $proveedorins->resp;
      $idInsertado = $proveedorins->id_insertado;

      

      if($resp){

        $error_msg = 'Proveedor creado correctamente.';
        $resp =  true;


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'INSERTA_PROVEEDORES',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'PROVEEDORES' ,
        'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

      }else{

        $error_msg = 'Inconvenientes al crear proveedor, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }

  function obtieneProveedor(){
  
    $id_proveedor = $this->input->post('id_proveedor');
    $codEmpresa = $this->session->userdata('cod_emp');

    $responseProveedor= $this->callexternosproveedores->obtieneProveedor($codEmpresa,$id_proveedor);
    $respuesta = false;

    $arrProveedor = json_decode($responseProveedor);
   
    $datos_proveedor = array();

    if($arrProveedor){
      
      foreach ($arrProveedor as $key => $value) {

        $datos_proveedor = array(
          'codEmpresa'=> $this->callutil->cambianull($value->codEmpresa),
          'SupplierID'=> $this->callutil->cambianull($value->SupplierID),
          'SupplierName'=> $this->callutil->cambianull($value->SupplierName),
          'ContactName'=> $this->callutil->cambianull($value->ContactName),
          'ContactTitle'=> $this->callutil->cambianull($value->ContactTitle),
          'Address'=> $this->callutil->cambianull($value->Address),
          'City'=> $this->callutil->cambianull($value->City),
          'PostalCode'=> $this->callutil->cambianull($value->PostalCode),
          'StateOrProvince'=> $this->callutil->cambianull($value->StateOrProvince),
          'Country'=> $this->callutil->cambianull($value->Country),
          'PhoneNumber'=> $this->callutil->cambianull($value->PhoneNumber),
          'FaxNumber'=> $this->callutil->cambianull($value->FaxNumber),
          'PaymentTerms'=> $this->callutil->cambianull($value->PaymentTerms),
          'EmailAddress'=> $this->callutil->cambianull($value->EmailAddress),
          'Notes'=> $this->callutil->cambianull($value->Notes),
          'DateCreated'=> $this->callutil->cambianull($value->DateCreated),
        );
        
        
      }
    }

    echo json_encode($datos_proveedor);


  
  }


  function editarProveedor(){  

    $codEmpresa  = $this->input->post('codEmpresa');  
    $SupplierID = $this->input->post('SupplierID');  
    $SupplierName      = $this->input->post('SupplierName');
    $ContactName  = $this->input->post('ContactName');
    $ContactTitle           = $this->input->post('ContactTitle');
    $Address       = $this->input->post('Address');
    $City       = $this->input->post('City'); 
    $Country       = $this->input->post('Country'); 
    $PostalCode       = $this->input->post('PostalCode'); 
    $StateOrProvince       = $this->input->post('StateOrProvince');  
    $PhoneNumber          = $this->input->post('PhoneNumber');  
    $FaxNumber          = $this->input->post('FaxNumber');  
    $PaymentTerms          = $this->input->post('PaymentTerms');  
    $EmailAddress          = $this->input->post('EmailAddress');  
    $Notes          = $this->input->post('Notes'); 

    $resp = false;
    $mensaje = "";


    $data = array();

    $nombre = $this->form_validation->set_rules('SupplierName', 'Nombre Proveedor', 'required|trim');
   
    
    if(!$nombre->run()){
        

      $error_msg = 'Campos faltantes, favor revisar.';
      $resp =  false;

    

    }else{

      $update= array(

        'codEmpresa'  => $codEmpresa,  
        'SupplierID'  => $SupplierID,  
        'SupplierName'      => $SupplierName,
        'ContactName'  => $ContactName,
        'ContactTitle'           => $ContactTitle,
        'Address'       => $Address,
        'City'       => $City, 
        'Country'       => $Country, 
        'PostalCode'       => $PostalCode, 
        'StateOrProvince'       => $StateOrProvince,  
        'PhoneNumber'          => $PhoneNumber,  
        'FaxNumber'          => $FaxNumber,  
        'PaymentTerms'          => $PaymentTerms,  
        'EmailAddress'          => $EmailAddress,  
        'Notes'          => $Notes
      );

      $cliente = $this->callexternosproveedores->editarProveedor($update);
  

      if($cliente){

        $error_msg = 'Proveedor actualizado correctamente.';
        $resp =  true;


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ACTUALIZA_PROVEEDORES',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'PROVEEDORES' ,
        'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

      }else{

        $error_msg = 'Inconvenientes al actualizar proveedor, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);

  }

  function eliminaProveedor(){  


    $id_proveedor       = $this->input->post('id_proveedor');
    $codEmpresa = $this->session->userdata('cod_emp');
    $resp = false;
    $mensaje = "";


   
      $proveedor = $this->callexternosproveedores->eliminaProveedor($codEmpresa,$id_proveedor);
    
 
      if($proveedor){

        $resp = true;
        $mensaje = "Proveedor Eliminado correctamente";


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ELIMINA_PROVEEDORES',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'PROVEEDORES' ,
        'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

      }else{

        $resp = false;
        $mensaje = "Error al Eliminar proveedor, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }

  


  }