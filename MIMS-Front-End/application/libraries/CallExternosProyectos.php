<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosProyectos
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosProyectos {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    
    function obtieneMenuProyectos($codEmpresa){


        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proyectos/obtieneProyectosxCliente";
  
        $form_data = array(
                    'cod_empresa'		=>$codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }  

    function obtieneProyectosCliente($cliente){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proyectos/obtieneProyectosClientes";
  
        $form_data = array(
            'cliente'		=> $cliente
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }


    function guardaProyecto($id_cliente, $nombre_proyecto,$descripcion_proyecto ,$lugar_proyecto,$codEmpresa){

      $base_url_servicios = $this->obtienebaseservicios();                
      $api_url = $base_url_servicios."Proyectos/guardaProyecto";

      $form_data = array(
          'id_cliente'		  => $id_cliente,
          'nombre_proyecto' => $nombre_proyecto,
          'descripcion_proyecto' => $descripcion_proyecto,
          'lugar_proyecto' => $lugar_proyecto,
          'codEmpresa'      => $codEmpresa
      );

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);

      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($client);

      curl_close($client);

      return $response;


    }

    /**
     * Obtiene proyecto por id
     */
    function obtieneProyecto($id_proyecto, $id_cliente){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Proyectos/obtieneProyectoById";
  
        
        $form_data = array(
            'id_proyecto'	=> $id_proyecto,
            'id_cliente'    => $id_cliente
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    /**
     * Funcion general que retorna los datos segun dominios
     */
    function obtieneDatosRef($dominio){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/obtieneDatosRef";
  
        $form_data = array(
            'dominio'	=> $dominio
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    function obtieneDatoRef($dominio,$dato){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/obtieneDatoRef";
  
        $form_data = array(
            'dominio'	=> $dominio,
            'id' => $dato
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    function actualizaProyecto($update){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/actualizaProyecto";
  
        $form_data = $update;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    function eliminaProyecto($delete){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/eliminaProyecto";
  
        $form_data = $delete;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    function eliminaOrden($delete){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/eliminaOrden";
  
        $form_data = $delete;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;

    }

    function obtieneOrdenesProyecto($idProyecto,$idCliente){
 
        $base_url_servicios =  $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/obtieneExpediting/".$idCliente."/".$idProyecto;

        
        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        return $response;


    }


    function obtieneSupplier($codEmpresa){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."Expediting/obtieneSuppliersEmpresa";
  
        $form_data = array(
            'codEmpresa'	=> $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }


    function obtieneEmployee($codEmpresa){

        $base_url_servicios = $this->obtienebaseservicios();  
  
        $api_url = $base_url_servicios."Expediting/obtieneEmployeeEmpresa";
  
        $form_data = array(
            'codEmpresa'	=> $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }

    function guardaOrden($data){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/guardaOrden";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }

    function actualizaOrden($data){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/actualizaOrden";
  
        $form_data = $data;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
    }

    function obtieneOrden($id_proyecto,$id_cliente,$orden_id,$codEmpresa){

        $base_url_servicios = $this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Expediting/obtieneOrderById";
  
        
        $form_data = array(
            'id_proyecto'	=> $id_proyecto,
            'id_cliente'    => $id_cliente,
            'orden_id'      => $orden_id,
            'codEmpresa'    => $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
        return $response;

    }
    
}
