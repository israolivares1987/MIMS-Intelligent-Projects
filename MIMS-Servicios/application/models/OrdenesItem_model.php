<?php
class OrdenesItem_model extends CI_Model{

	var $table = 'tbl_ordenes_item';

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


	function guardaOrdenItem($data){

		$insert = $this->db->insert($this->table, $data);

		return $insert;

	}

	function editarOrdenItem($id_order,$id_proyecto,$id_cliente,$item_id,$codEmpresa){

		$this->db->from($this->table);
		$this->db->where('codEmpresa', $codEmpresa);
		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('id_item', $item_id);
		$this->db->where('PurchaseOrderID', $id_order);

		$query = $this->db->get();

	
		return $query->result();

	}

	function actualizaOrdenItem($data){

		$this->db->where('codEmpresa', $data['codEmpresa']);
		$this->db->where('idCliente', $data['idCliente']);
		$this->db->where('idProyecto', $data['idProyecto']);
		$this->db->where('PurchaseOrderID', $data['PurchaseOrderID']);
		$this->db->where('id_item', $data['id_item']);

		$query = $this->db->update($this->table,$data);


		return $query;

	}
	
	function eliminaOrdenItem($id_cliente, $id_proyecto,$cod_empresa,$orden,$orden_item){

		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('codEmpresa', $cod_empresa);
		$this->db->where('PurchaseOrderID', $orden);
		$this->db->where('id_item', $orden_item);

		$delete = $this->db->delete($this->table);


		return $delete;

	}


}
?>