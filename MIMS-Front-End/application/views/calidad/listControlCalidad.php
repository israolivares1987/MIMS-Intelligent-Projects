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
                                             <dt class="col-sm-4">Order ID:</dt>
                                             <dd class="col-sm-6"><?php echo $idOrden;?></dd>
                                             <dt class="col-sm-4">Descripción:</dt>
                                             <dd class="col-sm-6"><?php echo urldecode($PurchaseOrderDescription);?>
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
                                             <dt class="col-sm-4">Cliente:</dt>
                                             <dd class="col-sm-6"><?php echo $nombreCliente;?></dd>
                                             <dt class="col-sm-4">Proyecto:</dt>
                                             <dd class="col-sm-6"><?php echo urldecode($DescripcionProyecto);?></dd>
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
                     <div class="card-body">
                         <br />
                         <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                         <button id="btn_recargar"
                                             class="btn btn-outline-secondary float-right">Recargar</button>
                                    </th>
                                 </tr>
                             </tbody>
                         </table>

                         <br />

                         <table id="tbl_ccalidad" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>Nombre Empleado</th>
                                     <th>Fecha Ingreso</th>
                                     <th>Numero Referencial</th>
                                     <th>Tipo Interaccion</th>
                                     <th>Solicitado por</th>
                                     <th>Aprobado por</th>
                                     <th>Comentarios Generales</th>
                                     <th>Respaldos</th>
                                     <th>Acciones</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_ccalidad">
                             </tbody>
                         </table>
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



             <script type="text/javascript">

                            $(document).ready(function() {

                            var cliente = <?php echo $idCliente?> ;
                            var orden = <?php echo $idOrden?> ;

                            recargaControlCalidad(orden, cliente);



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

                            var x = 1; //Initial field counter is 1 
                            var maxField = 10; //Input fields increment limitation
                            var addButton = $('.add_button'); //Add button selector
                            var wrapper = $('.field_wrapper'); //Input field wrapper
                            var fieldHTML = '<div col-md-12>' +
                                '<div class="input-group-prepend">' +
                                '<span class="input-group-text"><i class="fas fa-envelope"></i></span>' +
                                '<input type="text" name="var_email" value="" class="form-control varEmail"/>' +
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




                            });   


function mostrarBlock(){
		$.blockUI({ 
                message: '<h5><img style=\"width: 12px;\" src="<?php echo base_url('assets/images/loading.gif');?>" />&nbsp;Espere un momento...</h5>',
            css:{
				backgroundColor: '#0063BE',
				opacity: .8,
				'-webkit-border-radius': '10px', 
	            '-moz-border-radius': '10px',
	            color: '#fff'
			}
		});
	}

             $('#btn_recargar').on('click', function() {

                 var cliente = <?php echo $idCliente?> ;
                 var orden = <?php echo $idOrden?>;

                 recargaControlCalidad(orden, cliente);

             });

             $('#btn_nuevo_registro').on('click', function() {

                 var element = document.getElementById('mailFrm');

                 if (element.style.display === "block") {
                     element.style.display = "none";
                 }

                 $('#miForm')[0].reset();
                 $('#modal_control_calidad').modal('show');
                 $('#name_respaldo').html("");

             });

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
             function ver_archivo(){
                
                var archivo = document.getElementById('var_respaldos').value;
                var nombre = archivo.substring(archivo.lastIndexOf("\\")+1,archivo.length-4);
                $('#name_respaldo').html(nombre);
             }

             /**
              * Función que pone el archivo en un FormData
              * @return FormData
              */
             function getFiles() {
                 var idFiles = document.getElementById("var_respaldos");
                 // Obtenemos el listado de archivos en un array
                 var archivos = idFiles.files;
                 // Creamos un objeto FormData, que nos permitira enviar un formulario
                 // Este objeto, ya tiene la propiedad multipart/form-data
                 var data = new FormData();
                 // Recorremos todo el array de archivos y lo vamos añadiendo all
                 // objeto data
                 for (var i = 0; i < archivos.length; i++) {
                     // Al objeto data, le pasamos clave,valor
                     data.append("archivo" + i, archivos[i]);
                 }
                 return data;
             }

             /**
              * Función que recorre todo el formulario para apadir en el FormData los valores del formulario
              * @param string id hace referencia al id del formulario
              * @param FormData data hace referencia al FormData
              * @return FormData
              */
             function getFormData(id, data) {
                 $("#" + id).find("input,select,textarea").each(function(i, v) {
                     if (v.type !== "file") {
                         if (v.type === "checkbox" && v.checked === true) {
                             data.append(v.name, "on");
                         } else {
                             data.append(v.name, v.value);
                         }
                     }
                 });
                 return data;
             }


             function Guardar() {


                 // validar campos
                 var valido = false;
                 var falso = 0;

                 var data = getFiles();
                 data = getFormData("miForm", data);

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

  

                    $.ajax({
                            url: '<?php echo base_url('index.php/Journal/guardarJournal');?>',
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
                         id_cliente: cliente
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
                         calidad_html += '<td>';
                         calidad_html +=
                             '<button data-toggle="tooltip" data-placement="top" title="Desactiva Registro" onclick="desactiva_registro_cc(' +
                             journal.id_interaccion +','+ orden + ',' + cliente +
                             ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                         calidad_html += '</td>';
                         calidad_html += '</tr>';

                     });


                     $('#datos_ccalidad').html(calidad_html);
                     $('#tbl_ccalidad').DataTable({language: {
                          url: '<?php echo base_url('assets/datatables/lang/esp.js');?>'
                         },
                         "paging": true,
                         "lengthChange": false,
                         "searching": false,
                         "ordering": true,
                         "info": true,
                         "autoWidth": true,
                         "responsive": true,
                         "scrollY": "600px",
                        "scrollX": true,
                        "scrollCollapse": true
                     });

                 }).fail(function() {
                     console.log("error change cliente");
                 })

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



             </script>
             <script>
             $(function() {
                 //Initialize Select2 Elements


                 //Datemask dd/mm/yyyy
                 $('#datemask').inputmask('dd/mm/yyyy', {
                     'placeholder': 'dd/mm/yyyy'
                 })
                 //Datemask2 mm/dd/yyyy
                 $('#datemask2').inputmask('mm/dd/yyyy', {
                     'placeholder': 'mm/dd/yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()



             })
             </script>


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
                                                     <input name="nombre_empleado" placeholder="" class="form-control"
                                                         type="text" value="<?php echo $nombreEmpleador;?>" disabled>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group" data-select2-id="89">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Tipo Interaccion</label>
                                                     <div class="col-md-12">
                                                         <select name="tipo_interaccion" id="var_tipo_interaccion"
                                                             class="form-control select2bs4 select2-hidden-accessible"
                                                             style="width: 100%;" data-select2-id="17" tabindex="-1"
                                                             aria-hidden="true">
                                                             <?php echo $select_cc;?>
                                                         </select>
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
                                                 <input name="fecha_ingreso" type="text" class="form-control"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>

                                     </div>




                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Numero Referencial</label>
                                             <div class="col-md-12">
                                                 <input name="numero_referencial" placeholder="" class="form-control"
                                                     type="text" id="var_numero_referencial">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>

                                     </div>




                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Solicitado por</label>
                                             <div class="col-md-12">
                                                 <input name="solicitado_por" placeholder="" class="form-control"
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
                                                 <input name="aprobado_por" placeholder="" class="form-control"
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
                                             <label for="exampleInputFile">Respaldo</label>
                                             <div class="custom-file">
                                                <input type="file"  onChange="ver_archivo();" class="custom-file-input" id="var_respaldos" name="respaldos" required="">
                                                <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                                             </div>
                                             <div>
                                                 <label>Archivo seleccionado: <p id="name_respaldo"></p></label>
                                             </div>
                                         </div>
                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group" data-select2-id="89">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Notificar</label>
                                                     <div class="col-md-12">
                                                         <select name="notificacion" id="select_interaccion"
                                                             class="form-control select2bs4 select2-hidden-accessible"
                                                             style="width: 100%;" data-select2-id="17" tabindex="-1"
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
                                     <input type="hidden" id="id_orden_compra" name="id_orden_compra"
                                         value="<?php echo $idOrden?>">
                                     <input type="hidden" id="id_cliente" name="id_cliente"
                                         value="<?php echo $idCliente?>">
                                     <input type="hidden" id="id_proyecto" name="id_proyecto"
                                         value="<?php echo $codProyecto?>">
                                     <input type="hidden" id="id_empleado" name="id_empleado"
                                         value="<?php echo $this->session->userdata('id_usuario')?>">

                                     <div id="mailFrm" style="display: none;" class="col-md-12">
                                         <div class="field_wrapper">
                                             <table class="table table-striped table-bordered" cellspacing="1"
                                                 width="99%">
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
                             <!-- Image loader -->
                            <img src='<?php echo base_url()."assets/images/loader.gif"?>' width='32px' height='32px'>
                            </div>
                            <!-- Image loader -->     
                         </div>
                     </div>
                 </div>
             </div>
