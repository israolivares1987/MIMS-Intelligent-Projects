<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                recargaEmpleados();

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

             function reload_table()
                {
                    recargaEmpleados();
                }

            function recargaEmpleados() {

                 var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
                 var empleados_html = '';
                 
                 var tabla_empleados = $('#tbl_empleados').DataTable();

                 tabla_empleados.destroy();

                 $.ajax({
                     url: '<?php echo site_url('Empleados/listaEmpleados')?>',
                     type: 'POST',
                     dataType: 'json',
                     data: {
                        codEmpresa: codEmpresa
                     },
                 }).done(function(result) {

                     $.each(result.empleados, function(key, empleado) {
             
                        empleados_html += '<tr>';
                        empleados_html += '<td>' + empleado.FirstName + '</td>';
                        empleados_html += '<td>' + empleado.LastName + '</td>';
                        empleados_html += '<td>' + empleado.EmailAddress + '</td>';
                        empleados_html += '<td>' + empleado.JobTitle + '</td>';
                        empleados_html += '<td>' + empleado.BusinessPhone + '</td>';
                        empleados_html += '<td>' + empleado.HomePhone + '</td>';
                        empleados_html += '<td>' + empleado.MobilePhone + '</td>';
                        empleados_html += '<td>';
                        empleados_html += '<button data-toggle="tooltip" data-placement="top" title="Editar Empleado" onclick="edit_empleado('+empleado.ID+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                        empleados_html += '<button data-toggle="tooltip" data-placement="top" title="Eliminar Empleado" onclick="elimina_empleado('+empleado.ID +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                        empleados_html += '</td>';
                        empleados_html += '</tr>';

                     });

                     $('#datos_empleados').html(empleados_html);
                     $('[data-toggle="tooltip"]').tooltip();

                     $('#tbl_empleados').DataTable({

                        language: {
                            url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
                        },
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                    // "responsive": true,
                        "scrollY": "600px",
                        "scrollX": true,
                        "scrollCollapse": true
           
                     });

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

             function getFormData(id)
                {
                    var data=new FormData();

                    $("#"+id).find("input,select,textarea").each(function(i,v) {
                        if(v.type!=="file") {
                            if(v.type==="checkbox" && v.checked===true) {
                                data.append(v.name,"on");
                            }else{
                                data.append(v.name,v.value);
                            }
                        }
                    });
                    return data;
                }

             function guardar() 
             {

                // validar campos
                var valido = false;

                data=getFormData("formEmpleado");


                if(!validateEmail(data.get('EmailAddress'))){
                    
                    toastr.warning('Email: '+ data.get('EmailAddress') + ' no valido, favor revisar.');

                }else{

                    if(save_method == 'add') {
                        url = "<?php echo site_url('Empleados/agregarEmpleado')?>";
                    } else {
                        url = "<?php echo site_url('Empleados/editarEmpleado')?>";
                    }

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                    }).done(function(result) {

                        if(result.resp){
                                    
                                    $('#modal-empleado').modal('hide');
                                    toastr.success(result.mensaje);
                                    recargaEmpleados();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
                }
            }


            function elimina_empleado(id_empleado)
            {
                if(confirm('Está Seguro de eliminar el Empleado?'))
                    {

                        $.ajax({
                        url : "<?php echo site_url('Empleados/eliminaEmpleado')?>",
                        type: 		'POST',
                        dataType: 'JSON',
                        data: {
                               id_empleado: id_empleado
                              },
                    }).done(function(result) {

                        if(result.resp){
                                   
                            toastr.success(result.mensaje);
                            recargaEmpleados();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })


                }
            }

            function nuevo_empleado(id_empleado)
            {

                save_method = 'add';
                $('#btnSave').text('Agregar'); //change button text
                $('#formEmpleado')[0].reset(); // reset form on modals
                $('#modal-empleado').modal('show');
                $('.modal-title').text('Agregar Empleado'); // Set title to Bootstrap modal title

            }

            

                function edit_empleado(id_empleado)
                {
                    save_method = 'update';
                    $('#formEmpleado')[0].reset(); // reset form on modals
                    $('#btnSave').text('Actualizar'); //change button text
                  
                    $.ajax({
                            url: 		'<?php echo base_url('index.php/Empleados/obtieneEmpleado'); ?>',
                            type: 		'POST',
                            dataType: 'JSON',
                            data: {
                                    id_empleado: id_empleado
                                },
                        }).done(function(result) {

                  
                            $('#ID').val(result.ID);
                            $('#FirstName').val(result.FirstName);
                            $('#LastName').val(result.LastName);
                            $('#EmailAddress').val(result.EmailAddress);
                            $('#JobTitle').val(result.JobTitle);
                            $('#BusinessPhone').val(result.BusinessPhone);
                            $('#HomePhone').val(result.HomePhone);
                            $('#MobilePhone').val(result.MobilePhone);

                           

                            $('#modal-empleado').modal('show');
                            $('.modal-title').text('Editar Empleado'); // Set title to Bootstrap modal title


                        }).fail(function() {
                            console.log("error edita Empleado");
                        })
                }



           
             </script>
<script>
  $(function () {
    //Initialize Select2 Elements
   

    //Datemask dd-mm-yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    

  })
</script>

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

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Mantenedor Empleados</h1>
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
                             <div class="col-lg-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Detalle Empresa
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-4">Nombre:</dt>
                                             <dd class="col-sm-6"><?php echo urldecode($nombreEmpresa);?></dd>
                                             <dt class="col-sm-4">Razón Social:</dt>
                                             <dd class="col-sm-6"><?php echo urldecode($razonSocial);?>
                                             </dd>
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
                                         <button id="btn_recargar"  class="btn btn-outline-secondary float-right" onclick="reload_table()" >Recargar</button>
                                         <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right" onclick="nuevo_empleado()">Nuevo Empleado</button>
                                     </th>
                                 </tr>
                             </tbody>
                         </table>

                         <br />

                         <table id="tbl_empleados" class="table table-striped table-bordered" cellspacing="0">
                             <thead>
                                 <tr>
                                 <th>Nombre</th>
                                <th>Apellido</th>
                                <th>E-Mail</th>
                                <th>Cargo</th>
                                <th>Fono Oficina</th>
                                <th>Fono Casa</th>
                                <th>Fono Movil</th>
                                <th>Acciones</th>
                              </tr>
                             </thead>
                             <tbody id="datos_empleados">
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>



<!-- /.modal-content -->
						
    <div class="modal fade" id="modal-empleado">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Empleado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form id="formEmpleado" class="form-horizontal">
                    <input type="hidden" value="" name="ID" id="ID" />  
                    <input type="hidden" value="<?php echo $this->session->userdata('cod_emp');?>" name="codEmpresa" id="codEmpresa" />
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre</label>
                            <div class="col-md-9">
                                <input name="FirstName" id="FirstName" placeholder="Nombre" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Apellido</label>
                            <div class="col-md-9">
                                <input name="LastName" id="LastName" placeholder="Apellido" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">E-Mail</label>
                            <div class="col-md-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="text" name="EmailAddress" id="EmailAddress" value="" class="form-control"/>
                                 </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cargo</label>
                            <div class="col-md-9">
                            <input type="text" name="JobTitle" id="JobTitle" placeholder="Cargo" class="form-control" />
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fono Oficina</label>
                            <div class="col-md-9">
                                <input type="text" name="BusinessPhone" id="BusinessPhone" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fono Casa</label>
                            <div class="col-md-9">
                               <input type="text" name="HomePhone" id="HomePhone" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fono Movil</label>
                            <div class="col-md-9">
                            <input type="text" name="MobilePhone" id="MobilePhone" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button id="btnSave" type="button" class="btn btn-block btn-outline-success" onclick="guardar()">Actualizar</button>
              <button type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->