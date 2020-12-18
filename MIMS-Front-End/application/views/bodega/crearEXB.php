 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Crear EXB<h1>
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
                                         <th>
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
                        <input type="button" class="btn btn-warning" name="vender" value="Crear EXB" id="vender">
                         <table id="tbl_rr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                             <tr>
                             <th><i class="fa fa-check"></i>&nbsp;Selección articulo</th>
                                         <th>Número de Línea</th>
                                         <th>TAG Number</th>
                                         <th>Stock Code</th>
                                         <th>ST Cantidad Elementos</th>
                                         <th>ST Cantidad Unitaria</th>
                                         <th>ST Unidad</th>
                                         <th>ST Cantidad  Total</th>
                                         <th>Guia Despacho</th>
                                         <th>Packing List</th>
                                         <th class="grey">Comentario</th>
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

            
              $('#vender').on('click', function (event) {

                var table = $('#tbl_rr').DataTable();

                        event.preventDefault();
                        
                        $('#form').find('input[type="hidden"]').remove();
                        var seleccionados = table.rows({ selected: true });
                        
                        if(!seleccionados.data().length)
                          alert("No ha seleccionado ningún registro");
                        else{
                          seleccionados.every(function(key,data){
                            console.log(this.data());
                          });
                        }
                    });

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


$('#btn_nuevo_todo').on('click', function(){
 

  $('#form_nuevo_todo')[0].reset(); // reset form on modals
   $('#modal_nuevo_todo').modal('show');
   
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

            function aplicaFiltro(){

                var cliente = $('#clientes').val();
                var orden = $('#ordenes').val();

                if($('#clientes').val() == 0) {
                        alert('Debe seleccionar cliente');
                    }else{

                    if($('#proyectos').val() == 0) {
                        alert('Debe seleccionar Proyecto');
                    }else{
                     
                        if($('#ordenes').val() == 0) {
                            alert('Debe seleccionar Orden');
                        }else{
                        recargaBuckSheet(orden, cliente);
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
				},
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
    

    function form_crea_rr(){

      $('#modal_nuevo_rr').modal('show');
    }

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





             function recargaBuckSheet(orden, cliente) {


                 var tabla_bucksheet = $('#tbl_rr').DataTable();

                 
                 tabla_bucksheet.destroy();

                 var  id_orden = orden; 
                 var   bucksheet_html = "";

                 $.ajax({
                     url: '<?php echo site_url('BuckSheet/obtieneBucksheet')?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: {
                        id_orden: id_orden
                     },
                 }).done(function(result) {


                     $.each(result.bucksheets, function(key, bucksheets) {
                         bucksheet_html += '<tr>';
                         bucksheet_html += '<td>';
                         bucksheet_html += '</td>';
                        bucksheet_html += '<td>' + bucksheets.NumeroLinea+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.TAGNumber+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Stockcode+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.STCantidad+ '</td>';    
                        
                        bucksheet_html += '<td>' + bucksheets.PesoUnitario+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheets.STUnidad+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheets.PesoTotal+ '</td>'; 

                        bucksheet_html += '<td>' + bucksheets.GuiaDespacho+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PackingList+ '</td>';
                        bucksheet_html += '<td class="grey" >1</td>';
                
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
              url: '<?echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
            }
    ]
                        }).buttons().container().appendTo('#datos_rr_wrapper .col-md-6:eq(0)');


                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

          
             </script>

             <script>
             $(function() {
                 //Initialize Select2 Elements


                 //Datemask dd-mm-yyyy
                 $('#datemask').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
                 })
                 //Datemask2 mm/dd/yyyy
                 $('#datemask2').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()

             })
             </script>


    