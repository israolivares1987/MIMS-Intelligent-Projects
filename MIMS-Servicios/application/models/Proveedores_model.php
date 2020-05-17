<?php
class Proveedores_model extends CI_Model{

	var $table = 'tbl_suppliers';



	function obtieneSuppliers($codEmpresa){

        $this->db->where('codEmpresa', $codEmpresa);
        $this->db->from($this->table);

        $query = $this->db->get();

        return $query->result();

	}
	

}
?>