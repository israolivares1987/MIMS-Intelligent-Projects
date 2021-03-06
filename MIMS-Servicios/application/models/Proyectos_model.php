<?php
class Proyectos_model extends CI_Model{

	function obtieneProyectos($idCliente){

		$this->db->select('t1.idCliente AS idCliente,
						   t1.NumeroProyecto AS codigo_proyecto,
						   t1.DescripcionProyecto AS descripcion_proyecto,
						   t2.domain_desc AS estado_proyecto,
						   t1.id_bodega as id_bodega,
						   t1.id_carpa as id_carpa,
						   t1.id_patio as id_patio,
						   t1.id_posicion as id_posicion');
		$this->db->from('tbl_proyectos t1, tbl_ref_codes t2');				   
		$this->db->where('idCliente',$idCliente);
		$this->db->where('estadoProyecto',1);
		$this->db->where('t1.estadoProyecto = t2.domain_id');
		$this->db->where('t2.domain = "ESTADO_PROYECTO"');
        
        return $this->db->get()->result();	

	}

	function count_all_Proyectos($idCliente){

		$this->db->where('idCliente',$idCliente);
		$this->db->where('estadoProyecto',1);
        $Proyectoa = $this->db->get('tbl_proyectos');
        
        return $this->db->count_all_results();	

	}


	function obtieneProyectosCliente($idCliente){
		
		$this->db->select('t1.NumeroProyecto AS NumeroProyecto,
						   t1.NombreProyecto AS NombreProyecto,
						   t1.DescripcionProyecto AS DescripcionProyecto,
						   t1.Lugar AS Lugar,
						   t2.domain_desc AS estadoProyecto,
						   t1.idCliente as idCliente,
						   t1.id_bodega as id_bodega,
						   t1.id_carpa as id_carpa,
						   t1.id_patio as id_patio,
						   t1.id_posicion as id_posicion');
		$this->db->from('tbl_proyectos t1,
						 tbl_ref_codes t2');				   
		$this->db->where('idCliente',$idCliente);
		$this->db->where('t1.estadoProyecto = t2.domain_id');
		$this->db->where('t2.domain = "ESTADO_PROYECTO"');

		$Proyectos = $this->db->get();
		
		return $Proyectos->result();

	}

	function guardaProyecto($data = array()){

		$insert = $this->db->insert('tbl_proyectos', $data);

		return $insert;

	}

	function guardaOrden($data){

		$insert = $this->db->insert('tbl_purchase_orders', $data);

		return $insert;

	}

	function actualizaOrden($data){

		$this->db->where('codEmpresa', $data['codEmpresa']);
		$this->db->where('idCliente', $data['idCliente']);
		$this->db->where('idProyecto', $data['idProyecto']);
		$this->db->where('PurchaseOrderID', $data['PurchaseOrderID']);

		$query = $this->db->update('tbl_purchase_orders',$data);


		return $query;

	}

	function obtieneProyectoById($id, $id_cliente){

		$this->db->select(' t2.nombreCliente as nombre_cliente ,
							t1.NumeroProyecto as id_proyecto,t1.NombreProyecto as NombreProyecto,
							t1.DescripcionProyecto AS DescripcionProyecto,
							t1.Lugar as Lugar,
							t1.estadoProyecto AS estado_proyecto,
							t3.domain_id AS domain_id,
							t3.domain_desc AS domain_desc,
							t1.id_bodega as id_bodega,
							t1.id_carpa as id_carpa,
							t1.id_patio as id_patio,
							t1.id_posicion as id_posicion');
		$this->db->from('tbl_proyectos t1,
						 tbl_clientes  t2,
						 tbl_ref_codes t3');
		
		$this->db->where('t1.NumeroProyecto', $id);
		$this->db->where('t1.idCliente', $id_cliente);
		$this->db->where('t1.idCliente = t2.idCliente');
		$this->db->where('t1.estadoProyecto = t3.domain_id');
		$this->db->where('t3.domain = "ESTADO_PROYECTO"');
		
		$query = $this->db->get();

		return $query->result();

	}

	function obtieneOrderById($id_order,$id_proyecto,$id_cliente,$codEmpresa){

		$this->db->from('tbl_purchase_orders t1');
		$this->db->where('t1.codEmpresa', $codEmpresa);
		$this->db->where('t1.idCliente', $id_cliente);
		$this->db->where('t1.idProyecto', $id_proyecto);
		$this->db->where('t1.PurchaseOrderID', $id_order);

		$query = $this->db->get();

		

		return $query->result();

	}




	function actualizaProyecto($up, $id_cliente, $id_proyecto,$cod_empresa){

		$this->db->where('idCliente', $id_cliente);
		$this->db->where('NumeroProyecto', $id_proyecto);
		$this->db->where('codEmpresa', $cod_empresa);

		$query = $this->db->update('tbl_proyectos',$up);


		return $query;

	}

	function eliminaProyecto($id_cliente, $id_proyecto,$cod_empresa){

		$this->db->where('idCliente', $id_cliente);
		$this->db->where('NumeroProyecto', $id_proyecto);
		$this->db->where('codEmpresa', $cod_empresa);

		$delete = $this->db->delete('tbl_proyectos');


		return $delete;

	}

	function eliminaOrden($id_cliente, $id_proyecto,$cod_empresa,$orden){

		$this->db->where('idCliente', $id_cliente);
		$this->db->where('idProyecto', $id_proyecto);
		$this->db->where('codEmpresa', $cod_empresa);
		$this->db->where('PurchaseOrderID', $orden);

		$delete = $this->db->delete('tbl_purchase_orders');


		return $delete;

	}
	
}
?>