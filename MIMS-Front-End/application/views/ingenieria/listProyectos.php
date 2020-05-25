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
                         <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                     <button style="display: none;" id="btn_nuevo_proyecto" class="btn btn-outline-primary float-right mb-3">Nuevo Proyecto</button>
                                     </th>
                                 </tr>
                             </tbody>
                         </table>

                          <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0" width=100%>
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
														<h3 class="card-title" id="titulo_ordenes">
                              <i class="fas fa-clipboard-list"></i>
															Ordenes de Compra Proyecto
														</h3>
													</div>
													<!-- /.card-header -->
													<div class="card-body">
                         <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                     <button style="display: none;" id="btn_nueva_orden" class="btn btn-outline-primary float-right mb-3">Nueva orden</button>
                                     </th>
                                 </tr>
                             </tbody>
                         </table>
                          <table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0" width=100%>
                   
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
                         <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                   	<button style="display: none;" id="btn_nueva_item_orden" class="btn btn-outline-primary float-right mb-3">Nueva Item Orden</button>
                                     </th>
                                 </tr>
                             </tbody>
                         </table>
													  <table id="tbl_ordenes_items" class="table table-striped table-bordered" cellspacing="0" width=100%>
													
                            <thead>
															<tr>                          
                                                            <th>Acciones</th>
                                                            <th>Orden ID</th>
                                                            <th>Item ID</th>
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
                  <div class="card-body">
                     <div class="row">

              <div class="col-12 col-sm-6">
                
                <div class="form-group">
                   <label class="col-sm-12 control-label">Nombre Proyecto</label>
                            <div class="col-sm-12">
                              <input id="or_nombre_proyecto" type="text" class="form-control form-control-sm" readonly >
                            </div> 
                </div>
                </div>


                <div class="col-12 col-sm-6">
                <div class="form-group">
                <label class="col-sm-12 control-label">Numero Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_purchase_order" name="or_purchase_order" type="text" class="form-control form-control-sm">
                            </div>
                 </div>

                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                    
                    <label class="col-sm-12 control-label">Descripcion Orden de Compra</label>
                                <div class="col-sm-12">
                                  <input id="or_purchase_desc" name="or_purchase_desc" type="text" class="form-control form-control-sm">
                                </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                    <label class="col-sm-12 control-label">Seleccione Proveedor</label>
                                <div class="col-sm-12">
                                  <div id="s_supplier"></div>
                                </div>
                  
                  </div>
                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-12 control-label">Comprador</label>
                                <div class="col-sm-12">
                                  <input id="or_comprador" name="or_comprador" type="text" class="form-control form-control-sm">
                                </div>
                    </div>
                  </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                    <label class="col-sm-12 control-label">Seleccione Activador</label>
                                <div class="col-sm-12">
                                      <div id="s_employee"></div>
                                </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Moneda</label>
                            <div class="col-sm-12">
                              <div id="s_currency"></div>
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Ingeniero Requestor</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_requestor" id="or_requestor" class="form-control form-control-sm">
                              <!--div id="s_ingeniero"></div-->
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor neto</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_valor_neto" name="or_valor_neto" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor total</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                              <input id="or_valor_total" name="or_valor_total" type="number" class="form-control form-control-sm">
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Presupuesto</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                              <input id="or_budget" name="or_budget" type="number" class="form-control form-control-sm">
                            </div>
                          </div>
                    </div>


                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Codigo Presupuesto</label>
                            <div class="col-sm-12">
                              <input id="or_costcodebudget" name="or_costcodebudget" class="form-control form-control-sm">
                            </div>
                          </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha orden</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_order_date" type="text" class="form-control" id="or_order_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                           </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha requerida</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_date_required" type="text" class="form-control" id="or_date_required"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>
                                      </div>


                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha comprometida</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_date_promised" type="text" class="form-control" id="or_date_promised"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                              </div>
                   </div>
                   </div>



                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha enviada</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_ship_date" type="text" class="form-control" id="or_ship_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Metodo envio</label>
                            <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                                                 </div>
                              <div id="s_shipping"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>

                   

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Estado orden</label>
                            <div class="col-sm-12">
                              <div id="s_status"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Archivo respaldo</label>
                            <div class="col-sm-12">
                              <input id="or_support" name="or_support" type="file" class="form-control form-control-file">
                            </div><!--.col-sm-12-->
                          </div>
                   </div>




              </div>

            </div>
            <!-- /.row -->



          </div>
          <!-- /.card-body -->

          <div class="modal-footer justify-content-between">
              <button id="btn_orden" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

          <input type="hidden" id="id_proyecto_or" name="id_proyecto_or" value=""> 
          <input type="hidden" id="id_cliente_or" name="id_cliente_or" value="">

                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
         
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
                <form id="form_orden_item_act">
                  <div class="card-body">
                     <div class="row">

              <div class="col-12 col-sm-6">
                
                <div class="form-group">
                   <label class="col-sm-12 control-label">Nombre Proyecto</label>
                            <div class="col-sm-12">
                              <input id="or_act_nombre_proyecto" type="text" class="form-control form-control-sm" readonly >
                            </div> 
                </div>
                </div>


                <div class="col-12 col-sm-6">
                <div class="form-group">
                <label class="col-sm-12 control-label">Numero Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_act_purchase_order" name="or_act_purchase_order" type="text" class="form-control form-control-sm">
                            </div>
                 </div>

                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                    
                    <label class="col-sm-12 control-label">Descripcion Orden de Compra</label>
                                <div class="col-sm-12">
                                  <input id="or_act_purchase_desc" name="or_act_purchase_desc" type="text" class="form-control form-control-sm">
                                </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                    <label class="col-sm-12 control-label">Seleccione Proveedor</label>
                                <div class="col-sm-12">
                                  <div id="s_act_supplier"></div>
                                </div>
                  
                  </div>
                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-12 control-label">Comprador</label>
                                <div class="col-sm-12">
                                  <input id="or_act_comprador" name="or_act_comprador" type="text" class="form-control form-control-sm">
                                </div>
                    </div>
                  </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                    <label class="col-sm-12 control-label">Seleccione Activador</label>
                                <div class="col-sm-12">
                                      <div id="s_act_employee"></div>
                                </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Moneda</label>
                            <div class="col-sm-12">
                              <div id="s_act_currency"></div>
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Ingeniero Requestor</label>
                            <div class="col-sm-12">
                              <input type="text" name="or_act_requestor" id="or_act_requestor" class="form-control form-control-sm">
                              <!--div id="s_ingeniero"></div-->
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor neto</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_act_valor_neto" name="or_act_valor_neto" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor total</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                              <input id="or_act_valor_total" name="or_act_valor_total" type="number" class="form-control form-control-sm">
                            </div>
                          </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Presupuesto</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                              <input id="or_act_budget" name="or_act_budget" type="number" class="form-control form-control-sm">
                            </div>
                          </div>
                    </div>


                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Codigo Presupuesto</label>
                            <div class="col-sm-12">
                              <input id="or_act_costcodebudget" name="or_act_costcodebudget" class="form-control form-control-sm">
                            </div>
                          </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha orden</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_act_order_date" type="text" class="form-control" id="or_act_order_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                           </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha requerida</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_act_date_required" type="text" class="form-control" id="or_act_date_required"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>
                                      </div>


                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha comprometida</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_act_date_promised" type="text" class="form-control" id="or_act_date_promised"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                              </div>
                   </div>
                   </div>



                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha enviada</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_act_ship_date" type="text" class="form-control" id="or_act_ship_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Metodo envio</label>
                            <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                                                 </div>
                              <div id="s_act_shipping"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>

                   

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Estado orden</label>
                            <div class="col-sm-12">
                              <div id="s_act_status"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Archivo respaldo</label>
                            <div class="col-sm-12">
                              <input id="or_act_support" name="or_act_support" type="file" class="form-control form-control-file">
                            </div><!--.col-sm-12-->
                          </div>
                   </div>




              </div>

            </div>
            <!-- /.row -->



          </div>
          <!-- /.card-body -->
          <input type="hidden" id="id_act_order" name="id_act_order" value="">
          <input type="hidden" id="id_act_proyecto" name="id_act_proyecto" value=""> 
          <input type="hidden" id="id_act_cliente" name="id_act_cliente" value="">


          <div class="modal-footer justify-content-between">
              <button id="btn_act_orden" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
         
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
      <!--.fin modal edita orden-->


  <!--.modal nueva oden item-->
  <div id="modal_nuevo_orden_item" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nueva Item en Orden</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="form_orden_item">
                  <div class="card-body">
                     <div class="row">

              <div class="col-12 col-sm-6">
                
              


                <div class="col-12 col-sm-6">
                <div class="form-group">
                <label class="col-sm-12 control-label">Numero Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_item_purchase_order" name="or_item_purchase_order" type="text" class="form-control form-control-sm" readonly>
                            </div>
                 </div>

                  </div>




                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Item Id</label>
                            <div class="input-group">
                               <input id="or_item_id_item" name="or_item_id_item" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>

                
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Descripcion</label>
                            <div class="col-sm-12">
                              <input id="or_item_descripcion" name="or_item_descripcion" class="form-control form-control-sm">
                            </div>
                          </div>
                   </div>


        
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Revision</label>
                            <div class="input-group">
                               <input id="or_item_revision" name="or_item_revision" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Unidad</label>
                            <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                                                 </div>
                              <div id="s_item_unidad"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>


                    </div>

                    <div class="col-12 col-sm-6">



                   <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Cantidad</label>


                          
                            <div class="input-group">
                            <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <i class="fas fa-sort-numeric-up"></i>
                                      </span>
                                    </div>
                               <input id="or_item_cantidad" name="or_item_cantidad" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>
                
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor neto</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_item_valor_neto" name="or_item_valor_neto" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>


                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor Unitatio</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_item_valor_unitario" name="or_item_valor_unitario" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>


                   

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Estado orden</label>
                            <div class="col-sm-12">
                              <div id="s_item_status"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>


              </div>

            </div>
            <!-- /.row -->



          </div>
          <!-- /.card-body -->
          <input type="hidden" id="id_order_item" name="id_order_item" value="">
          <input type="hidden" id="id_orden_item_proyecto" name="id_orden_item_proyecto" value=""> 
          <input type="hidden" id="id_orden_item_cliente" name="id_orden_item_cliente" value="">


          <div class="modal-footer justify-content-between">
              <button id="btn_orden_item" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
         
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
<!--. fin modal nueva oden item-->




  <!--.modal edita oden item-->
  <div id="modal_edita_orden_item" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar Item en Orden</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="form_edit_item">
                  <div class="card-body">
                     <div class="row">

              <div class="col-12 col-sm-6">
                
              


                <div class="col-12 col-sm-6">
                <div class="form-group">
                <label class="col-sm-12 control-label">Numero Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_act_item_purchase_order" name="or_act_item_purchase_order" type="text" class="form-control form-control-sm" readonly>
                            </div>
                 </div>

                  </div>




                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Item Id</label>
                            <div class="input-group">
                               <input id="or_act_id_item" name="or_act_id_item" type="number" class="form-control form-control-sm" readonly>
                            </div>
                    </div>
                    </div>

                
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Descripcion</label>
                            <div class="col-sm-12">
                              <input id="or_act_item_descripcion" name="or_act_item_descripcion" class="form-control form-control-sm">
                            </div>
                          </div>
                   </div>


        
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Revision</label>
                            <div class="input-group">
                               <input id="or_act_item_revision" name="or_act_item_revision" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Unidad</label>
                            <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                                                 </div>
                              <div id="s_act_item_unidad"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>

                    </div>

                    <div class="col-12 col-sm-6">


                   <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Cantidad</label>
                            <div class="input-group">
                               <input id="or_act_item_cantidad" name="or_act_item_cantidad" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>
                
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor neto</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_act_item_valor_neto" name="or_act_item_valor_neto" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>


                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor Unitatio</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_act_item_valor_unitario" name="or_act_item_valor_unitario" type="number" class="form-control form-control-sm">
                            </div>
                    </div>
                    </div>


                   

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                            <label class="col-sm-12 control-label">Estado orden</label>
                            <div class="col-sm-12">
                              <div id="s_act_item_status"></div>
                            </div><!--.col-sm-12-->
                          </div>
                   </div>


              </div>

            </div>
            <!-- /.row -->



          </div>
          <!-- /.card-body -->
          <input type="hidden" id="id_act_order_item" name="id_act_order_item" value="">
          <input type="hidden" id="id_act_orden_item_proyecto" name="id_act_orden_item_proyecto" value=""> 
          <input type="hidden" id="id_act_orden_item_cliente" name="id_act_orden_item_cliente" value="">


          <div class="modal-footer justify-content-between">
              <button id="btn_act_orden_item" type="button" class="btn btn-outline-primary">Actualizar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
         
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
<!--. fin modal nueva oden item-->







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
    recargaOrdenes(0,0,'');
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


function mostrarBlock(){
		$.blockUI({ 
			message: '<h5><img style=\"width: 12px;\" src="<?php echo base_url('assets/images/pageLoader.gif');?>" />&nbsp;Espere un momento...</h5>',
			css:{
				backgroundColor: '#0063BE',
				opacity: .8,
				'-webkit-border-radius': '10px', 
	            '-moz-border-radius': '10px',
	            color: '#fff'
			}
		});
	}


function listar_ordenes(id_proyecto,id_cliente,nombre_proyecto){  
  
  formToggleActivar('btn_nueva_orden');
  $('#flag_orden').val(1); 
  recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto);

}


$('#select_clientes').on('change', function(){

    var cliente = this.value;
    formToggleActivar('btn_nuevo_proyecto');

    if(cliente > 0){

      recargaOrdenes(0,0,'');
      recargaProyectos(cliente);
      


    }else{
      recargaOrdenes(0,0,'');
      recargaItemOrdenes(0, 0, 0);
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




$('#btn_orden_item').on('click', function(){

  var formData = new FormData(document.getElementById("form_orden_item"));

  $.ajax({
    url: 		'<?php echo base_url('index.php/OrdenesItem/guardaOrdenItem'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: formData,
    contentType: 	false,
		cache: 			false,
    processData: 	false,
    beforeSend: function(){
      mostrarBlock();
    },
    complete: function(){
      $.unblockUI();
    },
    success: function(result){
      if(result.resp){

          recargaItemOrdenes($('#id_order_item').val(),$('#id_orden_item_cliente').val(), $('#id_orden_item_proyecto').val());
          $('#modal_nuevo_orden_item').modal('hide');
          toastr.success(result.mensaje);
      
      }else{
          
          toastr.error(result.mensaje);
      }
    },
    error: function(request, status, err) {
      toastr.error(result.mensaje);
      toastr.error("error: " + request + status + err);
      
       }
});









$.ajax({
  url: 		'<?php echo base_url('index.php/OrdenesItem/guardaOrdenItem'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: formData,
  contentType: 	false,
				cache: 			false,
				processData: 	false
}).done(function(result) {

  
    

}).fail(function() {
  console.log("error guardar proy");
})

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
      $('#var_nombre_proyecto').val('')
      $('#var_lugar_proyecto').val('')
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

    var id_proyecto ;
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
          proyectos_html += '<button data-nombre="'+ proyecto.NombreProyecto +'" data-toggle="tooltip" data-placement="left" title="Listar ordenes" onclick="listar_ordenes('+ proyecto.NumeroProyecto +','+ cliente +',\''+proyecto.NombreProyecto+'\', this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
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

        id_proyecto = proyecto.NumeroProyecto;
        nombre_proyecto = proyecto.NombreProyecto;

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
    $('#act_nombre_proyecto').val(result.nombre_proyecto);
    $('#act_descripcion_proyecto').val(result.descripcion_proyecto);
    $('#act_lugar_proyecto').val(result.lugar_proyecto);
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
  let descripcion_proyecto = $('#act_descripcion_proyecto').val();
  let lugar_proyecto =  $('#act_lugar_proyecto').val();
 

  $.ajax({
    url: 		'<?php echo base_url('index.php/Proyectos/actualizaProyecto'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_cliente  : id_cliente,
            id_proyecto : id_proyecto,
            nombre_proyecto: nombre_proyecto,
            descripcion_proyecto: descripcion_proyecto,
            lugar_proyecto: lugar_proyecto,
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
        url: 		'<?php echo base_url('index.php/Proyectos/eliminaProyecto'); ?>',
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
obtieneSelects();

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
        ordenes_item_html += '<td>';
          ordenes_item_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Orden Item" onclick="editar_orden_item('+ id_cliente +','+ id_proyecto +','+ orden_item.PurchaseOrderID +','+ orden_item.id_item +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          ordenes_item_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Orden Item" onclick="eliminar_orden_item('+ id_cliente +','+ id_proyecto +','+ orden_item.PurchaseOrderID +','+ orden_item.id_item +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          ordenes_item_html += '</td>';
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

    $('#id_order_item').val(orden_id);

    $('#id_orden_item_proyecto').val(id_proyecto);
    $('#id_orden_item_cliente').val(id_cliente);
    $('#or_item_purchase_order').val(orden_id);


    
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


function recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto){

  var ordenes_html ='';
  var tabla_ordenes =  $('#ListOrdenes').DataTable();
  var titulo_ordenes ='';

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

      titulo_ordenes = '<i class="fas fa-clipboard-list"></i> Orden de compra Proyecto '+ nombre_proyecto;
      $('#titulo_ordenes').html(titulo_ordenes);  
      $('#datos_ordenes').html(ordenes_html);
      $('#or_nombre_proyecto').val(nombre_proyecto);
      $('#or_act_nombre_proyecto').val(nombre_proyecto);
      $('#id_proyecto_or').val(id_proyecto);
      $('#id_cliente_or').val(id_cliente);

   


      $('#datos_ordenes').val(ordenes_html);
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
        url: 		'<?php echo base_url('index.php/Ordenes/eliminaOrden'); ?>',
        type: 		'POST',
        dataType: 'json',
        data: {
                id_cliente  : cliente,
                id_proyecto : proyecto,
                orden       : orden
              },
        }).done(function(result) {

        if(result.resp){

          recargaOrdenes(proyecto,cliente),$('#nombre_proyecto_or').val();
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
    url: 		'<?php echo base_url('index.php/Ordenes/obtieneSelectOrden'); ?>',
    type: 		'POST',
    dataType: 'json'
    }).done(function(result) {

      $('#s_supplier').html(result.select_supplier);
      $('#s_employee').html(result.select_employee);
      $('#s_currency').html(result.select_currency);
      $('#s_shipping').html(result.select_shipping);
      $('#s_status').html(result.select_status);

      $('#s_item_unidad').html(result.select_item_unidad);
      $('#s_item_status').html(result.select_item_status);

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
				url: 			'<?php echo base_url('index.php/Ordenes/guardaOrden'); ?>',
				type: 			'POST',
				dataType: 		'json',
				contentType: 	false,
				cache: 			false,
				processData: 	false,
				data: 			formData
  })
  .done(function(result) {

    if(result.resp){

      recargaOrdenes($('#id_proyecto_or').val(), $('#id_cliente_or').val(),$('#titulo_ordenes').val());
      toastr.success(result.mensaje);

     $('#modal_new_orden').modal('hide');
      

    }else{
      toastr.error(result.mensaje);
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
    url: 		'<?php echo base_url('index.php/Ordenes/editarOrden'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_proyecto: id_proyecto,
            id_cliente:id_cliente,
            order_id:order_id
          },
  }).done(function(result) {
      

      $('#or_act_purchase_order').val(result.formulario.purchase_number);
      $('#or_act_purchase_desc').val(result.formulario.purchase_desc);
      $('#s_act_supplier').html(result.formulario.select_supplier);
      $('#s_act_employee').html(result.formulario.select_employee);
      $('#s_act_currency').html(result.formulario.select_currency);
      $('#or_act_requestor').val(result.formulario.requestor);
      $('#or_act_comprador').val(result.formulario.comprador);
      $('#or_act_valor_neto').val(result.formulario.valor_neto);
      $('#or_act_valor_total').val(result.formulario.valor_total);
      $('#or_act_budget').val(result.formulario.budget);
      $('#or_act_costcodebudget').val(result.formulario.costcodebudget);
      $('#or_act_order_date').val(result.formulario.order_date);
      $('#or_act_date_required').val(result.formulario.date_required);
      $('#or_act_date_promised').val(result.formulario.date_promised);
      $('#or_act_ship_date').val(result.formulario.ship_date);
      $('#s_act_shipping').html(result.formulario.select_shipping);
      $('#s_act_status').html(result.formulario.select_status);

      $('#id_act_order').val(order_id);
      $('#id_act_proyecto').val(id_proyecto);
      $('#id_act_cliente').val(id_cliente);
    

    $('#modal_edit_orden').modal('show');


  }).fail(function() {
    console.log("error edita_proyecto");
  })



}


$('#btn_act_orden').on('click', function(){
  

  var formData = new FormData(document.getElementById("form_orden_act"));


  $.ajax({
    url: 		'<?php echo base_url('index.php/Ordenes/actualizaOrden'); ?>',
    type: 		'POST',
    dataType: 'json',
    contentType: 	false,
    cache: 			false,
    processData: 	false,
    data: formData
  }).done(function(result) {


    if(result.resp){

      recargaOrdenes($('#id_act_proyecto').val(), $('#id_act_cliente').val(),$('#titulo_ordenes').val());
      $('#modal_edit_orden').modal('hide');
      toastr.success(result.mensaje);

        }else{

        toastr.error(result.mensaje);

        }


  }).fail(function() {
    console.log("error edita_proyecto");
  })

});

$('#modal_edit_orden').on('hidden.bs.modal', function () {
  $("#form_orden_act")[0].reset();
});


function editar_orden_item(id_cliente, id_proyecto, order_id, item_id){


$.ajax({
  url: 		'<?php echo base_url('index.php/OrdenesItem/editarOrdenItem'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
          id_proyecto: id_proyecto,
          id_cliente: id_cliente,
          order_id: order_id,
          item_id: item_id
        },
}).done(function(result) {


    $('#or_act_item_purchase_order').val(result.formulario.id_act_order_item);
    $('#or_act_id_item').val(result.formulario.id_act_item);
       
    $('#or_act_item_descripcion').val(result.formulario.or_act_item_descripcion);
    $('#or_act_item_revision').val(result.formulario.or_act_item_revision);
    $('#s_act_item_unidad').html(result.formulario.s_act_item_unidad);
    $('#or_act_item_cantidad').val(result.formulario.or_act_item_cantidad);
    $('#or_act_item_valor_neto').val(result.formulario.or_act_item_valor_neto);
    $('#or_act_item_valor_unitario').val(result.formulario.or_act_item_valor_unitario);
    $('#s_act_item_status').html(result.formulario.s_act_item_status);
    
    
    $('#id_act_order_item').val(result.formulario.id_act_order_item);
    $('#id_act_orden_item_proyecto').val(result.formulario.id_act_orden_item_proyecto);
    $('#id_act_orden_item_cliente').val(result.formulario.id_act_orden_item_cliente);
    
     $('#modal_edita_orden_item').modal('show');


}).fail(function() {
  console.log("error edita_orden_item");
})



}


$('#btn_act_orden_item').on('click', function(){
  

  var formData = new FormData(document.getElementById("form_edit_item"));


  $.ajax({
    url: 		'<?php echo base_url('index.php/OrdenesItem/actualizaOrdenItem'); ?>',
    type: 		'POST',
    dataType: 'json',
    contentType: 	false,
    cache: 			false,
    processData: 	false,
    data: formData
  }).done(function(result) {


    if(result.resp){

      recargaItemOrdenes( $('#id_act_order_item').val(), $('#id_act_orden_item_cliente').val(), $('#id_act_orden_item_proyecto').val());
    //  $('#modal_edita_orden_item').modal('hide');
      toastr.success(result.mensaje);

        }else{

        toastr.error(result.mensaje);

        }


  }).fail(function() {
    console.log("error edita_proyecto");
  })

});

$('#modal_edita_orden_item').on('hidden.bs.modal', function () {
  $("#form_orden_item_act")[0].reset();
});


function eliminar_orden_item(cliente, proyecto, orden, orden_item){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/OrdenesItem/eliminaOrdenItem'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              id_cliente  : cliente,
              id_proyecto : proyecto,
              orden       : orden,
              orden_item : orden_item
            },
      }).done(function(result) {

      if(result.resp){

        recargaItemOrdenes(orden, cliente, proyecto);

        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);

      }
        

      }).fail(function() {
      console.log("error eliminar order Item");
      })


}

}


</script>