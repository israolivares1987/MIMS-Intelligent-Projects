<?php
class Empleados_model extends CI_Model{


  function obtieneEmployees(){

      $employees = $this->db->get('tbl_employees');
      $employeess = $employees->result();
      return $employeess;
  
    }
     

   function count_all()
	{
		$this->db->from('tbl_employees');
		return $this->db->count_all_results();
	}
  
}
?>