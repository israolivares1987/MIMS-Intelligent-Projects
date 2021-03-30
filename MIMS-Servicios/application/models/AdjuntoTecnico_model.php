<?php
class AdjuntoTecnico_model extends CI_Model{

	var $tableTecnico = 'tbl_adjunto_tecnico';
	var $tabletecnicoarchivo = 'tbl_adjunto_tecnico_archivos';


	function listasAdjuntoTecnico($cod_empresa,$id_orden)
	{
	

		$this->db->select("id,
		id_orden,
		id_requerimiento,
		(select domain_desc from tbl_ref_codes where domain_id =  t1.disciplina and domain = 'DISCIPLINA') as disciplina,
		(select domain_desc from tbl_ref_codes where domain_id =  t1.instalacion_definitiva and domain = 'SI_NO') as instalacion_definitiva,
		area_proyecto,
		(select domain_desc from tbl_ref_codes where domain_id =  t1.tipo_pm and domain = 'TIPO_PM') as tipo_pm, 
		(select domain_desc from tbl_ref_codes where domain_id =  t1.inspeccion_requerida and domain = 'SI_NO') as inspeccion_requerida, 
		(select domain_desc from tbl_ref_codes where domain_id =  t1.nivel_inspeccion and domain = 'NIVEL_INSPECCION') as nivel_inspeccion,
		 (select domain_desc from tbl_ref_codes where domain_id =  t1.documentos_antes_iniciar and domain = 'SI_NO') as documentos_antes_iniciar, 
		alcance_tecnico_trabajo,
		instruccion_requirente"); 
      $this->db->from('tbl_adjunto_tecnico t1');	
	  $this->db->where('cod_empresa',$cod_empresa);
	  $this->db->where('id_orden',$id_orden);
	  $this->db->order_by('id', 'asc');
	  $Archivo = $this->db->get();

	  return  $Archivo->result();
	}


	function agregarAdjuntoTecnico($data)
	{
		$this->db->insert($this->tableTecnico, $data);
		return $this->db->insert_id();
	}

	function listaAdjuntoTecnico($cod_empresa,$id_orden, $id)
	{

	  $this->db->where('cod_empresa',$cod_empresa);
	  $this->db->where('id',$id);
	  $this->db->where('id_orden',$id_orden);
	  $this->db->order_by('id', 'asc');
	  $Archivo = $this->db->get($this->tableTecnico);

	  return  $Archivo->result();
	}


	function editaAdjuntoTecnico($data,$where)
    {
		   $this->db->update($this->tableTecnico, $data, $where);
		   $this->db->affected_rows();
		   
		   if ($this->db->affected_rows() > 0 ) {
			   return true; // Or do whatever you gotta do here to raise an error
		   } else {
			   return false;
		   }
	}

	function eliminaAdjuntoTecnico($cod_empresa,$id_orden, $id)
	{

		$this->db->where('cod_empresa',$cod_empresa);
		$this->db->where('id',$id);
		$this->db->where('id_orden',$id_orden);
		$delete = $this->db->delete($this->tableTecnico);
		return $delete;
	}


	function guardarArchivoTecnico($data)
	{
		$this->db->insert($this->tabletecnicoarchivo, $data);
		return $this->db->insert_id();
	}


	function listasArchivosTecnico($cod_empresa,$id_orden,$tipo_archivo)
	{
	

		$this->db->where('cod_empresa',$cod_empresa);
		$this->db->where('id_orden',$id_orden);
		$this->db->where('tipo_archivo',$tipo_archivo);
		$this->db->order_by('id_secuencia', 'asc');
		$Archivo = $this->db->get($this->tabletecnicoarchivo);

		return  $Archivo->result();
	}


	function eliminarAdjuntosTecnicos($cod_empresa,$id_orden, $id_secuencia)
	{

		$this->db->where('cod_empresa',$cod_empresa);
		$this->db->where('id_secuencia',$id_secuencia);
		$this->db->where('id_orden',$id_orden);
		$delete = $this->db->delete($this->tabletecnicoarchivo);
		return $delete;
	}




}
?>