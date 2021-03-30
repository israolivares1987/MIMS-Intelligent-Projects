<?php
class Empleados_model extends CI_Model{

	var $table = 'tbl_employees';

  function listaEmpleados($codEmpresa){
	$this->db->select('t1.codEmpresa,
    t1.ID,
    t1.Company,
    t1.LastName,
    t1.FirstName,
    t1.JobId,
    t1.JobTitle,
    t1.EmailAddress,
    t1.BusinessPhone,
    t1.HomePhone,
    t1.MobilePhone,
    t1.FaxNumber,
    t1.Address,
    t1.City,
    t1.StateProvince,
    t1.ZIPPostalCode,
    t1.CountryRegion,
    t1.WebPage,
    t1.Notes,
	t1.Attachments,
	t2.domain_desc AS cargo'); 
    $this->db->from('tbl_employees t1,
    tbl_ref_codes t2');			
	 $this->db->where('codEmpresa',$codEmpresa);
	 $this->db->where('t1.JobId = t2.domain_id');
	 $this->db->where('t2.domain = "JOB_ID"');

	 return $this->db->get()->result();
  
	}
	 
	function listaActivadores($codEmpresa){
		$this->db->select('*'); 
		$this->db->from('tbl_user');			
	    $this->db->where('cod_emp',$codEmpresa);
		$this->db->where('rol_id','202');
		$estados = array('1', '2');
        $this->db->where_in('estado', $estados);
		

		 return $this->db->get()->result();


	  
		}
     

	function obtieneEmpleado($id_empleado){

		$this->db->from($this->table);
		$this->db->where('id',$id_empleado);
   
		$query = $this->db->get();

		

		return $query->result();

	 
	   }


	function editarEmpleado($data,$where)
	{
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}


	function agregarEmpleado($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	
	function eliminaEmpleado($id_empleado)
	{

		$this->db->where('id', $id_empleado);

		$delete = $this->db->delete($this->table);
		return $delete;
	}




}
?>