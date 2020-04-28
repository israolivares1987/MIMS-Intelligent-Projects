<?php
class Journal extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosJournal');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('form_validation');
    $this->load->helper('file');
    
  }

 

   function controlCalidad($idCliente,$Orden,$codProyecto){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];

    $datos['idCliente'] = $idCliente;
    $datos['idOrden'] = $Orden;
    $datos['codProyecto'] = $codProyecto;



    //Obtiene Datos para el Home

    $datosap     = $this->callexternosproyectos->obtieneDatosRef('TIPO_INTERACCION_CC');
    $select_cc = "";
    foreach (json_decode($datosap) as $llave => $valor) {
      $select_cc .='<option value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';
    }
   $datos['select_cc'] = $select_cc;

  $datos['nombreEmpleador'] = $this->session->userdata('nombres').' '.$this->session->userdata('paterno').' '.$this->session->userdata('materno');

    $this->plantilla_activador('activador/listControlCalidad', $datos);

  }



  function cambiosOrden(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];



    //Obtiene Datos para el Home

    $this->plantilla_activador('activador/listCambioOrden', $datos);

  }




  function obtienejournalCalidad(){ 


    $id_orden_compra = $this->input->post('id_orden_compra');
		$tipo = 1;
		$id_cliente = $this->input->post('id_cliente');
    $respuesta = false;

  $journal = $this->callexternosjournal->obtienejournal($id_orden_compra,$tipo,$id_cliente);
  

 $arrJournal = json_decode($journal);
 

  $datos_journal = array();

  if($arrJournal){
    $respuesta = true;
    
    foreach ($arrJournal as $key => $value) {

      $respaldo = '';

      if(strlen($value->respaldos) > 0 && $value->respaldos !='null'  ){
        $respaldo = '<a class="btn btn-download" href="'.base_url().'/archivos/controlcalidad/'.$value->respaldos.'" download="'.$value->respaldos.'">Descarga Archivo</a>';
      }else{
        $respaldo = '';
      }

      
      $datos_journal[] = array(
        'id_interaccion' => $value->id_interaccion,
        'nombre_empleado'   => $value->nombre_empleado,
        'fecha_ingreso'   => $value->fecha_ingreso,
        'numero_referencial' => $value->numero_referencial,
        'solicitado_por' => $value->solicitado_por,
        'aprobado_por' => $value->aprobado_por,
        'comentarios_generales' => $value->comentarios_generales,
        'respaldos' =>  $respaldo ,
        'tipo_interaccion' => $value->tipo_interaccion,
      );

    }
  }
  
  $datos['journals'] = $datos_journal;
  $datos['resp']      = $respuesta;

  echo json_encode($datos);

  }


  function guardarJournal(){

    
    $id_orden_compra = $this->input->post('id_orden_compra');
    $id_cliente =$this->input->post('id_cliente');
    $id_proyecto = $this->input->post('id_proyecto');
    $id_empleado = $this->input->post('id_empleado');
    $nombre_empleado = $this->input->post('nombre_empleado');
    $tipo_interaccion = $this->input->post('tipo_interaccion');
    $fecha_ingreso = $this->input->post('fecha_ingreso');
    $numero_referencial = $this->input->post('numero_referencial');
    $solicitado_por = $this->input->post('solicitado_por');
    $aprobado_por = $this->input->post('aprobado_por');
    $comentarios_generales = $this->input->post('comentarios_generales');


    $this->form_validation->set_rules('archivo0', 'Upload File', 'callback_checkFileValidation');

    if($this->form_validation->run() == false) {
      
        $error_msg = 'Archivo invalido, favor seleccionar archivo soportado.';
       
    } else {
 
        if(is_uploaded_file($_FILES['archivo0']['tmp_name'])) {   
        
          
          $data['resp']        = true;
          $data['mensaje']     = 'Registro actualizado correctamente';

        }else{

          $data['resp']        = false;
          $data['mensaje']     = 'Error Archivo actualizado correctamente';
          
        }  

    }   

    echo json_encode($data);

  }

  // checkFileValidation
        public function checkFileValidation($str) {        
            $mime_types = array(
                'text/csv',
                'text/x-csv', 
                'application/csv', 
                'application/x-csv', 
                'application/excel',
                'text/x-comma-separated-values', 
                'text/comma-separated-values', 
                'application/octet-stream', 
                'application/vnd.ms-excel',
                'application/vnd.msexcel', 
                'text/plain',
            );
            if(isset($_FILES['archivo0']['name']) && $_FILES['archivo0']['name'] != ""){
                // get mime by extension
                $mime = get_mime_by_extension($_FILES['archivo0']['name']);
                $fileExt = explode('.', $_FILES['archivo0']['name']);
                $ext = end($fileExt);
                if(($ext == 'csv') && in_array($mime, $mime_types)){
                    return true;
                }else{
                    $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
                return false;
            }
        }
    
  }
