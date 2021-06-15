 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Confirmar Reserva<h1>
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
                      Reservas de Material Emitidas
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table" cellspacing="0" width="100%">
                             <tbody>
                                 <tr>
                                     <th>
                                        <button id="verReporteRE"
                                             class="btn btn-outline-success float-right"><i class="fas fa-times-circle"></i>
                                               Ver Reporte Reserva RE</button>
                                               <button id="finalizarRE"
                                             class="btn btn-outline-success float-right"><i class="fas fa-times-circle"></i>
                                             Confirmar Reporte de Entrega</button>
                                    </th>
                                    </tr>
                             </tbody>
                         </table>       
                
                    </br>
                    </br>    

                    <table id="tbl_re" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                             <tr>

                                <th>ID REPORTE DE ENTREGA</th>
                                <th>PROYECTO</th>
                                <th>ÁREA DE PROYECTO</th>
                                <th>DESCRIPCIÓN DEL ÁREA</th>
                                <th>FECHA EMISIÓN RESERVA RE</th>
                                <th>EMISOR RE</th>
                                <th>ESTADO RE</th>
                                <th>SOLICITANTE</th>
                                <th>IDENTIFICACIÓN SOLICITANTE</th>
                                <th>CARGO DEL SOLICITANTE</th>
                                <th>FECHA SOLICITUD</th>
                                <th>ENTREGA DIRECTA</th>
                                <th>FECHA ENTREGA EN SITIO</th>                        
                                <th>LUGAR FÍSICO</th>
                             </tr>
                             </thead>
                             <tbody id="datos_re">
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
                      Detalle Reserva de Material
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                           

                    <table id="tbl_re_det" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                    <th>N° LINEA</th>
                                    <th>ORDEN DE COMPRA</th>
                                    <th>ÍTEM ORDEN DE COMPRA</th>
                                    <th>TAG NUMBER</th>
                                    <th>STOCK CODE</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>CANTIDAD DISPONIBLE</th>
                                    <th>CANTIDAD ENTREGADA</th>
                                    <th>SALDO</th>
                                    <th>BODEGA</th>
                                    <th>PATIO</th>
                                    <th>POSICIÓN</th>
                                    <th>OBS.</th>
                                    <th>OBS EXB.</th>
                                    <th>OBS II</th>

                                 </tr>
                             </thead>
                             <tbody id="datos_redet">
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

                var id_re_final = 0;

 
                recargaREDet(0,0);

                recargaRE(0, 0);


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
                     
                        recargaRE(proyectos, cliente );


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

  


$('#tbl_re tbody').on('click', 'tr', function () {

    var table = $('#tbl_re').DataTable();

    var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

    var data = table.row( this ).data();

    id_re_final = data[0]; 
  //  alert( 'You clicked on '+data[0]+'\'s row' );
    recargaREDet(data[0],cod_empresa);
 

} );  
   

   

function recargaREDet(id_re, cod_empresa) {

var re_det_html = '';

var tabla_re_det = $('#tbl_re_det').DataTable();



tabla_re_det.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/ReporteEntrega/listaREDet'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_re: id_re,
        cod_empresa: cod_empresa
    },
}).done(function(result) {


    $.each(result.re_dets, function(key, re_det) {
        re_det_html += '<tr>';
                        re_det_html += '<td>' + re_det.numero_linea_det+ '</td>'; 
                        re_det_html += '<td>' + re_det.id_orden_compra+ '</td>'; 
                        re_det_html += '<td>' + re_det.item_oc+ '</td>'; 
                        re_det_html += '<td>' + re_det.tag_number+ '</td>'; 
                        re_det_html += '<td>' + re_det.stockcode+ '</td>'; 
                        re_det_html += '<td>' + re_det.descripcion+ '</td>'; 
                        re_det_html += '<td>' + re_det.st_cantidad_recibida+ '</td>'; 
                        re_det_html += '<td>' + re_det.st_cantidad_entregada+ '</td>'; 
                        re_det_html += '<td>' + re_det.st_cantidad_saldo+ '</td>'; 
                        re_det_html += '<td>' + re_det.id_bodega+ '</td>'; 
                        re_det_html += '<td>' + re_det.id_patio+ '</td>'; 
                        re_det_html += '<td>' + re_det.id_posicion+ '</td>'; 
                        re_det_html += '<td>' + re_det.observacion+ '</td>'; 
                        re_det_html += '<td>' + re_det.observacion_exb+ '</td>'; 
                        re_det_html += '<td>' + re_det.observacion_II+ '</td>'; 
                        re_det_html += '</tr>';

    });

    $('#datos_redet').html(re_det_html);
    $('#tbl_re_det').DataTable({
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

}).fail(function() {
    console.log("error change cliente");
})

}



function recargaRE(proyecto, cliente) {

var re_html = '';

var tabla_re_det = $('#tbl_re').DataTable();



tabla_re_det.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/ReporteEntrega/obtieneREFinal'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_proyecto: proyecto,
        id_cliente: cliente
    },
}).done(function(result) {


    $.each(result.re_final, function(key, re_f) {
        re_html += '<tr>';
                        re_html += '<td>' + re_f.id_re+ '</td>'; 
                        re_html += '<td>' + re_f.descripcion_proyecto+ '</td>'; 
                        re_html += '<td>' + re_f.area_proyecto+ '</td>'; 
                        re_html += '<td>' + re_f.descripcion_area+ '</td>'; 
                        re_html += '<td>' + re_f.fecha_emision+ '</td>'; 
                        re_html += '<td>' + re_f.emisor_re+ '</td>'; 
                        re_html += '<td>' + re_f.estado_re+ '</td>'; 
                        re_html += '<td>' + re_f.solicitante+ '</td>'; 
                        re_html += '<td>' + re_f.identificacion_solicitante+ '</td>'; 
                        re_html += '<td>' + re_f.cargo_solicitante+ '</td>'; 
                        re_html += '<td>' + re_f.fecha_solicitud+ '</td>'; 
                        re_html += '<td>' + re_f.entrega_directa+ '</td>'; 
                        re_html += '<td>' + re_f.fecha_entrega_sitio+ '</td>'; 
                        re_html += '<td>' + re_f.lugar_fisico+ '</td>';
                        re_html += '</tr>';
                        

    });

    $('#datos_re').html(re_html);
    $('#tbl_re').DataTable({
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
        "select":true,
        "colReorder": true,
        "scrollCollapse": true,
          "responsive": false,
          "lengthChange": true, 
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
                        }).buttons().container().appendTo('#tbl_re_wrapper .col-md-6:eq(0)');

}).fail(function() {
    console.log("error change cliente");
})

}


$('#verReporteRE').on('click', function() {

var table = $('#tbl_re').DataTable();
var data = table.row( this ).data();

var seleccionados = table.rows({ selected: true });
                       
if(!seleccionados.data().length){
    alert("No ha seleccionado ningún registro RE");
}else{

    window.open('<?php echo site_url('ReporteEntrega/muestraReservaPDFRE/')?>' + id_re_final ,'_blank');
}



});


$('#finalizarRE').on('click', function() {

    var opcion = confirm("Esta seguro que quiere finalizar la reserva de RE");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/ReporteEntrega/finalizarReservaRE'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
             id_re_final  : id_re_final
            },
      }).done(function(result) {

      if(result.resp){

       

        toastr.success(result.mensaje);
        recargaRE(0, 0);
        recargaREDet(0,0) ;
        window.open('<?php echo site_url('ReporteEntrega/creaFinalPDFRE/')?>' + id_re_final ,'_blank');

      }else{

        toastr.error(result.mensaje);

      }
        

      }).fail(function() {
      console.log("error eliminar order Item");
      })


}    


});
          
             </script>

           

    