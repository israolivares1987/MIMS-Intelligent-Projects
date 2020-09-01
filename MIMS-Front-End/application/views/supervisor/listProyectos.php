<div class="content-wrapper">
   
    <div class="col-lg-12">
            <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                      <i class="fas fa-user-tie"></i>
                        Cliente
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="form-group">
                      <label>Seleccione cliente</label>
                      <?php echo $select_clientes;?>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>

            </div>

    <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                      <i class="fas fa-clipboard-list"></i>
                        Proyectos
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <table class="table" cellspacing="0" width="99%">
                                <tbody>
                                    <tr>
                                        <th>
                                        <button style="display: none;" id="btn_nuevo_proyecto" class="btn btn-outline-primary float-right mb-3">Nuevo Proyecto</button>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                            <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Nombre Proyecto</th>
                                        <th>Descripcion Proyecto</th>
                                        <th>Lugar</th>
                                        <th>Estado Proyecto</th>
                                    </tr>
                                </thead>
                                <tbody id="datos_proyectos">
                                </tbody>
                            </table>
                      </div>
             
                    <!-- /.card-body -->
            </div>
            
    <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" id="titulo_ordenes">
                        <i class="fas fa-clipboard-list"></i>
                        Ordenes de Compra Proyecto
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
							   <table class="table" cellspacing="0" width="99%">
								   <tbody>
									   <tr>
										   <th>
										   <button style="display: none;" id="btn_nueva_orden" class="btn btn-outline-primary float-right mb-3">Nueva orden</button>
										   </th>
									   </tr>
								   </tbody>
							   </table>
								<table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0" width=100%>
						 
							  <thead>
								  <tr>
								  <th>Acciones</th>
								  <th>Orden ID</th>
								  <th>Orden Number</th>
                  <th>Categorizacion</th>
								  <th>Orden Description</th>
                  <th>Revision</th>
                  <th>Nombre Cliente</th>
								  <th>Nombre Proveedor</th>
								  <th>Activador</th>
								  <th>Generador de Compra</th>
								  <th>Moneda</th>
								  <th>Valor Neto</th>
								  <th>Valor Total</th>
								  <th>Presupuesto</th>
								  <th>Codigo Presupuesto</th>
								  <th>Fecha Orden</th>
								  <th>Fecha Requerida</th>
								  <th>Fecha de cierre</th>
								  <th>Metodo Envio</th>
								  <th>Fecha Orden Creada</th>
								  <th>Estado</th>
								  <th>Archivo</th>	
								  </tr>
							  </thead>
							  <tbody id="datos_ordenes">
								
							  </tbody>
							  
						  </table>

                  <input type="hidden" id="flag_orden">
                    </div>
                    <!-- /.card-body -->
                  </div>

                </div>
                

     <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-clipboard-list"></i>
                        Items Orden
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
						   <table class="table" cellspacing="0" width="99%">
							   <tbody>
								   <tr>
									   <th>
                     <button style="display: none;" id="btn_archivo_ejemplo" class="btn btn-outline-primary float-right mb-3">Archivo Ejemplo</button>
									   </th>
								   </tr>
							   </tbody>
						   </table>
						   <table id="tbl_ordenes_items" class="table table-striped table-bordered" cellspacing="0" width=100%>
                      <thead>
                        <tr>                          
						  <th>Orden ID</th>
						  <th>Item ID</th>
						  <th>Descripcion</th>
						  <th>Revision</th>
						  <th>Unidad</th>
						  <th>Cantidad</th>
						  <th>Precio Unitario</th>
						  <th>Valor Neto</th>
						  <th>Estado</th>	
					  </tr>
                     </thead>
                      <tbody id="datos_ordenes_items">
                      </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                  </div>

   </div>

      <script>
             $(function() {
                 

                 //Datemask dd-mm-yyyy
                 $('#datemask').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
                 })
                 //Datemask2 mm/dd/yyyy
                 $('#datemask2').inputmask('mm/dd/yyyy', {
                     'placeholder': 'mm/dd/yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()



             })
             </script>


      <style type="text/css" class="init">
    /* Ensure that the demo table scrolls */
    th,
    td {
        white-space: nowrap;
    }

    div.dataTables_wrapper {
        margin: 0 auto;
    }

    tr {
        height: 50px;
    }
    </style>
<script>
  $(function () {

    //Datemask dd-mm-yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>


<script type="text/javascript">

$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function() { 



    recargaProyectos(0);
    recargaOrdenes(0,0,'');
    recargaItemOrdenes(0, 0, 0,'');
   // recargaCalidadDet(0, 0, 0);


    

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });


});


function mostrarBlock(){
		$.blockUI({ 
			message: '<h5><img style=\"width: 12px;\" src="<?php echo base_url('assets/dist/img/loader.gif');?>" />&nbsp;Espere un momento...</h5>',
			css:{
				backgroundColor: '#0063BE',
				opacity: .8,
				'-webkit-border-radius': '10px', 
	            '-moz-border-radius': '10px',
	            color: '#fff'
			}
		});
	}


function listar_ordenes(id_proyecto,id_cliente,nombre_proyecto){  
  
  $('#flag_orden').val(1); 
  recargaItemOrdenes(0, 0, 0,'');
  recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto);

}


$('#select_clientes').on('change', function(){

    var cliente = this.value;


    if(cliente > 0){

      recargaOrdenes(0,0,'');
      recargaItemOrdenes(0, 0, 0,'');
      recargaProyectos(cliente);

      


    }else{
      recargaOrdenes(0,0,'');
      recargaItemOrdenes(0, 0, 0,'');
      $('#flag_orden').val(0);
      $('#datos_proyectos').html('<td class="text-center" colspan="5">No hay datos disponibles en la tabla.</td>');
    }

});







function recargaProyectos(cliente){

    var proyectos_html ='';

    var id_proyecto ;
      var nombre_proyecto;
    var tabla_proyecto =  $('#tbl_proyectos').DataTable();

    tabla_proyecto.destroy();

    $.ajax({
      url: 		'<?php echo base_url('index.php/Proyectos/listProyectosCliente'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              cliente: cliente
            },
    }).done(function(result) {

      $.each(result.proyectos,function(key, proyecto) {
        proyectos_html += '<tr>';
        proyectos_html += '<td>';
          proyectos_html += '<button data-nombre="'+ proyecto.NombreProyecto +'" data-toggle="tooltip" data-placement="left" title="Listar ordenes" onclick="listar_ordenes('+ proyecto.NumeroProyecto +','+ cliente +',\''+proyecto.NombreProyecto+'\', this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
          proyectos_html += '</td>';
        proyectos_html += '<td>' + proyecto.NombreProyecto + '</td>';
        proyectos_html += '<td>' + proyecto.DescripcionProyecto + '</td>';
        proyectos_html += '<td>' + proyecto.Lugar + '</td>';
        if(proyecto.estadoProyecto ==='ACTIVO'){
            proyectos_html += '<td><span class="bg-green">'+ proyecto.estadoProyecto +'</span></td>';    
        }else{
            proyectos_html += '<td><span class="bg-red">'+ proyecto.estadoProyecto +'</span></td>';
        }
         
        proyectos_html += '</tr>';

        id_proyecto = proyecto.NumeroProyecto;
        nombre_proyecto = proyecto.NombreProyecto;

      });
        $('#datos_proyectos').html(proyectos_html);
        $('[data-toggle="tooltip"]').tooltip();

        $('#tbl_proyectos').DataTable({
          language: {
              url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js'); ?>'	
          },
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
       //   "responsive": true,
          "scrollY": "600px",
          "scrollX": true,
          "scrollCollapse": true
      });

    }).fail(function() {
      console.log("error change cliente");
    })

    $('#flag_orden').val(0);


}



function recargaControlCalidad(id_cliente ,id_proyecto,id_orden){

  var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

    $.ajax({
        url: '<?php echo base_url('index.php/ControlCalidad/obtieneControlCalidad');?>',
        type: 'POST',
        dataType: 'json',
        data: {
          codEmpresa: cod_empresa,
          id_cliente :id_cliente,
          id_proyecto : id_proyecto,
          id_orden : id_orden
        },
    }).done(function(result) {

        
      dato_calidad_html = '<select class="form-control" id="select_cc" name="select_cc">';
      
      $.each(result.datos_calidad, function(key, dato_calidad) {
            
            dato_calidad_html += '<option value='+dato_calidad.id_control_calidad + '>'+dato_calidad.descripcion_control_calidad+'</option>';
                                                
        });

        dato_calidad_html += '</select>';


    $('#cc_select').html(dato_calidad_html);

    recargaCalidadDet(id_orden,id_cliente,id_proyecto);

    }).fail(function() {
        console.log("error listar CC");
    })

}










function listar_item_ordenes(orden_id, id_cliente, id_proyecto, nombre_orden ) {

recargaItemOrdenes(orden_id, id_cliente, id_proyecto, nombre_orden);

}

$('#btn_archivo_ejemplo').on('click', function(){

  window.open('<?php echo base_url('assets/'.$nombreArchivoEjemploItem);?>', '_blank');

});



function recargaItemOrdenes(orden_id, id_cliente, id_proyecto, nombre_orden) {

var ordenes_item_html = '';
var tabla_ordenes = $('#tbl_ordenes_items').DataTable();

tabla_ordenes.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/OrdenesItem/obtieneItemOrdenes');?>',
    type: 'POST',
    dataType: 'json',
    data: {
        idOrden: orden_id,
        idCliente: id_cliente,
        idProyecto: id_proyecto
    },
}).done(function(result) {

    console.log(result);
    
   
    $.each(result.ordenes_item, function(key, orden_item) {
        ordenes_item_html += '<tr>';
        ordenes_item_html += '<td>' + orden_item.PurchaseOrderID + '</td>';
        ordenes_item_html += '<td>' + orden_item.id_item + '</td>';
        ordenes_item_html += '<td>' + orden_item.descripcion + '</td>';
        ordenes_item_html += '<td>' + orden_item.revision + '</td>';
        ordenes_item_html += '<td>' + orden_item.unidad + '</td>';
        ordenes_item_html += '<td>' + orden_item.cantidad + '</td>';
        ordenes_item_html += '<td>' + orden_item.precio_unitario + '</td>';
        ordenes_item_html += '<td>' + orden_item.valor_neto + '</td>';

        if(orden_item.estado ==='ACTIVO'){
            ordenes_item_html += '<td><span class="bg-green">'+ orden_item.estado +'</span></td>';    
        }else{
            ordenes_item_html += '<td><span class="bg-red">'+ orden_item.estado +'</span></td>';
        }
        ordenes_item_html += '</tr>';

                                            
    });

    $('#datos_ordenes_items').html(ordenes_item_html);

     
    $('[data-toggle="tooltip"]').tooltip();

    $('#tbl_ordenes_items').DataTable({
        "searching": false,
        language: {
            url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
        },
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        //"responsive": true,
        "scrollY": "600px",
        "scrollX": true,
        "scrollCollapse": true
    });


}).fail(function() {
    console.log("error listar_ordenes");
})


}

function recargaCalidadDet(id_orden,id_cliente,id_proyecto){


  var calidad_det_html ='';
  var tabla_calidad_det =  $('#tbl_control_calidad').DataTable();
  var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

  tabla_calidad_det.destroy();

$.ajax({
  url: 		'<?php echo base_url('index.php/ControlCalidadDet/obtieneControlCalidadDet'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
          id_orden : id_orden,
          id_cliente : id_cliente,
          id_proyecto : id_proyecto,
          cod_empresa : cod_empresa

        },
}).done(function(result) {

  $.each(result.datos_calidad_det,function(key, dato_calidad_det) {
    calidad_det_html += '<tr>';
    calidad_det_html += '<td>' + id_orden+ '</td>';
    calidad_det_html += '<td>' + dato_calidad_det.id_control_calidad + '</td>';
    calidad_det_html += '<td>' + dato_calidad_det.descripcion_control_calidad + '</td>';
    calidad_det_html += '</tr>';

  });
    

    $('#datos_control_calidad').html(calidad_det_html);

    $('#tbl_control_calidad').DataTable({
      language: {
          url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js'); ?>'	
      },
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
   //   "responsive": true,
      "scrollY": "300px",
      "scrollX": true,
      "scrollCollapse": true
  });

}).fail(function() {
  console.log("error change ccdet");
})


}



function recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto){

  var ordenes_html ='';
  var tabla_ordenes =  $('#ListOrdenes').DataTable();
  var titulo_ordenes ='';
  var nombre_cliente = '';

  tabla_ordenes.destroy();

  $.ajax({
      url: 		'<?php echo base_url('index.php/Ordenes/obtieneOrdenes'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              idCliente: id_cliente,
              idProyecto: id_proyecto
            },
    }).done(function(result) {

      

      if(id_proyecto == 0){
        $('#flag_orden').val(0);
      }
      
      $.each(result.ordenes,function(key, orden) {
        ordenes_html += '<tr>';
        ordenes_html += '<td>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Listar Item Orden" onclick="listar_item_ordenes('+ orden.PurchaseOrderID +','+ id_cliente +','+ id_proyecto +',\''+orden.PurchaseOrderDescription+'\', this)" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-list-ol"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Ver Bucksheet" onclick="ver_bucksheet(' + orden.PurchaseOrderID + ', '+id_cliente +', '+id_proyecto + ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>';
          ordenes_html += '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderID + '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderNumber + '</td>';
        ordenes_html += '<td>' + orden.Categorizacion + '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderDescription + '</td>';
        ordenes_html += '<td>' + orden.Revision + '</td>';
        ordenes_html += '<td>' + orden.nombreCliente + '</td>';
        ordenes_html += '<td>' + orden.SupplierName + '</td>';
        ordenes_html += '<td>' + orden.ExpediterID + '</td>';
        ordenes_html += '<td>' + orden.Requestor + '</td>';
        ordenes_html += '<td>' + orden.Currency + '</td>';
        ordenes_html += '<td>' + orden.ValorNeto + '</td>';
        ordenes_html += '<td>' + orden.ValorTotal + '</td>';
        ordenes_html += '<td>' + orden.Budget + '</td>';
        ordenes_html += '<td>' + orden.CostCodeBudget + '</td>';
        ordenes_html += '<td>' + orden.OrderDate + '</td>';
        ordenes_html += '<td>' + orden.DateRequired + '</td>';
        ordenes_html += '<td>' + orden.ShipDate + '</td>';
        ordenes_html += '<td>' + orden.ShippingMethodID + '</td>';
        ordenes_html += '<td>' + orden.DateCreated + '</td>';
        ordenes_html += '<td>' + orden.POStatus + '</td>';
        ordenes_html += '<td>' + orden.Support + '</td>';
        ordenes_html += '</tr>';

        nombre_cliente = orden.nombreCliente ;

      });

      titulo_ordenes = '<i class="fas fa-clipboard-list"></i> Orden de compra Proyecto '+ nombre_proyecto;
      $('#titulo_ordenes').html(titulo_ordenes);  
      $('#datos_ordenes').html(ordenes_html);
      


      $('#datos_ordenes').val(ordenes_html);
        $('[data-toggle="tooltip"]').tooltip();

        $('#ListOrdenes').DataTable({
            "searching": false,
            language: {
                url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js'); ?>'	
            },
            "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        //  "responsive": true,
          "scrollY": "600px",
          "scrollX": true,
          "scrollCollapse": true
        });


    }).fail(function() {
      console.log("error listar_ordenes");
    })


}

function ver_bucksheet(idOrden, cliente, codigo_proyecto) {
        window.open('<?php echo site_url('BuckSheet/listaBucksheet')?>/'+ idOrden + '/'+cliente+'/'+codigo_proyecto,'_blank');
    }



</script>