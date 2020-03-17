<?php
class Proveedores_model extends CI_Model{

	var $table = 'tbl_proveedores';

  function obtieneEmployees(){

      $proveedor = $this->db->get($this->table);
      $proveedores = $proveedoress->result();
      return $proveedoress;
  
    }
     

   function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
  }
  
   function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('idProveedor',$id);
		$query = $this->db->get();

		return $query->row();
	}

	function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	function delete_by_id($id)
	{
		$this->db->where('idProveedor', $id);
		$this->db->delete($this->table);
	}

	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}
?>