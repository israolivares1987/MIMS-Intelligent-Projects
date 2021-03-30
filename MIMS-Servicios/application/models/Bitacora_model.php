<?php
class Bitacora_model extends CI_Model{

	var $table = 'tbl_bitacora_cambios';

	
     

	function agregarBitacora($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}





}
?>