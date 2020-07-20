<?php
class Dominios_model extends CI_Model{

	var $table = 'tbl_ref_codes';



	function obtieneDatosRef($dominio){

		$this->db->where('domain', $dominio);
		$this->db->where('domain_state', 1);
		$this->db->order_by('domain_id', 'ASC');

		$this->db->from($this->table);

		$query = $this->db->get();

		return $query->result();

	}

	function obtieneDatoRef($dominio,$dato){

		$this->db->where('domain', $dominio);
		$this->db->where('domain_state', 1);
		$this->db->where('domain_id', $dato);

		$this->db->from($this->table);

		$query = $this->db->get();

		return $query->result();

	}

	function editarIva($data,$where)
	{
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}
	

}
?>