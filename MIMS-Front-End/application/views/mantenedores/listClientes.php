<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                recargaclientes();

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
                    recargaclientes();
                }

            function recargaclientes() {

                 var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
                 var clientes_html = '';
                 
                 var tabla_clientes = $('#tbl_clientes').DataTable();

                 tabla_clientes.destroy();

                 $.ajax({
                     url: '<?php echo site_url('clientes/listaclientes')?>',
                     type: 'POST',
                     dataType: 'json',
                     data: {
                        codEmpresa: codEmpresa
                     },
                 }).done(function(result) {

                     $.each(result.clientes, function(key, cliente) {
             
                        clientes_html += '<tr>';
                        clientes_html += '<td>' + cliente.nombreCliente + '</td>';
                        clientes_html += '<td>' + cliente.razonSocial + '</td>';
                        clientes_html += '<td>' + cliente.rutCliente + '</td>';
                        clientes_html += '<td>' + cliente.dvCliente + '</td>';
                        clientes_html += '<td>' + cliente.direccion + '</td>';
                        clientes_html += '<td>' + cliente.contacto + '</td>';
                        clientes_html += '<td>' + cliente.telefono + '</td>';
                        clientes_html += '<td>' + cliente.correo + '</td>';
                        clientes_html += '<td>';
                        clientes_html += '<button data-toggle="tooltip" data-placement="top" title="Editar Cliente" onclick="edit_cliente('+cliente.idCliente+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                        clientes_html += '<button data-toggle="tooltip" data-placement="top" title="Eliminar Cliente" onclick="elimina_cliente('+cliente.idCliente +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                        clientes_html += '</td>';
                        clientes_html += '</tr>';

                     });

                     $('#datos_clientes').html(clientes_html);
                     $('[data-toggle="tooltip"]').tooltip();


                     $('#tbl_clientes').DataTable({language: {
                          url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
                         },
                         "paging": true,
                         "lengthChange": false,
                         "searching": true,
                         "ordering": true,
                         "info": true,
                         "autoWidth": true,
                         //"responsive": true,
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

                data=getFormData("formCliente");


                if(!validateEmail(data.get('correo'))){
                    
                    toastr.warning('Email: '+ data.get('correo') + ' no valido, favor revisar.');

                }else{

                    if(save_method == 'add') {
                        url = "<?php echo site_url('clientes/agregarCliente')?>";
                    } else {
                        url = "<?php echo site_url('clientes/editarCliente')?>";
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
                                    
                                    $('#modal-cliente').modal('hide');
                                    toastr.success(result.mensaje);
                                    recargaclientes();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
                }
            }


            function elimina_cliente(id_cliente)
            {
                if(confirm('Está Seguro de eliminar el Cliente?'))
                    {

                        $.ajax({
                        url : "<?php echo site_url('clientes/eliminaCliente')?>",
                        type: 		'POST',
                        dataType: 'JSON',
                        data: {
                            id_cliente: id_cliente
                              },
                    }).done(function(result) {

                        if(result.resp){
                                   
                            toastr.success(result.mensaje);
                            recargaclientes();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })


                }
            }

            function validaDv(input)
            {

                var rut  = replaceAll(input.value , ".", "" );
                var dv = validaDvRut(rut);

                $('#dvCliente').val(dv);
            }

            function nuevo_Cliente()
            {

                save_method = 'add';
                $('#btnSave').text('Agregar'); //change button text
                $('#formCliente')[0].reset(); // reset form on modals
                $('#modal-cliente').modal('show');
                $('.modal-title').text('Agregar Cliente'); // Set title to Bootstrap modal title

            }

            

                function edit_cliente(id_cliente)
                {
                    save_method = 'update';
                    $('#formCliente')[0].reset(); // reset form on modals
                    $('#btnSave').text('Actualizar'); //change button text
                  
                    $.ajax({
                            url: 		'<?php echo base_url('index.php/clientes/obtieneCliente'); ?>',
                            type: 		'POST',
                            dataType: 'JSON',
                            data: {
                                    id_cliente: id_cliente
                                },
                        }).done(function(result) {

                  
                            $('#codEmpresa').val(result.codEmpresa);
                            $('#idCliente').val(result.idCliente);
                            $('#nombreCliente').val(result.nombreCliente);
                            $('#razonSocial').val(result.razonSocial);
                            $('#rutCliente').val(result.rutCliente);
                            $('#dvCliente').val(result.dvCliente);
                            $('#direccion').val(result.direccion);
                            $('#contacto').val(result.contacto);
                            $('#telefono').val(result.telefono);
                            $('#correo').val(result.correo);

                           

                            $('#modal-cliente').modal('show');
                            $('.modal-title').text('Editar Cliente'); // Set title to Bootstrap modal title


                        }).fail(function() {
                            console.log("error edita Cliente");
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
                     <h1>Mantenedor Clientes</h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
         <div class="row">
             <div class="col-12">
                 <div class="card">


                     <div class="card-header">
                         <h3 class="card-title"></h3>
                     </div>

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
                     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            <i class="fas fa-text-width"></i>
                                                            Detalle Clientes
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                    <table class="table" cellspacing="0" width="99%">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    <button id="btn_recargar"  class="btn btn-outline-secondary float-right" onclick="reload_table()" >Recargar</button>
                                                                    <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right" onclick="nuevo_Cliente()">Nuevo Cliente</button>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table id="tbl_clientes" class="table table-striped table-bordered" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                <th>Nombre</th>
                                                                <th>Razon Social</th>
                                                                <th>Rut</th>
                                                                <th>Dv</th>
                                                                <th>Direccion</th>
                                                                <th>Contacto</th>
                                                                <th>Telefono</th>
                                                                <th>Email</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="datos_clientes">
                                                            </tbody>
                                                        </table>



                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>

                                            </div>
                                            <!-- /.col-md-6 -->
                                        </div>
                                        <!-- /.row -->

                     <!-- /.card-header -->
                   
                 </div>
             </div>
    </div>









<!-- /.modal-content -->
						
    <div class="modal fade" id="modal-cliente">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form id="formCliente" class="form-horizontal">
                    <input type="hidden" value="" name="idCliente" id="idCliente" />  
                    <input type="hidden" value="<?php echo $this->session->userdata('cod_emp');?>" name="codEmpresa" id="codEmpresa" />
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre</label>
                            <div class="col-md-9">
                                <input name="nombreCliente" id="nombreCliente" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Razon Social</label>
                            <div class="col-md-9">
                                <input name="razonSocial" id="razonSocial" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rut</label>
                            <div class="col-md-9">
                            <input type="text" name="rutCliente" id="rutCliente" placeholder="" class="form-control"  onkeyup="formatoNumero(this)" onchange="validaDv(this)" />
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Digito verificador</label>
                            <div class="col-md-9">
                                <input type="text" name="dvCliente" id="dvCliente" value="" class="form-control" readonly/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Direccion</label>
                            <div class="col-md-9">
                               <input type="text" name="direccion" id="direccion" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contacto</label>
                            <div class="col-md-9">
                            <input type="text" name="contacto" id="contacto" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Telefono</label>
                            <div class="col-md-9">
                            <input type="text" name="telefono" id="telefono" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">E-Mail</label>
                            <div class="col-md-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="text" name="correo" id="correo" value="" class="form-control"/>
                                 </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                    <button id="btnSave" type="button" class="btn btn-primary" onclick="guardar()">Agregar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->