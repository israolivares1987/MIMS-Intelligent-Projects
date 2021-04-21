 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 <h1>REPORTE DE RECEPCIÓN(RR)<h1>
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
                                             REPORTE DE RECEPCIÓN
                                         </h3>
                                     </div>


                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">Id Reporte Recepcion:</dt>
                                             <dd class="col-sm-9"><?php echo $id_rr_recepcion;?></dd>
                                             <dt class="col-sm-8">Fecha Creacion:</dt>
                                             <dd class="col-sm-9"><?php echo $fecha_creacion;?></dd>
                                             <dt class="col-sm-8">Fecha Entrega:</dt>
                                             <dd class="col-sm-9"><?php echo $fecha_entrega;?></dd>
                                             <dt class="col-sm-8">Usuario creacion:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($usuario_creacion);?>
                                             <dt class="col-sm-8">Cliente:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($descripcion_cliente);?>
                                             <dt class="col-sm-8">Proyecto:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($descripcion_proyecto);?>

                                             
                                             
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
                                        
                                             <dt class="col-sm-8">Orden de Compra:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($id_orden_compra);?>
                                             <dt class="col-sm-8">Orden de Compra Cliente:</dt>
                                             <dd class="col-sm-9"><?php echo $id_orden_cliente;?></dd>
                                             <dt class="col-sm-8">Descripcion Orden de Compra:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($descripcion_orden);?></dd>
                                             <dt class="col-sm-8">Guia de Despacho:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($guia_despacho);?></dd>
                                             <dt class="col-sm-8">Proveedor:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($proveedor);?></dd>
                                             <dt class="col-sm-8">&nbsp;</dt>
                                             <dd class="col-sm-9">&nbsp;</dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                         </div>
                         <!-- /.row -->
                     <!-- /.card-header -->

                     <div class="row">
                             <div class="col-lg-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             SELECCIONAR BODEGA
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                     <form action="#" id="formactbodega" class="form-horizontal">
                   
                                                        <div class="col-md-12">
                                                        
                                                                <input type="hidden" id="id_rr_cab_bod" class="form-control" name="id_rr_cab_bod" value="<?php echo $id_rr?>"> 
                                                                <div class="form-group"><label for="id bodega">BODEGA</label><?php echo $select_bodegas;?></div>
                                                                <div class="form-group"><label for="id carpa">CARPA</label><input type="text" id="id_carpa_cab" class="form-control" name="id_carpa_cab" value=""></div>
                                                                <div class="form-group"><label for="id patio">PATIO</label><input type="text" id="id_patio_cab" class="form-control" name="id_patio_cab" value=""></div>
                                                                <div class="form-group"><label for="id posicion">POSICIÓN</label><input type="text" id="id_posicion_cab" class="form-control" name="id_posicion_cab" value=""></div>
                                                         </div>

                                    </form>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <div class="modal-footer justify-content-between">
                                <button id="btnSaveBodega" type="button" class="btn btn-primary" onclick="ActualizaBodegaRRDet()">Actualizar Bodega</button>

                            </div>
                         </div>
                         <!-- /.row -->
                     <!-- /.card-header -->

                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                           DETALLE REPORTE DE RECEPCIÓN
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
                                                     <button style="display: none;" id="btn_cerrar_rr"
                                             class="btn btn-outline-primary float-right"><i class="fas fa-times-circle"></i>
                                               Cerrar RR</button>
                                    </th>
                                   
                                       
                                    
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_rr_det" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>ACCIONES</th>
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

var id_rr_recepcion = <?php echo $id_rr?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

var url;

recargaRRDet(id_rr_recepcion, cod_empresa);

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






$('#btn_cerrar_rr').on('click', function() {

var id_rr_recepcion = <?php echo $id_rr?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

             
   $.ajax({
           url: '<?php echo base_url('index.php/Bodega/cerrarRR');?>',
           type: 'post',
           data: {
            id_rr : id_rr_recepcion
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

var id_rr_recepcion = <?php echo $id_rr?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

recargaRRDet(id_rr_recepcion, cod_empresa);

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
        rr_det_html += '<td>';
        rr_det_html +='<button data-toggle="tooltip" data-placement="left" title="Actualiza Datos"' +
                        'onclick="obtieneRRDet(' +rr_det.id_rr_det+','+ id_rr_recepcion+')"' + 
                        'class="btn btn-outline-success btn-sm"><i class="fas fa-pen-square"></i></button>'
        rr_det_html += '</td>';
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

    if(result.botonCierre){

        formToggleActivar('btn_cerrar_rr');
    }else{
        formToggleDesactivar('btn_cerrar_rr');
    }

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


function obtieneRRDet(id_rr_det,id_rr_recepcion){



$.ajax({
url: 		'<?php echo base_url('index.php/Bodega/obtieneRRDet'); ?>',
type: 		'POST',
dataType: 'json',
data: {
    id_rr_det : id_rr_det,
    id_rr_recepcion : id_rr_recepcion
      },
}).done(function(result) {

    $('#formrrdet')[0].reset(); // reset form on modals
 

$('#id_rr_det').val(result.id_rr_det); 
$('#id_rr_cab').val(result.id_rr_cab); 
$('#st_cantidad').val(result.st_cantidad); 
$('#st_cantidad_recibida').val(result.st_cantidad_recibida); 
$('#select_bodega').html(result.select_bodega); 
$('#id_carpa').val(result.id_carpa); 
$('#id_patio').val(result.id_patio); 
$('#id_posicion').val(result.id_posicion); 
$('#observacion').val(result.observacion); 
$('#id_orden_compra').val(result.id_orden_compra); 
$('#numero_linea_wpanel').val(result.numero_linea_wpanel); 
$('#observacion_exb').val(result.observacion_exb); 
$('#inspeccion_requerida').val(result.inspeccion_requerida); 



$('#modal-rrdet').modal('show');



}).fail(function(error) {
console.log("error " + error);
})

}




function ActualizaRRDet() {


var id_rr_recepcion = <?php echo $id_rr?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

data = new FormData(document.getElementById("formrrdet"));
             
   $.ajax({
           url: '<?php echo base_url('index.php/Bodega/ActualizaRRDet');?>',
           type: 'post',
           data: data,
           contentType: false,
           processData: false,
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {

                       $('#modal-rrdet').modal('hide');
                       recargaRRDet(id_rr_recepcion, cod_empresa);

                       toastr.success(result.mensaje);

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


}


function ActualizaBodegaRRDet() {


var id_rr_recepcion = <?php echo $id_rr?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

data = new FormData(document.getElementById("formactbodega"));
             
   $.ajax({
           url: '<?php echo base_url('index.php/Bodega/ActualizarBodegaDet');?>',
           type: 'post',
           data: data,
           contentType: false,
           processData: false,
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {

                       recargaRRDet(id_rr_recepcion, cod_empresa);

                       toastr.success(result.mensaje);

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


}

</script>