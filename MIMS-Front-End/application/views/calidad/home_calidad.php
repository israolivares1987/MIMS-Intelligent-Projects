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
          <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
          
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3></h3>

                <p>Total Proyectos</p>
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
                <h3><sup style="font-size: 20px"></sup></h3>

                <p>Total Clientes</p>
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
                <h3></h3>

                <p>Total Ordenes</p>
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
                <h3></h3>

                <p>Total Suppliers</p>
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
                <ul class="todo-list" data-widget="todo-list">
                  
                  <?php echo $listaTodo; ?>
                
                </ul>
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
                        <label>Fecha Inicio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i
                                        class="far fa-calendar-alt"></i></span>
                            </div>
                            <input name="var_fecha_inicio" type="text" class="form-control" id="var_fecha_inicio"
                                data-inputmask-alias="datetime"
                                data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                im-insert="false">
                        </div>
                      
                    </div>
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                    <div class="form-group">
                        <label>Fecha Termino</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i
                                        class="far fa-calendar-alt"></i></span>
                            </div>
                            <input name="var_fecha_termino" type="text" class="form-control" id="var_fecha_termino"
                                data-inputmask-alias="datetime"
                                data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                im-insert="false">
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
                        <label>Fecha Inicio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i
                                        class="far fa-calendar-alt"></i></span>
                            </div>
                            <input name="var_edit_fecha_inicio" type="text" class="form-control" id="var_edit_fecha_inicio"
                                data-inputmask-alias="datetime"
                                data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                im-insert="false">
                        </div>
                      
                    </div>
                    </div><!--.form-horizontal-->
                  </div><!--.col-md-12-->
                  <div class="col-md-12">
                    <div class="form-horizontal">
                    <div class="form-group">
                        <label>Fecha Termino</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i
                                        class="far fa-calendar-alt"></i></span>
                            </div>
                            <input name="var_edit_fecha_termino" type="text" class="form-control" id="var_edit_fecha_termino"
                                data-inputmask-alias="datetime"
                                data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                im-insert="false">
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
            
           
              <button id="btn-guardar-edit" type="button" class="btn btn-outline-primary">Guardar</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--.fin modal nuevo TODO--> 






      <script>
  $(function () {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm-dd-yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>


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
        sleep();
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
  
  function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function sleep() {
  console.log('Taking a break...');
  await sleep(2000);
  console.log('Two seconds later, showing sleep in a loop...');
}

function actualizaEstado(codEmpresa, id_usuario,id_todo,estado){


  var opcion = confirm("Esta seguro que quiere actualizar registro");

if(opcion){

              $.ajax({
                          url: 		'<?php echo base_url('index.php/TodoUsuarios/actualizaEstadoTodo'); ?>',
                          type: 		'POST',
                          dataType: 'json',
                          data: {
                          codEmpresa  : codEmpresa,
                          id_usuario : id_usuario,
                          id_todo : id_todo,
                          estado : estado
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

function cambiarEstado(checkbox)
{

  var codEmpresa  = <?php  echo $this->session->userdata('cod_emp');?> ; 
  var id_usuario =  <?php  echo $this->session->userdata('cod_user');?> ; ; 
  var id_todo    = checkbox.value ; 

        if (checkbox.checked)
        {
          actualizaEstado(codEmpresa, id_usuario,id_todo,1);
          
        }else{
            
          actualizaEstado(codEmpresa, id_usuario,id_todo,0);

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
      $('#var_edit_id_usuario').val(cod_usuario);
      
    
     
    $('#modal_nuevo_todo_edit').modal('show');


  }).fail(function() {
    console.log("error edita_proyecto");
  })



}


$('#btn-guardar-edit').on('click', function(){

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
       sleep();
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

});


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
       // sleep();
        location.reload();


      }else{

        toastr.error(result.mensaje);

      }
        

      }).fail(function() {
      console.log("error eliminar todo");
      })


}

}


</script>

