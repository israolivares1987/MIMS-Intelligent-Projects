<?php
class Journal_model extends CI_Model{

	var $table = 'tbl_journal';

  function obtienejournal($id_orden_compra,$tipo,$id_cliente){  

	$this->db->select('t1.id_interaccion,
						t1.nombre_empleado	AS nombre_empleado,
						t1.fecha_ingreso,
						t1.numero_referencial,
						t1.solicitado_por,
						t1.aprobado_por,
						t1.comentarios_generales,
						t1.respaldos,
						t2.domain_desc AS tipo_interaccion');
	$this->db->from('tbl_journal t1, tbl_ref_codes t2');				   
	$this->db->where('tipo',$tipo);
	$this->db->where('estado',1);
	$this->db->where('t1.tipo_interaccion = t2.domain_id');
	$this->db->where('t2.domain = "TIPO_INTERACCION_CC"');
	$this->db->where('t1.id_orden_compra', $id_orden_compra);


return $this->db->get()->result();	
	  


  
    }
     

   function count_all($tipo,$id_cliente)
	{
		$this->db->from($this->table);
		$this->db->where('id_orden_compra',$id_orden_compra);
		$this->db->where('tipo',$tipo);
		return $this->db->count_all_results();
  }
  
   function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_interaccion',$id);
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
		$this->db->where('id_interaccion', $id);
		$this->db->delete($this->table);
	}

	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}
?>