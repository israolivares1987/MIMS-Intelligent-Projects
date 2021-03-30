<?php
class Bodegas_Proyecto_model extends CI_Model{

	var $table = 'tbl_proyecto_bodegas';

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
	  
	
	
}
?>