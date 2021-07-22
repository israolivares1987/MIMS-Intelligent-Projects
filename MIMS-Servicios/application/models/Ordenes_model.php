<?php
class Ordenes_model extends CI_Model{

	var $table = 'tbl_ordenes';

	function obtieneOrdenes($idCliente,$idProyecto, $codEmpresa)
	{

	  $query = $this->db->query("SELECT a.CodEmpresa as codEmpresa,
									a.PurchaseOrderID,
									(select domain_desc from tbl_ref_codes where domain_id = a.Criticidad and domain = 'CRITICIDAD') as Criticidad,
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
									concat(c.nombres,' ', c.paterno) as ExpediterID,
									a.Requestor,
									(select domain_desc from tbl_ref_codes where domain_id = a.Currency and domain = 'CURRENCY_ORDEN') as Currency,
									a.ValorNeto,
									a.ValorTotal,
									a.Budget,
									a.CostCodeBudget,
									a.OrderDate,
									a.DateRequired,
									a.DateEta,
									a.DatePromised,
									a.ShipDate,
									(select domain_desc from tbl_ref_codes where domain_id = a.ShippingMethodID and domain = 'SHIPPING_METHOD') as ShippingMethodID,
									a.DateCreated,
									(select domain_desc from tbl_ref_codes where domain_id = a.POStatus and domain = 'PO_STATUS') as POStatus,
									a.Support,
									a.DateCreated,
									a.Support_original,
									d.NombreProyecto,
                                    d.DescripcionProyecto,
									a.TipoCambio,
    								a.ValorNetoUsd,       
									a.FechaAdjudicadaProgramada,
    								a.FechaAdjudicada,
									(DATEDIFF(a.DateRequired,a.FechaAdjudicada))  as Tiempo_Ejecución ,
									(DATEDIFF(now(),a.FechaAdjudicada))  as Dias_a_Hoy,
									TRUNCATE(DATEDIFF(now(),a.FechaAdjudicada) / DATEDIFF(a.DateRequired,a.FechaAdjudicada) * 100,2)  as Avance_Esperado,
									Date_format(CURDATE(),'%d-%m-%Y') as fecha_hoy,
									(select TRUNCATE(avg(ESTADO_AVANCE),0) from tbl_bucksheet where COD_EMPRESA = a.codEmpresa and id_oc = PurchaseOrderID) as Avance_Real,
									( (select TRUNCATE(avg(ESTADO_AVANCE),0) from tbl_bucksheet where COD_EMPRESA = a.codEmpresa and id_oc = PurchaseOrderID) - (TRUNCATE(DATEDIFF(now(),a.FechaAdjudicada) / DATEDIFF(a.DateRequired,a.FechaAdjudicada) * 100,2))) as Alerta
									FROM tbl_ordenes a ,  tbl_user c, tbl_clientes b, tbl_proyectos d
									WHERE a.idCliente = ".$idCliente."
									AND a.idproyecto = ".$idProyecto."
									AND a.codEmpresa =  ".$codEmpresa."
									and a.idCliente = b.idCliente
									and a.idCliente = d.idCliente
									and a.codEmpresa = d.codEmpresa
									and a.idProyecto = d.NumeroProyecto
									and ExpediterID = c.cod_user
									and a.codEmpresa = c.cod_emp
									and c.cod_emp = b.codEmpresa
									and b.codEmpresa = a.codEmpresa");


								
	  $Ordenes = $query->result();
	  return $Ordenes;
	}


	function obtieneOrdenesActivador($idCliente,$idProyecto, $codActivador,$codEmpresa)
	{

	  $query = $this->db->query("SELECT a.CodEmpresa as codEmpresa,
	  							a.PurchaseOrderID,
								(select domain_desc from tbl_ref_codes where domain_id = a.Criticidad and domain = 'CRITICIDAD') as Criticidad,
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
								concat(c.nombres,' ', c.paterno) as ExpediterID,
								a.Requestor,
								(select domain_desc from tbl_ref_codes where domain_id = a.Currency and domain = 'CURRENCY_ORDEN') as Currency,
								a.ValorNeto,
								a.ValorTotal,
								a.Budget,
								a.CostCodeBudget,
								a.OrderDate,
								a.DateRequired,
								a.DateEta,
								a.DatePromised,
								a.ShipDate,
								(select domain_desc from tbl_ref_codes where domain_id = a.ShippingMethodID and domain = 'SHIPPING_METHOD') as ShippingMethodID,
								a.DateCreated,
								(select domain_desc from tbl_ref_codes where domain_id = a.POStatus and domain = 'PO_STATUS') as POStatus,
								a.Support,
								a.DateCreated,
								a.Support_original,
								d.NombreProyecto,
                                d.DescripcionProyecto,
								a.TipoCambio,
    						    a.ValorNetoUsd,       
								a.FechaAdjudicadaProgramada,
    							a.FechaAdjudicada,
								(DATEDIFF(a.DateRequired,a.FechaAdjudicada))  as Tiempo_Ejecución ,
								(DATEDIFF(now(),a.FechaAdjudicada))  as Dias_a_Hoy,
								TRUNCATE(DATEDIFF(now(),a.FechaAdjudicada) / DATEDIFF(a.DateRequired,a.FechaAdjudicada) * 100,2)  as Avance_Esperado,
								Date_format(CURDATE(),'%d-%m-%Y') as fecha_hoy,
								(select TRUNCATE(avg(ESTADO_AVANCE),0) from tbl_bucksheet where COD_EMPRESA = a.codEmpresa and id_oc = PurchaseOrderID) as Avance_Real,
								( (select TRUNCATE(avg(ESTADO_AVANCE),0) from tbl_bucksheet where COD_EMPRESA = a.codEmpresa and id_oc = PurchaseOrderID) - (TRUNCATE(DATEDIFF(now(),a.FechaAdjudicada) / DATEDIFF(a.DateRequired,a.FechaAdjudicada) * 100,2))) as Alerta
								FROM tbl_ordenes a ,  tbl_user c, tbl_clientes b, tbl_proyectos d
								WHERE a.idCliente = ".$idCliente."
								AND idproyecto = ".$idProyecto."
								AND email = ".$codActivador."
								and a.idCliente = b.idCliente
								and ExpediterID = c.cod_user
								AND a.codEmpresa =  ".$codEmpresa."
								and a.idCliente = b.idCliente
								and a.idCliente = d.idCliente
								and a.codEmpresa = d.codEmpresa
								and a.idProyecto = d.NumeroProyecto
								and ExpediterID = c.cod_user
								and a.codEmpresa = c.cod_emp
								and c.cod_emp = b.codEmpresa
								and b.codEmpresa = a.codEmpresa");
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

		//var_dump($this->db->get_compiled_select());

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