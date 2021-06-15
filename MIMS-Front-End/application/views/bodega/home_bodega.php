 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Inicio<h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-12">
               <div class="card-body">
                

        <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-chart-pie"></i> Dashboard</h3>
        </div>
        <div class="card-body">

             <div class="row">
                      <div class="col-sm">
                                  <div class="form-group">
                                            <label>Seleccione Cliente</label>
                                            <?php echo $select_clientes;?>
                                    </div>
                      </div>
                      <div class="col-sm">
                                  <div class="form-group">
                                          <label>Seleccione Proyectos</label>
                                          <?php echo $select_proyectos;?>
                                  </div>
                      </div>
                      <div class="col-sm">

                                  <div class="form-group">
                                          <label>Aplicar Filtro</label>
                                          <button class="btn btn-block btn-outline-warning btn-sm"
                                              onclick="aplicaFiltroBodega()"><i class="fas fa-filter"></i>
                                          </button>
                                  </div>
                          
                      </div>
              </div>
          </br> 
          </br>
               <div class="row"> 

                          <div class="col-md-3 col-sm-9 col-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-success"><i class="fas fa-book-open"></i></span>

                              <div class="info-box-content" id="cantidadRR">
                                <span class="info-box-text">CANTIDAD REPORTES DE RECEPCIÓN (RR)</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box">
                              <span class="info-box-icon bg-success"><i class="fas fa-book-open"></i></span>

                              <div class="info-box-content" id="cantidadRE">
                                <span class="info-box-text">CANTIDAD REPORTES DE ENTREGA (RE)</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>

                          <div class="col-md-3 col-sm-9 col-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-warning"><i class="fas fa-exclamation"></i></span>

                              <div class="info-box-content" id="cantidadExb">
                                <span class="info-box-text">CANTIDAD EXB</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box">
                              <span class="info-box-icon bg-warning"><i class="fas fa-exclamation"></i></span>

                              <div class="info-box-content" id="cantidadEI">
                                <span class="info-box-text">CANTIDAD EI</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>


                          <div class="col-md-3 col-sm-9 col-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-success"><i class="fas fa-sort-amount-up-alt"></i></span>

                              <div class="info-box-content" id="sumaviajes">
                                <span class="info-box-text">CANTIDAD DE VIAJES</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box">
                              <span class="info-box-icon bg-success"><i class="fas fa-sort-amount-up-alt"></i></span>

                              <div class="info-box-content" id="cantGuias">
                                <span class="info-box-text">TOTAL GUIA DE DESPACHOS</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>
                          <!-- ./col -->


                          <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5">
                            <div class="info-box">
                              <span class="info-box-icon bg-danger"><i class="fas fa-exclamation"></i></span>

                              <div class="info-box-content" id="canGuiasSR">
                                <span class="info-box-text">GUÍAS DE DESPACHO SIN RECEPCIÓN</span>
                                <span class="info-box-number">0</span>
                              </div>
                              <!-- /.info-box-content -->
                 </div>
   

  </div>
  <!-- ./col -->

</div>
<!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
                              

                                         

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="ion ion-clipboard mr-1"></i> Gestor de Tarea</h3>
        </div>
            <div class="card-body">

                           <table id="tbl_todo" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                            <thead>
                                                                <tr>
                                                                    <th>Acciones</th>
                                                                    <th>Gestor de Tarea</th>
                                                                    <th>Descripcion</th>
                                                                    <th>Estado</th>
                                                                    <th>Fecha Inicio</th>
                                                                    <th>Fecha Termino</th>
                                                                    <th>Dias Restantes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="datos_todo">
                                                            </tbody>
              </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" id="btn_nuevo_todo" class="btn btn-info float-right"><i class="fas fa-plus"></i> Agregar To-Do</button>
              </div>
              </div>
            <!-- /.card -->
            </div>
        <!-- /.card-body -->
      </div>



      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="ion ion-clipboard mr-1"></i>WPanel</h3>
        </div>
          <div class="card-body">

              <div class="row">
                      <div class="col-sm">
                                  <div class="form-group">
                                      <label>Seleccione Orden de Compra</label>
                                      <?php echo $select_ordenes;?>
                                    </div>
                      </div>
                     
                      <div class="col-sm">

                                  <div class="form-group">
                                          <label>Aplicar Filtro</label>
                                          <button class="btn btn-block btn-outline-warning btn-sm" onclick="aplicaFiltro()"><i class="fas fa-filter"></i>
                                </button>
                                  </div>
                          
                      </div>
              </div>

              <br/>
              <br/>

                        
                         <table id="tbl_rr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                             <tr>
                                         <th>Número de Línea</th>
                                         <th>TAG Number</th>
                                         <th>Stock Code</th>
                                         <th>ST Cantidad Elementos</th>
                                         <th>ST Cantidad Unitaria</th>
                                         <th>ST Unidad</th>
                                         <th>ST Cantidad  Total</th>
                                         <th>Guia Despacho</th>
                                         <th>Packing List</th>
                                         <th class="grey">Cantidad Recibida</th>
                                         <th class="grey" >Saldo Material</th>
                                         <th>Estado</th>
                                         <th>O.C Proveedor</th>
                                         <th>ID MIMS</th>
                                         <th>RR Númber</th>
                                         <th>RE Númber</th>
                                         <th>EXB Númber</th>
                                         <th>Fecha Emisión RR</th>
                                         <th>Fecha Emisión RE</th>
                                         <th>Fecha Emisión EXB</th>
                                         <th>Fecha Emisión EI</th>
                                         </tr>
                             </thead>
                             <tbody id="datos_rr">
                             </tbody>
                         </table>

                     </div>


       <!--.modal nuevo todo-->
       <div id="modal_nuevo_todo" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo To Do</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
              <form id="form_nuevo_todo">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Usuario</label>
                        <div class="col-sm-12">
                          <input  value="<?php echo $this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno');?>" type="text" class="form-control" readonly >
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->


                  <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Lista Todo</label>
                                                     <div class="col-md-12" id="select_lista_todo">
                                                             
                                                    </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!--.form-horizontal-->
                                     </div>
                  

                  <div class="col-md-12" id="descripcion_todo">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Descripcion To-Do</label>
                        <div class="col-sm-12">
                        <input autocomplete="off" id="var_descripcion_todo" name="var_descripcion_todo" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
         
              <div class="col-md-12">
                 <div class="form-horizontal">
                 <div class="form-group">
                  <label>Fecha Inicio:</label>
                    <div class="input-group">
                        <input autocomplete="off"  type="text" class="form-control fechapicker" name="var_fecha_inicio" id="var_fecha_inicio"/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div><!--.form-horizontal-->
             </div><!--.col-md-12-->


             <div class="col-md-12">
                 <div class="form-horizontal">
                 <div class="form-group">
                  <label>Fecha Termino:</label>
                    <div class="input-group">
                        <input autocomplete="off" type="text" class="form-control fechapicker" name="var_fecha_termino" id="var_fecha_termino"/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div><!--.form-horizontal-->
             </div><!--.col-md-12-->
               

                </div><!--row-->
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">

              <button id="btn-guardar" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--.fin modal nuevo TODO--> 

       <!--.modal nuevo todo editar-->
       <div id="modal_nuevo_todo_edit" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar To Do</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
              <form id="form_nuevo_todo_edit">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Usuario</label>
                        <div class="col-sm-12">
                          <input  value="<?php echo $this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno');?>" type="text" class="form-control" readonly >
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->


                  <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Lista Todo</label>
                                                     <div class="col-md-12" id="select_edit_lista_todo">
                                                             
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!--.form-horizontal-->
                                     </div>



                  <div class="col-md-12" id="bloque_edit_descripcion_todo" style="display: none;">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Descripcion To-Do</label>
                        <div class="col-sm-12">
                          <input id="var_edit_descripcion_todo" name="var_edit_descripcion_todo" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
       


                  <div class="col-md-12">
                 <div class="form-horizontal">
                 <div class="form-group">
                  <label>Fecha Inicio:</label>
                    <div class="input-group">
                        <input autocomplete="off" type="text" class="form-control" name="var_edit_fecha_inicio" id="var_edit_fecha_inicio"/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div><!--.form-horizontal-->
             </div><!--.col-md-12-->


             <div class="col-md-12">
                 <div class="form-horizontal">
                 <div class="form-group">
                  <label>Fecha Termino:</label>
                    <div class="input-group">
                        <input autocomplete="off" type="text" class="form-control" name="var_edit_fecha_termino" id="var_edit_fecha_termino"/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div><!--.form-horizontal-->
             </div><!--.col-md-12-->


                
                </div><!--row-->
                <input id="var_edit_id_todo" name="var_edit_id_todo" type="hidden" class="form-control" value ="">
                <input id="var_edit_id_usuario" name="var_edit_id_usuario" type="hidden" class="form-control" value ="">
            
                </form>
              </div><!--.container-->
            </div><!--.modal-body-->
            <div class="modal-footer justify-content-between">
            
           
              <button id="btn-guardar-edit" onclick="actualizar_todo()" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--.fin modal nuevo TODO--> 



                     </section>
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




            $(document).ready(function() {

                
                recargaBuckSheet(0, 0);

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




                    $('[data-toggle="tooltip"]').tooltip();


$('#btn_nuevo_todo').on('click', function(){
 

  $('#form_nuevo_todo')[0].reset(); // reset form on modals
   $('#modal_nuevo_todo').modal('show');
   
});







$('#btn-guardar').on('click', function(){

var formData = new FormData(document.getElementById("form_nuevo_todo"));

$.ajax({
  url: 		'<?php echo base_url('index.php/TodoUsuarios/guardarTodoUsuario'); ?>',
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

       $('#modal_nuevo_todo').modal('hide');
       toastr.success(result.mensaje);
       recargaListaToDo();

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
  


function actualizaEstado(codEmpresa, id_usuario,id_todo){


  var opcion = confirm("Esta seguro que quiere actualizar registro");

if(opcion){
  
              $.ajax({
                          url: 		'<?php echo base_url('index.php/TodoUsuarios/actualizaEstadoTodo'); ?>',
                          type: 		'POST',
                          dataType: 'json',
                          data: {
                          codEmpresa  : codEmpresa,
                          id_usuario : id_usuario,
                          id_todo : id_todo
                              },
                          beforeSend: function(){
                            mostrarBlock();
                          },
                          complete: function(){
                            $.unblockUI();
                          },
                          success: function(result){
                            
                            if(result.resp){
                         
                                  toastr.success(result.mensaje);
                                  location.reload();

                            }else{

                                  toastr.error(result.mensaje);

                            }
                          },
                          error: function(request, status, err) {
                            toastr.error(result.mensaje);
                            toastr.error("error: " + request + status + err);
                            
                            }
                        });       
}

}




function obtiene_todo(id_todo, cod_usuario){

  var codEmpresa  = <?php  echo $this->session->userdata('cod_emp');?> ; 

  $.ajax({
    url: 		'<?php echo base_url('index.php/TodoUsuarios/obtieneTodoUsuario'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
          id_todo: id_todo,
          cod_usuario : cod_usuario,
          codEmpresa : codEmpresa
          },
  }).done(function(result) {
      
    $('#form_nuevo_todo_edit')[0].reset(); // reset form on modals

      $('#var_edit_fecha_termino').val(result.formulario.fecha_termino);
      $('#var_edit_fecha_inicio').val(result.formulario.fecha_inicio);
      $('#var_edit_descripcion_todo').val(result.formulario.descripcion_todo);
      $('#var_edit_id_todo').val(id_todo);
      $('#select_edit_lista_todo').html(result.formulario.select_lista_todo);
      

      $('#var_edit_id_usuario').val(cod_usuario);
      
      
      if(result.formulario.lista_todo === '1'){

      formToggleActivar('bloque_edit_descripcion_todo');

      }
    
     
    $('#modal_nuevo_todo_edit').modal('show');


  }).fail(function() {
    console.log("error edita_proyecto");
  })



}


function actualizar_todo(){

var formData = new FormData(document.getElementById("form_nuevo_todo_edit"));

$.ajax({
  url: 		'<?php echo base_url('index.php/TodoUsuarios/editaTodoUsuario'); ?>',
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

      toastr.success(result.mensaje);
     $('#modal_nuevo_todo_edit').modal('hide');
     recargaListaToDo();

    }else{
        
        toastr.error(result.mensaje);
    }
  },
  error: function(request, status, err) {
    toastr.error(result.mensaje);
    toastr.error("error: " + request + status + err);
    
     }
});

}


function eliminar_todo(id_todo, cod_usuario){

  var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/TodoUsuarios/eliminaTodoUsuario'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              id_todo  : id_todo,
              cod_usuario : cod_usuario
            },
      }).done(function(result) {

      if(result.resp){

    
        toastr.success(result.mensaje);
       
        recargaListaToDo();

      }else{

        toastr.error(result.mensaje);

      }
        

      }).fail(function() {
      console.log("error eliminar todo");
      })


}

}


function recargaListaToDo(){


  var cod_empresa  = <?php echo $this->session->userdata('cod_emp');?> ; 
  var cod_usuario =  <?php echo $this->session->userdata('cod_user');?> ;
  var todo_html ='';
  var color ="";
  var select_todo = "";

 var tabla_todo =  $('#tbl_todo').DataTable();

    tabla_todo.destroy();

    


    $.ajax({
      url: 		'<?php echo base_url('index.php/TodoUsuarios/obtieneTodoUsuarios'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
        cod_usuario: cod_usuario,
        cod_emp: cod_empresa
        
            },
    }).done(function(result) {
      select_todo = result.select_lista_todo;
      $.each(result.formularios,function(key, formulario) {
        todo_html += '<tr>';
        todo_html += '<td>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Editar"  onclick="obtiene_todo('+ formulario.id_todo +','+formulario.id_usuario+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-edit"></i></button>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar" onclick="eliminar_todo('+ formulario.id_todo +','+formulario.id_usuario+')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Cambiar Estado" onclick="actualizaEstado('+ formulario.codEmpresa +','+formulario.id_usuario+','+formulario.id_todo+','+formulario.estado+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-ban"></i></button>';
        todo_html += '</td>';
        todo_html += '<td>' + formulario.lista_todo + '</td>';
        if(formulario.dias > 3){
          color = 'badge badge-success';

        }else{
          color = 'badge badge-danger';
        }
        todo_html += '<td>' + formulario.descripcion_todo + '</td>';

                if(formulario.estado ==='1'){

                      todo_html += '<td><span class="bg-green">Activo</span></td>';  

                }else{
                  todo_html += '<td><span class="bg-red">Desactivo</span></td>';
                }


        todo_html += '<td>' + formulario.fecha_inicio + '</td>';
        todo_html += '<td>' + formulario.fecha_termino + '</td>';
        todo_html += '<td><small class="'+color+'"><i class="far fa-clock"></i> '+formulario.dif+'</small></td>';
        todo_html += '</tr>';

        

      });
        
        $('#select_lista_todo').html(select_todo);

     
      $('#datos_todo').html(todo_html);

        $('[data-toggle="tooltip"]').tooltip();

        $('#tbl_todo').DataTable({
         
          language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
                        }).buttons().container().appendTo('#tbl_todo_wrapper .col-md-6:eq(0)');

    }).fail(function() {
      console.log("error todo_html");
    })

}



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

            function aplicaFiltro(){

                var cliente = $('#clientes').val();
                var orden = $('#ordenes').val();

                if($('#clientes').val() == 0) {
                        alert('Debe seleccionar cliente');
                    }else{

                    if($('#proyectos').val() == 0) {
                        alert('Debe seleccionar Proyecto');
                    }else{
                     
                        if($('#ordenes').val() == 0) {
                            alert('Debe seleccionar Orden');
                        }else{
                        recargaBuckSheet(orden, cliente);
                    }
                    }
                }
            }

            $('select#clientes').on('change', function() {
            var cliente = $('#clientes').val();
        


		$('#proyectos').val('');

		$('#ordenes').val('');
		$('#ordenes').change();

		$.ajax({
			url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Proyectos',
			type: 'POST',
			dataType: 'JSON',
			data: {
                   id_clientes: cliente
				},
		})
		.done(function(respuesta) {
			$("#proyectos").html(respuesta.proyectos);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

    });
    


    $('select#proyectos').on('change', function() {


        var cliente = $('#clientes').val();
        var proyecto = $('#proyectos').val();


		$('#ordenes').val('');
		$('#ordenes').change();

		$.ajax({
			url: '<?php echo base_url();?>'+'index.php/Bodega/JSON_Ordenes',
			type: 'POST',
			dataType: 'JSON',
			data: {
                   id_clientes: cliente,
                   id_proyecto: proyecto
				},
		})
		.done(function(respuesta) {
			$("#ordenes").html(respuesta.ordenes);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});


 


             function recargaBuckSheet(orden, cliente) {


                 var tabla_bucksheet = $('#tbl_rr').DataTable();

                 
                 tabla_bucksheet.destroy();

                 var  id_orden = orden; 
                 var   bucksheet_html = "";

                 $.ajax({
                     url: '<?php echo site_url('BuckSheet/obtieneBuckSheetRRInicial')?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: {
                        id_orden: id_orden
                     },
                 }).done(function(result) {


                     $.each(result.bucksheets, function(key, bucksheets) {
                         bucksheet_html += '<tr>';
                       
                        bucksheet_html += '<td>' + bucksheets.NUMERO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.NUMERO_DE_TAG+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.STOCKCODE+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.UNIDADES_SOLICITADAS+ '</td>';    
                        
                        bucksheet_html += '<td>' + bucksheets.CANTIDAD_UNITARIA+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheets.UNIDAD+ '</td>'; 
                        bucksheet_html += '<td>' + bucksheets.CANTIDAD_TOTAL+ '</td>'; 

                        bucksheet_html += '<td>' + bucksheets.GUIA_DESPACHO+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.PACKINGLIST+ '</td>';
                        bucksheet_html += '<td class="grey" >1</td>';
                        bucksheet_html += '<td class="grey" >1</td>';
                        bucksheet_html += '<td>' + bucksheets.ESTADO_DE_LINEA+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.NUMERO_OC+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.ID_OC+ '</td>';
                        bucksheet_html += '<td>' + bucksheets.REPORTE_DE_RECEPCION_RR+ '</td>';
                        bucksheet_html += '<td></td>';
                        bucksheet_html += '<td></td>';
                        bucksheet_html += '<td>' + bucksheets.FECHA_CREACION+ '</td>';;
                        bucksheet_html += '<td></td>';
                        bucksheet_html += '<td></td>';
                        bucksheet_html += '<td></td>';
                
                        bucksheet_html += '</tr>';

                     
                     });


                     $('#datos_rr').html(bucksheet_html);

                     $('#tbl_rr').DataTable({
                      language: {
              url: '<?php echo base_url();?>/assets/plugins/datatables/lang/Spanish.json'	
          },
        "paging": true,
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
                        }).buttons().container().appendTo('#datos_rr_wrapper .col-md-6:eq(0)');

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }


            function aplicaFiltroBodega(){

var cliente = $('#clientes').val();
var proyectos = $('#proyectos').val();
var cantidadRR = '';
var cantidadRE = '';
var cantidadExb = '';
var cantidadEI = '';
var sumaviajes = '';
var cantGuias  = '';
var canGuiasSR = '';


if($('#clientes').val() == 0) {
        alert('Debe seleccionar cliente');
    }else{

    if($('#proyectos').val() == 0) {
        alert('Debe seleccionar Proyecto');
    }else{
    
      $.ajax({
              url: '<?php echo base_url();?>'+'index.php/Consultas/obtieneTotalesBodega',
              type: 'POST',
              dataType: 'JSON',
              data: {
                      id_cliente: cliente,
                      id_proyecto: proyectos
                    },
            })
            .done(function(respuesta) {

              cantidadRR = '<span class="info-box-text">CANTIDAD REPORTES DE RECEPCIÓN (RR)</span> <span class="info-box-number">'+respuesta.cantidadRR+'</span>';
              cantidadRE = '<span class="info-box-text">CANTIDAD REPORTES DE ENTREGA (RE)</span> <span class="info-box-number">'+respuesta.cantidadRE+'</span>';
              cantidadExb = '<span class="info-box-text">CANTIDAD EXB</span> <span class="info-box-number">'+respuesta.cantidadExb+'</span>';
              cantidadEI = '<span class="info-box-text">CANTIDAD EI</span> <span class="info-box-number">'+respuesta.cantidadEI+'</span>';
              sumaviajes = '<span class="info-box-text">CANTIDAD DE VIAJES</span> <span class="info-box-number">'+respuesta.sumaviajes+'</span>';
              cantGuias  = '<span class="info-box-text">TOTAL GUIA DE DESPACHOS</span> <span class="info-box-number">'+respuesta.cantGuias+'</span>';
              canGuiasSR = '<span class="info-box-text">GUÍAS DE DESPACHO SIN RECEPCIÓN</span> <span class="info-box-number">'+respuesta.canGuiasSR+'</span>';


              $("#cantidadRR").html(cantidadRR);
              $("#cantidadRE").html(cantidadRE);
              $("#cantidadExb").html(cantidadExb);
              $("#cantidadEI").html(cantidadEI);
              $("#sumaviajes").html(sumaviajes);
              $("#cantGuias").html(cantGuias);
              $("#canGuiasSR").html(canGuiasSR);

              
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
    
    
    }

}

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

                 cargaCalendarioFechas();
              recargaListaToDo();
   

             })
             </script>


    