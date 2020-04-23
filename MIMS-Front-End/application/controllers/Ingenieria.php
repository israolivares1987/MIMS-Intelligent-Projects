<?php
class Ingenieria extends MY_Controller{
  
  
    function __construct(){

    parent::__construct();
    
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosBuckSheet');

     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function proyectos(){

    $codEmpresa = $this->session->userdata('cod_emp');

    $clientes = $this->callexternosclientes->obtieneClientePorEmpresa($codEmpresa);

    $arrClientes = json_decode($clientes);

    $html = "";
    
    $html .= '<select class="form-control" id="select_clientes">';
    $html .= '<option value="0">Seleccione</option>';
    
    foreach ($arrClientes as $key => $value) {

      $html .= '<option data-name="'.trim($value->nombreCliente).'" value="'.$value->idCliente.'">'.$value->nombreCliente.'</option>';
    
    }

    $html .= '</select>';
    $datos['select_clientes'] = $html;

    $this->plantilla_ingenieria('ingenieria/listProyectos', $datos);
  
   }

   public function index_ingenieria(){

      
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $json_datos = $response;
    $arrayDatos = json_decode($json_datos,true);
    $datos['arrClientes'] = $arrayDatos['Clientes'];


    //Obtiene Datos para el Home


    $Totales = $this->callexternosconsultas->obtieneDatosTotales($codEmpresa);
    
    $json_totales             = $Totales;
    $arrayDatosTotales        = json_decode($json_totales,true);
    $datos['totalProyectos']  = $arrayDatosTotales['totalProyectos'];
    $datos['totalClientes']   = $arrayDatosTotales['totalClientes'];
    $datos['totalOrdenes']    = $arrayDatosTotales['totalOrdenes'];
    $datos['totalSuppliers']  = $arrayDatosTotales['totalSuppliers'];


    $this->plantilla_ingenieria('ingenieria/home_ingenieria', $datos);


  }


  function listProyectosCliente(){

      $datos = array();
      $id_clientes = $this->input->post('cliente');
      $respuesta = false;

      $proyectos    = $this->callexternosproyectos->obtieneProyectosCliente($id_clientes);
      $arrProyectos = json_decode($proyectos);
      $html ="";


      if($arrProyectos){

        
        foreach ($arrProyectos as $key => $value) {
          $html .= '<tr>';
          $html .= '<td>'.$value->codigo_proyecto.'</td>';
          $html .= '<td>'.$value->descripcion_proyecto.'</td>';
          $html .= '<td>'.$value->estado_proyecto.'</td>';
          $html .= '<td>';
          $html .= '<button data-nombre="'.$value->descripcion_proyecto.'" data-toggle="tooltip" data-placement="top" title="Listar ordenes" onclick="listar_ordenes('.$value->codigo_proyecto.','.$id_clientes.',this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
          $html .= '<button data-toggle="tooltip" data-placement="top" title="Editar Proyecto" onclick="edita_proyecto('.$value->codigo_proyecto.','.$id_clientes.')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          $html .= '<button data-toggle="tooltip" data-placement="top" title="Eliminar Proyecto" onclick="elimina_proyecto('.$value->codigo_proyecto.','.$id_clientes.')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';

          $html .= '</td>';
          $html .= '</tr>';
        }

        $respuesta = true;
        

      }else{

        $html .= '<tr>';
        $html .= '<td class="text-center" colspan="4">No existen proyectos para el cliente seleccionado</td>';
        $html .= '</tr>';

      }
      
      $datos['proyectos'] = $html;
      $datos['resp']      = $respuesta;

      echo json_encode($datos);
      
    
  }


  function guardarProyecto(){

    $this->load->library('form_validation');

    $id_cliente       = $this->input->post('id_cliente');
    $nombre_proyecto  = $this->input->post('nombre_proyecto');
    $codEmpresa       = $this->session->userdata('cod_emp');
    $data = array();


    $this->form_validation->set_rules('nombre_proyecto', 'Nombre proyecto', 'required|trim');

    if(!$this->form_validation->run()){
        
      $data['resp']     = false;
      $data['mensaje']  = "Campo Nombre Proyecto es obligatorio.";
    
    }else{

      $proyectos = $this->callexternosproyectos->guardaProyecto($id_cliente, $nombre_proyecto,$codEmpresa);


      if($proyectos){

        $data['resp']        = true;
        $data['mensaje']     = 'Proyeto creado correctamente';

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
    $datosEstados     = $this->callexternosproyectos->obtieneDatosRef('ESTADO_PROYECTO');
    $select_estados   = '<select class="form-control" id="act_estado">'; 
    $nombre_proyecto  = '';

    $data = array();

    foreach (json_decode($proyecto) as $key => $value) {

      $nombre_cliente  = $value->nombre_cliente;
      $nombre_proyecto = $value->nombre_proyecto;

      foreach (json_decode($datosEstados) as $llave => $valor) {
        
        $selected = ($valor->domain_id == $value->estado_proyecto) ? 'selected' : '';
        $select_estados .='<option '.$selected.' value="'.$valor->domain_id.'">'.$valor->domain_desc.'</option>';

      }

    } 

    $select_estados .= '</select>';

    $data['nombre_cliente']     = $nombre_cliente;
    $data['nombre_proyecto']    = $nombre_proyecto;
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

    $ordenes = $this->callexternosproyectos->obtieneOrdenesProyecto($id_proyecto,$id_cliente);

    $data_ordenes = json_decode($ordenes);

    if(count($data_ordenes->data) > 0){

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

  function eliminaOrden(){

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');
    $orden            = $this->input->post('orden');
    $codEmpresa       = $this->session->userdata('cod_emp');


    //consulta si existen bucksheet
    $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($orden,true);

    $data_buck = json_decode($bucksheet);

    if(count($data_buck->data) > 0){
    
      $data['resp'] = false;
      $data['mensaje'] = 'Existen datos asociados a esta orden. No se pudo eliminar.';
    
    }else{

      $data = array(
        'id_cliente'  => $id_cliente,
        'id_proyecto' => $id_proyecto,
        'orden'       => $orden,
        'codEmpresa'  => $codEmpresa
      );

      $delete = $this->callexternosproyectos->eliminaOrden($data);

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

  function obtieneOrdenes(){

    $id_cliente       = $this->input->post('id_cliente');
    $id_proyecto      = $this->input->post('id_proyecto');

    $respuesta = false;

    $ordenes = $this->callexternosproyectos->obtieneOrdenesProyecto($id_proyecto,$id_cliente);

    $data_ordenes = json_decode($ordenes);

    $html = '';

    //Pregunto si trae datos
    if(count($data_ordenes->data)){

      foreach ($data_ordenes->data as $key => $value) {

        $html .= '<tr>';
          $html .= '<td>'.$value[0].'</td>';
          $html .= '<td>'.$value[1].'</td>';
          $html .= '<td>'.$value[2].'</td>';
          $html .= '<td>'.$value[3].'</td>';
          $html .= '<td>'.$value[4].'</td>';
          $html .= '<td>'.$value[5].'</td>';
          $html .= '<td>'.$value[6].'</td>';
          $html .= '<td>';
          $html .= '<button data-toggle="tooltip" data-placement="top" title="Ver Bucksheet" onclick="ver_bucksheet()" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>';
          $html .= '<button data-toggle="tooltip" data-placement="top" title="Editar Orden" onclick="editar_orden()" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          $html .= '<button data-toggle="tooltip" data-placement="top" title="Eliminar Orden" onclick="eliminar_orden('.$id_cliente.','.$id_proyecto.','.$value[1].')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          $html .= '</td>';
        $html .= '</tr>';

      }

      $respuesta = true;

    }else{

      $html .= '<tr>';
      $html .= '<td class="text-center" colspan="8">No existen ordenes para el proyecto seleccionado</td>';
      $html .= '</tr>';

    }

    $datos['ordenes'] = $html;
    $datos['resp']    = $respuesta;

    echo json_encode($datos);
    

  }
    
}
