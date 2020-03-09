    <div class="row">
        <div class="col-md col-md-offset well">
            <div class="panel-body">
                <table id="ListExpediting" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>PurchaseOrderID</th>
                                <th>PurchaseOrderDescription</th>
                                <th>SupplierID</th>
                                <th>EmloyeeID</th>
                                <th>OrderDate</th>
                                <th>DateRequired</th>
                                <th>List Bucksheet</th>
                            </tr>
                        </thead>
                                        <tbody>
                                                 <?php echo $DatosExpediting; ?>
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    $(document).ready(function() {


$('#ListExpediting').DataTable( {
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
    paging: false,
    fixedColumns: true,
    scrollX: "400px",
    scrollCollapse: true
} );

   //datepicker
   $('.datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      todayHighlight: true,
      orientation: "top auto",
      todayBtn: true,
      todayHighlight: true,  
  });

} );


</script>    