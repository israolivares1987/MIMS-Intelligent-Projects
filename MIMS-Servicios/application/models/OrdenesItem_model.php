<?php
class OrdenesItem_model extends CI_Model{

	var $table = 'tbl_ordenes_item';

	function obtieneItemOrdenes($idOrden,$idCliente,$idProyecto)
	{

	  $query = $this->db->query("SELECT a.codEmpresa,
								a.idCliente,
								a.idProyecto,
								a.PurchaseOrderID,
								a.id_item,
								a.descripcion,
								a.revision,
								(select domain_desc from tbl_ref_codes where domain_id = unidad and domain = 'UNIDAD_MEDIDA') as unidad,
								a.cantidad,
								a.precio_unitario,
								a.valor_neto,
								(select domain_desc from tbl_ref_codes where domain_id = estado and domain = 'ESTADO_ITEM_ORDEN') as estado
								FROM tbl_ordenes_item a
								where idCliente = ".$idCliente."
								and idProyecto = ".$idProyecto."
								and PurchaseOrderID = ".$idOrden);
	  $Ordenes = $query->result();
	  return $Ordenes;
	}


	function guardaOrdenItem($data){

        $insert = $this->db->insert($this->table, $data);
        return $insert;

	}

	function editarOrdenItem($id_order,$id_proyecto,$id_cliente,$item_id,$codEmpresa){

		$this->db->from($this->table);
		$this->db->where('codEmpresa', $codEmpresa);
		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('id_item', $item_id);
		$this->db->where('PurchaseOrderID', $id_order);

		$query = $this->db->get();

	
		return $query->result();

	}

	function actualizaOrdenItem($data){

		$this->db->where('codEmpresa', $data['codEmpresa']);
		$this->db->where('idCliente', $data['idCliente']);
		$this->db->where('idProyecto', $data['idProyecto']);
		$this->db->where('PurchaseOrderID', $data['PurchaseOrderID']);
		$this->db->where('id_item', $data['id_item']);

		$query = $this->db->update($this->table,$data);


		return $query;

	}
	
	function eliminaOrdenItem($id_cliente, $id_proyecto,$cod_empresa,$orden,$orden_item){

		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('codEmpresa', $cod_empresa);
		$this->db->where('PurchaseOrderID', $orden);
		$this->db->where('id_item', $orden_item);

		$delete = $this->db->delete($this->table);


		return $delete;

	}

	function getRows($params = array())
    {
        
        
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();


        }else{
            if(array_key_exists("PurchaseOrderID", $params) && array_key_exists("id_item", $params)&& array_key_exists("idProyecto", $params)){

                $this->db->where('PurchaseOrderID', $params['PurchaseOrderID']);
				$this->db->where('id_item', $params['id_item']);
				$this->db->where('idProyecto', $params['idProyecto']);
                $query = $this->db->get();
                $result = $query->row_array();

                
            
            }else{
                
                $this->db->order_by('id_item', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        // Return fetched data
        return $result;
    }
    
    /*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
    public function insert($data = array()) {
        if(!empty($data)){
            // Add created and modified date if not included
            if(!array_key_exists("created", $data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }
    
    /*
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $condition array filter data
     */
    public function update($data,$PurchaseOrderID,$ItemId, $idProyecto ) {

        if(!empty($data)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
           
            // Update member data
            $update = $this->db->update($this->table, $data, array('PurchaseOrderID' => $PurchaseOrderID, 'id_item' => $ItemId, 'idProyecto' => $idProyecto));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }
}
?>