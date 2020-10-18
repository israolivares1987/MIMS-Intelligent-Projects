<?php
class Todo_usuarios_model extends CI_Model{

	var $table = 'tbl_todo_usuario';



	function obtieneTodoUsuarios($codEmpresa,$codUsuario){

		
		
		$this->db->select("a.*,
						  DATEDIFF(fecha_termino,date(sysdate())) as dias, CONCAT(
			( DATEDIFF(fecha_termino,date(sysdate()))), ' Dias ') as dif,
			(select domain_desc from tbl_ref_codes where domain_id = a.lista_todo and domain = 'LISTA_TO_DO ') as lista_todo
			");
        $this->db->where('codEmpresa', $codEmpresa);
		$this->db->where('id_usuario', $codUsuario);
		$this->db->from('tbl_todo_usuario a');
		$this->db->order_by('fecha_inicio, estado', 'desc');
	


        $query = $this->db->get();

        return $query->result();

	}
	

function guardarTodoUsuario($data)
 {
   $this->db->insert($this->table, $data);
   return $this->db->insert_id();
 }
	

function actualizaEstadoTodo($data,$where)
{
	$this->db->update($this->table, $data, $where);
	$this->db->affected_rows();
	
	if ($this->db->affected_rows() > 0 ) {
		return true; // Or do whatever you gotta do here to raise an error
	} else {
		return false;
	}
}


function obtieneTodoUsuario($codEmpresa,$codUsuario, $id_todo){

		
		
	$this->db->select("a.*, CONCAT(
		FLOOR(HOUR(TIMEDIFF(SYSDATE(), fecha_termino)) / 24), ' Dias ') as dif");
	$this->db->where('codEmpresa', $codEmpresa);
	$this->db->where('id_usuario', $codUsuario);
	$this->db->where('id_todo', $id_todo);
	$this->db->from('tbl_todo_usuario a');



	$query = $this->db->get();

	return $query->result();

}

function editaTodoUsuario($data,$where)
{
	$this->db->update($this->table, $data, $where);
	$this->db->affected_rows();
	
	if ($this->db->affected_rows() > 0 ) {
		return true; // Or do whatever you gotta do here to raise an error
	} else {
		return false;
	}
}

function eliminaTodoUsuario($codEmpresa,$cod_usuario,$id_todo)
{

	$this->db->where('codEmpresa', $codEmpresa);
	$this->db->where('id_usuario', $cod_usuario);
	$this->db->where('id_todo', $id_todo);

	$delete = $this->db->delete($this->table);
	return $delete;
}	  


}
?>