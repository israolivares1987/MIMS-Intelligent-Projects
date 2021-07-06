<?php
class ReporteRecepcion_model extends CI_Model{

	var $table = 'tbl_rr_cabecera';
	var $tabledet = 'tbl_rr_detalle';


    
	function agregarRR($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function agregarRRDet($data)
	{
		$this->db->insert($this->tabledet, $data);
		return $this->db->insert_id();
	}

	function obtieneCabeceraRR($numRR)
	{

	  $query = $this->db->query("SELECT id_rr,
								cod_empresa,
								id_rr_recepcion,
								fecha_creacion,
								usuario_creacion,
								id_cliente,
								id_proyecto,
								descripcion_proyecto,
								descripcion_cliente,
								id_orden_compra,
								id_orden_cliente,
								descripcion_orden,
								guia_despacho,
								proveedor,
								fecha_entrega
							FROM tbl_rr_cabecera
							where id_rr = ". $numRR);
	  $CabeceraRR = $query->result();
	  return $CabeceraRR;
	}



	function obtieneRR($codEmpresa,$codigoProyecto,$codigoCliente)
	{

	  $query = $this->db->query("SELECT tbl_rr_cabecera.id_rr,
										tbl_rr_cabecera.cod_empresa,
										tbl_rr_cabecera.id_rr_recepcion,
										tbl_rr_cabecera.fecha_creacion,
										tbl_rr_cabecera.usuario_creacion,
										tbl_rr_cabecera.fecha_entrega,
										tbl_rr_cabecera.id_cliente,
										tbl_rr_cabecera.descripcion_cliente,
										tbl_rr_cabecera.id_proyecto,
										tbl_rr_cabecera.descripcion_proyecto,
										tbl_rr_cabecera.id_orden_compra,
										tbl_rr_cabecera.id_orden_cliente,
										tbl_rr_cabecera.descripcion_orden,
										tbl_rr_cabecera.guia_despacho,
										tbl_rr_cabecera.proveedor,
										(select domain_desc from tbl_ref_codes where domain_id = tbl_rr_cabecera.estado_rr and domain = 'ESTADO_RR ') as estado_rr,
										tbl_rr_cabecera.archivo_orginal,
										tbl_rr_cabecera.archivo_rr
									FROM mimsproj_mims.tbl_rr_cabecera
									where cod_empresa = ".$codEmpresa." 
									and estado_rr = 1  
									and id_cliente = ".$codigoCliente." 
									and id_proyecto = ".$codigoProyecto);
	  $CabeceraRR = $query->result();
	  return $CabeceraRR;
	}

	function actualizarCabeceraRR($data,$where)
	{
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}

	function actualizarDetalleRR($data,$where)
	{
		$this->db->update($this->tabledet, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}

	function listaRRDet($codEmpresa,$id_rr_cab)
	{

	  $query = $this->db->query("SELECT id_rr_det,
									cod_empresa,
									numero_linea_det,
									numero_linea_wpanel,
									id_rr_cab,
									id_orden_compra,
									item_oc,
									tag_number,
									stockcode,
									paq_construccion,
									plano,
									descripcion,
									id_orden_cliente,
									packing_list,
									guia_despacho,
									numero_viaje,
									st_cantidad,
									st_cantidad_recibida,
									id_bodega,
									id_carpa,
									id_patio,
									id_posicion,
									observacion,
									observacion_exb,
									inspeccion_requerida,
									estado_rr_det
							FROM tbl_rr_detalle
							where cod_empresa = ". $codEmpresa." 
							AND   id_rr_cab = ".$id_rr_cab);
	  $CabeceraRR = $query->result();
	  return $CabeceraRR;
	}	


function obtieneRRDet($codEmpresa,$id_rr_det,$id_rr_cab){



	$query = $this->db->query("SELECT id_rr_det,
	cod_empresa,
	numero_linea_det,
	numero_linea_wpanel,
	id_rr_cab,
	id_orden_compra,
	tag_number,
	stockcode,
	paq_construccion,
	plano,
	descripcion,
	id_orden_cliente,
	packing_list,
	guia_despacho,
	numero_viaje,
	st_cantidad,
	st_cantidad_recibida,
	id_bodega,
	id_carpa,
	id_patio,
	id_posicion,
	observacion,
	observacion_exb,
	inspeccion_requerida
FROM tbl_rr_detalle
where cod_empresa = ". $codEmpresa." 
and   id_rr_cab = ".$id_rr_cab."
and  id_rr_det = ".$id_rr_det." ");

$CabeceraRR = $query->result();
return $CabeceraRR;


}

}
?>