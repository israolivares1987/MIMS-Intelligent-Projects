<?php
class BuckSheet_model extends CI_Model{

    private $_ID_OC; 
    private $_NUMERO_DE_LINEA; 
    private $_Guia; 
    private $_idError;
    private $_codEmpresa;

    public function setidOc($ID_OC) {
        $this->_ID_OC = $ID_OC;
    }

    public function setNumeroLinea($NUMERO_DE_LINEA) {
        $this->_NUMERO_DE_LINEA = $NUMERO_DE_LINEA;
    }

    public function setGuia($Guia) {
        $this->_Guia = $Guia;
    }

    public function setidError($idError) {
        $this->_idError = $idError;
    }

    public function setcodEmpresa($codEmpresa) {
        $this->_codEmpresa = $codEmpresa;
    }


    function __construct() {
        // Set table name
        $this->tableName = 'tbl_bucksheet';
        $this->tableNameError = 'tbl_bucksheet_error';
        
    }

	function obtieneBuckSheet()
	{

    	$this->db->select("t1.ID_OC,
                            t1.NUMERO_OC,
                            t1.DESCRIPCION_OC,
                            t1.ITEM_OC,
                            t1.SUB_ITEM_OC,
                            t1.PROVEEDOR,
                            t1.NUMERO_DE_LINEA,
                            t1.TIPO_DE_LINEA,
                            t1.ESTADO_DE_LINEA,
                            t1.NUMERO_DE_TAG,
                            t1.STOCKCODE,
                            t1.DESCRIPCION_LINEA,
                            t1.NUMERO_DE_ELEMENTOS,
                            t1.CANTIDAD_UNITARIA,
                            t1.CANTIDAD_TOTAL,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
                            t1.TRANSMITTAL_CLIENTE,
                            t1.FECHA_TC,
                            t1.TRANSMITTAL_PROVEEDOR,
                            t1.FECHA_TP,
                            t1.TRANSMITTAL_CLIENTE_FINAL,
                            t1.FECHA_TCF,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_TCF and domain = 'ACTUAL_PREVIO ') as PA_TCF,
                            t1.NUMERO_DE_PLANO,
                            t1.REVISION,
                            t1.PAQUETE_DE_CONSTRUCCION_AREA,
                            t1.FECHA_LINEA_BASE,
                            t1.DIAS_ANTES_LB,
                            t1.FECHA_COMIENZO_FABRICACION,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FCF and domain = 'ACTUAL_PREVIO ') as PA_FCF,
                            t1.FECHA_TERMINO_FABRICACION,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FTF and domain = 'ACTUAL_PREVIO ') as PA_FTF,
                            t1.FECHA_GRANALLADO,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FG and domain = 'ACTUAL_PREVIO ') as PA_FG,
                            t1.FECHA_PINTURA,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FP and domain = 'ACTUAL_PREVIO ') as PA_FP,
                            t1.FECHA_LISTO_INSPECCION,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FLI and domain = 'ACTUAL_PREVIO ') as PA_FLI,
                            t1.ACTA_LIBERACION_CALIDAD,
                            t1.FECHA_SALIDA_FABRICA,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FSF and domain = 'ACTUAL_PREVIO ') as PA_FSF,
                            t1.FECHA_EMBARQUE,
                            t1.PACKINGLIST,
                            t1.GUIA_DESPACHO,
                            t1.NUMERO_DE_VIAJE,
                            t1.ORIGEN,
                            t1.DIAS_VIAJE,
                            t1.UNIDADES_SOLICITADAS,
                            t1.UNIDADES_RECIBIDAS,
                            t1.REPORTE_DE_RECEPCION_RR,
                            t1.REPORTE_DE_ENTREGA_RE,
                            t1.REPORTE_DE_EXCEPCION_EXB,
                            t1.INSPECCION_DE_INGENIERIA,
                            t1.OBSERVACION"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
    
	

	 return $this->db->get()->result();    
    }
    


    function obtieneBuckSheetBodega()
	{
        $this->db->select("t1.ID_OC,
        t1.NUMERO_OC,
        t1.DESCRIPCION_OC,
        t1.ITEM_OC,
        t1.SUB_ITEM_OC,
        t1.PROVEEDOR,
        t1.NUMERO_DE_LINEA,
        t1.TIPO_DE_LINEA,
        t1.ESTADO_DE_LINEA,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.NUMERO_DE_ELEMENTOS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.TRANSMITTAL_CLIENTE,
        t1.FECHA_TC,
        t1.TRANSMITTAL_PROVEEDOR,
        t1.FECHA_TP,
        t1.TRANSMITTAL_CLIENTE_FINAL,
        t1.FECHA_TCF,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_TCF and domain = 'ACTUAL_PREVIO ') as PA_TCF,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FCF and domain = 'ACTUAL_PREVIO ') as PA_FCF,
        t1.FECHA_TERMINO_FABRICACION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FTF and domain = 'ACTUAL_PREVIO ') as PA_FTF,
        t1.FECHA_GRANALLADO,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FG and domain = 'ACTUAL_PREVIO ') as PA_FG,
        t1.FECHA_PINTURA,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FP and domain = 'ACTUAL_PREVIO ') as PA_FP,
        t1.FECHA_LISTO_INSPECCION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FLI and domain = 'ACTUAL_PREVIO ') as PA_FLI,
        t1.ACTA_LIBERACION_CALIDAD,
        t1.FECHA_SALIDA_FABRICA,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FSF and domain = 'ACTUAL_PREVIO ') as PA_FSF,
        t1.FECHA_EMBARQUE,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_SOLICITADAS,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_ENTREGA_RE,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('t1.GUIADESPACHO' , $this->_Guia);
	
     

	 return $this->db->get()->result();    
    }



    function obtieneBuckSheetGuias()
	{
     
     $this->db->distinct();
     $this->db->select("t1.GUIADESPACHO"); 
     $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('t1.GUIADESPACHO' , $this->_Guia);
	
     

	 return $this->db->get()->result();    
    }

    function obtieneBucksheetDet()
	{

        $this->db->select("t1.ID_OC,
        t1.NUMERO_OC,
        t1.DESCRIPCION_OC,
        t1.ITEM_OC,
        t1.SUB_ITEM_OC,
        t1.PROVEEDOR,
        t1.NUMERO_DE_LINEA,
        t1.TIPO_DE_LINEA,
        t1.ESTADO_DE_LINEA,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.NUMERO_DE_ELEMENTOS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.TRANSMITTAL_CLIENTE,
        t1.FECHA_TC,
        t1.TRANSMITTAL_PROVEEDOR,
        t1.FECHA_TP,
        t1.TRANSMITTAL_CLIENTE_FINAL,
        t1.FECHA_TCF,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_TCF and domain = 'ACTUAL_PREVIO ') as PA_TCF,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FCF and domain = 'ACTUAL_PREVIO ') as PA_FCF,
        t1.FECHA_TERMINO_FABRICACION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FTF and domain = 'ACTUAL_PREVIO ') as PA_FTF,
        t1.FECHA_GRANALLADO,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FG and domain = 'ACTUAL_PREVIO ') as PA_FG,
        t1.FECHA_PINTURA,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FP and domain = 'ACTUAL_PREVIO ') as PA_FP,
        t1.FECHA_LISTO_INSPECCION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FLI and domain = 'ACTUAL_PREVIO ') as PA_FLI,
        t1.ACTA_LIBERACION_CALIDAD,
        t1.FECHA_SALIDA_FABRICA,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FSF and domain = 'ACTUAL_PREVIO ') as PA_FSF,
        t1.FECHA_EMBARQUE,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_SOLICITADAS,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_ENTREGA_RE,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('NUMERO_DE_LINEA',$this->_NUMERO_DE_LINEA);
	
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
            if(array_key_exists("ID_OC", $params) && array_key_exists("NUMERO_DE_LINEA", $params)){

                $this->db->where('ID_OC', $params['ID_OC']);
                $this->db->where('NUMERO_DE_LINEA', $params['NUMERO_DE_LINEA']);
                $query = $this->db->get();
                $result = $query->row_array();

                
            
            }else{
                
                $this->db->order_by('NUMERO_DE_LINEA', 'asc');
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
    public function update($data,$codEmpresa,$ID_OC,$NUMERO_DE_LINEA ) {

        if(!empty($data)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
           
            // Update member data
            $update = $this->db->update($this->tableName, $data, array('COD_EMPRESA' => $codEmpresa, 'ID_OC' => $ID_OC, 'NUMERO_DE_LINEA' => $NUMERO_DE_LINEA));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }



    function eliminaBuckSheet($codEmpresa,$ID_OC,$NUMERO_DE_LINEA)
	{

        $this->db->where('ID_OC', $ID_OC);
        $this->db->where('NUMERO_DE_LINEA', $NUMERO_DE_LINEA);
        $this->db->where('COD_EMPRESA', $codEmpresa);

		$delete = $this->db->delete($this->tableName);
		return $delete;
    }
    
    function obtieneNumeroLinea($PurchaseOrderID,$codEmpresa,$id_proyecto){

        $this->db->select(" IFNULL(max(NUMERO_DE_LINEA),0) + 1 as NumeroLinea"); 
        $this->db->from('tbl_bucksheet t1');			
        $this->db->where('ID_OC', $ID_OC);


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

    function obtieneBuckSheetError()
	{

        $this->db->select(" t1.ID_ERROR,
        t1.MENSAJE_ERROR,
        t1.ID_OC,
        t1.NUMERO_OC,
        t1.DESCRIPCION_OC,
        t1.ITEM_OC,
        t1.SUB_ITEM_OC,
        t1.PROVEEDOR,
        t1.NUMERO_DE_LINEA,
        t1.TIPO_DE_LINEA,
        t1.ESTADO_DE_LINEA,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.NUMERO_DE_ELEMENTOS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.TRANSMITTAL_CLIENTE,
        t1.FECHA_TC,
        t1.TRANSMITTAL_PROVEEDOR,
        t1.FECHA_TP,
        t1.TRANSMITTAL_CLIENTE_FINAL,
        t1.FECHA_TCF,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_TCF and domain = 'ACTUAL_PREVIO ') as PA_TCF,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FCF and domain = 'ACTUAL_PREVIO ') as PA_FCF,
        t1.FECHA_TERMINO_FABRICACION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FTF and domain = 'ACTUAL_PREVIO ') as PA_FTF,
        t1.FECHA_GRANALLADO,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FG and domain = 'ACTUAL_PREVIO ') as PA_FG,
        t1.FECHA_PINTURA,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FP and domain = 'ACTUAL_PREVIO ') as PA_FP,
        t1.FECHA_LISTO_INSPECCION,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FLI and domain = 'ACTUAL_PREVIO ') as PA_FLI,
        t1.ACTA_LIBERACION_CALIDAD,
        t1.FECHA_SALIDA_FABRICA,
        (select domain_desc from tbl_ref_codes where domain_id = t1.PA_FSF and domain = 'ACTUAL_PREVIO ') as PA_FSF,
        t1.FECHA_EMBARQUE,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_SOLICITADAS,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_ENTREGA_RE,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION"); 
    $this->db->from('tbl_bucksheet_error t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('ID_ERROR', $this->_idError);
	

	 return $this->db->get()->result();    
    }



    public function insertError($data = array()) {
        if(!empty($data)){
           
            $insert = $this->db->insert($this->tableNameError, $data);
            
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }

}
?>