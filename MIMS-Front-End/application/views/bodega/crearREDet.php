 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 <h1>Reserva de Material (RM)<h1>
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
                                             Información de Reserva
                                         </h3>
                                     </div>
        
                                     <form id="formactcabre" class="form-horizontal">                   
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">ID REPORTE DE ENTREGA:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="id_re" class="form-control" value="" name="id_re" readonly></div></dd>
                                             <dt class="col-sm-8">PROYECTO:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="descripcion_proyecto" class="form-control" value="" name="descripcion_proyecto" readonly></div></dd>
                                             <dt class="col-sm-8">ÁREA DE PROYECTO:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="area_proyecto" class="form-control" value="" name="area_proyecto"></div></dd>
                                             <dt class="col-sm-8">DESCRIPCIÓN DEL ÁREA:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="descripcion_area" class="form-control" value="" name="descripcion_area"></div></dd>
                                             <dt class="col-sm-8">SOLICITANTE:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="solicitante" class="form-control" value="" name="solicitante"></div></dd>
                                             <dt class="col-sm-8">IDENTIFICACIÓN SOLICITANTE:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="identificacion_solicitante" class="form-control" value="" name="identificacion_solicitante"></div></dd>
                                             <dt class="col-sm-8">CARGO DEL SOLICITANTE:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="cargo_solicitante" class="form-control" value="" name="cargo_solicitante"></div></dd>
                                             <dt class="col-sm-8">&nbsp;</dt>
                                             <dd class="col-sm-9">&nbsp;</dd>
                               
                                            
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
                                             <dd class="col-sm-9"><div class="form-group"><input required type="text" id="fecha_emision" class="form-control" value="" name="fecha_emision" readonly></div></dd>
                                             <dt class="col-sm-8">EMISOR RE:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="emisor_re" class="form-control" value="" name="emisor_re" readonly></div></dd>
                                             <dt class="col-sm-8">ESTADO RE:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="estado_re" class="form-control" value="" name="estado_re" readonly></div></dd>
                                             <dt class="col-sm-8">ENTREGA DIRECTA:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><div id="select_entrega_directa"></div></dd>
                                             <dt class="col-sm-8">FECHA DE SOLICITUD:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="fecha_solicitud" class="form-control" value="" name="fecha_solicitud" readonly></div></dd>
                                             <dt class="col-sm-8">FECHA ENTREGA EN SITIO:</dt>
                                             <dd class="col-sm-9"><div class="form-group"><input type="text" id="fecha_entrega_sitio" class="form-control fechapicker" value="" name="fecha_entrega_sitio"></div></dd>
                                             <dt class="col-sm-8">LUGAR FÍSICO:</dt>
                                             <dd class="col-sm-9"> <div class="form-group"><input type="text" required id="lugar_fisico" class="form-control" value="" name="lugar_fisico"></div></dd>
                                             </form>
                                             <dt class="col-sm-8">ACCION</dt>
                                             <dd class="col-sm-9"><button  id="btn_actualizar_re" onclick="ActualizaCabRE()" class="btn btn-success float-left"><i class="fas fa-pen-alt"></i>Actualizar Información de Reserva</button></div></dd>
                               
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>

                             <!-- /.col-md-6 -->
                             


                              </div>
                   

                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                            Detalle Reserva de Material
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
                                                     </i>  ACTUALIZAR</button>
                                                     <button style="display: none;" id="btn_cerrar_re" 
                                             class="btn btn-outline-primary float-right"><i class="fas fa-times-circle"></i>
                                               Confirmar Reserva</button>
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


 <div class="modal fade" id="modal-redet">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">Actualizar Datos – STOCKCODE</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form id="formredet" class="form-horizontal">

                     <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Actualizar Reserva de Material (RM)</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                  <input type="hidden" id="id_re_det" class="form-control" name="id_re_det" value="">
                                                  <input type="hidden" id="id_re_cab" class="form-control" name="id_re_cab" value="">
                                                  <input type="hidden" id="stockcode" class="form-control" name="stockcode" value="">

                                                        <div class="col-md-12">
                                                           
                                                        <div class="form-group"><label for="">CANTIDAD ENTREGADA</label><input type="text" id="st_cantidad_entregada" class="form-control" name="st_cantidad_entregada" value=""></div>
                                                            
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
                    <button id="btnSave" type="button" class="btn btn-primary" onclick="ActualizaREDet()">Actualizar</button>
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
recargaCabeceraRE(id_re);

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




$('#btn_cerrar_re').on('click', function() {

var id_re= <?php echo $id_re?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;

             
   $.ajax({
           url: '<?php echo base_url('index.php/ReporteEntrega/cerrarRE');?>',
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

                       window.open('<?php echo site_url('ReporteEntrega/creaReservaPDFRE/')?>' + id_re,'_self');

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
                        'onclick="obtieneREDet(' +re_det.id_re_cab+',' +re_det.id_re_det+')"' + 
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



function ActualizaCabRE() {


var id_re = <?php echo $id_re?> ;
var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;
var entrega_cliente = $('#entrega_directa').val();

data = new FormData(document.getElementById("formactcabre"));

data.append('entrega_directa', entrega_cliente);
             
   $.ajax({
           url: '<?php echo base_url('index.php/ReporteEntrega/ActualizaCabRE');?>',
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


function recargaCabeceraRE(id_re) {



             
   $.ajax({
           url: '<?php echo base_url('index.php/ReporteEntrega/obtieneCabRE');?>',
           type: 'post',
           data: {
                id_re: id_re
            },
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {


                    $.each(result.re_dets, function(key, re_det) {


                        $('#id_re').val(re_det.id_re);
                        $('#descripcion_proyecto').val(re_det.descripcion_proyecto);
                        $('#area_proyecto').val(re_det.area_proyecto);
                        $('#descripcion_area').val(re_det.descripcion_area);
                        $('#fecha_emision').val(re_det.fecha_emision);
                        $('#emisor_re').val(re_det.emisor_re);
                        $('#estado_re').val(re_det.estado_re);
                        $('#solicitante').val(re_det.solicitante);
                        $('#identificacion_solicitante').val(re_det.identificacion_solicitante);
                        $('#cargo_solicitante').val(re_det.cargo_solicitante);
                        $('#fecha_solicitud').val(re_det.fecha_solicitud);
                        $('#select_entrega_directa').html(re_det.select_entrega_directa);
                        $('#fecha_entrega_sitio').val(re_det.fecha_entrega_sitio);
                        $('#lugar_fisico').val(re_det.lugar_fisico);
                

                    });

               

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


function obtieneREDet(id_re, id_det_re){

    $.ajax({
           url: '<?php echo base_url('index.php/ReporteEntrega/obtieneREDet');?>',
           type: 'post',
           data: {
                id_det_re: id_det_re,
                id_re: id_re
            },
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {


                    $.each(result.re_dets, function(key, re_det) {


                        $('#id_re_det').val(re_det.id_re_det);
                        $('#id_re_cab').val(re_det.id_re_cab);
                        $('#stockcode').val(re_det.stockcode);

                        
                    
                        
                       
                        $('#st_cantidad_entregada').val(re_det.st_cantidad_entregada);
                
                        $('#modal-redet').modal('show');
                    });

               

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


function ActualizaREDet(id_re) {


var cod_empresa = <?php echo  $this->session->userdata('cod_emp')?>;
var id_re_cab = $('#id_re_cab').val();

data = new FormData(document.getElementById("formredet"));
             
   $.ajax({
           url: '<?php echo base_url('index.php/ReporteEntrega/ActualizaREDet');?>',
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

                       toastr.success(result.mensaje);
                       $('#modal-redet').modal('hide');
                       recargaREDet(id_re_cab, cod_empresa);

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