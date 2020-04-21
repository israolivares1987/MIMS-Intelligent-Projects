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
    
     
  
      function obtieneBucksheet($PurchaseOrderID){
  
  
        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."BuckSheet/obtieneBuckSheet";
  
  
            
        $form_data = array(
                    'PurchaseOrderID'		=>$PurchaseOrderID
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        echo $response;
  
  
      }

      function obtieneBucksheetDet($PurchaseOrderID,$NumeroLinea)
      {
  
  
        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."BuckSheet/obtieneBucksheetDet";
  
  
            
        $form_data = array(
                    'PurchaseOrderID'		=>$PurchaseOrderID,
                    'NumeroLinea'		=>$NumeroLinea
        );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        echo $response;
  
  
      }


    function getRows($PurchaseOrderID,$NumeroLinea){
  
  
        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."BuckSheet/getRows";
        

        $form_data = array(
          'PurchaseOrderID'		=>$PurchaseOrderID,
          'NumeroLinea'		=>$NumeroLinea
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
  
  
        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."BuckSheet/update";
  
  
            
        $form_data = array(
          'PurchaseOrderID' => $memData['PurchaseOrderID'],
          'purchaseOrdername' => $memData['purchaseOrdername'],
          'NumeroLinea' => $memData['NumeroLinea'],
          'ItemST' => $memData['ItemST'],
          'SubItemST' => $memData['SubItemST'],
          'STUnidad' => $memData['STUnidad'],
          'STCantidad' => $memData['STCantidad'],
          'TAGNumber' => $memData['TAGNumber'],
          'Stockcode' => $memData['Stockcode'],
          'Descripcion' => $memData['Descripcion'],
          'PlanoModelo' => $memData['PlanoModelo'],
          'Revision ' => $memData['Revision '],
          'PaqueteConstruccionArea' => $memData['PaqueteConstruccionArea'],
          'PesoUnitario' => $memData['PesoUnitario'],
          'PesoTotal' => $memData['PesoTotal'],
          'FechaRAS' => $memData['FechaRAS'],
          'DiasAntesRAS' => $memData['DiasAntesRAS'],
          'FechaComienzoFabricacion' => $memData['FechaComienzoFabricacion'],
          'PAFCF' => $memData['PAFCF'],
          'FechaTerminoFabricacion' => $memData['FechaTerminoFabricacion'],
          'PAFTF' => $memData['PAFTF'],
          'FechaGranallado' => $memData['FechaGranallado'],
          'PAFG' => $memData['PAFG'],
          'FechaPintura' => $memData['FechaPintura'],
          'PAFP' => $memData['PAFP'],
          'FechaListoInspeccion' => $memData['FechaListoInspeccion'],
          'PAFLI' => $memData['PAFLI'],
          'ActaLiberacionCalidad' => $memData['ActaLiberacionCalidad'],
          'FechaSalidaFabrica' => $memData['FechaSalidaFabrica'],
          'PAFSF' => $memData['PAFSF'],
          'FechaEmbarque' => $memData['FechaEmbarque'],
          'PackingList' => $memData['PackingList'],
          'GuiaDespacho' => $memData['GuiaDespacho'],
          'SCNNumber' => $memData['SCNNumber'],
          'UnidadesSolicitadas' => $memData['UnidadesSolicitadas'],
          'UnidadesRecibidas' => $memData['UnidadesRecibidas'],
          'MaterialReceivedReport' => $memData['MaterialReceivedReport'],
          'MaterialWithdrawalReport' => $memData['MaterialWithdrawalReport'],
          'Origen' => $memData['Origen'],
          'DiasViaje' => $memData['DiasViaje'],
          'Observacion1' => $memData['Observacion1'],
          'Observacion2' => $memData['Observacion2'],
          'Observacion3' => $memData['Observacion3'],
          'Observacion4' => $memData['Observacion4'],
          'Observacion5' => $memData['Observacion5'],
          'Observacion6' => $memData['Observacion6'],
          'Observacion7' => $memData['Observacion7'],
      );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }

      function insert($memData){
  
  
        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."BuckSheet/insert";

          $form_data = array(
              'PurchaseOrderID' => $memData['PurchaseOrderID'],
              'purchaseOrdername' => $memData['purchaseOrdername'],
              'NumeroLinea' => $memData['NumeroLinea'],
              'ItemST' => $memData['ItemST'],
              'SubItemST' => $memData['SubItemST'],
              'STUnidad' => $memData['STUnidad'],
              'STCantidad' => $memData['STCantidad'],
              'TAGNumber' => $memData['TAGNumber'],
              'Stockcode' => $memData['Stockcode'],
              'Descripcion' => $memData['Descripcion'],
              'PlanoModelo' => $memData['PlanoModelo'],
              'Revision ' => $memData['Revision '],
              'PaqueteConstruccionArea' => $memData['PaqueteConstruccionArea'],
              'PesoUnitario' => $memData['PesoUnitario'],
              'PesoTotal' => $memData['PesoTotal'],
              'FechaRAS' => $memData['FechaRAS'],
              'DiasAntesRAS' => $memData['DiasAntesRAS'],
              'FechaComienzoFabricacion' => $memData['FechaComienzoFabricacion'],
              'PAFCF' => $memData['PAFCF'],
              'FechaTerminoFabricacion' => $memData['FechaTerminoFabricacion'],
              'PAFTF' => $memData['PAFTF'],
              'FechaGranallado' => $memData['FechaGranallado'],
              'PAFG' => $memData['PAFG'],
              'FechaPintura' => $memData['FechaPintura'],
              'PAFP' => $memData['PAFP'],
              'FechaListoInspeccion' => $memData['FechaListoInspeccion'],
              'PAFLI' => $memData['PAFLI'],
              'ActaLiberacionCalidad' => $memData['ActaLiberacionCalidad'],
              'FechaSalidaFabrica' => $memData['FechaSalidaFabrica'],
              'PAFSF' => $memData['PAFSF'],
              'FechaEmbarque' => $memData['FechaEmbarque'],
              'PackingList' => $memData['PackingList'],
              'GuiaDespacho' => $memData['GuiaDespacho'],
              'SCNNumber' => $memData['SCNNumber'],
              'UnidadesSolicitadas' => $memData['UnidadesSolicitadas'],
              'UnidadesRecibidas' => $memData['UnidadesRecibidas'],
              'MaterialReceivedReport' => $memData['MaterialReceivedReport'],
              'MaterialWithdrawalReport' => $memData['MaterialWithdrawalReport'],
              'Origen' => $memData['Origen'],
              'DiasViaje' => $memData['DiasViaje'],
              'Observacion1' => $memData['Observacion1'],
              'Observacion2' => $memData['Observacion2'],
              'Observacion3' => $memData['Observacion3'],
              'Observacion4' => $memData['Observacion4'],
              'Observacion5' => $memData['Observacion5'],
              'Observacion6' => $memData['Observacion6'],
              'Observacion7' => $memData['Observacion7'],
          );
  
        $client = curl_init($api_url);
  
        curl_setopt($client, CURLOPT_POST, true);
  
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
        $response = curl_exec($client);
  
        curl_close($client);
  
        return $response;
  
  
      }


      function updateBuckSheetLinea($memData,$PurchaseOrderID,$NumeroLinea){
  
  
        $base_url_servicios =BASE_SERVICIOS;                
        $api_url = $base_url_servicios."BuckSheet/updatexlinea";
  
  
            
        $form_data = array(
          'PurchaseOrderID' => $memData['PurchaseOrderID'],
          'NumeroLinea' => $memData['NumeroLinea'],
          'STCantidad' => $memData['STCantidad'],
          'TAGNumber' => $memData['TAGNumber'],
          'Stockcode' => $memData['Stockcode'],
          'Descripcion' => $memData['Descripcion'],
          'PlanoModelo' => $memData['PlanoModelo'],
          'Revision ' => $memData['Revision '],
          'PaqueteConstruccionArea' => $memData['PaqueteConstruccionArea'],
          'PesoUnitario' => $memData['PesoUnitario'],
          'PesoTotal' => $memData['PesoTotal'],
          'FechaRAS' => $memData['FechaRAS'],
          'DiasAntesRAS' => $memData['DiasAntesRAS'],
          'FechaComienzoFabricacion' => $memData['FechaComienzoFabricacion'],
          'PAFCF' => $memData['PAFCF'],
          'FechaTerminoFabricacion' => $memData['FechaTerminoFabricacion'],
          'PAFTF' => $memData['PAFTF'],
          'FechaGranallado' => $memData['FechaGranallado'],
          'PAFG' => $memData['PAFG'],
          'FechaPintura' => $memData['FechaPintura'],
          'PAFP' => $memData['PAFP'],
          'FechaListoInspeccion' => $memData['FechaListoInspeccion'],
          'PAFLI' => $memData['PAFLI'],
          'ActaLiberacionCalidad' => $memData['ActaLiberacionCalidad'],
          'FechaSalidaFabrica' => $memData['FechaSalidaFabrica'],
          'PAFSF' => $memData['PAFSF'],
          'FechaEmbarque' => $memData['FechaEmbarque'],
          'PackingList' => $memData['PackingList'],
          'GuiaDespacho' => $memData['GuiaDespacho'],
          'SCNNumber' => $memData['SCNNumber'],
          'Origen' => $memData['Origen'],
          'DiasViaje' => $memData['DiasViaje'],
          'Observacion1' => $memData['Observacion1'],
          'Observacion2' => $memData['Observacion2'],
          'Observacion3' => $memData['Observacion3'],
          'Observacion4' => $memData['Observacion4'],
          'Observacion5' => $memData['Observacion5'],
          'Observacion6' => $memData['Observacion6'],
          'Observacion7' => $memData['Observacion7'],
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
