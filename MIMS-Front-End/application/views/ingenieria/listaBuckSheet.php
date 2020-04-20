 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Order Description <?php echo urldecode($purchaseOrdername);?></h1>
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
                     <div class="card-body">

                         <!-- Display status message -->
                         <?php if(!empty($success_msg)){ ?>

                         <div class="col-xs-12">
                             <div class="alert alert-success"><?php echo $success_msg; ?></div>
                         </div>
                         <?php if(form_error('fileURL')) {?>     
                            <div class="col-xs-12">
                             <div class="alert alert-danger"><?php print form_error('fileURL'); ?></div>
                         </div>    
                        <?php } ?>
                         <?php }elseif(!empty($error_msg)){ ?>
                         <div class="col-xs-12">
                             <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                         </div>
                         <?php } ?>
                         <a href="javascript:void(0);" class="btn btn-block btn-outline-success"
                             onclick="formToggle('importFrm');"><i class="glyphicon glyphicon-plus"></i> Subir archivo
                             Bucksheet</a>
                             </br>
                         <div class="col-md-12" id="importFrm" style="display: none;">
                         <form role="form" action="<?php print site_url();?>/BuckSheet/save/<?php echo $PurchaseOrderID;?>/<?php echo $purchaseOrdername;?>"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                              <div class="card-body">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" name="fileURL" id="fileURL" class="custom-file-input" data-allowed-file-extensions="[CSV, csv]" accept=".CSV, .csv" data-buttontext="Choose File">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-outline-success">Cargar</button>
                              </div>
                            </form>
                         </div>
                         </br>
                         <button class="btn btn-block btn-outline-success" onclick="descargaArchivoPrueba()"><i
                                 class="glyphicon glyphicon-plus"></i>Descargar archivo ejemplo aquí</button>
                         </br>
                         </br>
                         <table id="example" class="display" style="width:100%">
                             <thead>
                                 <tr>
                                     <th></th>
                                     <th>purchaseOrdername</th>
                                     <th>NumeroLinea</th>
                                     <th>ItemST</th>
                                     <th>SubItemST</th>
                                     <th>STUnidad</th>

                                 </tr>
                             </thead>
                             <tfoot>
                                 <tr>
                                     <th></th>
                                     <th>purchaseOrdername</th>
                                     <th>NumeroLinea</th>
                                     <th>ItemST</th>
                                     <th>SubItemST</th>
                                     <th>STUnidad</th>
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
function format(d) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' + '<td>STCantidad:</td>' + '<td>' + String(d.STCantidad).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>TAGNumber:</td>' + '<td>' + String(d.TAGNumber).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Stockcode:</td>' + '<td>' + String(d.Stockcode).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Descripcion:</td>' + '<td>' + String(d.Descripcion).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>PlanoModelo:</td>' + '<td>' + String(d.PlanoModelo).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Revision :</td>' + '<td>' + String(d.Revision).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>PaqueteConstruccionArea:</td>' + '<td>' + String(d.PaqueteConstruccionArea).replace("null", "") +
        '</td>' + '</tr>' +
        '<tr>' + '<td>PesoUnitario:</td>' + '<td>' + String(d.PesoUnitario).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>PesoTotal:</td>' + '<td>' + String(d.PesoTotal).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaRAS:</td>' + '<td>' + String(d.FechaRAS).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>DiasAntesRAS:</td>' + '<td>' + String(d.DiasAntesRAS).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaComienzoFabricacion:</td>' + '<td>' + String(d.FechaComienzoFabricacion).replace("null",
        "") + '</td>' + '</tr>' +
        '<tr>' + '<td>PAFCF:</td>' + '<td>' + String(d.PAFCF).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaTerminoFabricacion:</td>' + '<td>' + String(d.FechaTerminoFabricacion).replace("null", "") +
        '</td>' + '</tr>' +
        '<tr>' + '<td>PAFTF:</td>' + '<td>' + String(d.PAFTF).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaGranallado:</td>' + '<td>' + String(d.FechaGranallado).replace("null", "") + '</td>' +
        '</tr>' +
        '<tr>' + '<td>PAFG:</td>' + '<td>' + String(d.PAFG).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaPintura:</td>' + '<td>' + String(d.FechaPintura).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>PAFP:</td>' + '<td>' + String(d.PAFP).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaListoInspeccion:</td>' + '<td>' + String(d.FechaListoInspeccion).replace("null", "") +
        '</td>' + '</tr>' +
        '<tr>' + '<td>PAFLI:</td>' + '<td>' + String(d.PAFLI).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>ActaLiberacionCalidad:</td>' + '<td>' + String(d.ActaLiberacionCalidad).replace("null", "") +
        '</td>' + '</tr>' +
        '<tr>' + '<td>FechaSalidaFabrica:</td>' + '<td>' + String(d.FechaSalidaFabrica).replace("null", "") + '</td>' +
        '</tr>' +
        '<tr>' + '<td>PAFSF:</td>' + '<td>' + String(d.PAFSF).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>FechaEmbarque:</td>' + '<td>' + String(d.FechaEmbarque).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>PackingList:</td>' + '<td>' + String(d.PackingList).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>GuiaDespacho:</td>' + '<td>' + String(d.GuiaDespacho).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>SCNNumber:</td>' + '<td>' + String(d.SCNNumber).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>UnidadesSolicitadas:</td>' + '<td>' + String(d.UnidadesSolicitadas).replace("null", "") +
        '</td>' + '</tr>' +
        '<tr>' + '<td>UnidadesRecibidas:</td>' + '<td>' + String(d.UnidadesRecibidas).replace("null", "") + '</td>' +
        '</tr>' +
        '<tr>' + '<td>MaterialReceivedReport:</td>' + '<td>' + String(d.MaterialReceivedReport).replace("null", "") +
        '</td>' + '</tr>' +
        '<tr>' + '<td>MaterialWithdrawalReport:</td>' + '<td>' + String(d.MaterialWithdrawalReport).replace("null",
        "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Origen:</td>' + '<td>' + String(d.Origen).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>DiasViaje:</td>' + '<td>' + String(d.DiasViaje).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion1:</td>' + '<td>' + String(d.Observacion1).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion2:</td>' + '<td>' + String(d.Observacion2).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion3:</td>' + '<td>' + String(d.Observacion3).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion4:</td>' + '<td>' + String(d.Observacion4).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion5:</td>' + '<td>' + String(d.Observacion5).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion6:</td>' + '<td>' + String(d.Observacion6).replace("null", "") + '</td>' + '</tr>' +
        '<tr>' + '<td>Observacion7:</td>' + '<td>' + String(d.Observacion7).replace("null", "") + '</td>' + '</tr>' +
       '</table>';

}

function formToggle(ID) {
    var element = document.getElementById(ID);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}


function descargaArchivoPrueba() {

    window.open('<?php echo base_url();?>assets/csv-sample-bucksheet.csv', '_blank');
}

function reload_table() {
    $('#example').DataTable().ajax.reload();
}







$(document).ready(function() {

    var table  = $('#example').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "ajax": {
            "url": "<?php echo site_url('BuckSheet/obtieneBucksheet/'.$PurchaseOrderID);?>",
            "type": "POST"
        },
        "columns": [{
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            {
                "data": "purchaseOrdername"
            },
            {
                "data": "NumeroLinea"
            },
            {
                "data": "ItemST"
            },
            {
                "data": "SubItemST"
            },
            {
                "data": "STUnidad"
            }
        ],
        "order": [
            [1, 'asc']
        ],
        "paging": false,
        "scrollY": "300px",
        "fixedColumns": true,
        language: {
            "info": "Del _START_ al _END_ de _TOTAL_ ",
            "infoEmpty": "Mostrando 0 registros de un total de 0.",
            "infoFiltered": "(filtrados de un total de _MAX_ registros)",
            "infoPostFix": "(actualizados)",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchPlaceholder": "Dato para buscar",
            "zeroRecords": "No se han encontrado coincidencias.",
            "emptyTable": "No hay datos disponibles en la tabla.",
            "aria": {
                "sortAscending": "Ordenación ascendente",
                "sortDescending": "Ordenación descendente"
            }
        },
        "fixedHeader": {
            "header": true,
            "footer": true
        },
        "scrollCollapse": true,
        "columnDefs": [{
            "width": '5%',
            "targets": 0
        }],
        "fixedColumns": true
    });

    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
});
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