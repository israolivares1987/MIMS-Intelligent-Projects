<?php
class Clientes_model extends CI_Model{

	var $table = 'tbl_clientes';

	function obtieneclientesxempresa($codEmpresa){

        $this->db->where('codEmpresa',$codEmpresa);
        $this->db->order_by('idCliente', 'asc');
        $Cliente = $this->db->get($this->table);
        
        
        return $Cliente;
    }	

	function obtieneTotClientesxEmp($codEmpresa)
	{

	  $this->db->where('codEmpresa',$codEmpresa);
	  $this->db->from($this->table);
	  return $this->db->count_all_results();
	}


  function obtieneclientes(){

      $cliente = $this->db->get($this->table);
      $clientees = $cliente->result();
      return $clientees;
  
    }
     

   function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
  }
  
   function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('idcliente',$id);
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
		$this->db->where('idcliente', $id);
		$this->db->delete($this->table);
	}

	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}
?>