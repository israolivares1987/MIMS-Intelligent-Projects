 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>HISTORICO REPORTE DE RECEPCIÓN<h1>
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
             
                    <!-- /.card-body -->
            </div>


            <div class="col-lg-12">
                     <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                      <i class="fas fa-clipboard-list"></i>
                      Reportes de Recepción Emitidos
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                           

                    <table id="tbl_rr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                             <tr>
                                <th>ACCIONES</th>
                                <th>ID INTERNO</th>
                                <th>ID REPORTE RECEPCION</th>
                                <th>FECHA DE EMISION</th>
                                <th>USUARIO</th>
                                <th>FECHA ENTREGA</th>
                                <th>CLIENTE</th>
                                <th>PROYECTO</th>
                                <th>ORDEN DE COMPRA CLIENTE</th>
                                <th>DESCRIPCION ORDEN DE COMPRA</th>
                                <th>GUIA DE DESPACHO</th>
                                <th>PROVEEDOR</th>
                                <th>ESTADO</th>
                             </tr>
                             </thead>
                             <tbody id="datos_rr">
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
                      DETALLE REPORTE DE RECEPCIÓN
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                           

                    <table id="tbl_rr_det" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>NUMERO LINEA</th>
                                     <th>ID ORDEN COMPRA</th>
                                     <th>ÍTEM ORDEN DE COMPRA</th>
                                     <th>TAG NUMBER</th>
                                     <th>STOCKCODE</th>
                                     <th>DESCRIPCION</th>
                                     <th>ID ORDEN CLIENTE</th>
                                     <th>PACKING LIST</th>
                                     <th>GUIA DESPACHO</th>
                                     <th>NUMERO DE VIAJE</th>
                                     <th>ST CANTIDAD</th>
                                     <th>ST CANTIDAD RECIBIDA</th>
                                     <th>BODEGA</th>
                                     <th>CARPA</th>
                                     <th>PATIO</th>
                                     <th>POSICION</th>
                                     <th>OBSERVACION</th>
                                     <th>OBSERVACION EXB</th>
                                     <th>INSPECCIÓN EI</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_rrdet">
                             </tbody>
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

 
                recargaRRDet(0,0);

                recargaRR(0, 0);


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
                     
                        recargaRR(proyectos, cliente );


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

  


$('#tbl_rr tbody').on('click', 'tr', function () {

    var table = $('#tbl_rr').DataTable();

    var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

    var data = table.row( this ).data();
  //  alert( 'You clicked on '+data[0]+'\'s row' );
    recargaRRDet(data[1],cod_empresa);
 

} );  
   

   

             function recargaRR(proyecto, cliente) {


                 var tabla_rr = $('#tbl_rr').DataTable();


                 tabla_rr.destroy();

                 var   rr_html = "";

                 $.ajax({
                     url: '<?php echo site_url('ReporteRecepcion/obtieneRR')?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: {
                        codigoProyecto: proyecto,
                        codigoCliente: cliente 
                     },
                 }).done(function(result) {


                     $.each(result.rrs, function(key, rr) {
                        rr_html += '<tr>';

                        rr_html += '<td>';
                        rr_html += '<button data-toggle="tooltip" data-placement="left" title="Imprimir Reporte" ' +
                        'onclick="abrirReporte('+rr.id_rr+')"' + 
                        'class="btn btn-outline-sucess btn-sm"><i class="fas fa-print"></i></i></button>';
                        rr_html += '</td>';
                        
                        rr_html += '<td>' + rr.id_rr+ '</td>'; 
                        rr_html += '<td>' + rr.id_rr_recepcion+ '</td>'; 
                        rr_html += '<td>' + rr.fecha_creacion+ '</td>'; 
                        rr_html += '<td>' + rr.usuario_creacion+ '</td>'; 
                        rr_html += '<td>' + rr.fecha_entrega+ '</td>'; 
                        rr_html += '<td>' + rr.descripcion_cliente+ '</td>'; 
                        rr_html += '<td>' + rr.descripcion_proyecto+ '</td>'; 
                        rr_html += '<td>' + rr.id_orden_cliente+ '</td>'; 
                        rr_html += '<td>' + rr.descripcion_orden+ '</td>'; 
                        rr_html += '<td>' + rr.guia_despacho+ '</td>'; 
                        rr_html += '<td>' + rr.proveedor+ '</td>'; 
                        rr_html += '<td>' + rr.estado_rr+ '</td>'; 

                        
                
                        rr_html += '</tr>';

                     });


                     $('#datos_rr').html(rr_html);

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

function abrirReporte(id_rr){

    window.open('<?php echo site_url('Bodega/muestraPDFRR/')?>' + id_rr,'_blank');


}


             function recargaRRDet(id_rr_recepcion, cod_empresa) {

var rr_det_html = '';

var tabla_rr_det = $('#tbl_rr_det').DataTable();



tabla_rr_det.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/Bodega/listaRRDet'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_rr_cab: id_rr_recepcion,
        cod_empresa: cod_empresa
    },
}).done(function(result) {


    $.each(result.rr_dets, function(key, rr_det) {
        rr_det_html += '<tr>';
        rr_det_html += '<td>' + rr_det.numero_linea_det + '</td>';
        rr_det_html += '<td>' + rr_det.id_orden_compra + '</td>';
        rr_det_html += '<td>' + rr_det.item_oc + '</td>';
        rr_det_html += '<td>' + rr_det.tag_number + '</td>';
        rr_det_html += '<td>' + rr_det.stockcode + '</td>';
        rr_det_html += '<td>' + rr_det.descripcion + '</td>';
        rr_det_html += '<td>' + rr_det.id_orden_cliente + '</td>';
        rr_det_html += '<td>' + rr_det.packing_list + '</td>';
        rr_det_html += '<td>' + rr_det.guia_despacho + '</td>';
        rr_det_html += '<td>' + rr_det.numero_viaje + '</td>';
        rr_det_html += '<td>' + rr_det.st_cantidad + '</td>';
        rr_det_html += '<td>' + rr_det.st_cantidad_recibida + '</td>';
        rr_det_html += '<td>' + rr_det.id_bodega + '</td>';
        rr_det_html += '<td>' + rr_det.id_carpa + '</td>';
        rr_det_html += '<td>' + rr_det.id_patio + '</td>';
        rr_det_html += '<td>' + rr_det.id_posicion + '</td>';
        rr_det_html += '<td>' + rr_det.observacion + '</td>';
        rr_det_html += '<td>' + rr_det.observacion_exb + '</td>';
        rr_det_html += '<td>' + rr_det.inspeccion_requerida + '</td>';
        rr_det_html += '</tr>';

    });


    $('#datos_rrdet').html(rr_det_html);
    $('#tbl_rr_det').DataTable({
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
                        }).buttons().container().appendTo('#tbl_rr_det_wrapper .col-md-6:eq(0)');

}).fail(function() {
    console.log("error change cliente");
})

}

          
             </script>

           

    