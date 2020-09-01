 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Administracion de ordenes y contratos</h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Detalle Orden de Compra
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                          <dl class="row">
                                             <dt class="col-sm-12">Order ID:</dt>
                                             <dd class="col-sm-10"><?php echo $PurchaseOrderID;?></dd>
                                             <dt class="col-sm-12">Descripción:</dt>
                                             <dd class="col-sm-10"><?php echo urldecode($PurchaseOrderDescription);?></dd>
                                             <dt class="col-sm-12">PurchaseOrderNumber:</dt>
                                             <dd class="col-sm-10"><?php echo urldecode($PurchaseOrderNumber);?></dd>             
                                             </dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>

                             </div>
                             <!-- /.col-md-6 -->
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Detalle Proyecto
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                     <dl class="row">
                                             <dt class="col-sm-8">Cliente:</dt>
                                             <dd class="col-sm-7"><?php echo $nombreCliente;?></dd>
                                             <dt class="col-sm-8">Proyecto:</dt>
                                             <dd class="col-sm-7"><?php echo urldecode($DescripcionProyecto);?></dd>
                                             <dt class="col-sm-8">Razon Social:</dt>
                                             <dd class="col-sm-7"><?php echo urldecode($razonSocial);?></dd>
                                             </dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                         </div>
                         <!-- /.row -->
                     


                     <!-- /.card-header -->
                     <div class="card-body">
                     <table class="" cellspacing="0" width="100%">
                                 <tbody>
                                     <tr>
                                        <th>
                                             <div class="col-12">
                                             <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="descarga_bucksheet()"><i class="fas fa-file-download">
                                                     </i> Descargar BuckSheet
                                                 </button>   
                                             </div>
                                         </th>
                                         <th>
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="controldecalidad()"><i class="fas fa-file-download">
                                                     </i> Control de calidad
                                                 </button>
                                             </div>
                                         </th>
                                         <th>
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="cambiosenorden()"><i class="fas fa-file-download">
                                                     </i> Cambios en la orden
                                                 </button>
                                             </div>
                                         </th>
                                     </tr>
                                 </tbody>
                             </table>

                         <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                             <button class="btn btn-outline-secondary float-right"
                                                     onclick="lista_bucksheet()"> <i class="fas fa-spinner">
                                                     </i>  Actualizar
                                                 </button>
                                                 <button class="btn btn-outline-secondary float-right"
                                                     onclick="descargaArchivoPrueba()"><i class="fas fa-file-download">
                                                     </i> Descargar Archivo ejemplo
                                                 </button>
                                             

                                     </th>
                                 </tr>
                             </tbody>
                         </table>

                         <table id="tbl_bucksheet" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                             <tr>
                                         <th>Nombre de la Orden</th>
                                         <th>Estado Linea</th>
                                         <th>Numero Linea</th>
                                         <th>Proveedor</th>
                                         <th>Item ST</th>
                                         <th>SubItem ST</th>
                                         <th>ST Unidad</th>
                                         <th>ST Cantidad</th>
                                         <th>TAG Number</th>
                                         <th>Stockcode</th>
                                         <th>Descripcion</th>
                                         <th>Plano Modelo</th>
                                         <th>Revision</th>
                                         <th>Paquete Construccion Area</th>
                                         <th>Medida Unitaria</th>
                                         <th>Peso Total</th>
                                         <th>Fecha RAS</th>
                                         <th>Dia sAntes RAS</th>
                                         <th>Fecha Comienzo Fabricacion</th>
                                         <th>P/A FCF</th>
                                         <th>Fecha Termino Fabricacion</th>
                                         <th>P/A FTF</th>
                                         <th>Fecha Granallado</th>
                                         <th>P/A FG</th>
                                         <th>Fecha Pintura</th>
                                         <th>P/A FP</th>
                                         <th>Fecha Listo Inspeccion</th>
                                         <th>P/A FLI</th>
                                         <th>Acta Liberacion Calidad</th>
                                         <th>Fecha Salida Fabrica</th>
                                         <th>P/A FSF</th>
                                         <th>Fecha Embarque</th>
                                         <th>Packing List</th>
                                         <th>Guia Despacho</th>
                                         <th>SCN Number</th>
                                         <th class="grey" >Unidades Solicitadas</th>
                                         <th class="grey" >Unidades Recibidas</th>
                                         <th class="grey" >RR Reporte de Recepción</th>
                                         <th class="grey" >RE Reporte de Entrega</th>
                                         <th>Origen</th>
                                         <th>Dias Viaje</th>
                                         <th>Observacion 1</th>
                                         <th>Observacion 2</th>
                                         <th>Observacion 3</th>
                                         <th>Observacion 4</th>
                                         <th>Observacion 5</th>
                                         <th>Observacion 6</th>
                                         <th>Observacion 7</th>
                                     </tr>
                             </thead>
                             <tbody id="datos_bucksheet">
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>


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

             .grey {
            background-color: rgba(128,128,128,.25)!important;
            }

             </style>



             <script type="text/javascript">


             function lista_bucksheet(){

                    var cliente = <?php echo $idCliente?> ;
                    var orden = <?php echo $PurchaseOrderID;?> ;

                    recargaBuckSheet(orden, cliente);

             }


            $(document).ready(function() {

                    var cliente = <?php echo $idCliente?> ;
                    var orden = <?php echo $PurchaseOrderID;?> ;

                    recargaBuckSheet(orden, cliente);



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


        function mostrarBlock(){
                $.blockUI({ 
                        message: '<h5><img style="width: 12px;" src="<?php echo base_url('assets/dist/img/loader.gif');?>" />&nbsp;Espere un momento...</h5>',
                    css:{
                        backgroundColor: '#0063BE',
                        opacity: .8,
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px',
                        color: '#fff'
                    }
                });
            }


            
           
             function recargaBuckSheet(orden, cliente) {


                 var tabla_bucksheet = $('#tbl_bucksheet').DataTable();

                 

                 tabla_bucksheet.destroy();

                 var  id_orden = '<?php echo $PurchaseOrderID;?>';
                 var   bucksheet_html = "";

                 $.ajax({
                     url: '<?php echo site_url('BuckSheet/obtieneBucksheet')?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: {
                        id_orden: id_orden
                     },
                 }).done(function(result) {


                     $.each(result.bucksheets, function(key, bucksheets) {
                         bucksheet_html += '<tr>';
                         bucksheet_html += '<td>' + bucksheets.purchaseOrdername+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.EstadoLineaBucksheet+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.NumeroLinea+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.SupplierName+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.ItemST+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.SubItemST+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.STUnidad+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.STCantidad+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.TAGNumber+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Stockcode+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Descripcion+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PlanoModelo+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Revision+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PaqueteConstruccionArea+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PesoUnitario+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PesoTotal+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaRAS+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.DiasAntesRAS+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaComienzoFabricacion+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PAFCF+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaTerminoFabricacion+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PAFTF+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaGranallado+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PAFG+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaPintura+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PAFP+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaListoInspeccion+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PAFLI+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.ActaLiberacionCalidad+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaSalidaFabrica+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PAFSF+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.FechaEmbarque+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PackingList+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.GuiaDespacho+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.SCNNumber+ '</td>';
                        bucksheet_html += '<td class="grey" >' + bucksheets.UnidadesSolicitadas+ '</td>';
                        bucksheet_html += '<td class="grey" >' + bucksheets.UnidadesRecibidas+ '</td>';
                        bucksheet_html += '<td class="grey" >' + bucksheets.MaterialReceivedReport+ '</td>';
                        bucksheet_html += '<td class="grey" >' + bucksheets.MaterialWithdrawalReport+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Origen+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.DiasViaje+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion1+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion2+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion3+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion4+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion5+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion6+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.Observacion7+ '</td>';
                        bucksheet_html += '</tr>';

                     });


                     $('#datos_bucksheet').html(bucksheet_html);

                     $('#tbl_bucksheet').DataTable({
                        "searching": true,
                        language: {
                            url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
                        },
                        "paging": false,
                        "lengthChange": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                        //"responsive": true,
                        "scrollY": "400px",
                        "scrollX": "200px",
                        "scrollCollapse": true
                     });

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

            
               

                function descargaArchivoPrueba() {

                window.open('<?php echo base_url('assets/'.$nombreArchivoEjemplo);?>', '_blank');
                }

                function controldecalidad() {

                window.open('<?php echo site_url('Journal/controlCalidad/'.$idCliente.'/'.$PurchaseOrderID.'/'.$codProyecto)?>', '_blank');
                }

                function descarga_bucksheet() {

                window.open('<?php echo site_url('BuckSheet/exportCSV/'.$PurchaseOrderID)?>', '_blank');
                }

                function cambiosenorden() {

                window.open('<?php echo site_url('Journal/cambiosOrden/'.$idCliente.'/'.$PurchaseOrderID.'/'.$codProyecto)?>', '_blank');
                }

               



             </script>

             <script>
             $(function() {
                 //Initialize Select2 Elements


                 //Datemask dd-mm-yyyy
                 $('#datemask').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
                 })
                 //Datemask2 mm/dd/yyyy
                 $('#datemask2').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()



             })
             </script>


    