<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function validateLogin()
	{
		
        $user_name    = $this->input->post('user_name',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $cod_emp = $this->input->post('cod_emp',TRUE);

         
				$api_url = base_url()."api/validateUser";

				$form_data = array(
                    'user_name'		=>$user_name,
                    'password'		=>$password,
                    'cod_emp'		=>$cod_emp
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				

                //$json = $response;

                //$obj = json_decode($json);
                //echo $obj->{'n_usuario'}; // 12345
                //
                echo $response;
			}



			function validateUserRol()
			{
				
				$rol_id    = $this->input->post('rol_id',TRUE);
				
		
				 
						$api_url = base_url()."api/validateUserRol";
		
						$form_data = array(
							'rol_id'		=>$rol_id
						);
		
						$client = curl_init($api_url);
		
						curl_setopt($client, CURLOPT_POST, true);
		
						curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		
						curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		
						$response = curl_exec($client);
		
						curl_close($client);
		
						
						echo $response;
					}


			function obtieneDatosFormsPurchaseOrders(){

				$api_url = base_url()."api/obtieneDatosFormsPurchaseOrders";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				
				echo $response;

			}


			function obtieneExpediting(){

				$api_url = base_url()."api/obtieneExpediting";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				
				echo $response;

			}

			
	}

?>