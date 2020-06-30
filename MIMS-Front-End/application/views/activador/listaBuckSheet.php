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
                                                     onclick="subirBuckSheet()"><i class="fas fa-file-download">
                                                     </i> Subir Archivo
                                                 </button>
                                             </div>
                                         </th>
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
                                         <th>Editar</th>
                                         <th>purchaseOrdername</th>
                                         <th>NumeroLinea</th>
                                         <th>Proveedor</th>
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
                             <tbody id="datos_bucksheet">
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>


         <!--.modal nuevo control Calidad-->
         <div id="modal_buckSheet" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Subir Archivo</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                            <div class="modal-body">
                                <div class="container">
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
                                    <button id="btnSave" type="button" class="btn btn-block btn-outline-success"
                                        onclick="saveBuckSheet()">Actualizar</button>
                                    <button type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Cancel</button>
                            </div>
                            </div>
                          
                            <!-- Image loader -->     
                     </div>
                 </div>
             </div>

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
                     <input type="hidden" value="" name="NumeroLinea"/>
                     <input type="hidden" value="" name="PurchaseOrderID" />
                     <div class="form-body">
                         <div class="form-group">
                             <label class="control-label col-md-9">ST Cantidad</label>
                             <div class="col-md-9">
                                 <input name="STCantidad" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">TAG Number</label>
                             <div class="col-md-9">
                                 <input name="TAGNumber" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Stockcode</label>
                             <div class="col-md-9">
                                 <input name="Stockcode" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Descripción</label>
                             <div class="col-md-9">
                                 <input name="Descripcion" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Plano Modelo</label>
                             <div class="col-md-9">
                                 <input name="PlanoModelo" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Revisión</label>
                             <div class="col-md-9">
                                 <input name="Revision" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Paquete Construccion o Area</label>
                             <div class="col-md-9">
                                 <input name="PaqueteConstruccionArea" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Peso Unitario</label>
                             <div class="col-md-9">
                                 <input name="PesoUnitario" placeholder="" class="form-control" type="text" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Peso Total</label>
                             <div class="col-md-9">
                                 <input name="PesoTotal" placeholder="" class="form-control" type="text" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)">
                                 <span class="help-block"></span>
                             </div>
                         </div>



                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha RAS</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                     </div>
                                     <input name="FechaRAS" type="text" class="form-control"
                                         data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                         data-mask="" im-insert="false">
                                 </div>
                             </div>
                         </div>




                         <div class="form-group">
                             <label class="control-label col-md-9">Dias Antes RAS</label>
                             <div class="col-md-9">
                                 <input name="DiasAntesRAS" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Comienzo Fabricacion</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaComienzoFabricacion" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>


                         <div class="form-group" data-select2-id="89">
                             <div class="form-group">
                                 <label class="control-label col-md-9">Previo - Actual Fecha Comienzo
                                     Fabricacion</label>
                                 <div class="col-md-9">
                                     <select name="PAFCF" class="form-control select2bs4 select2-hidden-accessible"
                                         style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                         <?php echo $select_ap;?>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Termino Fabricacion</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaTerminoFabricacion" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>


                         <div class="form-group" data-select2-id="89">
                             <div class="form-group">
                                 <label class="control-label col-md-9">Previo - Actual Fecha Termino Fabricacion</label>
                                 <div class="col-md-9">
                                     <select name="PAFTF" class="form-control select2bs4 select2-hidden-accessible"
                                         style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                         <?php echo $select_ap;?>
                                     </select>
                                 </div>
                             </div>
                         </div>


                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Granallado</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaGranallado" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>


                         <div class="form-group" data-select2-id="89">
                             <div class="form-group">
                                 <label class="control-label col-md-9">Previo - Actual Fecha Granallado</label>
                                 <div class="col-md-9">
                                     <select name="PAFG" class="form-control select2bs4 select2-hidden-accessible"
                                         style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                         <?php echo $select_ap;?>
                                     </select>
                                 </div>
                             </div>
                         </div>





                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Pintura</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaPintura" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>


                         <div class="form-group" data-select2-id="89">
                             <div class="form-group">
                                 <label class="control-label col-md-9">Previo - Actual Fecha Pintura</label>
                                 <div class="col-md-9">
                                     <select name="PAFP" class="form-control select2bs4 select2-hidden-accessible"
                                         style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                         <?php echo $select_ap;?>
                                     </select>
                                 </div>
                             </div>
                         </div>




                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Listo Inspeccion</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaListoInspeccion" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>



                         <div class="form-group" data-select2-id="89">
                             <div class="form-group">
                                 <label class="control-label col-md-9">Previo - Actual Fecha Listo Inspeccion</label>
                                 <div class="col-md-9">
                                     <select name="PAFLI" class="form-control select2bs4 select2-hidden-accessible"
                                         style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                         <?php echo $select_ap;?>
                                     </select>
                                 </div>
                             </div>
                         </div>




                         <div class="form-group">
                             <label class="control-label col-md-9">Acta Liberacion Calidad</label>
                             <div class="col-md-9">
                                 <input name="ActaLiberacionCalidad" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>


                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Salida Fabrica</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaSalidaFabrica" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>



                         <div class="form-group">
                             <div class="form-group">
                                 <label class="control-label col-md-9">Previo - Actual Fecha Salida Fabrica</label>
                                 <div class="col-md-9">
                                     <select name="PAFSF" class="form-control "
                                         style="width: 100%;" aria-hidden="true">
                                         <?php echo $select_ap;?>
                                     </select>
                                 </div>
                             </div>
                         </div>





                         <div class="form-group">
                             <label class="control-label col-md-9">Fecha Embarque</label>
                             <div class="col-md-9">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <i class="far fa-calendar-alt"></i>
                                         </span>
                                     </div>
                                     <input name="FechaEmbarque" type="text" class="form-control float-right"
                                         id="reservation">
                                 </div>
                             </div>
                         </div>


                         <div class="form-group">
                             <label class="control-label col-md-9">Packing List</label>
                             <div class="col-md-9">
                                 <input name="PackingList" placeholder="PackingList" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Guia Despacho</label>
                             <div class="col-md-9">
                                 <input name="GuiaDespacho" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">SCN Number</label>
                             <div class="col-md-9">
                                 <input name="SCNNumber" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Origen</label>
                             <div class="col-md-9">
                                 <input name="Origen" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Dias Viaje</label>
                             <div class="col-md-9">
                                 <input name="DiasViaje" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Observacion 1</label>
                             <div class="col-md-9">
                                 <input name="Observacion1" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Observacion 2</label>
                             <div class="col-md-9">
                                 <input name="Observacion2" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Observacion 3</label>
                             <div class="col-md-9">
                                 <input name="Observacion3" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Observacion 4</label>
                             <div class="col-md-9">
                                 <input name="Observacion4" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Observacion 5</label>
                             <div class="col-md-9">
                                 <input name="Observacion5" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-9">Observacion 6</label>
                             <div class="col-md-9">
                                 <input name="Observacion6" placeholder="" class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                             <div class="form-group">
                                 <label class="control-label col-md-9">Observacion 7</label>
                                 <div class="col-md-9">
                                     <input name="Observacion7" placeholder="" class="form-control" type="text">
                                     <span class="help-block"></span>
                                 </div>
                             </div>

                 </form>
             </div>
             <div class="modal-footer justify-content-between">
                 <button id="btnSave" type="button" class="btn btn-block btn-outline-success"
                     onclick="guardarbuckSheetdet()">Actualizar</button>
                 <button type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Cancel</button>
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
                         bucksheet_html += '<td>';
                         bucksheet_html +=
                             '<button data-toggle="tooltip" data-placement="left" title="Editar BuckSheet" onclick="edit_bucksheet('+bucksheets.PurchaseOrderID+','+bucksheets.NumeroLinea+')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>' +
                             '<button data-toggle="tooltip" data-placement="left" title="Borrar BuckSheet" onclick="eliminar_bucksheet('+bucksheets.PurchaseOrderID+','+bucksheets.NumeroLinea+')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>';
                        bucksheet_html += '</td>';
                        bucksheet_html += '<td>' + bucksheets.purchaseOrdername+ '</td>';
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
                        bucksheet_html += '<td>' + bucksheets.UnidadesSolicitadas+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.UnidadesRecibidas+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.MaterialReceivedReport+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.MaterialWithdrawalReport+ '</td>';
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
                                        $('#modal_buckSheet').modal('hide');
                                        lista_bucksheet();
                                        toastr.success(data.mensaje);
                                        $.unblockUI();
                                    } else {
                                        toastr.success(data.mensaje);

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

                function controldecalidad() {

                window.open('<?php echo site_url('Journal/controlCalidad/'.$idCliente.'/'.$PurchaseOrderID.'/'.$codProyecto)?>', '_blank');
                }

                function descarga_bucksheet() {

                window.open('<?php echo site_url('BuckSheet/exportCSV/'.$PurchaseOrderID)?>', '_blank');
                }

                function cambiosenorden() {

                window.open('<?php echo site_url('Journal/cambiosOrden/'.$idCliente.'/'.$PurchaseOrderID.'/'.$codProyecto)?>', '_blank');
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

            $.each(result.bucksheet, function(key, bucksheets) {

            $('[name="PurchaseOrderID"]').val(bucksheets.PurchaseOrderID);
            $('[name="NumeroLinea"]').val(bucksheets.NumeroLinea);
            $('[name="STCantidad"]').val(bucksheets.STCantidad);
            $('[name="TAGNumber"]').val(bucksheets.TAGNumber);
            $('[name="Stockcode"]').val(bucksheets.Stockcode);
            $('[name="Descripcion"]').val(bucksheets.Descripcion);
            $('[name="PlanoModelo"]').val(bucksheets.PlanoModelo);
            $('[name="Revision"]').val(bucksheets.Revision);
            $('[name="PaqueteConstruccionArea"]').val(bucksheets.PaqueteConstruccionArea);
            $('[name="PesoUnitario"]').val(bucksheets.PesoUnitario);
            $('[name="PesoTotal"]').val(bucksheets.PesoTotal);
            $('[name="FechaRAS"]').val(bucksheets.FechaRAS);
            $('[name="DiasAntesRAS"]').val(bucksheets.DiasAntesRAS);
            $('[name="FechaComienzoFabricacion"]').val(bucksheets.FechaComienzoFabricacion);
            $('[name="PAFCF"]').val(bucksheets.PAFCF);
            $('[name="FechaTerminoFabricacion"]').val(bucksheets.FechaTerminoFabricacion);
            $('[name="PAFTF"]').val(bucksheets.PAFTF);
            $('[name="FechaGranallado"]').val(bucksheets.FechaGranallado);
            $('[name="PAFG"]').val(bucksheets.PAFG);
            $('[name="FechaPintura"]').val(bucksheets.FechaPintura);
            $('[name="PAFP"]').val(bucksheets.PAFP);
            $('[name="FechaListoInspeccion"]').val(bucksheets.FechaListoInspeccion);
            $('[name="PAFLI"]').val(bucksheets.PAFLI);
            $('[name="ActaLiberacionCalidad"]').val(bucksheets.ActaLiberacionCalidad);
            $('[name="FechaSalidaFabrica"]').val(bucksheets.FechaSalidaFabrica);
            $('[name="PAFSF"]').val(bucksheets.PAFSF);
            $('[name="FechaEmbarque"]').val(bucksheets.FechaEmbarque);
            $('[name="PackingList"]').val(bucksheets.PackingList);
            $('[name="GuiaDespacho"]').val(bucksheets.GuiaDespacho);
            $('[name="SCNNumber"]').val(bucksheets.SCNNumber);
            $('[name="Origen"]').val(bucksheets.Origen);
            $('[name="DiasViaje"]').val(bucksheets.DiasViaje);
            $('[name="Observacion1"]').val(bucksheets.Observacion1);
            $('[name="Observacion2"]').val(bucksheets.Observacion2);
            $('[name="Observacion3"]').val(bucksheets.Observacion3);
            $('[name="Observacion4"]').val(bucksheets.Observacion4);
            $('[name="Observacion5"]').val(bucksheets.Observacion5);
            $('[name="Observacion6"]').val(bucksheets.Observacion6);
            $('[name="Observacion7"]').val(bucksheets.Observacion7);

             });



            $('#modal-default').modal('show'); // show bootstrap modal
            $('.modal-title').text('Editar Bucksheet ' + PurchaseOrderID + ', Numero de Linea ' +
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



             </script>
             <script>
             $(function() {
                 //Initialize Select2 Elements


                 //Datemask dd/mm/yyyy
                 $('#datemask').inputmask('dd/mm/yyyy', {
                     'placeholder': 'dd/mm/yyyy'
                 })
                 //Datemask2 mm/dd/yyyy
                 $('#datemask2').inputmask('mm/dd/yyyy', {
                     'placeholder': 'mm/dd/yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()



             })
             </script>


    