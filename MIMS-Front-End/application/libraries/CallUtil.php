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


    
}
