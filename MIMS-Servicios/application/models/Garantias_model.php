<?php
class Garantias_model extends CI_Model{

	var $table = 'tbl_garantias';

	

	function listasGarantias($idCliente,$idProyecto,$idOrden, $codEmpresa){
		{

			$query = $this->db->query("select COD_EMPRESA,
			ID_GARANTIA,
			ID_CLIENTE,
			ID_PROYECTO,
			ID_EMPLEADO,
			FECHA_EMISION,
			NUMERO_DOCTO,
			(select domain_desc from tbl_ref_codes where domain_id = a.TIPO_GARANTIA and domain = 'TIPO_GARANTIA')  as TIPO_GARANTIA,
			REFERENCIA,
			MONTO,
			VENCIMIENTO,
			RESPALDO,
			RESPALDO_ORIGINAL
			FROM tbl_garantias a
		 where COD_EMPRESA = " .$codEmpresa."
		 and id_cliente = " .$idCliente."
		 and id_proyecto = " .$idProyecto."
		 and id_orden = " .$idOrden);
	   
	   
									   
			 $garantias = $query->result();
			 return $garantias;
		   }
	   
	  
	}

	public function guardarGarantias($data = array()) {
        if(!empty($data)){
           
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }



	function eliminaEdp($ID_EDP)
	{

		$this->db->where('ID_EDP', $ID_EDP);

		$delete = $this->db->delete($this->table);
		return $delete;
	}

}
?>