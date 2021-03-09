<?php
class Bodegas_model extends CI_Model{

	var $table = 'tbl_bodegas';



	function obtieneBodegas($codEmpresa){

        $this->db->where('codEmpresa', $codEmpresa);
        $this->db->from($this->table);

        $query = $this->db->get();

        return $query->result();

	}
	
	function agregarBodega($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
    }
   
	function obtieneBodega($codEmpresa ,$id_bodega){

			$this->db->from($this->table);
			$this->db->where('id_bodega',$id_bodega);
			$this->db->where('codEmpresa',$codEmpresa);
	   
			$query = $this->db->get();
			
			return $query->result();
	
		 
		   }
		   function editarBodega($data,$where)
		   {
			   $this->db->update($this->table, $data, $where);
			   $this->db->affected_rows();
			   
			   if ($this->db->affected_rows() > 0 ) {
				   return true; // Or do whatever you gotta do here to raise an error
			   } else {
				   return false;
			   }
		   }


		   function eliminaBodega($codEmpresa,$id_bodega)
		   {
	   
			   $this->db->where('id_bodega', $id_bodega);
			   $this->db->where('codEmpresa', $codEmpresa);
	   
			   $delete = $this->db->delete($this->table);
			   return $delete;
		   }	   


}
?>