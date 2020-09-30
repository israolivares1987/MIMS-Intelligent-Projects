<?php
class Clientes_model extends CI_Model{

	var $table = 'tbl_clientes';


	function obtieneProyectosxCliente($codEmpresa)
	{

	  $this->db->where('codEmpresa',$codEmpresa);
	  $this->db->order_by('idCliente', 'asc');
	  $Cliente = $this->db->get($this->table);
	  
	  
	  return  $Cliente->result();
	}


  function listaClientes($codEmpresa){

	$this->db->where('codEmpresa',$codEmpresa);
	$this->db->order_by('idCliente', 'asc');
	$Cliente = $this->db->get($this->table);
	
	
	return  $Cliente->result();
  
    }
     

	function agregarCliente($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}


	function obtieneCliente($id_cliente){

		$this->db->from($this->table);
		$this->db->where('idCliente',$id_cliente);
   
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

	   function eliminaCliente($idCliente)
	{

		$this->db->where('idCliente', $idCliente);

		$delete = $this->db->delete($this->table);
		return $delete;
	}


}
?>