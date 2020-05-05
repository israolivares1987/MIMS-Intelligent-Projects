<?php
class OrdenesItem_model extends CI_Model{

	var $table = 'tbl_ordenes';

	function obtieneItemOrdenes($idOrden,$idCliente,$idProyecto)
	{

	  $query = $this->db->query("SELECT a.codEmpresa,
								a.idCliente,
								a.idProyecto,
								a.PurchaseOrderID,
								a.id_item,
								a.descripcion,
								a.revision,
								(select domain_desc from tbl_ref_codes where domain_id = unidad and domain = 'UNIDAD_MEDIDA') as unidad,
								a.cantidad,
								a.precio_unitario,
								a.valor_neto,
								(select domain_desc from tbl_ref_codes where domain_id = estado and domain = 'ESTADO_ITEM_ORDEN') as estado
								FROM tbl_ordenes_item a
								where idCliente = ".$idCliente."
								and idProyecto = ".$idProyecto."
								and PurchaseOrderID = ".$idOrden);
	  $Ordenes = $query->result();
	  return $Ordenes;
	}

}
?>