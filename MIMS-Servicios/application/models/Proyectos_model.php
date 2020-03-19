<?php
class Proyectos_model extends CI_Model{

	var $table = 'tbl_Purchase_Orders';

	function obtieneExpediting($idProveedor,$idProyecto)
	{

	  $query = $this->db->query("SELECT a.* , 
								(select SupplierName from tbl_Suppliers where SupplierID = a.SupplierID) as Supplier, 
								(select CONCAT(FirstName, ' ', LastName)  from tbl_employees where ID = a.EmployeeID) as Employee 
								FROM tbl_Purchase_Orders a
								WHERE idProveedor =".$idProveedor." 
								AND idproyecto =".$idProyecto
							);
	  $Expediting = $query->result();
	  return $Expediting;
	}
  


	function obtieneBuckSheet($PurchaseOrderID)
	{

	  $query = $this->db->query(" SELECT a.*,
								  (select ProductName from tbl_Products_Catalogo where a.ProductID = ProductID )as Product
								  FROM tbl_Inventory_Expediting a
								  WHERE PurchaseOrderID =".$PurchaseOrderID
								);

	  $BuckSheet = $query->result();
	  return $BuckSheet;
	}

	

	function count_all_BuckSheet($PurchaseOrderID)
	{
	  $this->db->query("SELECT a.*,
								  (select ProductName from tbl_Products_Catalogo where a.ProductID = ProductID )as Product
								  FROM tbl_Inventory_Expediting a
								  WHERE PurchaseOrderID =".$PurchaseOrderID
								);
	  return $this->db->count_all_results();
	}

	function obtienePurchaseOrders($idProyecto,$idProveedor){

        $this->db->where('idProveedor',$idProveedor);
        $this->db->where('idProyecto',$idProyecto);
        $PurchaseOrders = $this->db->get('tbl_Purchase_Orders');
        
        return $PurchaseOrders;

	  }
	  
	  function count_all_Expediting($idProveedor)
	{

	  $query = $this->db->query("SELECT a.* , 
								(select SupplierName from tbl_Suppliers where SupplierID = a.SupplierID) as Supplier, 
								(select CONCAT(FirstName, ' ', LastName)  from tbl_employees where ID = a.EmployeeID) as Employee 
								FROM tbl_Purchase_Orders a
								WHERE idProveedor =".$idProveedor
								);

    	return $this->db->count_all_results();
	}

	function obtieneProyectos($idProveedor){

		$this->db->where('idProveedor',$idProveedor);
        $Proyectos = $this->db->get('tbl_proyectos');
        
        return $Proyectos->result();	

	}

	function count_all_Proyectos($idProveedor){

		$this->db->where('idProveedor',$idProveedor);
        $Proyectoa = $this->db->get('tbl_proyectos');
        
        return $this->db->count_all_results();	

	}

}
?>