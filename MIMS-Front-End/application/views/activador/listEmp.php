<div class="row">
        <div class="col-md col-md-offset well">
            <div class="panel-body">
                        <br />
                        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Agregar Empleado</button>
                        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button>
                        <br />
                        <br />
                        <table id="ListEmp" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>LastName</th>
                                    <th>FirstName</th>
                                    <th>E-mailAddress</th>
                                    <th>JobTitle</th>
                                    <th>BusinessPhone</th>
                                    <th>HomePhone</th>
                                    <th>MobilePhone</th>
                                    <th>FaxNumber</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State/Province</th>
                                    <th>ZIP Postal Code</th>
                                    <th>Country/Region</th>
                                    <th>WebPage</th>
                                    <th>Notes</th>
                                    <th>Attachments</th>
                                     <th></th>
                                     <th></th>

                                


                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                            <tfoot>
                            <tr>
                            <th>ID</th>
                                    <th>Company</th>
                                    <th>LastName</th>
                                    <th>FirstName</th>
                                    <th>E-mailAddress</th>
                                    <th>JobTitle</th>
                                    <th>BusinessPhone</th>
                                    <th>HomePhone</th>
                                    <th>MobilePhone</th>
                                    <th>FaxNumber</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State/Province</th>
                                    <th>ZIP Postal Code</th>
                                    <th>Country/Region</th>
                                    <th>WebPage</th>
                                    <th>Notes</th>
                                    <th>Attachments</th>
                                     <th></th>
                                     <th></th>
                            </tr>
                            </tfoot>
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

                //Set column definition initialisation properties.
                "columnDefs": [
                    { 
                        "targets": [ -1 ], //last column
                        "orderable": false, //set not orderable
                    }
                ],
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
          fixedHeader: {
                header: true,
                footer: true
            },
            fixedColumns: true,
            scrollX:        "400px",
            scrollCollapse: true,
            paging:         false,
            columnDefs: [
                { width: '20%', targets: 0 }
            ],
            fixedColumns: true

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

function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Photo'); // label photo upload
}

</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->