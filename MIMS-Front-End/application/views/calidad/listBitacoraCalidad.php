 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Registros Gestión de Calidad - FlashReport</h1>
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
                               Gestión de Calidad
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
                                             class="btn btn-outline-primary float-right">Nuevo registro Gestión de Calidad</button>
                                    </th>
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_ccalidad" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>Acciones</th>
                                     <th>Usuario</th>
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
                            Advertencias de Calidad / No Conformidades
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                         <table id="tbl_ccalidadadv" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th style="display: none;" ></th>
                                     <th style="display: none;" ></th>
                                     <th>Acciones</th>
                                     <th>Usuario</th>
                                     <th>Fecha Ingreso</th>
                                     <th>Numero Referencial</th>
                                     <th>Tipo Interaccion</th>
                                     <th>Solicitado por</th>
                                     <th>Aprobado por</th>
                                     <th>Comentarios Generales</th>
                                     <th>Respaldos</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_ccalidadadv">
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                            Hallazgos
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                         <table id="tbl_ccalidadhall" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th style="display: none;" ></th>
                                     <th style="display: none;" ></th>
                                     <th>Acciones</th>
                                     <th>Usuario</th>
                                     <th>Fecha Ingreso</th>
                                     <th>Numero Referencial</th>
                                     <th>Tipo Interaccion</th>
                                     <th>Solicitado por</th>
                                     <th>Aprobado por</th>
                                     <th>Comentarios Generales</th>
                                     <th>Respaldos</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_ccalidadhall">
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                               LEVANTAMIENTOS DE Advertencias, las No Conformidades y Hallazgos
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                         <table id="tbl_ccalidadlev" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>Usuario</th>
                                     <th>Fecha Ingreso</th>
                                     <th>Numero Referencial</th>
                                     <th>Tipo Interaccion</th>
                                     <th>Solicitado por</th>
                                     <th>Aprobado por</th>
                                     <th>Comentarios Generales</th>
                                     <th>Respaldos</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_ccalidadlev">
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                






                 </div>




     
<!--.modal nuevo orden-->
<div class="modal fade" id="modal_control_calidad">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">NUEVO REGISTRO Gestión de Calidad</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="miForm" class="form-horizontal">

                <input type="hidden" id="tipo" name="tipo" value="1">
                <input type="hidden" id="id_interaccion" name="id_interaccion" value="">
                <input type="hidden" id="id_interaccion_ref" name="id_interaccion_ref" value="">
                
                
                <input type="hidden" id="id_orden_compra" name="id_orden_compra" value="<?php echo $idOrden?>">  
                <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $idCliente?>">
                <input type="hidden" id="id_proyecto" name="id_proyecto" value="<?php echo $codProyecto?>">
                <input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $this->session->userdata('id_usuario')?>">

                     <section class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Gestión de Calidad</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-12">
                                                           
                                                        <div class="form-group"><label for="NOMBRE EMPELADO">NOMBRE EMPELADO</label><input name="nombre_empleado" placeholder="" class="form-control" type="text" value="<?php echo $nombreEmpleador;?>" readonly></div>
                                                            <div class="form-group"><label for="TIPO INTERACCION">TIPO INTERACCION</label> <select name="tipo_interaccion" id="tipo_interaccion" class="form-control"  style="width: 100%;"  tabindex="-1"  aria-hidden="true"> <?php echo $select_cc;?></select></div>
                                                            
                                                            <div class="form-group" style="display: none;" id="interaction_ref"><label for="TIPO INTERACCION PARA LEVANTAR">Interaccion para Levantar</label><div style="width: 100%;"  tabindex="-1"  aria-hidden="true" id="select_interaction_ref"></div></div>
                                                           
                                                            <div class="form-group"><label for="NUMERO REFERENCIAL"> NÚMERO REFERENCIAL</label>  <input name="numero_referencial" placeholder="" class="form-control" type="text" id="numero_referencial"></div>
                                                            <div class="form-group"><label for="SOLICITADOR POR">SOLICITADOR POR</label><input name="solicitado_por" placeholder="" class="form-control" type="text" id="solicitado_por"></div>
                                                            <div class="form-group"><label for="APROBADO POR">APROBADO POR</label><input name="aprobado_por" placeholder="" class="form-control" type="text" id="aprobado_por"></div>
                                                            <div class="form-group"><label for="COMENTARIOS GENERALES">COMENTARIOS GENERALES</label><textarea id="comentarios_generales" name="comentarios_generales" class="form-control" rows="10" placeholder="Ingresar ..."></textarea></div>
                                                            <div class="form-group"><label for="APROBADO POR">RESPALDO</label><input type="file"  class="form-control" id="respaldos" name="respaldos"></div>
                                                            <div class="form-group"><label for="NOTIFICAR">NOTIFICAR</label> <select name="notificacion" id="select_interaccion" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" onchange="MostrarEmail(this);"><option value="" selected></option> <option value="S">SI</option> <option value="N">NO</option></select></div>

                                                        </div>

                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">NOTIFICAR POR EMAIL</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                    <div class="col-md-12">

                                                        <div id="mailFrm" style="display: none;" class="col-md-12">    
                                                                <div class="field_wrapper">
                                                                    <table class="table table-striped table-bordered" cellspacing="1" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>
                                                                                    <div class="col-md-12">
                                                                                        <a href="javascript:void(0);"
                                                                                            class="btn btn-block btn-primary add_button"
                                                                                            title="Add field"><i class="far fa-envelope"></i>
                                                                                            Agregar Mail</a>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                         </div>
                                                          
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
                    <button onclick="Guardar();" type="button" class="btn btn-primary">Guardar</button>
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
formToggleDesactivar('interaction_ref');

recargaControlCalidadAdv(orden, cliente);
recargaControlCalidadLev(0, 0, 0, 0);
recargaControlCalidadHall(orden, cliente);


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


$('#tipo_interaccion').on('change', function(){

var tipo_interaccion = this.value;

if (tipo_interaccion=='17'){

    
    obtieneSelects();
    formToggleActivar('interaction_ref');

}else if(tipo_interaccion=='21'){

    
    obtieneSelectsHall();
    formToggleActivar('interaction_ref');

}else{

    formToggleDesactivar('interaction_ref');

}



});





$('#btn_recargar').on('click', function() {

var cliente = <?php echo $idCliente?> ;
var orden = <?php echo $idOrden?>;

recargaControlCalidad(orden, cliente);
recargaControlCalidadAdv(orden, cliente);
recargaControlCalidadHall(orden, cliente);

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
$('#tipo_interaccion').prop('disabled',false);
formToggleDesactivar('interaction_ref');

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
                        'onclick="desactiva_registro_cc(' +journal.id_interaccion +',' +journal.id_interaccion_ref +','+ orden + ',' + cliente +')"' + 
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
                        }).buttons().container().appendTo('#tbl_ccalidad_wrapper .col-md-6:eq(0)');

}).fail(function() {
    console.log("error change cliente");
})

}

function edita_registro_cc(id_interaccion, orden, cliente)
                {
                    save_method = 'update';
                    $('#miForm')[0].reset(); // reset form on modals
                    formToggleDesactivar('interaction_ref');
                 
                  
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

            
                            $('#id_interaccion').val(journal.id_interaccion);
                            $('#id_interaccion_ref').val(journal.id_interaccion_ref);
                            $('#nombre_empleado').val('<?php echo $nombreEmpleador;?>');
                            $('#fecha_ingreso').val(journal.fecha_ingreso);
                            $('#numero_referencial').val(journal.numero_referencial);
                            $('#solicitado_por').val(journal.solicitado_por);
                            $('#aprobado_por').val(journal.aprobado_por);
                            $('#comentarios_generales').val(journal.comentarios_generales);
                            $('#tipo_interaccion').val(journal.tipo_interaccion);
                            

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
                       recargaControlCalidadAdv(orden, cliente);
                       recargaControlCalidadHall(orden, cliente);
                       recargaControlCalidadLev(0, 0, 0, 0);
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


function desactiva_registro_cc(id_interaccion,id_interaccion_ref, orden, cliente){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/Journal/desactivaJournal'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
        id_interaccion  : id_interaccion,
        id_interaccion_ref  : id_interaccion_ref,
              id_orden : orden
            },
    }).done(function(result) {

      if(result.resp){

        recargaControlCalidad(orden, cliente);
        recargaControlCalidadAdv(orden, cliente);
        recargaControlCalidadHall(orden, cliente);
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


function obtieneSelectsHall(){


var cliente = <?php echo $idCliente?>;
var orden = <?php echo $idOrden?>;
var tipo =<?php echo $tipoJournal?>;


$.ajax({
  url: 		'<?php echo base_url('index.php/Consultas/obtieneSelectHall'); ?>',
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



function recargaControlCalidadAdv(orden, cliente) {

var calidad_html = '';

var tabla_calidad = $('#tbl_ccalidadadv').DataTable();



tabla_calidad.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/Journal/obtienejournalCalidadAdv'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_orden_compra: orden,
        id_cliente: cliente,
        filtro: 1
    },
}).done(function(result) {


    $.each(result.journals, function(key, journal) {
        calidad_html += '<tr>';
        calidad_html += '<td style="display: none;">' + journal.id_interaccion + '</td>';
        calidad_html += '<td style="display: none;">' + journal.id_interaccion_ref + '</td>';
        calidad_html += '<td>';
        calidad_html +='<button data-toggle="tooltip" data-placement="left" title="Desactiva Registro" ' +
                        'onclick="desactiva_registro_cc(' +journal.id_interaccion +',' +journal.id_interaccion_ref +','+ orden + ',' + cliente +')"' + 
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


    $('#datos_ccalidadadv').html(calidad_html);


    $('#tbl_ccalidadadv').DataTable({
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
                        }).buttons().container().appendTo('#tbl_ccalidadadv_wrapper .col-md-6:eq(0)');




}).fail(function() {
    console.log("error change cliente");
})

}

$('#tbl_ccalidadadv tbody').on('click', 'tr', function () {

var cliente = <?php echo $idCliente?>;
var orden = <?php echo $idOrden?>;
var table = $('#tbl_ccalidadadv').DataTable();


if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }






var data = table.row( this ).data();
  recargaControlCalidadLev(orden, cliente, data[0], data[1]);
} ); 



$('#tbl_ccalidadhall tbody').on('click', 'tr', function () {

var cliente = <?php echo $idCliente?>;
var orden = <?php echo $idOrden?>;
var table = $('#tbl_ccalidadhall').DataTable();


if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }






var data = table.row( this ).data();
  recargaControlCalidadLev(orden, cliente, data[0], data[1]);
} ); 


function recargaControlCalidadLev(orden, cliente, id_interaccion, id_interaccion_ref) {

var calidad_html = '';

var tabla_calidad = $('#tbl_ccalidadlev').DataTable();



tabla_calidad.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/Journal/obtienejournalCalidadLev'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_orden_compra: orden,
        id_cliente: cliente,
        id_interaccion: id_interaccion,
        id_interaccion_ref: id_interaccion_ref
    },
}).done(function(result) {


    $.each(result.journals, function(key, journal) {
        calidad_html += '<tr>';
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


    $('#datos_ccalidadlev').html(calidad_html);

    $('#tbl_ccalidadlev').DataTable({
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
                        }).buttons().container().appendTo('#tbl_ccalidadlev_wrapper .col-md-6:eq(0)');




}).fail(function() {
    console.log("error change cliente");
})

}


function recargaControlCalidadHall(orden, cliente) {

var calidad_html = '';

var tabla_calidad = $('#tbl_ccalidadhall').DataTable();



tabla_calidad.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/Journal/obtienejournalCalidadHall'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_orden_compra: orden,
        id_cliente: cliente,
        filtro: 1
    },
}).done(function(result) {


    $.each(result.journals, function(key, journal) {
        calidad_html += '<tr>';
        calidad_html += '<td style="display: none;">' + journal.id_interaccion + '</td>';
        calidad_html += '<td style="display: none;">' + journal.id_interaccion_ref + '</td>';
        calidad_html += '<td>';
        calidad_html +='<button data-toggle="tooltip" data-placement="left" title="Desactiva Registro" ' +
                        'onclick="desactiva_registro_cc(' +journal.id_interaccion +',' +journal.id_interaccion_ref +','+ orden + ',' + cliente +')"' + 
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


    $('#datos_ccalidadhall').html(calidad_html);


    $('#tbl_ccalidadhall').DataTable({
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
                        }).buttons().container().appendTo('#tbl_ccalidadhall_wrapper .col-md-6:eq(0)');




}).fail(function() {
    console.log("error change cliente");
})

}


</script>