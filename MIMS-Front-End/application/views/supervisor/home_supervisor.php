 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-chart-pie"></i> Dashboard</h3>
        </div>
        <div class="card-body">
          
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo $totalProyectos; ?></h3>

                <p>Total Proyectos</p>
              </div>
              <div class="inner">
                <h3><?php echo $totalClientes; ?></h3>

                <p>Total Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $totalLineasActivablesPlanCompras; ?></h3>

                <p>Total lineas Activables Compras</p>
              </div>
              <div class="inner">
                <h3><?php echo $totalLineasActivablesPlanObra; ?></h3>

                <p>Total lineas Activables Obra</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $totalOrdenesCompras; ?></h3>

                <p>Total Ordenes Plan Compras</p>
              </div>
              <div class="inner">
                <h3><?php echo $totalOrdenesObra; ?></h3>

                <p>Total Ordenes Obra</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $totalOrdenesAdminCompras; ?></h3>

                <p>Total Admin MM Plan Compras </p>
              </div>
              <div class="inner">
                <h3><?php echo $totalOrdenesAdminObras; ?></h3>

                <p>Total Admin MM Obra</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
 <!-- TO DO List -->
 <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Lista To-Do
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="tbl_todo" class="table table-striped table-bordered" cellspacing="0" width=100%>
                                                            <thead>
                                                                <tr>
                                                                    <th>Acciones</th>
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



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
                          <input id="var_descripcion_todo" name="var_descripcion_todo" type="text" class="form-control">
                        </div><!--.col-sm-9-->
                      </div><!--.form-group-->
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
         
              <div class="col-md-12">
                 <div class="form-horizontal">
                 <div class="form-group">
                  <label>Fecha Inicio:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="var_fecha_inicio" id="var_fecha_inicio"/>
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
                        <input type="text" class="form-control" name="var_fecha_termino" id="var_fecha_termino"/>
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
                        <input type="text" class="form-control" name="var_edit_fecha_inicio" id="var_edit_fecha_inicio"/>
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
                        <input type="text" class="form-control" name="var_edit_fecha_termino" id="var_edit_fecha_termino"/>
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
      
      $.each(result.formularios,function(key, formulario) {
        todo_html += '<tr>';
        todo_html += '<td>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Editar"  onclick="obtiene_todo('+ formulario.id_todo +','+formulario.id_usuario+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-edit"></i></button>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar" onclick="eliminar_todo('+ formulario.id_todo +','+formulario.id_usuario+')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Cambiar Estado" onclick="actualizaEstado('+ formulario.codEmpresa +','+formulario.id_usuario+','+formulario.id_todo+','+formulario.estado+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-ban"></i></button>';
        todo_html += '</td>';

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
        $('#select_lista_todo').html(formulario.select_lista_todo);
      });

     
      $('#datos_todo').html(todo_html);

        $('[data-toggle="tooltip"]').tooltip();

        $('#tbl_todo').DataTable({
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
          "scrollY": "300px",
          "scrollX": true,
          "scrollCollapse": true
      });

    }).fail(function() {
      console.log("error todo_html");
    })

}
</script>

<script>
  $(function () {

    //Datemask dd-mm-yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm-dd-yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    cargaCalendarioFechas();
    recargaListaToDo();
   
         

  })
</script>
