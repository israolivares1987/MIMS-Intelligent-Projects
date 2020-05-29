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
          'idCliente'       => $value->idCliente
        );
       
      }
    }
    
    $datos['proyectos'] = $datos_proyectos;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  
}


function guardarProyecto(){

  $this->load->library('form_validation');

  $id_cliente       = $this->input->post('id_cliente');
  $nombre_proyecto  = $this->input->post('nombre_proyecto');
  $descripcion_proyecto  = $this->input->post('descripcion_proyecto');
  $lugar_proyecto  = $this->input->post('lugar_proyecto');
  $codEmpresa       = $this->session->userdata('cod_emp');
  
  
  $valida = array(
            'nombre_proyecto' => $nombre_proyecto,
            'descripcion_proyecto' => $descripcion_proyecto,
            'lugar_proyecto' => $lugar_proyecto
    
);

$validar = $this->callutil->validarDatosProyectos($valida);

  if(!$validar['resp']){
      
    $data['resp']     = $validar['resp'];
    $data['mensaje']  = $validar['mensaje'];;
  
  }else{

    $proyectos = $this->callexternosproyectos->guardaProyecto($id_cliente, $nombre_proyecto,$descripcion_proyecto ,$lugar_proyecto,$codEmpresa);


    if($proyectos){

      $data['resp']        = true;
      $data['mensaje']     = 'Proyecto creado correctamente';

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
  $select_estados   = '<select class="form-control" id="act_estado">'; 
  $nombre_proyecto  = '';
  $data = array();

  foreach (json_decode($proyecto) as $key => $value) {

    $nombre_cliente  = $value->nombre_cliente;
    $nombre_proyecto = $value->NombreProyecto;
    $descripcion_proyecto = $value->DescripcionProyecto;
    $lugar_proyecto = $value->Lugar;

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
  $data['id_proyecto']        = $id_proyecto;


  echo json_encode($data);

}




function actualizaProyecto(){

  $this->load->library('form_validation');

  $id_cliente       = $this->input->post('id_cliente');
  $id_proyecto      = $this->input->post('id_proyecto');
  $nombre_proyecto  = $this->input->post('nombre_proyecto');
  $estado           = $this->input->post('estado');
  $codEmpresa       = $this->session->userdata('cod_emp');
  $descripcion_proyecto  = $this->input->post('descripcion_proyecto');
  $lugar_proyecto  = $this->input->post('lugar_proyecto');


  $resp = false;
  $mensaje = "";


  $data = array();

  $this->form_validation->set_rules('nombre_proyecto', 'Nombre proyecto', 'required|trim');

  if(!$this->form_validation->run()){
      
    $data['resp']     = false;
    $data['mensaje']  = "Campo Nombre Proyecto es obligatorio.";
  
  }else{

    $update = array(
      'id_cliente'        => $id_cliente,
      'id_proyecto'       => $id_proyecto,
      'nombre_proyecto'  => $nombre_proyecto,
      'lugar_proyecto' => $lugar_proyecto ,
      'descripcion_proyecto' => $descripcion_proyecto ,
      'estado'            => $estado,
      'codEmpresa'        => $codEmpresa
    );

    $proyectos = $this->callexternosproyectos->actualizaProyecto($update);

    if($proyectos){

      $resp = true;
      $mensaje = "Proyecto actualizado correctamente";

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

  $ordenes = $this->callexternosordenes->obtieneOrdenes($id_proyecto,$id_cliente);

  $data_ordenes = json_decode($ordenes);

  if(count($data_ordenes) > 0){

    $data['resp'] = false;
    $data['mensaje'] = 'Existen ordenes asociadas al proyecto. No se pudo eliminar.';

  }else{

    $delete = $this->callexternosproyectos->actualizaProyecto($data);

    if($delete){

      $data['resp'] = true;
      $data['mensaje'] = 'Registro eliminado correctamente';

    }else{
      $data['resp'] = false;
      $data['mensaje'] = 'Error al eliminar el regitro';
    }

  }


  

  echo json_encode($data);

}

    }