<?php
class Empresas_model extends CI_Model{

	var $table = 'tbl_empresa';

	

	function obtieneEmpresa($codEmpresa){  

		$this->db->select('*');
		$this->db->from($this->table);				   
		$this->db->where('cod_empresa',$codEmpresa);
		return $this->db->get()->result();	
	}

	function addNewEmpresa($data){
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
	}
	

	function getCountEmpresa(){
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->get()->num_rows();
	}

	function listaEmpresas(){
		$this->db->select('
			id,
			cod_empresa,
			nombre,
			razon_social,
			rut_empresa,
			dv_empresa,
			direccion,
			telefono,
			correo,
			icono_empresa`'); 
		$this->db->from('tbl_empresa');			
		
		return $this->db->get()->result();
	  
	}

	function getMaxCodEmpresa(){
		$this->db->select("MAX(cod_empresa)+1  as valor");
		$this->db->from($this->table);
		return $this->db->get()->result();
	}

	function editarEmpresa($data,$where){
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}
	
	function eliminaEmpresa($cod_empresa){
		$this->db->where('cod_empresa', $cod_empresa);
		$delete = $this->db->delete($this->table);
		return $delete;
	}
}

?>