<?php
class Proyectos_model extends CI_Model{

	var $table = 'tbl_Purchase_Orders';

	function obtieneExpediting($idCliente,$idProyecto)
	{

	  $query = $this->db->query("SELECT a.* , 
								(select SupplierName from tbl_Suppliers where SupplierID = a.SupplierID) as Supplier, 
								(select CONCAT(FirstName, ' ', LastName)  from tbl_employees where ID = a.EmployeeID) as Employee 
								FROM tbl_Purchase_Orders a
								WHERE idCliente =".$idCliente." 
								AND idproyecto =".$idProyecto
							);
	  $Expediting = $query->result();
	  return $Expediting;
	}

	function obtienePurchaseOrders($idProyecto,$idCliente){

        $this->db->where('idCliente',$idCliente);
        $this->db->where('idProyecto',$idProyecto);
        $PurchaseOrders = $this->db->get('tbl_Purchase_Orders');
        
        return $PurchaseOrders;

	  }
	  
	  function count_all_Expediting($idCliente)
	{

	  $query = $this->db->query("SELECT a.* , 
								(select SupplierName from tbl_Suppliers where SupplierID = a.SupplierID) as Supplier, 
								(select CONCAT(FirstName, ' ', LastName)  from tbl_employees where ID = a.EmployeeID) as Employee 
								FROM tbl_Purchase_Orders a
								WHERE idCliente =".$idCliente
								);

    	return $this->db->count_all_results();
	}

	function obtieneProyectos($idCliente){

		$this->db->where('idCliente',$idCliente);
        $Proyectos = $this->db->get('tbl_proyectos');
        
        return $Proyectos->result();	

	}

	function count_all_Proyectos($idCliente){

		$this->db->where('idCliente',$idCliente);
        $Proyectoa = $this->db->get('tbl_proyectos');
        
        return $this->db->count_all_results();	

	}


	function obtieneProyectosCliente($idCliente){
		
		$this->db->select('t1.NumeroProyecto AS codigo_proyecto,
						   t1.DescripcionProyecto AS descripcion_proyecto,
						   t2.domain_desc AS estado_proyecto');
		$this->db->from('tbl_proyectos t1,
						 tbl_ref_codes t2');				   
		$this->db->where('idCliente',$idCliente);
		$this->db->where('t1.estadoProyecto = t2.domain_id');
		$this->db->where('t2.domain = "ESTADO_PROYECTO"');

		$Proyectos = $this->db->get();
		
		return $Proyectos->result();

	}

	function guardaProyecto($data){

		$insert = $this->db->insert('tbl_proyectos', $data);

		return $insert;

	}

	function obtieneProyectoById($id, $id_cliente){

		$this->db->select(' t2.nombreCliente AS nombre_cliente,
							t1.DescripcionProyecto AS nombre_proyecto,
							t1.estadoProyecto AS estado_proyecto,
							t3.domain_id AS domain_id,
							t3.domain_desc AS domain_desc');

		$this->db->from('tbl_proyectos t1,
						 tbl_clientes  t2,
						 tbl_ref_codes t3');
		
		$this->db->where('t1.NumeroProyecto', $id);
		$this->db->where('t1.idCliente', $id_cliente);
		$this->db->where('t1.idCliente = t2.idCliente');
		$this->db->where('t1.estadoProyecto = t3.domain_id');
		$this->db->where('t3.domain = "ESTADO_PROYECTO"');
		
		$query = $this->db->get();

		return $query->result();

	}


	function obtieneDatosRef($dominio){

		$this->db->where('domain', $dominio);
		$this->db->where('domain_state', 1);

		$this->db->from('tbl_ref_codes');

		$query = $this->db->get();

		return $query->result();

	}

}
?>