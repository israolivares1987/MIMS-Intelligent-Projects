<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ==============================
 * CallUtil
 *
 * @package : CodeIgniter 3.x
 * @category : Libraries
 * @version : 1.0
 * @author : Iolivares
 * ==============================
 */    
// Al requerir el autoload, cargamos todo lo necesario para trabajar
require_once(APPPATH."/third_party/dompdf/autoload.inc.php");


use Dompdf\Dompdf;
use Dompdf\Options;

class CallUtil {
    
public function obtienebaseservicios(){

			$CI =& get_instance();


			return $CI->config->item('BASE_SERVICIOS');

		}


public function formatoFecha($date){
			

	      if(strlen($date) == 0  || is_null($date) || empty($date) || $date === 'null' || $date === '0000-00-00 00:00:00' || $date ==='30-11--0001' || $date ==='01-01-1970'){

			$Fecha=null;

		  }else{

			$time = strtotime($date); 
			$Fecha= date('Y-m-d',$time);


		  }	

			
			return $Fecha;
		}
		
public function formatoFechaSalida($date){
			


	if(strlen($date) == 0  || is_null($date) || empty($date) || $date === 'null' || $date === '0000-00-00 00:00:00' || $date ==='30-11--0001' || $date ==='01-01-1970'){

		$Fecha=null;

	  }else{

		$time = strtotime($date); 
			$Fecha= date('d-m-Y',$time);


	  }	
		

			return $Fecha;
		}

		
		public function formatoFechaInicioYMD($date){
			


			if(strlen($date) == 0  || is_null($date) || empty($date) || $date === 'null' || $date === '0000-00-00 00:00:00' || $date ==='30-11--0001' || $date ==='01-01-1970'){
		
				$Fecha=null;
		
			  }else{
		
				$time = strtotime($date);  
					$Fecha= date('Y-m-d',$time);
		
		
			  }	
				
		
					return $Fecha;
				}
			

				public function formatoFechaFinYMD($date){
			


					if(strlen($date) == 0  || is_null($date) || empty($date) || $date === 'null' || $date === '0000-00-00 00:00:00' || $date ==='30-11--0001' || $date ==='01-01-1970'){
				
						$Fecha=null;
				
					  }else{
				
						$time = strtotime($date."+ 1 days"); 
							$Fecha= date('Y-m-d',$time);
				
				
					  }	
						
				
							return $Fecha;
						}

				 
		
function armaMenuClientes($response){


			$html ="";
			$arrayDatosMenu = json_decode($response,true);


			foreach ($arrayDatosMenu as $key => $value)
				{
					$nombreCliente = $value['nombreCliente'];
					$idCliente = $value['idCliente'];
					$link = base_url()."index.php/Proyectos/listaProyectosCliente/".$idCliente;
					$html .= '<li class="nav-item">
					<a href="'.$link.'" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p style="font-size: 12px;">'.$nombreCliente.'</p>
					</a>
				</li>';

				}   
			
		
		return $html;

		}


function formatoDinero($dato){


			$dinero =  "$ ".number_format($dato,0,'', '.');

			return $dinero;
		}

		function formatoDineroDecimalUSD($dato){


			$dinero =  "$ ".number_format((float)$dato,2,',', '.');

			return $dinero;
		}		

function formatoNumero($dato){


			$dinero =  number_format($dato,0,'', '.');

			return $dinero;
		}

		
public function obtieneDatoRef($dominio,$dato){


	$CI =& get_instance();
	$CI->load->library('CallExternosDominios');
	

	
	$def  = $CI->callexternosdominios->obtieneDatoRef($dominio,$dato); 
	
	
	return $def;
	
	}
	
public function obtiene_select_def_act($inputId,$selected,$domain){

	
		$CI =& get_instance();
		$CI->load->library('CallExternosDominios');
		

		
		$def  = $CI->callexternosdominios->obtieneDatosRef($domain); 
		$html = '';
		
		$datosdef = json_decode($def);
		
		$html .= '<select name="'.$inputId.'" class="form-control" id="'.$inputId.'">';
		
		if($datosdef){
		foreach ($datosdef as $key => $value) {
		
			$seleccionado = ($selected == $value->domain_id) ? 'selected' : '';        
		
			$html .= '<option '.$seleccionado.' value="'.$value->domain_id.'">'.$value->domain_desc.'</option>';
		}
		}else{
		$html .= '<option value="">No existen datos</option>';
		}
		
		$html .= '</select>';
		
		return $html;
		
		}

public function obtiene_select_def($id, $domain, $name){

	$CI =& get_instance();
	$CI->load->library('CallExternosDominios');
	

	
	$def  = $CI->callexternosdominios->obtieneDatosRef($domain); 
			$html = '';
	  
			$datosdef = json_decode($def);
	  
			$html .= '<select name="'.$name.'" class="form-control" id="'.$id.'">';
			
			if($datosdef){
			  foreach ($datosdef as $key => $value) {
				$html .= '<option value="'.$value->domain_id.'">'.$value->domain_desc.'</option>';
			  }
			}else{
			  $html .= '<option value="0">No existen datos</option>';
			}
	  
			$html .= '</select>';
	  
			return $html;
	  
	  }




public function validarDatosProyectos($data){

		$mensaje = '';
		$resp = false;

	
		if(strlen($data['nombre_proyecto']) == 0 ) {

			$mensaje = 'Nombre Proyecto obligatorio';
			$resp = false;
			
		}else{

			if(strlen($data['descripcion_proyecto']) == 0 ) {

				$mensaje = 'Descripcion Proyecto obligatorio';
				$resp = false;
	
			}else{
	

				if(strlen($data['lugar_proyecto']) == 0 ) {

					$mensaje = 'Lugar Proyecto obligatorio';
					$resp = false;
		
				}else{
		
					$mensaje = 'ok';
					$resp = true;
		
					
				}
	
	
				
			}


		}

		 $respuesta = array(
			 'resp' => $resp,
			 'mensaje' => $mensaje
		 );

			return $respuesta;
		
	}

public function validaFecha($fecha){

		$valores = explode('-', $fecha);
			if(count($valores) == 3 && checkdate($valores[0], $valores[1], $valores[2])){
				return true;
			}
			return false;

	}

public function ValidaArchivo($str) {        

		$mime_types = array(
			'text/csv',
			'text/x-csv', 
			'application/csv', 
			'application/x-csv', 
			'application/excel',
			'text/x-comma-separated-values', 
			'text/comma-separated-values', 
			'application/octet-stream', 
			'application/vnd.ms-excel',
			'application/vnd.msexcel', 
			'text/plain',
			'application/msword',
			'application/vnd.openxmlformats officedocument.wordprocessingml.document',
			'image/jpeg',
			'application/pdf',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'video/mp4'
		);

		$fileExtArray = array(
		  'csv',
		  'CSV', 
		  'pdf', 
		  'PDF', 
		  'xls',
		  'xlsx', 
		  'XLS', 
		  'XLSX', 
		  'doc',
		  'docx', 
		  'DOC',
		  'DOCX',
		  'mp4',
		  'MP4'
	  );

   		if(isset($_FILES[$str]['name']) && $_FILES[$str]['name'] != ""){
			// get mime by extension
			$mime = get_mime_by_extension($_FILES[$str]['name']);
			$fileExt = explode('.', $_FILES[$str]['name']);
			$ext = end($fileExt);

			if(in_array($ext, $fileExtArray) && in_array($mime, $mime_types)){
				return true;
			}else{
				
				return false;
			}
		}else{
			
			return false;
		}
	}


public function cambianull($var){

  $valor = '';


	if(strlen($var) == 0  || is_null($var) || empty($var) || $var === 'null' || $var === 'NULL' || $var === '0000-00-00 00:00:00' || $var ==='30-11--0001' || $var ==='01-01-1970'){

		$valor = '';

	}else{

		$valor = $var;

	}

	return $valor;

 }


 public function validanull($var){

	$valor = true;
  
  
	  if(strlen($var) == 0  || is_null($var) || empty($var) || $var === 'null'){
  
		  $valor = true;
  
	  }else{
  
		  $valor = false;
  
	  }
  
	  return $valor;
  
   } 

public function formatoNumeroMilesEntrada($dato){

	$valor = intval(str_replace(".", "", $dato));

	return $valor;
 }

public function sendEmail($smtp_host,$smtp_port,$smtp_user,$smtp_pass,$email,$subject,$message,$file){

	$CI = & get_instance();
	$CI->load->library('email');


	$config['protocol'] = 'smtp';
	$config['smtp_host']    = $smtp_host;
	$config['smtp_port'] = $smtp_port;
	$config['smtp_user'] = $smtp_user; // correo sin espacio
	$config['smtp_pass'] = $smtp_pass;
	$config['smtp_secure'] = 'tls';
	$config['smtp_timeout'] = '7';
	$config['charset'] = 'utf-8';
	$config['newline'] = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not
	$config['send_multipart'] = FALSE;



		  $CI->email->initialize($config);
		  $CI->email->set_newline("\r\n");
          $CI->email->from($smtp_user);
          $CI->email->to($email);
          $CI->email->subject($subject);
		  $CI->email->message($message);

		  if(strlen($file) > 0){
			$CI->email->attach($file);
		  }
		
	  if($CI->email->send())
         {

          $resp= true;
          $error_msg= "Email enviado correctamente, " .$email ;
         
         }
         else
        {

          $resp= false;
          $error_msg= $CI->email->print_debugger();

        }

        $data['resp']        = $resp;
        $data['mensaje']     = $error_msg;

        return $data;



 }


 public function sendEmailPassword($smtp_host,$smtp_port,$smtp_user,$smtp_pass,$email,$subject,$message){

    $CI = & get_instance();
	$CI->load->library('email');


  				
	$config['protocol'] = 'smtp';
	$config['smtp_host']    = $smtp_host;
	$config['smtp_port'] = $smtp_port;
	$config['smtp_user'] = $smtp_user; // correo sin espacio
	$config['smtp_pass'] = $smtp_pass;
	$config['smtp_secure'] = 'tls';
	$config['smtp_timeout'] = '7';
	$config['charset'] = 'utf-8';
	$config['newline'] = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not
	$config['send_multipart'] = FALSE;




		  $CI->email->initialize($config);
		  $CI->email->set_newline("\r\n");
          $CI->email->from($smtp_user);
          $CI->email->to($email);
          $CI->email->subject($subject);
          $CI->email->message($message);
		
	  if($CI->email->send())
         {

          $resp= true;
          $error_msg= $CI->email->print_debugger();
         
         }
         else
        {

          $resp= false;
          $error_msg= $CI->email->print_debugger();

        }

        $data['resp']        = $resp;
        $data['mensaje']     = $error_msg;

        return $data;
 }

 function clean_string($string) {
	$s = trim($string);
	$s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters
  
	// this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
	$s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);
  
	$s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space
	$s = preg_replace('/[\x00-\x1F\x7F]/', ' ', $s);  


	$string = str_replace(array(
		// control characters
		chr(0), chr(1), chr(2), chr(3), chr(4), chr(5), chr(6), chr(7), chr(8), chr(9), chr(10),
		chr(11), chr(12), chr(13), chr(14), chr(15), chr(16), chr(17), chr(18), chr(19), chr(20),
		chr(21), chr(22), chr(23), chr(24), chr(25), chr(26), chr(27), chr(28), chr(29), chr(30),
		chr(31),
		// non-printing characters
		chr(127)
	), '', $s);

	$string= preg_replace('([^A-Za-z0-9])', ' ', $string);
  
	return $string;
  }

  function diasDiffFechas($fecha1, $fecha2) {

$fecha1 = strtotime($fecha1);
$fecha2 = strtotime($fecha2);
$datediff = $fecha1 - $fecha2;


$fecha_final = round($datediff / (60 * 60 * 24));



return $fecha_final;

  }

  function diasDiffFechaswpanel($fecha1, $fecha2) {

	if (empty($fecha1)){
		$fecha1 = date_create()->format('Y-m-d');
	}


	$fecha1 = strtotime($fecha1);
	$fecha2 = strtotime($fecha2);
	$datediff = $fecha1 - $fecha2;
	
	
	$fecha_final = round($datediff / (60 * 60 * 24));
	
	
	
	return $fecha_final;
	
	  }


  public function objectToArray ($object) {

	$array = json_decode(json_encode($object), true);

	return $array;
}

public function randomPassword() {
	
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$pass = array(); //recuerde que debe declarar $pass como un array
	$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	return implode($pass); //convertir el array en una cadena
}


	function horasDiffFechas($fecha1, $fecha2) {

		
		$t1 = StrToTime ( $fecha1 );
		$t2 = StrToTime ($fecha2 );
		$diff = $t1 - $t2;
		$hours = $diff / ( 60 * 60 );

		return round($hours);
		
	  }


function validarFecha($date, $format = 'd-m-Y'){


	if(strlen($date) == 0  || is_null($date) || empty($date) || $date === 'null' ){

		return true;
	}else{

		$d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
 

	}
    }

	function escape_str($str)
	{
		return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $str);
	}

	
	// por defecto, usaremos papel A4 en vertical, salvo que digamos otra cosa al momento de generar un PDF
	public function generatePDF($numero_rr,$html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait", $descarga = 0)
	{

		
		$options = new Options();
		$options->set('defaultFont', 'Courier');
		$options->set('isRemoteEnabled', TRUE);
		$options->set('debugKeepTemp', TRUE);
		$options->set('isHtml5ParserEnabled', true);

		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		$dompdf->set_option('dpi', 128);
		$canvas = $dompdf->get_canvas(); 
		$canvas->page_text(900, 590, "Código : ".$numero_rr." - Página: {PAGE_NUM} of {PAGE_COUNT}", "helvetica", 6, array(0,0,0)); 
		
	if ($stream && $descarga == 1) {
			// "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
			$dompdf->stream($filename.".pdf", array("Attachment" => 0));
		}
	else 
		{
			$dompdf->stream($filename.".pdf");
	
		}
		return $dompdf->output();


	}


	function num_format($numVal,$afterPoint,$thousandSep="",$decPoint="."){

		$ret = number_format((float)$numVal,$afterPoint,$decPoint,$thousandSep);
		return $ret;
	  }

}
?>