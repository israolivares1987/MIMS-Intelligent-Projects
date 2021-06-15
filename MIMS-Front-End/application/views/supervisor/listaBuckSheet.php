 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Administración de ordenes y contratos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
 <section class="content">

      <!-- Default box -->
    <div class="card">
        
      <div class="card-body">
        
           <div class="row">
                 <div class="col-sm-3">
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
                                             <dt class="col-sm-8">Order ID:</dt>
                                             <dd class="col-sm-7"><?php echo $PurchaseOrderID;?></dd>
                                             <dt class="col-sm-8">Descripción:</dt>
                                             <dd class="col-sm-7"><?php echo urldecode($PurchaseOrderDescription);?></dd>
                                             <dt class="col-sm-8">Orden de compra cliente:</dt>
                                             <dd class="col-sm-7"><?php echo urldecode($PurchaseOrderNumber);?></dd>             
                                             </dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                    </div>
                            
                             <div class="col-sm-3">
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


                             <div class="col-sm-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Información Wpanel
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                     <div class="row">


                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                                                    <div class="info-box-content">
                                                        <span class="info-box-text">ADVERTENCIA DE ACTIVACIÓN</span>
                                                        <span class="info-box-number"><div id="countAdverActivacion"></div> </span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                                    <div class="info-box-content">
                                                        <span class="info-box-text">DESPACHADOS / TOTAL ACTIVABLES</span>
                                                        <span class="info-box-number"><div id="countDespachos"></div> </span>
                                                    </div>
                                                    <!-- /.info-box-content --> 
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>

                                                </div>
                                                <div class="row">
                                                <!-- /.col -->
                                                        <div class="col-md-6 col-sm-6 col-12">
                                                            <div class="info-box">
                                                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                                                            <div class="info-box-content">
                                                                <span class="info-box-text">ATRASOS</span>
                                                                <span class="info-box-number"><div id="countAtrasados"></div> </span>
                                                            </div>
                                                            <!-- /.info-box-content -->
                                                            </div>
                                                            <!-- /.info-box -->
                                                        </div>
                                                <!-- /.col -->
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                                                    <div class="info-box-content">
                                                        <span class="info-box-text">ADVERTENCIAS DE CALIDAD</span>
                                                        <span class="info-box-number"><div id="countAdverCalidad"></div></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                                </div>

                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                                 </div>
                            
             </div>
           <!-- /.row -->
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
 </section>


 <section class="content">
 <!-- TO DO List -->
 <div class="container-fluid">
        <div class="row">
       
          <div class="col-md-12">
             
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Opciones
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="" cellspacing="0" width="100%">
                                 <tbody>
                                     <tr>
                                         <th>
                                             <div class="col-12">
                                             <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="descarga_bucksheet()"><i class="fas fa-file-download">
                                                     </i> Descargar WPanel
                                                 </button>   
                                             </div>
                                         </th>
                                         <th>
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="controldecalidad(0)"><i class="fas fa-file-download">
                                                     </i> Control de calidad
                                                 </button>
                                             </div>
                                         </th>
                                         <th>
                                             <div class="col-12">
                                                 <button class="btn btn-block btn-outline-success btn-sm"
                                                     onclick="cambiosenorden(0)"><i class="fas fa-file-download">
                                                     </i> Gestión de Activación
                                                 </button>
                                             </div>
                                         </th>
                                     </tr>
                                 </tbody>
                             </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
              </div>
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Detalle Wpanel
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                             <th style="text-align:left; background-color:#FFE699">ID OC</th>
                                        <th style="text-align:left; background-color:#FFE699">NÚMERO OC</th>
                                        <th style="text-align:left; background-color:#FFE699">DESCRIPCIÓN OC</th>
                                        <th style="text-align:left; background-color:#FFE699">ITEM OC</th>
                                        <th style="text-align:left; background-color:#FFE699">SUB-ITEM OC</th>
                                        <th style="text-align:left; background-color:#FFE699">PROVEEDOR</th>
                                        <th style="text-align:left; background-color:#DBDBDB">NÚMERO DE LÍNEA</th>
                                        <th style="text-align:left; background-color:#DBDBDB">TIPO DE LÍNEA</th>
                                        <th style="text-align:left; background-color:#DBDBDB">ESTADO DE LÍNEA</th>
                                        <th style="text-align:left; background-color:#DBDBDB">NÚMERO DE TAG</th>
                                        <th style="text-align:left; background-color:#DBDBDB">STOCKCODE</th>
                                        <th style="text-align:left; background-color:#DBDBDB">DESCRIPCIÓN LÍNEA</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">UNIDADES SOLICITADAS</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">CANTIDAD UNITARIA</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">CANTIDAD TOTAL</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">UNIDAD</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">NÚMERO DE PLANO</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">REVISIÓN</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">PAQUETE DE CONSTRUCCIÓN / ÁREA</th>
                                        <th style="text-align:left; background-color:#333F4F; color:#FFFFFF">FECHA LINEA BASE</th>
                                        <th style="text-align:left; background-color:#333F4F; color:#FFFFFF">DIAS ANTES LB</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA COMIENZO FABRICACION</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA COMIENZO FABRICACION REAL</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA TERMINO FABRICACION</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA TERMINO FABRICACION REAL</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA GRANALLADO</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA GRANALLADO REAL</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA PINTURA</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA PINTURA REAL</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA LISTO INSPECCION</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA LISTO INSPECCION REAL</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA SALIDA FABRICA</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">FECHA EMBARQUE</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">FECHA EMBARQUE REAL</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">PACKINGLIST</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">GUIA DESPACHO</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">NÚMERO DE VIAJE</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">ORIGEN</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">DIAS VIAJE</th>
                                        <th style="text-align:left; background-color:#351805; color:#FFFFFF">UNIDADES RECIBIDAS</th>
                                        <th style="text-align:left; background-color:#351805; color:#FFFFFF">REPORTE DE RECEPCIÓN (RR)</th>
                                        <th style="text-align:left; background-color:#351805; color:#FFFFFF">REPORTE DE ENTREGA (RE)</th>
                                        <th style="text-align:left; background-color:#351805; color:#FFFFFF">REPORTE DE EXCEPCIÓN (EXB)</th>
                                        <th style="text-align:left; background-color:#351805; color:#FFFFFF">INSPECCIÓN DE INGENIERÍA</th>
                                        <th style="text-align:left; background-color:#FF6600; color:#FFFFFF">OBSERVACIÓN</th>
                                     </tr>
                             </thead>
                             <tbody id="datos_bucksheet">
                             </tbody>
                         </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
              </div>
            </div>




          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

  
     <!-- /.content -->

    </div>
  <!-- /.content-wrapper -->
  </section>


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


            
             /**
              * Función que pone el archivo en un FormData
              * @return FormData
              */
             function getFiles(id) {
                 var idFiles = document.getElementById(id);
                 // Obtenemos el listado de archivos en un array
                 var archivos = idFiles.files;
                 // Creamos un objeto FormData, que nos permitira enviar un formulario
                 // Este objeto, ya tiene la propiedad multipart/form-data
                 var data = new FormData();
                 // Recorremos todo el array de archivos y lo vamos añadiendo all
                 // objeto data
                 for (var i = 0; i < archivos.length; i++) {
                     // Al objeto data, le pasamos clave,valor
                     data.append("archivo" + i, archivos[i]);
                 }
                 return data;
             }

             /**
              * Función que recorre todo el formulario para apadir en el FormData los valores del formulario
              * @param string id hace referencia al id del formulario
              * @param FormData data hace referencia al FormData
              * @return FormData
              */
             function getFormData(id, data) {
                 $("#" + id).find("input,select,textarea").each(function(i, v) {
                     if (v.type !== "file") {
                         if (v.type === "checkbox" && v.checked === true) {
                             data.append(v.name, "on");
                         } else {
                             data.append(v.name, v.value);
                         }
                     }
                 });
                 return data;
             }

             function recargaconsultasDatosWpanel(orden, cliente) {



var  id_orden = '<?php echo $PurchaseOrderID;?>';
var   bucksheet_html = "";
var   activacion_html = "";
var   calidad_html = "";

$.ajax({
    url: '<?php echo site_url('Consultas/consultasDatosWpanel')?>',
    type: 'POST',
    dataType: 'JSON',
    data: {
        id_orden_compra: orden,
        id_cliente: cliente
    },
}).done(function(result) {
    

console.log(parseInt(result.countAdverActivacion));

    if(parseInt(result.countAdverActivacion) > 0){

        activacion_html = '<button class="btn btn-block btn-outline-success btn-sm" onclick="controldecalidad(1)">' +result.countAdverCalidad+'</button>';

    }else{

        activacion_html = result.countAdverActivacion;

    }

    console.log(parseInt(result.countAdverCalidad));
    if(parseInt(result.countAdverCalidad) > 0){

        calidad_html = '<button class="btn btn-block btn-outline-danger btn-sm" onclick="controldecalidad(1)">' +result.countAdverCalidad+'</button>';

    }else{

        calidad_html = result.countAdverActivacion;

    }




    $('#countAdverActivacion').html(activacion_html);
    $('#countAtrasados').html(result.countAtrasados);
    $('#countDespachos').html(result.countDespachos + '/' + result.countTotalWpanel);
    $('#countAdverCalidad').html(calidad_html);

   

}).fail(function() {
    console.log("error change cliente");
})

}

             function recargaBuckSheet(orden, cliente) {


                 var tabla_bucksheet = $('#tbl_bucksheet').DataTable();

                 
                 recargaconsultasDatosWpanel(orden, cliente);

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
                         bucksheet_html += '<td style="text-align:left;">' + bucksheets.ID_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.NUMERO_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.DESCRIPCION_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.ITEM_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.SUB_ITEM_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.PROVEEDOR+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.NUMERO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.TIPO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.ESTADO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.NUMERO_DE_TAG+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.STOCKCODE+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.DESCRIPCION_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.UNIDADES_SOLICITADAS+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.CANTIDAD_UNITARIA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.CANTIDAD_TOTAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.UNIDAD+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.NUMERO_DE_PLANO+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.REVISION+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.PAQUETE_DE_CONSTRUCCION_AREA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_LINEA_BASE+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.DIAS_ANTES_LB + '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_COMIENZO_FABRICACION + '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_COMIENZO_FABRICACION_REAL + '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_TERMINO_FABRICACION+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_TERMINO_FABRICACION_REAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_GRANALLADO+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_GRANALLADO_REAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_PINTURA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_PINTURA_REAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_LISTO_INSPECCION+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_LISTO_INSPECCION_REAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_SALIDA_FABRICA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_SALIDA_FABRICA_REAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.FECHA_EMBARQUE+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.PACKINGLIST+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.GUIA_DESPACHO+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.NUMERO_DE_VIAJE+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.ORIGEN+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.DIAS_VIAJE+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.UNIDADES_RECIBIDAS+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.REPORTE_DE_RECEPCION_RR+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.REPORTE_DE_ENTREGA_RE+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.REPORTE_DE_EXCEPCION_EXB+ '</td>';
                        bucksheet_html += '<td style="text-align:left;"> ' + bucksheets.INSPECCION_DE_INGENIERIA+ '</td>';
                        bucksheet_html += '<td style="text-align:left;">' + bucksheets.OBSERVACION+ '</td>';


                        bucksheet_html += '</tr>';

                     });


                     $('#datos_bucksheet').html(bucksheet_html);

                     $('#tbl_bucksheet').DataTable({
                        
                        language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
          "paging": false,
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
            }
    ]}).buttons().container().appendTo('#tbl_bucksheet_wrapper .col-md-6:eq(0)');

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }


                function descargaArchivoPrueba() {

                window.open('<?php echo base_url('assets/'.$nombreArchivoEjemplo);?>', '_blank');
                }

                function controldecalidad(filtro) {

                window.open('<?php echo site_url('Journal/controlCalidad/'.$idCliente.'/'.$PurchaseOrderID.'/'.$codProyecto.'/')?>' + filtro, '_blank');
                }

                function descarga_bucksheet() {

                window.open('<?php echo site_url('BuckSheet/exportCSV/'.$PurchaseOrderID)?>', '_blank');
                }

                function cambiosenorden(filtro) {

                window.open('<?php echo site_url('Journal/cambiosOrden/'.$idCliente.'/'.$PurchaseOrderID.'/'.$codProyecto.'/')?>' + filtro,'_blank');
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


    