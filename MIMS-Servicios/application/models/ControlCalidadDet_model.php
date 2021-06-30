<?php
class ControlCalidadDet_model extends CI_Model{

	var $table = 'tbl_control_calidad_det';

	function obtieneControlCalidadDet($codEmpresa,$id_orden,$id_cliente,$id_proyecto)
	{
	  
		
		$this->db->select(' a.id_control_calidad_det as id_control_calidad_det ,
							b.id_control_calidad as id_control_calidad,
							b.descripcion_control_calidad as descripcion_control_calidad,
							a.estado_porc_cc_det as estado_porc_cc_det,
							domain_desc as estado_cc_det,
							a.archivo_cc_det as archivo_cc_det,
							a.archivo_cc_original as archivo_cc_original,
							a.observacion as observacion');
		$this->db->from('tbl_control_calidad_det a, tbl_control_calidad b , tbl_ref_codes c');				   
		$this->db->where('a.id_orden',$id_orden);
		$this->db->where('a.codEmpresa',$codEmpresa);
		$this->db->where('a.id_cliente',$id_cliente);
		$this->db->where('a.id_proyecto',$id_proyecto);
		$this->db->where('a.id_control_calidad = b.id_control_calidad');
		$this->db->where('c.domain = "ESTADO_CC"');
		$this->db->where('domain_id =  a.estado_cc_det');

		
	  $query = $this->db->get();

	
	  return $query->result();
	}

	

	function guardaControlCalidadDet($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}


	function eliminaControlCalidadDet($id_control_calidad_det,$id_orden,$id_cliente,$id_proyecto)
	{

		$this->db->where('id_control_calidad_det', $id_control_calidad_det);
		$this->db->where('id_orden', $id_orden);
		$this->db->where('id_cliente', $id_cliente);
		$this->db->where('id_proyecto', $id_proyecto);

		$delete = $this->db->delete($this->table);
		return $delete;
	}


	function obtieneControlCalidadDetxId($codEmpresa,$id_control_calidad,$id_control_calidad_det,$id_orden,$id_cliente,$id_proyecto)
	{

		$this->db->where('id_control_calidad_det', $id_control_calidad_det);
		$this->db->where('id_orden', $id_orden);
		$this->db->where('id_cliente', $id_cliente);
		$this->db->where('id_proyecto', $id_proyecto);
		$this->db->where('id_control_calidad', $id_control_calidad);

		$this->db->from($this->table);


		$query = $this->db->get();

		return $query->result();
	}


	function actualizaControlCalidadDet($data,$where)
	{
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}

	
	

}
?>