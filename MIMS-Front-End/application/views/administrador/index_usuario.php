<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                updateCountUsuario();
                recargaUsuarios();

                $("select#rolesSelect").change(function(){
                    $("#id_rol").val($(this).val()); 
                });

                $("select#empresaSelect").change(function(){
                    $("#id_empresa").val($(this).val()); 
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

             function rellenar_select(){
                console.log("inicio asignacion rol y empresa");   
                empresa_html = '';

                $.ajax({
                    url: '<?php echo site_url('Empresa/listaEmpresa')?>',
                    type: 		'POST',
                    dataType:   'JSON',                
                }).done(function(result) {
                    empresa_html += '<option value="-1">Seleccione una empresa</option>';
                    $.each(result.empresas, function(key, empresaTO) {
                        empresa_html += '<option value="'+empresaTO.cod_empresa+'">'+empresaTO.nombre+'</option>';
                    });
                    $('#empresaSelect').html(empresa_html);
                     $('[data-toggle="tooltip"]').tooltip();
                }).fail(function() {
                    console.log("error recuperar cantidad usuarios");
                })
                
                var rol_html = ''; 
                $.ajax({
                    url:        '<?php echo site_url('Usuario/getRoles')?>',
                    type: 		'POST',
                    dataType:   'JSON',                
                }).done(function(result) {
                    rol_html += '<option value="-1">Seleccione un rol</option>';
                    $.each(result.roles, function(key, rolTO) {
                        rol_html += '<option value="'+rolTO.rol_id+'">'+rolTO.nombre+'</option>';
                    });
                    $('#rolesSelect').html(rol_html);
                     $('[data-toggle="tooltip"]').tooltip();
                }).fail(function() {
                    console.log("error recuperar cantidad usuarios");
                })

             }

             function updateCountUsuario(){
                console.log("inicio");    
                $.ajax({
                    url: 		'<?php echo base_url('index.php/Usuario/getCountUsuario'); ?>',
                    type: 		'POST',
                    dataType: 'JSON',                
                }).done(function(result) {
                    $('#countUsuario').html(result);
                }).fail(function() {
                    console.log("error recuperar cantidad usuarios");
                })
            }

            function reload_table()
                {
                    recargaUsuarios();
                }

            function recargaUsuarios() {

                 var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
                 var empleados_html = '';
                 
                 var tabla_empleados = $('#tbl_usuarios').DataTable();

                 tabla_empleados.destroy();

                 $.ajax({
                     url: '<?php echo site_url('Usuario/listaUsuario')?>',
                     type: 'POST',
                     dataType: 'json',
                     
                 }).done(function(result) {
       
                     $.each(result.usuarios, function(key, usuariosTO) {
             
                            empleados_html += '<tr>';
                            empleados_html += '<td>' + usuariosTO.cod_emp + '</td>';
                            empleados_html += '<td>' + usuariosTO.nombres + '</td>';
                            empleados_html += '<td>' + usuariosTO.paterno + '</td>';
                            empleados_html += '<td>' + usuariosTO.materno + '</td>';
                            empleados_html += '<td>' + usuariosTO.rol_id + '</td>';
                            empleados_html += '<td>' + usuariosTO.n_usuario+ '</td>';
                            empleados_html += '<td>' + usuariosTO.email + '</td>';
                            empleados_html += '<td>';
                            empleados_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Empleado" onclick="edit_usuario('+usuariosTO.id+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                            empleados_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Empleado" onclick="elimina_usuario('+usuariosTO.id +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            empleados_html += '</td>';
                            empleados_html += '</tr>';
                     });

                     $('#datos_usuarios').html(empleados_html);
                     $('[data-toggle="tooltip"]').tooltip();

                     $('#tbl_usuarios').DataTable({

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
                        }).buttons().container().appendTo('#tbl_usuarios_wrapper .col-md-6:eq(0)');

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

             function nuevo_usuario(){
                save_method = 'add';
                $('#btnSaveusuario').text('Agregar'); //change button text
                $('#formUsuario')[0].reset(); // reset form on modals
                $('#modal-usuarios').modal('show');
                $('.modal-title').text('Agregar Usuario'); // Set title to Bootstrap modal title
                rellenar_select();
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



            
             function guardar(){
                var valido = false;
                data=getFormData("formUsuario");


                $("#id_rol").val($( "#rolesSelect option:selected").val()); 
                $("#id_empresa").val($( "#empresaSelect option:selected").val()); 


                if(!validateEmail(data.get('EmailAddress'))){
                    toastr.warning('Email: '+ data.get('EmailAddress') + ' no valido, favor revisar.');
                }else{
                    if(save_method == 'add') {
                        url = "<?php echo site_url('Usuario/agregarUsuario')?>";
                    } else {
                        url = "<?php echo site_url('Usuario/editarUsuario')?>";
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
                            $('#modal-usuarios').modal('hide');
                            toastr.success(result.mensaje);
                            recargaUsuarios();
                            updateCountUsuarios();
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
                }
            }


            function elimina_usuario(id_usuario){
                if(confirm('Está Seguro de eliminar el usuario?'))
                    {
                        $.ajax({
                        url : "<?php echo site_url('Usuario/eliminarUsuario')?>",
                        type: 		'POST',
                        dataType: 'JSON',
                        data: {
                            id_usuario: id_usuario
                              },
                    }).done(function(result) {

                        if(result.resp){
                                   
                            toastr.success(result.mensaje);
                            recargaUsuarios();
                            updateCountUsuarios();
                        }else{
                            toastr.warning(result.mensaje);
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })


                }
            }

            function edit_usuario(id_usuario){
                   rellenar_select();
                   setTimeout(() => { console.log("World!");
                   save_method = 'update';
                   $('#formUsuario')[0].reset(); // reset form on modals
                   $('#btnSave').text('Actualizar'); //change button text
                    
                   $.ajax({
                            url: 	  '<?php echo base_url('index.php/Usuario/obtieneUsuario'); ?>',
                            type: 	  'POST',
                            dataType: 'JSON',
                            data: {
                                    id: id_usuario
                                },
                        }).done(function(result) {
                            $('#IDUsuario').val(result.id);
                            $('#nombreusuario').val(result.nombres);
                            $('#apellidoPaterno').val(result.paterno);
                            $('#apellidoMaterno').val(result.materno);
                            $('#usuario').val(result.n_usuario);
                            $('#inputPassword3').val(result.password);

                            $('#EmailAddress').val(result.email);

                            $("#empresaSelect").val(result.cod_emp).change();
                            $("#rolesSelect").val(result.rol_id).change();
                            
                            $('#IDEmpresa').val(result.cod_empresa);
                            

                            $('#modal-usuarios').modal('show');
                            
                            $('.modal-title').text('Editar usuario'); // Set title to Bootstrap modal title

                        }).fail(function() {
                            console.log("error edita Empresa");
                        })
                    }, 100);
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
                     <h1>Mantenedor Usuario</h1>
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
                                             Dashboard Usuario
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="col-lg-3 col-xs-6">
                                     <br>
                                      <!-- small box -->
                                      <div class="small-box bg-aqua">
                                        <div class="inner">
                                          <h3 id ="countUsuario" ></h3>

                                          <p>Usuarios </p>
                                        </div>
                                        <div class="icon">
                                          <!--<i class="ion ion-bag"></i>-->
                                        </div>
                                        <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
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
                                         <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right" onclick="nuevo_usuario()">Nueva usuario</button>
                                     </th>
                                 </tr>
                             </tbody>
                         </table>

                         <br />

                         <table id="tbl_usuarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                    <th>Codigo empresa</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Rol</th>
                                    <th>Usuario</th>
                                    <th>E-mail</th>
                                    <th>Acciones</th>
                              </tr>
                             </thead>
                             <tbody id="datos_usuarios">
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             


        <div class="modal fade" id="modal-asignacion-rol">
        <div class="modal-dialog modal-xl">
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

<!-- /.modal-content -->
    <div class="modal fade" id="modal-usuarios">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form id="formUsuario" class="form-horizontal">
                    <input type="hidden" value="" name="IDUsuario" id="IDUsuario" />  
                    <input type="hidden" value="<?php echo $this->session->userdata('cod_emp');?>" name="codEmpresa" id="codEmpresa" />
                    
                    <input type="hidden" value="" name="id_rol" id="id_rol" /> 
                    <input type="hidden" value="" name="id_empresa" id="id_empresa" /> 
                   
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Nombres</label>
                            <div class="col-md-12">
                                <input name="nombreusuario" id="nombreusuario" placeholder="Nombre usuario" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Apellido paterno</label>
                            <div class="col-md-12">
                                <input name="apellidoPaterno" id="apellidoPaterno" placeholder="Apellido paterno" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-labe">Apellido materno</label>
                            <div class="col-md-12">
                                <input name="apellidoMaterno" id="apellidoMaterno" placeholder="Apellido materno" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label">usuario</label>
                            <div class="col-md-12">
                                <input name="usuario" id="usuario" placeholder="Usuario" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">E-Mail</label>
                            <div class="col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="text" name="EmailAddress" id="EmailAddress" value="" class="form-control"/>
                                 </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div class="col-md-12">
                            <input type="password" class="form-control" name="inputPassword3" id="inputPassword3" placeholder="Password">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Empresa</label>
                            <div class="col-md-12">
                                <select class="form-control" id="empresaSelect" name="empresaSelect"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">ROL</label>
                            <div class="col-md-12">
                                <select class="form-control" id="rolesSelect" name="rolesSelect"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button id="btnSaveusuario" type="button" class="btn btn-block btn-outline-success" onclick="guardar()">Actualizar</button>
              <button type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->


