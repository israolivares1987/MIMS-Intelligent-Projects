<?php
class Consultas extends CI_Model{

  function validate_user($user_name,$password,$cod_emp){

    $this->db->select("*");
    $this->db->where('n_usuario',$user_name);
    $this->db->where('password',$password);
    $this->db->where('cod_emp',$cod_emp);
    $this->db->from("tbl_user");
    $this->db->join("tbl_empresa", "tbl_empresa.cod_empresa = tbl_user.cod_emp");
    $result = $this->db->get();

    return $result;
  }

  function obtiene_employees(){

      $employees = $this->db->get('tbl_employees');
      //$employees = $result->result_array();
      return $employees;
  
    }

    function obtiene_suppliers(){
      
      $suppliers = $this->db->get('tbl_Suppliers');
      //$suppliers = $result->result_array();
      return $suppliers;

    }

  function obtiene_datos_usuario($rol_id){

   
    $this->db->where('rol_id',$rol_id);
    $rol = $this->db->get('tbl_rol');
    
    
    return $rol;

    }

   function obtieneExpediting()
      {

        $query = $this->db->query("SELECT a.* , 
                                  (select SupplierName from tbl_Suppliers where SupplierID = a.SupplierID) as Supplier, 
                                  (select CONCAT(FirstName, ' ', LastName)  from tbl_employees where ID = a.EmployeeID) as Employee 
                                  FROM tbl_Purchase_Orders a"
                                  );
        $Expediting = $query;
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


      function obtieneProveedores($codEmpresa){

        $this->db->where('codEmpresa',$codEmpresa);
        $Proveedores = $this->db->get('tbl_proveedores');
        
        
        return $Proveedores->result();

      }

      function obtieneProyectosProveedores($idProveedor){

        $this->db->where('idProveedor',$idProveedor);
        $Pproveedores = $this->db->get('tbl_proyectos');
        
        
        return $Pproveedores->result();

      }
      
      function obtienePurchaseOrders($idProyecto,$idProveedor){

        $this->db->where('idProveedor',$idProveedor);
        $this->db->where('idProyecto',$idProyecto);
        $PurchaseOrders = $this->db->get('tbl_Purchase_Orders');
        
        
        return $PurchaseOrders->result();

      }

     


    

     

      }
?>