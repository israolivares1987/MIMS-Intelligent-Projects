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
                                        <th>Numeración de Proyecto</th> 
                                        <th>Nombre de Proyecto</th> 
                                        <th>Lugar</th>
                                        <th>Estado Proyecto</th>
                                        <th>Bodega</th>
                                        <th>Carpa</th>
                                        <th>Patio</th>
                                        <th>Posición</th>
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
                  <th>Criticidad</th>
                  <th>ID Requerimiento</th>
                  <th>Categorizacion</th>
                  <th>Número Orden</th>
                  <th>Fecha Emisión Orden</th>
                  <th>Descripcion Orden</th>
                  <th>Revisión</th>
                  <th>Nombre Proveedor</th>
                  <th>Nombre Cliente</th>
                  <th>Comprador</th>
                  <th>Generador de Compra</th>
                  <th>Activador</th>
                  <th>Moneda</th>
                  <th>Valor Neto</th>
                  <th>Presupuesto</th>
                  <th>Codigo Presupuesto</th>
                  <th>Fecha Orden Creada</th>
                  <th>Fecha Requerida</th>
                  <th>Metodo Envio</th>
                  <th>Estado</th>
                  <th>Fecha de cierre</th>
                  <th>ID Orden</th>
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
						  <th>ID Orden</th>
						  <th>Item ID</th>
						  <th>Descripcion</th>
						  <th>Revisión</th>
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


                  <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-clipboard-list"></i>
                        Adjuntos Técnicos
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
						   <table class="table" cellspacing="0" width="99%">
							   <tbody>
								   <tr>
									   <th>
									      <button style="display: none;" id="btn_nueva_arch_tecnico" class="btn btn-outline-primary float-right mb-3">Nuevo Archivo Técnico</button>
                     </th>
								   </tr>
							   </tbody>
						   </table>
						   <table id="tbl_archivos_tecnicos" class="table table-striped table-bordered" cellspacing="0" width=100%>
                      <thead>
                        <tr>                          
                          <th>Acciones</th>
                          <th>ID Orden</th>
                          <th>ID Requerimiento</th>
                          <th>Disciplina</th>
                          <th>Instalación Definitiva</th>
                          <th>Area Proyecto</th>
                          <th>Tipo</th>
                          <th>Inspección Requerida</th>
                          <th>Nivel Inspeccion</th>
                          <th>Documentos Antes Iniciar</th>	
                          <th>Alcance Técnico Trabajo</th>	
                          <th>Instrucción Requirente</th>	
                        </tr>
                     </thead>
                      <tbody id="datos_archivos_tecnicos">
                      </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                  </div>

   </div>



   <div class="modal fade" id="modal_nuevo_proyecto">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">Nuevo Proyecto</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="formproyectonuevo" class="form-horizontal">
                     <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">
                                      <div class="col-md-6">
                                      <input type="hidden" type="text" name="var_cliente" id="var_cliente">
                                                        
                                                                <div class="form-group"><label for="var_nombre_cliente">CLIENTE</label><input type="text" id="var_nombre_cliente" class="form-control" value="" name="var_nombre_cliente" readonly></div>
                                                                <div class="form-group"><label for="var_nombre_proyecto">NOMBRE PROYECTO</label><input type="text" id="var_nombre_proyecto" class="form-control" value="" name="var_nombre_proyecto"></div>
                                                                <div class="form-group"><label for="var_descripcion_proyecto">DESCRIPCIÓN PROYECTO</label><input type="text" id="var_descripcion_proyecto" class="form-control" name="var_descripcion_proyecto" value=""></div>
                                                                <div class="form-group"><label for="var_lugar_proyecto">LUGAR</label><input type="text" id="var_lugar_proyecto" class="form-control" name="var_lugar_proyecto" value=""></div>
                                                        
                                                        </div>

                                                        <div class="col-md-6">
                                                                
                                                                <div class="form-group"><label for="id bodega">BODEGA</label><input type="text" id="var_id_bodega" class="form-control" name="var_id_bodega" value=""></div>
                                                                <div class="form-group"><label for="id carpa">CARPA</label><input type="text" id="var_id_carpa" class="form-control" name="var_id_carpa" value=""></div>
                                                                <div class="form-group"><label for="id patio">PATIO</label><input type="text" id="var_id_patio" class="form-control" name="var_id_patio" value=""></div>
                                                                <div class="form-group"><label for="id posicion">POSICIÓN</label><input type="text" id="var_id_posicion" class="form-control" name="var_id_posicion" value=""></div>
                                                                
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
                    <button id="btn-guardar" type="button" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>                 


 <div class="modal fade" id="modal_edita_proyecto">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">Edita Proyecto</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="formproyectoactualizar" class="form-horizontal">
                     <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">
                                      <div class="col-md-6">
                                      <input type="hidden" name="act_id_proyecto" id="act_id_proyecto">
                                      <input type="hidden" name="act_id_cliente" id="act_id_cliente">
                                                        
                                                                <div class="form-group"><label for="act_nombre_cliente">CLIENTE</label><input type="text" id="act_nombre_cliente" class="form-control" value="" name="act_nombre_cliente" readonly></div>
                                                                <div class="form-group"><label for="act_nombre_proyecto">NOMBRE PROYECTO</label><input type="text" id="act_nombre_proyecto" class="form-control" value="" name="act_nombre_proyecto"></div>
                                                                <div class="form-group"><label for="act_descripcion_proyecto">DESCRIPCIÓN PROYECTO</label><input type="text" id="act_descripcion_proyecto" class="form-control" name="act_descripcion_proyecto" value=""></div>
                                                                <div class="form-group"><label for="act_lugar_proyecto">LUGAR</label><input type="text" id="act_lugar_proyecto" class="form-control" name="act_lugar_proyecto" value=""></div>
                                                                <div class="form-group"><label for="act_lugar_proyecto">ESTADO PROYECTO</label><div id="s_estado"></div></div>
                                                        </div>

                                                        <div class="col-md-6">
                                                                
                                                                <div class="form-group"><label for="id bodega">BODEGA</label><input type="text" id="act_id_bodega" class="form-control" name="act_id_bodega" value=""></div>
                                                                <div class="form-group"><label for="id carpa">CARPA</label><input type="text" id="act_id_carpa" class="form-control" name="act_id_carpa" value=""></div>
                                                                <div class="form-group"><label for="id patio">PATIO</label><input type="text" id="act_id_patio" class="form-control" name="act_id_patio" value=""></div>
                                                                <div class="form-group"><label for="id posicion">POSICIÓN</label><input type="text" id="act_id_posicion" class="form-control" name="act_id_posicion" value=""></div>
                                                                
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
                    <button id="btn-actualizar-proy" type="button" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>                 

  <!--.modal nuevo orden-->
 <div class="modal fade" id="modal_new_orden">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">NUEVA ORDEN</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="form_orden" class="form-horizontal">
                <input type="hidden" id="id_proyecto_or" name="id_proyecto_or" value=""> 
				       	<input type="hidden" id="id_cliente_or" name="id_cliente_or" value="">

                     <section class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">ORDEN DE COMPRA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-6">
                                                           
                                                            <div class="form-group"><label for="NOMBRE PROYECTO">NOMBRE PROYECTO</label><input type="text" id="or_nombre_proyecto" class="form-control" name="or_nombre_proyecto" readonly></div>
                                                            <div class="form-group"><label for="NOMBRE CLIENTE">NOMBRE CLIENTE</label><input type="text" id="or_nombre_cliente" class="form-control" name="or_nombre_cliente" readonly></div>
                                                            <div class="form-group"><label for="NÚMERO ORDEN DE COMPRA">NÚMERO ORDEN DE COMPRA</label><input type="text" id="or_purchase_order" class="form-control" name="or_purchase_order"></div>
                                                            <div class="form-group"><label for="SELECCIONE CRITICIDAD">SELECCIONE CRITICIDAD</label><div id="s_criticidad"></div></div>
                                                            <div class="form-group"><label for="NÚMERO ORDEN DE COMPRA">ID REQUERIMIENTO</label><input type="text" id="or_idrequerimiento" class="form-control" name="or_idrequerimiento"></div>
                                                            <div class="form-group"><label for="SELECCIONE CRITICIDAD">SELECCIONE CATEGORIZACION</label><div id="s_categorizacion"></div></div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="DESCRIPCIÓN ORDEN DE COMPRA">DESCRIPCIÓN ORDEN DE COMPRA</label><input type="text" id="or_purchase_desc" class="form-control" name="or_purchase_desc"></div>
                                                            <div class="form-group"><label for="REVISIÓN">REVISIÓN</label><input type="text" id="or_revision" class="form-control" name="or_revision"></div>
                                                            <div class="form-group"><label for="PROVEEDOR">PROVEEDOR</label><input type="text" id="or_supplier" class="form-control" name="or_supplier"></div>
                                                            <div class="form-group"><label for="COMPRADOR">COMPRADOR</label><input type="text" id="or_comprador" class="form-control" name="or_comprador"></div>
                                                            <div class="form-group"><label for="SELECCIONE ACTIVADOR">SELECCIONE ACTIVADOR</label><div id="s_employee"></div></div>
                                                            <div class="form-group"><label for="SELECCIONE MODENA">SELECCIONE MODENA</label><div id="s_currency"></div></div>
                                                            <div class="form-group"><label for="INGENIERO REQUESTOR">INGENIERO REQUESTOR</label><input type="text" id="or_requestor" class="form-control" name="or_requestor"></div>
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
                                            <h3 class="card-title">VALORES ORDEN DE COMPRA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-6">
                                                           
                                                            <div class="form-group"><label for="VALOR NETO">VALOR NETO</label> <input id="or_valor_neto" name="or_valor_neto" type="text" class="form-control" onkeyup="formatoNumero(this)"></div>
                                                            <div class="form-group"><label for="PRESUPUESTO">PRESUPUESTO</label><input id="or_budget" name="or_budget" type="text" class="form-control" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)"></div>
                                                            <div class="form-group"><label for="CODIGO PRESUPUESTO"> CÓDIGO PRESUPUESTO</label><input id="or_costcodebudget" name="or_costcodebudget" class="form-control" ></div>
                                                            <div class="form-group"><label for="FECHA EMISION ORDEN DE COMPRA">FECHA DE EMISION ORDEN DE COMPRA</label> <input name="or_order_date" type="text" class="form-control fechapicker" id="or_order_date"></div>
                                                            
                                                        </div>

                                                        <div class="col-md-6">
                                                            
                                                        <div class="form-group"><label for="FECHA REQUERIDA">FECHA REQUERIDA</label> <input name="or_date_required" type="text" class="form-control fechapicker" id="or_date_required"></div>
                                                            <div class="form-group"><label for="FECHA CIERRE ORDEN DE COMPRA">FECHA CIERRE ORDEN DE COMPRA</label> <input name="or_ship_date" type="text" class="form-control fechapicker" id="or_ship_date"></div>
                                                            <div class="form-group"><label for="SELECCIONE METODO DE ENVIO">SELECCIONE MÉTODO ENVIO</label><div id="s_shipping"></div></div>
                                                            <div class="form-group"><label for="SELECCIONE ESTADO ORDEN">SELECCIONE ESTADO ORDEN</label><div id="s_status"></div></div>
                                                            <div class="form-group"><label for="ARCHIVO RESPALDO">ARCHIVO RESPALDO</label><input id="or_support" name="or_support" type="file" class="form-control form-control-file"></div>
                                                            
                                                            
                                                            
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
                    <button id="btn_orden" type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>




  <!--.modal nuevo orden-->
  <div class="modal fade" id="modal_edit_orden">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">ACTUALIZAR ORDEN</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="form_orden_act" class="form-horizontal">

             	 <input type="hidden" id="id_act_order" name="id_act_order" value="">
					     <input type="hidden" id="id_act_proyecto" name="id_act_proyecto" value=""> 
					     <input type="hidden" id="id_act_cliente" name="id_act_cliente" value="">

                     <section class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">ORDEN DE COMPRA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-6">
                                                           
                                                            <div class="form-group"><label for="NOMBRE PROYECTO">NOMBRE PROYECTO</label><input type="text" id="or_act_nombre_proyecto" class="form-control" name="or_act_nombre_proyecto" readonly></div>
                                                            <div class="form-group"><label for="NOMBRE CLIENTE">NOMBRE CLIENTE</label><input type="text" id="or_act_nombre_cliente" class="form-control" name="or_act_nombre_cliente" readonly></div>
                                                            <div class="form-group"><label for="NÚMERO ORDEN DE COMPRA">NÚMERO ORDEN DE COMPRA</label><input type="text" id="or_act_purchase_order" class="form-control" name="or_act_purchase_order"></div>
                                                            <div class="form-group"><label for="SELECCIONE CRITICIDAD">SELECCIONE CRITICIDAD</label><div id="s_act_criticidad"></div></div>
                                                            <div class="form-group"><label for="NÚMERO ORDEN DE COMPRA">ID REQUERIMIENTO</label><input type="text" id="or_act_idrequerimiento" class="form-control" name="or_act__idrequerimiento"></div>
                                                            <div class="form-group"><label for="SELECCIONE CRITICIDAD">SELECCIONE CATEGORIZACION</label><div id="s_act_categorizacion"></div></div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="DESCRIPCIÓN ORDEN DE COMPRA">DESCRIPCIÓN ORDEN DE COMPRA</label><input type="text" id="or_act_purchase_desc" class="form-control" name="or_act_purchase_desc"></div>
                                                            <div class="form-group"><label for="REVISIÓN">REVISIÓN</label><input type="text" id="or_act_revision" class="form-control" name="or_act_revision"></div>
                                                            <div class="form-group"><label for="PROVEEDOR">PROVEEDOR</label><input type="text" id="or_act_supplier" class="form-control" name="or_act_supplier"></div>
                                                            <div class="form-group"><label for="COMPRADOR">COMPRADOR</label><input type="text" id="or_act_comprador" class="form-control" name="or_act_comprador"></div>
                                                            <div class="form-group"><label for="SELECCIONE ACTIVADOR">SELECCIONE ACTIVADOR</label><div id="s_act_employee"></div></div>
                                                            <div class="form-group"><label for="SELECCIONE MODENA">SELECCIONE MODENA</label><div id="s_act_currency"></div></div>
                                                            <div class="form-group"><label for="INGENIERO REQUESTOR">INGENIERO REQUESTOR</label><input type="text" id="or_act_requestor" class="form-control" name="or_act_requestor"></div>
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
                                            <h3 class="card-title">VALORES ORDEN DE COMPRA</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-6">
                                                           
                                                            <div class="form-group"><label for="VALOR NETO">VALOR NETO</label> <input id="or_act_valor_neto" name="or_act_valor_neto" type="text" class="form-control" onkeyup="formatoNumero(this)" onchange="mostrarValorTotalOr(this)"></div>
                                                            <div class="form-group"><label for="PRESUPUESTO">PRESUPUESTO</label><input id="or_act_budget" name="or_act_budget" type="text" class="form-control" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)"></div>
                                                            <div class="form-group"><label for="CODIGO PRESUPUESTO"> CÓDIGO PRESUPUESTO</label><input id="or_act_costcodebudget" name="or_act_costcodebudget" class="form-control" ></div>
                                                            <div class="form-group"><label for="FECHA EMISION ORDEN DE COMPRA">FECHA DE EMISION ORDEN DE COMPRA</label> <input name="or_act_order_date" type="text" class="form-control fechapicker" id="or_act_order_date"></div>
                                                            
                                                        </div>

                                                        <div class="col-md-6">
                                                            
                                                        <div class="form-group"><label for="FECHA REQUERIDA">FECHA REQUERIDA</label> <input name="or_act_date_required" type="text" class="form-control fechapicker" id="or_act_date_required"></div>
                                                            <div class="form-group"><label for="FECHA CIERRE ORDEN DE COMPRA">FECHA CIERRE ORDEN DE COMPRA</label> <input name="or_act_ship_date" type="text" class="form-control fechapicker"  id="or_act_ship_date"></div>
                                                            <div class="form-group"><label for="SELECCIONE METODO DE ENVIO">SELECCIONE MÉTODO ENVIO</label><div id="s_act_shipping"></div></div>
                                                            <div class="form-group"><label for="SELECCIONE ESTADO ORDEN">SELECCIONE ESTADO ORDEN</label><div id="s_act_status"></div></div>
                                                            <div class="form-group"><label for="ARCHIVO RESPALDO">ARCHIVO RESPALDO</label><input id="or_act_support" name="or_act_support" type="file" class="form-control form-control-file"></div>
                                                            
                                                            
                                                            
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
                    <button id="btn_act_orden" type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
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
                              <input id="or_item_purchase_order" name="or_item_purchase_order" value="" type="text" class="form-control form-control-sm" readonly>
                            </div>
                 </div>

                  </div>

                  <div class="col-12 col-sm-6">
                <div class="form-group">
                <label class="col-sm-12 control-label">Descripcion Orden de Compra</label>
                            <div class="col-sm-12">
                              <input id="or_item_nombre_orden" name="or_item_nombre_orden" type="text" value="" class="form-control form-control-sm" readonly>
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
                               <input id="or_item_cantidad" name="or_item_cantidad" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="mostrarValorNetoItemor()">
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
                               <input id="or_item_valor_unitario" name="or_item_valor_unitario" type="text" class="form-control form-control-sm" onkeyup="formatoNumero(this)" onchange="mostrarValorNetoItemor()">
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



 <!--.modal nueva archivo tecnico-->
 <div id="modal_act_adjunto_tecnico" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar Registro Adjunto Técnico</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="form_act_arch_tecnico">
                  <div class="card-body">
                     <div class="row">

                            <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Disciplina</label>
                                        <div class="col-sm-12">
                                          <div id="s_act_disciplina"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>

                              

                                <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Instalacion Definitiva</label>
                                        <div class="col-sm-12">
                                          <div id="s_act_instalacion_definitiva"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>



                              <div class="col-12 col-sm-12">
                                <div class="form-group">
                                        <label class="col-sm-12 control-label">Area Proyecto</label>
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                  <i class="fas fa-pen"></i>
                                                  </span>
                                                </div>
                                          <input  id="or_act_area_proyecto" name="or_act_area_proyecto" type="text" class="form-control form-control-sm">
                                        </div>
                                </div>
                                </div>

                          <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Tipo</label>
                                        <div class="col-sm-12">
                                           <div id="s_act_tipo_pm"></div>
                                         </div><!--.col-sm-12-->
                                      </div>
                          </div>

                      

                          


                          <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Inspeccion Requerida</label>
                                        <div class="col-sm-12">
                                          <div id="s_act_inspeccion_requerida"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>


                          <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Nivel Inspeccion</label>
                                        <div class="col-sm-12">
                                          <div id="s_act_nivel_inspeccion"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>

                         
                              
                                <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Documentos Antes Iniciar</label>
                                        <div class="col-sm-12">
                                          <div id="s_act_documentos_antes_iniciar"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>


                          <div class="col-12 col-sm-12">
                                <div class="form-group">
                                        <label class="col-sm-12 control-label">Alcance Técnico Trabajo</label>
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                  <i class="fas fa-pen"></i>
                                                  </span>
                                                </div>
                                          <input  id="or_act_alcance_tecnico_trabajo" name="or_act_alcance_tecnico_trabajo" type="text" class="form-control form-control-sm">
                                        </div>
                                </div>
                                </div>


                                <div class="col-12 col-sm-12">
                                <div class="form-group">
                                        <label class="col-sm-12 control-label">Instruccion Requirente</label>
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                  <i class="fas fa-pen"></i>
                                                  </span>
                                                </div>
                                          <input  id="or_act_instruccion_requirente" name="or_act_instruccion_requirente" type="text" class="form-control form-control-sm">
                                        </div>
                                </div>
                                </div>

                                <input  id="or_act_id_orden_arch_tecnico" name="or_act_id_orden_arch_tecnico" value=""  type="hidden" class="form-control form-control-sm">
                                <input  id="or_act_cod_empresa_arch_tecnico" name="or_act_cod_empresa_arch_tecnico" value="" type="hidden" class="form-control form-control-sm">
                                <input  id="or_act_id_arch_tecnico" name="or_act_id_arch_tecnico" value="" type="hidden" class="form-control form-control-sm">
                                <input  id="or_act_id_requerimiento" name="or_act_id_requerimiento" type="hidden" value="" class="form-control form-control-sm">
                     </div>
                  
          <!-- /.card-body -->
          <div class="modal-footer justify-content-between">
              <button id="btn_act_arch_tecnico" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          </div>
   
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
        </div>
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
<!--. fin modal nueva archivo tecnico-->

 <!--.modal nueva archivo tecnico-->
 <div id="modal_adjunto_tecnico" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Registro Adjunto Técnico</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="form_arch_tecnico">
                  <div class="card-body">
                     <div class="row">

                        <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Disciplina</label>
                                        <div class="col-sm-12">
                                          <div id="s_disciplina"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>

                              

                                <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Instalacion Definitiva</label>
                                        <div class="col-sm-12">
                                          <div id="s_instalacion_definitiva"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>



                              <div class="col-12 col-sm-12">
                                <div class="form-group">
                                        <label class="col-sm-12 control-label">Area Proyecto</label>
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                  <i class="fas fa-pen"></i>
                                                  </span>
                                                </div>
                                          <input  id="or_area_proyecto" name="or_area_proyecto" type="text" class="form-control form-control-sm">
                                        </div>
                                </div>
                                </div>

                          <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Tipo</label>
                                        <div class="col-sm-12">
                                           <div id="s_tipo_pm"></div>
                                         </div><!--.col-sm-12-->
                                      </div>
                          </div>

                      

                          


                          <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Inspeccion Requerida</label>
                                        <div class="col-sm-12">
                                          <div id="s_inspeccion_requerida"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>


                          <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Nivel Inspeccion</label>
                                        <div class="col-sm-12">
                                          <div id="s_nivel_inspeccion"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>

                         
                              
                                <div class="col-12 col-sm-12">
                              <div class="form-group">
                                        <label class="col-sm-12 control-label">Documentos Antes Iniciar</label>
                                        <div class="col-sm-12">
                                          <div id="s_documentos_antes_iniciar"></div>
                                        </div><!--.col-sm-12-->
                                      </div>
                              </div>


                          <div class="col-12 col-sm-12">
                                <div class="form-group">
                                        <label class="col-sm-12 control-label">Alcance Técnico Trabajo</label>
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                  <i class="fas fa-pen"></i>
                                                  </span>
                                                </div>
                                          <input  id="or_alcance_tecnico_trabajo" name="or_alcance_tecnico_trabajo" type="text" class="form-control form-control-sm">
                                        </div>
                                </div>
                                </div>


                                <div class="col-12 col-sm-12">
                                <div class="form-group">
                                        <label class="col-sm-12 control-label">Instruccion Requirente</label>
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                  <i class="fas fa-pen"></i>
                                                  </span>
                                                </div>
                                          <input  id="or_instruccion_requirente" name="or_instruccion_requirente" type="text" class="form-control form-control-sm">
                                        </div>
                                </div>
                                </div>

                                <input  id="or_id_orden_arch_tecnico" name="or_id_orden_arch_tecnico" value=""  type="hidden" class="form-control form-control-sm">
                                <input  id="or_cod_empresa_arch_tecnico" name="or_cod_empresa_arch_tecnico" value="" type="hidden" class="form-control form-control-sm">
                                <input  id="or_id_requerimiento" name="or_id_requerimiento" type="hidden" value="" class="form-control form-control-sm">
                     </div>
                  
          <!-- /.card-body -->
          <div class="modal-footer justify-content-between">
              <button id="btn_arch_tecnico" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          </div>
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
         
          </div><!--.modal-content-->
        </div><!--.modal-dialog-->
      </div><!--.modal-->
<!--. fin modal nueva archivo tecnico-->




  <!--.modal modal_archivos_tecnicos-->
  <div id="modal_archivos_tecnicos" class="modal fade" tabindex="-1" role="dialog">
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
                                <form action="#" id="formsArchivoTecnico" class="form-horizontal">
                                        <input name="id_archivo_tecnico" placeholder="" class="form-control" type="hidden" id="id_archivo_tecnico" value="">
                                        <input name="id_orden_archivo_tecnico" placeholder="" class="form-control" type="hidden" id="id_orden_archivo_tecnico" value="">
                                        <input name="cod_empresa_archivo_tecnico" placeholder="" class="form-control" type="hidden" id="cod_empresa_archivo_tecnico" value="">
                                        <input name="tipo_archivo_tecnico" placeholder="" class="form-control" type="hidden" id="tipo_archivo_tecnico" value="">


                                                            <div class="form-group">
                                                                <label for="exampleInputFile">Cargar Archivo</label>
                                                                    <div class="custom-file">
                                                                        <input type="file"   id="fileArchivoTecnico"  name="fileArchivoTecnico" >     
                                                                </div>
                                                            </div>
                                </form>
                                </div>

                                

                                <!-- /.card-body -->
                          <div class="modal-footer justify-content-between">
                              <button id="btn_subir_arch_tecnico" type="button" class="btn btn-outline-primary">Guardar</button>
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                              
                            </div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">
                                      <i class="fas fa-clipboard-list"></i>
                                        Archivos Tecnicos
                                      </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                            <table id="tbl_archivos_tecnicos_subidos" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                <thead>
                                                    <tr>
                                                        <th>Acciones</th>
                                                        <th>ID Orden</th>
                                                        <th>ID Archivo Técnico</th>
                                                        <th>Nombre Archivo</th>
                                                        <th>Descarga Archivo</th>
                                                       </tr>
                                                </thead>
                                                <tbody id="datos_archivos_tecnicos_subidos">
                                                </tbody>
                                            </table>
                                      </div>

                                    <!-- /.card-body -->
                            </div>
                          
                            <!-- Image loader -->     
                     </div>
                 </div>
             </div>

      <script>
             $(function() {
                 

             



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
    recargaItemOrdenes(0, 0, 0,'');
   // recargaCalidadDet(0, 0, 0);
    recargaArchivoTecnico(0,0);



    

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
  recargaArchivoTecnico(0,0);



}

function listar_archivos_adjuntos(cod_empresa,id_orden){  
  
  recargaArchivoTecnico(cod_empresa,id_orden);
  formToggleActivar('btn_nueva_arch_tecnico');

}


$('#select_clientes').on('change', function(){

    var cliente = this.value;
    formToggleActivar('btn_nuevo_proyecto');

    if(cliente > 0){

      recargaOrdenes(0,0,'');
      recargaItemOrdenes(0, 0, 0,'');
      recargaProyectos(cliente);
      obtieneSelects();

      


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
 


    $('#or_item_revision').val("");
    $('#or_item_cantidad').val("");
    $('#or_item_valor_neto').val("");
    $('#or_item_valor_unitario').val("");
    $('#or_item_id_item').val("");
    $('#or_item_descripcion').val("");
    $('#or_revision').val("");
  
   $('#modal_nuevo_orden_item').modal('show');
   
 
});

$('#btn_nueva_arch_tecnico').on('click', function(){
 
$('#form_arch_tecnico')[0].reset(); // reset form on modals 
 $('#modal_adjunto_tecnico').modal('show');

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


});







$('#btn-guardar').on('click', function(){

  data = new FormData(document.getElementById("formproyectonuevo"));

  $.ajax({
    url: 		'<?php echo base_url('index.php/Proyectos/guardarProyecto'); ?>',
    type: 		'POST',
    data: data,
    contentType: false,
    processData: false,
    dataType: "JSON",
  }).done(function(result) {

    if(result.resp){
      recargaProyectos(data.get("var_cliente"));
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
          proyectos_html += '<button data-toggle="tooltip" data-placement="left" title="Listar ordenes" onclick="listar_ordenes('+ proyecto.NumeroProyecto +','+ cliente +',\''+proyecto.NombreProyecto+'\', this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
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
        proyectos_html += '<td>' + proyecto.id_bodega + '</td>';
        proyectos_html += '<td>' + proyecto.id_carpa + '</td>';
        proyectos_html += '<td>' + proyecto.id_patio + '</td>';
        proyectos_html += '<td>' + proyecto.id_posicion + '</td>';
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
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
          "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
        ],
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
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'MOSTRAR REGISTROS'
                                    }
                            ]
                        }).buttons().container().appendTo('#tbl_proyectos_wrapper .col-md-6:eq(0)');

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
    $('#act_id_bodega').val(result.id_bodega);
    $('#act_id_carpa').val(result.id_carpa);
    $('#act_id_patio').val(result.id_patio);
    $('#act_id_posicion').val(result.id_posicion);
    $('#s_estado').empty();
    $('#s_estado').html(result.select_estado);
    $('#act_id_proyecto').val(id_proyecto);
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

  data = new FormData(document.getElementById("formproyectoactualizar"));

  $.ajax({
    url: 		'<?php echo base_url('index.php/Proyectos/actualizaProyecto'); ?>',
    type: 		'POST',
    data: data,
    contentType: false,
    processData: false,
    dataType: "JSON",
  }).done(function(result) {

    if(result.resp){

      recargaProyectos(data.get("act_id_cliente"));
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
var titulo_ordenes ='';

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
        
        titulo_ordenes =  '<a href="#" class="nav-link"> DETALLE ORDEN: '+ orden_item.PurchaseOrderNumber + ' - '+orden_item.PurchaseOrderDescription +'</a>';
                                            
    });


    $('#titulo_datoordenes').html(titulo_ordenes);  




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
      language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
          "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
        ],
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
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'MOSTRAR REGISTROS'
                                    }
                            ]
                        }).buttons().container().appendTo('#tbl_ordenes_items_wrapper .col-md-6:eq(0)');


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
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
          "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
        ],
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
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'MOSTRAR REGISTROS'
                                    }
                            ]
                        }).buttons().container().appendTo('#tbl_control_calidad_wrapper .col-md-6:eq(0)');

}).fail(function() {
  console.log("error change ccdet");
})


}



function recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto){

  var ordenes_html ='';
  var tabla_ordenes =  $('#ListOrdenes').DataTable();
  var titulo_ordenes ='';
  var nombre_cliente = '';
  var id_requerimiento  = '';
  var titulo_proyecto = '';
  var cod_empresa = <?php echo $this->session->userdata('cod_emp');?>;

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
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Ver WPanel" onclick="ver_bucksheet(' + orden.PurchaseOrderID + ', '+id_cliente +', '+id_proyecto + ')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>'
          ordenes_html += '<button data-toggle="tooltip" data-placement="left" title="Ver Archivos Tecnicos" onclick="listar_archivos_adjuntos(' +cod_empresa + ', '+ orden.PurchaseOrderID +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>'
          ordenes_html += '</td>';
          if( orden.Criticidad ==='BAJA'){
                 ordenes_html  += '<td><span class="bg-green">'+  orden.Criticidad +'</span></td>';    
            }else if(orden.Criticidad ==='ALTA'){
                 ordenes_html  += '<td><span class="bg-red">'+  orden.Criticidad +'</span></td>';
            }else{
                 ordenes_html  += '<td><span class="bg-yellow">'+  orden.Criticidad +'</span></td>';
            }
           ordenes_html += '<td>' + orden.idRequerimiento  + '</td>';
           ordenes_html += '<td>' + orden.Categorizacion + '</td>';
           ordenes_html += '<td>' + orden.PurchaseOrderNumber + '</td>';
           ordenes_html += '<td>' + orden.OrderDate  + '</td>';
           ordenes_html += '<td>' + orden.PurchaseOrderDescription + '</td>';
           ordenes_html += '<td>' + orden.Revision + '</td>';
           ordenes_html += '<td>' + orden.SupplierName + '</td>';
           ordenes_html += '<td>' + orden.nombreCliente + '</td>';
           ordenes_html += '<td>' + orden.Comprador + '</td>';
           ordenes_html += '<td>' + orden.Requestor+ '</td>';
           ordenes_html += '<td>' + orden.ExpediterID + '</td>';
           ordenes_html += '<td>' + orden.Currency  + '</td>';
           ordenes_html += '<td>' + orden.ValorNeto  + '</td>';
           ordenes_html += '<td>' + orden.Budget  + '</td>';
           ordenes_html += '<td>' + orden.CostCodeBudget  + '</td>';
           ordenes_html += '<td>' + orden.DateCreated  + '</td>';
           ordenes_html += '<td>' + orden.DateRequired  + '</td>';
           ordenes_html += '<td>' + orden.ShippingMethodID  + '</td>';
           ordenes_html += '<td>' + orden.POStatus  + '</td>';
           ordenes_html += '<td>' + orden.ShipDate  + '</td>';
           ordenes_html += '<td>' + orden.PurchaseOrderID + '</td>';
           ordenes_html += '<td>' + orden.Support  + '</td>';
        ordenes_html += '</tr>';

        nombre_cliente = orden.nombreCliente ;

        id_requerimiento = orden.idRequerimiento ;

            
        titulo_proyecto = '<a href="#" class="nav-link"> DETALLE PROYECTO: '+ orden.NombreProyecto + ' - '+orden.DescripcionProyecto +'</a>';

      }); 


      $('#titulo_proyecto').html(titulo_proyecto);  

      titulo_ordenes = '<i class="fas fa-clipboard-list"></i> Orden de compra Proyecto '+ nombre_proyecto;
      $('#titulo_ordenes').html(titulo_ordenes);  
      $('#datos_ordenes').html(ordenes_html);
      $('#or_nombre_proyecto').val(nombre_proyecto);
      $('#or_act_nombre_proyecto').val(nombre_proyecto);

      $('#or_id_requerimiento').val(id_requerimiento);
      $('#or_act_id_requerimiento').val(id_requerimiento);
      

      $('#id_proyecto_or').val(id_proyecto);
      $('#id_cliente_or').val(id_cliente);
      $('#or_nombre_cliente').val(nombre_cliente);

   


      $('#datos_ordenes').val(ordenes_html);
        $('[data-toggle="tooltip"]').tooltip();

        $('#ListOrdenes').DataTable({
          language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
          "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
        ],
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
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'MOSTRAR REGISTROS'
                                    }
                            ]
                        }).buttons().container().appendTo('#ListOrdenes_wrapper .col-md-6:eq(0)');


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

      $('#s_criticidad').html(result.select_criticidad);
      $('#s_employee').html(result.select_employee);
      $('#s_currency').html(result.select_currency);
      $('#s_shipping').html(result.select_shipping);
      $('#s_status').html(result.select_status);
      $('#s_categorizacion').html(result.select_categorizacion);

      $('#s_item_unidad').html(result.select_item_unidad);
      $('#s_item_status').html(result.select_item_status);


      $('#s_disciplina').html(result.select_disciplina);
      $('#s_tipo_pm').html(result.select_tipo_pm);

      
      $('#s_instalacion_definitiva').html(result.select_instalacion_definitiva);
      $('#s_inspeccion_requerida').html(result.select_inspeccion_requerida);
      $('#s_documentos_antes_iniciar').html(result.select_documentos_antes_iniciar);
      $('#s_nivel_inspeccion').html(result.select_nivel_inspeccion);



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

      $('#or_act_idrequerimiento').val(result.formulario.id_requerimiento);

      $('#s_act_categorizacion').html(result.formulario.select_categorizacion);

      $('#or_act_purchase_desc').val(result.formulario.purchase_desc);
      $('#or_act_revision').val(result.formulario.revision);

      $('#or_act_comprador').val(result.formulario.comprador);
      $('#or_act_supplier').val(result.formulario.supplier);
      $('#s_act_employee').html(result.formulario.select_employee);

      $('#s_act_currency').html(result.formulario.select_currency);
      $('#s_act_criticidad').html(result.formulario.select_criticidad);
      $('#or_act_requestor').val(result.formulario.requestor);


      
      $('#or_act_valor_neto').val(result.formulario.valor_neto);
      $('#or_act_budget').val(result.formulario.budget);
      $('#or_act_costcodebudget').val(result.formulario.costcodebudget);
      $('#or_act_order_date').val(result.formulario.order_date);
      $('#or_act_date_required').val(result.formulario.date_required);
      $('#or_act_date_promised').val(result.formulario.date_promised);
      $('#or_act_ship_date').val(result.formulario.ship_date);
      $('#s_act_shipping').html(result.formulario.select_shipping);
      $('#s_act_status').html(result.formulario.select_status);
      $('#or_act_nombre_proyecto').val(result.formulario.nombre_proyecto);

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


function mostrarValorNetoItemor(){

  var total = 0;	

  valor = replaceAll(document.getElementById('or_item_valor_unitario').value , ".", "" );
  cantidad = replaceAll(document.getElementById('or_item_cantidad').value , ".", "" );

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

function ver_bucksheet(idOrden, cliente, codigo_proyecto) {
        window.open('<?php echo site_url('BuckSheet/listaBucksheet')?>/'+ idOrden + '/'+cliente+'/'+codigo_proyecto,'_blank');
    }





function recargaArchivoTecnico(cod_empresa,id_orden){


  var archivo_tecnico_html = '';
var tabla_archivo_tecnico = $('#tbl_archivos_tecnicos').DataTable();


tabla_archivo_tecnico.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/AdjuntoTecnico/listasAdjuntoTecnico');?>',
    type: 'POST',
    dataType: 'json',
    data: {
      cod_empresa: cod_empresa,
      id_orden: id_orden
    },
}).done(function(result) {

    console.log(result);
    
   
    $.each(result.adjuntotecnicos, function(key, adjuntotecnico) {
      archivo_tecnico_html += '<tr>';
      archivo_tecnico_html += '<td>';
      archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Editar Archivo Técnico " onclick="edita_archivo_tecnico('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
      archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Archivo Técnico" onclick="eliminar_archivo_tecnico('+ cod_empresa +','+ id_orden +','+ adjuntotecnico.id +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
      archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Agrega Archivo Técnico " onclick="abre_archivo_tecnico('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>';
      archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Agrega Archivo de Compra " onclick="abre_archivo_tecnico_ep('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>';
      archivo_tecnico_html += '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.id_orden + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.id_requerimiento + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.disciplina + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.instalacion_definitiva + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.area_proyecto + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.tipo_pm + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.inspeccion_requerida + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.nivel_inspeccion + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.documentos_antes_iniciar + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.alcance_tecnico_trabajo + '</td>';
      archivo_tecnico_html += '<td>' + adjuntotecnico.instruccion_requirente + '</td>';
      archivo_tecnico_html += '</tr>';


    });

    $('#datos_archivos_tecnicos').html(archivo_tecnico_html);

    $('#or_id_orden_arch_tecnico').val(id_orden);
    $('#or_cod_empresa_arch_tecnico').val(cod_empresa);
    
    $('[data-toggle="tooltip"]').tooltip();

    $('#tbl_archivos_tecnicos').DataTable({
      language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
          "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
        ],
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
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'MOSTRAR REGISTROS'
                                    }
                            ]
                        }).buttons().container().appendTo('#tbl_archivos_tecnicos_wrapper .col-md-6:eq(0)');

}).fail(function() {
    console.log("error tbl_archivos_tecnicos");
})



}





$('#btn_arch_tecnico').on('click', function(){


  var formData = new FormData(document.getElementById("form_arch_tecnico"));


  $.ajax({
    url: 		'<?php echo base_url('index.php/AdjuntoTecnico/agregarAdjuntoTecnico'); ?>',
    type: 		'POST',
    dataType: 'json',
    contentType: 	false,
    cache: 			false,
    processData: 	false,
    data: formData
  }).done(function(result) {


    if(result.resp){

      recargaArchivoTecnico($('#or_cod_empresa_arch_tecnico').val(),$('#or_id_orden_arch_tecnico').val());
      $('#modal_adjunto_tecnico').modal('hide');
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



function edita_archivo_tecnico(id,cod_empresa, id_orden){

$.ajax({
  url: 		'<?php echo base_url('index.php/AdjuntoTecnico/listaAdjuntoTecnico'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
    cod_empresa: cod_empresa,
    id_orden: id_orden,
    id: id
        },


}).done(function(result) {

  $("#form_act_arch_tecnico")[0].reset();
  
      
  $('#or_act_id_arch_tecnico').val(result.id);                             
  $('#or_act_cod_empresa_arch_tecnico').val(result.cod_empresa);
  $('#or_act_id_orden_arch_tecnico').val(result.id_orden);
  $('#or_act_id_requerimiento').val(result.id_requerimiento);
  $('#or_act_area_proyecto').val(result.area_proyecto);
  $('#or_act_alcance_tecnico_trabajo').val(result.alcance_tecnico_trabajo);
  $('#or_act_instruccion_requirente').val(result.instruccion_requirente);


  $('#s_act_disciplina').html(result.select_disciplina);
  $('#s_act_instalacion_definitiva').html(result.select_instalacion_definitiva);
  $('#s_act_tipo_pm').html(result.select_tipo_pm);
  $('#s_act_inspeccion_requerida').html(result.select_inspeccion_requerida);
  $('#s_act_nivel_inspeccion').html(result.select_nivel_inspeccion);
  $('#s_act_documentos_antes_iniciar').html(result.select_documentos_antes_iniciar);
 

  $('#modal_act_adjunto_tecnico').modal('show');


}).fail(function() {
  console.log("error edita_archivo_tecnico");
})

}


$('#btn_act_arch_tecnico').on('click', function(){
  

  var formData = new FormData(document.getElementById("form_act_arch_tecnico"));


  $.ajax({
    url: 		'<?php echo base_url('index.php/AdjuntoTecnico/editaAdjuntoTecnico'); ?>',
    type: 		'POST',
    dataType: 'json',
    contentType: 	false,
    cache: 			false,
    processData: 	false,
    data: formData
  }).done(function(result) {


    if(result.resp){

      recargaArchivoTecnico($('#or_act_cod_empresa_arch_tecnico').val(),$('#or_act_id_orden_arch_tecnico').val());
      $('#modal_act_adjunto_tecnico').modal('hide');
      toastr.success(result.mensaje);

        }else{

        toastr.error(result.mensaje);

        }


  }).fail(function() {
    console.log("error edita_proyecto");
  })

});


function eliminar_archivo_tecnico(cod_empresa,id_orden,id){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/AdjuntoTecnico/eliminaAdjuntoTecnico'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
        cod_empresa  : cod_empresa,
        id_orden : id_orden,
        id : id
            },
    }).done(function(result) {

      if(result.resp){

        recargaArchivoTecnico(cod_empresa,id_orden);
        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);
      
      }
        

    }).fail(function() {
      console.log("error eliminar_archivo_tecnico");
    })
  

}

}

function abre_archivo_tecnico(id,cod_empresa, id_orden) {



$('#id_archivo_tecnico').val(id);
$('#id_orden_archivo_tecnico').val(id_orden);
$('#cod_empresa_archivo_tecnico').val(cod_empresa);
$('#tipo_archivo_tecnico').val('1');


$('#btn_subir_arch_tecnico').text('Subir Archivo'); //change button text
$('#formsArchivoTecnico')[0].reset(); // reset form on modals
$('#modal_archivos_tecnicos').modal('show');
$('.modal-title').text('Agregar Archivo Técnico'); // Set title to Bootstrap modal title

recargaArchivosTecnicos('1', id_orden, cod_empresa);

}


function abre_archivo_tecnico_ep(id,cod_empresa, id_orden) {



$('#id_archivo_tecnico').val(id);
$('#id_orden_archivo_tecnico').val(id_orden);
$('#cod_empresa_archivo_tecnico').val(cod_empresa);
$('#tipo_archivo_tecnico').val('2');


$('#btn_subir_arch_tecnico').text('Subir Archivo '); //change button text
$('#formsArchivoTecnico')[0].reset(); // reset form on modals
$('#modal_archivos_tecnicos').modal('show');
$('.modal-title').text('Agregar Archivo Técnico EP'); // Set title to Bootstrap modal title

recargaArchivosTecnicos('2', id_orden, cod_empresa);


}


$('#btn_subir_arch_tecnico').on('click', function(){


var formData = new FormData(document.getElementById("formsArchivoTecnico"));


$.ajax({
  url: 		'<?php echo base_url('index.php/AdjuntoTecnico/guardarArchivoTecnico'); ?>',
  type: 		'POST',
  dataType: 'json',
  contentType: 	false,
  cache: 			false,
  processData: 	false,
  data: formData
}).done(function(result) {


  if(result.resp){

  
   
    toastr.success(result.mensaje);
    $('#formsArchivoTecnico')[0].reset(); // reset form on modals
    recargaArchivosTecnicos($('#tipo_archivo_tecnico').val(), $('#id_orden_archivo_tecnico').val(),$('#cod_empresa_archivo_tecnico').val());


      }else{

      toastr.error(result.mensaje);

      }


}).fail(function() {
  console.log("error edita_proyecto");
})

});

 

function recargaArchivosTecnicos(tipo_archivo, id_orden, cod_empresa){

var archivos_html ='';

var tabla_proyecto =  $('#tbl_archivos_tecnicos_subidos').DataTable();

tabla_proyecto.destroy();

$.ajax({
  url: 		'<?php echo base_url('index.php/AdjuntoTecnico/listasArchivosTecnico'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
    cod_empresa: cod_empresa,
    id_orden: id_orden,
    tipo_archivo : tipo_archivo
    
        },
}).done(function(result) {

  $.each(result.adjuntotecnicos,function(key, adjuntotecnico) {
    archivos_html += '<tr>';
    archivos_html += '<td>';
    archivos_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar Archivo" onclick="elimina_archivo_tecnico('+ adjuntotecnico.id_secuencia +','+ adjuntotecnico.id_orden +','+ adjuntotecnico.cod_empresa +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
    archivos_html += '</td>';
    archivos_html += '<td>' + adjuntotecnico.id_orden + '</td>';
    archivos_html += '<td>' + adjuntotecnico.id_archivo_tecnico + '</td>';
    archivos_html += '<td>' + adjuntotecnico.archivo_original + '</td>';
    archivos_html += '<td>' + adjuntotecnico.documentos_tecnicos_considera + '</td>';
    archivos_html += '</tr>';

  });
    
  $('#datos_archivos_tecnicos_subidos').html(archivos_html);

    $('[data-toggle="tooltip"]').tooltip();

    $('#tbl_archivos_tecnicos_subidos').DataTable({
    
      language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
          "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 registros', '25 registros', '50 registros', 'Mostrar Todos' ]
        ],
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
                                    },
                                    {
                                    "extend": 'pageLength',
                                    "text": 'MOSTRAR REGISTROS'
                                    }
                            ]
                        }).buttons().container().appendTo('#tbl_archivos_tecnicos_subidos_wrapper .col-md-6:eq(0)');

}).fail(function() {
  console.log("error recargaArchivosTecnicos");
})

}

function elimina_archivo_tecnico(id_secuencia,id_orden,cod_empresa){

  var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/AdjuntoTecnico/eliminarAdjuntosTecnicos'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
        cod_empresa  : cod_empresa,
        id_orden : id_orden,
        id_secuencia : id_secuencia
            },
    }).done(function(result) {

      if(result.resp){

        recargaArchivosTecnicos($('#tipo_archivo_tecnico').val(), $('#id_orden_archivo_tecnico').val(),$('#cod_empresa_archivo_tecnico').val());
        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);
      
      }
        

    }).fail(function() {
      console.log("error eliminar_archivo_tecnico");
    })
  

}


}

</script>