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

		$this->db->select('c.*');
        $this->db->from($this->tableName . ' as c');
		$this->db->where('c.PurchaseOrderID', $this->_PurchaseOrderID);
	
		$query = $this->db->get();

	  $BuckSheet = $query->result();
	  return $BuckSheet;
    }
    
    function obtieneBucksheetDet()
	{

		$this->db->select('c.*');
        $this->db->from($this->tableName . ' as c');
        $this->db->where('c.PurchaseOrderID', $this->_PurchaseOrderID);
        $this->db->where('c.NumeroLinea', $this->_NumeroLinea);
	
		$query = $this->db->get();
    
	  return $query->result();
    }


	function count_all_BuckSheet()
	{
		$this->db->select('c.*');
        $this->db->from($this->tableName . ' as c');
		$this->db->where('c.PurchaseOrderID', $this->_PurchaseOrderID);
		
	  return $this->db->count_all_results();
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

}
?>