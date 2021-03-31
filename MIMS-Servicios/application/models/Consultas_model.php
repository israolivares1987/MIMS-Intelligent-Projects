<?php
class Consultas_model extends CI_Model{

  function validate_user($user_name,$password,$cod_emp){

    $this->db->select("*");
    $this->db->where('email',$user_name);
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


    // Obtiene datos totales

     function obtieneDatosTotalesProyectos($codEmpresa)
    {

      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->where('estadoProyecto','1');
      $this->db->from('tbl_proyectos');
      return $this->db->count_all_results();

    }

	
    function obtieneTotClientesxEmp($codEmpresa)
    {
  
      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->from('tbl_clientes');
      return $this->db->count_all_results();
    }

  
    
    function obtieneDatosTotalesLineasActCompras($codEmpresa)
    {

      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->where("a.TIPO_DE_LINEA = 'ACTIVABLE'");
      $this->db->where('a.ID_OC = b.PurchaseOrderID');
      $this->db->where("b.POStatus = 'ADJUDICADA'");
      $this->db->where("b.Categorizacion = 'ORDEN PRINCIPAL' ");
      $this->db->from('tbl_bucksheet a, tbl_ordenes b');

      return $this->db->count_all_results();


    }

	

    function obtieneDatosTotalesLineasActObra($codEmpresa)
    {

      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->where("a.TIPO_DE_LINEA = 'ACTIVABLE'");
      $this->db->where('a.ID_OC = b.PurchaseOrderID');
      $this->db->where("b.POStatus = 'ADJUDICADA'");
      $this->db->where("b.Categorizacion = 'ORDEN ASOCIADA' ");
      $this->db->from('tbl_bucksheet a, tbl_ordenes b');

      //var_dump( $this->db->get_compiled_select());
      return $this->db->count_all_results();


    }
 
    function obtieneDatosOrdenesObra($codEmpresa)
    {

      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->where('b.POStatus', 'ADJUDICADA');
      $this->db->where('b.Categorizacion', 'ORDEN ASOCIADA');
      $this->db->from('tbl_ordenes b');
      return $this->db->count_all_results();


    }
  
	
    function obtieneDatosTotalOrdenesCompras($codEmpresa)
    {

      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->where('b.POStatus', 'ADJUDICADA');
      $this->db->where('b.Categorizacion', 'ORDEN PRINCIPAL');
      $this->db->from('tbl_ordenes b');
      return $this->db->count_all_results();


    }

   
    function obtieneDatosAdminMMCompras($codEmpresa)
    {

      $this->db->select_sum('ValorNeto');
      $this->db->where('codEmpresa',$codEmpresa);
      $this->db->where('b.POStatus', 'ADJUDICADA');
      $this->db->where('b.Categorizacion', '1ORDEN PRINCIPAL');
      $this->db->from('tbl_ordenes b');

      //var_dump( $this->db->get_compiled_select());

      return $this->db->get()->result();


    }

	
      function obtieneDatosAdminMMObras($codEmpresa)
      {
        $this->db->select_sum('ValorNeto');
        $this->db->where('codEmpresa',$codEmpresa);
        $this->db->where('b.POStatus', 'ADJUDICADA');
        $this->db->where('b.Categorizacion', 'ORDEN ASOCIADA');
        $this->db->from('tbl_ordenes b');
        return $this->db->get()->result();


      }

// Funciones por Activador

function obtieneDatosTotalesProyectosActivador($codEmpresa,$activador)
{

  $this->db->distinct();
  $this->db->select('a.*');
  $this->db->where('a.codEmpresa = b.codEmpresa');
  $this->db->where('a.codEmpresa = b.codEmpresa');
  $this->db->where('a.NumeroProyecto = b.idProyecto');
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where('estadoProyecto = 1');
  $this->db->where('b.POStatus', 'ADJUDICADA');
  $this->db->where('a.codEmpresa = '.$codEmpresa);
  $this->db->where("c.email = '".$activador."'");
  
  $this->db->from('tbl_proyectos a, tbl_ordenes b, tbl_user c');

  return $this->db->count_all_results();

}


function obtieneTotClientesxEmpActivador($codEmpresa,$activador)
{

  $this->db->distinct();
  $this->db->select( ' d.nombreCliente');
  $this->db->where('a.codEmpresa = b.codEmpresa');
  $this->db->where('a.NumeroProyecto = b.idProyecto');
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where('estadoProyecto = 1');
  $this->db->where('b.POStatus', 'ADJUDICADA');
  $this->db->where('a.codEmpresa = '.$codEmpresa);
  $this->db->where("c.email = '".$activador."'");
  $this->db->where('d.idCliente = b.idCliente');
  $this->db->where(' a.idCliente = d.idCliente');
  $this->db->from('tbl_proyectos a, tbl_ordenes b, tbl_user c, tbl_clientes d');
  return $this->db->count_all_results();
}



function obtieneDatosTotalesLineasActComprasActivador($codEmpresa,$activador)
{

  $this->db->where('b.codEmpresa',$codEmpresa);
  $this->db->where("a.TIPO_DE_LINEA = 'ACTIVABLE'");
  $this->db->where('a.ID_OC = b.PurchaseOrderID');
  $this->db->where("b.POStatus = 'ADJUDICADA'");
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where("c.email = '".$activador."'");
  $this->db->where("b.Categorizacion = 'ORDEN PRINCIPAL' ");
  $this->db->from('tbl_bucksheet a, tbl_ordenes b,tbl_user c');

  return $this->db->count_all_results();


}



function obtieneDatosTotalesLineasActObraActivador($codEmpresa,$activador)
{

  $this->db->where('b.codEmpresa',$codEmpresa);
  $this->db->where("a.TIPO_DE_LINEA = 'ACTIVABLE'");
  $this->db->where('a.ID_OC = b.PurchaseOrderID');
  $this->db->where("b.POStatus = 'ADJUDICADA'");
  $this->db->where("b.Categorizacion = 'ORDEN ASOCIADA' ");
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where("c.email = '".$activador."'");
  $this->db->from('tbl_bucksheet a, tbl_ordenes b,tbl_user c');
  return $this->db->count_all_results();


}

function obtieneDatosOrdenesObraActivador($codEmpresa,$activador)
{

  $this->db->where('b.codEmpresa',$codEmpresa);
  $this->db->where("b.POStatus = 'ADJUDICADA'");
  $this->db->where("b.Categorizacion = 'ORDEN ASOCIADA' ");
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where("c.email = '".$activador."'");
  $this->db->from('tbl_ordenes b,tbl_user c');
  return $this->db->count_all_results();


}


function obtieneDatosTotalOrdenesComprasActivador($codEmpresa,$activador)
{

  $this->db->where('b.codEmpresa',$codEmpresa);
  $this->db->where('b.POStatus', 'ADJUDICADA');
  $this->db->where('b.Categorizacion', 'ORDEN PRINCIPAL');
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where("c.email = '".$activador."'");
  $this->db->from(' tbl_ordenes b,tbl_user c');
  return $this->db->count_all_results();

}


function obtieneDatosAdminMMComprasActivador($codEmpresa,$activador)
{

  $this->db->select_sum('ValorNeto');
  $this->db->where('b.codEmpresa',$codEmpresa);
  $this->db->where('b.POStatus', 'ADJUDICADA');
  $this->db->where('b.Categorizacion', 'ORDEN PRINCIPAL');
  $this->db->where('c.cod_user = b.ExpediterID');
  $this->db->where("c.email = '".$activador."'");
  $this->db->from(' tbl_ordenes b,tbl_user c');
  return $this->db->get()->result();


}


  function obtieneDatosAdminMMObrasActivador($codEmpresa,$activador)
  {
    $this->db->select_sum('ValorNeto');
    $this->db->where('b.codEmpresa',$codEmpresa);
    $this->db->where('b.POStatus', 'ADJUDICADA');
    $this->db->where('b.Categorizacion', 'ORDEN ASOCIADA');
    $this->db->where('c.cod_user = b.ExpediterID');
    $this->db->where("c.email = '".$activador."'");
    $this->db->from('tbl_ordenes b,tbl_user c');
    return $this->db->get()->result();


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


      function cuentaSession($user_name,$cod_emp, $sessionId){

        $this->db->select("*");
        $this->db->where('n_usuario',$user_name);
        $this->db->where('cod_emp',$cod_emp);
        $this->db->from("tbl_user");
        $this->db->join("ci_sessions", "tbl_user.session_id = ci_sessions.id");
        $result = $this->db->get()->num_rows();

        return $result;
      
      }



      function eliminarSession($userId, $sessionId){

       $this->db->where('id', $sessionId);
       
       $delete = $this->db->delete('ci_sessions');
	    	return $delete;
       
     
      } 


      function consultaSession($userId, $sessionId){

        $this->db->select("*");
        $this->db->where('cod_user',$userId);
        $this->db->from("tbl_user");
        $this->db->join("ci_sessions", "tbl_user.session_id = ci_sessions.id");
        
        $query = $this->db->get();

        return $query->result();
      
      }


      function obtiene_user($user_name,$cod_emp){

        $this->db->select("*");
        $this->db->where('email',$user_name);
        $this->db->where('cod_emp',$cod_emp);
        $this->db->from("tbl_user");
        $this->db->join("tbl_empresa", "tbl_empresa.cod_empresa = tbl_user.cod_emp");

        $result = $this->db->get()->result();
    
        return $result;
      }


      function actualiza_password_user($data,$where)
        {
          $this->db->update("tbl_user", $data, $where);
          $this->db->affected_rows();
          
          if ($this->db->affected_rows() > 0 ) {
            return true; // Or do whatever you gotta do here to raise an error
          } else {
            return false;
          }
        }

        function obtiene_user_token($cod_emp,$tokenpassword){

          $this->db->select("*");
          $this->db->where('cod_emp',$cod_emp);
          $this->db->where('tokenpassword',$tokenpassword);
          $this->db->from("tbl_user");
          $this->db->join("tbl_empresa", "tbl_empresa.cod_empresa = tbl_user.cod_emp");
  
          $result = $this->db->get()->result_array();
      
          return $result;
        }

        
        function actualiza_password_new($data,$where)
        {
          $this->db->update("tbl_user", $data, $where);
          $this->db->affected_rows();
          
          if ($this->db->affected_rows() > 0 ) {
            return true; // Or do whatever you gotta do here to raise an error
          } else {
            return false;
          }
        }
          
  }
?>