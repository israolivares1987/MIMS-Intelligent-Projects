 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>REPORTE DIARIO<h1>
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
                                        
                                        <th rowspan="2">
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-warning btn-sm"
                                                     onclick="aplicaFiltro()"><i class="fas fa-filter"></i>
                                                     Aplicar Filtro
                                                 </button>
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
                                <th>Fecha Reporte</th>
                                         <th>Orden de Compra Cliente</th>
                                         <th>Descrpcion Orden de Compra</th>

                                         <th>Número de Línea</th>
                                         <th>TAG Number</th>
                                         <th>Stock Code</th>
                                         <th>ST Cantidad Elementos</th>
                                         <th>ST Cantidad Unitaria</th>
                                         <th>ST Unidad</th>
                                         <th>ST Cantidad  Total</th>
                                         <th>Paquete de Construccion</th>
                                         <th>Plano</th>
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

                  

                recargaBuckSheet(0, 0);

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


            function aplicaFiltro(){

                var cliente = $('#clientes').val();
                var proyectos = $('#proyectos').val();

                if($('#clientes').val() == 0) {
                        alert('Debe seleccionar cliente');
                    }else{

                    if($('#proyectos').val() == 0) {
                        alert('Debe seleccionar Proyecto');
                    }else{
                     
                       recargaBuckSheet(proyectos, cliente );


                    }
                    }

                }


            


            $('select#clientes').on('change', function() {
            var cliente = $('#clientes').val();
        


		    $('#proyectos').val('');

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


   

             function recargaBuckSheet(proyecto, cliente) {


                 var tabla_bucksheet = $('#tbl_rr').DataTable();


                 tabla_bucksheet.destroy();

                 var   bucksheet_html = "";

                 $.ajax({
                     url: '<?php echo site_url('BuckSheet/obtieneReporteDiario')?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: {
                        codigoProyecto: proyecto,
                        codigoCliente: cliente 
                     },
                 }).done(function(result) {


                     $.each(result.bucksheets, function(key, bucksheet) {
                         bucksheet_html += '<tr>';

                         bucksheet_html += '<td>' + bucksheet.FECHA_REPORTE+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheet.PurchaseOrderNumber+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.PurchaseOrderDescription+ '</td>';
                        
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_TAG+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.STOCKCODE+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.PAQUETE_DE_CONSTRUCCION_AREA+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.NUMERO_DE_PLANO+ '</td>';
                        bucksheet_html += '<td>' + bucksheet.UNIDADES_SOLICITADAS+ '</td>';    
                        
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
                         lengthMenu: [[1, 2, 3, -1], [1, 2, 3, "All"]],
                          language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
                                },
                                "paging": false,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                 "select": true,
                               "autoWidth": true,
                                "scrollY": "600px",
                                "scrollX": true,
                                "colReorder": true,
                                "scrollCollapse": true,
                                "responsive": false,
                                "lengthChange": true, 
                                 "select": true,
                               "autoWidth": true,
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
                        }).buttons().container().appendTo('#tbl_rr_wrapper .col-md-6:eq(0)');


                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

          
             </script>

           

    