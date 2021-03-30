<?php
class Proveedores_model extends CI_Model{

	var $table = 'tbl_suppliers';



	function obtieneSuppliers($codEmpresa){

        $this->db->where('codEmpresa', $codEmpresa);
        $this->db->from($this->table);

        $query = $this->db->get();

        return $query->result();

	}
	
	function agregarProveedor($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
        }
   
		function obtieneProveedor($codEmpresa ,$id_proveedor){

			$this->db->from($this->table);
			$this->db->where('SupplierID',$id_proveedor);
			$this->db->where('codEmpresa',$codEmpresa);
	   
			$query = $this->db->get();
			
			return $query->result();
	
		 
		   }
		   function editarProveedor($data,$where)
		   {
			   $this->db->update($this->table, $data, $where);
			   $this->db->affected_rows();
			   
			   if ($this->db->affected_rows() > 0 ) {
				   return true; // Or do whatever you gotta do here to raise an error
			   } else {
				   return false;
			   }
		   }


		   function eliminaProveedor($codEmpresa,$id_proveedor)
		   {
	   
			   $this->db->where('SupplierID', $id_proveedor);
			   $this->db->where('codEmpresa', $codEmpresa);
	   
			   $delete = $this->db->delete($this->table);
			   return $delete;
		   }	   


}
?>