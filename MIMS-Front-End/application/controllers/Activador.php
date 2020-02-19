<?php
class Activador extends CI_Controller{
  function __construct(){
    parent::__construct();
   
     if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

 

  function creaExpediting(){

    // Obtiene datos cabecera

    //Obtiene datos formulario Purchase_Orderscuerpo 
        
         $base_url_servicios =BASE_SERVICIOS;
         $api_url = $base_url_servicios."api/obtieneDatosFormsPurchaseOrders";

          $client = curl_init($api_url);

          curl_setopt($client, CURLOPT_POST, true);

          curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

          $response = curl_exec($client);

          curl_close($client);

          $json_datos = $response;
          $arrayDatos = json_decode($json_datos,true);
          
          
         //var_dump($arrayDatos);

          $datos['arrEmployees'] = $arrayDatos['employees'];
         $datos['arrSuppliers'] = $arrayDatos['Suppliers'];
     
          $this->load->view('activador/header');
          $this->load->view('activador/navbar');
          $this->load->view('activador/creaExpediting',$datos);
          $this->load->view('activador/footer');

    }


    function listaExpediting(){


     
      $base_url_servicios =BASE_SERVICIOS;                
      $api_url = $base_url_servicios."api/obtieneExpediting";
          

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($client);

      curl_close($client);
    
        

      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);

      $ArrayListEx = $arrayDatos['Expediting'];

        $output = '';
      

				if(count($ArrayListEx) > 0)
				{
          
          
					foreach ($ArrayListEx as $arrayDato)
					{

           $linkHtml = site_url('activador/listaBucksheet/'.$arrayDato['PurchaseOrderID']);

						$output .= '
						<tr>
							<td>'.$arrayDato['PurchaseOrderID'].'</td>
              <td>'.$arrayDato['PurchaseOrderDescription'].'</td>
              <td>'.$arrayDato['Supplier'].'</td>
              <td>'.$arrayDato['Employee'].'</td>
              <td>'.$arrayDato['OrderDate'].'</td>
              <td>'.$arrayDato['DateRequired'].'</td>
              <td><a href="'.$linkHtml.'" class="btn btn-warning" role="button" aria-pressed="true">List Bucksheet</a>
             
              </td>
							
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}

       

				$datos['DatosExpediting'] = $output;





      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/listaExpediting',$datos);
      $this->load->view('activador/footer');
    
    
    
    }

    function listaBucksheet($PurchaseOrderID){


    
      $base_url_servicios =BASE_SERVICIOS;                
      $api_url = $base_url_servicios."api/obtieneBuckSheet";
          
      $form_data = array(
                  'PurchaseOrderID'		=>$PurchaseOrderID
      );

      $client = curl_init($api_url);

      curl_setopt($client, CURLOPT_POST, true);

      curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

      curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($client);

      curl_close($client);

      
      $json_datos = $response;
      $arrayDatos = json_decode($json_datos,true);

      $ArrayListBs = $arrayDatos['BuckSheet'];

      
      
        $output = '';
      

				if(count($ArrayListBs) > 0)
				{
          
          
					foreach ($ArrayListBs as $arrayDato)
					{

           

						$output .= '
						<tr>
							<td>'.$arrayDato['TransactionID'].'</td>
              <td>'.$arrayDato['TransactionDate'].'</td>
              <td>'.$arrayDato['PO_Item'].'</td>
              <td>'.$arrayDato['PO_Subitem'].'</td>
              <td>'.$arrayDato['Product'].'</td>
              <td>'.$arrayDato['PurchaseOrderID'].'</td>
              
              <td>'.$arrayDato['Description'].'</td>
              <td>'.$arrayDato['Destination'].'</td>
              <td>'.$arrayDato['Unit'].'</td>
              <td>'.$arrayDato['UnitsOrdered'].'</td>
              <td>'.$arrayDato['UnitsReceived'].'</td>
              <td>'.$arrayDato['UnitsMRF'].'</td>
              <td>'.$arrayDato['UnitsShrinkage'].'</td>
              <td>'.$arrayDato['DateCreated'].'</td>
              <td>'.$arrayDato['CreatedBy'].'</td>
              <td>'.$arrayDato['RECEIVED_QUANTITY'].'</td>
              <td>'.$arrayDato['RAS'].'</td>
              <td>'.$arrayDato['PROMISE_DATE'].'</td>
              <td>'.$arrayDato['PROMISE_DATE_F_A'].'</td>
              <td>'.$arrayDato['BEGIN_FAB'].'</td>
              <td>'.$arrayDato['BEGIN_FAB_F_A'].'</td>
              
              <td>'.$arrayDato['COMPLETED_FAB'].'</td>
              <td>'.$arrayDato['COMPLETED_FAB_F_A'].'</td>
              <td>'.$arrayDato['READY_FOR_INSPECTION'].'</td>
              <td>'.$arrayDato['READY_FOR_INSPECTION_F_A'].'</td>
              <td>'.$arrayDato['FINAL_INSPECTION'].'</td>
              <td>'.$arrayDato['FINAL_INSPECTION_F_A'].'</td>
              <td>'.$arrayDato['EXITWORKS'].'</td>
              <td>'.$arrayDato['PORT_OF_EXPORT'].'</td>
              <td>'.$arrayDato['SHIP_DAYS'].'</td>
              <td>'.$arrayDato['FORECAST_DELIVERY'].'</td>
              <td>'.$arrayDato['CrateNumber'].'</td>
              <td>'.$arrayDato['PACKING_LIST_NUMBER'].'</td>
              <td>'.$arrayDato['ASN_NUMBER'].'</td>
              <td>'.$arrayDato['SCN_NUMBER'].'</td>
              <td>'.$arrayDato['TRANSPORT_MODE'].'</td>
              <td>'.$arrayDato['BEGIN_FAB_F_A'].'</td>

              <td>'.$arrayDato['MRR_NUMBER'].'</td>
              <td>'.$arrayDato['POSSESSION_MRR'].'</td>
              <td>'.$arrayDato['ACTUAL_DELIVERY_AT_SITE'].'</td>
              <td>'.$arrayDato['UOSD'].'</td>
              <td>'.$arrayDato['DELIVERY_DESTINATION'].'</td>
              <td>'.$arrayDato['REMARKS'].'</td>
              <td>'.$arrayDato['MWR_Number'].'</td>  
             
							
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}

       

				$datos['DatosBuckSheet'] = $output;





      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/listaBuckSheet',$datos);
      $this->load->view('activador/footer');
    
    
    
    }

  }
