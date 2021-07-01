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
	t1.respaldos_original,
	t2.domain_desc AS tipo_interaccion,
	t1.tipo_interaccion as cod_tipo_interaccion,
	t1.id_interaccion_ref as id_interaccion_ref');
$this->db->from('tbl_journal t1, tbl_ref_codes t2');				   
$this->db->where('tipo',$tipo);
$this->db->where('estado',1);
$this->db->where('t1.tipo_interaccion = t2.domain_id');

	if ($tipo==1)
	{
	
	$this->db->where('t2.domain = "TIPO_INTERACCION_CC"');
	}else{

		$this->db->where('t2.domain = "TIPO_INTERACCION_CO"');
	}

	$this->db->where('t1.id_orden_compra', $id_orden_compra);


return $this->db->get()->result();	
	  


  
    }


	function obtienejournalLev($id_orden_compra,$tipo,$id_cliente,$id_interaccion,$id_interaccion_ref){  

		$this->db->select('t1.id_interaccion,
		t1.nombre_empleado	AS nombre_empleado,
		t1.fecha_ingreso,
		t1.numero_referencial,
		t1.solicitado_por,
		t1.aprobado_por,
		t1.comentarios_generales,
		t1.respaldos,
		t1.respaldos_original,
		t2.domain_desc AS tipo_interaccion,
		t1.tipo_interaccion as cod_tipo_interaccion,
		t1.id_interaccion_ref as id_interaccion_ref');
	$this->db->from('tbl_journal t1, tbl_ref_codes t2');				   
	$this->db->where('tipo',$tipo);
	$this->db->where('estado',1);
	$this->db->where('id_interaccion_ref',$id_interaccion);
	$this->db->where('t1.tipo_interaccion = t2.domain_id');
	
		if ($tipo==1)
		{
		
		$this->db->where('t2.domain = "TIPO_INTERACCION_CC"');
		}else{
	
			$this->db->where('t2.domain = "TIPO_INTERACCION_CO"');
		}
	
		$this->db->where('t1.id_orden_compra', $id_orden_compra);
	
	
	return $this->db->get()->result();	
		  
	
	
	  
		}
     

   function count_all($tipo,$id_orden_compra)
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

		return $query->result();	
	}

	function update($data,$where)
	{
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}

	function desactivaJournal($id_interaccion, $id_orden,$cod_empresa)
	{
		$query=$this->db->query("update $this->table SET estado=0, id_interaccion_ref = 0  where id_interaccion=".$id_interaccion." and id_orden_compra=".$id_orden);


		return $query;
	}

	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}


	function obtienejournalAdvertencias($id_orden_compra,$tipo,$id_cliente){  

		$this->db->select('t1.id_interaccion,
		t1.numero_referencial as tipo_interaccion');
	$this->db->from('tbl_journal t1, tbl_ref_codes t2');				   
	$this->db->where('tipo',$tipo);
	$this->db->where('estado',1);
	$this->db->where('t1.tipo_interaccion = t2.domain_id');
	$this->db->where('t1.id_interaccion_ref = 0');
	$this->db->where('t1.tipo_interaccion IN (16 , 2)');
	
		if ($tipo==1)
		{
		
		$this->db->where('t2.domain = "TIPO_INTERACCION_CC"');
		}else{
	
			$this->db->where('t2.domain = "TIPO_INTERACCION_CO"');
		}
	
		$this->db->where('t1.id_orden_compra', $id_orden_compra);
	
	
	return $this->db->get()->result();	
	}



}
?>