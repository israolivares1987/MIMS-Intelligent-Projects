<?php
class Consultas_model extends CI_Model{

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

      
     function obtieneDatosTotalesProyectos($codEmpresa)
      {

        $this->db->where('codEmpresa',$codEmpresa);
        $this->db->from('tbl_proyectos');
        return $this->db->count_all_results();
      }

      function obtieneDatosTotalesOrdenes($codEmpresa)
      {

        $this->db->where('codEmpresa',$codEmpresa);
        $this->db->from('tbl_Purchase_Orders');
        return $this->db->count_all_results();
      }

     
      function obtieneDatosTotalesSuppliers($codEmpresa)
      {

        $this->db->where('codEmpresa',$codEmpresa);
        $this->db->from('tbl_Suppliers');
        return $this->db->count_all_results();
      }

function setSession($userId, $sessionId){

        $oldSessionId=$this->db->select("session_id")
                      ->where(array('cod_user'=>$userId))
                      ->get("tbl_user")
                      ->row('session_id');


       $this->db->where('id', $oldSessionId);
       $this->db->delete('ci_sessions');
       
       $this->db->where('cod_user', $userId);
       $this->db->update('tbl_user', array('session_id'=>$sessionId));
      
      }
          
  }
?>