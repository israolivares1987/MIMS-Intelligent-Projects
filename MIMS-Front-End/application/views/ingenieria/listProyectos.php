   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->

    <div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                            <i class="fas fa-user-tie"></i>
															Cliente
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
                          <div class="form-group">
                            <label>Seleccione cliente</label>
                            <?php echo $select_clientes;?>
                          </div>
													</div>
													<!-- /.card-body -->
												</div>

											</div>


                <div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                              <i class="fas fa-clipboard-list"></i></i>
															Proyectos
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
                          <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0" width=100%>
                        <button style="display: none;" id="btn_nuevo_proyecto" class="btn btn-outline-primary float-right mb-3">Nuevo Proyecto</button>
                        <thead>
                            <tr>
                                <th>Acciones</th>
																<th>Nombre Proyecto</th>
																<th>Descripcion Proyecto</th>
																<th>Lugar</th>
																<th>Estado Proyecto</th>
                            </tr>
                        </thead>
                        <tbody id="datos_proyectos">
                        </tbody>
                    </table>
													</div>
													<!-- /.card-body -->
												</div>

											</div>


                <div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                              <i class="fas fa-clipboard-list"></i></i>
															Ordenes de Compra
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
                          <table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0" width=100%>
                      <button style="display: none;" id="btn_nueva_orden" class="btn btn-outline-primary float-right mb-3">Nueva orden</button>
                        <thead>
                            <tr>
                            <th>Acciones</th>
                            <th>Orden ID</th>
                            <th>Orden Number</th>
                            <th>Orden Description</th>
                            <th>Nombre Proveedor</th>
                            <th>Activador</th>
                            <th>Generador de Compra</th>
                            <th>Moneda</th>
                            <th>Valor Neto</th>
                            <th>Valor Total</th>
                            <th>Presupuesto</th>
                            <th>Codigo Presupuesto</th>
                            <th>Fecha Orden</th>
                            <th>Fecha Requerida</th>
                            <th>Fecha Prometida</th>
                            <th>Fecha Enviada</th>
                            <th>Metodo Envio</th>
                            <th>Fecha Orden Creada</th>
                            <th>Estado</th>
                            <th>Archivo</th>	
                            </tr>
                        </thead>
                        <tbody id="datos_ordenes">
                          
                        </tbody>
                        
                    </table>
                        <input type="hidden" id="id_proyecto_or">
                        <input type="hidden" id="id_cliente_or">
                        <input type="hidden" id="nombre_proyecto_or">
                        <input type="hidden" id="flag_orden">
													</div>
													<!-- /.card-body -->
												</div>

											</div>

                     <div class="col-lg-12">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">
                              <i class="fas fa-clipboard-list"></i></i>
															Items Orden
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
													  <table id="tbl_ordenes_items" class="table table-striped table-bordered" cellspacing="0" width=100%>
														<button style="display: none;" id="btn_nueva_item_orden" class="btn btn-outline-primary float-right mb-3">Nueva Item Orden</button>
                            <thead>
															<tr>
                                                            <th>Orden ID</th>
                                                            <th>Orden Item ID</th>
                                                            <th>Descripcion</th>
                                                            <th>Revision</th>
                                                            <th>Unidad</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio Unitario</th>
                                                            <th>Valor Neto</th>
                                                            <th>Estado</th>	
                                                        </tr>
														</thead>
														<tbody id="datos_ordenes_items">
														</tbody>
													</table>
													</div>
													<!-- /.card-body -->
												</div>

											</div>




            </div><!--.card-header-->
            <!-- /.card-header -->
         </div><!--.card--> 
        </div><!--.col-12-->    
      </div><!--.row-->

      <!--.modal nuevo proyecto-->
      <div id="modal_nuevo_proyecto" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Proyecto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Cliente</label>
                        <div class="col-sm-12">
                          <input id="var_nombre_cliente" type="text" class="form-control" readonly >
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Nombre proyecto</label>
                        <div class="col-sm-12">
                          <input id="var_nombre_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Descripcion Proyecto</label>
                        <div class="col-sm-12">
                          <input id="var_descripcion_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Lugar</label>
                        <div class="col-sm-12">
                          <input id="var_lugar_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                </div><!--row-->
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="var_cliente">
              <button id="btn-guardar" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--.fin modal nuevo proyecto--> 

       <!--.modal edita proyecto-->
       <div id="modal_edita_proyecto" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edita Proyecto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Cliente</label>
                        <div class="col-sm-12">
                          <input id="act_nombre_cliente" type="text" class="form-control" readonly >
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Nombre proyecto</label>
                        <div class="col-sm-12">
                          <input id="act_nombre_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Descripcion Proyecto</label>
                        <div class="col-sm-12">
                          <input id="act_descripcion_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Lugar proyecto</label>
                        <div class="col-sm-12">
                          <input id="act_lugar_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Seleccione estado</label>
                        <div class="col-sm-12">
                          <div id="s_estado"></div>
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                </div><!--row-->
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="act_id_proyecto">
              <input type="hidden" id="act_id_cliente">
              <button id="btn-actualizar-proy" type="button" class="btn btn-outline-primary">Actualizar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--.fin modal edita proyecto--> 

      <!--.modal nuevo orden-->
      <div id="modal_new_orden" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Orden</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="form_orden">
                  <div class="row">
                      <!--Primera columna-->
                      <div class="col">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Nombre Proyecto</label>
                            <div class="col-sm-12">
                              <input id="or_nombre_proyecto" type="text" class="form-control form-control-sm" readonly >
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Purchase Order Number</label>
                            <div class="col-sm-12">
                              <input id="or_purchase_order" name="or_purchase_order" type="text" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Purchase Order Description</label>
                            <div class="col-sm-12">
                              <input id="or_purchase_desc" name="or_purchase_desc" type="text" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Seleccione Supplier</label>
                            <div class="col-sm-12">
                              <div id="s_supplier"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Seleccione Employee</label>
                            <div class="col-sm-12">
                              <div id="s_employee"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Currency</label>
                            <div class="col-sm-12">
                              <div id="s_currency"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                        </div><!--.form-horizontal-->
                      </div><!--.col-md-3-->
                      <!--Fin Primera columna-->

                      <!--Segunda columna-->
                      <div class="col">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Ingeniero Requestor</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_requestor" id="or_requestor" class="form-control form-control-sm">
                              <!--div id="s_ingeniero"></div-->
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Valor neto</label>
                            <div class="col-sm-12">
                              <input id="or_valor_neto" name="or_valor_neto" type="number" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Valor total</label>
                            <div class="col-sm-12">
                              <input id="or_valor_total" name="or_valor_total" type="number" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Budget</label>
                            <div class="col-sm-12">
                              <input id="or_budget" name="or_budget" type="number" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Order Date</label>
                            <div class="col-sm-12">
                              <div class="input-group">
                                  <input type="text" name="or_order_date" class="form-control form-control-sm fechas" id="or_order_date">
                              </div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Date Required</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_date_required" class="form-control form-control-sm fechas" id="or_date_required">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                        </div><!--.form-horizontal-->
                      </div><!--.col-md-3-->
                      <!--Fin Segunda columna-->

                      <!--tercera columna-->
                      <div class="col">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Date Promised</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_date_promised" class="form-control form-control-sm fechas" id="or_date_promised">
                              <!--div id="s_ingeniero"></div-->
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Ship date</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_ship_date" class="form-control form-control-sm fechas" id="or_ship_date">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Shipping Method</label>
                            <div class="col-sm-12">
                              <div id="s_shipping"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">PO Status</label>
                            <div class="col-sm-12">
                              <div id="s_status"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Support</label>
                            <div class="col-sm-12">
                              <input id="or_support" name="or_support" type="file" class="form-control form-control-file">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                        </div><!--.form-horizontal-->
                      </div><!--.col-md-3-->
                      <!--Fin tercera columna-->
                  </div><!--row-->
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">
              <button id="btn_orden" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
      <!--.fin modal nuevo orden-->

      <!--.modal edita orden-->
      <div id="modal_edit_orden" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualiza Orden</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="form_orden_act">
                  <div class="row">
                      <!--Primera columna-->
                      <div class="col">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Nombre Proyecto</label>
                            <div class="col-sm-12">
                              <input id="or_act_nombre_proyecto" type="text" class="form-control form-control-sm" readonly >
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Purchase Order Number</label>
                            <div class="col-sm-12">
                              <input id="or_act_purchase_order" name="or_act_purchase_order" type="text" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Purchase Order Description</label>
                            <div class="col-sm-12">
                              <input id="or_act_purchase_desc" name="or_act_purchase_desc" type="text" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Seleccione Supplier</label>
                            <div class="col-sm-12">
                              <div id="s_act_supplier"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Seleccione Employee</label>
                            <div class="col-sm-12">
                              <div id="s_act_employee"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Currency</label>
                            <div class="col-sm-12">
                              <div id="s_act_currency"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                        </div><!--.form-horizontal-->
                      </div><!--.col-md-3-->
                      <!--Fin Primera columna-->

                      <!--Segunda columna-->
                      <div class="col">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Ingeniero Requestor</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_act_requestor" id="or_act_requestor" class="form-control form-control-sm">
                              <!--div id="s_ingeniero"></div-->
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Valor neto</label>
                            <div class="col-sm-12">
                              <input id="or_act_valor_neto" name="or_act_valor_neto" type="number" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Valor total</label>
                            <div class="col-sm-12">
                              <input id="or_act_valor_total" name="or_act_valor_total" type="number" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Budget</label>
                            <div class="col-sm-12">
                              <input id="or_act_budget" name="or_act_budget" type="number" class="form-control form-control-sm">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Order Date</label>
                            <div class="col-sm-12">
                              <div class="input-group">
                                  <input type="text" name="or_act_order_date" class="form-control form-control-sm fechas" id="or_act_order_date">
                              </div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Date Required</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_act_date_required" class="form-control form-control-sm fechas" id="or_act_date_required">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                        </div><!--.form-horizontal-->
                      </div><!--.col-md-3-->
                      <!--Fin Segunda columna-->

                      <!--tercera columna-->
                      <div class="col">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Date Promised</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_act_date_promised" class="form-control form-control-sm fechas" id="or_act_date_promised">
                              <!--div id="s_ingeniero"></div-->
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Ship date</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_act_ship_date" class="form-control form-control-sm fechas" id="or_act_ship_date">
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Shipping Method</label>
                            <div class="col-sm-12">
                              <div id="s_act_shipping"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <div class="form-group">
                            <label class="col-sm-12 control-label">PO Status</label>
                            <div class="col-sm-12">
                              <div id="s_act_status"></div>
                            </div><!--.col-sm-12-->
                          </div><!--.form-group-->
                          <!--div class="form-group">
                            <label class="col-sm-12 control-label">Support</label>
                            <div class="col-sm-12">
                              <input id="or_act_support" name="or_act_support" type="file" class="form-control form-control-file">
                            </div>
                          </div--><!--.form-group-->
                        </div><!--.form-horizontal-->
                      </div><!--.col-md-3-->
                      <!--Fin tercera columna-->
                  </div><!--row-->
                  <input type="hidden" name="id_act_order" id="id_act_order">
                  <input type="hidden" name="id_act_proyecto" id="id_act_proyecto">
                  <input type="hidden" name="id_act_cliente" id="id_act_cliente">
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">
              
              <button id="btn_act_orden" type="button" class="btn btn-outline-primary">Actualizar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
      <!--.fin modal nuevo orden-->


  <!--.modal edita proyecto-->
  <div id="modal_nuevo_orden_item" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Orden Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Cliente</label>
                        <div class="col-sm-12">
                          <input id="act_nombre_cliente" type="text" class="form-control" readonly >
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Nombre proyecto</label>
                        <div class="col-sm-12">
                          <input id="act_nombre_proyecto" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Seleccione estado</label>
                        <div class="col-sm-12">
                          <div id="s_estado"></div>
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                </div><!--row-->
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="act_id_proyecto">
              <input type="hidden" id="act_id_cliente">
              <button id="btn-actualizar-proy" type="button" class="btn btn-outline-primary">Actualizar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--.fin modal edita proyecto--> 




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

$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function() { 

    recargaProyectos(0);
    recargaOrdenes(0,0);
    recargaItemOrdenes(0, 0, 0)

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



function listar_ordenes(id_proyecto,id_cliente){  
  
  formToggleActivar('btn_nueva_orden');
  $('#flag_orden').val(1); 
   recargaOrdenes(id_proyecto,id_cliente);

}


$('#select_clientes').on('change', function(){

    var cliente = this.value;
    formToggleActivar('btn_nuevo_proyecto');

    if(cliente > 0){

      recargaOrdenes(0,0);
      recargaProyectos(cliente);
      


    }else{
      //recargaOrdenes(0,0);
      $('#flag_orden').val(0);
      $('#datos_proyectos').html('<td class="text-center" colspan="5">No hay datos disponibles en la tabla.</td>');
    }

});

$('#btn_nuevo_proyecto').on('click', function(){
 
  let select     = $('#select_clientes');
  let id_cliente = $('#select_clientes').val();
  let nombre = $('#select_clientes option:selected').data('name');

  if(id_cliente == 0){

    toastr.info('Debe seleccionar un Cliente');

  }else{

    $('#var_cliente').val(id_cliente);
    $('#var_nombre_cliente').val(nombre);


    $('#modal_nuevo_proyecto').modal('show');
    
  }

});


$('#btn_nueva_item_orden').on('click', function(){
 
 
   $('#modal_nuevo_orden_item').modal('show');
   
 
});


$('#btn-guardar').on('click', function(){

  let id_cliente      = $('#var_cliente').val();
  let nombre_proyecto = $('#var_nombre_proyecto').val(); 
  let descripcion_proyecto = $('#var_descripcion_proyecto').val(); 
  let lugar_proyecto = $('#var_lugar_proyecto').val(); 

  $.ajax({
    url: 		'<?php echo base_url('index.php/Proyectos/guardarProyecto'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_cliente : id_cliente,
            nombre_proyecto: nombre_proyecto,
            descripcion_proyecto: descripcion_proyecto,
            lugar_proyecto: lugar_proyecto
          },
  }).done(function(result) {

    if(result.resp){
      recargaProyectos(id_cliente);
      $('#var_descripcion_proyecto').val('')
      $('#modal_nuevo_proyecto').modal('hide');
      toastr.success(result.mensaje);
    }else{
      toastr.info(result.mensaje);
    }
      

  }).fail(function() {
    console.log("error guardar proy");
  })

});


function recargaProyectos(cliente){

    var proyectos_html ='';
    var id_proyecto;
    var nombre_proyecto;

    var tabla_proyecto =  $('#tbl_proyectos').DataTable();

    tabla_proyecto.destroy();

    $.ajax({
      url: 		'<?php echo base_url('index.php/Proyectos/listProyectosCliente'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              cliente: cliente
            },
    }).done(function(result) {

      

      $.each(result.proyectos,function(key, proyecto) {
        proyectos_html += '<tr>';
        proyectos_html += '<td>';
          proyectos_html += '<button data-nombre="'+ proyecto.nombre_proyecto +'" data-toggle="tooltip" data-placement="left" title="Listar ordenes" onclick="listar_ordenes('+ proyecto.NumeroProyecto +','+ cliente +',this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
          proyectos_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Proyecto" onclick="edita_proyecto('+ proyecto.NumeroProyecto +','+ cliente +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          proyectos_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Proyecto" onclick="elimina_proyecto('+ proyecto.NumeroProyecto +','+ cliente +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          proyectos_html += '</td>';
        proyectos_html += '<td>' + proyecto.NombreProyecto + '</td>';
        proyectos_html += '<td>' + proyecto.DescripcionProyecto + '</td>';
        proyectos_html += '<td>' + proyecto.Lugar + '</td>';
        if(proyecto.estadoProyecto ==='ACTIVO'){
            proyectos_html += '<td><span class="bg-green">'+ proyecto.estadoProyecto +'</span></td>';    
        }else{
            proyectos_html += '<td><span class="bg-red">'+ proyecto.estadoProyecto +'</span></td>';
        }
         
        proyectos_html += '</tr>';

        id_proyecto = proyecto.codigo_proyecto;
        nombre_proyecto = proyecto.nombre_proyecto;

      });
        
        $('#id_proyecto_or').val(id_proyecto);
        $('#id_cliente_or').val(cliente);
        $('#nombre_proyecto_or').val(nombre_proyecto);
        $('#datos_proyectos').html(proyectos_html);
        $('[data-toggle="tooltip"]').tooltip();

        $('#tbl_proyectos').DataTable({
          language: {
              url: '<?php echo base_url('assets/datatables/lang/esp.js'); ?>'	
          },
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "responsive": true,
          "scrollY": "600px",
          "scrollX": true,
          "scrollCollapse": true
      });

    }).fail(function() {
      console.log("error change cliente");
    })

    $('#flag_orden').val(0);

}

function edita_proyecto(id_proyecto, id_cliente){

  $.ajax({
    url: 		'<?php echo base_url('index.php/Proyectos/editarProyecto'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_proyecto: id_proyecto,
            id_cliente:id_cliente
          },
  }).done(function(result) {
      
    $('#act_nombre_cliente').val(result.nombre_cliente);
    $('#act_nombre_proyecto').val(result.NombreProyecto);
    $('#act_descripcion_proyecto').val(result.DescripcionProyecto);
    $('#act_lugar_proyecto').val(result.Lugar);
    $('#s_estado').empty();
    $('#s_estado').html(result.select_estado);
    $('#act_id_proyecto').val(result.id_proyecto);
    $('#act_id_cliente').val(id_cliente);

    $('#modal_edita_proyecto').modal('show');


  }).fail(function() {
    console.log("error edita_proyecto");
  })

}

$('#btn-actualizar-proy').on('click', function(){

  let id_cliente      = $('#act_id_cliente').val();
  let id_proyecto     = $('#act_id_proyecto').val();
  let nombre_proyecto = $('#act_nombre_proyecto').val();
  let estado          = $('#act_estado').val();

  $.ajax({
    url: 		'<?php echo base_url('index.php/ingenieria/actualizaProyecto'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_cliente  : id_cliente,
            id_proyecto : id_proyecto,
            nombre_proyecto: nombre_proyecto,
            estado : estado
          },
  }).done(function(result) {

    if(result.resp){

      recargaProyectos(id_cliente);
      $('#modal_edita_proyecto').modal('hide');
      toastr.success(result.mensaje);

    }else{

      toastr.info(result.mensaje);
    
    }
      

  }).fail(function() {
    console.log("error actualizar proy");
  })


});


function elimina_proyecto(id_proyecto, id_cliente){

  var opcion = confirm("Esta seguro que quiere borrar este registro");

  if(opcion){

        $.ajax({
        url: 		'<?php echo base_url('index.php/ingenieria/eliminaProyecto'); ?>',
        type: 		'POST',
        dataType: 'json',
        data: {
                id_cliente  : id_cliente,
                id_proyecto : id_proyecto
              },
      }).done(function(result) {

        if(result.resp){

          recargaProyectos(id_cliente);
          toastr.success(result.mensaje);

        }else{

          toastr.error(result.mensaje);
        
        }
          

      }).fail(function() {
        console.log("error eliminar proy");
      })
    

  }

}

function listar_item_ordenes(orden_id, id_cliente, id_proyecto ) {

formToggleActivar('btn_nueva_item_orden');
recargaItemOrdenes(orden_id, id_cliente, id_proyecto);

}


function recargaItemOrdenes(orden_id, id_cliente, id_proyecto) {

var ordenes_item_html = '';
var tabla_ordenes = $('#tbl_ordenes_items').DataTable();

tabla_ordenes.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/OrdenesItem/obtieneItemOrdenes');?>',
    type: 'POST',
    dataType: 'json',
    data: {
        idOrden: orden_id,
        idCliente: id_cliente,
        idProyecto: id_proyecto
    },
}).done(function(result) {

    console.log(result);
    
   
    $.each(result.ordenes_item, function(key, orden_item) {
        ordenes_item_html += '<tr>';

        ordenes_item_html += '<td>' + orden_item.PurchaseOrderID + '</td>';
        ordenes_item_html += '<td>' + orden_item.id_item + '</td>';
        ordenes_item_html += '<td>' + orden_item.descripcion + '</td>';
        ordenes_item_html += '<td>' + orden_item.revision + '</td>';
        ordenes_item_html += '<td>' + orden_item.unidad + '</td>';
        ordenes_item_html += '<td>' + orden_item.cantidad + '</td>';
        ordenes_item_html += '<td>' + orden_item.precio_unitario + '</td>';
        ordenes_item_html += '<td>' + orden_item.valor_neto + '</td>';

        if(orden_item.estado ==='ACTIVO'){
            ordenes_item_html += '<td><span class="bg-green">'+ orden_item.estado +'</span></td>';    
        }else{
            ordenes_item_html += '<td><span class="bg-red">'+ orden_item.estado +'</span></td>';
        }
        ordenes_item_html += '</tr>';

                                            
    });

    $('#datos_ordenes_items').html(ordenes_item_html);
    $('[data-toggle="tooltip"]').tooltip();

    $('#tbl_ordenes_items').DataTable({
        "searching": false,
        language: {
            url: '<?php echo base_url('assets/datatables/lang/esp.js');?>'
        },
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "scrollY": "600px",
        "scrollX": true,
        "scrollCollapse": true
    });


}).fail(function() {
    console.log("error listar_ordenes");
})


}


function recargaOrdenes(id_proyecto,id_cliente){

  var ordenes_html ='';
  var tabla_ordenes =  $('#ListOrdenes').DataTable();

  tabla_ordenes.destroy();

  $.ajax({
      url: 		'<?php echo base_url('index.php/Ordenes/obtieneOrdenes'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              idCliente: id_cliente,
              idProyecto: id_proyecto
            },
    }).done(function(result) {

      

      if(id_proyecto == 0){
        $('#flag_orden').val(0);
      }
      
      $.each(result.ordenes,function(key, orden) {
        ordenes_html += '<tr>';
        ordenes_html += '<td>';
          //ordenes_html += '<button data-toggle="tooltip" data-placement="top" title="Ver Bucksheet" onclick="ver_bucksheet()" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Listar Item Orden" onclick="listar_item_ordenes('+ orden.PurchaseOrderID +','+ id_cliente +','+ id_proyecto +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-list-ol"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Orden" onclick="editar_orden('+ id_cliente +','+ id_proyecto +','+ orden.PurchaseOrderID +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Orden" onclick="eliminar_orden('+ id_cliente +','+ id_proyecto +','+ orden.PurchaseOrderID +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          ordenes_html += '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderID + '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderNumber + '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderDescription + '</td>';
        ordenes_html += '<td>' + orden.SupplierName + '</td>';
        ordenes_html += '<td>' + orden.ExpediterID + '</td>';
        ordenes_html += '<td>' + orden.Requestor + '</td>';
        ordenes_html += '<td>' + orden.Currency + '</td>';
        ordenes_html += '<td>' + orden.ValorNeto + '</td>';
        ordenes_html += '<td>' + orden.ValorTotal + '</td>';
        ordenes_html += '<td>' + orden.Budget + '</td>';
        ordenes_html += '<td>' + orden.CostCodeBudget + '</td>';
        ordenes_html += '<td>' + orden.OrderDate + '</td>';
        ordenes_html += '<td>' + orden.DateRequired + '</td>';
        ordenes_html += '<td>' + orden.DatePromised + '</td>';
        ordenes_html += '<td>' + orden.ShipDate + '</td>';
        ordenes_html += '<td>' + orden.ShippingMethodID + '</td>';
        ordenes_html += '<td>' + orden.DateCreated + '</td>';
        ordenes_html += '<td>' + orden.POStatus + '</td>';
        ordenes_html += '<td>' + orden.Support + '</td>';
        ordenes_html += '</tr>';

      });

        $('#datos_ordenes').html(ordenes_html);
        $('[data-toggle="tooltip"]').tooltip();

        $('#ListOrdenes').DataTable({
            "searching": false,
            language: {
                url: '<?php echo base_url('assets/datatables/lang/esp.js'); ?>'	
            },
            "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "responsive": true,
          "scrollY": "600px",
          "scrollX": true,
          "scrollCollapse": true
        });


    }).fail(function() {
      console.log("error listar_ordenes");
    })


}

function eliminar_orden(cliente, proyecto, orden){

  var opcion = confirm("Esta seguro que quiere borrar este registro");

  if(opcion){

        $.ajax({
        url: 		'<?php echo base_url('index.php/ingenieria/eliminaOrden'); ?>',
        type: 		'POST',
        dataType: 'json',
        data: {
                id_cliente  : cliente,
                id_proyecto : proyecto,
                orden       : orden
              },
        }).done(function(result) {

        if(result.resp){

          recargaOrdenes(proyecto,cliente);
          toastr.success(result.mensaje);

        }else{

          toastr.error(result.mensaje);

        }
          

        }).fail(function() {
        console.log("error eliminar order");
        })


  }

}


/**
  Funcion trae select para usarlos en formulario nueva orden
 */
function obtieneSelects(){

  $.ajax({
    url: 		'<?php echo base_url('index.php/ingenieria/obtieneSelectOrden'); ?>',
    type: 		'POST',
    dataType: 'json'
    }).done(function(result) {

      $('.fechas').datepicker({
          format:         "dd-mm-yyyy",
          language:       "es",
          autoclose:      true,
          todayHighlight: true,
          toggleActive:   true,
          orientation:    "bottom left"
      });

      $('#s_supplier').html(result.select_supplier);
      $('#s_employee').html(result.select_employee);
      $('#s_currency').html(result.select_currency);
      $('#s_shipping').html(result.select_shipping);
      $('#s_status').html(result.select_status);
      $('#or_nombre_proyecto').val($('#nombre_proyecto_or').val());

    }).fail(function() {
    console.log("error eliminar order");
    })


}

$('#btn_nueva_orden').on('click', function(){

  if($('#flag_orden').val() > 0){
    
    obtieneSelects();
    $('#modal_new_orden').modal('show'); 
  
  }else{

    toastr.info('Primero debe listar ordenes');

  }  

});

$('#btn_orden').on('click', function(){

  var formData = new FormData(document.getElementById("form_orden"));

  
  formData.append('id_proyecto_or', $('#id_proyecto_or').val());
  formData.append('id_cliente', $('#id_cliente_or').val());

  $.ajax({
				url: 			'<?php echo base_url('index.php/ingenieria/guardaOrden'); ?>',
				type: 			'POST',
				dataType: 		'json',
				contentType: 	false,
				cache: 			false,
				processData: 	false,
				data: 			formData
  })
  .done(function(result) {

    if(result.resp){

      recargaOrdenes($('#id_proyecto_or').val(), $('#id_cliente_or').val());

      $('#modal_new_orden').modal('hide');
      

    }
    
  })
  .fail(function() {
    console.log("error guardaOrden");
  })
  
  

});

$('#modal_new_orden').on('hidden.bs.modal', function () {
  $("#form_orden")[0].reset();
});

function editar_orden(id_cliente, id_proyecto, order_id){


  $.ajax({
    url: 		'<?php echo base_url('index.php/ingenieria/editarOrden'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_proyecto: id_proyecto,
            id_cliente:id_cliente,
            order_id:order_id
          },
  }).done(function(result) {
      
      $('#or_act_nombre_proyecto').val($('#nombre_proyecto_or').val());

      $('#or_act_purchase_order').val(result.formulario.purchase_number);
      $('#or_act_purchase_desc').val(result.formulario.purchase_desc);
      $('#s_act_supplier').html(result.formulario.select_supplier);
      $('#s_act_employee').html(result.formulario.select_employee);
      $('#s_act_currency').html(result.formulario.select_currency);
      $('#or_act_requestor').val(result.formulario.requestor);
      $('#or_act_valor_neto').val(result.formulario.valor_neto);
      $('#or_act_valor_total').val(result.formulario.valor_total);
      $('#or_act_budget').val(result.formulario.budget);
      $('#or_act_order_date').val(result.formulario.order_date);
      $('#or_act_date_required').val(result.formulario.date_required);
      $('#or_act_date_promised').val(result.formulario.date_promised);
      $('#or_act_ship_date').val(result.formulario.ship_date);
      $('#s_act_shipping').html(result.formulario.select_shipping);
      $('#s_act_status').html(result.formulario.select_status);

      $('#id_act_order').val(result.formulario.orden_id);
      $('#id_act_proyecto').val(result.formulario.id_proyecto);
      $('#id_act_cliente').val(result.formulario.id_cliente);
    

    $('#modal_edit_orden').modal('show');


  }).fail(function() {
    console.log("error edita_proyecto");
  })



}


$('#btn_act_orden').on('click', function(){
  

  var formData = new FormData(document.getElementById("form_orden_act"));


  $.ajax({
    url: 		'<?php echo base_url('index.php/ingenieria/actualizaOrden'); ?>',
    type: 		'POST',
    dataType: 'json',
    contentType: 	false,
    cache: 			false,
    processData: 	false,
    data: formData
  }).done(function(result) {

    if(result.resp){
      recargaOrdenes($('#id_act_proyecto').val(), $('#id_act_cliente').val());
      $('#modal_edit_orden').modal('hide');
      toastr.success('Datos actualizados');
    }else{
      toastr.error('Error al actualizar');
    }


  }).fail(function() {
    console.log("error edita_proyecto");
  })

});

$('#modal_edit_orden').on('hidden.bs.modal', function () {
  $("#form_orden_act")[0].reset();
});



</script>