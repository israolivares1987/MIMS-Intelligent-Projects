 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>CREAR REPORTE DE RECEPCIÓN(RR)<h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-12">
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
                                         <th>
                                         <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Proyectos</label>
                                                    <?php echo $select_proyectos;?>
                                            </div>
                                        </div>
                                         <th>
                                         <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Orden de Compra</label>
                                                    <?php echo $select_ordenes;?>
                                            </div>
                                        </div>
                                        </th>
                                        <th rowspan="2">
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-warning btn-sm"
                                                     onclick="aplicaFiltro()"><i class="fas fa-filter"></i>
                                                     Aplicar Filtro
                                                 </button>
                                                 <button class="btn btn-block btn-outline-warning btn-sm" name="vender" id="crearRR"
                                                     ><i class="fas fa-file-alt"></i>
                                                     Crear RR
                                                 </button>
                                             </div>
                                         </th>
                                     </tr>
                                     <tr>
                                     <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione Guia de Despacho</label>
                                                    <?php echo $select_guias;?>
                                            </div>
                                        </div>


                                     </th>
                                         <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label>Seleccione PackingList</label>
                                                    <?php echo $select_packinglist;?>
                                            </div>
                                        </div>
                                        </th>
                                        <th>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <form id="rrfechaenrega" name="rrfechaenrega">
                                                    <label>Ingrese Fecha de recepción en bodega</label>
                                                    <input name="fecha_entrega"  id="fecha_entrega" placeholder="" class="form-control fechapicker"
                                                     type="text">
                                                </form>     
                                            </div>
                                        </div>


                                         </th>
                                    </tr>
                                  
                                 </tbody>
                             </table>
                        </div>

                        <div class="card-body">
                        <form action="#" method="post" id="form">

                        </br>
                         <table id="tbl_rr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                             <tr>
                             <th>Selección articulo</th>
                                         <th>Número de Línea</th>
                                         <th>TAG Number</th>
                                         <th>Stock Code</th>
                                         <th>ST Cantidad Elementos</th>
                                         <th>ST Cantidad Unitaria</th>
                                         <th>ST Unidad</th>
                                         <th>ST Cantidad  Total</th>
                                         <th>Guia Despacho</th>
                                         <th>Numero de Viaje</th>
                                         <th>Packing List</th>
                                         <th>ID MIMS</th>
                                         </tr>
                             </thead>
                             <tbody id="datos_rr">
                             </tbody>
                         </table>
                       
                        </form>
                     </div>
                     </div>

                     </section>
                     </div>


 <!--.modal rr-->
 <div class="modal fade" id="modal_rr">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">

                                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">
                                      <i class="fas fa-clipboard-list"></i>
                                        Crear RR
                                      </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                         <form id="form-creacion-rr">   
                                            <table id="tbl_creacion_rr" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                <thead>
                                                    <tr>
                                                      <th>Numero Linea</th>
                                                      <th>STCantidad</th>
                                                      <th>TAGNumber</th>
                                                      <th>Stockcode</th>
                                                      <th>PackingList</th>
                                                      <th>GuiaDespacho</th>
                                                      <th>Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="datos_creacion_rr">
                                                </tbody>
                                            </table>
                                      </div>
                                     </form>
                                    <!-- /.card-body -->
                            </div>

                        
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button id="btn_agregar_rr" type="button" class="btn btn-primary"  onclick="saveRR()">Agregar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!--. modal control de calidad-->

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

            

            var table_rr = $('#tbl_creacion_rr').DataTable();



              $('#crearRR').on('click', function (event) {


                if($('#guias').val() == 0) {
                            alert('Debe seleccionar Guia de Despacho para crear RR');
                }else{


                    var rr_html = '';

                var table = $('#tbl_rr').DataTable();


                table_rr.destroy();

                        event.preventDefault();
                        
                        $('#form').find('input[type="hidden"]').remove();
                        var seleccionados = table.rows({ selected: true });
                        var array = table.rows({ selected: true }).data().toArray();
                        var orden = $('#ordenes').val();
                        var guia_despacho = $('#guias').val();
                        var packinglist = $('#packinglist').val();
                        var cliente = $('#clientes').val();
                        var proyecto = $('#proyectos').val();
                        var fecha_entrega = $('#fecha_entrega').val();
                        var num = 0;
                        
                        if(!seleccionados.data().length)
                        alert("No ha seleccionado ningún registro");
                        else{
                        }


                        $.ajax({
                                    url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Wpanel',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        datos: array,
                                        orden: orden,
                                        guia_despacho: guia_despacho,
                                        cliente: cliente,
                                        proyecto: proyecto,
                                        packinglist: packinglist,
                                        fecha_entrega: fecha_entrega
                                        }
                                })
                                .done(function(respuesta) {

                                
                        if (respuesta.respuesta){
                            
                        var  idrr = respuesta.idInsertado;

                            window.open('<?php echo site_url('Bodega/crearRRDet/')?>' + idrr,'_self');

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

                recargaBuckSheet(0, 0,0,0);

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




                    $('[data-toggle="tooltip"]').tooltip();

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


            function saveRR() {

                var table_rr = $('#tbl_creacion_rr').DataTable();
                var miArray = table_rr.rows().data().toArray();

                for (var i = 0; i < miArray.length; i+=1) {
                    console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);

                    for (var a = 0; a < miArray[i].length; a+=1) {
                        
                        console.log("En el índice '" + a + "' hay este valor: " + miArray[i][a]);

                    }



                    }
               
               
                }

            function aplicaFiltro(){

                var cliente = $('#clientes').val();
                var orden = $('#ordenes').val();
                var guia = $('#guias').val();
                var packinglist = $('#packinglist').val();

                if($('#clientes').val() == 0) {
                        alert('Debe seleccionar cliente');
                    }else{

                    if($('#proyectos').val() == 0) {
                        alert('Debe seleccionar Proyecto');
                    }else{
                     
                        if($('#ordenes').val() == 0) {
                            alert('Debe seleccionar Orden');
                        }else{

                            recargaBuckSheet(orden, cliente, guia, packinglist);


                    }
                    }

                }


            }


            $('select#clientes').on('change', function() {
            var cliente = $('#clientes').val();
        


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


    $('select#packinglist').on('change', function() {
          
		$('#guias').val('0');

    });

    $('select#guias').on('change', function() {
          
          $('#packinglist').val('0');
  
      });



    $('select#proyectos').on('change', function() {


        var cliente = $('#clientes').val();
        var proyecto = $('#proyectos').val();


		$('#ordenes').val('');
		$('#ordenes').change();

		$.ajax({
			url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Ordenes',
			type: 'POST',
			dataType: 'JSON',
			data: {
                   id_clientes: cliente,
                   id_proyecto: proyecto
				},
		})
		.done(function(respuesta) {
			$("#ordenes").html(respuesta.ordenes);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});


    $('select#ordenes').on('change', function() {


            var cliente = $('#clientes').val();
            var proyecto = $('#proyectos').val();
            var orden = $('#ordenes').val();


            $('#guias').val('0');
            $('#guias').change();

            $.ajax({
                url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Ordenes_Guias',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    orden: orden
                    },
            })
            .done(function(respuesta) {
                $("#guias").html(respuesta.guias);
                
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

            $('#packinglist').val('0');
            $('#packinglist').change();

            $.ajax({
                url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Ordenes_Packinglist',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    orden: orden
                    },
            })
            .done(function(respuesta) {
                $("#packinglist").html(respuesta.packinglist);
                
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });






            });



             function recargaBuckSheet(orden, cliente, guia, packinglist) {


                 var tabla_bucksheet = $('#tbl_rr').DataTable();


                 tabla_bucksheet.destroy();

                 var  id_orden = orden; 
                 var   bucksheet_html = "";

                 $.ajax({
                     url: '<?php echo site_url('BuckSheet/obtieneBuckSheetRR')?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: {
                        id_orden: id_orden,
                        guia: guia,
                        packinglist: packinglist 
                     },
                 }).done(function(result) {


                     $.each(result.bucksheets, function(key, bucksheet) {
                         bucksheet_html += '<tr>';
                         bucksheet_html += '<td>';
                         bucksheet_html += '</td>';
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_TAG+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.STOCKCODE+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_ELEMENTOS+ '</td>';    
                        
                        bucksheet_html += '<td>' + bucksheet.CANTIDAD_UNITARIA+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheet.UNIDAD+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheet.CANTIDAD_TOTAL+ '</td>'; 

                        bucksheet_html += '<td>' + bucksheet.GUIA_DESPACHO+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_VIAJE+ '</td>';
                        
                        bucksheet_html += '<td>' + bucksheet.PACKINGLIST+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.ID_OC+ '</td>';
                        
                
                        bucksheet_html += '</tr>';

                     });


                     $('#datos_rr').html(bucksheet_html);

                     $('#tbl_rr').DataTable({
                       columnDefs: [ {
                              orderable: false,
                              className: 'select-checkbox',
                              targets:   0
                          } ],
                          select: {
                              style:    'multi', //'os' para seleccion unica 
                              selector: 'td:first-child'
                          },
                          lengthMenu: [[1, 2, 3, -1], [1, 2, 3, "All"]],
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
                                "autoWidth": true,
                                "dom": 'Bfrtip',
                                "lengthMenu": [
                                    [ 10, 25, 50, -1 ],
                                    [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
                                ],
                                "buttons": [
                                    {
                                    "extend": 'copy',
                                    "text": 'Copiar'
                                    },
                                    {
                                    "extend": 'csv',
                                    "text": 'csv'
                                    },
                                    {
                                    "extend": 'excel',
                                    "text": 'excel'
                                    },
                                    {
                                    "extend": 'pdf',
                                    "text": 'pdf'
                                    },
                                    {
                                    "extend": 'print',
                                    "text": 'Imprimir'
                                    },
                                    {
                                    "extend": 'colvis',
                                    "text": 'Columnas Visibles'
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'Mostrar Registros'
                                    },
                                    {
                                    "extend":'selectAll',
                                    "text": 'Seleccionar todos'         
                                    },
                                    {
                                    "extend":'selectNone',
                                    "text": 'Seleccionar Ninguno'         
                                    }
                            ]
                        }).buttons().container().appendTo('#tbl_rr_wrapper .col-md-6:eq(0)');


                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

          
             </script>

           

    