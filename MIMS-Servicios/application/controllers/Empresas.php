<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empresas_model', 'empresas');
	}

	function obtieneEmpresas(){
		$codEmpresa = $this->input->post('codEmpresa');

		$empresa = $this->empresas->obtieneEmpresa($codEmpresa);
		echo json_encode($empresa);
	}

	function addNeWEmpresa(){
		
		$array    = $this->empresas->getMaxCodEmpresa();
		$cod_empresa = $array[0]->valor;
		$nombre  		= $this->input->post('nombre');
		$razon_social   = $this->input->post('razon_social');
		$rut_empresa    = $this->input->post('rut_empresa');
		$dv_empresa		= $this->input->post('dv_empresa');
		$direccion      = $this->input->post('direccion'); 
		$telefono       = $this->input->post('telefono'); 
		$correo       	= $this->input->post('EmailAddress');   

		$icono_empresa 	= "logo-mims-small.png";/*$this->input->post('icono_empresa');*/  
		
		$insert= array(
			'cod_empresa'   => $cod_empresa,
			'nombre'   		=> $nombre,
			'razon_social'  => $razon_social,
			'rut_empresa' 	=> $rut_empresa,
			'dv_empresa'	=> $dv_empresa,
			'direccion'     => $direccion,
			'telefono ' 	=> $telefono,
			'correo' 		=> $correo,
			'icono_empresa' => $icono_empresa,
		);
	
		$empresa = $this->empresas->addNeWEmpresa($insert);

		if($empresa > 0){
				$status = true;
		}else{
				$status = false;
		}

		echo json_encode(array("resp" => $status,"id_insertado" => $empresa));
	}
	
	function getCountEmpresa(){
		$count = $this->empresas->getCountEmpresa();
		if($count == null){
			echo json_encode(0);
		}else{
			echo json_encode($count);
		}
		
	}

	function listaEmpresa(){
		$EmpresasArray = $this->empresas->listaEmpresas();
		echo json_encode(array_filter($EmpresasArray));
	}

	function editarEmpresa(){
		$cod_empresa 	= $this->input->post('cod_empresa');
		$nombre  		= $this->input->post('nombre');
		$razon_social   = $this->input->post('razon_social');
		$rut_empresa    = $this->input->post('rut_empresa');
		$dv_empresa		= $this->input->post('dv_empresa');
		$direccion      = $this->input->post('direccion'); 
		$telefono       = $this->input->post('telefono'); 
		$correo       	= $this->input->post('EmailAddress');  

		$update= array(
			'nombre'   		=> $nombre,
			'razon_social'  => $razon_social,
			'rut_empresa' 	=> $rut_empresa,
			'dv_empresa ' 	=> $dv_empresa,
			'direccion'     => $direccion,
			'telefono' 		=> $telefono,
			'correo' 		=> $correo
			
		);
		
		$Empresa = $this->empresas->editarEmpresa($update,array('cod_empresa' =>$cod_empresa));
		echo json_encode($Empresa);
	}

	function eliminaEmpresa(){
		$id_empresa = $this->input->post('cod_empresa');
		$Empresa = $this->empresas->eliminaEmpresa($id_empresa);
		echo json_encode($Empresa);
	}
	
}

	
     
?>