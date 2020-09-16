<?php
class ControlCalidadDet extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosControlCalidadDet');
    $this->load->library('CallExternosDominios');
    $this->load->library('form_validation');
    $this->load->library('CallUtil');
    $this->load->helper('file');

    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

    
  }
 
  function obtieneControlCalidadDet(){


    $codEmpresa = $this->input->post('cod_empresa');
    $id_orden = $this->input->post('id_orden');
    $id_cliente = $this->input->post('id_cliente');
    $id_proyecto = $this->input->post('id_proyecto');

    $datosCalidad    = $this->callexternoscontrolcalidaddet->obtieneControlCalidadDet($codEmpresa,$id_orden,$id_cliente,$id_proyecto);
    
    
    $datos_calidad_det = array();
    
    if($datosCalidad){

      $arrCalidad = json_decode($datosCalidad);

      foreach ($arrCalidad as $key => $value) {

        $respaldo = '';

        if(strlen($value->archivo_cc_det) > 0 && $value->archivo_cc_det !='null'  ){
          $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'/archivos/controlcalidaddet/'.$value->archivo_cc_det.'" download="'.$value->archivo_cc_original.'"><i class="fas fa-download"></i> Descarga</a>';
        }else{
          $respaldo = '';
        }

          $datos_calidad_det[]  = array(
            'id_orden' => $id_orden ,
            'id_control_calidad_det' => $value->id_control_calidad_det,
            'id_control_calidad'   => $value->id_control_calidad,
            'descripcion_control_calidad'   => $value->descripcion_control_calidad,
            'estado_cc_det'   => $value->estado_cc_det,
            'estado_porc_cc_det'   => $value->estado_porc_cc_det,
            'archivo_cc_det'   =>  $respaldo
          );

    }

      $respuesta        = true;
      $mensaje   = 'Sin Error';

    }else{

      $respuesta      = false;
      $mensaje    = 'Error al obtener control calidad';
    }

    $datos['datos_calidad_det'] = $datos_calidad_det;
    $datos['resp']      = $respuesta;
    $datos['mensaje']      = $mensaje;

    echo json_encode($datos);
    
  
  }


  function guardaControlCalidadDet(){


   
    $codEmpresa  = $this->input->post('cod_empresa');  
    $id_control_calidad  = $this->input->post('id_control_calidad');  
    $id_proyecto  = $this->input->post('id_proyecto');  
    $id_orden  = $this->input->post('id_orden');  
    $id_cliente  = $this->input->post('id_cliente');  
    $resp = false;
    $mensaje = "";
    $idInsertado = 0;


    $data = array();

  

      $insert= array(
        'codEmpresa' => $codEmpresa,
        'id_control_calidad'   => $id_control_calidad,
        'id_orden' => $id_orden,
        'id_proyecto'       => $id_proyecto,
        'id_cliente' => $id_cliente
      );

      $calidad = $this->callexternoscontrolcalidaddet->guardaControlCalidadDet($insert);
      $clienteins = json_decode($calidad) ;
        
      $resp =  $clienteins->resp;
      $idInsertado = $clienteins->id_insertado;

      

      if($resp){

        $error_msg = 'Control de calidad creado correctamente.';
        $resp =  true;   

      }else{

        $error_msg = 'Inconvenientes al crear control de calidad, favor reintente.';
        $resp =  false;
      }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);
  
  }


  function eliminaControlCalidadDet(){  


    $id_control_calidad_det       = $this->input->post('id_control_calidad_det');
    $id_orden       = $this->input->post('id_orden');
    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto       = $this->input->post('id_proyecto');

    $resp = false;
    $mensaje = "";


   
      $cliente = $this->callexternoscontrolcalidaddet->eliminaControlCalidadDet($id_control_calidad_det,$id_orden,$id_cliente,$id_proyecto);
    
 
      if($cliente){

        $resp = true;
        $mensaje = "Registro Eliminado correctamente";

      }else{

        $resp = false;
        $mensaje = "Error al Eliminar registro, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }


  function obtieneControlCalidadDetxId(){


    $codEmpresa = $this->input->post('cod_empresa');
    $id_orden = $this->input->post('id_orden');
    $id_cliente = $this->input->post('id_cliente');
    $id_proyecto = $this->input->post('id_proyecto');
    $id_control_calidad_det = $this->input->post('id_control_calidad_det');
    $id_control_calidad = $this->input->post('id_control_calidad');



    $datosCalidad    = $this->callexternoscontrolcalidaddet->obtieneControlCalidadDetxId($codEmpresa,$id_orden,$id_cliente,$id_proyecto,$id_control_calidad,$id_control_calidad_det);
    
    $datosEstados     = $this->callexternosdominios->obtieneDatosRef('ESTADO_CC');
  $select_estadoccd  = '<select class="form-control" id="estado_cc_det" name="estado_cc_det">'; 

  $data = array();

    
    if($datosCalidad){

      $arrCalidad = json_decode($datosCalidad);

      foreach ($arrCalidad as $key => $value) {
          
        $range_input_ccd = '<input type="range" class="custom-range" id="estado_porc_cc_det" name= "estado_porc_cc_det" min="0" max="100" step="1" value="'.$value->estado_porc_cc_det.'">';
 
          foreach (json_decode($datosEstados) as $llave => $valor) {
      
            $selected = ($valor->domain_id == $value->estado_cc_det) ? 'selected' : '';
            $select_estadoccd .='<option '.$selected.' value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';
      
          }

    }

      $respuesta        = true;
      $mensaje   = 'Sin Error';

    }else{

      $respuesta      = false;
      $mensaje    = 'Error al obtener control calidad';
    }


    $select_estadoccd .= '</select>';


    $datos['select_estadoccd'] = $select_estadoccd;
    $datos['estado_porc_cc_det'] = $range_input_ccd;
    $datos['resp']      = $respuesta;
    $datos['mensaje']      = $mensaje;

    echo json_encode($datos);
    
  
  }


  

  function actualizaControlCalidadDet(){

    
    $id_orden = $this->input->post('id_order_cc');
    $id_cliente =$this->input->post('id_cliente_cc');
    $id_proyecto = $this->input->post('id_proyecto_cc');
    $estado_porc_cc_det = $this->input->post('estado_porc_cc_det');
    $archivo_cc_det = $this->input->post('archivo_cc_det');
    $estado_cc_det = $this->input->post('estado_cc_det');
    $id_control_calidad_det = $this->input->post('id_cc_det');
    $id_control_calidad = $this->input->post('id_cc');


    $target_path = $this->config->item('BASE_ARCHIVOS')."controlcalidaddet/";
    $resp = false;
    $error_msg = "";
    $respaldo = "";
    $idInsertado=0;

    
 
      if(is_uploaded_file($_FILES['archivo_cc_det']['tmp_name'])) {   


          /* create new name file */
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $respaldo_original = $_FILES["archivo_cc_det"]["name"];
          $extension  = pathinfo( $_FILES["archivo_cc_det"]["name"], PATHINFO_EXTENSION ); // jpg
          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

          $source       = $_FILES['archivo_cc_det']['tmp_name'];
          $destination  = $target_path . $basename; 
          /* move the file */


          if(move_uploaded_file( $source, $destination )) {
             
             
            // Comienzo Update

            $respaldo = $basename;

            if ($estado_porc_cc_det = 100){

              $estado_cc_det = '2';

            }
 
            $dataInsert = array(	
              'id_orden' => $id_orden ,
              'id_cliente' => $id_cliente,
              'id_proyecto' => $id_proyecto,
              'estado_porc_cc_det' => $estado_porc_cc_det,
              'id_control_calidad_det' => $id_control_calidad_det,
              'estado_cc_det' => $estado_cc_det,
              'id_control_calidad' => $id_control_calidad,
              'archivo_cc_det' => $respaldo,
              'archivo_cc_original' => $respaldo_original
              );

              $journal = $this->callexternoscontrolcalidaddet->actualizaControlCalidadDet($dataInsert);

              if($journal){

                $error_msg = 'Registro actualizado correctamente.';
                $resp =  true;
                

              }else{

                $error_msg = 'Inconvenientes al actualizar registro, favor reintente.';
                $resp =  false;

              }
             
  
  
          } else{
            
            $error_msg = 'Error al mover el archivo, favor comunicarse con Soporte.';
            $resp =  false;
  
          
          }
      }else{

        if ($estado_porc_cc_det = 100){

          $estado_cc_det = '2';

        }

         $dataInsert = array(	
          'id_orden' => $id_orden ,
          'id_cliente' => $id_cliente,
          'id_proyecto' => $id_proyecto,
          'estado_porc_cc_det' => $estado_porc_cc_det,
          'id_control_calidad_det' => $id_control_calidad_det,
          'estado_cc_det' => $estado_cc_det,
          'id_control_calidad' => $id_control_calidad
          );

          $journal = $this->callexternoscontrolcalidaddet->actualizaControlCalidadDet($dataInsert);

          if($journal){

            $error_msg = 'Registro actualizado correctamente.';
            $resp =  true;
            

          }else{

            $error_msg = 'Inconvenientes al actualizar registro, favor reintente.';
            $resp =  false;

          }
      

    }   


    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }



  }