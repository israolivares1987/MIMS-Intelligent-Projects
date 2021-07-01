 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Registros Dossier de Calidad</h1>
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
                                             Detalle Orden de Compra
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">Order ID:</dt>
                                             <dd class="col-sm-9"><?php echo $PurchaseOrderNumber;?></dd>
                                             <dt class="col-sm-8">Descripción:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($PurchaseOrderDescription);?>
                                             </dd>
                                             </dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Detalle Proyecto
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">Cliente:</dt>
                                             <dd class="col-sm-9"><?php echo $nombreCliente;?></dd>
                                             <dt class="col-sm-8">Proyecto:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($DescripcionProyecto);?></dd>
                                             </dd>
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
                            DOSSIER DE CALIDAD
                            </h3>
                        </div>
                        <table class="table" cellspacing="0" width="99%">
								   <tbody>
									   <tr>
										   <th>
										   <button onclick="listar_cc(<?php echo $idCliente?> ,<?php echo $codProyecto?>,<?php echo $idOrden?>)" id="btn_listar_cc" class="btn btn-outline-primary float-right mb-3">Nuego Registro de Dossier</button>
										   </th>
									   </tr>
								   </tbody>
							   </table>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_controlcalidaddet" class="table table-striped table-bordered" cellspacing="0" width=%100>
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Id Orden</th>
                                    <th>Id Control</th>
                                    <th>Descripcion Control</th>
                                    <th>Estado</th>
                                    <th>Porcentaje</th>
                                    <th>Archivo</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody id="datos_controlcalidaddet">
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                 </div>


<!-- /.Modal Cambio en Orden  -->
<div class="modal fade" id="modal-control-det">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifica Control Calidad</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="frm-cc-det">
    
                             <div class="form-group">
                                 <label class="control-label col-md-12">Estado Control de Calidad</label>
                                 <div class="col-md-12">
                                     <div id="s_estado_ccd"></div>
                                 </div>
                             </div>
             
             </br>
             </br>
             </br>
            <div class="form-group">
            <label class="control-label col-md-12">Porcentaje Avance</label>
                           <div class="slider-wrapper" id="input_range_ccd">
                          
                               
                            </div>
                    <span class="font-weight-bold text-primary ml-2 valueSpan2"></span>
                </div>
         

                <div class="form-group">
                        <label for="exampleInputFile">Cargar Archivo</label>
                            <div class="custom-file">
                                <input type="file"   id="archivo_cc_det"  name="archivo_cc_det">     
                        </div>
                    </div>
                   


                  <input type="hidden" id="id_order_cc" name="id_order_cc" value="">
                  <input type="hidden" id="id_proyecto_cc" name="id_proyecto_cc" value=""> 
                  <input type="hidden" id="id_cliente_cc" name="id_cliente_cc" value="">
                  <input type="hidden" id="id_cc_det" name="id_cc_det" value="">
                  <input type="hidden" id="id_cc" name="id_cc" value="">


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="btn-grabar-calidad-det" class="btn btn-primary">Grabar</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal final cambio ccd-->


 <!--.modal control de calidad-->
 <div class="modal fade" id="modal_control_calidad">
        <div class="modal-dialog modal-lg">
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
                                        Ingresar Control de Calidad
                                      </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                            <table class="table" cellspacing="0" width="99%">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                        <div class="form-group"><label for="cc_select">CONTROL CALIDAD</label><div id="cc_select"></div></div>
                                                        <div class="form-group"><label for="observacion">OBSERVACION</label><input type="text" id="observacion" class="form-control" value="" name="observacion"></div>
                                                                                                                      </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                      </div>
                            
                                    <!-- /.card-body -->
                            </div>

                         <input type="hidden" id="id_order_cc" name="id_order_cc" value="">
                          <input type="hidden" id="id_proyecto_cc" name="id_proyecto_cc" value=""> 
                          <input type="hidden" id="id_cliente_cc" name="id_cliente_cc" value="">
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button id="btn_agregar_cc" type="button" class="btn btn-primary">Agregar</button>
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
    height: 100%;
}
</style>


<script type="text/javascript">




$(document).ready(function() {

var cliente = <?php echo $idCliente?> ;
var orden = <?php echo $idOrden?> ;
var proyecto = <?php echo $codProyecto?> ;
var save_method;
var url;

recargaCalidadDet(orden,cliente,proyecto);


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


$('#btn-grabar-calidad-det').on('click', function(){

var formData = new FormData(document.getElementById("frm-cc-det"));


$.ajax({
            url: '<?php echo base_url('index.php/ControlCalidadDet/actualizaControlCalidadDet');?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function(){
            mostrarBlock();
            },
            success: function(data){

                if (data.resp) //if success close modal and reload ajax table
                    {
                          recargaCalidadDet( $('#id_order_cc').val(), $('#id_cliente_cc').val() ,$('#id_proyecto_cc').val() );

                        $('#modal-control-det').modal('hide');
                            toastr.success(data.mensaje);
                    } else {
                        toastr.error(data.mensaje);

                    }
                 

            },
            complete:function(){
                $.unblockUI();
            },
            error: function(request, status, err) {

            toastr.error("error: " + request + status + err);
            toastr.error(data.mensaje);
            toastr.error("error: " + request + status + err);
            $.unblockUI();         
        }
            });


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


function recargaCalidadDet(id_orden,id_cliente,id_proyecto){


var calidad_det_html ='';
var tabla_calidad_det =  $('#tbl_controlcalidaddet').DataTable();
var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

tabla_calidad_det.destroy();

$.ajax({
url: 		'<?php echo base_url('index.php/ControlCalidadDet/obtieneControlCalidadDet'); ?>',
type: 		'POST',
dataType: 'json',
data: {
        id_orden : id_orden,
        id_cliente : id_cliente,
        id_proyecto : id_proyecto,
        cod_empresa : cod_empresa

    },
}).done(function(result) {

$.each(result.datos_calidad_det,function(key, dato_calidad_det) {
calidad_det_html += '<tr>';
calidad_det_html += '<td>';
calidad_det_html += '<button data-nombre="'+ dato_calidad_det.id_control_calidad_det +'" data-toggle="tooltip" data-placement="left" title="Actualizar Control de Calidad" '+
'onclick="mostrar_ccd('+dato_calidad_det.id_control_calidad +','+ dato_calidad_det.id_control_calidad_det +','+ id_orden +','+id_cliente+','+id_proyecto+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list"></i></button>' +
'<button data-nombre="'+ dato_calidad_det.id_control_calidad_det +'" data-toggle="tooltip" data-placement="left" title="Borrar Control de Calidad" '+
    'onclick="borrar_cc('+ dato_calidad_det.id_control_calidad_det +','+ id_orden +','+id_cliente+','+id_proyecto+')" class="btn btn-outline-danger btn-sm mr-1"><i class="fas fa-trash"></i></button>';
calidad_det_html += '</td>';
calidad_det_html += '<td>' + id_orden+ '</td>';
calidad_det_html += '<td>' + dato_calidad_det.id_control_calidad + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.descripcion_control_calidad + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.estado_cc_det + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.estado_porc_cc_det + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.archivo_cc_det + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.observacion + '</td>';
calidad_det_html += '</tr>';

});


    $('#datos_controlcalidaddet').html(calidad_det_html);

    $('#tbl_controlcalidaddet').DataTable({
      
        language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
                        }).buttons().container().appendTo('#tbl_controlcalidaddet_wrapper .col-md-6:eq(0)');

    }).fail(function() {
    console.log("error change ccdet");
    })


}


function mostrar_ccd(id_control_calidad,id_control_calidad_det,id_orden,id_cliente,id_proyecto){



$.ajax({
url: 		'<?php echo base_url('index.php/ControlCalidadDet/obtieneControlCalidadDetxId'); ?>',
type: 		'POST',
dataType: 'json',
data: {
    id_control_calidad : id_control_calidad,
    id_control_calidad_det : id_control_calidad_det,
    id_orden : id_orden,
    id_cliente : id_cliente,
    id_proyecto : id_proyecto
      },
}).done(function(result) {
  

$('#id_order_cc').val(id_orden); 
$('#id_proyecto_cc').val(id_proyecto); 
$('#id_cliente_cc').val(id_cliente); 
$('#id_cc_det').val(id_control_calidad_det); 
$('#id_cc').val(id_control_calidad); 

$('#input_range_ccd').html(result.estado_porc_cc_det); 
$('#s_estado_ccd').html(result.select_estadoccd); 
$('#observacion').html(result.observacion); 

const $valueSpan = $('.valueSpan2');
    const $value = $('#estado_porc_cc_det');
    $valueSpan.html($value.val());
    $value.on('input change', () => {
        $valueSpan.html($value.val());
    });


$('#modal-control-det').modal('show'); 


}).fail(function() {
console.log("error obtener cc det");
})

}

function listar_cc(id_cliente,id_proyecto,id_orden){

    recargaControlCalidad(id_cliente ,id_proyecto,id_orden);
 
 $('#id_order_cc').val(id_orden);
 $('#id_proyecto_cc').val(id_proyecto);
 $('#id_cliente_cc').val(id_cliente);
   

 $('#modal_control_calidad').modal('show');

}


$('#btn_agregar_cc').on('click', function(){

var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

let select     = $('#select_cc');
let id_control_calidad = $('#select_cc').val();


var id_cliente = $('#id_cliente_cc').val();
var id_proyecto = $('#id_proyecto_cc').val();
var id_orden = $('#id_order_cc').val();
var observacion = $('#observacion').val();



                    $.ajax({
                            url: '<?php echo base_url('index.php/ControlCalidadDet/guardaControlCalidadDet');?>',
                            type: 'post',
                            data: {
                              id_control_calidad : id_control_calidad,
                              id_cliente : id_cliente,
                              id_proyecto : id_proyecto,
                              id_orden : id_orden,
                              observacion : observacion,
                              cod_empresa : cod_empresa
                            },
                            dataType: "JSON",
                            beforeSend: function(){
                            mostrarBlock();
                            },
                            success: function(result){

                                if (result.resp) {

                                        
                                        recargaCalidadDet(id_orden,id_cliente,id_proyecto);
                                        toastr.success(result.mensaje);
                                        $('#modal_control_calidad').modal('hide');
                                        $('#observacion').val("");
                                        $.unblockUI();
                                        }else{
                                          $.unblockUI();
                                        toastr.warning(result.mensaje);
                                        }

                            },
                            complete:function(result){
                              $.unblockUI();
                            },
                            error: function(request, status, err) {
    
                            toastr.error("error: " + request + status + err);
                            $.unblockUI();
                          }
                 });

});


function recargaControlCalidad(id_cliente ,id_proyecto,id_orden){

var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

  $.ajax({
      url: '<?php echo base_url('index.php/ControlCalidad/obtieneControlCalidad');?>',
      type: 'POST',
      dataType: 'json',
      data: {
        codEmpresa: cod_empresa,
        id_cliente :id_cliente,
        id_proyecto : id_proyecto,
        id_orden : id_orden
      },
  }).done(function(result) {
    
    dato_calidad_html = '<select class="form-control" id="select_cc" name="select_cc">';
    
    $.each(result.datos_calidad, function(key, dato_calidad) {
          
          dato_calidad_html += '<option value='+dato_calidad.id_control_calidad + '>'+dato_calidad.descripcion_control_calidad+'</option>';
                                              
      });

      dato_calidad_html += '</select>';


  $('#cc_select').html(dato_calidad_html);

  recargaCalidadDet(id_orden,id_cliente,id_proyecto);

  }).fail(function() {
      console.log("error listar CC");
  })

}

function borrar_cc(id_control_calidad_det,id_orden,id_cliente,id_proyecto){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

    $.ajax({
    url: 		'<?php echo base_url('index.php/ControlCalidadDet/eliminaControlCalidadDet');?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_control_calidad_det : id_control_calidad_det,
            id_orden : id_orden,
            id_cliente : id_cliente,
            id_proyecto : id_proyecto
          },
  }).done(function(result) {

    if(result.resp){

      recargaCalidadDet(id_orden,id_cliente,id_proyecto);
      toastr.success(result.mensaje);
      $('#observacion').val("");

    }else{

      toastr.error(result.mensaje);
    
    }
      

  }).fail(function() {
    console.log("error eliminar cc det");
  })


}



}


</script>