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

<div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fas fa-project-diagram"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Proyectos</span>
        <span class="info-box-number"><?php echo $totalProyectos; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fas fa-mug-hot"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Clientes</span>
        <span class="info-box-number"><?php echo $totalClientes; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-success"><i class="fas fa-sort-amount-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total lineas Activables Compras</span>
        <span class="info-box-number"><?php echo $totalLineasActivablesPlanCompras; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box">
      <span class="info-box-icon bg-success"><i class="fas fa-sort-amount-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total lineas Activables Obra</span>
        <span class="info-box-number"><?php echo $totalLineasActivablesPlanObra; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-warning"><i class="fas fa-sort-amount-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Ordenes Plan Compras</span>
        <span class="info-box-number"><?php echo $totalOrdenesCompras; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box">
      <span class="info-box-icon bg-warning"><i class="fas fa-mug-hot"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Ordenes Obra</span>
        <span class="info-box-number"><?php echo $totalOrdenesObra; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>


  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="fas fa-money-bill-alt"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Admin MM Plan Compras</span>
        <span class="info-box-number"><?php echo $totalOrdenesAdminCompras; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="fas fa-money-bill-alt"></i></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Admin MM Obra</span>
        <span class="info-box-number"><?php echo $totalOrdenesAdminObras; ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
 <!-- TO DO List -->

 <div class="container-fluid">
        <div class="row">
       
          <div class="col-md-8">
             
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Gestor de Tarea
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="tbl_todo" class="table table-bordered table-hover" cellspacing="0" width=100%>
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
          <!-- /.col -->

          <div class="col-md-4">
             <div id="calendar"></div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

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
                        <input autocomplete="off" type="text" class="form-control fechapicker" name="var_fecha_inicio" id="var_fecha_inicio"/>
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

$('[data-toggle="tooltip"]').tooltip();

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
       recargaCalendario();

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
     recargaCalendario();

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
        recargaCalendario();

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
  var lista_todo = "";  
  var descripcion_todo = "";

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


       
        lista_todo = formulario.lista_todo ;  
        descripcion_todo = formulario.descripcion_todo; 

        todo_html += '<tr>';
        todo_html += '<td>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Editar"  onclick="obtiene_todo('+ formulario.id_todo +','+formulario.id_usuario+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-edit"></i></button>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Eliminar" onclick="eliminar_todo('+ formulario.id_todo +','+formulario.id_usuario+')" class="btn btn-outline-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>';
        todo_html += '<button data-toggle="tooltip" data-placement="left" title="Cambiar Estado" onclick="actualizaEstado('+ formulario.codEmpresa +','+formulario.id_usuario+','+formulario.id_todo+','+formulario.estado+')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-ban"></i></button>';
        todo_html += '</td>';
        todo_html += '<td>' + lista_todo + '</td>';


      if(formulario.estado == '1'){ 

        if(formulario.dias > 3 ){

          color = 'badge badge-success';

        }else if(formulario.dias <= 3 && formulario.dias >= 0 ){
          
          color = 'badge badge-warning';
         

        }else{

          color = 'badge badge-danger';
        }

      

        todo_html += '<td>' + descripcion_todo + '</td>';


        if(formulario.dias > 3 ){

          todo_html += '<td><span class="bg-green">En tiempo</span></td>';  

        }else if(formulario.dias <= 3 && formulario.dias >= 0 ){

          todo_html += '<td><span class="bg-yellow">Por vencer</span></td>';  

        }else{

          todo_html += '<td><span class="bg-red">Atrasada</span></td>';  
        }
      }else{
        todo_html += '<td>' + descripcion_todo + '</td>';
        todo_html += '<td><span class="bg-red">Terminado</span></td>'; 
      }

        todo_html += '<td>' + formulario.fecha_inicio + '</td>';
        todo_html += '<td>' + formulario.fecha_termino + '</td>';

        if(formulario.estado == '1'){ 
        todo_html += '<td><medium class="'+color+'"><i class="far fa-clock"></i> <p>'+formulario.dif+'</medium></td>';
        }else{

          todo_html += '<td></td>';

        }
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

        recargaCalendario();

    }).fail(function() {
      console.log("error todo_html");
    })

}


function recargaCalendario(){


  var cod_empresa  = <?php echo $this->session->userdata('cod_emp');?> ; 
    var cod_usuario =  <?php echo $this->session->userdata('cod_user');?> ;
  
    /* initialize the calendar
     -----------------------------------------------------------------*/
 
    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');


    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      locale: 'es',
      themeSystem: 'bootstrap',
      //Random default events
      eventSources: [

          // your event source
          {
            url: '<?php echo base_url('index.php/TodoUsuarios/obtieneTodoCalendario'); ?>',
            method: 'POST',
            extraParams: {
              cod_usuario: cod_usuario,
              cod_emp: cod_empresa
            },
            failure: function() {
              alert('there was an error while fetching events!');
            }
          }

          // any other sources...

          ]

    });

    calendar.render();
    // $('#calendar').fullCalendar()



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

    $('[data-toggle="tooltip"]').tooltip();

    cargaCalendarioFechas();
    recargaListaToDo();
    recargaCalendario();


  })
</script>
