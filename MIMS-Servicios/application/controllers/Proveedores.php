<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proveedores_model','proveedores');
	
	}

	function obtieneSuppliersEmpresa(){

		$codEmpresa = $this->input->post('codEmpresa');
		
		$data = $this->proveedores->obtieneSuppliers($codEmpresa);

		echo json_encode($data);


	}


	function agregarProveedor(){

		$codEmpresa  = $this->input->post('codEmpresa');  
		$SupplierName      = $this->input->post('SupplierName');
		$ContactName  = $this->input->post('ContactName');
		$ContactTitle           = $this->input->post('ContactTitle');
		$Address       = $this->input->post('Address');
		$City       = $this->input->post('City'); 
		$PostalCode       = $this->input->post('PostalCode'); 
		$StateOrProvince       = $this->input->post('StateOrProvince');  
		$PhoneNumber          = $this->input->post('PhoneNumber');  
		$FaxNumber          = $this->input->post('FaxNumber');  
		$PaymentTerms          = $this->input->post('PaymentTerms');  
		$EmailAddress          = $this->input->post('EmailAddress');  
		$Notes          = $this->input->post('Notes'); 
	
		$insert= array(
			'codEmpresa'  => $codEmpresa,  
			'SupplierName'      => $SupplierName,
			'ContactName'  => $ContactName,
			'ContactTitle'           => $ContactTitle,
			'Address'       => $Address,
			'City'       => $City, 
			'PostalCode'       => $PostalCode, 
			'StateOrProvince'       => $StateOrProvince,  
			'PhoneNumber'          => $PhoneNumber,  
			'FaxNumber'          => $FaxNumber,  
			'PaymentTerms'          => $PaymentTerms,  
			'EmailAddress'          => $EmailAddress,  
			'Notes'          => $Notes
		  );

	
	
		$Proveedor = $this->proveedores->agregarProveedor($insert);
	
		if($Proveedor > 0){
	
			$status = true;
	
		}else{
	
			$status = false;
		}
	
		echo json_encode(array("resp" => $status,"id_insertado" => $Proveedor));
		
	}
	
	
	
	
	function obtieneProveedor(){
	
		$id_proveedor = $this->input->post('id_proveedor');
		$codEmpresa = $this->input->post('codEmpresa');
		
		$proveedor= $this->proveedores->obtieneProveedor($codEmpresa ,$id_proveedor);
	
		echo json_encode($proveedor);
		
	}


	function editarProveedor(){

		$codEmpresa  = $this->input->post('codEmpresa');  
		$SupplierID      = $this->input->post('SupplierID');
		$SupplierName      = $this->input->post('SupplierName');
		$ContactName  = $this->input->post('ContactName');
		$ContactTitle           = $this->input->post('ContactTitle');
		$Address       = $this->input->post('Address');
		$City       = $this->input->post('City'); 
		$Country       = $this->input->post('Country'); 
		$PostalCode       = $this->input->post('PostalCode'); 
		$StateOrProvince       = $this->input->post('StateOrProvince');  
		$PhoneNumber          = $this->input->post('PhoneNumber');  
		$FaxNumber          = $this->input->post('FaxNumber');  
		$PaymentTerms          = $this->input->post('PaymentTerms');  
		$EmailAddress          = $this->input->post('EmailAddress');  
		$Notes          = $this->input->post('Notes'); 
	
		$update= array(
			'codEmpresa'  => $codEmpresa,  
			'SupplierID'  => $SupplierID,  
			'SupplierName'      => $SupplierName,
			'ContactName'  => $ContactName,
			'ContactTitle'           => $ContactTitle,
			'Address'       => $Address,
			'City'       => $City, 
			'Country'       => $Country, 
			'PostalCode'       => $PostalCode, 
			'StateOrProvince'       => $StateOrProvince,  
			'PhoneNumber'          => $PhoneNumber,  
			'FaxNumber'          => $FaxNumber,  
			'PaymentTerms'          => $PaymentTerms,  
			'EmailAddress'          => $EmailAddress,  
			'Notes'          => $Notes
		  );
	
		$Proveedor = $this->proveedores->editarProveedor($update,array('SupplierID' =>$SupplierID));

		echo json_encode($Proveedor);
		
	}

	function eliminaProveedor(){  


		$id_proveedor = $this->input->post('id_proveedor');
		$codEmpresa = $this->input->post('codEmpresa');
		
		$Proveedor = $this->proveedores->eliminaProveedor($codEmpresa,$id_proveedor);

		echo json_encode($Proveedor);


    }



}


     
?>