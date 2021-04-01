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
                      
                        <i class="fas fa-clipboard-list"></i>
                        Ordenes de Compra Proyecto
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
							 <table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0" width=100%>
						 
							  <thead>
								  <tr>
								  <th>Acciones</th>
                  <th>Criticidad</th>
                  <th>ID Requerimiento</th>
                  <th>Categorizacion</th>
                  <th>Número Orden</th>
                  <th>Fecha Orden</th>
                  <th>Descripcion Orden</th>
                  <th>Revisión</th>
                  <th>Nombre Proveedor</th>
                  <th>Nombre Cliente</th>
                  <th>Comprador</th>
                  <th>Generador de Compra</th>
                  <th>Activador</th>
                  <th>Moneda</th>
                  <th>Valor Neto</th>
                  <th>Valor Total</th>
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

                 $('[data-toggle="tooltip"]').tooltip();

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



$(document).ready(function() { 

  $('[data-toggle="tooltip"]').tooltip();

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


function listar_ordenes(id_proyecto,id_cliente,nombre_proyecto){  
  
 
  $('#flag_orden').val(1); 
  recargaItemOrdenes(0, 0, 0,'');
  recargaOrdenes(id_proyecto,id_cliente,nombre_proyecto);
  recargaArchivoTecnico(0,0);
 
}

function listar_archivos_adjuntos(cod_empresa,id_orden){  
  
  recargaArchivoTecnico(cod_empresa,id_orden);


}


$('#select_clientes').on('change', function(){

    var cliente = this.value;
 

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
            },
            {
            "extend": 'pageLength',
            "text": 'Mostrar Registros'
            }
    ]
                        }).buttons().container().appendTo('#tbl_proyectos_wrapper .col-md-6:eq(0)');

    }).fail(function() {
      console.log("error change cliente");
    })

    $('#flag_orden').val(0);


}




function listar_item_ordenes(orden_id, id_cliente, id_proyecto, nombre_orden ) {

recargaItemOrdenes(orden_id, id_cliente, id_proyecto, nombre_orden);
obtieneSelects();

}


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
            },
            {
            "extend": 'pageLength',
            "text": 'Mostrar Registros'
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
            },
            {
            "extend": 'pageLength',
            "text": 'Mostrar Registros'
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
  var orden_cliente = "";
  var descripcion_orden ="";
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
           ordenes_html += '<td>' + orden.ValorTotal  + '</td>';
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

      });


      titulo_ordenes = '<a href="#" class="nav-link"> Orden de compra Proyecto: '+ nombre_proyecto +'</a>';
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
            },
            {
            "extend": 'pageLength',
            "text": 'Mostrar Registros'
            }
    ]
                        }).buttons().container().appendTo('#ListOrdenes_wrapper .col-md-6:eq(0)');


    }).fail(function() {
      console.log("error listar_ordenes");
    })


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
      archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Agrega Archivo Técnico " onclick="abre_archivo_tecnico('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>';
      archivo_tecnico_html += '<button data-toggle="tooltip" data-placement="left" title="Agrega Archivo Técnico EP " onclick="abre_archivo_tecnico_ep('+adjuntotecnico.id +','+ cod_empresa +','+ id_orden +')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-file-archive"></i></button>';
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
            },
            {
            "extend": 'pageLength',
            "text": 'Mostrar Registros'
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
            },
            {
            "extend": 'pageLength',
            "text": 'Mostrar Registros'
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