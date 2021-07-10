<?php
class CambioPassWord extends CI_Controller{
  
  function __construct(){
    parent::__construct(); 
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosDominios');
    $this->load->library('CallUtil');

  }

 
function forgetPassword()
	{
    

    // escapar de las variables para la seguridad
      $email        = $this->input->post('email');
      $cod_emp      = $this->input->post('cod_emppass');
			
			if((!$email) ) {

        $error_msg = 'E-mail vacio, favor confirmar';
        $resp =  false;
      
      }else{ 

      
        $json = $this->callexternosconsultas->obtiene_user($email, $cod_emp);
        $obj = json_decode($json);

        if($obj){

          $password = md5($this->callutil->randomPassword());

 
          $uniqidStr = md5(uniqid(mt_rand()));;

          $actualizapass = $this->callexternosconsultas->actualiza_password_user($email,$password, $cod_emp, $uniqidStr);
  
          if($actualizapass){
  
            
          $envioMail = $this->enviarMail($email,$uniqidStr,$cod_emp);



            $error_msg = 'Se envia password temporal al E-mail indicado';
            $resp =  true;
            
    
          }else{
    
            $error_msg = 'Inconvenientes al actualizar password, favor contartarse con Soporte.';
            $resp =  false;
    
          }



        }else{

          $error_msg = 'E-mail no existe, favor confirmar o solicitar ticket de soporte.';
          $resp =  false;

        }
		
    
      


      }
    
  

    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
 

    echo json_encode($data);


}

function enviarMail($email,$uniqidStr,$cod_emp){

 
  $htmlContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
  $htmlContent .= '<html xmlns="http://www.w3.org/1999/xhtml">';
  $htmlContent .= '<head>';
  $htmlContent .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
  $htmlContent .= '<title>Restablece tu contraseña</title>';
  $htmlContent .= '</head>';
  $htmlContent .= '<body>';
  $htmlContent .= '<div style="display: block; padding:0 32px; margin: auto;">';
  $htmlContent .= '<table cellpadding="0" cellspacing="0" border="0" width="100&#37;" align="center" style="width: 100&#37;; *width: 520px; max-width:520px; margin:32px auto;">';
  $htmlContent .= '<thead>';
  $htmlContent .= '<tr>';
  $htmlContent .= '<th style="text-align: center; border-top:1px solid #cccccc; border-bottom:1px solid #cccccc; font-size: 22px; line-height: 1.4; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #000; letter-spacing:-1px; padding:11px 0 9px 0; word-wrap: break-word; word-break:normal;"> ';
  $htmlContent .= 'MIMS-Intelligent-Projects Account';
  $htmlContent .= ' </th>';
  $htmlContent .= '</tr>';
  $htmlContent .= '</thead>';
  $htmlContent .= '<tbody>';
  $htmlContent .= '<tr>';
  $htmlContent .= '<td style="padding:36px 0 32px 0; vertical-align: top; font-size: 15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; word-wrap: break-word; word-break:normal;">';
  $htmlContent .= '<p style="font-weight: bold; font-size:20px; line-height: 24px; color: #000000; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; margin:0 0 32px 0; padding:0;">';
  $htmlContent .= 'Restablece tu contraseña';
  $htmlContent .= '</p>';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0 0 18px 0; word-wrap: break-word; word-break:normal;">';
  $htmlContent .= ' Estimado cliente:';
  $htmlContent .= '</p>';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal; ">';
  $htmlContent .= 'Has solicitado restablecer tu contraseña y se te ha enviado un correo para restablecerla. Haz clic en el boton a continuacion para completar el restablecimiento de tu contraseña.</p><br />';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal;font-size:14px; line-height: 16px; margin: 0 0 11px 0; ">';
  $htmlContent .= '<a href="'.$this->config->item('base_url').'/index.php/CambioPassWord/recuperaPassword/'.$cod_emp.'/'.$uniqidStr.'"target="_blank"  style="color: #ffffff; text-decoration: none;"><b style="border: 1px solid #1428a0; border-radius:5px; background:#1428a0; color: #ffffff; padding:11px 29px 11px 29px; display:inline-block; font-weight: normal; text-transform: uppercase;">';
  $htmlContent .= 'Restablecer contraseña</b></a>';
  $htmlContent .= '</p><br /><br />';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal; ">';
  $htmlContent .= 'Si el boton anterior no funciona, copia y pega la siguiente direccion en una ventana nueva del navegador.</p><br />';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal;font-size:12px; line-height: 15px; color: #1428a0; padding:13px 16px 11px 16px; margin:6px 0 21px 0; background: #eef0f9; word-break:break-all; "0';
  $htmlContent .= '<a href="'.$this->config->item('base_url').'/index.php/CambioPassWord/recuperaPassword/'.$cod_emp.'/'.$uniqidStr.'" targer="_blank" style="text-decoration: none; color: #1428a0; font-size:12px; line-height:15px; color: #1428a0; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; word-wrap: break-word; word-break:break-all;">';
  $htmlContent .= $this->config->item('base_url').'/index.php/CambioPassWord/recuperaPassword/'.$cod_emp.'/'.$uniqidStr.'</a>';
  $htmlContent .= '</p><br /><br />';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin: 0; word-wrap: break-word; word-break:normal; ">';
  $htmlContent .= 'Solo puedes restablecer la contraseña mediante este vinculo durantete las 12 horas posteriores a la recepcion de este correo.<br /><br />';
  $htmlContent .= 'Si no has solicitado que se restablezca la contraseña, ignora este correo.<br /><br /><br /><br />';
  $htmlContent .= '</p><br />';
  $htmlContent .= '<p style="font-size:15px; line-height: 18px; color: #666666; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; padding: 0; margin:0; word-wrap: break-word; word-break:normal;">';
  $htmlContent .= '<br />';
  $htmlContent .= '<br />';
  $htmlContent .= '<br />';
  $htmlContent .= '<i style="color: #000000;">Su equipo de MIMS-Intelligent-Projects</i>';
  $htmlContent .= '</p>';
  $htmlContent .= '</td>';
  $htmlContent .= '</tr>';
  $htmlContent .= '</tbody>';
  $htmlContent .= '<tfoot>';
  $htmlContent .= '<tr>';
  $htmlContent .= '<td style="padding: 12px 20px 14px 20px; font-size: 11px; line-height: 16px; font-weight: normal; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #666666; background: #efefef; word-wrap: break-word; word-break:normal;">';
  $htmlContent .= ' Nota: No responda a este correo electronico. Si tiene alguna duda, pongase en contacto con nosotros mediante nuestro sitio web:<br />';
  $htmlContent .= '<a href="https://help.mimsprojects.com" target="_blank" style="color: #1428a0; text-decoration: underline;">';
  $htmlContent .= 'Ir al centro de atencion al cliente de MIMS Intelligent Projects</a>';
  $htmlContent .= '</td>';
  $htmlContent .= '</tr>';
  $htmlContent .= '<tr>';
  $htmlContent .= '<td style="padding:20px 0 20px 0; text-align: center; font-size: 11px; line-height: 1; font-family: Helvetica, Arial, Verdana,&#39;sans-serif&#39;,&#39;Malgun Gothic&#39;,&#39;NanumGothic&#39;; color: #acacac; vertical-align: middle; word-wrap: break-word; word-break:normal;">';
  $htmlContent .= '<img src="https://mimsprojects.com/MIMS-Intelligent-Projects/MIMS-Front-End/assets/dist/img/logo-mims.png" border="0" alt="" style=" width: 100&#37;; *width:62px; max-width: 62px; vertical-align:middle; margin:0 12px;" /> ';
  $htmlContent .= 'Copyright@, MIMS Intelligent Projects All rights reserved';
  $htmlContent .= '</td>';
  $htmlContent .= '</tr>';
  $htmlContent .= '</tfoot>';
  $htmlContent .= '</table>';
  $htmlContent .= '</div>';
  $htmlContent .= '</body>';
  $htmlContent .= '</html>';
  

  $subject="Restablecer contraseña MIMS-Intelligent-Projects";


      //obtiene datos de servidor SMTP

        //SMTP_HOST
        //SMTP_PASS
        //SMTP_PORT
        //SMTP_USER

        $datosap     = $this->callexternosdominios->obtieneDatosRef('SMTP_HOST');
        $smtp_host = "";
        foreach (json_decode($datosap) as $llave => $valor) {
          $smtp_host =$valor->domain_desc;
        }

        $datosap     = $this->callexternosdominios->obtieneDatosRef('SMTP_PASS');
        $smtp_pass = "";
        foreach (json_decode($datosap) as $llave => $valor) {
          $smtp_pass =$valor->domain_desc;
        }

        $datosap     = $this->callexternosdominios->obtieneDatosRef('SMTP_PORT');
        $smtp_port = "";
        foreach (json_decode($datosap) as $llave => $valor) {
          $smtp_port =$valor->domain_desc;
        }

        $datosap     = $this->callexternosdominios->obtieneDatosRef('SMTP_USER');
        $smtp_user = "";
        foreach (json_decode($datosap) as $llave => $valor) {
          $smtp_user =$valor->domain_desc;
        }




  $respuesta =$this->callutil->sendEmailPassword($smtp_host,$smtp_port,$smtp_user,$smtp_pass,$email,$subject,$htmlContent);


  return json_encode($respuesta);

}

function recuperaPassword($cod_emp,$tokenpassword){


   $User =$this->callexternosconsultas->obtiene_user_token($cod_emp,$tokenpassword);



   $respuesta = false;

   $arrUser = json_decode($User);

   if($arrUser){

     $respuesta = true;
     
     foreach ($arrUser as $key => $value) {

       $tokenpassword = $value->tokenpassword;
       $tokendate = $value->tokendate;
       $cod_user = $value->cod_user;
       $estadoPassword = $value->estado;
       
     }


     $fechaActual = date('Y-m-d H:i:s');



   
     $diffHoras =$this->callutil->horasDiffFechas($fechaActual,$tokendate );


     $respuestadiastoken  = $this->callexternosdominios->obtieneDatosRef('DIAS_VENCIMIENTO_TOKEN');

     foreach (json_decode($respuestadiastoken) as $llave => $valor) {
      
      $diasToken =$valor->domain_desc;

    }

    if( $estadoPassword === '3' ){

      $mensajeError = 'Usuario se encuentra, deshabilitado, favor contactar a Soporte';

      $this->load->view('password/cambio_password_error', $datos);

    }else if ( $diffHoras > $diasToken){

      $mensajeError = 'Su tiempo para cambiar su contraseña expiro, favor presionar "Iniciar Sesion" para volver a solicitar su contraseña.';
      $data['MensajeError'] = $mensajeError;
      
      $this->load->view('password/cambio_password_error', $data);
      
  
    }else if ( strlen($tokenpassword) == 0 ||  $estadoPassword === '1' ) {
      
      $mensajeError = 'Su token expiro, favor volver a solicitar su contraseña nueva';
      $data['MensajeError'] = $mensajeError;
      $this->load->view('password/cambio_password_error', $data);
  
    }else{

      $datos['cod_user'] =  $cod_user ; 
      $datos['cod_emp'] = $cod_emp ;
    
      $this->load->view('password/cambio_password', $datos);

    }


   }else{

    $mensajeError = 'Su token expiro, favor volver a solicitar su contraseña nueva';
    $data['MensajeError'] = $mensajeError;
    $this->load->view('password/cambio_password_error', $data);



   }

}


function cambio_password(){

  $cod_user        = $this->input->post('cod_user');
  $cod_emp      = $this->input->post('cod_emp');

  $password        = $this->input->post('password');
  $password2      = $this->input->post('password2');

        if (md5($password) <> md5($password2)){

            $mensajeError = 'Contraseñas no coinciden, favor reintentar, presione "ATRAS"';

            $data['MensajeError'] = $mensajeError;

            $this->load->view('password/cambio_password_error',$data);


        }else{

          $actualizapass = $this->callexternosconsultas->actualiza_password_new($cod_user,md5($password),$cod_emp);
          


          if($actualizapass){

            $mensajeError = 'Contraseña Actualizada correctamente.';

            $data['MensajeError'] = $mensajeError;

          
           $this->load->view('password/cambio_password_correcto',$data);




          }else{

            
            $mensajeError = 'Inconvenientes al actualizar contraseña, favor reintente.';

            $data['MensajeError'] = $mensajeError;

            $this->load->view('password/cambio_password_error',$data);

          }




        }

      }
   }



?>