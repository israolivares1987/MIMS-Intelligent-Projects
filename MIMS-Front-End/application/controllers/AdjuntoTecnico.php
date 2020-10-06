<?php
class AdjuntoTecnico extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosEmpresas');
    $this->load->library('CallExternosAdjuntoTecnico');
    $this->load->library('form_validation');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallUtil');
    $this->load->helper('file');
    $this->load->library('CallExternosBitacora');
    
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    
  }
 

  function listasAdjuntoTecnico(){


    $cod_empresa = $this->input->post('cod_empresa');
    $id_orden = $this->input->post('id_orden');

    $responseAdjuntoTecnico = $this->callexternosadjuntotecnico->listasAdjuntoTecnico($cod_empresa,$id_orden);
    $respuesta = false;

    $arrAdjuntoTecnico = json_decode($responseAdjuntoTecnico);
   
    $datos_adjuntotecnico = array();

    if($arrAdjuntoTecnico){
      $respuesta = true;
      
      foreach ($arrAdjuntoTecnico as $key => $value) {

        $datos_adjuntotecnico[] = array(
          'id' => $value->id,
          'id_orden'   => $value->id_orden,
          'id_requerimiento'   => $value->id_requerimiento,
          'disciplina'   => $value->disciplina,
          'instalacion_definitiva' =>  $value->instalacion_definitiva,
          'area_proyecto'       => $value->area_proyecto,
          'tipo_pm' => $value->tipo_pm,
          'inspeccion_requerida' => $value->inspeccion_requerida,
          'nivel_inspeccion' => $value->nivel_inspeccion,
          'documentos_antes_iniciar' => $value->documentos_antes_iniciar,
          'alcance_tecnico_trabajo' => $value->alcance_tecnico_trabajo,
          'instruccion_requirente' => $value->instruccion_requirente
        );
        
      }
    }

    $datos['adjuntotecnicos'] = $datos_adjuntotecnico;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }

  function agregarAdjuntoTecnico(){  

    

  	$cod_empresa      = $this->input->post('or_cod_empresa_arch_tecnico');
		$id_orden  = $this->input->post('or_id_orden_arch_tecnico');
		$id_requerimiento           = $this->input->post('or_id_requerimiento');
		$disciplina       = $this->input->post('or_disciplina');
		$instalacion_definitiva       = $this->input->post('or_instalacion_definitiva'); 
		$area_proyecto       = $this->input->post('or_area_proyecto'); 
		$tipo_pm       = $this->input->post('or_tipo_pm');   
		$inspeccion_requerida = $this->input->post('or_inspeccion_requerida');   
		$nivel_inspeccion = $this->input->post('or_nivel_inspeccion'); 
		$documentos_antes_iniciar = $this->input->post('or_documentos_antes_iniciar'); 
		$alcance_tecnico_trabajo = $this->input->post('or_alcance_tecnico_trabajo'); 
		$instruccion_requirente = $this->input->post('or_instruccion_requirente'); 
    $resp = false;
    $mensaje = "";


    $data = array();

    $id_requerimiento_var = $this->form_validation->set_rules('or_area_proyecto', 'or_area_proyecto', 'required|trim');
   
    
    if(!$id_requerimiento_var->run()){
        
      $error_msg = "Campos faltantes, favor revisar.";
      $resp  = false;
    

    }else{

      $insert= array(
        'cod_empresa' => $cod_empresa,
        'id_orden'   => $id_orden,
        'id_requerimiento'   => $id_requerimiento,
        'disciplina'   => $disciplina,
        'instalacion_definitiva' => $instalacion_definitiva,
        'area_proyecto'       => $area_proyecto,
        'tipo_pm' => $tipo_pm,
        'inspeccion_requerida' => $inspeccion_requerida,
        'nivel_inspeccion' => $nivel_inspeccion,
        'documentos_antes_iniciar' => $documentos_antes_iniciar,
        'alcance_tecnico_trabajo' => $alcance_tecnico_trabajo,
        'instruccion_requirente' => $instruccion_requirente,
        );

      $AdjuntoTecnico = $this->callexternosadjuntotecnico->agregarAdjuntoTecnico($insert);

     

      $responseAdjuntoTecnicoins = json_decode($AdjuntoTecnico) ;
        
      $resp =  $responseAdjuntoTecnicoins->resp;
      $idInsertado = $responseAdjuntoTecnicoins->id_insertado;

      

      if($resp){

        $error_msg = 'Adjunto Tecnico creado correctamente.';
        $resp =  true;


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'INSERTA_ADJUNTO_TECNICO',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'ADJUNTO_TECNICO' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
        

      }else{

        $error_msg = 'Inconvenientes al crear Adjunto Tecnico, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }

  function listaAdjuntoTecnico(){
  
    $cod_empresa = $this->input->post('cod_empresa');
    $id_orden = $this->input->post('id_orden');
    $id = $this->input->post('id');

    $responseAdjuntoTecnico = $this->callexternosadjuntotecnico->listaAdjuntoTecnico($cod_empresa,$id_orden, $id);
    $respuesta = false;

    $arrAdjuntoTecnico = json_decode($responseAdjuntoTecnico);
   
    $datos_adjuntotecnico = array();


    if($arrAdjuntoTecnico){
      
      foreach ($arrAdjuntoTecnico as $key => $value) {

        $datos_adjuntotecnico = array(
          'cod_empresa' => $cod_empresa,
          'id' => $value->id,
          'id_orden'   => $value->id_orden,
          'id_requerimiento'   => $value->id_requerimiento,
          'select_disciplina'   => $this->callutil->obtiene_select_def_act('or_act_disciplina',$value->disciplina,'DISCIPLINA'),
          'select_instalacion_definitiva' =>  $this->callutil->obtiene_select_def_act('or_act_instalacion_definitiva',$value->instalacion_definitiva,'SI_NO'),
          'area_proyecto'       => $value->area_proyecto,
          'select_tipo_pm' => $this->callutil->obtiene_select_def_act('or_act_tipo_pm',$value->tipo_pm,'TIPO_PM'),
          'select_inspeccion_requerida' => $this->callutil->obtiene_select_def_act('or_act_inspeccion_requerida',$value->inspeccion_requerida,'SI_NO') ,
          'select_nivel_inspeccion' => $this->callutil->obtiene_select_def_act('or_act_nivel_inspeccion',$value->nivel_inspeccion,'TIPO_PM'),
          'select_documentos_antes_iniciar' => $this->callutil->obtiene_select_def_act('or_act_documentos_antes_iniciar',$value->documentos_antes_iniciar,'SI_NO'),
          'alcance_tecnico_trabajo' => $value->alcance_tecnico_trabajo,
          'instruccion_requirente' => $value->instruccion_requirente
        );
        
        
      }
    }

    echo json_encode($datos_adjuntotecnico);


  
  }


  function editaAdjuntoTecnico(){  

    $id      = $this->input->post('or_act_id_arch_tecnico');
		$cod_empresa      = $this->input->post('or_act_cod_empresa_arch_tecnico');
		$id_orden  = $this->input->post('or_act_id_orden_arch_tecnico');
		$id_requerimiento           = $this->input->post('or_act_id_requerimiento');
		$disciplina       = $this->input->post('or_act_disciplina');
		$instalacion_definitiva       = $this->input->post('or_act_instalacion_definitiva'); 
		$area_proyecto       = $this->input->post('or_act_area_proyecto'); 
		$tipo_pm       = $this->input->post('or_act_tipo_pm');   
		$inspeccion_requerida = $this->input->post('or_act_inspeccion_requerida');   
		$nivel_inspeccion = $this->input->post('or_act_nivel_inspeccion'); 
		$documentos_antes_iniciar = $this->input->post('or_act_documentos_antes_iniciar'); 
		$alcance_tecnico_trabajo = $this->input->post('or_act_alcance_tecnico_trabajo'); 
    $instruccion_requirente = $this->input->post('or_act_instruccion_requirente'); 
    

    $resp = false;
    $mensaje = "";


    $data = array();

    $id_requerimiento_var = $this->form_validation->set_rules('or_act_id_requerimiento', 'or_act_id_requerimiento', 'required|trim');
    
    if(!$id_requerimiento_var->run()){
        

      $error_msg = 'Campos faltantes, favor revisar.';
      $resp =  false;

    

    }else{

      $update= array(
        'id' => $id,
        'cod_empresa' => $cod_empresa,
        'id_orden'   => $id_orden,
        'id_requerimiento'   => $id_requerimiento,
        'disciplina'   => $disciplina,
        'instalacion_definitiva' => $instalacion_definitiva,
        'area_proyecto'       => $area_proyecto,
        'tipo_pm' => $tipo_pm,
        'inspeccion_requerida' => $inspeccion_requerida,
        'nivel_inspeccion' => $nivel_inspeccion,
        'documentos_antes_iniciar' => $documentos_antes_iniciar,
        'alcance_tecnico_trabajo' => $alcance_tecnico_trabajo,
        'instruccion_requirente' => $instruccion_requirente
      );

      $responseAdjuntoTecnico = $this->callexternosadjuntotecnico->editaAdjuntoTecnico($update);
  

      if($responseAdjuntoTecnico){

        $error_msg = 'Adjunto Tecnico actualizado correctamente.';
        $resp =  true;
        

      }else{

        $error_msg = 'Inconvenientes al actualizar Adjunto Tecnico, favor reintente.';
        $resp =  false;

      }

 }

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);

  }

  function eliminaAdjuntoTecnico(){  


  	$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id = $this->input->post('id');
    $resp = false;
    $mensaje = "";


   
      $responseAdjuntoTecnico = $this->callexternosadjuntotecnico->eliminaAdjuntoTecnico($cod_empresa,$id_orden, $id);
    
 
      if($responseAdjuntoTecnico){

        $resp = true;
        $mensaje = "Adjunto Tecnico Eliminado correctamente";


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ELIMINA_ADJUNTO_TECNICO',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'ADJUNTO_TECNICO' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

      }else{

        $resp = false;
        $mensaje = "Error al Eliminar Adjunto Tecnico, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }




  function listasArchivosTecnico(){




    $cod_empresa = $this->input->post('cod_empresa');
    $id_orden = $this->input->post('id_orden');
    $tipo_archivo = $this->input->post('tipo_archivo');

    $responseAdjuntoTecnico = $this->callexternosadjuntotecnico->listasArchivosTecnico($cod_empresa,$id_orden, $tipo_archivo);
    $respuesta = false;

    $arrAdjuntoTecnico = json_decode($responseAdjuntoTecnico);
   
    $datos_adjuntotecnico = array();

    if($arrAdjuntoTecnico){
      $respuesta = true;
      
      foreach ($arrAdjuntoTecnico as $key => $value) {

        $respaldo = '';

        if($tipo_archivo === '1'){  
          $target_path = "adjunto-tecnico/archivos-tecnicos/";
      }else{
        $target_path = "adjunto-tecnico/archivos-ep/";
  
      }

        if(strlen($value->documentos_tecnicos_considera) > 0 && $value->documentos_tecnicos_considera !='null'  ){
          $respaldo = '<a class="btn btn-outline-success btn-sm mr-1" href="'.base_url().'archivos/'.$target_path.$value->documentos_tecnicos_considera.'" download="'.$value->archivo_original.'"><i class="fas fa-download"></i> Descarga</a>';
        }else{
          $respaldo = '';
        }


        $datos_adjuntotecnico[] = array(
          'id_secuencia' => $value->id_secuencia,
          'cod_empresa'   => $value->cod_empresa,
          'id_archivo_tecnico'   => $value->id_archivo_tecnico,
          'id_orden'   => $value->id_orden,
          'documentos_tecnicos_considera' =>    $respaldo,
          'archivo_original' =>  $value->archivo_original	
        );
        
      }
    }

    $datos['adjuntotecnicos'] = $datos_adjuntotecnico;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
    
  
  }


  function eliminarAdjuntosTecnicos(){  


  	$cod_empresa = $this->input->post('cod_empresa');
		$id_orden = $this->input->post('id_orden');
		$id = $this->input->post('id_secuencia');
    $resp = false;
    $mensaje = "";




   
      $responseAdjuntoTecnico = $this->callexternosadjuntotecnico->eliminarAdjuntosTecnicos($cod_empresa,$id_orden, $id);
    
 
      if($responseAdjuntoTecnico){

        $resp = true;
        $mensaje = "Adjunto Tecnico Eliminado correctamente";


        $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
        'accion'  => 'ELIMINA_ARCHIVO_ADJUNTO_TECNICO',
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'ADJUNTO_TECNICO' ,
        'fechaCambio' =>  date_create()->format('Y-m-d'));

        $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

      }else{

        $resp = false;
        $mensaje = "Error al Eliminar Adjunto Tecnico, datos sin actualizar";
      }
  
  

      $data['resp']       = $resp;
      $data['mensaje']    = $mensaje;
      
      


     
    echo json_encode($data);



  }


  function guardarArchivoTecnico(){

    $id_archivo_tecnico = $this->input->post('id_archivo_tecnico');
    $id_orden_archivo_tecnico = $this->input->post('id_orden_archivo_tecnico');
    $cod_empresa_archivo_tecnico = $this->input->post('cod_empresa_archivo_tecnico');
    $tipo_archivo_tecnico = $this->input->post('tipo_archivo_tecnico');

    $resp = false;


    if($tipo_archivo_tecnico === '1'){  
        $target_path = $this->config->item('BASE_ARCHIVOS')."adjunto-tecnico/archivos-tecnicos/";
    }else{
      $target_path = $this->config->item('BASE_ARCHIVOS')."adjunto-tecnico/archivos-ep/";

    }
    
    $resp = false;
    $error_msg = "";
    $respaldo = "";
    $idInsertado=0;

    $this->form_validation->set_rules('fileArchivoTecnico', 'Upload File', 'callback_checkFileValidation');



    if($this->form_validation->run() == false) {
      
        $error_msg = 'Archivo invalido, favor seleccionar archivo soportado.';
        $resp =  false;
       
    } else {
 
        if(is_uploaded_file($_FILES['fileArchivoTecnico']['tmp_name'])) {   


          /* create new name file */
          $archivo_original = $_FILES["fileArchivoTecnico"]["name"];
          $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $extension  = pathinfo( $_FILES["fileArchivoTecnico"]["name"], PATHINFO_EXTENSION ); // jpg
          $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg

          $source       = $_FILES['fileArchivoTecnico']['tmp_name'];
          $destination  = $target_path . $basename; 
          /* move the file */


          if(move_uploaded_file( $source, $destination )) {
             
            
            // Comienzo Insert

            $respaldo = $basename;

            $dataInsert = array(	
              'id_archivo_tecnico' => $id_archivo_tecnico ,
              'id_orden' => $id_orden_archivo_tecnico ,
              'documentos_tecnicos_considera' => $respaldo,
              'cod_empresa' => $cod_empresa_archivo_tecnico,
              'tipo_archivo'    => $tipo_archivo_tecnico,
              'archivo_original' =>  $archivo_original	
              );

              $dataArchivo = $this->callexternosadjuntotecnico->guardarArchivoTecnico($dataInsert);

              $dataArchivos = json_decode($dataArchivo) ;
        
              $resp =  $dataArchivos->resp;
              $idInsertado = $dataArchivos->id_insertado;
        
              

              if($resp){

                $error_msg = 'Registro cargado correctamente.';
                $resp =  true;


                $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
                'accion'  => 'INSERTA_ARCHIVO_ADJUNTO_TECNICO',
                'usuario'  =>  $this->session->userdata('n_usuario'),
                'rol' =>   $this->session->userdata('nombre_rol'),
                'objeto'  => 'ADJUNTO_TECNICO' ,
                'fechaCambio' =>  date_create()->format('Y-m-d'));
        
                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                

              }else{

                $error_msg = 'Inconvenientes al cargar registro, favor reintente.';
                $resp =  false;

              }
             
  
  
          }
        
        }else{

          $error_msg = 'Archivo no cargado, favor reintentar.';
          $resp =  false;
        


        } 
    }   


    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['idInsertado'] = $idInsertado;
 

    echo json_encode($data);

  }







  function obtiene_select_def_act($inputId,$selected,$domain){
  
    $def  = $this->callexternosdominios->obtieneDatosRef($domain);
    $html = '';
  
    $datosdef = json_decode($def);
  
    $html .= '<select name="'.$inputId.'" class="form-control form-control-sm" id="'.$inputId.'">';
    
    if($datosdef){
      foreach ($datosdef as $key => $value) {
  
        $seleccionado = ($selected == $value->domain_id) ? 'selected' : '';        
  
        $html .= '<option '.$seleccionado.' value="'.$value->domain_id.'">'.$value->domain_desc.'</option>';
      }
    }else{
      $html .= '<option value="0">No existen datos</option>';
    }
  
    $html .= '</select>';
  
    return $html;
  
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
                'application/msword',
                'application/vnd.openxmlformats officedocument.wordprocessingml.document',
                'image/jpeg',
                'application/pdf',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'video/mp4'
            );

            $fileExtArray = array(
              'csv',
              'CSV', 
              'pdf', 
              'PDF', 
              'xls',
              'xlsx', 
              'XLS', 
              'XLSX', 
              'doc',
              'docx', 
              'DOC',
              'DOCX',
              'mp4',
              'MP4'
          );
            if(isset($_FILES['fileArchivoTecnico']['name']) && $_FILES['fileArchivoTecnico']['name'] != ""){
                // get mime by extension
                $mime = get_mime_by_extension($_FILES['fileArchivoTecnico']['name']);
                $fileExt = explode('.', $_FILES['fileArchivoTecnico']['name']);
                $ext = end($fileExt);

                if(in_array($ext, $fileExtArray) && in_array($mime, $mime_types)){
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