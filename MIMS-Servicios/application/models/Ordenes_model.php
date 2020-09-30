<?php
class Ordenes_model extends CI_Model{

	var $table = 'tbl_ordenes';

	function obtieneOrdenes($idCliente,$idProyecto)
	{

	  $query = $this->db->query("SELECT a.CodEmpresa as codEmpresa,
	  							a.PurchaseOrderID,
	  							a.idRequerimiento,
								a.PurchaseOrderNumber,
								(select domain_desc from tbl_ref_codes where domain_id = a.Categorizacion and domain = 'CATEGORIZACION_ORDENES') as Categorizacion,
								a.PurchaseOrderDescription,
								a.Revision,
								b.nombreCliente,
								a.SupplierName,
								a.EstadoPlano,
								a.ObservacionesEp,
								a.Comprador,
								concat(c.FirstName,' ', c.LastName) as ExpediterID,
								a.Requestor,
								(select domain_desc from tbl_ref_codes where domain_id = a.Currency and domain = 'CURRENCY_ORDEN') as Currency,
								a.ValorNeto,
								a.ValorTotal,
								a.Budget,
								a.CostCodeBudget,
								a.OrderDate,
								a.DateRequired,
								a.DatePromised,
								a.ShipDate,
								(select domain_desc from tbl_ref_codes where domain_id = a.ShippingMethodID and domain = 'SHIPPING_METHOD') as ShippingMethodID,
								a.DateCreated,
								(select domain_desc from tbl_ref_codes where domain_id = a.POStatus and domain = 'PO_STATUS') as POStatus,
								a.Support,
								a.DateCreated,
								a.Support_original       
								FROM tbl_ordenes a ,  tbl_employees c, tbl_clientes b
								WHERE a.idCliente = ".$idCliente."
								AND idproyecto = ".$idProyecto."
								and a.idCliente = b.idCliente
								and ExpediterID = c.id");
	  $Ordenes = $query->result();
	  return $Ordenes;
	}


	function obtieneOrdenesActivador($idCliente,$idProyecto, $codActivador)
	{

	  $query = $this->db->query("SELECT a.CodEmpresa as codEmpresa,
	  							a.PurchaseOrderID,
	  							a.idRequerimiento,
								a.PurchaseOrderNumber,
								(select domain_desc from tbl_ref_codes where domain_id = a.Categorizacion and domain = 'CATEGORIZACION_ORDENES') as Categorizacion,
								a.PurchaseOrderDescription,
								a.Revision,
								b.nombreCliente,
								a.SupplierName,
								a.EstadoPlano,
								a.ObservacionesEp,
								a.Comprador,
								concat(c.FirstName,' ', c.LastName) as ExpediterID,
								a.Requestor,
								(select domain_desc from tbl_ref_codes where domain_id = a.Currency and domain = 'CURRENCY_ORDEN') as Currency,
								a.ValorNeto,
								a.ValorTotal,
								a.Budget,
								a.CostCodeBudget,
								a.OrderDate,
								a.DateRequired,
								a.DatePromised,
								a.ShipDate,
								(select domain_desc from tbl_ref_codes where domain_id = a.ShippingMethodID and domain = 'SHIPPING_METHOD') as ShippingMethodID,
								a.DateCreated,
								(select domain_desc from tbl_ref_codes where domain_id = a.POStatus and domain = 'PO_STATUS') as POStatus,
								a.Support,
								a.DateCreated,
								a.Support_original       
								FROM tbl_ordenes a ,  tbl_employees c, tbl_clientes b
								WHERE a.idCliente = ".$idCliente."
								AND idproyecto = ".$idProyecto."
								AND EmailAddress = ".$codActivador."
								and a.idCliente = b.idCliente
								and ExpediterID = c.id");
	  $Ordenes = $query->result();
	  return $Ordenes;
	}


	function guardaOrden($data){

		$insert = $this->db->insert($this->table, $data);

		return $insert;

	}

	function actualizaOrden($data){

		$this->db->where('codEmpresa', $data['codEmpresa']);
		$this->db->where('idCliente', $data['idCliente']);
		$this->db->where('idProyecto', $data['idProyecto']);
		$this->db->where('PurchaseOrderID', $data['PurchaseOrderID']);

		$query = $this->db->update($this->table,$data);


		return $query;

	}


	function obtieneOrderById($id_order,$id_proyecto,$id_cliente,$codEmpresa){

		$this->db->from($this->table);
		$this->db->where('codEmpresa', $codEmpresa);
		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('PurchaseOrderID', $id_order);

		$query = $this->db->get();

	
		return $query->result();

	}

	function eliminaOrden($id_cliente, $id_proyecto,$cod_empresa,$orden){

		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('codEmpresa', $cod_empresa);
		$this->db->where('PurchaseOrderID', $orden);

		$delete = $this->db->delete($this->table);


		return $delete;

	}

}
?>