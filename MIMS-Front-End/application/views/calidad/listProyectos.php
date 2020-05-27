<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Proyectos y Ordenes de cliente <?php echo $nombreCliente;?> </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
        <div class="card">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-building"></i>
                                        Detalle Cliente
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Cliente:</dt>
                                        <dd class="col-sm-6"><?php echo $nombreCliente;?></dd>
                                        </dd>
                                    </dl>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->

										<div class="row">
											<div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                                                        <i class="fas fa-tasks"></i>
															Proyectos
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
													  <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0" width=%100>
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

											</div>

                                            <div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                                                        <i class="fas fa-clipboard-list"></i></i>
															Ordenes Proyectos
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
													  <table id="tbl_ordenes" class="table table-striped table-bordered" cellspacing="0" width=%100>
														<thead>
															<tr>
                                                            <th>Acciones</th>
                                                            <th>Orden ID</th>
                                                            <th>Orden Number</th>
                                                            <th>Orden Description</th>
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
                                                            <th>Fecha Prometida</th>
                                                            <th>Fecha Enviada</th>
                                                            <th>Metodo Envio</th>
                                                            <th>Fecha Orden Creada</th>
                                                            <th>Estado</th>
                                                            <th>Archivo</th>	

                                                        </tr>
														</thead>
														<tbody id="datos_ordenes">
														</tbody>
													</table>
													</div>
													<!-- /.card-body -->
												</div>

											</div>

                                            <div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                                                        <i class="fas fa-clipboard-list"></i></i>
															Items Orden
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
													  <table id="tbl_ordenes_items" class="table table-striped table-bordered" cellspacing="0" width=%100>
														<thead>
															<tr>
                                                            <th>Orden ID</th>
                                                            <th>Orden Item ID</th>
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
											<!-- /.col-md-6 -->
										</div>
										<!-- /.row -->
											<!-- /.col-md-6 -->
										</div>
										<!-- /.row -->
									</div>

										
									
                

        </div>
    </div>
</div> <!-- Content Wrapper. Contains page content -->

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



    <script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();

    $(document).ready(function() {

        var cliente = <?php echo $idCliente?>;
        recargaProyectos(cliente);
        recargaOrdenes(0, 0);
        recargaItemOrdenes(0, 0, 0);


        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });



    function listar_ordenes(id_proyecto, id_cliente) {

        recargaOrdenes(id_proyecto, id_cliente);

    }

    function listar_item_ordenes(orden_id, id_cliente, id_proyecto ) {

        recargaItemOrdenes(orden_id, id_cliente, id_proyecto);

        }

    


    function recargaProyectos(cliente) {

        var proyectos_html = '';

        var tabla_proyecto = $('#tbl_proyectos').DataTable();

        tabla_proyecto.destroy();

        $.ajax({
            url: '<?php echo base_url('index.php/Proyectos/listProyectosCliente');?>',
            type: 'POST',
            dataType: 'json',
            data: {
                cliente: cliente
            },
        }).done(function(result) {

            $.each(result.proyectos, function(key, proyecto) {
                proyectos_html += '<tr>';
                proyectos_html += '<td>';
                proyectos_html += '<button data-toggle="tooltip" data-placement="left" title="Lista Ordenes" onclick="listar_ordenes(' +proyecto.NumeroProyecto + ',' + cliente + ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
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
            });



            $('#datos_proyectos').html(proyectos_html);
            $('[data-toggle="tooltip"]').tooltip();

            $('#tbl_proyectos').DataTable({
                language: {
                    url: '<?php echo base_url('assets/datatables/lang/esp.js');?>'
                },
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "scrollY": "600px",
                "scrollX": true,
                "scrollCollapse": true
            });

        }).fail(function() {
            console.log("error change cliente");
        })

    }



    function recargaOrdenes(id_proyecto, id_cliente) {

        var ordenes_html = '';
        var tabla_ordenes = $('#tbl_ordenes').DataTable();

        tabla_ordenes.destroy();

        $.ajax({
            url: '<?php echo base_url('index.php/Ordenes/obtieneOrdenes');?>',
            type: 'POST',
            dataType: 'json',
            data: {
                idProyecto: id_proyecto,
                idCliente: id_cliente
            },
        }).done(function(result) {

            console.log(result);

           
            $.each(result.ordenes, function(key, orden) {
                                        ordenes_html += '<tr>';
                                        ordenes_html += '<td>';
                                        ordenes_html +=
                                            '<button data-toggle="tooltip" data-placement="left" title="Ver Bucksheet" onclick="ver_bucksheet(' +
                                            orden.PurchaseOrderID + ', '+id_cliente +', '+id_proyecto +
                                            ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>'+
                                            '<button data-toggle="tooltip" data-placement="left" title="Ver Items Orden" onclick="listar_item_ordenes(' +
                                            orden.PurchaseOrderID + ', '+id_cliente +', '+id_proyecto +
                                            ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-inbox"></i></button>';
                                            
                                        ordenes_html += '</td>';
                                        ordenes_html += '<td>' + orden.PurchaseOrderID + '</td>';
                                        ordenes_html += '<td>' + orden.PurchaseOrderNumber + '</td>';
                                        ordenes_html += '<td>' + orden.PurchaseOrderDescription + '</td>';
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
                                        ordenes_html += '<td>' + orden.DatePromised + '</td>';
                                        ordenes_html += '<td>' + orden.ShipDate + '</td>';
                                        ordenes_html += '<td>' + orden.ShippingMethodID + '</td>';
                                        ordenes_html += '<td>' + orden.DateCreated + '</td>';
                                        ordenes_html += '<td>' + orden.POStatus + '</td>';
                                        ordenes_html += '<td>' + orden.Support + '</td>';
                                        ordenes_html += '</tr>';

                                                    
            });

            $('#datos_ordenes').html(ordenes_html);
            $('[data-toggle="tooltip"]').tooltip();

            $('#tbl_ordenes').DataTable({
                "searching": false,
                language: {
                    url: '<?php echo base_url('assets/datatables/lang/esp.js');?>'
                },
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "scrollY": "600px",
                "scrollX": "200px",
                "scrollCollapse": true
            });


        }).fail(function() {
            console.log("error listar_ordenes");
        })


    }



    function recargaItemOrdenes(orden_id, id_cliente, id_proyecto) {

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
            url: '<?php echo base_url('assets/datatables/lang/esp.js');?>'
        },
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
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