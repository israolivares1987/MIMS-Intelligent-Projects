<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                updateCountEmpresa();
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

             function updateCountEmpresa(){
                console.log("inicio");    
                $.ajax({
                    url: 		'<?php echo base_url('index.php/Empresa/getCountEmpresa'); ?>',
                    type: 		'POST',
                    dataType: 'JSON',                
                }).done(function(result) {
                    $('#countEmpresas').html(result);
                }).fail(function() {
                    console.log("error recuperar cantidad empresas");
                })
            }

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
                     url: '<?php echo site_url('Empresa/listaEmpresa')?>',
                     type: 'POST',
                     dataType: 'json',
                     
                 }).done(function(result) {

                     $.each(result.empresas, function(key, empresaTO) {
             
                        empleados_html += '<tr>';
                        empleados_html += '<td>' + empresaTO.cod_empresa + '</td>';
                        empleados_html += '<td>' + empresaTO.nombre + '</td>';
                        empleados_html += '<td>' + empresaTO.razon_social + '</td>';
                        empleados_html += '<td>' + empresaTO.rut_empresa+'-'+ empresaTO.dv_empresa+ '</td>';
                        empleados_html += '<td>' + empresaTO.direccion + '</td>';
                        empleados_html += '<td>' + empresaTO.telefono + '</td>';
                        empleados_html += '<td>' + empresaTO.correo + '</td>';
                        
                        empleados_html += '<td>';
                        empleados_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Empleado" onclick="edit_empresa('+empresaTO.cod_empresa+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                        empleados_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Empleado" onclick="elimina_empresa('+empresaTO.cod_empresa +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                        empleados_html += '</td>';
                        empleados_html += '</tr>';

                     });

                     $('#datos_empleados').html(empleados_html);
                     $('[data-toggle="tooltip"]').tooltip();

                     $('#tbl_empleados').DataTable({

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
                        }).buttons().container().appendTo('#tbl_empleados_wrapper .col-md-6:eq(0)');

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

             function nuevo_empresa(){
                save_method = 'add';
                $('#btnSave').text('Agregar'); //change button text
                $('#formEmpresa')[0].reset(); // reset form on modals
                $('#modal-empleado').modal('show');
                $('.modal-title').text('Agregar Empresa'); // Set title to Bootstrap modal title
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
                // validar campos
                var valido = false;
                data=getFormData("formEmpresa");

                if(!validateEmail(data.get('EmailAddress'))){
                    toastr.warning('Email: '+ data.get('EmailAddress') + ' no valido, favor revisar.');
                }else{
                    if(save_method == 'add') {
                        url = "<?php echo site_url('Empresa/agregarEmpresa')?>";
                    } else {
                        url = "<?php echo site_url('Empresa/editarEmpresa')?>";
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
                                    updateCountEmpresa();
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
                }
            }


            function elimina_empresa(id_empresa)
            {
                if(confirm('Está Seguro de eliminar la Empresa?'))
                    {

                        $.ajax({
                        url : "<?php echo site_url('Empresa/eliminarEmpresa')?>",
                        type: 		'POST',
                        dataType: 'JSON',
                        data: {
                               id_empresa: id_empresa
                              },
                    }).done(function(result) {

                        if(result.resp){
                                   
                            toastr.success(result.mensaje);
                            recargaEmpleados();
                            updateCountEmpresa();
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })


                }
            }

            

            

                function edit_empresa(id_empresa)
                {
                    save_method = 'update';
                    $('#formEmpresa')[0].reset(); // reset form on modals
                    $('#btnSave').text('Actualizar'); //change button text
                  
                    $.ajax({
                            url: 		'<?php echo base_url('index.php/Empresa/obtieneEmpresa'); ?>',
                            type: 		'POST',
                            dataType: 'JSON',
                            data: {
                                    id_empresa: id_empresa
                                },
                        }).done(function(result) {
                            $('#nombreEmpresa').val(result.nombre);
                            $('#razonsocial').val(result.razon_social);
                            $('#rutempresa').val(result.rut_empresa);
                            $('#direccion').val(result.direccion);
                            $('#telefono').val(result.telefono);
                            $('#EmailAddress').val(result.EmailAddress);
                            $('#IDEmpresa').val(result.cod_empresa);
                            

                            $('#modal-empleado').modal('show');
                            $('.modal-title').text('Editar Empresa'); // Set title to Bootstrap modal title

                        }).fail(function() {
                            console.log("error edita Empresa");
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
                     <h1>Mantenedor Empresa</h1>
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
                                             Dashboard Empresa
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="col-lg-3 col-xs-6">
                                     <br>
                                      <!-- small box -->
                                      <div class="small-box bg-aqua">
                                        <div class="inner">
                                          <h3 id ="countEmpresas" ></h3>

                                          <p>Empresas </p>
                                        </div>
                                        <div class="icon">
                                          <!--<i class="ion ion-bag"></i>-->
                                        </div>
                                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
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
                         <table class="table" cellspacing="0" width="100%">
                             <tbody>
                                 <tr>
                                     <th>
                                         <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right" onclick="nuevo_empresa()">Nueva Empresa</button>
                                     </th>
                                 </tr>
                             </tbody>
                         </table>

                         <br />

                         <table id="tbl_empleados" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                    <th>Codigo empresa</th>
                                    <th>Nombre</th>
                                    <th>Razon social</th>
                                    <th>Rut empresa</th>
                                    <th>Dirección</th>
                                    <th>telefono</th>
                                    <th>E-mail</th>
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
              <h4 class="modal-title">Agregar Empresa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form id="formEmpresa" class="form-horizontal">
                    <input type="hidden" value="" name="IDEmpresa" id="IDEmpresa" />  
                    <input type="hidden" value="<?php echo $this->session->userdata('cod_emp');?>" name="codEmpresa" id="codEmpresa" />
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Nombre empresa</label>
                            <div class="col-md-12">
                                <input name="nombreEmpresa" id="nombreEmpresa" placeholder="Nombre empresa" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Razon social</label>
                            <div class="col-md-12">
                                <input name="razonsocial" id="razonsocial" placeholder="Razon social" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">RUT Empresa</label>
                            <div class="col-md-12">
                                <input name="rutempresa" id="rutempresa" placeholder="RUT" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Dirección</label>
                            <div class="col-md-12">
                                <input name="direccion" id="direccion" placeholder="Dirección" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Telefono</label>
                            <div class="col-md-12">
                                <input name="telefono" id="telefono" placeholder="Telefono" class="form-control" type="text">
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
