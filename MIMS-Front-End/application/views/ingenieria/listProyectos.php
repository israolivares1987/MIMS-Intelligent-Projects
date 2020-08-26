<div class="content-wrapper">
   
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
                      <i class="fas fa-clipboard-list"></i>
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
                  <th>Categorizacion</th>
								  <th>Orden Description</th>
                  <th>Revision</th>
                  <th>Nombre Cliente</th>
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
                        <i class="fas fa-clipboard-list"></i>
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
                     <button style="display: none;" id="btn_carga_masivo" class="btn btn-outline-primary float-right mb-3">Cargar Masivo</button>
                     <button style="display: none;" id="btn_archivo_ejemplo" class="btn btn-outline-primary float-right mb-3">Archivo Ejemplo</button>
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
                   <label class="col-sm-12 control-label">Nombre Cliente</label>
                            <div class="col-sm-12">
                              <input id="or_nombre_cliente" type="text" class="form-control form-control-sm" readonly >
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
                    <label class="col-sm-12 control-label">Seleccione Categorizacion</label>
                                <div class="col-sm-12">
                                  <div id="s_categorizacion"></div>
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
                    
                    <label class="col-sm-12 control-label">Revision</label>
                                <div class="col-sm-12">
                                  <input id="or_revision" name="or_revision" type="text" class="form-control form-control-sm">
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
                               <input id="or_valor_neto" name="or_valor_neto" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="mostrarValorTotalOr(this)">
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
                              <input id="or_valor_total" name="or_valor_total" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" readonly>
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
                              <input id="or_budget" name="or_budget" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)">
                            </div>
                          </div>
                    </div>


                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Codigo Presupuesto</label>
                            <div class="col-sm-12">
                              <input id="or_costcodebudget" name="or_costcodebudget" class="form-control form-control-sm" >
                            </div>
                          </div>
                   </div>

                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha emision orden de compra</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_order_date" type="text" class="form-control" id="or_order_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
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
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>
                                      </div>


                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha de cierre de orden de compra</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_ship_date" type="text" class="form-control" id="or_ship_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
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

					<input type="hidden" id="id_proyecto_or" name="id_proyecto_or" value=""> 
					<input type="hidden" id="id_cliente_or" name="id_cliente_or" value="">


            </div>
					  <div class="modal-footer justify-content-between">
						  <button id="btn_orden" type="button" class="btn btn-outline-primary">Guardar</button>
						  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
					  </div>
        
			      </div>
                 
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
                <form id="form_orden_act">
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
                    <label class="col-sm-12 control-label">Seleccione Categorizacion</label>
                                <div class="col-sm-12">
                                  <div id="s_act_categorizacion"></div>
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
                    
                    <label class="col-sm-12 control-label">Revision</label>
                                <div class="col-sm-12">
                                  <input id="or_act_revision" name="or_act_revision" type="text" class="form-control form-control-sm">
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
                               <input id="or_act_valor_neto" name="or_act_valor_neto" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="mostrarValorTotalAct(this)">
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
                              <input id="or_act_valor_total" name="or_act_valor_total" type="text" class="form-control form-control-sm"  onkeyup="formatoNumero(this)" readonly>
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
                              <input id="or_act_budget" name="or_act_budget" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)">
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
                                             <label>Fecha emision orden de compra</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_act_order_date" type="text" class="form-control" id="or_act_order_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
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
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>
                                      </div>


                   <div class="col-12 col-sm-6">
                   <div class="form-group">
                                             <label>Fecha de cierre de orden de compra<</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="or_act_ship_date" type="text" class="form-control" id="or_act_ship_date"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
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

					 <input type="hidden" id="id_act_order" name="id_act_order" value="">
					  <input type="hidden" id="id_act_proyecto" name="id_act_proyecto" value=""> 
					  <input type="hidden" id="id_act_cliente" name="id_act_cliente" value="">


                   </div>
			      <div class="modal-footer justify-content-between">
							  <button id="btn_act_orden" type="button" class="btn btn-outline-primary">Guardar</button>
							  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
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
                <label class="col-sm-12 control-label">Descripcion Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_item_nombre_orden" name="or_item_nombre_orden" type="text" class="form-control form-control-sm" readonly>
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
                               <input id="or_item_cantidad" name="or_item_cantidad" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="formatoNumero(this);mostrarValorNetoItemor()">
                            </div>
                    </div>
                    </div>
            
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor Unitario</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_item_valor_unitario" name="or_item_valor_unitario" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="formatoNumero(this);mostrarValorNetoItemor()">
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
                               <input  id="or_item_valor_neto" name="or_item_valor_neto" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)" readonly>
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
                <label class="col-sm-12 control-label">Descripcion Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_act_item_nombre_orden" name="or_act_item_nombre_orden" type="text" class="form-control form-control-sm" readonly>
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
                               <input id="or_act_item_cantidad" name="or_act_item_cantidad" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="mostrarValorNetoItemact()">
                            </div>
                    </div>
                    </div>

                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                            <label class="col-sm-12 control-label">Valor Unitario</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                    </div>
                               <input id="or_act_item_valor_unitario" name="or_act_item_valor_unitario" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="mostrarValorNetoItemact()">
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
                               <input id="or_act_item_valor_neto" name="or_act_item_valor_neto" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)" readonly>
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



 <!--.modal control de calidad-->
<div class="modal fade" id="modal_control_calidad">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">

                                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">
                                      <i class="fas fa-clipboard-list"></i>
                                        Ingresar Control de Calidad
                                      </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                            <table class="table" cellspacing="0" width="99%">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                        <div class="form-group" id="cc_select">
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table id="tbl_control_calidad" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                <thead>
                                                    <tr>
                                                      <th>Acciones</th>
                                                      <th>Id Orden</th>
                                                      <th>Id Calidad</th>
                                                      <th>Descripcion Calidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="datos_control_calidad">
                                                </tbody>
                                            </table>
                                      </div>
                            
                                    <!-- /.card-body -->
                            </div>

                         <input type="hidden" id="id_order_cc" name="id_order_cc" value="">
                          <input type="hidden" id="id_proyecto_cc" name="id_proyecto_cc" value=""> 
                          <input type="hidden" id="id_cliente_cc" name="id_cliente_cc" value="">
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button id="btn_agregar_cc" type="button" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!--. modal control de calidad-->

  <!--.modal control de calidad-->
 
  <!--.modal nuevo control Calidad-->
  <div id="modal_orden_item_masivo" class="modal fade" tabindex="-1" role="dialog">
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
                                <form action="#" id="formOrdenItem" class="form-horizontal">
                                        <input id="id_orden_item_mas" name="PurchaseOrderID" placeholder="" class="form-control" type="hidden" value="">
                                        <input id="id_cliente_item_mas" name="idCliente" placeholder="" class="form-control" type="hidden" value="">
                                        <input id="id_proyecto_item_mas" name="idProyecto" placeholder="" class="form-control" type="hidden"  value="">
                            
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">Cargar Archivo</label>
                                                                    <div class="custom-file">
                                                                        <input type="file"   id="fileOrdenItem"  name="fileOrdenItem" >     
                                                                </div>
                                                            </div>
                                </form>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button id="btnSave" type="button" class="btn btn-block btn-outline-success"
                                        onclick="saveOrdenItem()">Actualizar</button>
                                    <button type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Cancel</button>
                            </div>
                            </div>
                          
                            <!-- Image loader -->     
                     </div>
                 </div>
             </div>


      <script>
             $(function() {
                 

                  //Initialize Select2 Elements
                  $('.select2').select2()

                  //Initialize Select2 Elements
                  $('.select2bs4').select2({
                    theme: 'bootstrap4'
                  })

                 //Datemask dd-mm-yyyy
                 $('#datemask').inputmask('dd-mm-yyyy', {
                     'placeholder': 'dd-mm-yyyy'
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
<script>
  $(function () {

    //Datemask dd-mm-yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>


<script type="text/javascript">

$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function() { 



    recargaProyectos(0);
    recargaOrdenes(0,0,'');
    recargaItemOrdenes(0, 0, 0,'');
   // recargaCalidadDet(0, 0, 0);


    

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
			message: '<h5><img style=\"width: 12px;\" src="<?php echo base_url('assets/dist/img/loader.gif');?>" />&nbsp;Espere un momento...</h5>',
			css:{
				backgroundColor: '#0063BE',
				opacity: .8,
				'-webkit-border-radius': '10px', 
	            '-moz-border-radius': '10px',
	            color: '#fff'
			}
		});
	}


  function saveOrdenItem() {
    
    $('#btnSave').text('Actualizando..'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 

    url = "<?php echo site_url('OrdenesItem/save')?>";


    // ajax adding data to database

    var formData = new FormData($('#formOrdenItem')[0]);


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
                        $('#modal_orden_item_masivo').modal('hide');

                  
                        recargaItemOrdenes(formData.get("PurchaseOrderID"), formData.get("idCliente"), formData.get("idProyecto"),$('#or_act_item_nombre_orden').val()) 
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


function listar_ordenes(id_proyecto,id_cliente,nombre_proyecto){  
  
  formToggleActivar('btn_nueva_orden');
  $('#flag_orden').val(1); 
  recargaItemOrdenes(0, 0, 0,'');
  recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto);

}


$('#select_clientes').on('change', function(){

    var cliente = this.value;
    formToggleActivar('btn_nuevo_proyecto');

    if(cliente > 0){

      recargaOrdenes(0,0,'');
      recargaItemOrdenes(0, 0, 0,'');
      recargaProyectos(cliente);

      


    }else{
      recargaOrdenes(0,0,'');
      recargaItemOrdenes(0, 0, 0,'');
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

          recargaItemOrdenes($('#id_order_item').val(),$('#id_orden_item_cliente').val(), $('#id_orden_item_proyecto').val(),$('#or_act_item_nombre_orden').val());
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
              url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js'); ?>'	
          },
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
       //   "responsive": true,
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

function recargaControlCalidad(id_cliente ,id_proyecto,id_orden){

  var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

    $.ajax({
        url: '<?php echo base_url('index.php/ControlCalidad/obtieneControlCalidad');?>',
        type: 'POST',
        dataType: 'json',
        data: {
          codEmpresa: cod_empresa,
          id_cliente :id_cliente,
          id_proyecto : id_proyecto,
          id_orden : id_orden
        },
    }).done(function(result) {

        
      dato_calidad_html = '<select class="form-control" id="select_cc" name="select_cc">';
      
      $.each(result.datos_calidad, function(key, dato_calidad) {
            
            dato_calidad_html += '<option value='+dato_calidad.id_control_calidad + '>'+dato_calidad.descripcion_control_calidad+'</option>';
                                                
        });

        dato_calidad_html += '</select>';


    $('#cc_select').html(dato_calidad_html);

    recargaCalidadDet(id_orden,id_cliente,id_proyecto);

    }).fail(function() {
        console.log("error listar CC");
    })

}



function listar_cc(id_cliente ,id_proyecto,id_orden){
  
     recargaControlCalidad(id_cliente ,id_proyecto,id_orden);
   
    $('#id_order_cc').val(id_orden);
    $('#id_proyecto_cc').val(id_proyecto);
    $('#id_cliente_cc').val(id_cliente);
      
    $('#modal_control_calidad').modal('show');

} 



$('#btn_agregar_cc').on('click', function(){

var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

let select     = $('#select_cc');
let id_control_calidad = $('#select_cc').val();


var id_cliente = $('#id_cliente_cc').val();
var id_proyecto = $('#id_proyecto_cc').val();
var id_orden = $('#id_order_cc').val();


                    $.ajax({
                            url: '<?php echo base_url('index.php/ControlCalidadDet/guardaControlCalidadDet');?>',
                            type: 'post',
                            data: {
                              id_control_calidad : id_control_calidad,
                              id_cliente : id_cliente,
                              id_proyecto : id_proyecto,
                              id_orden : id_orden,
                              cod_empresa : cod_empresa
                            },
                            dataType: "JSON",
                            beforeSend: function(){
                            mostrarBlock();
                            },
                            success: function(result){

                                if (result.resp) {

                                      //  $('#modal_control_calidad').modal('hide');
                                        listar_cc(id_cliente,id_proyecto,id_orden);
                                        toastr.success(result.mensaje);
                                        $.unblockUI();
                                        }else{
                                          $.unblockUI();
                                        toastr.warning(result.mensaje);
                                        }

                            },
                            complete:function(result){
                              $.unblockUI();
                            },
                            error: function(request, status, err) {
    
                            toastr.error("error: " + request + status + err);
                            $.unblockUI();
                          }
                 });

});





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


function borrar_cc(id_control_calidad_det,id_orden,id_cliente,id_proyecto){

  var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/ControlCalidadDet/eliminaControlCalidadDet');?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              id_control_calidad_det : id_control_calidad_det,
              id_orden : id_orden,
              id_cliente : id_cliente,
              id_proyecto : id_proyecto
            },
    }).done(function(result) {

      if(result.resp){

        listar_cc(id_cliente,id_proyecto,id_orden);
        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);
      
      }
        

    }).fail(function() {
      console.log("error eliminar cc det");
    })
  

}



}

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

function listar_item_ordenes(orden_id, id_cliente, id_proyecto, nombre_orden ) {

formToggleActivar('btn_nueva_item_orden');
formToggleActivar('btn_carga_masivo');
formToggleActivar('btn_archivo_ejemplo');
recargaItemOrdenes(orden_id, id_cliente, id_proyecto, nombre_orden);
obtieneSelects();

}

$('#btn_archivo_ejemplo').on('click', function(){

  window.open('<?php echo base_url('assets/'.$nombreArchivoEjemploItem);?>', '_blank');

});

$('#btn_carga_masivo').on('click', function(){

  $('#modal_orden_item_masivo').modal('show'); // show bootstrap modal
  $('#formOrdenItem')[0].reset(); // reset form on modals

});






function recargaItemOrdenes(orden_id, id_cliente, id_proyecto, nombre_orden) {

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

    $('#or_item_nombre_orden').val(nombre_orden);
    $('#or_act_item_nombre_orden').val(nombre_orden);

    $('#id_orden_item_proyecto').val(id_proyecto);
    $('#id_orden_item_cliente').val(id_cliente);
    $('#or_item_purchase_order').val(orden_id);

    $('#id_orden_item_mas').val(orden_id);
    $('#id_cliente_item_mas').val(id_cliente);
    $('#id_proyecto_item_mas').val(id_proyecto);




    
    $('[data-toggle="tooltip"]').tooltip();

    $('#tbl_ordenes_items').DataTable({
        "searching": false,
        language: {
            url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js');?>'
        },
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        //"responsive": true,
        "scrollY": "600px",
        "scrollX": true,
        "scrollCollapse": true
    });


}).fail(function() {
    console.log("error listar_ordenes");
})


}

function recargaCalidadDet(id_orden,id_cliente,id_proyecto){


  var calidad_det_html ='';
  var tabla_calidad_det =  $('#tbl_control_calidad').DataTable();
  var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

  tabla_calidad_det.destroy();

$.ajax({
  url: 		'<?php echo base_url('index.php/ControlCalidadDet/obtieneControlCalidadDet'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
          id_orden : id_orden,
          id_cliente : id_cliente,
          id_proyecto : id_proyecto,
          cod_empresa : cod_empresa

        },
}).done(function(result) {

  $.each(result.datos_calidad_det,function(key, dato_calidad_det) {
    calidad_det_html += '<tr>';
    calidad_det_html += '<td>';
    calidad_det_html += '<button data-nombre="'+ dato_calidad_det.id_control_calidad_det +'" data-toggle="tooltip" data-placement="left" title="Borrar Control de Calidad" '+
    'onclick="borrar_cc('+ dato_calidad_det.id_control_calidad_det +','+ id_orden +','+id_cliente+','+id_proyecto+')" class="btn btn-outline-danger btn-sm mr-1"><i class="fas fa-trash"></i></button>';
    calidad_det_html += '</td>';
    calidad_det_html += '<td>' + id_orden+ '</td>';
    calidad_det_html += '<td>' + dato_calidad_det.id_control_calidad + '</td>';
    calidad_det_html += '<td>' + dato_calidad_det.descripcion_control_calidad + '</td>';
    calidad_det_html += '</tr>';

  });
    

    $('#datos_control_calidad').html(calidad_det_html);

    $('#tbl_control_calidad').DataTable({
      language: {
          url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js'); ?>'	
      },
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
   //   "responsive": true,
      "scrollY": "300px",
      "scrollX": true,
      "scrollCollapse": true
  });

}).fail(function() {
  console.log("error change ccdet");
})


}



function recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto){

  var ordenes_html ='';
  var tabla_ordenes =  $('#ListOrdenes').DataTable();
  var titulo_ordenes ='';
  var nombre_cliente = '';

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
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Listar Item Orden" onclick="listar_item_ordenes('+ orden.PurchaseOrderID +','+ id_cliente +','+ id_proyecto +',\''+orden.PurchaseOrderDescription+'\', this)" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-list-ol"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Orden" onclick="editar_orden('+ id_cliente +','+ id_proyecto +','+ orden.PurchaseOrderID +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Orden" onclick="eliminar_orden('+ id_cliente +','+ id_proyecto +','+ orden.PurchaseOrderID +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Agregar Control de Calidad" onclick="listar_cc('+ id_cliente +','+ id_proyecto +','+ orden.PurchaseOrderID +')" class="btn btn-outline-info btn-sm"><i class="fas fa-shield-alt"></i></button>';
    
          ordenes_html += '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderID + '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderNumber + '</td>';
        ordenes_html += '<td>' + orden.Categorizacion + '</td>';
        ordenes_html += '<td>' + orden.PurchaseOrderDescription + '</td>';
        ordenes_html += '<td>' + orden.Revision + '</td>';
        ordenes_html += '<td>' + orden.nombreCliente + '</td>';
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

        nombre_cliente = orden.nombreCliente ;

      });

      titulo_ordenes = '<i class="fas fa-clipboard-list"></i> Orden de compra Proyecto '+ nombre_proyecto;
      $('#titulo_ordenes').html(titulo_ordenes);  
      $('#datos_ordenes').html(ordenes_html);
      $('#or_nombre_proyecto').val(nombre_proyecto);
      $('#or_act_nombre_proyecto').val(nombre_proyecto);

      $('#id_proyecto_or').val(id_proyecto);
      $('#id_cliente_or').val(id_cliente);
      $('#or_nombre_cliente').val(nombre_cliente);

   


      $('#datos_ordenes').val(ordenes_html);
        $('[data-toggle="tooltip"]').tooltip();

        $('#ListOrdenes').DataTable({
            "searching": false,
            language: {
                url: '<?php echo base_url('assets/plugins/datatables/lang/esp.js'); ?>'	
            },
            "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        //  "responsive": true,
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
      $('#s_categorizacion').html(result.select_categorizacion);

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

      $('#s_act_categorizacion').html(result.formulario.select_categorizacion);

      $('#or_act_purchase_desc').val(result.formulario.purchase_desc);
      $('#or_act_revision').val(result.formulario.revision);
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

      recargaItemOrdenes( $('#id_act_order_item').val(), $('#id_act_orden_item_cliente').val(), $('#id_act_orden_item_proyecto').val(),$('#or_act_item_nombre_orden').val());
      $('#modal_edita_orden_item').modal('hide');
      toastr.success(result.mensaje);

        }else{

        toastr.error(result.mensaje);

        }


  }).fail(function() {
    console.log("error edita_proyecto");
  })

});

$('#modal_edita_orden_item').on('hidden.bs.modal', function () {
  $("#form_edit_item")[0].reset();
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

        recargaItemOrdenes(orden, cliente, proyecto, $('#or_act_item_nombre_orden').val());

        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);

      }
        

      }).fail(function() {
      console.log("error eliminar order Item");
      })


}


}


function mostrarValorTotalAct(input){

var valor_neto = 0;
var valor_total = 0;
var valor_iva  = 0;

var iva = <?php echo $this->session->userdata('valor_iva');?>;	

valor_neto = replaceAll(input.value , ".", "" );

valor_iva = ((valor_neto * iva)/100);

valor_total = parseInt(valor_neto) + parseInt(valor_neto);

$('#or_act_valor_total').val(Math.round(valor_total));

}


function mostrarValorTotalOr(input){

var valor_neto = 0;
var valor_total = 0;
var valor_iva  = 0;

var iva = <?php echo $this->session->userdata('valor_iva');?>;	

valor_neto = replaceAll(input.value , ".", "" );

valor_iva = ((valor_neto * iva)/100);

valor_total = parseInt(valor_neto) + parseInt(valor_neto);

$('#or_valor_total').val(Math.round(valor_total));

}



function mostrarValorNetoItemor(){

  var total = 0;	

  valor = document.getElementById('or_item_valor_unitario').value;
  cantidad = document.getElementById('or_item_valor_unitario').value;

  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;

  total = (parseInt(cantidad) * parseInt(valor));

  $('#or_item_valor_neto').val( +(Math.round(total + "e+2")  + "e-2"));
}



function mostrarValorNetoItemact(){

  var total = 0;	

  valor = replaceAll(document.getElementById('or_act_item_valor_unitario').value , ".", "" );
  cantidad =  replaceAll(document.getElementById('or_act_item_cantidad').value , ".", "" );

  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;

  total = (parseInt(cantidad) * parseInt(valor));

  $('#or_act_item_valor_neto').val( +(Math.round(total + "e+2")  + "e-2"));

}





</script>