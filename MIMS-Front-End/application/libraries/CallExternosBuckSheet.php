<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallExternos
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    
class CallExternosBuckSheet {
    
  public function obtienebaseservicios(){

    $CI =& get_instance();


    return $CI->config->item('BASE_SERVICIOS');

}
     
  
      function obtieneBucksheet($codEmpresa, $ID_OC){
  
  
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."BuckSheet/obtieneBuckSheet";
  
  
            
        $form_data = array(
                    'ID_OC'		=>$ID_OC,
                    'codEmpresa' => $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);

     
        return $response;
        
  
  
      }


      function obtieneBuckSheetBodega($ID_OC,$GuiaDespacho){
  
  
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."BuckSheet/obtieneBuckSheetBodega";
  
  
            
        $form_data = array(
                    'ID_OC'		=>$ID_OC,
                    'GuiaDespacho'		=>$GuiaDespacho,
                    
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);

     
        return $response;
        
  
  
      }


      function obtieneBuckSheetGuias($ID_OC){
  
  
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."BuckSheet/obtieneBuckSheetGuias";
  
  
            
        $form_data = array(
                    'ID_OC'		=>$ID_OC
                    
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);

     
        return $response;
        
  
  
      }



      function obtieneBucksheetDet($codEmpresa,$ID_OC,$NumeroLinea)
      {
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/obtieneBucksheetDet";
  
  
            
        $form_data = array(
                    'ID_OC'		=>$ID_OC,
                    'NUMERO_DE_LINEA'		=>$NumeroLinea,
                    'codEmpresa' => $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }


    function getRows($ID_OC,$NUMERO_DE_LINEA){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/getRows";
        

        $form_data = array(
          'ID_OC'		=>$ID_OC,
          'NUMERO_DE_LINEA'		=>$NUMERO_DE_LINEA
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }


      function update($memData,$PurchaseOrderID,$NumeroLinea){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/update";

        $form_data = $memData;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function insert($memData){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/insert";

        $form_data = $memData ;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }


      function updateBuckSheetLinea($memData){
  

        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/updatexlinea";
            
        $form_data = $memData; 
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }


      function eliminaBuckSheet($codEmpresa,$ID_OC,$NUMERO_DE_LINEA){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/eliminaBuckSheet";
        

        $form_data = array(
          'ID_OC'		=>$ID_OC,
          'NUMERO_DE_LINEA'		=>$NUMERO_DE_LINEA,
          'COD_EMPRESA' => $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function obtieneNumeroLinea($id_order_item,$codEmpresa, $id_orden_item_proyecto){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/obtieneNumeroLinea";
        

        $form_data = array(
          'ID_OC'		=>$id_order_item,
          'codEmpresa'		=>$codEmpresa,
          'id_proyecto'		=>$id_orden_item_proyecto
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function insertOrderItem($memData){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/insertOrderItem";
            
        $form_data = $memData; 
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function obtieneBuckSheetError($codEmpresa,$idError,$ID_OC){
  
  
        $base_url_servicios =$this->obtienebaseservicios();                
        $api_url = $base_url_servicios."BuckSheet/obtieneBuckSheetError";
  
  
            
        $form_data = array(
                    'ID_OC'		=>$ID_OC,
                    'idError' => $idError,
                    'codEmpresa' => $codEmpresa
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);

     
        return $response;
        
  
  
      }
    
      function insertError($memData){
  
  
        $base_url_servicios =$this->obtienebaseservicios();;                
        $api_url = $base_url_servicios."BuckSheet/insertError";

        $form_data = $memData ;
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }
}
