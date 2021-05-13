 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 <h1>RESERVA REPORTE DE ENTREGA(RE)<h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             REPORTE DE ENTREGA
                                         </h3>
                                     </div>

                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">ID REPORTE DE ENTREGA:</dt>
                                             <dd class="col-sm-9"><?php echo $id_re;?></dd>
                                             <dt class="col-sm-8">PROYECTO:</dt>
                                             <dd class="col-sm-9"><?php echo $descripcion_proyecto;?></dd>
                                             <dt class="col-sm-8">ÁREA DE PROYECTO:</dt>
                                             <dd class="col-sm-9"><?php echo $area_proyecto;?></dd>
                                             <dt class="col-sm-8">DESCRIPCIÓN DEL ÁREA:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($descripcion_area);?>
                                             <dt class="col-sm-8">SOLICITANTE:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($identificacion_solicitante);?>
                                             <dt class="col-sm-8">CARGO DEL SOLICITANTE:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($cargo_solicitante);?>
                                             <dt class="col-sm-8">FECHA DE SOLICITUD:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($fecha_solicitud);?>                                             
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">&nbsp;
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                        
                                             <dt class="col-sm-8">FECHA EMISIÓN RE:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($fecha_emision);?>
                                             <dt class="col-sm-8">EMISOR RE:</dt>
                                             <dd class="col-sm-9"><?php echo $emisor_re;?></dd>
                                             <dt class="col-sm-8">ESTADO RE:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($estado_re);?></dd>
                                             <dt class="col-sm-8">ENTREGA DIRECTA:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($entrega_directa);?></dd>
                                             <dt class="col-sm-8">&nbsp;</dt>
                                             <dd class="col-sm-9">&nbsp;</dd>
                                             <dt class="col-sm-8">FECHA ENTREGA EN SITIO:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($fecha_entrega_sitio);?></dd>
                                             <dt class="col-sm-8">LUGAR FÍSICO:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($lugar_fisico);?></dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                         </div>
                         <!-- /.row -->
                     <!-- /.card-header -->

                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                           DETALLE REPORTE DE ENTREGA
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                         <button id="btn_recargar"
                                             class="btn btn-outline-secondary float-right"><i class="fas fa-spinner">
                                                     </i>  Actualizar</button>
                                                     <button style="display: none;" id="btn_cerrar_re"
                                             class="btn btn-outline-primary float-right"><i class="fas fa-times-circle"></i>
                                               Cerrar RE</button>
                                    </th>
                                   
                                       
                                    
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_re_det" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>ACCIONES</th>
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
                                     <th>OBS II.</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_redet">
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                 </div>


 <div class="modal fade" id="modal-rrdet">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">EDITAR REPORTE DE RECEPCIÓN(RR)</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="formrrdet" class="form-horizontal">
                     <input type="hidden" value="" name="idProyecto" />
                     <input type="hidden" value="" name="idCliente" />
                     <input type="hidden" value="" name="codEmpresa" />

                     <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">ACTUALIZAR REPORTE DE RECEPCIÓN(RR)</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                      <input type="hidden" id="id_rr_det" class="form-control" name="id_rr_det" value="">
                                                      <input type="hidden" id="id_rr_cab" class="form-control" name="id_rr_cab" value="">  
                                                      <input type="hidden" id="id_orden_compra" class="form-control" name="id_orden_compra" value="">
                                                      <input type="hidden" id="numero_linea_det" class="form-control" name="numero_linea_det" value="">
                                                      <input type="hidden" id="numero_linea_wpanel" class="form-control" name="numero_linea_wpanel" value="">


                                                        <div class="col-md-6">
                                                           
                                                        
                                                                <div class="form-group"><label for="st cantidad">CANTIDAD SOLICITADA</label><input type="text" id="st_cantidad" class="form-control" value="" name="st_cantidad" readonly></div>
                                                                <div class="form-group"><label for="st cantidad recibida">CANTIDAD RECIBIDA</label><input type="text" id="st_cantidad_recibida" class="form-control" value="" name="st_cantidad_recibida"></div>
                                                                <div class="form-group">
                                                                   <label for="id bodega">BODEGA</label>
                                                                      <div id="select_bodega">
                                                                      </div>
                                                                </div>
                                                                <div class="form-group"><label for="id carpa">CARPA</label><input type="text" id="id_carpa" class="form-control" name="id_carpa" value=""></div>
                                                                <div class="form-group"><label for="id carpa">INSPECCIÓN EI</label>  <select name="inspeccion_requerida" id="inspeccion_requerida"
                                                                                            class="form-control">
                                                                                            <option value="" selected></option>
                                                                                            <option value="S">SI</option>
                                                                                            <option value="N">NO</option></select> </div>
                                                            
                                                        </div>

                                                        <div class="col-md-6">
                                                                <div class="form-group"><label for="id patio">PATIO</label><input type="text" id="id_patio" class="form-control" name="id_patio" value=""></div>
                                                                <div class="form-group"><label for="id posicion">POSICIÓN</label><input type="text" id="id_posicion" class="form-control" name="id_posicion" value=""></div>
                                                                <div class="form-group"><label for="observacion">OBSERVACIÓN</label><input type="text" id="observacion" class="form-control" name="observacion" value=""></div>
                                                                <div class="form-group"><label for="observacion">OBSERVACIÓN EXB</label><input type="text" id="observacion_exb" class="form-control" name="observacion_exb" value=""></div>
                                                               
                                                                </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                    </section>

                     
                 </form>
             </div>

             <div class="modal-footer justify-content-between">
                    <button id="btnSave" type="button" class="btn btn-primary" onclick="ActualizaRRDet()">Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
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


<script>
             $(function() {
                 //Initialize Select2 Elements


             


             })
             </script>


<script type="text/javascript">




$(document).ready(function() {

var id_re = <?php echo $id_re?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

var url;

recargaREDet(id_re, cod_empresa);

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






$('#btn_cerrar_re').on('click', function() {

var id_re = <?php echo $id_re?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

             
   $.ajax({
           url: '<?php echo base_url('index.php/Bodega/cerrarRR');?>',
           type: 'post',
           data: {
            id_re : id_re
           },
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {

                       
                       toastr.success(result.mensaje);
                       mostrarBlock();

                       window.open('<?php echo site_url('Bodega/creaPDFRR/')?>' + id_rr_recepcion,'_self');

                       }else{

                       toastr.warning(result.mensaje);
                       }

           },
           complete:function(result){
               $.unblockUI();
           },
           error: function(request, status, err) {

           toastr.error("error: " + request + status + err);

}
           });

});


$('#btn_recargar').on('click', function() {

var id_re = <?php echo $id_re?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

recargaREDet(id_re, cod_empresa);

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
        re_det_html += '<td>';
        re_det_html +='<button data-toggle="tooltip" data-placement="left" title="Actualiza Datos"' +
                        'onclick="obtieneREDet(' +re_det.id_re_det+')"' + 
                        'class="btn btn-outline-success btn-sm"><i class="fas fa-pen-square"></i></button>'
                        re_det_html += '</td>';
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

    if(result.botonCierre){

        formToggleActivar('btn_cerrar_re');
    }else{
        formToggleDesactivar('btn_cerrar_re');
    }

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
         "select": true,
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


</script>