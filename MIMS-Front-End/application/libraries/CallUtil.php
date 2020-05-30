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
class CallUtil {
    
	public function obtienebaseservicios(){

			$CI =& get_instance();


			return $CI->config->item('BASE_SERVICIOS');

		}


	public function formatoFecha($date){
			
			$time = strtotime($date); 
			$Fecha= date('Y-m-d',$time);

			return $Fecha;
		}
		
	public function formatoFechaSalida($date){
			
			$time = strtotime($date); 
			$Fecha= date('d-m-Y',$time);

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


			$dinero =  "$ ".number_format($dato);

			return $dinero;
		}

	function formatoNumero($dato){


			$dinero =  number_format($dato);

			return $dinero;
		}


	public function obtiene_select_def_act($inputId,$selected,$domain){

	
		$CI =& get_instance();
		$CI->load->library('CallExternosDominios');
		

		
		$def  = $CI->callexternosdominios->obtieneDatosRef($domain); 
		$html = '';
		
		$datosdef = json_decode($def);
		
		$html .= '<select name="'.$inputId.'" class="form-control form-control-sm" id="'.$inputId.'">';
		
		if($datosdef){
		foreach ($datosdef as $key => $value) {
		
			$seleccionado = ($selected == $value->domain_id) ? 'selected' : '';        
		
			$html .= '<option '.$seleccionado.' value="'.$value->domain_id.'">'.$value->domain_desc.'</option>';
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
}

