   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PurchaseOrderID <?php echo $this->session->userdata('PurchaseOrderID');?></h1>
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
            <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>TransactionID</th>
                <th>TransactionDate</th>
                <th>PO_Item</th>
                <th>PO_Subitem</th>
                <th>Product</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>TransactionID</th>
                <th>TransactionDate</th>
                <th>PO_Item</th>
                <th>PO_Subitem</th>
                <th>Product</th>
            </tr>
        </tfoot>
    </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

                    <script type="text/javascript">   
    
      /* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+'<td>PurchaseOrderID:</td>'+'<td>'+String(d.PurchaseOrderID).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>Description:</td>'+'<td>'+String(d.Description).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>Destination:</td>'+'<td>'+String(d.Destination).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>Unit:</td>'+'<td>'+String(d.Unit).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>UnitsOrdered:</td>'+'<td>'+String(d.UnitsOrdered).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>UnitsReceived:</td>'+'<td>'+String(d.UnitsReceived).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>UnitsMRF:</td>'+'<td>'+String(d.UnitsMRF).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>UnitsShrinkage:</td>'+'<td>'+String(d.UnitsShrinkage).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>DateCreated:</td>'+'<td>'+String(d.DateCreated).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>CreatedBy:</td>'+'<td>'+String(d.CreatedBy).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>RECEIVED_QUANTITY:</td>'+'<td>'+String(d.RECEIVED_QUANTITY).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>RAS:</td>'+'<td>'+String(d.RAS).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>PROMISE_DATE:</td>'+'<td>'+String(d.PROMISE_DATE).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>PROMISE_DATE_F_A:</td>'+'<td>'+String(d.PROMISE_DATE_F_A).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>BEGIN_FAB:</td>'+'<td>'+String(d.BEGIN_FAB).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>BEGIN_FAB_F_A:</td>'+'<td>'+String(d.BEGIN_FAB_F_A).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>COMPLETED_FAB:</td>'+'<td>'+String(d.COMPLETED_FAB).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>COMPLETED_FAB_F_A:</td>'+'<td>'+String(d.COMPLETED_FAB_F_A).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>READY_FOR_INSPECTION:</td>'+'<td>'+String(d.READY_FOR_INSPECTION).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>READY_FOR_INSPECTION_F_A:</td>'+'<td>'+String(d.READY_FOR_INSPECTION_F_A).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>FINAL_INSPECTION:</td>'+'<td>'+String(d.FINAL_INSPECTION).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>FINAL_INSPECTION_F_A:</td>'+'<td>'+String(d.FINAL_INSPECTION_F_A).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>EXITWORKS:</td>'+'<td>'+String(d.EXITWORKS).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>PORT_OF_EXPORT:</td>'+'<td>'+String(d.PORT_OF_EXPORT).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>SHIP_DAYS:</td>'+'<td>'+String(d.SHIP_DAYS).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>FORECAST_DELIVERY:</td>'+'<td>'+String(d.FORECAST_DELIVERY).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>CrateNumber:</td>'+'<td>'+String(d.CrateNumber).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>PACKING_LIST_NUMBER:</td>'+'<td>'+String(d.PACKING_LIST_NUMBER).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>ASN_NUMBER:</td>'+'<td>'+String(d.ASN_NUMBER).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>SCN_NUMBER:</td>'+'<td>'+String(d.SCN_NUMBER).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>TRANSPORT_MODE:</td>'+'<td>'+String(d.TRANSPORT_MODE).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>MRR_NUMBER:</td>'+'<td>'+String(d.MRR_NUMBER).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>POSSESSION_MRR:</td>'+'<td>'+String(d.POSSESSION_MRR).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>ACTUAL_DELIVERY_AT_SITE:</td>'+'<td>'+String(d.ACTUAL_DELIVERY_AT_SITE).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>UOSD:</td>'+'<td>'+String(d.UOSD).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>DELIVERY_DESTINATION:</td>'+'<td>'+String(d.DELIVERY_DESTINATION).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>REMARKS:</td>'+'<td>'+String(d.REMARKS).replace("null","")+'</td>'+'</tr>'+
        '<tr>'+'<td>MWR_Number:</td>'+'<td>'+String(d.MWR_Number).replace("null","")+'</td>'+'</tr>'+
    '</table>'
    
    
  

}
 
$(document).ready(function() {
    
    var table = $('#example').DataTable( {
        "ajax": "<?php echo site_url('Activador/obtieneBucksheet/'.$PurchaseOrderID);?>",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "TransactionID" },
            { "data": "TransactionDate" },
            { "data": "PO_Item" },
            { "data": "PO_Subitem" },
            { "data": "Product" }


        

        ],
        "order": [[1, 'asc']],
        "paging":         false,
        "scrollY":        "300px",
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
           }
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
    
    
    </script>                       
<style type="text/css">
  td.details-control {
    background: url('<?php echo base_url('assets/images/details_open.png');?>') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('<?php echo base_url('assets/images/details_close.png');?>') no-repeat center center;
}
</style>
