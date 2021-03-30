<?php
class ControlCalidad_model extends CI_Model{

	var $table = 'tbl_control_calidad';

	function obtieneControlCalidad($codEmpresa,$id_orden,$id_cliente,$id_proyecto)
	{

		$this->db->select(' b.id_control_calidad as id_control_calidad,
							b.descripcion_control_calidad as descripcion_control_calidad, 
							b.codEmpresa as codEmpresa');
		$this->db->from('tbl_control_calidad b');			   
		$this->db->where('b.id_control_calidad not in (select id_control_calidad 
														from tbl_control_calidad_det  a
														where a.id_control_calidad = b.id_control_calidad
														and a.id_orden = '.$id_orden.'
														and a.codEmpresa = b.codEmpresa
														and a.id_cliente = '.$id_cliente.'
														and a.id_proyecto = '.$id_proyecto.')');
		$this->db->order_by('b.id_control_calidad', 'ASC');

	  $query = $this->db->get();

	
	  return $query->result();
	}


	

}
?>