<?php
class Edp_model extends CI_Model{

	var $table = 'tbl_edp';

	

	function listasEdp($idCliente,$idProyecto,$idOrden, $codEmpresa){
		{

			$query = $this->db->query("SELECT ID_EDP,
			 COD_EMPRESA,
			 ID_CLIENTE,
			 ID_PROYECTO,
			 ID_ORDEN,
			ID_EMPLEADO,
			FECHA_INGRESO,
			NUM_EDP,
			(select domain_desc from tbl_ref_codes where domain_id = a.ESTADO_EDP and domain = 'ESTADO_EDP') as ESTADO_EDP,
		   FECHA_PAGO,
				(select domain_desc from tbl_ref_codes where domain_id = a.AP_PROVEEDOR and domain = 'ACTUAL_PREVIO') as AP_PROVEEDOR,
			PROVEEDOR,
			IMPORTE_EDP,
			SALDO_INSOLUTO_EDP,
			RESPALDO,
			RESPALDO_ORIGINAL,
		   ACCION,
			 COMENTARIOS
		 FROM tbl_edp a
		 where COD_EMPRESA = " .$codEmpresa."
		 and id_cliente = " .$idCliente."
		 and id_proyecto = " .$idProyecto."
		 and id_orden = " .$idOrden);
	   
	   
									   
			 $Ordenes = $query->result();
			 return $Ordenes;
		   }
	   
	  
	}

	public function insertEdp($data = array()) {
        if(!empty($data)){
           
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }

	function actualizarEdp($data,$where)
	{
		$this->db->update($this->table, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}


	function eliminaEdp($ID_EDP)
	{

		$this->db->where('ID_EDP', $ID_EDP);

		$delete = $this->db->delete($this->table);
		return $delete;
	}

}
?>