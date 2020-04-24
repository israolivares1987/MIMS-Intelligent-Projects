   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <div class="container-fluid">
               <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1>Cambios en la orden de compra</h1>
                   </div>
               </div>
           </div><!-- /.container-fluid -->
       </section>

       <!-- Main content -->
       <section class="content">
           <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="card-title"></h3>
                       </div>
                       <div class="col-md-12">
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
                                       <dd class="col-sm-6"><?php #echo $PurchaseOrderID;?></dd>
                                       <dt class="col-sm-4">Descripción:</dt>
                                       <dd class="col-sm-6"><?php #echo urldecode($purchaseOrdername);?></dd>
                                       </dd>
                                   </dl>
                               </div>
                               <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                       </div>
                       <!-- /.card-header -->
                       <div class="card-body">
                           <br />
                           <button class="btn btn-block btn-outline-success" onclick="add_cambiosorden()"><i
                                   class="glyphicon glyphicon-plus"></i> Agregar Cambios en la Orden</button>
                           <button class="btn btn-block btn-outline-secondary" onclick="reload_table()"><i
                                   class="glyphicon glyphicon-refresh"></i> Recargar</button>
                           <br />
                           <br />
                           <table id="ListCambiosOrden" class="table table-striped table-bordered" cellspacing="1"
                               width="99%">
                               <thead>
                                   <tr>
                                       <th>Acciones</th>
                                       <th>Nombre Empleado</th>
                                       <th>Tipo Interaccion</th>
                                       <th>Fecha Ingreso</th>
                                       <th>Fecha Accion</th>
                                       <th>Numero Referencia</th>
                                       <th>Solicitado por</th>
                                       <th>Aprobado por</th>
                                       <th>Comentarios Generales</th>
                                       <th>Respaldos</th>
                                   </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>

               <script type="text/javascript">
               $(document).ready(function() {

                   var save_method; //for save method string
                   var table;
                   var base_url = '<?php echo base_url();?>';

                   //datatables
                   $('#ListCambiosOrden').DataTable({


                       "processing": true, //Feature control the processing indicator.
                       "serverSide": true, //Feature control DataTables' server-side processing mode.
                       "order": [], //Initial no order.

                       // Load data for the table's content from an Ajax source
                       "ajax": {
                           "url": "<?php #echo site_url('Clientes/listaClientes')?>",
                           "type": "POST"
                       },
                       "paging": false,
                       language: {
                           "emptyTable": "No hay datos disponibles en la tabla.",
                           "info": "Del _START_ al _END_ de _TOTAL_ ",
                           "infoEmpty": "Mostrando 0 registros de un total de 0.",
                           "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                           "infoPostFix": "(actualizados)",
                           "lengthMenu": "Mostrar _MENU_ registros",
                           "loadingRecords": "Cargando...",
                           "processing": "Procesando...",
                           "search": "Buscar:",
                           "searchPlaceholder": "Dato para buscar",
                           "zeroRecords": "No se han encontrado coincidencias.",
                           "aria": {
                               "sortAscending": "Ordenación ascendente",
                               "sortDescending": "Ordenación descendente"
                           }
                       },
                       rowReorder: {
                           "selector": 'td:nth-child(2)'
                       },
                       "responsive": true,
                       "scrollX": true

                   });

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

               function reload_table() {
                   $('#ListCambiosOrden').DataTable().ajax.reload();
               }

               function add_cambiosorden() {
                   save_method = 'add';
                   $('#form')[0].reset(); // reset form on modals
                   $('.form-group').removeClass('has-error'); // clear error class
                   $('.help-block').empty(); // clear error string
                   $('#modal-default').modal('show'); // show bootstrap modal
                   $('.modal-title').text('Agregar Cambio en la Orden'); // Set Title to Bootstrap modal title
               }

               function edit_cambiosorden(id) {
                   save_method = 'update';
                   $('#form')[0].reset(); // reset form on modals
                   $('.form-group').removeClass('has-error'); // clear error class
                   $('.help-block').empty(); // clear error string


                   //Ajax Load data from ajax
                   $.ajax({
                       url: "<?php #echo site_url('Clientes/obtieneClientePorId')?>/" + id,
                       type: "GET",
                       dataType: "JSON",
                       success: function(data) {

                           $('[name="idCliente"]').val(data.idCliente);
                           $('[name="nombreCliente"]').val(data.nombreCliente);
                           $('[name="rutCliente"]').val(data.rutCliente);
                           $('[name="dvCliente"]').val(data.dvCliente);



                           $('#modal-default').modal('show'); // show bootstrap modal
                           $('.modal-title').text('Editar Clientes'); // Set title to Bootstrap modal title


                       },
                       error: function(jqXHR, textStatus, errorThrown) {
                           alert('Error get data from ajax');
                       }
                   });
               }

               function save() {
                   $('#btnSave').text('saving...'); //change button text
                   $('#btnSave').attr('disabled', true); //set button disable 
                   var url;

                   if (save_method == 'add') {
                       url = "<?php #echo site_url('Clientes/agregarCliente')?>";
                   } else {
                       url = "<?php #echo site_url('Clientes/updateCliente')?>";
                   }

                   // ajax adding data to database

                   var formData = new FormData($('#form')[0]);
                   $.ajax({
                       url: url,
                       type: "POST",
                       data: formData,
                       contentType: false,
                       processData: false,
                       dataType: "JSON",
                       success: function(data) {

                           if (data.status) //if success close modal and reload ajax table
                           {
                               $('#modal-default').modal('hide');
                               reload_table();
                           } else {
                               for (var i = 0; i < data.inputerror.length; i++) {
                                   $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
                                       'has-error'
                                       ); //select parent twice to select div form-group class and add has-error class
                                   $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
                                       i]); //select span help-block class set text error string
                               }
                           }
                           $('#btnSave').text('save'); //change button text
                           $('#btnSave').attr('disabled', false); //set button enable 


                       },
                       error: function(jqXHR, textStatus, errorThrown) {
                           alert('Error adding / update data');
                           $('#btnSave').text('save'); //change button text
                           $('#btnSave').attr('disabled', false); //set button enable 

                       }
                   });
               }


               function delete_cambiosorden(id) {
                   if (confirm('Está Seguro de Eliminar registro?')) {
                       // ajax delete data to database
                       $.ajax({
                           url: "<?php #echo site_url('Clientes/deleteCliente')?>/" + id,
                           type: "POST",
                           dataType: "JSON",
                           success: function(data) {
                               //if success reload ajax table
                               $('#modal_default').modal('hide');
                               reload_table();
                           },
                           error: function(jqXHR, textStatus, errorThrown) {
                               alert('Error deleting data');
                           }
                       });

                   }
               }
               </script>


               <!-- Bootstrap modal -->

               <div class="modal fade" id="modal-default">
                   <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h4 class="modal-title">Agregar Cambio en la Orden</h4>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <form action="#" id="form" class="form-horizontal">
                                   <input type="hidden" value="" name="id_interaccion" />
                                   <input type="hidden" value="" name="id_orden_compra" />

                                   <div class="form-group" data-select2-id="89">
                                       <div class="form-group">
                                           <label class="control-label col-md-9">Nombre Empleado</label>
                                           <div class="col-md-9">
                                               <select name="nombre_empleado"
                                                   class="form-control select2bs4 select2-hidden-accessible"
                                                   style="width: 100%;" data-select2-id="17" tabindex="-1"
                                                   aria-hidden="true">
                                                   <?php #echo $select_ap;?>
                                               </select>
                                           </div>
                                       </div>
                                   </div>



                                   <div class="form-group" data-select2-id="89">
                                       <div class="form-group">
                                           <label class="control-label col-md-9">Tipo Interaccion</label>
                                           <div class="col-md-9">
                                               <select name="tipo_interaccion"
                                                   class="form-control select2bs4 select2-hidden-accessible"
                                                   style="width: 100%;" data-select2-id="17" tabindex="-1"
                                                   aria-hidden="true">
                                                   <?php #echo $select_ap;?>
                                               </select>
                                           </div>
                                       </div>
                                   </div>


                                   <div class="form-group">
                                       <label class="control-label col-md-9">Fecha Ingreso</label>
                                       <div class="col-md-9">
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text"><i
                                                           class="far fa-calendar-alt"></i></span>
                                               </div>
                                               <input name="fecha_ingreso" type="text" class="form-control"
                                                   data-inputmask-alias="datetime"
                                                   data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                                   im-insert="false">
                                           </div>
                                       </div>
                                   </div>



                                   <div class="form-group">
                                       <label class="control-label col-md-3">Numero Referencial</label>
                                       <div class="col-md-9">
                                           <input name="numero_referencial" placeholder="" class="form-control"
                                               type="text">
                                           <span class="help-block"></span>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="control-label col-md-3">Solicitado por</label>
                                       <div class="col-md-9">
                                           <input name="solicitado_por" placeholder="" class="form-control" type="text">
                                           <span class="help-block"></span>
                                       </div>
                                   </div>


                                   <div class="form-group">
                                       <label class="control-label col-md-3">Aprobado por</label>
                                       <div class="col-md-9">
                                           <input name="aprobado_por" placeholder="" class="form-control" type="text">
                                           <span class="help-block"></span>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="control-label col-md-3">Comentarios Generales</label>
                                       <div class="col-md-9">
                                           <input name="comentarios_generales" placeholder="" class="form-control"
                                               type="text">
                                           <span class="help-block"></span>
                                       </div>
                                   </div>




                                   <div class="form-group">
                                       <label for="exampleInputFile">Respaldos</label>
                                       <div class="input-group">
                                           <div class="custom-file">
                                               <input name="respaldos" type="file" class="custom-file-input"
                                                   id="exampleInputFile"
                                                   data-allowed-file-extensions="[doc,docx,pdf,csv,txt,DOC,DOCX,PDF,CSV,TXT]"
                                                   accept=".doc,.docx,.pdf,.csv,.txt,.DOC,.DOCX,.PDF,.CSV,.TXT">
                                               <label class="custom-file-label" for="exampleInputFile"></label>
                                           </div>
                                           <div class="input-group-append">
                                               <span class="input-group-text" id="">Upload</span>
                                           </div>
                                       </div>
                                   </div>

                           </div>
                           </form>
                       </div>
                       <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-success" onclick="save()"
                               data-dismiss="modal">Save</button>
                           <button type="button" class="btn btn-danger">Cancel</button>
                       </div>
                   </div>
                   <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
           </div>