 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 <h1>CREAR REPORTE DE ENTREGAS(RE)<h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="row">

         <div class="col-lg-12">
                     <div class="card">
                    <div class="card-header">
                     
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                           

                    <table class="" cellspacing="0" width="100%">
                                 <tbody>
                                     <tr>
                                         <th>
                                         <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Cliente</label>
                                                    <?php echo $select_clientes;?>
                                            </div>
                                        </div>
                                         
                                         </th>
                                         <th colspan = 4>
                                         <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Proyectos</label>
                                                    <?php echo $select_proyectos;?>
                                            </div>
                                        </div>
                                        
                                        <th>
                                              &nbsp;
                                         </th>
                                     </tr>
                                     <tr>
                                     <th>
                                         <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Orden de Compra</label>
                                                    <?php echo $select_ordenes;?>
                                            </div>
                                        </div>
                                        </th>
                                        <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione STOCKCODE</label>
                                                    <?php echo $select_sku;?>
                                            </div>
                                        </div>
                                        </th>
                                        <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Proveedor</label>
                                                    <?php echo $select_proveedores;?>
                                            </div>
                                        </div>
                                        </th>
                                        <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Tag Number</label>
                                                    <?php echo $select_tagnumber;?>
                                            </div>
                                        </div>
                                        </th>
                                        <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Descripción</label>
                                                    <?php echo $select_descripcion;?>
                                            </div>
                                        </div>
                                        </th>

                                     </tr>
                                                                     
                                 </tbody>
                             </table>
                      </div>
             
                    <!-- /.card-body -->
            </div>


            <div class="col-lg-12">
                     <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                      <i class="fas fa-clipboard-list"></i>
                           REPORTE DE RECEPCIÓN
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                           
                    
                    </br>
                    </br>
                    <table id="tbl_rr_det" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th></th>
                                     <th style="display: none;"></th>
                                     <th style="display: none;"></th>
                                     <th style="display: none;"></th>
                                     <th style="display: none;"></th>
                                     <th>STOCKCODE</th>
                                     <th>DESCRIPCION</th>
                                     <th>ID ORDEN CLIENTE</th>
                                     <th>ST CANTIDAD</th>
                                     <th>ST CANTIDAD RECIBIDA</th>
                                     <th>SALDO</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_rrdet">
                             </tbody>
                         </table>
                      </div>
             
                    <!-- /.card-body -->
            </div>


            <div class="col-lg-12">
                     <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                      <i class="fas fa-clipboard-list"></i>
                           PRODUCTOS SELECCIONADOS PARA RE
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                        <button id="crearRE"
                                             class="btn btn-outline-primary float-right"><i class="fas fa-times-circle"></i>
                                               Crear RE</button>
                                    </th>
                                   
                                       
                                    
                                 </tr>
                             </tbody>
                         </table>       
                
                    </br>
                    </br>
                    <table id="tbl_re_det" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th></th>
                                     <th>ID RR</th>
                                     <th>ID RR DET</th>
                                     <th>ID OC</th>
                                     <th>ITEM OC</th>
                                     <th>STOCKCODE</th>
                                     <th>DESCRIPCION</th>
                                     <th>ID ORDEN CLIENTE</th>
                                     <th>ST CANTIDAD</th>
                                     <th>ST CANTIDAD RECIBIDA</th>
                                     <th>SALDO</th>
                                 </tr>
                             </thead>
                         </table>
                      </div>
             
                    <!-- /.card-body -->
            </div>



        </div>

                     </section>
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

             .grey {
            background-color: rgba(128,128,128,.25)!important;
            }

             </style>



  <script type="text/javascript">

            $(document).ready(function() {


             $('#tbl_re_det').DataTable({"columnDefs": [ {
                                "targets": 0,
                                "data": null,
                                "defaultContent": '<button class="btn btn-danger float-left"><i class="fas fa-minus"></i> Eliminar Seleccionado RE</button>'
                                } ],
                                                language: {
                                                    url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
                                                },
                                                "paging": false,
                                                "dom": 't',
                                                "lengthChange": false,
                                                "searching": true,
                                                "ordering": true,
                                                "info": true,
                                                "autoWidth": true,
                                                "scrollY": "600px",
                                                "scrollX": true,
                                                "colReorder": true,
                                                "scrollCollapse": true,
                                                "responsive": false,
                                                "lengthChange": true, 
                                                "destroy": true,
                                                "dom": 'Bfrtip',
                                                "lengthMenu": [
                                                    [ 10, 25, 50, -1 ],
                                                    [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
                                                ],
                                                "buttons": [
                                                                {
                                                                "extend": 'copy',
                                                                "text": 'COPIAR'
                                                                },
                                                                {
                                                                "extend": 'csv',
                                                                "text": 'CSV'
                                                                },
                                                                {
                                                                "extend": 'excel',
                                                                "text": 'EXCEL'
                                                                },
                                                                {
                                                                "extend": 'pdf',
                                                                "text": 'PDF'
                                                                },
                                                                {
                                                                "extend": 'print',
                                                                "text": 'IMPRIMIR'
                                                                },
                                                                {
                                                                "extend": 'colvis',
                                                                "text": 'COLUMNAS VISIBLES'
                                                                },
                                                                {
                                                                "extend": 'pageLength',
                                                                "text": 'MOSTRAR REGISTROS'
                                                                }
                                                                    ]
                                                                }).buttons().container().appendTo('#tbl_re_det_wrapper .col-md-6:eq(0)');
                
                                                         


                         $ ('#tbl_rr_det tbody'). on ('click', 'button', function () {

                               var table1 = $('#tbl_rr_det').DataTable(); 
                               var table2 = $('#tbl_re_det').DataTable(); 

                               var data = table1.row( $(this).parents('tr') ).data();
                                console.log(data);
                                table2.row.add(data).draw();

                                toastr.success('Material Reservado con Éxito');
                            
                                });   


                          $ ('#tbl_re_det tbody'). on ('click', 'button', function () {

                               var table2 = $('#tbl_re_det').DataTable(); 
                               table2.row($(this).parents('tr')).remove().draw( false );
                               toastr.success('Se elimina StockCode para RE');
                            
                         });          





                recargaRRDet('','', '','','','','','');


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

                    $('[data-toggle="tooltip"]').tooltip();
                    
                    });   
                      
                    $('#crearRE').on('click', function (event) {


                        var table_re = $('#tbl_re_det').DataTable();


                                event.preventDefault();
                                
                                $('#form').find('input[type="hidden"]').remove();
                                var seleccionados = table_re.rows();
                                var array = table_re.rows().data().toArray();
                                var cliente = $('#clientes').val();
                                var proyecto = $('#proyectos').val();
                                var num = 0;

                                console.log(array);
                                
                                if(!seleccionados.data().length)
                                alert("No ha seleccionado ningún registro");
                                else{
                                
                                  
                                    $.ajax({
                                            url: '<?php echo base_url();?>'+'index.php/ReporteEntrega/agregarRE',
                                            type: 'POST',
                                            dataType: 'JSON',
                                            data: {
                                                datos: array,
                                                cliente: cliente,
                                                proyecto: proyecto
                                                }
                                        })
                                        .done(function(respuesta) {

                                                        
                                                if (respuesta.respuesta){
                                                    
                                                var  idrr = respuesta.idInsertado;

                                                  window.open('<?php echo site_url('ReporteEntrega/crearREDet/')?>' + idrr,'_self');

                                                }else{

                                                    toastr.warning(respuesta.error);
                                                }       

                                        })
                                        .fail(function() {
                                            console.log("error");
                                        })
                                        .always(function() {
                                            console.log("complete");
                                        });
                                        

                                }


                              


                                        


                            });

                  

        function mostrarBlock(){
                $.blockUI({ 
                        message: '<h5><img style="width: 12px;" src="<?php echo base_url('assets/dist/img/loader.gif');?>" />&nbsp;Espere un momento...</h5>',
                    css:{
                        backgroundColor: '#0063BE',
                        opacity: .8,
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px',
                        color: '#fff'
                    }
                });
            }

             function recargaRRDet(cod_empresa, cliente, proyecto, orden, sku, proveedor,tagnumber,descripcion) {


                var rr_det_html = '';
                var tabla_rr_det = $('#tbl_rr_det').DataTable();
                tabla_rr_det.destroy();

                $.ajax({
                    url: '<?php echo base_url('index.php/ReporteEntrega/listaRRDetForRE'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        codigoCliente: cliente,
                        codigoProyecto: proyecto,
                        orden: orden,
                        sku: sku,
                        proveedor: proveedor,
                        tagnumber: tagnumber,
                        descripcion: descripcion
                    }
                }).done(function(result) {


                    $.each(result.rr_dets, function(key, rr_det) {
                        rr_det_html += '<tr>';
                        rr_det_html += '<td></td>';
                        rr_det_html += '<td style="display: none;">' + rr_det.id_rr_cab + '</td>';
                        rr_det_html += '<td style="display: none;">' + rr_det.id_rr_det + '</td>';
                        rr_det_html += '<td style="display: none;">' + rr_det.id_orden_compra + '</td>';
                        rr_det_html += '<td style="display: none;">' + rr_det.item_oc + '</td>';
                        rr_det_html += '<td>' + rr_det.stockcode + '</td>';
                        rr_det_html += '<td>' + rr_det.descripcion + '</td>';
                        rr_det_html += '<td>' + rr_det.id_orden_cliente + '</td>';
                        rr_det_html += '<td>' + rr_det.st_cantidad + '</td>';
                        rr_det_html += '<td>' + rr_det.st_cantidad_recibida + '</td>';
                        rr_det_html += '<td>' + rr_det.saldo + '</td>';
                        rr_det_html += '</tr>';

                    });


                            $('#datos_rrdet').html(rr_det_html);
                            $('#tbl_rr_det').DataTable({
                                dom: 't',
                                columnDefs: [ {
                                targets: 0,
                                data: null,
                                defaultContent: '<button class="btn btn-success float-left"><i class="fas fa-plus"></i> Agregar Producto para RE</button>'
                                } ],
                                language: {
                                    url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
                                },
                                "paging": false,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "autoWidth": true,
                                "scrollY": "600px",
                                "scrollX": true,
                                "colReorder": true,
                                "scrollCollapse": true,
                                "responsive": false,
                                "lengthChange": true, 
                                "destroy": true,
                                "dom": 'Bfrtip',
                                "lengthMenu": [
                                    [ 10, 25, 50, -1 ],
                                    [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
                                ],
                                "buttons": [
                                                {
                                                "extend": 'copy',
                                                "text": 'COPIAR'
                                                },
                                                {
                                                "extend": 'csv',
                                                "text": 'CSV'
                                                },
                                                {
                                                "extend": 'excel',
                                                "text": 'EXCEL'
                                                },
                                                {
                                                "extend": 'pdf',
                                                "text": 'PDF'
                                                },
                                                {
                                                "extend": 'print',
                                                "text": 'IMPRIMIR'
                                                },
                                                {
                                                "extend": 'colvis',
                                                "text": 'COLUMNAS VISIBLES'
                                                },
                                                {
                                                "extend": 'pageLength',
                                                "text": 'MOSTRAR REGISTROS'
                                                }
                                                    ]
                                                }).buttons().container().appendTo('#tbl_rr_det_wrapper .col-md-6:eq(0)');

                        }).fail(function() {
                            console.log("error change cliente");
                        })

                        }

        $('select#clientes').on('change', function(e) {
            var cliente = $('#clientes').val();
            e.preventDefault();


		$('#proyectos').val('');

		$('#ordenes').val('');
		$('#ordenes').change();

		$.ajax({
			url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Proyectos',
			type: 'POST',
			dataType: 'JSON',
			data: {
                   id_clientes: cliente
				}
		})
		.done(function(respuesta) {
			$("#proyectos").html(respuesta.proyectos);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

    });



      $('select#proyectos').on('change', function(e) {

            e.preventDefault();
            var cliente = $('#clientes').val();
            var proyecto = $('#proyectos').val();
            var tabla_re_det = $('#tbl_re_det').DataTable();


            $('#ordenes').val('');
            $('#ordenes').change();

            $.ajax({
                url: '<?php echo base_url();?>'+'index.php/ReporteEntrega/JSON_Filtros_RE',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id_clientes: cliente,
                    id_proyecto: proyecto,
                    orden: '1',
                    sku: '',
                    proveedor: '',
                    tagnumber: '',
                    descripcion: ''
                    },
            })
            .done(function(respuesta) {
                $("#ordenes").html(respuesta.ordenes);
                $("#sku").html(respuesta.sku);
                $("#proveedores").html(respuesta.proveedores);
                $("#tagnumber").html(respuesta.tagnumber);
                $("#descripcion").html(respuesta.descripcion);

                tabla_re_det.clear().draw();

           
                
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

           recargaRRDet('', cliente, proyecto,'' ,'' ,'' ,'' ,'' );

            });


            $('select#ordenes').on('change', function() {


                    var cliente = $('#clientes').val();
                    var proyecto = $('#proyectos').val();
                    var ordenes = $('#ordenes').val();


                    $('#sku').val('');
                    $('#proveedores').val('');
                    $('#tagnumber').val('');
                    $('#descripcion').val('');

                    recargaRRDet('', cliente, proyecto,ordenes ,'' ,'', '', '');

                    });

                   
               
               
                    $('select#sku').on('change', function() {


                        var cliente = $('#clientes').val();
                        var proyecto = $('#proyectos').val();
                        var sku = $('#sku').val();


                        $('#ordenes').val('');
                        $('#proveedores').val('');
                        $('#tagnumber').val('');
                        $('#descripcion').val('');

                        recargaRRDet('', cliente, proyecto,'',sku ,'', '', '');

                    }); 

                    $('select#proveedores').on('change', function() {


                        var cliente = $('#clientes').val();
                        var proyecto = $('#proyectos').val();
                        var proveedores = $('#proveedores').val();


                        $('#ordenes').val('');
                        $('#sku').val('');
                        $('#tagnumber').val('');
                        $('#descripcion').val('');

                        recargaRRDet('', cliente, proyecto,'','' ,proveedores, '', '');

                    });         

                    $('select#tagnumber').on('change', function() {


                            var cliente = $('#clientes').val();
                            var proyecto = $('#proyectos').val();
                            var tagnumber = $('#tagnumber').val();


                            $('#ordenes').val('');
                            $('#sku').val('');
                            $('#proveedores').val('');
                            $('#descripcion').val('');

                            recargaRRDet('', cliente, proyecto,'','' ,'', tagnumber, '');

                            });       

                    $('select#descripcion').on('change', function() {


                            var cliente = $('#clientes').val();
                            var proyecto = $('#proyectos').val();
                            var descripcion = $('#descripcion').val();


                            $('#ordenes').val('');
                            $('#sku').val('');
                            $('#proveedores').val('');
                            $('#tagnumber').val('');

                            recargaRRDet('', cliente, proyecto,'','' ,'', '', descripcion);

                            });                 

                   
            


             </script>

           

    