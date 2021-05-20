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
							getSaldoStockCode(a.cod_empresa,a.stockcode) as saldo,
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
	$this->db->where('a.id_rr_cab = b.id_rr');
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


   function obtieneCabeceraRE($numRR)
	{

	  $query = $this->db->query("SELECT id_re,
								cod_empresa,
								id_cliente,
								id_proyecto,
								descripcion_proyecto,
								area_proyecto,
								descripcion_area,
								fecha_emision,
								emisor_re,
								(select domain_desc from tbl_ref_codes where domain_id = estado_re and domain = 'ESTADO_RE') as estado_re,
								solicitante,
								identificacion_solicitante,
								cargo_solicitante,
								fecha_solicitud,
								entrega_directa,
								fecha_entrega_sitio,
								fecha_completada_usuario,
								lugar_fisico,
								estado_re_sistema
							FROM tbl_re_cabecera
							where id_re = ". $numRR);
	  $CabeceraRE = $query->result();
	  return $CabeceraRE;
	}


	function listaREDet($codEmpresa,$id_re_cab)
	{

	  $query = $this->db->query("SELECT id_re_det,
										cod_empresa,
										numero_linea_det,
										id_re_cab,
										id_rr_cab,
										id_rr_det,
										id_orden_compra,
										item_oc,
										tag_number,
										stockcode,
										descripcion,
										st_cantidad_recibida,
										st_cantidad_entregada,
										st_cantidad_saldo,
										id_bodega,
										id_patio,
										id_posicion,
										observacion,
										estado_re_det,
										observacion_exb,
										observacion_II
									FROM tbl_re_detalle
									where cod_empresa = ". $codEmpresa." 
									AND   id_re_cab = ".$id_re_cab);
	  $CabeceraRE = $query->result();
	  return $CabeceraRE;
	}	


	function actualizarCabeceraRE($data,$where)
	{
		$this->db->update('tbl_re_cabecera', $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}


	function ActualizaCabRE($data,$where)
	{
		$this->db->update('tbl_re_cabecera', $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}


	

	function obtieneREDet($codEmpresa,$id_re,$id_det_re)
	{

	  $query = $this->db->query("SELECT id_re_det,
										cod_empresa,
										numero_linea_det,
										id_re_cab,
										id_orden_compra,
										item_oc,
										tag_number,
										stockcode,
										descripcion,
										st_cantidad_recibida,
										st_cantidad_entregada,
										st_cantidad_saldo,
										id_bodega,
										id_patio,
										id_posicion,
										observacion,
										estado_re_det,
										observacion_exb,
										observacion_II
									FROM tbl_re_detalle
									where cod_empresa = ".$codEmpresa." 
									AND   id_re_cab = ".$id_re." 
								    AND   id_re_det =" .$id_det_re );
	  $CabeceraRE = $query->result();
	  return $CabeceraRE;
	}	

	function ActualizaREDet($data,$where)
	{
		$this->db->update('tbl_re_detalle', $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}

	function obtieneSaldoStockCode($codEmpresa,$stockCode)
	{

		$query = $this->db->query("SELECT getSaldoStockCode(".$codEmpresa.",'".$stockCode."') as saldo from dual");

	    $CabeceraRE = $query->result();
	    return $CabeceraRE;


	 
	}	

	function actualizarDetalleRE($data,$where)
	{
		$this->db->update($this->tabledet, $data, $where);
		$this->db->affected_rows();
		
		if ($this->db->affected_rows() > 0 ) {
			return true; // Or do whatever you gotta do here to raise an error
		} else {
			return false;
		}
	}


	function obtieneREFinal($codEmpresa,$id_cliente, $id_proyecto)
	{

	  $query = $this->db->query("SELECT id_re,
										cod_empresa,
										id_cliente,
										id_proyecto,
										descripcion_proyecto,
										area_proyecto,
										descripcion_area,
										fecha_emision,
										emisor_re,
										(select domain_desc from tbl_ref_codes where domain_id = estado_re and domain = 'ESTADO_RE') as estado_re,
										solicitante,
										identificacion_solicitante,
										cargo_solicitante,
										fecha_solicitud,
										entrega_directa,
										fecha_entrega_sitio,
										fecha_completada_usuario,
										lugar_fisico,
										estado_re_sistema
									FROM tbl_re_cabecera
									where id_cliente = ".$id_cliente."
									and id_proyecto = ".$id_proyecto."
									and estado_re = 2
									and cod_empresa = ".$codEmpresa);
	  $CabeceraRE = $query->result();
	  return $CabeceraRE;
	}


}
?>