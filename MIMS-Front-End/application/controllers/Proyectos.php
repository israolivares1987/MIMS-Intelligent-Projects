<?php
class Proyectos extends MY_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallUtil');
    $this->load->library('CallExternosBitacora');
    $this->load->library('form_validation');

    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
 
  }

  
  function listaProyectosCliente($idCliente){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
  
    $menu = $this->callutil->armaMenuClientes($response);

   
    $datos['arrClientes'] = $menu ;
    $datos['idCliente'] = $idCliente;


    //Obtiene datos del proveedor

    $responseDatos = $this->callexternosclientes->obtieneCliente($idCliente);
    $array = json_decode($responseDatos);

    foreach ($array as $key => $value)
			{

        $datos['nombreCliente'] = $value->nombreCliente;
        $datos['rutCliente'] = $value->rutCliente;
        $datos['dvCliente'] = $value->dvCliente;

			}   


      if ($this->session->userdata('rol_id')==='202'){


        $this->plantilla_activador('activador/listProyectos', $datos);
        
  
      }elseif($this->session->userdata('rol_id')==='203'){

        $this->plantilla_calidad('calidad/listProyectos', $datos);

      }




  }

  function listProyectosCliente(){

    $datos = array();
    $id_clientes = $this->input->post('cliente');
    $respuesta = false;

    $proyectos    = $this->callexternosproyectos->obtieneProyectosCliente($id_clientes);
    $arrProyectos = json_decode($proyectos);
    $html ="";

    $datos_proyectos = array();

    if($arrProyectos){
      $respuesta = true;
      
      foreach ($arrProyectos as $key => $value) {

        $datos_proyectos[] = array(
          'NumeroProyecto'   => $value->NumeroProyecto,
          'NombreProyecto'   => $value->NombreProyecto,
          'DescripcionProyecto'  => $value->DescripcionProyecto,
          'estadoProyecto'       => $value->estadoProyecto,
          'Lugar'       => $value->Lugar,
          'idCliente'       => $value->idCliente,
          'id_bodega' => $this->callutil->cambianull($value->id_bodega),
          'id_carpa' => $this->callutil->cambianull($value->id_carpa),
          'id_patio' => $this->callutil->cambianull($value->id_patio),
          'id_posicion' => $this->callutil->cambianull($value->id_posicion)
        );
       
      }
    }
    
    $datos['proyectos'] = $datos_proyectos;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  
}


function guardarProyecto(){

  $this->load->library('form_validation');

  $id_cliente       = $this->input->post('var_cliente');
  $nombre_proyecto  = $this->input->post('var_nombre_proyecto');
  $descripcion_proyecto  = $this->input->post('var_descripcion_proyecto');
  $lugar_proyecto  = $this->input->post('var_lugar_proyecto');

  $var_id_bodega  = $this->input->post('var_id_bodega');
  $var_id_carpa  = $this->input->post('var_id_carpa');
  $var_id_patio  = $this->input->post('var_id_patio');
  $var_id_posicion  = $this->input->post('var_id_posicion');

  $codEmpresa       = $this->session->userdata('cod_emp');
  
  
  $valida = array(
            'nombre_proyecto' => $nombre_proyecto,
            'descripcion_proyecto' => $descripcion_proyecto,
            'lugar_proyecto' => $lugar_proyecto,
            'id_bodega' => $var_id_bodega,
            'id_carpa' => $var_id_carpa,
            'id_patio' => $var_id_patio,
            'id_posicion' => $var_id_posicion
);

$validar = $this->callutil->validarDatosProyectos($valida);

  if(!$validar['resp']){
      
    $data['resp']     = $validar['resp'];
    $data['mensaje']  = $validar['mensaje'];;
  
  }else{


    $insert = array(
      'codEmpresa'=> $codEmpresa,
      'idCliente' => $id_cliente,
      'NombreProyecto'=> $nombre_proyecto,
      'DescripcionProyecto' => $descripcion_proyecto,
      'Lugar'=> $lugar_proyecto,
      'id_bodega' => $var_id_bodega,
      'id_carpa' => $var_id_carpa,
      'id_patio' => $var_id_patio,
      'id_posicion' => $var_id_posicion
);



    $proyectos = $this->callexternosproyectos->guardaProyecto($insert);


    if($proyectos){

      $data['resp']        = true;
      $data['mensaje']     = 'Proyecto creado correctamente';


      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'INSERTA_PROYECTO',
      'id_registro' =>  '0',
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'PROYECTOS' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

    }else{
      $data['resp']        = false;
      $data['mensaje']     = 'Error al crear proyecto';
    }
  }

  echo json_encode($data);

}



function editarProyecto(){

  $id_proyecto = $this->input->post('id_proyecto');
  $id_cliente = $this->input->post('id_cliente');

  $proyecto         = $this->callexternosproyectos->obtieneProyecto($id_proyecto,$id_cliente);
  $datosEstados     = $this->callexternosdominios->obtieneDatosRef('ESTADO_PROYECTO');
  $select_estados   = '<select class="form-control" name="act_estado" id="act_estado">'; 
  $nombre_proyecto  = '';
  $data = array();

  foreach (json_decode($proyecto) as $key => $value) {

    $nombre_cliente  = $value->nombre_cliente;
    $nombre_proyecto = $value->NombreProyecto;
    $descripcion_proyecto = $value->DescripcionProyecto;
    $lugar_proyecto = $value->Lugar;

    $id_bodega = $value->id_bodega;
    $id_carpa = $value->id_carpa;
    $id_patio = $value->id_patio;
    $id_posicion = $value->id_posicion;

    foreach (json_decode($datosEstados) as $llave => $valor) {
      
      $selected = ($valor->domain_id == $value->estado_proyecto) ? 'selected' : '';
      $select_estados .='<option '.$selected.' value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';

    }

  } 

  $select_estados .= '</select>';

  $data['nombre_cliente']     = $nombre_cliente;
  $data['nombre_proyecto']    = $nombre_proyecto;
  $data['descripcion_proyecto']    = $descripcion_proyecto;
  $data['lugar_proyecto']    = $lugar_proyecto;
  $data['select_estado']      = $select_estados;
  $data['id_bodega']        = $id_bodega;
  $data['id_carpa']        = $id_carpa;
  $data['id_patio']        = $id_patio;
  $data['id_posicion']        = $id_posicion;


  echo json_encode($data);

}




function actualizaProyecto(){

  

  $id_cliente       = $this->input->post('act_id_cliente');
  $id_proyecto      = $this->input->post('act_id_proyecto');
  $nombre_proyecto  = $this->input->post('act_nombre_proyecto');
  $estado           = $this->input->post('act_estado');
  $codEmpresa       = $this->session->userdata('cod_emp');
  $descripcion_proyecto  = $this->input->post('act_descripcion_proyecto');
  $lugar_proyecto  = $this->input->post('act_lugar_proyecto');


  $var_id_bodega  = $this->input->post('act_id_bodega');
  $var_id_carpa = $this->input->post('act_id_carpa');
  $var_id_patio = $this->input->post('act_id_patio');
  $var_id_posicion  = $this->input->post('act_id_posicion');

  $resp = false;
  $mensaje = "";


  $data = array();

  $this->form_validation->set_rules('act_nombre_proyecto', 'Nombre proyecto', 'required|trim');

  if(!$this->form_validation->run()){
      
    $data['resp']     = false;
    $data['mensaje']  = "Campo Nombre Proyecto es obligatorio.";
  
  }else{



    $update = array(
      'codEmpresa'=> $codEmpresa,
      'idCliente' => $id_cliente,
      'NumeroProyecto' => $id_proyecto,
      'NombreProyecto'=> $nombre_proyecto,
      'DescripcionProyecto' => $descripcion_proyecto,
      'Lugar'=> $lugar_proyecto,
      'estadoProyecto'            => $estado,
      'id_bodega' => $var_id_bodega,
      'id_carpa' => $var_id_carpa,
      'id_patio' => $var_id_patio,
      'id_posicion' => $var_id_posicion
);


    $proyectos = $this->callexternosproyectos->actualizaProyecto($update);


    if($proyectos){

      $resp = true;
      $mensaje = "Proyecto actualizado correctamente";


      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'ACTUALIZA_PROYECTO',
      'id_registro' =>  $id_proyecto,
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'PROYECTOS' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

    }else{

      $mensaje = "Error al actualizar el proyecto";

    }

    $data['resp']       = $resp;
    $data['mensaje']    = $mensaje;
    
    


  }

  echo json_encode($data);


}




function eliminaProyecto(){

  $id_cliente       = $this->input->post('id_cliente');
  $id_proyecto      = $this->input->post('id_proyecto');
  $codEmpresa       = $this->session->userdata('cod_emp');
 

  $data = array(
    'id_cliente'  => $id_cliente,
    'id_proyecto' => $id_proyecto,
    'codEmpresa'  => $codEmpresa
  );
 
  $ordenes = $this->callexternosordenes->obtieneOrdenes($id_proyecto,$id_cliente,$codEmpresa);

  $data_ordenes = json_decode($ordenes);

  if(count($data_ordenes) > 0){

    $data['resp'] = false;
    $data['mensaje'] = 'Existen ordenes asociadas al proyecto. No se pudo eliminar.';

  }else{

    
    $data = array(
      'codEmpresa'=> $codEmpresa,
      'idCliente' => $id_cliente,
      'NumeroProyecto' => $id_proyecto
    );

    $delete = $this->callexternosproyectos->eliminaProyecto($data);

    if($delete){

      $data['resp'] = true;
      $data['mensaje'] = 'Registro eliminado correctamente';


      $insert_bitacora = array('codEmpresa' => $this->session->userdata('cod_emp') ,
      'accion'  => 'ELIMINA_PROYECTO',
      'id_registro' =>  $id_proyecto,
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'PROYECTOS' ,
      'fechaCambio' =>  date_create()->format('Y-m-d H:i:s'));

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);

    }else{
      $data['resp'] = false;
      $data['mensaje'] = 'Error al eliminar el regitro';
    }

  }


  

  echo json_encode($data);

}

    }