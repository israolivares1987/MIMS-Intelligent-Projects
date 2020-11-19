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
																<th>Numeración de Proyecto</th> 
																<th>Nombre de Proyecto</th> 
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
                                                            <th>Criticidad</th>
                                                            <th>ID Requerimiento</th>
                                                            <th>Categorizacion</th>
                                                            <th>Número Orden</th>
                                                            <th>Fecha Orden</th>
                                                            <th>Descripcion Orden</th>
                                                            <th>Revisión</th>
                                                            <th>Nombre Proveedor</th>
                                                            <th>Nombre Cliente</th>
                                                            <th>Comprador</th>
                                                            <th>Generador de Compra</th>
                                                            <th>Activador</th>
                                                            <th>Moneda</th>
                                                            <th>Valor Neto</th>
                                                            <th>Valor Total</th>
                                                            <th>Presupuesto</th>
                                                            <th>Codigo Presupuesto</th>
                                                            <th>Fecha Orden Creada</th>
                                                            <th>Fecha Requerida</th>
                                                            <th>Metodo Envio</th>
                                                            <th>Estado</th>
                                                            <th>Fecha de cierre</th>
                                                            <th>ID Orden</th>
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
                                                            <th>ID Orden</th>
                                                            <th>Orden Item ID</th>
                                                            <th>Descripcion</th>
                                                            <th>Revisión</th>
                                                            <th>Unidad</th>
                                                            <th>Cantidad</th>
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
                   

                                    <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                        <h3 class="card-title">
                                                            <i class="fas fa-clipboard-list"></i>
                                                            Adjuntos Técnicos
                                                        </h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <table class="table" cellspacing="0" width="99%">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>
                                                                            <button style="display: none;" id="btn_nueva_arch_tecnico" class="btn btn-outline-primary float-right mb-3">Nuevo Archivo Técnico</button>
                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table id="tbl_archivos_tecnicos" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                        <thead>
                                                            <tr>                          
                                                            <th>Acciones</th>
                                                            <th>ID Orden</th>
                                                            <th>ID Requerimiento</th>
                                                            <th>Disciplina</th>
                                                            <th>Instalación Definitiva</th>
                                                            <th>Area Proyecto</th>
                                                            <th>Tipo</th>
                                                            <th>Inspección Requerida</th>
                                                            <th>Nivel Inspeccion</th>
                                                            <th>Documentos Antes Iniciar</th>	
                                                            <th>Alcance Técnico Trabajo</th>	
                                                            <th>Instrucción Requirente</th>	
                                                            </tr>
                                                        </thead>
                                                        <tbody id="datos_archivos_tecnicos">
                                                        </tbody>
                                                        </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>

   </div>
										
									
                

        </div>
    </div>
</div> <!-- Content Wrapper. Contains page content -->




<!--.modal modal_archivos_tecnicos-->
<div id="modal_archivos_tecnicos" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Subir Archivo</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                            <div class="modal-body">
                                <div class="container">
                                            <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                <h3 class="card-title">
                                                <i class="fas fa-clipboard-list"></i>
                                                    Archivos Tecnicos
                                                </h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                        <table id="tbl_archivos_tecnicos_subidos" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Orden</th>
                                                                    <th>ID Archivo Técnico</th>
                                                                    <th>Nombre Archivo</th>
                                                                    <th>Descarga Archivo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="datos_archivos_tecnicos_subidos">
                                                            </tbody>
                                                        </table>
                                                </div>

                                    <!-- /.card-body -->
                            </div>
                                </div>

                                

                                <!-- /.card-body -->
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                              
                            </div>

                       
                          
                            <!-- Image loader -->     
                     </div>
                 </div>
             </div>


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
        recargaArchivoTecnico(0,0);
   recargaArchivosTecnicos(0, 0, 0);


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
        recargaArchivoTecnico(0,0);
   recargaArchivosTecnicos(0, 0, 0);

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
                    url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
                },
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
               // "responsive": true,
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
                                            '<button data-toggle="tooltip" data-placement="left" title="Ver WPanel" onclick="ver_bucksheet(' +
                                            orden.PurchaseOrderID + ', '+id_cliente +', '+id_proyecto +
                                            ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>'+
                                            '<button data-toggle="tooltip" data-placement="left" title="Ver Items Orden" onclick="listar_item_ordenes(' +
                                            orden.PurchaseOrderID + ', '+id_cliente +', '+id_proyecto +
                                            ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-inbox"></i></button>';
                                            ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Ver Archivos Tecnicos" onclick="listar_archivos_adjuntos(' +orden.codEmpresa + ', '+ orden.PurchaseOrderID +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>'    
                                        ordenes_html += '</td>';
                                        if( orden.Criticidad ==='BAJA'){
                                                     ordenes_html  += '<td><span class="bg-green">'+  orden.Criticidad +'</span></td>';    
                                                }else if(orden.Criticidad ==='ALTA'){
                                                     ordenes_html  += '<td><span class="bg-red">'+  orden.Criticidad +'</span></td>';
                                                }else{
                                                     ordenes_html  += '<td><span class="bg-yellow">'+  orden.Criticidad +'</span></td>';
                                                }
                                                 ordenes_html += '<td>' + orden.idRequerimiento  + '</td>';
                                         ordenes_html += '<td>' + orden.Categorizacion + '</td>';
                                         ordenes_html += '<td>' + orden.PurchaseOrderNumber + '</td>';
                                         ordenes_html += '<td>' + orden.OrderDate  + '</td>';
                                         ordenes_html += '<td>' + orden.PurchaseOrderDescription + '</td>';
                                         ordenes_html += '<td>' + orden.Revision + '</td>';
                                         ordenes_html += '<td>' + orden.SupplierName + '</td>';
                                         ordenes_html += '<td>' + orden.nombreCliente + '</td>';
                                         ordenes_html += '<td>' + orden.Comprador + '</td>';
                                         ordenes_html += '<td>' + orden.Requestor+ '</td>';
                                         ordenes_html += '<td>' + orden.ExpediterID + '</td>';
                                         ordenes_html += '<td>' + orden.Currency  + '</td>';
                                         ordenes_html += '<td>' + orden.ValorNeto  + '</td>';
                                         ordenes_html += '<td>' + orden.ValorTotal  + '</td>';
                                         ordenes_html += '<td>' + orden.Budget  + '</td>';
                                         ordenes_html += '<td>' + orden.CostCodeBudget  + '</td>';
                                         ordenes_html += '<td>' + orden.DateCreated  + '</td>';
                                         ordenes_html += '<td>' + orden.DateRequired  + '</td>';
                                         ordenes_html += '<td>' + orden.ShippingMethodID  + '</td>';
                                         ordenes_html += '<td>' + orden.POStatus  + '</td>';
                                         ordenes_html += '<td>' + orden.ShipDate  + '</td>';
                                         ordenes_html += '<td>' + orden.PurchaseOrderID + '</td>';
                                         ordenes_html += '<td>' + orden.Support  + '</td>';
                                        ordenes_html += '</tr>';

                                       

                                                    
            });

            $('#datos_ordenes').html(ordenes_html);
            $('[data-toggle="tooltip"]').tooltip();

            $('#tbl_ordenes').DataTable({
                "searching": true,
                language: {
                    url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
                },
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                //"responsive": true,
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
        "searching": true,
        language: {
            url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
        },
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
       // "responsive": true,
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


    function listar_archivos_adjuntos(cod_empresa,id_orden){  
  
  recargaArchivoTecnico(cod_empresa,id_orden);

}

function recargaArchivoTecnico(cod_empresa,id_orden){


var archivo_tecnico_html = '';
var tabla_archivo_tecnico = $('#tbl_archivos_tecnicos').DataTable();


tabla_archivo_tecnico.destroy();

$.ajax({
  url: '<?php echo base_url('index.php/AdjuntoTecnico/listasAdjuntoTecnico');?>',
  type: 'POST',
  dataType: 'json',
  data: {
    cod_empresa: cod_empresa,
    id_orden: id_orden
  },
}).done(function(result) {

  console.log(result);
  
 
  $.each(result.adjuntotecnicos, function(key, adjuntotecnico) {
    archivo_tecnico_html += '<tr>';
    archivo_tecnico_html += '<td>';
    archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Ver Archivos Técnicos" onclick="ver_archivo_tecnico('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>';
    archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Ver Archivos Técnicos EP" onclick="ver_archivo_tecnico_ep('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>';
    archivo_tecnico_html += '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.id_orden + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.id_requerimiento + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.disciplina + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.instalacion_definitiva + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.area_proyecto + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.tipo_pm + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.inspeccion_requerida + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.nivel_inspeccion + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.documentos_antes_iniciar + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.alcance_tecnico_trabajo + '</td>';
    archivo_tecnico_html += '<td>' + adjuntotecnico.instruccion_requirente + '</td>';
    archivo_tecnico_html += '</tr>';


  });

  $('#datos_archivos_tecnicos').html(archivo_tecnico_html);

  $('#or_id_orden_arch_tecnico').val(id_orden);
  $('#or_cod_empresa_arch_tecnico').val(cod_empresa);
  
  $('[data-toggle="tooltip"]').tooltip();

  $('#tbl_archivos_tecnicos').DataTable({
      "searching": true,
      language: {
          url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
      },
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      //"responsive": true,
      "scrollY": "600px",
      "scrollX": true,
      "scrollCollapse": true
  });


}).fail(function() {
  console.log("error tbl_archivos_tecnicos");
})



}


function ver_archivo_tecnico(id,cod_empresa, id_orden) {

$('#modal_archivos_tecnicos').modal('show');
$('.modal-title').text('Archivos Técnico'); // Set title to Bootstrap modal title

recargaArchivosTecnicos('1', id_orden, cod_empresa);

}


function ver_archivo_tecnico_ep(id,cod_empresa, id_orden) {

$('#modal_archivos_tecnicos').modal('show');
$('.modal-title').text('Archivos Técnico EP'); // Set title to Bootstrap modal title

recargaArchivosTecnicos('2', id_orden, cod_empresa);


}




function recargaArchivosTecnicos(tipo_archivo, id_orden, cod_empresa){

var archivos_html ='';

var tabla_proyecto =  $('#tbl_archivos_tecnicos_subidos').DataTable();

tabla_proyecto.destroy();

$.ajax({
  url: 		'<?php echo base_url('index.php/AdjuntoTecnico/listasArchivosTecnico'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
    cod_empresa: cod_empresa,
    id_orden: id_orden,
    tipo_archivo : tipo_archivo
    
        },
}).done(function(result) {

  $.each(result.adjuntotecnicos,function(key, adjuntotecnico) {
    archivos_html += '<tr>';
    archivos_html += '<td>' + adjuntotecnico.id_orden + '</td>';
    archivos_html += '<td>' + adjuntotecnico.id_archivo_tecnico + '</td>';
    archivos_html += '<td>' + adjuntotecnico.archivo_original + '</td>';
    archivos_html += '<td>' + adjuntotecnico.documentos_tecnicos_considera + '</td>';
    archivos_html += '</tr>';

  });
    
  $('#datos_archivos_tecnicos_subidos').html(archivos_html);

    $('[data-toggle="tooltip"]').tooltip();

    $('#tbl_archivos_tecnicos_subidos').DataTable({
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
  console.log("error recargaArchivosTecnicos");
})

}
    </script>