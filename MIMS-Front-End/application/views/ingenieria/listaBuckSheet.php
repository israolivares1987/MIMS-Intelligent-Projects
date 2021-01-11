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
                                             <dt class="col-sm-8">PurchaseOrderNumber:</dt>
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
                                                     onclick="subirBuckSheet()"><i class="fas fa-file-download">
                                                     </i> Subir Archivo
                                                 </button>
                                             </div>
                                         </th>
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
                                <th colspan="1">EDITAR</th>
                                <th colspan="6" style="text-align:center; background-color:#FFE699">DESCRIPCIÓN ORDEN DE COMPRA</th>
                                <th colspan="6" style="text-align:center; background-color:#DBDBDB">DETALLE  LÍNEA</th>
                                <th colspan="4" style="text-align:center; background-color:#2E002E; color:#FFFFFF">CANTIDADES / UNIDADES SOLICITUD TÉCNICA</th>
                                <th colspan="10" style="text-align:center; background-color:#FF5050; color:#FFFFFF">ACTIVACIÓN INGENIERÍA</th>
                                <th colspan="2" style="text-align:center; background-color:#333F4F; color:#FFFFFF">MEDICIÓN</th> 
                                <th colspan="13" style="text-align:center; background-color:#FFCC00">PROGRAMA DE PROYECTO</th> 
                                <th colspan="6" style="text-align:center; background-color:#007A37; color:#FFFFFF">LOGÍSTICA</th>
                                <th colspan="6" style="text-align:center; background-color:#351805; color:#FFFFFF">DETALLE BODEGA</th> 
                                <th colspan="1" style="text-align:center; background-color:#FF6600; color:#FFFFFF">OBSERVACIÓN</th> 
                            </tr> 
                             <tr>
                                        <th>EDITAR</th>
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
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">NÚMERO DE ELEMENTOS</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">CANTIDAD UNITARIA</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">CANTIDAD TOTAL</th>
                                        <th style="text-align:left; background-color:#2E002E; color:#FFFFFF">UNIDAD</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">TRANSMITTALCLIENTE</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">FECHA TC</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">TRANSMITTAL PROVEEDOR</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">FECHA TP</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">TRANSMITTAL CLIENTE FINAL</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">FECHA TCF</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">PA TCF</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">NÚMERO DE PLANO</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">REVISIÓN</th>
                                        <th style="text-align:left; background-color:#FF5050; color:#FFFFFF">PAQUETE DE CONSTRUCCIÓN / ÁREA</th>
                                        <th style="text-align:left; background-color:#333F4F; color:#FFFFFF">FECHA LINEA BASE</th>
                                        <th style="text-align:left; background-color:#333F4F; color:#FFFFFF">DIAS ANTES LB</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA COMIENZO FABRICACION</th>
                                        <th style="text-align:left; background-color:#FFCC00">PAFCF</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA TERMINO FABRICACION</th>
                                        <th style="text-align:left; background-color:#FFCC00">PAFTF</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA GRANALLADO</th>
                                        <th style="text-align:left; background-color:#FFCC00">PAFG</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA PINTURA</th>
                                        <th style="text-align:left; background-color:#FFCC00">PAFP</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA LISTO INSPECCION</th>
                                        <th style="text-align:left; background-color:#FFCC00">PAFLI</th>
                                        <th style="text-align:left; background-color:#FFCC00">ACTA LIBERACION CALIDAD</th>
                                        <th style="text-align:left; background-color:#FFCC00">FECHA SALIDA FABRICA</th>
                                        <th style="text-align:left; background-color:#FFCC00">PAFSF</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">FECHA EMBARQUE</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">PACKINGLIST</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">GUIA DESPACHO</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">NÚMERO DE VIAJE</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">ORIGEN</th>
                                        <th style="text-align:left; background-color:#007A37; color:#FFFFFF">DIAS VIAJE</th>
                                        <th style="text-align:left; background-color:#351805; color:#FFFFFF">UNIDADES SOLICITADAS</th>
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

  <div class="modal fade" id="modal_buckSheet">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Subir Archivo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form action="#" id="formBuckSheet" class="form-horizontal">
                                        <input name="idOrden" placeholder="" class="form-control" type="hidden" id="idOrden" value="<?php echo $PurchaseOrderID;?>">
                                        <input name="idCliente" placeholder="" class="form-control" type="hidden" id="idCliente" value="<?php echo $idCliente;?>">
                                        <input name="idProyecto" placeholder="" class="form-control" type="hidden" id="idProyecto" value="<?php echo $codProyecto;?>">
                            
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">Cargar Archivo</label>
                                                                    <div class="custom-file">
                                                                        <input type="file"   id="fileURL"  name="fileURL" >     
                                                                </div>
                                                            </div>
                                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnSave" onclick="saveBuckSheet()">Grabar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- Bootstrap modal -->

<div class="modal fade" id="modal-default">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">Editar Linea Wpanel</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="form" class="form-horizontal">
                     <input type="hidden" value="" name="idProyecto" />
                     <input type="hidden" value="" name="idCliente" />
                     <input type="hidden" value="" name="codEmpresa" />

                     <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">DESCRIPCIÓN ORDEN DE COMPRA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-6">
                                                           
                                                            <div class="form-group"><label for="ID OC">ID OC</label><input type="text" id="ID_OC" class="form-control" name="ID_OC" readonly></div>
                                                            <div class="form-group"><label for="NÚMERO OC">NÚMERO OC</label><input type="text" id="NUMERO_OC" class="form-control" name="NUMERO_OC" readonly></div>
                                                            <div class="form-group"><label for="DESCRIPCIÓN OC">DESCRIPCIÓN OC</label><input type="text" id="DESCRIPCION_OC" class="form-control" name="DESCRIPCION_OC" readonly></div>
                                                    
                                                        </div>

                                                        <div class="col-md-6">
                                                          <div class="form-group"><label for="ITEM OC">ITEM OC</label><input type="text" id="ITEM_OC" class="form-control" name="ITEM_OC"></div>
                                                          <div class="form-group"><label for="SUB-ITEM OC">SUB-ITEM OC</label><input type="text" id="SUB_ITEM_OC" class="form-control" name="SUB_ITEM_OC"></div>
                                                          <div class="form-group"><label for="PROVEEDOR">PROVEEDOR</label><input type="text" id="PROVEEDOR" class="form-control" name="PROVEEDOR"></div>
                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">DETALLE LÍNEA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                               
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="NÚMERO DE LÍNEA">NÚMERO DE LÍNEA</label><input type="text" id="NUMERO_DE_LINEA" class="form-control" name="NUMERO_DE_LINEA" readonly></div>
                                                            <div class="form-group"><label for="TIPO DE LÍNEA">TIPO DE LÍNEA</label>
                                                            <div id="select_tipo_linea"> </div>
                                                            </div>


                                                            <div class="form-group">
                                                               <label for="ESTADO DE LÍNEA">ESTADO DE LÍNEA</label> 
                                                               <div id="select_estado_linea"> </div>
                                                               </div>
                                                              
                                                        </div>

                                                        <div class="col-md-6">
                                                             <div class="form-group"><label for="NÚMERO DE TAG">NÚMERO DE TAG</label><input type="text" id="NUMERO_DE_TAG" class="form-control" name="NUMERO_DE_TAG"></div>
                                                             <div class="form-group"><label for="STOCKCODE">STOCKCODE</label><input type="text" id="STOCKCODE" class="form-control" name="STOCKCODE"></div>
                                                             <div class="form-group"><label for="DESCRIPCIÓN LÍNEA">DESCRIPCIÓN LÍNEA</label><input type="text" id="DESCRIPCION_LINEA" class="form-control" name="DESCRIPCION_LINEA"></div>
                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">CANTIDADES / UNIDADES SOLICITUD TÉCNICA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                               
                                                        <div class="col-md-6">

                                                         <div class="form-group"><label for="NÚMERO DE ELEMENTOS">NÚMERO DE ELEMENTOS</label><input onchange="mostrarPesoTotal(this)" onkeyup="formatoNumero(this)" type="text" id="NUMERO_DE_ELEMENTOS" class="form-control" name="NUMERO_DE_ELEMENTOS"></div>
                                                         <div class="form-group"><label for="CANTIDAD UNITARIA">CANTIDAD UNITARIA</label><input onchange="mostrarPesoTotal(this)" onkeyup="formatoNumero(this)" type="text" id="CANTIDAD_UNITARIA" class="form-control" name="CANTIDAD_UNITARIA"></div>
 
                                                            
                                                        </div>

                                                        <div class="col-md-6">
                                                        <div class="form-group"><label for="CANTIDAD TOTAL">CANTIDAD TOTAL</label><input onchange="formatoNumero(this)" type="text" id="CANTIDAD_TOTAL" class="form-control" name="CANTIDAD_TOTAL" readonly></div>
                                                        <div class="form-group"><label for="UNIDAD">UNIDAD</label>
                                                        <div id="select_unidad"> </div>
                                                        
                                                        
                                                        </div>
 
                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">ACTIVACIÓN INGENIERÍA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">


                                               
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="TRANSMITTAL CLIENTE">TRANSMITTAL CLIENTE</label><input type="text" id="TRANSMITTAL_CLIENTE" class="form-control" name="TRANSMITTAL_CLIENTE"></div>
                                                            <div class="form-group"><label for="FECHA TC">FECHA TC</label><input type="text" id="FECHA_TC" class="form-control" name="FECHA_TC"></div>
                                                            <div class="form-group"><label for="TRANSMITTAL PROVEEDOR">TRANSMITTAL PROVEEDOR</label><input type="text" id="TRANSMITTAL_PROVEEDOR" class="form-control" name="TRANSMITTAL_PROVEEDOR"></div>
                                                            <div class="form-group"><label for="FECHA TP">FECHA TP</label><input type="text" id="FECHA_TP" class="form-control" name="FECHA_TP"></div>
                                                            <div class="form-group"><label for="TRANSMITTAL CLIENTE FINAL">TRANSMITTAL CLIENTE FINAL</label><input type="text" id="TRANSMITTAL_CLIENTE_FINAL" class="form-control" name="TRANSMITTAL_CLIENTE_FINAL"></div>
   
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="FECHA TCF">FECHA TCF</label><input type="text" id="FECHA_TCF" class="form-control" name="FECHA_TCF"></div>
                                                            <div class="form-group"><label for="PA TCF">PA TCF</label>
                                                              <div id="select_patcf"></div>
                                                              </div>
                                                           
                                                            <div class="form-group"><label for="NÚMERO DE PLANO">NÚMERO DE PLANO</label><input type="text" id="NUMERO_DE_PLANO" class="form-control" name="NUMERO_DE_PLANO"></div>
                                                            <div class="form-group"><label for="REVISIÓN">REVISIÓN</label><input onkeyup="formatoNumero(this)" type="text" id="REVISION" class="form-control" name="REVISION"></div>
                                                            <div class="form-group"><label for="PAQUETE DE CONSTRUCCIÓN / ÁREA">PAQUETE DE CONSTRUCCIÓN / ÁREA</label><input type="text" id="PAQUETE_DE_CONSTRUCCION_AREA" class="form-control" name="PAQUETE_DE_CONSTRUCCION_AREA"></div>
 
                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 



                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">MEDICIÓN</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">


                                               
                                                        <div class="col-md-6">
                                                           <div class="form-group"><label for="FECHA LINEA BASE">FECHA LINEA BASE</label><input onchange="mostrarDiaAntesRAS()" type="text" id="FECHA_LINEA_BASE" class="form-control" name="FECHA_LINEA_BASE"></div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="DIAS ANTES LB">DIAS ANTES LB</label><input type="text" id="DIAS_ANTES_LB" class="form-control" name="DIAS_ANTES_LB" readonly></div>
                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">PROGRAMA DE PROYECTO</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">


                                               
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="FECHA COMIENZO FABRICACION">FECHA COMIENZO FABRICACION</label><input type="text" id="FECHA_COMIENZO_FABRICACION" class="form-control" name="FECHA_COMIENZO_FABRICACION"></div>
                                                            <div class="form-group"><label for="PA FCF">PA FCF</label>
                                                            <div id="select_pafcf"></div>
                                                              </div>

                                                          


                                                            <div class="form-group"><label for="FECHA TERMINO FABRICACION">FECHA TERMINO FABRICACION</label><input type="text" id="FECHA_TERMINO_FABRICACION" class="form-control" name="FECHA_TERMINO_FABRICACION"></div>
                                                            <div class="form-group"><label for="PA FTF">PA FTF</label>
                                                            <div id="select_paftf"></div>
                                                              </div>



                                                            <div class="form-group"><label for="FECHA GRANALLADO">FECHA GRANALLADO</label><input type="text" id="FECHA_GRANALLADO" class="form-control" name="FECHA_GRANALLADO"></div>
                                                            <div class="form-group"><label for="PA FG">PA FG</label>
                                                            <div id="select_pafg"></div>
                                                              </div>

                                                            
                                                         </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="FECHA PINTURA">FECHA PINTURA</label><input type="text" id="FECHA_PINTURA" class="form-control" name="FECHA_PINTURA"></div>
                                                            <div class="form-group"><label for="PA FP">PA FP</label>
                                                            <div id="select_pafp"></div>
                                                              </div>
                                                           
                                                            <div class="form-group"><label for="FECHA LISTO INSPECCION">FECHA LISTO INSPECCION</label><input type="text" id="FECHA_LISTO_INSPECCION" class="form-control" name="FECHA_LISTO_INSPECCION"></div>
                                                            <div class="form-group"><label for="PA FLI">PA FLI</label>
                                                            <div id="select_pafli"></div>
                                                              </div>
                                                      
                                                            
                                                            
                                                            
                                                            
                                                            <div class="form-group"><label for="ACTA LIBERACION CALIDAD">ACTA LIBERACION CALIDAD</label><input type="text" id="ACTA_LIBERACION_CALIDAD" class="form-control" name="ACTA_LIBERACION_CALIDAD"></div>
                                                            <div class="form-group"><label for="FECHA SALIDA FABRICA">FECHA SALIDA FABRICA</label><input type="text" id="FECHA_SALIDA_FABRICA" class="form-control" name="FECHA_SALIDA_FABRICA"></div>
                                                            <div class="form-group"><label for="PA FSF">PA FSF</label>
                                                            <div id="select_pafsf"></div>
                                                              </div>
                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">LOGÍSTICA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                              
                                               
                                                        <div class="col-md-6">
                                                           <div class="form-group"><label for="FECHA EMBARQUE">FECHA EMBARQUE</label><input type="text" id="FECHA_EMBARQUE" class="form-control" name="FECHA_EMBARQUE"></div>
                                                           <div class="form-group"><label for="PACKINGLIST">PACKINGLIST</label><input type="text" id="PACKINGLIST" class="form-control" name="PACKINGLIST"></div>
                                                           <div class="form-group"><label for="GUIA DESPACHO">GUIA DESPACHO</label><input type="text" id="GUIA_DESPACHO" class="form-control" name="GUIA_DESPACHO"></div>
                                                        </div>

                                                        <div class="col-md-6">
                                                        <div class="form-group"><label for="NÚMERO DE VIAJE">NÚMERO DE VIAJE</label><input type="text" id="NUMERO_DE_VIAJE" class="form-control" name="NUMERO_DE_VIAJE"></div>
                                                            <div class="form-group"><label for="ORIGEN">ORIGEN</label><input type="text" id="ORIGEN" class="form-control" name="ORIGEN"></div>
                                                            <div class="form-group"><label for="DIAS VIAJE">DIAS VIAJE</label><input type="text" id="DIAS_VIAJE" class="form-control" name="DIAS_VIAJE"></div>
                                                       </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">DETALLE BODEGA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                            
                                               
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="UNIDADES SOLICITADAS">UNIDADES SOLICITADAS</label><input type="text" id="UNIDADES_SOLICITADAS" class="form-control" name="UNIDADES_SOLICITADAS"></div>
                                                            <div class="form-group"><label for="UNIDADES RECIBIDAS">UNIDADES RECIBIDAS</label><input type="text" id="UNIDADES_RECIBIDAS" class="form-control" name="UNIDADES_RECIBIDAS"></div>
                                                            <div class="form-group"><label for="REPORTE DE RECEPCIÓN (RR)">REPORTE DE RECEPCIÓN (RR)</label><input type="text" id="REPORTE_DE_RECEPCION_RR" class="form-control" name="REPORTE_DE_RECEPCION_RR"></div>
                                                            
                                                         </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="REPORTE DE ENTREGA (RE)">REPORTE DE ENTREGA (RE)</label><input type="text" id="REPORTE_DE_ENTREGA_RE" class="form-control" name="REPORTE_DE_ENTREGA_RE"></div>
                                                            <div class="form-group"><label for="REPORTE DE EXCEPCIÓN (EXB)">REPORTE DE EXCEPCIÓN (EXB)</label><input type="text" id="REPORTE_DE_EXCEPCION_EXB" class="form-control" name="REPORTE_DE_EXCEPCION_EXB"></div>
                                                            <div class="form-group"><label for="INSPECCIÓN DE INGENIERÍA">INSPECCIÓN DE INGENIERÍA</label><input type="text" id="INSPECCION_DE_INGENIERIA" class="form-control" name="INSPECCION_DE_INGENIERIA"></div>

                                                        </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">OBSERVACIÓN</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">


                                               
                                                        <div class="col-md-6">
                                                           <div class="form-group"><label for="OBSERVACIÓN">OBSERVACIÓN</label><input type="text" id="OBSERVACION" class="form-control" name="OBSERVACION"></div>

                                                        </div>

                                                        <div class="col-md-6">
                                                       </div>
                                                  </div>
                                              </div>
                                    
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 


                    </section>

                     
                 </form>
             </div>

             <div class="modal-footer justify-content-between">
                    <button id="btnSave" type="button" class="btn btn-primary" onclick="guardarbuckSheetdet()">Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
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
                         bucksheet_html += '<td>';
                         bucksheet_html +=
                             '<button data-toggle="tooltip" data-placement="left" title="Editar WPanel" onclick="edit_bucksheet('+bucksheets.ID_OC+','+bucksheets.NUMERO_DE_LINEA+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>' +
                             '<button data-toggle="tooltip" data-placement="left" title="Borrar WPanel" onclick="eliminar_bucksheet('+bucksheets.ID_OC+','+bucksheets.NUMERO_DE_LINEA+')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>';
                        bucksheet_html += '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFE699">' + bucksheets.ID_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFE699">' + bucksheets.NUMERO_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFE699">' + bucksheets.DESCRIPCION_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFE699">' + bucksheets.ITEM_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFE699">' + bucksheets.SUB_ITEM_OC+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFE699">' + bucksheets.PROVEEDOR+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#DBDBDB">' + bucksheets.NUMERO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#DBDBDB">' + bucksheets.TIPO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#DBDBDB">' + bucksheets.ESTADO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#DBDBDB">' + bucksheets.NUMERO_DE_TAG+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#DBDBDB">' + bucksheets.STOCKCODE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#DBDBDB">' + bucksheets.DESCRIPCION_LINEA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#2E002E; color:#FFFFFF">' + bucksheets.NUMERO_DE_ELEMENTOS+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#2E002E; color:#FFFFFF">' + bucksheets.CANTIDAD_UNITARIA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#2E002E; color:#FFFFFF">' + bucksheets.CANTIDAD_TOTAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#2E002E; color:#FFFFFF">' + bucksheets.UNIDAD+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.TRANSMITTAL_CLIENTE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.FECHA_TC+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.TRANSMITTAL_PROVEEDOR+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.FECHA_TP+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.TRANSMITTAL_CLIENTE_FINAL+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.FECHA_TCF+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.PA_TCF+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.NUMERO_DE_PLANO+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.REVISION+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF5050; color:#FFFFFF">' + bucksheets.PAQUETE_DE_CONSTRUCCION_AREA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#333F4F; color:#FFFFFF">' + bucksheets.FECHA_LINEA_BASE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#333F4F; color:#FFFFFF">' + bucksheets.DIAS_ANTES_LB + '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.FECHA_COMIENZO_FABRICACION + '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.PA_FCF + '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.FECHA_TERMINO_FABRICACION+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.PA_FTF+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.FECHA_GRANALLADO+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.PA_FG+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.FECHA_PINTURA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.PA_FP+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.FECHA_LISTO_INSPECCION+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.PA_FLI+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.ACTA_LIBERACION_CALIDAD+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.FECHA_SALIDA_FABRICA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FFCC00">' + bucksheets.PA_FSF+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#007A37; color:#FFFFFF">' + bucksheets.FECHA_EMBARQUE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#007A37; color:#FFFFFF">' + bucksheets.PACKINGLIST+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#007A37; color:#FFFFFF">' + bucksheets.GUIA_DESPACHO+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#007A37; color:#FFFFFF">' + bucksheets.NUMERO_DE_VIAJE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#007A37; color:#FFFFFF">' + bucksheets.ORIGEN+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#007A37; color:#FFFFFF">' + bucksheets.DIAS_VIAJE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#351805; color:#FFFFFF">' + bucksheets.UNIDADES_SOLICITADAS+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#351805; color:#FFFFFF">' + bucksheets.UNIDADES_RECIBIDAS+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#351805; color:#FFFFFF">' + bucksheets.REPORTE_DE_RECEPCION_RR+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#351805; color:#FFFFFF">' + bucksheets.REPORTE_DE_ENTREGA_RE+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#351805; color:#FFFFFF">' + bucksheets.REPORTE_DE_EXCEPCION_EXB+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#351805; color:#FFFFFF">' + bucksheets.INSPECCION_DE_INGENIERIA+ '</td>';
                        bucksheet_html += '<td style="text-align:left; background-color:#FF6600; color:#FFFFFF">' + bucksheets.OBSERVACION+ '</td>';


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
        "autoWidth": true,
        "scrollY": "600px",
        "scrollX": true,
        "colReorder": true,
        "scrollCollapse": true,
          "responsive": false,
          "lengthChange": true, 
          "autoWidth": true,
          "dom": 'Bfrtip',
          "buttons": [
            {
            "extend": 'copy',
            "text": 'Copiar'
            },
            {
            "extend": 'csv',
            "text": 'csv'
            },
            {
            "extend": 'excel',
            "text": 'excel'
            },
            {
            "extend": 'pdf',
            "text": 'pdf'
            },
            {
            "extend": 'print',
            "text": 'Imprimir'
            },
            {
            "extend": 'colvis',
            "text": 'Columnas Visibles'
            }
    ]}).buttons().container().appendTo('#tbl_bucksheet_wrapper .col-md-6:eq(0)');

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }

             function subirBuckSheet() {


                $('#modal_buckSheet').modal('show'); // show bootstrap modal
                $('#formBuckSheet')[0].reset(); // reset form on modals
                        

            }

                function saveBuckSheet() {
    
                    $('#btnSave').text('Actualizando..'); //change button text
                    $('#btnSave').attr('disabled', true); //set button disable 

                    url = "<?php echo site_url('BuckSheet/save')?>";


                    // ajax adding data to database

                    var formData = new FormData($('#formBuckSheet')[0]);

                $.ajax({
                            url: url ,
                            type: 'post',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: "JSON",
                            beforeSend: function(){
                            mostrarBlock();
                            },
                            success: function(data){

                                if (data.resp) //if success close modal and reload ajax table
                                    {

                                        if(data.error =='0'){

                                            toastr.success(data.mensaje);

                                        }else{

                                            toastr.error(data.mensaje);

                                        }


                                        $('#modal_buckSheet').modal('hide');
                                        lista_bucksheet();
                                        $.unblockUI();
                                    } else {
                                        
                                        toastr.error(data.mensaje);

                                    }
                                    $('#btnSave').text('Cargar'); //change button text
                                    $('#btnSave').attr('disabled', false); //set button enable 

                            },
                            complete:function(result){
                                $.unblockUI();
                            },
                            error: function(request, status, err) {
    
                            toastr.error("error: " + request + status + err);
                      
                            $('#btnSave').text('Cargar'); //change button text
                            $('#btnSave').attr('disabled', false); //set button enable   
                            $.unblockUI();         
                        }
                            });

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

                function eliminar_bucksheet(PurchaseOrderID ,numeroLinea){

                        var opcion = confirm("Esta seguro que quiere borrar este registro");

                        if(opcion){

                            $.ajax({
                            url: 		'<?php echo base_url('index.php/BuckSheet/eliminaBuckSheet'); ?>',
                            type: 		'POST',
                            dataType: 'json',
                            data: {
                                PurchaseOrderID  : PurchaseOrderID,
                                numeroLinea : numeroLinea
                                    },
                            }).done(function(result) {

                            if(result.resp){

                                lista_bucksheet();
                                toastr.success(result.mensaje);

                            }else{

                                toastr.error(result.mensaje);

                            }
                                

                            }).fail(function() {
                            console.log("error eliminar bucksheet");
                            })


                        }

                        }

 function edit_bucksheet(PurchaseOrderID ,numeroLinea) {


    var id_proyecto = <?php echo $codProyecto;?>;
    var id_cliente = <?php echo $idCliente;?>;
    var codEmpresa = <?php echo $this->session->userdata('cod_emp');?>;
    var select_unidad = "";
    var select_patcf = "";
    var select_pafcf = "";
    var select_paftf = "";
    var select_pafg = "";
    var select_pafp = "";
    var select_pafli = "";
    var select_pafsf = "";
    var select_tipo_linea = "";
    var select_estado_linea = "";




                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url: "<?php echo site_url('BuckSheet/obtieneBuckSheetDet')?>",
        type: "POST",
        data: {
            id_orden: PurchaseOrderID,
            numero_linea: numeroLinea
                     },
        dataType: "JSON",
        success: function(result) {

            select_unidad = result.select_unidad;
            select_patcf = result.select_patcf;
            select_pafcf = result.select_pafcf;
            select_paftf = result.select_paftf;
            select_pafg = result.select_pafg;
            select_pafp = result.select_pafp;
            select_pafli = result.select_pafli;
            select_pafsf = result.select_pafsf;
            select_tipo_linea = result.select_tipo_linea;
            select_estado_linea = result.select_estado_linea;


            $.each(result.bucksheet, function(key, bucksheets) {


                $('#ID_OC').val(bucksheets.ID_OC);
                $('#NUMERO_OC').val(bucksheets.NUMERO_OC);
                $('#DESCRIPCION_OC').val(bucksheets.DESCRIPCION_OC);
                $('#ITEM_OC').val(bucksheets.ITEM_OC);
                $('#SUB_ITEM_OC').val(bucksheets.SUB_ITEM_OC);
                $('#PROVEEDOR').val(bucksheets.PROVEEDOR);
                $('#NUMERO_DE_LINEA').val(bucksheets.NUMERO_DE_LINEA);
                $('#TIPO_DE_LINEA').val(bucksheets.TIPO_DE_LINEA);
                $('#NUMERO_DE_TAG').val(bucksheets.NUMERO_DE_TAG);
                $('#STOCKCODE').val(bucksheets.STOCKCODE);
                $('#DESCRIPCION_LINEA').val(bucksheets.DESCRIPCION_LINEA);
                $('#NUMERO_DE_ELEMENTOS').val(bucksheets.NUMERO_DE_ELEMENTOS);
                $('#CANTIDAD_UNITARIA').val(bucksheets.CANTIDAD_UNITARIA);
                $('#CANTIDAD_TOTAL').val(bucksheets.CANTIDAD_TOTAL);
                $('#UNIDAD').val(bucksheets.UNIDAD);
                $('#TRANSMITTAL_CLIENTE').val(bucksheets.TRANSMITTAL_CLIENTE);
                $('#FECHA_TC').val(bucksheets.FECHA_TC);
                $('#TRANSMITTAL_PROVEEDOR').val(bucksheets.TRANSMITTAL_PROVEEDOR);
                $('#FECHA_TP').val(bucksheets.FECHA_TP);
                $('#TRANSMITTAL_CLIENTE_FINAL').val(bucksheets.TRANSMITTAL_CLIENTE_FINAL);
                $('#FECHA_TCF').val(bucksheets.FECHA_TCF);
                $('#PA_TCF').val(bucksheets.PA_TCF);
                $('#NUMERO_DE_PLANO').val(bucksheets.NUMERO_DE_PLANO);
                $('#REVISION').val(bucksheets.REVISION);
                $('#PAQUETE_DE_CONSTRUCCION_AREA').val(bucksheets.PAQUETE_DE_CONSTRUCCION_AREA);
                $('#FECHA_LINEA_BASE').val(bucksheets.FECHA_LINEA_BASE);
                $('#DIAS_ANTES_LB').val(bucksheets.DIAS_ANTES_LB);
                $('#FECHA_COMIENZO_FABRICACION').val(bucksheets.FECHA_COMIENZO_FABRICACION);
                $('#PA_FCF').val(bucksheets.PA_FCF);
                $('#FECHA_TERMINO_FABRICACION').val(bucksheets.FECHA_TERMINO_FABRICACION);
                $('#PA_FTF').val(bucksheets.PA_FTF);
                $('#FECHA_GRANALLADO').val(bucksheets.FECHA_GRANALLADO);
                $('#PA_FG').val(bucksheets.PA_FG);
                $('#FECHA_PINTURA').val(bucksheets.FECHA_PINTURA);
                $('#PA_FP').val(bucksheets.PA_FP);
                $('#FECHA_LISTO_INSPECCION').val(bucksheets.FECHA_LISTO_INSPECCION);
                $('#PA_FLI').val(bucksheets.PA_FLI);
                $('#ACTA_LIBERACION_CALIDAD').val(bucksheets.ACTA_LIBERACION_CALIDAD);
                $('#FECHA_SALIDA_FABRICA').val(bucksheets.FECHA_SALIDA_FABRICA);
                $('#PA_FSF').val(bucksheets.PA_FSF);
                $('#FECHA_EMBARQUE').val(bucksheets.FECHA_EMBARQUE);
                $('#PACKINGLIST').val(bucksheets.PACKINGLIST);
                $('#GUIA_DESPACHO').val(bucksheets.GUIA_DESPACHO);
                $('#NUMERO_DE_VIAJE').val(bucksheets.NUMERO_DE_VIAJE);
                $('#ORIGEN').val(bucksheets.ORIGEN);
                $('#DIAS_VIAJE').val(bucksheets.DIAS_VIAJE);
                $('#UNIDADES_SOLICITADAS').val(bucksheets.UNIDADES_SOLICITADAS);
                $('#UNIDADES_RECIBIDAS').val(bucksheets.UNIDADES_RECIBIDAS);
                $('#REPORTE_DE_RECEPCION_RR').val(bucksheets.REPORTE_DE_RECEPCION_RR);
                $('#REPORTE_DE_ENTREGA_RE').val(bucksheets.REPORTE_DE_ENTREGA_RE);
                $('#REPORTE_DE_EXCEPCION_EXB').val(bucksheets.REPORTE_DE_EXCEPCION_EXB);
                $('#INSPECCION_DE_INGENIERIA').val(bucksheets.INSPECCION_DE_INGENIERIA);
                $('#OBSERVACION').val(bucksheets.OBSERVACION);

                

       
             });


                $('[name="idProyecto"]').val(id_proyecto);
                $('[name="idCliente"]').val(id_cliente);   
                $('[name="codEmpresa"]').val(codEmpresa); 

             $('#select_unidad').html(select_unidad);
             $('#select_patcf').html(select_patcf);

             $('#select_pafcf').html(select_pafcf);
             $('#select_paftf').html(select_paftf);
             $('#select_pafg').html(select_pafg);
             $('#select_pafp').html(select_pafp);
             $('#select_pafli').html(select_pafli);
             $('#select_pafsf').html(select_pafsf);
             $('#select_tipo_linea').html(select_tipo_linea);
             $('#select_estado_linea').html(select_estado_linea);

             


             

            $('#modal-default').modal('show'); // show bootstrap modal
            $('.modal-title').text('Editar WPanel: Orden ' + PurchaseOrderID + ', Numero de Linea ' +
                numeroLinea); // Set title to Bootstrap modal title


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}


function guardarbuckSheetdet() {
    $('#btnSave').text('Actualizando..'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 

    url = "<?php echo site_url('BuckSheet/updateBuckSheet')?>";


    // ajax adding data to database

    var formData = new FormData($('#form')[0]);

    $.ajax({
                            url: url ,
                            type: 'post',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: "JSON",
                            beforeSend: function(){
                            mostrarBlock();
                            },
                            success: function(data){

                                if (data.resp) //if success close modal and reload ajax table
                                    {
                                        $('#modal-default').modal('hide');
                                        lista_bucksheet();
                                        toastr.success(data.mensaje);
                                        $.unblockUI();
                                    } else {
                                        toastr.success(data.mensaje);

                                    }
                                    $('#btnSave').text('Actualizar'); //change button text
                                    $('#btnSave').attr('disabled', false); //set button enable 

                            },
                            complete:function(result){
                                $.unblockUI();
                            },
                            error: function(request, status, err) {
    
                            toastr.error("error: " + request + status + err);
                      
                            $('#btnSave').text('Cargar'); //change button text
                            $('#btnSave').attr('disabled', false); //set button enable   
                            $.unblockUI();         
                        }
                            });





}

function mostrarPesoTotal(input){

var total = 0;	

valor = replaceAll(document.getElementById('NUMERO_DE_ELEMENTOS').value , ".", "" ); 
cantidad =  replaceAll(document.getElementById('CANTIDAD_UNITARIA').value , ".", "" );

// Aquí valido si hay un valor Programado, si no hay datos, le pongo un cero "0".
total = (total == null || total == undefined || total == "" || total =="NaN" ) ? 0 : total;

total = (parseInt(cantidad) * parseInt(valor));

$('#CANTIDAD_TOTAL').val( +(Math.round(total + "e+2")  + "e-2"));


}

function mostrarDiaAntesRAS(){

   
// Here are the two dates to compare

var date1 = $('#FECHA_LINEA_BASE').val();
console.log(date1);

var f = new Date();

var date2 = f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear();

// First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
date1 = date1.split('-');
date2 = date2.split('-');

console.log(date1[2]);

// Now we convert the array to a Date object, which has several helpful methods
date1 = new Date(date1[2], date1[1], date1[0]);
date2 = new Date(date2[2], date2[1], date2[0]);

// We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
date1_unixtime = parseInt(date1.getTime() / 1000);
date2_unixtime = parseInt(date2.getTime() / 1000);

// This is the calculated difference in seconds
var timeDifference = date1_unixtime - date2_unixtime;

// in Hours
var timeDifferenceInHours = timeDifference / 60 / 60;

// and finaly, in days :)
var timeDifferenceInDays = timeDifferenceInHours  / 24;


$('#DIAS_ANTES_LB').val(Math.round(timeDifferenceInDays));


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


    