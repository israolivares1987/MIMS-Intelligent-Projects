<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternosJournal
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    

class CallExternosJournal {
    
    public function obtienebaseservicios(){

        $CI =& get_instance();


        return $CI->config->item('BASE_SERVICIOS');

    }
    
    
    function obtienejournal($id_orden_compra,$tipo,$id_cliente){

        
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Journal/obtienejournal";
  
        $form_data = array(
                    'id_orden_compra'		=>$id_orden_compra,
                    'tipo'              	=>$tipo,
                    'id_cliente'            =>$id_cliente
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }  



    function desactivaJournal($id_interaccion,$id_orden,$codEmpresa){

        
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Journal/desactivaJournal";
  
        $form_data = array(
                    'id_interaccion'		=>$id_interaccion,
                    'id_orden'              	=>$id_orden,
                    'codEmpresa'            =>$codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
    }  



    function agregarControlCalidad($memData){

       

            $base_url_servicios =$this->obtienebaseservicios();                
            $api_url = $base_url_servicios."Journal/agregarControlCalidad";
      
            $form_data = array(
                            'id_orden_compra' => $memData['id_orden_compra'],
                            'id_cliente' => $memData['id_cliente'],
                            'id_proyecto' => $memData['id_proyecto'],
                            'id_empleado' => $memData['id_empleado'],
                            'nombre_empleado' => $memData['nombre_empleado'],
                            'tipo_interaccion' => $memData['tipo_interaccion'],
                            'fecha_ingreso' => $memData['fecha_ingreso'],
                            'numero_referencial' => $memData['numero_referencial'],
                            'solicitado_por' => $memData['solicitado_por'],
                            'aprobado_por' => $memData['aprobado_por'],
                            'comentarios_generales' => $memData['comentarios_generales'],
                            'respaldos' => $memData['respaldos']
                );
      
                    
                        $client = curl_init($api_url);
                
                        curl_setopt($client, CURLOPT_POST, true);
                
                        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
                
                        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                
                        $response = curl_exec($client);
                
                        curl_close($client);
                
                        return $response;

    }

    function obtiene_journal_x_id($id){

       

        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."Journal/obtiene_journal_x_id";
  
        $form_data = array(
                        'id_control_calidad' => $id
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
