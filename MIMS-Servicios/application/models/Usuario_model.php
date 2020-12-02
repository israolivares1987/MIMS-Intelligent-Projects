<?php
class Usuario_model extends CI_Model{

	var $table 		= 'tbl_user';
	var $table_rol 	= 'tbl_rol';
    
    function addNewUsuario($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function getCountUsuario(){
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->get()->num_rows()-1;
	}

	function getListadoUsuarios(){
		$this->db->select("*"); 
		$this->db->from($this->table);	
		$this->db->where('rol_id != 200');
		return $this->db->get()->result();
	}

	function getMaxCodUsuario(){
		$this->db->select("MAX(cod_user)+1  as valor");
		$this->db->from($this->table);
		return $this->db->get()->result();
	}

	function getListaroles(){
		$this->db->select("*"); 
		$this->db->from($this->table_rol);	
		$this->db->where('rol_id <> 200 and rol_id <> 201');
		return $this->db->get()->result();
	}

	function asignarEmpresaRolUsuario($data,$where){
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}

	function obtieneUsuario($id){
		$this->db->select('*');
		$this->db->from($this->table);				   
		$this->db->where('id', $id);
		return $this->db->get()->result();	
	}

	function editarUsuario($data,$where){
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}


	function eliminaUsuario($id){
		$this->db->where('id', $id);
		$delete = $this->db->delete($this->table);
		return $delete;
	}
}
?>