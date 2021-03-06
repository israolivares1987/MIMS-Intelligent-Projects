<?php
class BuckSheet_model extends CI_Model{

    private $_ID_OC; 
    private $_NUMERO_DE_LINEA; 
    private $_Guia; 
    private $_idError;
    private $_codEmpresa;
    private $_PackingList;
    private $_CodigoProyecto;
    private $_CodigoCliente;

    public function setidOc($ID_OC) {
        $this->_ID_OC = $ID_OC;
    }

    public function setcodigoProyecto($CodigoProyecto) {
        $this->_CodigoProyecto = $CodigoProyecto;
    }

    public function setcodigoCliente($CodigoCliente) {
        $this->_CodigoCliente = $CodigoCliente;
    }

    public function setPackingList($PackingList) {
        $this->_PackingList = $PackingList;
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
                            t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
                            t1.NUMERO_DE_TAG,
                            t1.STOCKCODE,
                            t1.DESCRIPCION_LINEA,
                            t1.UNIDADES_SOLICITADAS,
                            t1.CANTIDAD_UNITARIA,
                            t1.CANTIDAD_TOTAL,
                            (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
                            t1.NUMERO_DE_PLANO,
                            t1.REVISION,
                            t1.PAQUETE_DE_CONSTRUCCION_AREA,
                            t1.FECHA_LINEA_BASE,
                            t1.DIAS_ANTES_LB,
                            t1.FECHA_COMIENZO_FABRICACION,
                            t1.FECHA_COMIENZO_FABRICACION_REAL,
                            t1.FECHA_TERMINO_FABRICACION,
                            t1.FECHA_TERMINO_FABRICACION_REAL,
                            t1.FECHA_GRANALLADO,
                            t1.FECHA_GRANALLADO_REAL,
                            t1.FECHA_PINTURA,
                            t1.FECHA_PINTURA_REAL,
                            t1.FECHA_LISTO_INSPECCION,
                            t1.FECHA_LISTO_INSPECCION_REAL,
                            t1.FECHA_SALIDA_FABRICA,
                            t1.FECHA_SALIDA_FABRICA_REAL,
                            t1.FECHA_EMBARQUE,
                            t1.FECHA_EMBARQUE_REAL,
                            t1.PACKINGLIST,
                            t1.GUIA_DESPACHO,
                            t1.NUMERO_DE_VIAJE,
                            t1.ORIGEN,
                            t1.DIAS_VIAJE,
                            t1.UNIDADES_RECIBIDAS,
                            t1.REPORTE_DE_RECEPCION_RR,
                            t1.REPORTE_DE_EXCEPCION_EXB,
                            t1.INSPECCION_DE_INGENIERIA,
                            t1.OBSERVACION,
                            t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
    
	

	 return $this->db->get()->result();    
    }
    


    function obtieneBuckSheetGuia()
	{
        $this->db->select("t1.ID_OC,
        t1.NUMERO_OC,
        t1.DESCRIPCION_OC,
        t1.ITEM_OC,
        t1.SUB_ITEM_OC,
        t1.PROVEEDOR,
        t1.NUMERO_DE_LINEA,
        t1.TIPO_DE_LINEA,
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        t1.FECHA_COMIENZO_FABRICACION_REAL,
        t1.FECHA_TERMINO_FABRICACION,
        t1.FECHA_TERMINO_FABRICACION_REAL,
        t1.FECHA_GRANALLADO,
        t1.FECHA_GRANALLADO_REAL,
        t1.FECHA_PINTURA,
        t1.FECHA_PINTURA_REAL,
        t1.FECHA_LISTO_INSPECCION,
        t1.FECHA_LISTO_INSPECCION_REAL,
        t1.FECHA_SALIDA_FABRICA,
       t1.FECHA_SALIDA_FABRICA_REAL,
        t1.FECHA_EMBARQUE,
        t1.FECHA_EMBARQUE_REAL,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION,
        t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('t1.GUIA_DESPACHO' , $this->_Guia);
     $this->db->where('ESTADO_DE_LINEA','5');
     $this->db->where('(length(t1.GUIA_DESPACHO) = 0 OR t1.GUIA_DESPACHO is NOT NULL)');
     $this->db->where('(length(t1.REPORTE_DE_RECEPCION_RR) = 0 OR t1.REPORTE_DE_RECEPCION_RR IS NULL)');
     

	 return $this->db->get()->result();    
    }

    function obtieneReporteDiario()
	{
        $this->db->select("t1.ID_OC,
        t1.NUMERO_OC,
        t1.DESCRIPCION_OC,
        t1.ITEM_OC,
        t1.SUB_ITEM_OC,
        t1.PROVEEDOR,
        t1.NUMERO_DE_LINEA,
        t1.TIPO_DE_LINEA,
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        t1.FECHA_COMIENZO_FABRICACION_REAL,
        t1.FECHA_TERMINO_FABRICACION,
        t1.FECHA_TERMINO_FABRICACION_REAL,
        t1.FECHA_GRANALLADO,
        t1.FECHA_GRANALLADO_REAL,
        t1.FECHA_PINTURA,
        t1.FECHA_PINTURA_REAL,
        t1.FECHA_LISTO_INSPECCION,
        t1.FECHA_LISTO_INSPECCION_REAL,
        t1.FECHA_SALIDA_FABRICA,
       t1.FECHA_SALIDA_FABRICA_REAL,
        t1.FECHA_EMBARQUE,
        t1.FECHA_EMBARQUE_REAL,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION,
        t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS,
        t3.PurchaseOrderNumber,
        t3.PurchaseOrderDescription"); 
     $this->db->from('tbl_bucksheet t1, tbl_proyectos t2, tbl_ordenes t3');			
     $this->db->where('t1.COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('t2.NumeroProyecto', $this->_CodigoProyecto) ;
     $this->db->where('t2.idCliente', $this->_CodigoCliente) ;
     $this->db->where('(length(t1.GUIA_DESPACHO) > 0)');
     $this->db->where('t2.NumeroProyecto = t3.idProyecto');
     $this->db->where('t1.id_oc = t3.PurchaseOrderID');
     $this->db->where('t3.idCliente = t2.idCliente');     
     $this->db->where('t1.COD_EMPRESA = t2.codEmpresa');
     $this->db->where('ESTADO_DE_LINEA','5');
     $this->db->where('(length(t1.REPORTE_DE_RECEPCION_RR) = 0 OR t1.REPORTE_DE_RECEPCION_RR IS NULL)');
     

	 return $this->db->get()->result();    
    }


    function obtieneBuckSheetPackingList()
	{
        $this->db->select("t1.ID_OC,
        t1.NUMERO_OC,
        t1.DESCRIPCION_OC,
        t1.ITEM_OC,
        t1.SUB_ITEM_OC,
        t1.PROVEEDOR,
        t1.NUMERO_DE_LINEA,
        t1.TIPO_DE_LINEA,
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        t1.FECHA_COMIENZO_FABRICACION_REAL,
        t1.FECHA_TERMINO_FABRICACION,
        t1.FECHA_TERMINO_FABRICACION_REAL,
        t1.FECHA_GRANALLADO,
        t1.FECHA_GRANALLADO_REAL,
        t1.FECHA_PINTURA,
        t1.FECHA_PINTURA_REAL,
        t1.FECHA_LISTO_INSPECCION,
        t1.FECHA_LISTO_INSPECCION_REAL,
        t1.FECHA_SALIDA_FABRICA,
       t1.FECHA_SALIDA_FABRICA_REAL,
        t1.FECHA_EMBARQUE,
        t1.FECHA_EMBARQUE_REAL,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION,
        t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS"); 
    $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('t1.PACKINGLIST' , $this->_PackingList);
     $this->db->where('(length(t1.GUIA_DESPACHO) > 0)');
     $this->db->where('ESTADO_DE_LINEA','5');
     $this->db->where('(length(t1.REPORTE_DE_RECEPCION_RR) = 0 OR t1.REPORTE_DE_RECEPCION_RR IS NULL)');
	
     

	 return $this->db->get()->result();    
    }


    

    function obtieneBuckSheetRRInicial()
	{
        $this->db->select("t1.NUMERO_DE_LINEA,
		t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
		t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
		(select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.CANTIDAD_TOTAL,
        t1.NUMERO_DE_PLANO,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
		t1.GUIA_DESPACHO,
        t1.PACKINGLIST,
        t1.UNIDADES_RECIBIDAS,
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_OC,
        t1.ID_OC,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        (SELECT t3.fecha_creacion 
         FROM  tbl_rr_detalle t2 , tbl_rr_cabecera t3  
         WHERE t1.id_oc = t2.id_orden_compra
		 and t1.COD_EMPRESA = t2.COD_EMPRESA
		 and t1.NUMERO_DE_LINEA = t2.numero_linea_wpanel
		 and t2.id_rr_cab = t3.id_rr
		 and t3.estado_rr in (1)
        )  AS fecha_creacion"); 
     $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     

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
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        t1.FECHA_COMIENZO_FABRICACION_REAL,
        t1.FECHA_TERMINO_FABRICACION,
        t1.FECHA_TERMINO_FABRICACION_REAL,
        t1.FECHA_GRANALLADO,
       t1.FECHA_GRANALLADO_REAL,
        t1.FECHA_PINTURA,
        t1.FECHA_PINTURA_REAL,
        t1.FECHA_LISTO_INSPECCION,
        t1.FECHA_LISTO_INSPECCION_REAL,
        t1.FECHA_SALIDA_FABRICA,
       t1.FECHA_SALIDA_FABRICA_REAL,
        t1.FECHA_EMBARQUE,
        t1.FECHA_EMBARQUE_REAL,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION,
        t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS"); 
     $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('(length(t1.GUIA_DESPACHO) > 0 AND t1.GUIA_DESPACHO IS NOT NULL)');
     $this->db->where('ESTADO_DE_LINEA','5');
     $this->db->where('(length(t1.REPORTE_DE_RECEPCION_RR) = 0 OR t1.REPORTE_DE_RECEPCION_RR IS NULL)');
	
     

	 return $this->db->get()->result();    
    }




    function obtieneBuckSheetGuiasWpanel()
	{
     
     $this->db->distinct();
     $this->db->select("t1.GUIA_DESPACHO"); 
     $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('(length(t1.GUIA_DESPACHO) > 0)');
     $this->db->where('ESTADO_DE_LINEA','5');
     $this->db->where('(length(t1.REPORTE_DE_RECEPCION_RR) = 0 OR t1.REPORTE_DE_RECEPCION_RR IS NULL)');
	
     

	 return $this->db->get()->result();    
    }


    
    function obtieneBuckSheetPackingListWpanel()
	{
     
     $this->db->distinct();
     $this->db->select("t1.PACKINGLIST"); 
     $this->db->from('tbl_bucksheet t1');			
     $this->db->where('ID_OC',$this->_ID_OC);
     $this->db->where('COD_EMPRESA',$this->_codEmpresa);
     $this->db->where('t1.TIPO_DE_LINEA','ACTIVABLE');
     $this->db->where('(length(t1.GUIA_DESPACHO) > 0)');
     $this->db->where('ESTADO_DE_LINEA','5');
     $this->db->where('(length(t1.REPORTE_DE_RECEPCION_RR) = 0 OR t1.REPORTE_DE_RECEPCION_RR IS NULL)');
	
     

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
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        t1.FECHA_COMIENZO_FABRICACION_REAL,
        t1.FECHA_TERMINO_FABRICACION,
        t1.FECHA_TERMINO_FABRICACION_REAL,
        t1.FECHA_GRANALLADO,
       t1.FECHA_GRANALLADO_REAL,
        t1.FECHA_PINTURA,
        t1.FECHA_PINTURA_REAL,
        t1.FECHA_LISTO_INSPECCION,
        t1.FECHA_LISTO_INSPECCION_REAL,
        t1.FECHA_SALIDA_FABRICA,
       t1.FECHA_SALIDA_FABRICA_REAL,
        t1.FECHA_EMBARQUE,
        t1.FECHA_EMBARQUE_REAL,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION,
        t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS"); 
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
                $this->db->where('COD_EMPRESA',$this->_codEmpresa);
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
    
    function obtieneNumeroLinea($codEmpresa,$ID_OC,$id_proyecto){

        $this->db->select(" IFNULL(max(NUMERO_DE_LINEA),0) + 1 as NumeroLinea"); 
        $this->db->from('tbl_bucksheet');			
        $this->db->where('ID_OC', $ID_OC);
        $this->db->where('COD_EMPRESA', $codEmpresa);


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
        t1.ESTADO_DE_LINEA,t1.ESTADO_AVANCE,
        t1.NUMERO_DE_TAG,
        t1.STOCKCODE,
        t1.DESCRIPCION_LINEA,
        t1.UNIDADES_SOLICITADAS,
        t1.CANTIDAD_UNITARIA,
        t1.CANTIDAD_TOTAL,
        (select domain_desc from tbl_ref_codes where domain_id = t1.UNIDAD and domain = 'UNIDAD_MEDIDA') as UNIDAD,
        t1.NUMERO_DE_PLANO,
        t1.REVISION,
        t1.PAQUETE_DE_CONSTRUCCION_AREA,
        t1.FECHA_LINEA_BASE,
        t1.DIAS_ANTES_LB,
        t1.FECHA_COMIENZO_FABRICACION,
        t1.FECHA_COMIENZO_FABRICACION_REAL,
        t1.FECHA_TERMINO_FABRICACION,
        t1.FECHA_TERMINO_FABRICACION_REAL,
        t1.FECHA_GRANALLADO,
       t1.FECHA_GRANALLADO_REAL,
        t1.FECHA_PINTURA,
        t1.FECHA_PINTURA_REAL,
        t1.FECHA_LISTO_INSPECCION,
        t1.FECHA_LISTO_INSPECCION_REAL,    
        t1.FECHA_SALIDA_FABRICA,
       t1.FECHA_SALIDA_FABRICA_REAL,
        t1.FECHA_EMBARQUE,
        t1.FECHA_EMBARQUE_REAL,
        t1.PACKINGLIST,
        t1.GUIA_DESPACHO,
        t1.NUMERO_DE_VIAJE,
        t1.ORIGEN,
        t1.DIAS_VIAJE,
        t1.UNIDADES_RECIBIDAS,
        t1.REPORTE_DE_RECEPCION_RR,
        t1.REPORTE_DE_EXCEPCION_EXB,
        t1.INSPECCION_DE_INGENIERIA,
        t1.OBSERVACION,
        t1.CODIGO_CONTROL_PROYECTO,
                            t1.FECHA_RAS,
                            t1.FECHA_ETA,
                            t1.COMENTARIOS"); 
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