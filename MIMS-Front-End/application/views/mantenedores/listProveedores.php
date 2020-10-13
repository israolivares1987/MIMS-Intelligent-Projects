<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                recargaProveedores();

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
                    recargaProveedores();
                }

            function recargaProveedores() {

                 var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
                 var proveedores_html = '';
                 
                 var tabla_proveedores = $('#tbl_proveedores').DataTable();

                 tabla_proveedores.destroy();

                 $.ajax({
                     url: '<?php echo site_url('Proveedores/listaProveedores')?>',
                     type: 'POST',
                     dataType: 'json',
                     data: {
                        codEmpresa: codEmpresa
                     },
                 }).done(function(result) {

                     $.each(result.proveedores, function(key, proveedor) {
             
                        proveedores_html += '<tr>';
                        proveedores_html += '<td>';
                        proveedores_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Proveedor" onclick="edit_proveedor('+proveedor.SupplierID+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                        proveedores_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Proveedor" onclick="elimina_proveedor('+proveedor.SupplierID +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                        proveedores_html += '</td>';
                        proveedores_html += '<td>' + proveedor.SupplierID + '</td>';
                        proveedores_html += '<td>' + proveedor.SupplierName + '</td>';
                        proveedores_html += '<td>' + proveedor.ContactName + '</td>';
                        proveedores_html += '<td>' + proveedor.ContactTitle + '</td>';
                        proveedores_html += '<td>' + proveedor.Address + '</td>';
                        proveedores_html += '<td>' + proveedor.City + '</td>';
                        proveedores_html += '<td>' + proveedor.Country + '</td>';
                        proveedores_html += '<td>' + proveedor.PostalCode + '</td>';
                        proveedores_html += '<td>' + proveedor.StateOrProvince + '</td>';
                        proveedores_html += '<td>' + proveedor.PhoneNumber + '</td>';
                        proveedores_html += '<td>' + proveedor.FaxNumber + '</td>';
                        proveedores_html += '<td>' + proveedor.PaymentTerms + '</td>';
                        proveedores_html += '<td>' + proveedor.EmailAddress + '</td>';
                        proveedores_html += '<td>' + proveedor.Notes + '</td>';
                        proveedores_html += '<td>' + proveedor.DateCreated + '</td>';
                        proveedores_html += '</tr>';


                    });

                     $('#datos_proveedores').html(proveedores_html);
                     $('[data-toggle="tooltip"]').tooltip();


                     $('#tbl_proveedores').DataTable({language: {
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

                data=getFormData("formProveedor");


                if(!validateEmail(data.get('EmailAddress'))){
                    
                    toastr.warning('Email: '+ data.get('EmailAddress') + ' no valido, favor revisar.');

                }else{

                    if(save_method == 'add') {
                        url = "<?php echo site_url('Proveedores/agregarProveedor')?>";
                    } else {
                        url = "<?php echo site_url('Proveedores/editarProveedor')?>";
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
                                    
                                    $('#modal-proveedor').modal('hide');
                                    toastr.success(result.mensaje);
                                    recargaProveedores();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
                }
            }


            function elimina_proveedor(id_proveedor)
            {
                if(confirm('Está Seguro de eliminar el Proveedor?'))
                    {

                        $.ajax({
                        url : "<?php echo site_url('Proveedores/eliminaProveedor')?>",
                        type: 		'POST',
                        dataType: 'JSON',
                        data: {
                            id_proveedor: id_proveedor
                              },
                    }).done(function(result) {

                        if(result.resp){
                                   
                            toastr.success(result.mensaje);
                            recargaProveedores();

                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })


                }
            }

            function nuevo_proveedor()
            {

                save_method = 'add';
                $('#btnSave').text('Agregar'); //change button text
                $('#formProveedor')[0].reset(); // reset form on modals
                $('#modal-proveedor').modal('show');
                $('.modal-title').text('Agregar Proveedor'); // Set title to Bootstrap modal title

            }

            

                function edit_proveedor(id_proveedor)
                {
                    save_method = 'update';
                    $('#formProveedor')[0].reset(); // reset form on modals
                    $('#btnSave').text('Actualizar'); //change button text
                  
                    $.ajax({
                            url: 		'<?php echo base_url('index.php/Proveedores/obtieneProveedor'); ?>',
                            type: 		'POST',
                            dataType: 'JSON',
                            data: {
                                id_proveedor: id_proveedor
                                },
                        }).done(function(result) {

                  
                            $('#codEmpresa').val(result.codEmpresa);
                            $('#SupplierID').val(result.SupplierID);
                            $('#SupplierName').val(result.SupplierName);
                            $('#ContactName').val(result.ContactName);
                            $('#ContactTitle').val(result.ContactTitle);
                            $('#City').val(result.City);
                            $('#Country').val(result.Country);
                            $('#PostalCode').val(result.PostalCode);
                            $('#StateOrProvince').val(result.StateOrProvince);
                            $('#PhoneNumber').val(result.PhoneNumber);
                            $('#FaxNumber').val(result.FaxNumber);
                            $('#PaymentTerms').val(result.PaymentTerms);
                            $('#EmailAddress').val(result.EmailAddress);
                            $('#Notes').val(result.Notes);


                            $('#modal-proveedor').modal('show');
                            $('.modal-title').text('Editar Proveedor'); // Set title to Bootstrap modal title


                        }).fail(function() {
                            console.log("error edita Proveedor");
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
                     <h1>Mantenedor Proveedores</h1>
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
                                                            Detalle Proveedores
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                    <table class="table" cellspacing="0" width="99%">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    <button id="btn_recargar"  class="btn btn-outline-secondary float-right" onclick="reload_table()" >Recargar</button>
                                                                    <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right" onclick="nuevo_proveedor()">Nuevo Proveedor</button>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table id="tbl_proveedores" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                            <thead>
                                                                <tr>
                                                                <th>Acciones</th>
                                                                <th>Id Proveedor</th>
                                                                <th>Nombre Proveedor</th>
                                                                <th>Nombre Contacto </th>
                                                                <th>Titulo Contacto</th>
                                                                <th>Direccion</th>
                                                                <th>Cuidad</th>
                                                                <th>Pais</th>
                                                                <th>Codigo Postal</th>
                                                                <th>Provincia</th>
                                                                <th>Telefono</th>
                                                                <th>Fax</th>
                                                                <th>Terminos de pago</th>
                                                                <th>Email</th>
                                                                <th>Nota</th>
                                                                <th>Fecha Creacion</th>
                                                          
                                                            </tr>
                                                            </thead>
                                                            <tbody id="datos_proveedores">
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
						
    <div class="modal fade" id="modal-proveedor">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form id="formProveedor" class="form-horizontal">

                    <input type="hidden" value="" name="SupplierID" id="SupplierID" />  
                    <input type="hidden" value="<?php echo $this->session->userdata('cod_emp');?>" name="codEmpresa" id="codEmpresa" />
                    
                   

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre Proveedor</label>
                            <div class="col-md-12">
                                <input name="SupplierName" id="SupplierName" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-3">Nombre Contacto</label>
                            <div class="col-md-12">
                                <input name="ContactName" id="ContactName" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Titulo Contacto</label>
                            <div class="col-md-12">
                            <input type="text" name="ContactTitle" id="ContactTitle" placeholder="" class="form-control" />
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Direccion</label>
                            <div class="col-md-12">
                                <input type="text" name="Address" id="Address" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cuidad</label>
                            <div class="col-md-12">
                               <input type="text" name="City" id="City" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Pais</label>
                            <div class="col-md-12">
                            <input type="text" name="Country" id="Country" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>
                  
                        <div class="form-group">
                            <label class="control-label col-md-3">Provincia</label>
                            <div class="col-md-12">
                            <input type="text" name="StateOrProvince" id="StateOrProvince" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Codigo Postal</label>
                            <div class="col-md-12">
                            <input type="text" name="PostalCode" id="PostalCode" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Telefono</label>
                            <div class="col-md-12">
                            <input type="text" name="PhoneNumber" id="PhoneNumber" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Fax</label>
                            <div class="col-md-12">
                            <input type="text" name="FaxNumber" id="FaxNumber" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Terminos de Pago</label>
                            <div class="col-md-12">
                            <input type="text" name="PaymentTerms" id="PaymentTerms" value="" class="form-control"/>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="text" name="EmailAddress" id="EmailAddress" value="" class="form-control"/>
                                 </div>
                            </div>
                        </div>

                   

                        <div class="form-group">
                            <label class="control-label col-md-3">Notas</label>
                            <div class="col-md-12">
                            <input type="text" name="Notes" id="Notes" value="" class="form-control"/>
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