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
    
}
