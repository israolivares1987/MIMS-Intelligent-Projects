 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Registros Control Calidad</h1>
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
                                             <dd class="col-sm-9"><?php echo $idOrden;?></dd>
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
                               Registro de Calidad
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
                                         <button id="btn_nuevo_registro"
                                             class="btn btn-outline-primary float-right">Nuevo registro de Calidad</button>
                                    </th>
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_ccalidad" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>Acciones</th>
                                     <th>Nombre Empleado</th>
                                     <th>Fecha Ingreso</th>
                                     <th>Numero Referencial</th>
                                     <th>Tipo Interaccion</th>
                                     <th>Solicitado por</th>
                                     <th>Aprobado por</th>
                                     <th>Comentarios Generales</th>
                                     <th>Respaldos</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_ccalidad">
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                                Control de Calidad
                            </h3>
                        </div>
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


      <!--.modal nuevo control Calidad-->
      <div id="modal_control_calidad" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Nuevo Registro Control Calidad</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="container">
                                 <form id="miForm" class="form-horizontal" enctype="multipart/form-data" method="post">
                                     <div class="col-md-12">

                                         <div class="form-group" data-select2-id="89">
                                             <div class="form-group">
                                                 <label class="control-label col-md-9">Nombre Empleado</label>
                                                 <div class="col-md-12">
                                                     <input id="nombre_empleado" name="nombre_empleado" placeholder="" class="form-control"
                                                         type="text" value="" readonly>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Tipo Interaccion</label>
                                                     <div class="col-md-12">
                                                         <select name="tipo_interaccion" id="var_tipo_interaccion"
                                                             class="form-control"
                                                             style="width: 100%;" tabindex="-1"
                                                             aria-hidden="true">
                                                             <?php echo $select_cc;?>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!--.form-horizontal-->
                                     </div>


                                     <div class="col-md-12" style="display: none;" id="interaction_ref">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Interaccion para Levantar</label>
                                                     <div class="col-md-12" id="select_interaction_ref">
                                                       
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!--.form-horizontal-->
                                     </div>



                                     <div class="col-md-12">


                                         <div class="form-group">
                                             <label>Fecha Ingreso</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="fecha_ingreso"  id="fecha_ingreso"  type="text" class="form-control"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>

                                     </div>




                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Numero Referencial</label>
                                             <div class="col-md-12">
                                                 <input name="numero_referencial" id="numero_referencial" placeholder="" class="form-control"
                                                     type="text" id="var_numero_referencial">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>

                                     </div>




                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Solicitado por</label>
                                             <div class="col-md-12">
                                                 <input name="solicitado_por"  id="solicitado_por" placeholder="" class="form-control"
                                                     type="text" id="var_solicitado_por">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                         <!--.col-md-12-->

                                     </div>


                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Aprobado por</label>
                                             <div class="col-md-12">
                                                 <input name="aprobado_por"  id="aprobado_por" placeholder="" class="form-control"
                                                     type="text" id="var_aprobado_por">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                         <!--.col-md-12-->

                                     </div>


                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Comentarios Generales</label>
                                             <div class="col-md-12">
                                                 <textarea id="var_comentarios_generales" name="comentarios_generales"
                                                     class="form-control" rows="10"
                                                     placeholder="Ingresar ..."></textarea>
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="col-md-12">


                                     <div class="form-group">
                                        <label for="exampleInputFile">Cargar Archivo</label>
                                            <div class="custom-file">
                                                <input type="file"   id="respaldos"  name="respaldos">     
                                        </div>
                                    </div>
                                        



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Notificar</label>
                                                     <div class="col-md-12">
                                                         <select name="notificacion" id="select_interaccion"
                                                             class="form-control"
                                                             style="width: 100%;" tabindex="-1"
                                                             aria-hidden="true" onchange="MostrarEmail(this);">
                                                             <option value="" selected></option>
                                                             <option value="S">SI</option>
                                                             <option value="N">NO</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                     </div>
                                     <input type="hidden" id="tipo" name="tipo"
                                         value="1">
                                     <input type="hidden" id="id_orden_compra" name="id_orden_compra"
                                         value="<?php echo $idOrden?>">
                                     <input type="hidden" id="id_cliente" name="id_cliente"
                                         value="<?php echo $idCliente?>">
                                     <input type="hidden" id="id_proyecto" name="id_proyecto"
                                         value="<?php echo $codProyecto?>">
                                     <input type="hidden" id="id_empleado" name="id_empleado"
                                         value="<?php echo $this->session->userdata('id_usuario')?>">

                                     <input type="hidden" id="id_interaccion" name="id_interaccion" value="">

                                     <div id="mailFrm" style="display: none;" class="col-md-12">
                                         <div class="field_wrapper">
                                             <table class="table table-striped table-bordered" cellspacing="1"
                                                 width="100%">
                                                 <tbody>
                                                     <tr>
                                                         <th>
                                                             <div class="col-md-12">
                                                                 <a href="javascript:void(0);"
                                                                     class="btn btn-block btn-outline-success btn-sm add_button"
                                                                     title="Add field"><i class="far fa-envelope"></i>
                                                                     Agregar Mail</a>
                                                             </div>
                                                         </th>
                                                     </tr>
                                                 </tbody>
                                             </table>

                                         </div>
                                     </div>
                                 </form>

                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button onclick="Guardar();" type="button"
                                 class="btn btn-outline-primary">Guardar</button>
                             <button type="button" class="btn btn-outline-secondary"
                                 data-dismiss="modal">Cerrar</button>
                         </div>
                     </div>
                 </div>
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


                 //Datemask dd-mm-yyyy
                 $('#datemask').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
                 })
                 //Datemask2 mm/dd/yyyy
                 $('#datemask2').inputmask('mm/dd/yyyy', {
                     'placeholder': 'mm/dd/yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()

                 var x = 1; //Initial field counter is 1 
                            var maxField = 10; //Input fields increment limitation
                            var addButton = $('.add_button'); //Add button selector
                            var wrapper = $('.field_wrapper'); //Input field wrapper
                            var fieldHTML = '<div col-md-12>' +
                                '<div class="input-group-prepend">' +
                                '<span class="input-group-text"><i class="fas fa-envelope"></i></span>' +
                                '<input autocomplete="off" type="text" name="var_email" value="" class="form-control varEmail"/>' +
                                '<a href="javascript:void(0);" class="btn btn-block btn-outline-danger btn-sm remove_button" title="Add field"><i class="far fa-envelope"></i> Eliminar Mail</a>' +
                                '</div>' +
                                '</div>'; //New input field html 



                            //Once add button is clicked
                            $(addButton).click(function() {
                                //Check maximum number of input fields
                                if (x < maxField) {
                                    x++; //Increment field counter
                                    $(wrapper).append(fieldHTML); //Add field html
                                }
                            });

                            //Once remove button is clicked
                            $(wrapper).on('click', '.remove_button', function(e) {
                                e.preventDefault();
                                $(this).parent('div').remove(); //Remove field html
                                x--; //Decrement field counter
                            });


             })
             </script>


<script type="text/javascript">




$(document).ready(function() {

var cliente = <?php echo $idCliente?> ;
var orden = <?php echo $idOrden?> ;
var proyecto = <?php echo $codProyecto?> ;
var save_method;
var url;

recargaControlCalidad(orden, cliente);
recargaCalidadDet(orden,cliente,proyecto);
formToggleDesactivar('interaction_ref');


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


$('#var_tipo_interaccion').on('change', function(){

var tipo_interaccion = this.value;

if (tipo_interaccion=='17'){

    formToggleActivar('interaction_ref');

}else{

    formToggleDesactivar('interaction_ref');

}



});





$('#btn_recargar').on('click', function() {

var cliente = <?php echo $idCliente?> ;
var orden = <?php echo $idOrden?>;

recargaControlCalidad(orden, cliente);

});

$('#btn_nuevo_registro').on('click', function() {

    save_method = 'add';

var element = document.getElementById('mailFrm');

if (element.style.display === "block") {
    element.style.display = "none";
}

$('#miForm')[0].reset();
$('#nombre_empleado').val('<?php echo $nombreEmpleador;?>');
$('#modal_control_calidad').modal('show');
$('#name_respaldo').html("");
obtieneSelects();
formToggleDesactivar('interaction_ref');

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

function recargaControlCalidad(orden, cliente) {

var calidad_html = '';

var tabla_calidad = $('#tbl_ccalidad').DataTable();



tabla_calidad.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/Journal/obtienejournalCalidad'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_orden_compra: orden,
        id_cliente: cliente,
        filtro: <?php echo $filtro;?>
    },
}).done(function(result) {


    $.each(result.journals, function(key, journal) {
        calidad_html += '<tr>';
        calidad_html += '<td>';
        calidad_html +='<button data-toggle="tooltip" data-placement="left" title="Desactiva Registro" ' +
                        'onclick="desactiva_registro_cc(' +journal.id_interaccion +','+ orden + ',' + cliente +')"' + 
                        'class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>' +
                        '<button data-toggle="tooltip" data-placement="left" title="Desactiva Registro" ' +
                        'onclick="edita_registro_cc(' +journal.id_interaccion +','+ orden + ',' + cliente +')"' + 
                        'class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
        calidad_html += '</td>';
        calidad_html += '<td>' + journal.nombre_empleado + '</td>';
        calidad_html += '<td>' + journal.fecha_ingreso + '</td>';
        calidad_html += '<td>' + journal.numero_referencial + '</td>';
        calidad_html += '<td>' + journal.tipo_interaccion + '</td>';
        calidad_html += '<td>' + journal.solicitado_por + '</td>';
        calidad_html += '<td>' + journal.aprobado_por + '</td>';
        calidad_html += '<td>' + journal.comentarios_generales + '</td>';
        calidad_html += '<td>' + journal.respaldos + '</td>';
        calidad_html += '</tr>';

    });


    $('#datos_ccalidad').html(calidad_html);
    $('#tbl_ccalidad').DataTable({
        language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
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
                        }).buttons().container().appendTo('#tbl_ccalidad_wrapper .col-md-6:eq(0)');

}).fail(function() {
    console.log("error change cliente");
})

}

function edita_registro_cc(id_interaccion, orden, cliente)
                {
                    save_method = 'update';
                    $('#miForm')[0].reset(); // reset form on modals
                 
                  
                    $.ajax({
                            url: 		'<?php echo base_url('index.php/Journal/obtienejournalCalidadDet'); ?>',
                            type: 		'POST',
                            dataType: 'JSON',
                            data: {
                                id_interaccion: id_interaccion,
                                orden: orden,
                                cliente: cliente
                                },
                        }).done(function(result) {

                            $.each(result.journals, function(key, journal) {

                            console.log(journal.id_interaccion);

                            $('#id_interaccion').val(journal.id_interaccion);
                            $('#nombre_empleado').val('<?php echo $nombreEmpleador;?>');
                            $('#fecha_ingreso').val(journal.fecha_ingreso);
                            $('#numero_referencial').val(journal.numero_referencial);
                            $('#solicitado_por').val(journal.solicitado_por);
                            $('#aprobado_por').val(journal.aprobado_por);
                            $('#var_comentarios_generales').val(journal.comentarios_generales);
                            $('#var_tipo_interaccion').val(journal.tipo_interaccion);

                        });

                            var element = document.getElementById('mailFrm');

                            if (element.style.display === "block") {
                                element.style.display = "none";
                            }

                            $('#modal_control_calidad').modal('show');
                            $('#name_respaldo').html("");
                            $('.modal-title').text('Editar Control de Calidad'); // Set title to Bootstrap modal title


                        }).fail(function() {
                            console.log("error edita Control de calidad");
                        })
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
'onclick="mostrar_ccd('+dato_calidad_det.id_control_calidad +','+ dato_calidad_det.id_control_calidad_det +','+ id_orden +','+id_cliente+','+id_proyecto+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list"></i></button>';
calidad_det_html += '</td>';
calidad_det_html += '<td>' + id_orden+ '</td>';
calidad_det_html += '<td>' + dato_calidad_det.id_control_calidad + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.descripcion_control_calidad + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.estado_cc_det + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.estado_porc_cc_det + '</td>';
calidad_det_html += '<td>' + dato_calidad_det.archivo_cc_det + '</td>';
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


function envioCorreo(idInsertado) {

var arrayEmail = new Array();
var inputEmails = document.getElementsByClassName('varEmail'),
    emailValues = [].map.call(inputEmails, function(dataEmail) {
        arrayEmail.push(dataEmail.value);
    });

arrayEmail.forEach(function(inputsValuesData) {



    let idControlCalidad = idInsertado;
    let email = inputsValuesData;
    let cod_empresa = '<?php echo $this->session->userdata('cod_emp');?>'
    $.ajax({
        url: '<?php echo base_url('index.php/Journal/enviarMail'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            id_control_calidad: idControlCalidad,
            email: email,
            cod_empresa: cod_empresa
        },
    }).done(function(result) {

        if (result.resp) {
            toastr.success(result.mensaje);
        } else {
            toastr.error(result.mensaje);
        }


    }).fail(function() {
        console.log("error guardar proy");
    })

});


}


function Guardar() {


// validar campos
var valido = false;
var falso = 0;

var data = new FormData(document.getElementById("miForm"));

var cliente = <?php echo $idCliente?>;
var orden = <?php echo $idOrden?>;


if (!validatefecha(data.get('fecha_ingreso'))) {

    toastr.warning('Fecha incorrecta, favor validar');

} else {

   
   if (data.get('notificacion') === 'S') {

           var arrayEmail = new Array();
           var inputEmails = document.getElementsByClassName('varEmail'),
               emailValues = [].map.call(inputEmails, function(dataEmail) {
                   arrayEmail.push(dataEmail.value);
               });

                   arrayEmail.forEach(function(inputsValuesData) {

                           let email = inputsValuesData;
                           if (!validateEmail(email)) {
                           falso++;
                           }
                           if (falso > 0) {

                               toastr.warning('Email: ' + email + ' no valido, favor revisar.');
                       }                
                   });
   } 


}




if(falso == 0 ){


    if(save_method == 'add') {
                        url = "<?php echo site_url('Journal/guardarJournal')?>";
                    } else {
                        url = "<?php echo site_url('Journal/actualizarJournal')?>";
                    }



   $.ajax({
           url:  url,
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

                       $('#modal_control_calidad').modal('hide');
                       recargaControlCalidad(orden, cliente);
                       toastr.success(result.mensaje);


                       if (data.get('notificacion') === 'S') {

                           envioCorreo(result.idInsertado);
                       }


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


}

function MostrarEmail(selectObj) {

// get the index of the selected option 
var idx = selectObj.selectedIndex;
// get the value of the selected option 
var which = selectObj.options[idx].value;
var element = document.getElementById('mailFrm');

if (which === 'S') {



    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }


} else {

    if (element.style.display === "block") {
        element.style.display = "none";
    } else {
        element.style.display = "none";
    }

}


}


function desactiva_registro_cc(id_interaccion, orden, cliente){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/Journal/desactivaJournal'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
        id_interaccion  : id_interaccion,
              id_orden : orden
            },
    }).done(function(result) {

      if(result.resp){

        recargaControlCalidad(orden, cliente)
        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);
      
      }
        

    }).fail(function() {
      console.log("error eliminar journal");
    })
  

}
             
}


function obtieneSelects(){


var cliente = <?php echo $idCliente?>;
var orden = <?php echo $idOrden?>;
var tipo =<?php echo $tipoJournal?>;


$.ajax({
  url: 		'<?php echo base_url('index.php/Consultas/obtieneSelect'); ?>',
  type: 		'POST',
  data:{
    id_orden_compra: orden,
    tipo: tipo,
    id_cliente: cliente
  },
  dataType: 'json'
  }).done(function(result) {

   
    $('#select_interaction_ref').html(result.select_cc_ref);



  }).fail(function() {
  console.log("error eliminar order");
  })


}





</script>