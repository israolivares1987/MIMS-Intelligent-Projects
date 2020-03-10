<?php
class Empleados_model extends CI_Model{

	var $table = 'tbl_employees';

  function obtieneEmployees(){

      $employees = $this->db->get($this->table);
      $employeess = $employees->result();
      return $employeess;
  
    }
     

   function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
  }
  
   function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
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
		$this->db->where('ID', $id);
		$this->db->delete($this->table);
	}

	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}
?>