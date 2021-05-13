<?php
class ReporteEntrega_model extends CI_Model{



	function listaRRDetForRE($codEmpresa,$codigoCliente,$codigoProyecto,$orden,$sku,$proveedor,$tagnumber,$descripcion)
	{

		$this->db->select('a.id_rr_det,
							a.cod_empresa,
							a.numero_linea_det,
							a.numero_linea_wpanel,
							a.id_rr_cab,
							a.id_orden_compra,
							a.item_oc,
							a.tag_number,
							a.stockcode,
							a.descripcion,
							a.id_orden_cliente,
							a.packing_list,
							a.guia_despacho,
							a.numero_viaje,
							a.st_cantidad,
							a.st_cantidad_recibida,
							a.id_bodega,
							a.id_carpa,
							a.id_patio,
							a.id_posicion,
							a.observacion,
							a.observacion_exb,
							a.inspeccion_requerida,
							a.estado_rr_det');
	$this->db->from('tbl_rr_detalle a , tbl_rr_cabecera b');
	$this->db->where('a.cod_empresa =' .$codEmpresa);
	$this->db->where('a.estado_rr_det',1);
	$this->db->where('a.cod_empresa = b.cod_empresa');
	$this->db->where('a.id_orden_cliente = b.id_orden_cliente');
	$this->db->where('b.estado_rr',1);
	$this->db->where('a.re_generada',0);
	$this->db->where('b.id_cliente ='.$codigoCliente);
	$this->db->where('b.id_proyecto ='.$codigoProyecto);


	if(strlen($orden) > 0 ){

		$this->db->where('b.id_orden_cliente', $orden);
	}	

	if(strlen($sku) > 0 ){
	
		$this->db->where('a.stockcode',$sku);
	}

	if(strlen($proveedor) > 0){
	
		$this->db->where('b.proveedor',$proveedor);
	}

	if(strlen($tagnumber) > 0){
	
		$this->db->where('a.tag_number',$tagnumber);
	}

	if(strlen($descripcion) > 0 ){
	
		$this->db->where('a.descripcion',$descripcion);
	}


    $query = $this->db->get();
			
	return $query->result();
	 
	}	



   function obtieneOrdenesRE($codEmpresa,$id_proyecto,$id_clientes){

	$this->db->distinct();
	$this->db->select('b.id_orden_cliente as filtro');
	$this->db->from('tbl_rr_detalle a , tbl_rr_cabecera b');
	$this->db->where('a.cod_empresa ',$codEmpresa);
	$this->db->where('a.estado_rr_det',1);
	$this->db->where('a.cod_empresa = b.cod_empresa');
	$this->db->where('b.estado_rr',1);
	$this->db->where('a.re_generada',0);
	$this->db->where('a.id_orden_cliente = b.id_orden_cliente');
	$this->db->where('b.id_cliente',$id_clientes);
	$this->db->where('b.id_proyecto',$id_proyecto);

    $query = $this->db->get();
			
	return $query->result();

   }


   function obtieneSkuRE($codEmpresa,$id_proyecto,$id_clientes){

	$this->db->distinct();
	$this->db->select('a.stockcode as filtro');
	$this->db->from('tbl_rr_detalle a , tbl_rr_cabecera b');
	$this->db->where('a.cod_empresa ',$codEmpresa);
	$this->db->where('a.estado_rr_det',1);
	$this->db->where('a.cod_empresa = b.cod_empresa');
	$this->db->where('b.estado_rr',1);
	$this->db->where('a.re_generada',0);
	$this->db->where('a.id_orden_cliente = b.id_orden_cliente');
	$this->db->where('b.id_cliente',$id_clientes);
	$this->db->where('b.id_proyecto',$id_proyecto);

    $query = $this->db->get();
			
	return $query->result();

   }


   function obtieneProveedorRE($codEmpresa,$id_proyecto,$id_clientes){

	$this->db->distinct();
	$this->db->select('b.proveedor as filtro');
	$this->db->from('tbl_rr_detalle a , tbl_rr_cabecera b');
	$this->db->where('a.cod_empresa ',$codEmpresa);
	$this->db->where('a.estado_rr_det',1);
	$this->db->where('a.cod_empresa = b.cod_empresa');
	$this->db->where('b.estado_rr',1);
	$this->db->where('a.re_generada',0);
	$this->db->where('a.id_orden_cliente = b.id_orden_cliente');
	$this->db->where('b.id_cliente',$id_clientes);
	$this->db->where('b.id_proyecto',$id_proyecto);

    $query = $this->db->get();
			
	return $query->result();

   }

   function obtieneTagNumberRE($codEmpresa,$id_proyecto,$id_clientes){

	$this->db->distinct();
	$this->db->select('a.tag_number as filtro');
	$this->db->from('tbl_rr_detalle a , tbl_rr_cabecera b');
	$this->db->where('a.cod_empresa ',$codEmpresa);
	$this->db->where('a.estado_rr_det',1);
	$this->db->where('a.cod_empresa = b.cod_empresa');
	$this->db->where('b.estado_rr',1);
	$this->db->where('a.re_generada',0);
	$this->db->where('a.id_orden_cliente = b.id_orden_cliente');
	$this->db->where('b.id_cliente',$id_clientes);
	$this->db->where('b.id_proyecto',$id_proyecto);

    $query = $this->db->get();
			
	return $query->result();

   }
   
   function obtieneDescripcionRE($codEmpresa,$id_proyecto,$id_clientes){

	$this->db->distinct();
	$this->db->select('a.descripcion as filtro');
	$this->db->from('tbl_rr_detalle a , tbl_rr_cabecera b');
	$this->db->where('a.cod_empresa ',$codEmpresa);
	$this->db->where('a.estado_rr_det',1);
	$this->db->where('a.cod_empresa = b.cod_empresa');
	$this->db->where('b.estado_rr',1);
	$this->db->where('a.re_generada',0);
	$this->db->where('a.id_orden_cliente = b.id_orden_cliente');
	$this->db->where('b.id_cliente',$id_clientes);
	$this->db->where('b.id_proyecto',$id_proyecto);

    $query = $this->db->get();
			
	return $query->result();

   }  


   function agregarRE($data)
   {
	   $this->db->insert('tbl_re_cabecera', $data);
	   return $this->db->insert_id();
   }



   function agregarREDet($data)
   {
	   $this->db->insert('tbl_re_detalle', $data);
	   return $this->db->insert_id();
   }

}
?>