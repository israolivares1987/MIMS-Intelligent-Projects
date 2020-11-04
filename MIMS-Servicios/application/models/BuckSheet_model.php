<?php
class BuckSheet_model extends CI_Model{

    private $_PurchaseOrderID; 
    private $_NumeroLinea; 

    public function setPurchaseOrderID($PurchaseOrderID) {
        $this->_PurchaseOrderID = $PurchaseOrderID;
    }

    public function setNumeroLinea($NumeroLinea) {
        $this->_NumeroLinea = $NumeroLinea;
    }


    function __construct() {
        // Set table name
        $this->tableName = 'tbl_bucksheet';
    }

	function obtieneBuckSheet()
	{

    	$this->db->select(" t1.PurchaseOrderID,
        t1.purchaseOrdername,
        t1.NumeroLinea,
        t1.SupplierName,
        (select domain_desc from tbl_ref_codes where domain_id = t1.EstadoLineaBucksheet and domain = 'ESTADO_BUCKSHEET') as EstadoLineaBucksheet,
        t1.lineaActivable,
        t1.ItemST,
        t1.SubItemST,
        (select domain_desc from tbl_ref_codes where domain_id = t1.STUnidad and domain = 'UNIDAD_MEDIDA') as STUnidad,
        t1.STCantidad,
        t1.TAGNumber,
        t1.Stockcode,
        t1.Descripcion,
        t1.PlanoModelo,
        t1.Revision,
        t1.PaqueteConstruccionArea,
        t1.PesoUnitario,
        t1.PesoTotal,
        t1.FechaRAS,
        t1.DiasAntesRAS,
        t1.FechaComienzoFabricacion,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PAFCF and domain = 'ACTUAL_PREVIO ') as PAFCF,
        t1.FechaTerminoFabricacion,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFTF and domain = 'ACTUAL_PREVIO ') as PAFTF,
        t1.FechaGranallado,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFG and domain = 'ACTUAL_PREVIO ') as PAFG,
        t1.FechaPintura,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFP and domain = 'ACTUAL_PREVIO ') as PAFP, 
        t1.FechaListoInspeccion,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFLI and domain = 'ACTUAL_PREVIO ') as PAFLI, 
        t1.ActaLiberacionCalidad,
        t1.FechaSalidaFabrica,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFSF and domain = 'ACTUAL_PREVIO ') as PAFSF, 
        t1.FechaEmbarque,
        t1.PackingList,
        t1.GuiaDespacho,
        t1.SCNNumber,
        t1.UnidadesSolicitadas,
        t1.UnidadesRecibidas,
        t1.MaterialReceivedReport,
        t1.MaterialWithdrawalReport,
        t1.Origen,
        t1.DiasViaje,
        t1.TransmittalCliente,
        t1.FechaTC,
        t1.TransmittalVendor,
        t1.FechaTV,
        t1.TransmittalCF,
        t1.FechaCF,
        t1.PACF,
        t1.Observacion7"); 
    $this->db->from('tbl_bucksheet t1');			
	 $this->db->where('PurchaseOrderID',$this->_PurchaseOrderID);
	

	 return $this->db->get()->result();    
    }
    
    function obtieneBucksheetDet()
	{

        $this->db->select(" t1.PurchaseOrderID,
        t1.purchaseOrdername,
        t1.NumeroLinea,
        t1.lineaActivable,
        t1.SupplierName,
        (select domain_desc from tbl_ref_codes where domain_id = t1.EstadoLineaBucksheet and domain = 'ESTADO_BUCKSHEET') as EstadoLineaBucksheet,
        t1.ItemST,
        t1.SubItemST,
        t1.STUnidad,
        t1.STCantidad,
        t1.TAGNumber,
        t1.Stockcode,
        t1.Descripcion,
        t1.PlanoModelo,
        t1.Revision,
        t1.PaqueteConstruccionArea,
        t1.PesoUnitario,
        t1.PesoTotal,
        t1.FechaRAS,
        t1.DiasAntesRAS,
        t1.FechaComienzoFabricacion,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PAFCF and domain = 'ACTUAL_PREVIO ') as PAFCF,
        t1.FechaTerminoFabricacion,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFTF and domain = 'ACTUAL_PREVIO ') as PAFTF,
        t1.FechaGranallado,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFG and domain = 'ACTUAL_PREVIO ') as PAFG,
        t1.FechaPintura,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFP and domain = 'ACTUAL_PREVIO ') as PAFP, 
        t1.FechaListoInspeccion,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFLI and domain = 'ACTUAL_PREVIO ') as PAFLI, 
        t1.ActaLiberacionCalidad,
        t1.FechaSalidaFabrica,
        (select domain_desc from tbl_ref_codes where domain_id =  t1.PAFSF and domain = 'ACTUAL_PREVIO ') as PAFSF, 
        t1.FechaEmbarque,
        t1.PackingList,
        t1.GuiaDespacho,
        t1.SCNNumber,
        t1.UnidadesSolicitadas,
        t1.UnidadesRecibidas,
        t1.MaterialReceivedReport,
        t1.MaterialWithdrawalReport,
        t1.Origen,
        t1.DiasViaje,
        t1.TransmittalCliente,
        t1.FechaTC,
        t1.TransmittalVendor,
        t1.FechaTV,
        t1.TransmittalCF,
        t1.FechaCF,
        t1.PACF,
        t1.Observacion7"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('PurchaseOrderID',$this->_PurchaseOrderID);
     $this->db->where('NumeroLinea',$this->_NumeroLinea);
	
 return $this->db->get()->result();   
    }


    function getRows($params = array())
    {
        
        
        $this->db->select('*');
        $this->db->from($this->tableName);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();

           
        }else{
            if(array_key_exists("PurchaseOrderID", $params) && array_key_exists("NumeroLinea", $params)){

                $this->db->where('PurchaseOrderID', $params['PurchaseOrderID']);
                $this->db->where('NumeroLinea', $params['NumeroLinea']);
                $query = $this->db->get();
                $result = $query->row_array();

                
            
            }else{
                
                $this->db->order_by('NumeroLinea', 'asc');
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
            $insert = $this->db->insert($this->tableName, $data);
            
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
    public function update($data,$PurchaseOrderID,$NumeroLinea ) {

        if(!empty($data)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
           
            // Update member data
            $update = $this->db->update($this->tableName, $data, array('PurchaseOrderID' => $PurchaseOrderID, 'NumeroLinea' => $NumeroLinea));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }



    function eliminaBuckSheet($PurchaseOrderID,$numeroLinea)
	{

        $this->db->where('PurchaseOrderID', $PurchaseOrderID);
        $this->db->where('NumeroLinea', $numeroLinea);

		$delete = $this->db->delete($this->tableName);
		return $delete;
    }
    
    function obtieneNumeroLinea($PurchaseOrderID,$codEmpresa,$id_proyecto){

        $this->db->select(" IFNULL(max(NumeroLinea),0) + 1 as NumeroLinea"); 
        $this->db->from('tbl_bucksheet t1');			
        $this->db->where('PurchaseOrderID', $PurchaseOrderID);


        return $this->db->get()->result();   


    }


    public function insertOrderItem($data = array()) {

        if(!empty($data)){
            // Add created and modified date if not included
            if(!array_key_exists("created", $data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
           $this->db->insert($this->tableName, $data);
	    	return $this->db->insert_id();
        }

    }

}
?>