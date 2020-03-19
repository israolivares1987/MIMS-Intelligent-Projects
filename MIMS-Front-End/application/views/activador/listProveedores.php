   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista Proveedores</h1>
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
            <!-- /.card-header -->
            <div class="card-body">
            <br />
                        <button class="btn btn-block btn-outline-success" onclick="add_proveedor()"><i class="glyphicon glyphicon-plus"></i> Agregar Proveedor</button>
                        <button class="btn btn-block btn-outline-secondary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button>
                        <br />
                        <br />
                        <table id="ListProveedor" class="table table-striped table-bordered" cellspacing="1" width="99%">
                            <thead>
                                <tr>
                                    
                                    <th>Nombre Proveedor</th>
                                    <th>Rut Proveedor</th>
                                    <th>Dv Proveedor</th>
                                    <th></th>
                                    <th></th>
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
    $('#ListProveedor').DataTable({ 
        

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Proveedores/listaProveedores')?>",
                    "type": "POST"
                },
                    "paging":         false,
        "fixedColumns": true,
        language: {
               "emptyTable":			"No hay datos disponibles en la tabla.",
               "info":		   			"Del _START_ al _END_ de _TOTAL_ ",
               "infoEmpty":			"Mostrando 0 registros de un total de 0.",
               "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
               "infoPostFix":			"(actualizados)",
               "lengthMenu":			"Mostrar _MENU_ registros",
               "loadingRecords":		"Cargando...",
               "processing":			"Procesando...",
               "search":				"Buscar:",
               "searchPlaceholder":	"Dato para buscar",
               "zeroRecords":			"No se han encontrado coincidencias.",
               "aria": {
                   "sortAscending":	"Ordenación ascendente",
                   "sortDescending":	"Ordenación descendente"
               }
        },
        rowReorder: {
            "selector": 'td:nth-child(2)'
        },
        "responsive": true

    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

function reload_table()
{
     $('#ListProveedor').DataTable().ajax.reload();
}

function add_proveedor()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal-default').modal('show'); // show bootstrap modal
    $('.modal-title').text('Agregar Proveedor'); // Set Title to Bootstrap modal title
}

function edit_proveedor(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Proveedores/obtieneProveedorPorId')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="idProveedor"]').val(data.idProveedor);
            $('[name="nombreProveedor"]').val(data.nombreProveedor);
            $('[name="rutProveedor"]').val(data.rutProveedor);
            $('[name="dvProveedor"]').val(data.dvProveedor);

            

            $('#modal-default').modal('show'); // show bootstrap modal
            $('.modal-title').text('Editar Proveedor'); // Set title to Bootstrap modal title


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Proveedores/agregarProveedor')?>";
    } else {
        url = "<?php echo site_url('Proveedores/updateProveedor')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal-default').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}


function delete_proveedor(id)
{
    if(confirm('Está Seguro de eliminar el Proveedor?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Proveedores/deleteProveedor')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_default').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
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
              <h4 class="modal-title">Agregar Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="idProveedor"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre</label>
                            <div class="col-md-9">
                                <input name="nombreProveedor" placeholder="Nombre Proveedor" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rut Proveedor</label>
                            <div class="col-md-9">
                                <input name="rutProveedor" placeholder="Rut Proveedor" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Dv Proveedor</label>
                            <div class="col-md-9">
                                <input name="dvProveedor" placeholder="dv Proveedor" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success swalDefaultSuccess" onclick="save()" data-dismiss="modal">Save</button>
              <button type="button" class="btn btn-danger">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>