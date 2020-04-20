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
                         <div class="card-body">

                             <table class="table table-striped table-bordered" cellspacing="1" width="99%">
                                 <tbody>
                                     <tr>
                                         <th colspan="2">
                                             <!-- Display status message -->
                                             <?php if(!empty($success_msg)){ ?>

                                             <div class="col-xs-12">
                                                 <div class="alert alert-success"><?php echo $success_msg; ?></div>
                                             </div>
                                             <?php if(form_error('fileURL')) {?>
                                             <div class="col-xs-12">
                                                 <div class="alert alert-danger"><?php print form_error('fileURL'); ?>
                                                 </div>
                                             </div>
                                             <?php } ?>
                                             <?php }elseif(!empty($error_msg)){ ?>
                                             <div class="col-xs-12">
                                                 <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                                             </div>
                                             <?php } ?>
                                         </th>
                                     </tr>
                                     <tr>
                                         <th>
                                             <div class="col-12">
                                                 <a href="javascript:void(0);"
                                                     class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="formToggle('importFrm');"><i class="fas fa-file-upload">
                                                     </i> Subir archivo
                                                 </a>
                                             </div>
                                         </th>
                                         <th>
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="descargaArchivoPrueba()"><i class="fas fa-file-download">
                                                     </i> Archivo ejemplo
                                                 </button>
                                             </div>
                                         </th>
                                     </tr>
                                     <tr>
                                         <th colspan="2">
                                             <div class="col-md-12" id="importFrm" style="display: none;">
                                                 <form role="form"
                                                     action="<?php print site_url();?>/BuckSheet/save/<?php echo $PurchaseOrderID;?>/<?php echo $purchaseOrdername;?>"
                                                     enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                     <div class="card-body">
                                                         <div class="form-group">
                                                             <label for="exampleInputFile">Cargar Archivo</label>
                                                             <div class="input-group">
                                                                 <div class="custom-file">
                                                                     <input name="fileURL" type="file" class="custom-file-input"
                                                                         id="exampleInputFile" data-allowed-file-extensions="[CSV, csv]" accept=".CSV, .csv">
                                                                     <label class="custom-file-label"
                                                                         for="exampleInputFile"></label>
                                                                 </div>
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text" id="">Upload</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <!-- /.card-body -->

                                                     <div class="card-footer">
                                                         <button type="submit"
                                                             class="btn btn-block btn-outline-success"> <i
                                                                 class="far fa-check-circle"></i> Cargar</button>
                                                     </div>
                                                 </form>
                                             </div>
                                         </th>
                                     </tr>
                                 </tbody>
                             </table>



                             </br>
                             </br>
                             <table id="ListBucksheet" class="table table-striped table-bordered" cellspacing="1"
                                 width="99%">
                                 <thead>
                                     <tr>
                                         <th>Editar</th>
                                         <th>purchaseOrdername</th>
                                         <th>NumeroLinea</th>
                                         <th>ItemST</th>
                                         <th>SubItemST</th>
                                         <th>STUnidad</th>
                                         <th>STCantidad</th>
                                         <th>TAGNumber</th>
                                         <th>Stockcode</th>
                                         <th>Descripcion</th>
                                         <th>PlanoModelo</th>
                                         <th>Revision</th>
                                         <th>PaqueteConstruccionArea</th>
                                         <th>PesoUnitario</th>
                                         <th>PesoTotal</th>
                                         <th>FechaRAS</th>
                                         <th>DiasAntesRAS</th>
                                         <th>FechaComienzoFabricacion</th>
                                         <th>PAFCF</th>
                                         <th>FechaTerminoFabricacion</th>
                                         <th>PAFTF</th>
                                         <th>FechaGranallado</th>
                                         <th>PAFG</th>
                                         <th>FechaPintura</th>
                                         <th>PAFP</th>
                                         <th>FechaListoInspeccion</th>
                                         <th>PAFLI</th>
                                         <th>ActaLiberacionCalidad</th>
                                         <th>FechaSalidaFabrica</th>
                                         <th>PAFSF</th>
                                         <th>FechaEmbarque</th>
                                         <th>PackingList</th>
                                         <th>GuiaDespacho</th>
                                         <th>SCNNumber</th>
                                         <th>UnidadesSolicitadas</th>
                                         <th>UnidadesRecibidas</th>
                                         <th>MaterialReceivedReport</th>
                                         <th>MaterialWithdrawalReport</th>
                                         <th>Origen</th>
                                         <th>DiasViaje</th>
                                         <th>Observacion1</th>
                                         <th>Observacion2</th>
                                         <th>Observacion3</th>
                                         <th>Observacion4</th>
                                         <th>Observacion5</th>
                                         <th>Observacion6</th>
                                         <th>Observacion7</th>
                                     </tr>
                                 </thead>
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

 <script type="text/javascript" class="init">
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
    $('#ListBucksheet').DataTable().ajax.reload();
}

function edit_bucksheet(numeroLinea, PurchaseOrderID) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url: "<?php echo site_url('BuckSheet/obtieneBuckSheetDet')?>/" + PurchaseOrderID + "/" + numeroLinea,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            $('[name="PurchaseOrderID"]').val(PurchaseOrderID);
            $('[name="numeroLinea"]').val(numeroLinea);
            $('[name="STCantidad"]').val(data.STCantidad);
            $('[name="TAGNumber"]').val(data.TAGNumber);
            $('[name="Stockcode"]').val(data.Stockcode);
            $('[name="Descripcion"]').val(data.Descripcion);
            $('[name="PlanoModelo"]').val(data.PlanoModelo);
            $('[name="Revision"]').val(data.Revision);
            $('[name="PaqueteConstruccionArea"]').val(data.PaqueteConstruccionArea);
            $('[name="PesoUnitario"]').val(data.PesoUnitario);
            $('[name="PesoTotal"]').val(data.PesoTotal);
            $('[name="FechaRAS"]').val(data.FechaRAS);
            $('[name="DiasAntesRAS"]').val(data.DiasAntesRAS);
            $('[name="FechaComienzoFabricacion"]').val(data.FechaComienzoFabricacion);
            $('[name="PAFCF"]').val(data.PAFCF);
            $('[name="FechaTerminoFabricacion"]').val(data.FechaTerminoFabricacion);
            $('[name="PAFTF"]').val(data.PAFTF);
            $('[name="FechaGranallado"]').val(data.FechaGranallado);
            $('[name="PAFG"]').val(data.PAFG);
            $('[name="FechaPintura"]').val(data.FechaPintura);
            $('[name="PAFP"]').val(data.PAFP);
            $('[name="FechaListoInspeccion"]').val(data.FechaListoInspeccion);
            $('[name="PAFLI"]').val(data.PAFLI);
            $('[name="ActaLiberacionCalidad"]').val(data.ActaLiberacionCalidad);
            $('[name="FechaSalidaFabrica"]').val(data.FechaSalidaFabrica);
            $('[name="PAFSF"]').val(data.PAFSF);
            $('[name="FechaEmbarque"]').val(data.FechaEmbarque);
            $('[name="PackingList"]').val(data.PackingList);
            $('[name="GuiaDespacho"]').val(data.GuiaDespacho);
            $('[name="SCNNumber"]').val(data.SCNNumber);
            $('[name="Origen"]').val(data.Origen);
            $('[name="DiasViaje"]').val(data.DiasViaje);
            $('[name="Observacion1"]').val(data.Observacion1);
            $('[name="Observacion2"]').val(data.Observacion2);
            $('[name="Observacion3"]').val(data.Observacion3);
            $('[name="Observacion4"]').val(data.Observacion4);
            $('[name="Observacion5"]').val(data.Observacion5);
            $('[name="Observacion6"]').val(data.Observacion6);
            $('[name="Observacion7"]').val(data.Observacion7);





            $('#modal-default').modal('show'); // show bootstrap modal
            $('.modal-title').text('Editar Bucksheet ' + PurchaseOrderID + ', Numero de Linea ' +
                numeroLinea); // Set title to Bootstrap modal title


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}


function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 

    url = "<?php echo site_url('BuckSheet/updateBuckSheet')?>";


    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {

            if (data.status) //if success close modal and reload ajax table
            {
                $('#modal-default').modal('hide');
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
                        'has-error'
                    ); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
                        i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable 


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable 

        }
    });
}


$(document).ready(function() {



    var table = $('#ListBucksheet').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('BuckSheet/obtieneBucksheet/'.$PurchaseOrderID)?>",
            "type": "POST"
        },
        scrollY: "600px",
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        "language": {
            "emptyTable": "No hay datos disponibles en la tabla.",
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
            "aria": {
                "sortAscending": "Ordenación ascendente",
                "sortDescending": "Ordenación descendente"
            }
        },
        "columns": [{
                "data": "Editar"
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
            },
            {
                "data": "STCantidad"
            },
            {
                "data": "TAGNumber"
            },
            {
                "data": "Stockcode"
            },
            {
                "data": "Descripcion"
            },
            {
                "data": "PlanoModelo"
            },
            {
                "data": "Revision"
            },
            {
                "data": "PaqueteConstruccionArea"
            },
            {
                "data": "PesoUnitario"
            },
            {
                "data": "PesoTotal"
            },
            {
                "data": "FechaRAS"
            },
            {
                "data": "DiasAntesRAS"
            },
            {
                "data": "FechaComienzoFabricacion"
            },
            {
                "data": "PAFCF"
            },
            {
                "data": "FechaTerminoFabricacion"
            },
            {
                "data": "PAFTF"
            },
            {
                "data": "FechaGranallado"
            },
            {
                "data": "PAFG"
            },
            {
                "data": "FechaPintura"
            },
            {
                "data": "PAFP"
            },
            {
                "data": "FechaListoInspeccion"
            },
            {
                "data": "PAFLI"
            },
            {
                "data": "ActaLiberacionCalidad"
            },
            {
                "data": "FechaSalidaFabrica"
            },
            {
                "data": "PAFSF"
            },
            {
                "data": "FechaEmbarque"
            },
            {
                "data": "PackingList"
            },
            {
                "data": "GuiaDespacho"
            },
            {
                "data": "SCNNumber"
            },
            {
                "data": "UnidadesSolicitadas"
            },
            {
                "data": "UnidadesRecibidas"
            },
            {
                "data": "MaterialReceivedReport"
            },
            {
                "data": "MaterialWithdrawalReport"
            },
            {
                "data": "Origen"
            },
            {
                "data": "DiasViaje"
            },
            {
                "data": "Observacion1"
            },
            {
                "data": "Observacion2"
            },
            {
                "data": "Observacion3"
            },
            {
                "data": "Observacion4"
            },
            {
                "data": "Observacion5"
            },
            {
                "data": "Observacion6"
            },
            {
                "data": "Observacion7"
            }
        ]
    });


});
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



 <!-- Bootstrap modal -->

 <div class="modal fade" id="modal-default">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Editar BuckSheet</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="#" id="form" class="form-horizontal">
                     <input type="hidden" value="" name="numeroLinea" />
                     <input type="hidden" value="" name="PurchaseOrderID" />
                     <div class="form-body">
                         <div class="form-group">
                             <label class="control-label col-md-3">ST Cantidad</label>
                             <div class="col-md-9">
                                 <input name="STCantidad" placeholder="STCantidad" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">TAG Number</label>
                             <div class="col-md-9">
                                 <input name="TAGNumber" placeholder="TAG Number" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Stockcode</label>
                             <div class="col-md-9">
                                 <input name="Stockcode" placeholder="Stockcode" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Descripción</label>
                             <div class="col-md-9">
                                 <input name="Descripcion" placeholder="Descripción" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PlanoModelo</label>
                             <div class="col-md-9">
                                 <input name="PlanoModelo" placeholder="PlanoModelo" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Revisión</label>
                             <div class="col-md-9">
                                 <input name="Revision" placeholder="Revisión" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Paquete Construccion o Area</label>
                             <div class="col-md-9">
                                 <input name="PaqueteConstruccionArea" placeholder="Paquete Construccion o Area"
                                     class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Peso Unitario</label>
                             <div class="col-md-9">
                                 <input name="PesoUnitario" placeholder="Peso Unitario" class="form-control"
                                     type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PesoTotal</label>
                             <div class="col-md-9">
                                 <input name="PesoTotal" placeholder="PesoTotal" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="control-label col-md-3">FechaRAS</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaRAS" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="control-label col-md-3">DiasAntesRAS</label>
                             <div class="col-md-9">
                                 <input name="DiasAntesRAS" placeholder="DiasAntesRAS" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaComienzoFabricacion</label>
                             <div class="col-md-9">
                                 <input name="FechaComienzoFabricacion" placeholder="FechaComienzoFabricacion"
                                     class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PAFCF</label>
                             <div class="col-md-9">
                                 <input name="PAFCF" placeholder="PAFCF" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaTerminoFabricacion</label>
                             <div class="col-md-9">
                                 <input name="FechaTerminoFabricacion" placeholder="FechaTerminoFabricacion"
                                     class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PAFTF</label>
                             <div class="col-md-9">
                                 <input name="PAFTF" placeholder="PAFTF" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaGranallado</label>
                             <div class="col-md-9">
                                 <input name="FechaGranallado" placeholder="FechaGranallado" class="form-control"
                                     type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PAFG</label>
                             <div class="col-md-9">
                                 <input name="PAFG" placeholder="PAFG" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaPintura</label>
                             <div class="col-md-9">
                                 <input name="FechaPintura" placeholder="FechaPintura" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PAFP</label>
                             <div class="col-md-9">
                                 <input name="PAFP" placeholder="PAFP" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaListoInspeccion</label>
                             <div class="col-md-9">
                                 <input name="FechaListoInspeccion" placeholder="FechaListoInspeccion"
                                     class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PAFLI</label>
                             <div class="col-md-9">
                                 <input name="PAFLI" placeholder="PAFLI" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">ActaLiberacionCalidad</label>
                             <div class="col-md-9">
                                 <input name="ActaLiberacionCalidad" placeholder="ActaLiberacionCalidad"
                                     class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaSalidaFabrica</label>
                             <div class="col-md-9">
                                 <input name="FechaSalidaFabrica" placeholder="FechaSalidaFabrica" class="form-control"
                                     type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PAFSF</label>
                             <div class="col-md-9">
                                 <input name="PAFSF" placeholder="PAFSF" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">FechaEmbarque</label>
                             <div class="col-md-9">
                                 <input name="FechaEmbarque" placeholder="FechaEmbarque" class="form-control"
                                     type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">PackingList</label>
                             <div class="col-md-9">
                                 <input name="PackingList" placeholder="PackingList" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">GuiaDespacho</label>
                             <div class="col-md-9">
                                 <input name="GuiaDespacho" placeholder="GuiaDespacho" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">SCNNumber</label>
                             <div class="col-md-9">
                                 <input name="SCNNumber" placeholder="SCNNumber" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Origen</label>
                             <div class="col-md-9">
                                 <input name="Origen" placeholder="Origen" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">DiasViaje</label>
                             <div class="col-md-9">
                                 <input name="DiasViaje" placeholder="DiasViaje" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Observacion1</label>
                             <div class="col-md-9">
                                 <input name="Observacion1" placeholder="Observacion1" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Observacion2</label>
                             <div class="col-md-9">
                                 <input name="Observacion2" placeholder="Observacion2" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Observacion3</label>
                             <div class="col-md-9">
                                 <input name="Observacion3" placeholder="Observacion3" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Observacion4</label>
                             <div class="col-md-9">
                                 <input name="Observacion4" placeholder="Observacion4" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Observacion5</label>
                             <div class="col-md-9">
                                 <input name="Observacion5" placeholder="Observacion5" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Observacion6</label>
                             <div class="col-md-9">
                                 <input name="Observacion6" placeholder="Observacion6" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                             <div class="form-group">
                                 <label class="control-label col-md-3">Observacion7</label>
                                 <div class="col-md-9">
                                     <input name="Observacion7" placeholder="Observacion7" class="form-control"
                                         type="text">
                                     <span class="help-block"></span>
                                 </div>
                             </div>

                 </form>
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-block btn-outline-success" onclick="save()">Save</button>
                 <button type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Cancel</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>