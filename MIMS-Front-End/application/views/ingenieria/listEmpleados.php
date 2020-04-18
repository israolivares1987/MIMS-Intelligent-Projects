   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista Empleados</h1>
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
    <br/>
    <br/>
    <br/>
                        <button class="btn btn-block btn-outline-success" onclick="add_empleado()"><i class="glyphicon glyphicon-plus"></i> Agregar Empleado</button>
                        <button class="btn btn-block btn-outline-secondary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button>
                        <br />
                        <br />
                        <table id="ListEmp" class="table table-striped table-bordered" cellspacing="1" width="99%">
                            <thead>
                                <tr>
                                    
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>E-Mail</th>
                                    <th>Cargo</th>
                                    <th>Fono Oficina</th>
                                    <th>Fono Casa</th>
                                    <th>Fono Movil</th>
                                    <th>Region</th>
                                    <th>Provincia</th>
                                    <th>Cuidad</th>
                                    <th>Direccion</th>
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
    $('#ListEmp').DataTable({ 

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Empleados/listaEmpleados')?>",
                    "type": "POST"
                },
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
        "fixedHeader": {
                "header": true,
                "footer": true
            },
            "scrollX":        "400px",
            "scrollCollapse": true,
            "paging":         false,
            "columnDefs": [
                { "width": '20%', "targets": 0 }
            ],
            "fixedColumns": true

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
     $('#ListEmp').DataTable().ajax.reload();
}

function add_empleado()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal-default').modal('show'); // show bootstrap modal
    $('.modal-title').text('Agregar Empleado'); // Set Title to Bootstrap modal title
}

function edit_employees(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Empleados/obtieneEmpleadoPorId')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="ID"]').val(data.ID);
            $('[name="FirstName"]').val(data.FirstName);
            $('[name="LastName"]').val(data.LastName);
            $('[name="EmailAddress"]').val(data.EmailAddress);
            $('[name="JobTitle"]').val(data.JobTitle);
            $('[name="BusinessPhone"]').val(data.BusinessPhone);
            $('[name="HomePhone"]').val(data.HomePhone);
            $('[name="MobilePhone"]').val(data.MobilePhone);
            $('[name="CountryRegion"]').val(data.CountryRegion);
            $('[name="StateProvince"]').val(data.StateProvince);
            $('[name="City"]').val(data.City);
            $('[name="Address"]').val(data.Address);


            

            $('#modal-default').modal('show'); // show bootstrap modal
            $('.modal-title').text('Editar Empleado'); // Set title to Bootstrap modal title


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
        url = "<?php echo site_url('Empleados/agregarEmpleado')?>";
    } else {
        url = "<?php echo site_url('Empleados/updateEmpleado')?>";
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


function delete_employees(id)
{
    if(confirm('Está Seguro de eliminar el Empleado?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Empleados/deleteEmpleado')?>/"+id,
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
              <h4 class="modal-title">Agregar Empleado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="ID"/>  
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre</label>
                            <div class="col-md-9">
                                <input name="FirstName" placeholder="Nombre" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Apellido</label>
                            <div class="col-md-9">
                                <input name="LastName" placeholder="Apellido" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">E-Mail</label>
                            <div class="col-md-9">
                                <input name="EmailAddress" placeholder="Email" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cargo</label>
                            <div class="col-md-9">
                                <textarea name="JobTitle" placeholder="Cargo" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fono Oficina</label>
                            <div class="col-md-9">
                                <textarea name="BusinessPhone" placeholder="Fono Oficina" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fono Casa</label>
                            <div class="col-md-9">
                                <textarea name="HomePhone" placeholder="Fono Casa" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fono Movil</label>
                            <div class="col-md-9">
                                <textarea name="MobilePhone" placeholder="Fono Movil" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Region</label>
                            <div class="col-md-9">
                                <textarea name="CountryRegion" placeholder="Region" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Provincia</label>
                            <div class="col-md-9">
                                <textarea name="StateProvince" placeholder="Provincia" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cuidad</label>
                            <div class="col-md-9">
                                <textarea name="City" placeholder="Cuidad" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Direccion</label>
                            <div class="col-md-9">
                                <textarea name="Address" placeholder="Direccion" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-block btn-outline-success" onclick="save()" data-dismiss="modal">Save</button>
              <button type="button" class="btn btn-block btn-outline-danger">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>