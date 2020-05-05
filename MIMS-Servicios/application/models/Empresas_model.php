<?php
class Empresas_model extends CI_Model{

	var $table = 'tbl_empresa';

  function obtieneEmpresa($codEmpresa){  

	$this->db->select('*');
	$this->db->from($this->table);				   
	$this->db->where('cod_empresa',$codEmpresa);

    return $this->db->get()->result();	
	
  
 }
     

}
?>