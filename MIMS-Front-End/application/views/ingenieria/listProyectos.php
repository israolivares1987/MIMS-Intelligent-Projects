   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--h5 class="card-title m-0">Clientes empresa <?php #echo $nombreCliente;?>
            </h5-->
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
                <div class="card">
                  <div class="card-header">
                    <h5>Clientes</h5>
                  </div>
                  <div class="card-body">
                      <div class="container">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccione cliente</label>
                            <?php echo $select_clientes;?>
                          </div>
                        </div>
                      </div>
                  </div><!--.card-body-->
                </div><!--.card-->
                <div class="card mt-5">
                  <div class="card-header">
                    <h5>Proyectos</h5>
                  </div>
                  <div class="card-body">
                    <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                              <th>Codigo Proyecto</th>
                              <th>OrderID</th>
                              <th>OrderDescription</th>
                              <th>Supplier</th>
                              <th>Employee</th>
                              <th>OrderDate</th>
                              <th>DateRequired</th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div><!--.card-body-->
                </div><!--.card-->
                <div class="card mt-5">
                  <div class="card-header">
                    <h5>Ordenes de Compra</h5>
                  </div>
                  <div class="card-body">
                    <table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                            <th>Codigo Proyecto</th>
                            <th>OrderID</th>
                            <th>OrderDescription</th>
                            <th>Supplier</th>
                            <th>Employee</th>
                            <th>OrderDate</th>
                            <th>DateRequired</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div><!--.card-body-->
                </div><!--.card-->
            </div><!--.card-header-->
            <!-- /.card-header -->
         </div><!--.card--> 
        </div><!--.col-12-->    
      </div><!--.row-->
       

<script type="text/javascript">

   

$(document).ready(function() { 

  $('[data-toggle="tooltip"]').tooltip();
    

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



function reloadTableOrdenes(idCliente,idProyecto)
{

       //datatables
       $('#ListOrdenes').DataTable({ 
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.
          "destroy": true,
          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "<?php echo site_url('Proyectos/obtieneProyectosProveedor/')?>" + idCliente + "/" + idProyecto,
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


    $('#ListOrdenes').DataTable().ajax.reload();
}




</script>