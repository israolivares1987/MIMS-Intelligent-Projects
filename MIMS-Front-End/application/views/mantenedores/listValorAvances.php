<script type="text/javascript">
             $('[data-toggle="tooltip"]').tooltip();

             $(document).ready(function() {

                var save_method;
                var url;

                recargaavances();

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
                    recargaavances();
                }

            function recargaavances() {

                 var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
                 var avances_html = '';

                 var tabla_avances = $('#tbl_avances').DataTable();

                 tabla_avances.destroy();

                 $.ajax({
                     url: '<?php echo site_url('Dominios/obtieneAvances')?>',
                     type: 'POST',
                     dataType: 'json',
                 }).done(function(result) {

                     $.each(result.avances, function(key, avance) {
             
                        avances_html += '<tr>';
                        avances_html += '<td>';
                        avances_html += '<button data-toggle="tooltip" data-placement="left" title="Editar avances" onclick="obtiene_avances('+avance.domain_id+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
                        avances_html += '</td>';
                        avances_html += '<td>' + avance.valor_avance + '</td>';
                        avances_html += '<td>' + avance.domain_desc + '</td>';
                        avances_html += '</tr>';

                     });

                     $('#datos_avances').html(avances_html);
                     $('[data-toggle="tooltip"]').tooltip();


                     $('#tbl_avances').DataTable({
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
                        }).buttons().container().appendTo('#tbl_avances_wrapper .col-md-6:eq(0)');


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

                data=getFormData("formavances");


                    if(save_method == 'add') {
                        url = "<?php echo site_url('Dominios/guardaAvance')?>";
                    } else {
                        url = "<?php echo site_url('Dominios/editarAvance')?>";
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
                                    
                                    $('#modal-avances').modal('hide');
                                    toastr.success(result.mensaje);
                                    recargaavances();
                                
                        }else{
                            toastr.warning(result.mensaje);
                        }
                        

                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    })
                  
            }


function obtiene_avances(dato_avance){

    save_method  = 'update';

$.ajax({
  url: 		'<?php echo base_url('index.php/Dominios/obtieneAvance'); ?>',
  type: 		'POST',
  data: {
         var_avance: dato_avance
  },
  dataType: 'json',
}).done(function(result) {
    
    $.each(result.avances, function(key, avance) {

        $('#var_avances').val(avance.domain_desc);
        $('#var_estado').val(avance.valor_avance);
        $('#var_id').val(avance.domain_id);
    });

  $('#modal-avances').modal('show');


}).fail(function() {
  console.log("error edita_proyecto");
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
                     <h1>Mantenedor Avances</h1>
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
                                                            Detalle Avances
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                    <table class="table" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    <button id="btn_recargar"  class="btn btn-outline-secondary float-right" onclick="reload_table()" >Recargar</button>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table id="tbl_avances" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                  <th>Acciones</th>
                                                                  <th>Estado Wpanel</th>
                                                                  <th>Porcentaje</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody id="datos_avances">
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
						
    <div class="modal fade" id="modal-avances">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Datos Avances</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form id="formavances" class="form-horizontal">
                   
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">ESTADO WPANEL</label>
                            <div class="col-md-12">

                                <input name="var_estado" value="" id="var_estado" placeholder="" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">AVANCE</label>
                            <div class="col-md-12">
                                
                                <input name="domain_desc" value="" id="var_avances" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <input name="var_id" value="" id="var_id" placeholder="" class="form-control" type="hidden" >
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