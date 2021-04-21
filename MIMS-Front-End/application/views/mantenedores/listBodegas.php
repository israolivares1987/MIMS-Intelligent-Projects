<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                recargaBodegas();

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
                    recargaBodegas();
                }

            function recargaBodegas() {

                 var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
                 var bodegas_html = '';
                 
                 var tabla_bodegas = $('#tbl_bodegas').DataTable();

                 tabla_bodegas.destroy();

                 $.ajax({
                     url: '<?php echo site_url('Bodega/obtieneBodegas')?>',
                     type: 'POST',
                     dataType: 'json',
                     data: {
                        codEmpresa: codEmpresa
                     },
                 }).done(function(result) {

                     $.each(result.bodegas, function(key, bodega) {
             
                        bodegas_html += '<tr>';
                        bodegas_html += '<td>';
                        bodegas_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Bodega" onclick="edit_bodega('+bodega.id_bodega+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                        bodegas_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Bodega" onclick="elimina_bodega('+bodega.id_bodega +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                        bodegas_html += '</td>';
                        bodegas_html += '<td>' + bodega.id_bodega + '</td>';
                        bodegas_html += '<td>' + bodega.nombre_bodega + '</td>';
                        bodegas_html += '</tr>';


                    });

                     $('#datos_bodegas').html(bodegas_html);
                     $('[data-toggle="tooltip"]').tooltip();


                     $('#tbl_bodegas').DataTable({
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
                        }).buttons().container().appendTo('#tbl_bodegas_wrapper .col-md-6:eq(0)');


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

                data=getFormData("formbodega");


             

                    if(save_method == 'add') {
                        url = "<?php echo site_url('Bodega/agregarBodega')?>";
                    } else {
                        url = "<?php echo site_url('Bodega/editarBodega')?>";
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
                                    
                                    $('#modal-bodega').modal('hide');
                                    toastr.success(result.mensaje);
                                    recargaBodegas();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
                
            }


            function elimina_bodega(id_bodega)
            {
                if(confirm('Está Seguro de eliminar la Bodega?'))
                    {

                        $.ajax({
                        url : "<?php echo site_url('Bodega/eliminaBodega')?>",
                        type: 		'POST',
                        dataType: 'JSON',
                        data: {
                            id_bodega: id_bodega
                              },
                    }).done(function(result) {

                        if(result.resp){
                                   
                            toastr.success(result.mensaje);
                            recargaBodegas();

                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })


                }
            }

            function nuevo_bodega()
            {

                save_method = 'add';
                $('#btnSave').text('Agregar'); //change button text
                $('#formbodega')[0].reset(); // reset form on modals
                $('#modal-bodega').modal('show');
                $('.modal-title').text('Agregar Bodega'); // Set title to Bootstrap modal title

            }

            

                function edit_bodega(id_bodega)
                {
                    save_method = 'update';
                    $('#formbodega')[0].reset(); // reset form on modals
                    $('#btnSave').text('Actualizar'); //change button text
                  
                    $.ajax({
                            url: 		'<?php echo base_url('index.php/Bodega/obtieneBodega'); ?>',
                            type: 		'POST',
                            dataType: 'JSON',
                            data: {
                                id_bodega: id_bodega
                                },
                        }).done(function(result) {

                  
                            $('#codEmpresa').val(result.codEmpresa);
                            $('#id_bodega').val(result.id_bodega);
                            $('#nombre_bodega').val(result.nombre_bodega);


                            $('#modal-bodega').modal('show');
                            $('.modal-title').text('Editar Bodega'); // Set title to Bootstrap modal title


                        }).fail(function() {
                            console.log("error edita Bodega");
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
                     <h1>Mantenedor Bodegas</h1>
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
                                                            Detalle Bodegas
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                    <table class="table" cellspacing="0" width="99%">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    <button id="btn_recargar"  class="btn btn-outline-secondary float-right" onclick="reload_table()" >Recargar</button>
                                                                    <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right" onclick="nuevo_bodega()">Nueva Bodega</button>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table id="tbl_bodegas" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                            <thead>
                                                                <tr>
                                                                <th>Acciones</th>
                                                                <th>Id Bodega</th>
                                                                <th>Nombre Bodega</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="datos_bodegas">
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



    <div class="modal fade" id="modal-bodega">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">AGREGAR BODEGA</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="formbodega" class="form-horizontal">
                    
                <input type="hidden" value="" name="id_bodega" id="id_bodega" />      
                <input type="hidden" value="<?php echo $this->session->userdata('cod_emp');?>" name="codEmpresa" id="codEmpresa"/>

                     <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-12">
                                                                <div class="form-group"><label for="nombre_bodega">NOMBRE BODEGA</label><input type="text" id="nombre_bodega" class="form-control" value="" name="nombre_bodega"></div>
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
                    <button id="btnSave" type="button" class="btn btn-primary" onclick="guardar()">Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>                 