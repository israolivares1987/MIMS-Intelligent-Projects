   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--h5 class="card-title m-0">Clientes empresa <?php #echo $nombreCliente;?>
            </h5-->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="card">
                  <div class="card-header">
                    <h5>Clientes</h5>
                  </div>
                  <div class="card-body">
                      <div class="container">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Seleccione cliente</label>
                            <?php echo $select_clientes;?>
                          </div>
                        </div>
                      </div>
                  </div><!--.card-body-->
                </div><!--.card-->
                <div class="card mt-5">
                  <div class="card-header">
                    <h5>Proyectos</h5>
                  </div>
                  <div class="card-body">
                    <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0">
                        <button id="btn_nuevo_proyecto" class="btn btn-outline-primary float-right">Nuevo Proyecto</button>
                        <thead>
                            <tr>
                              <th>Codigo Proyecto</th>
                              <th>Descripcion Proyecto</th>
                              <th>Estado Proyecto</th>
                              <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="datos_proyectos">
                        </tbody>
                    </table>
                  </div><!--.card-body-->
                </div><!--.card-->
                <div class="card mt-5">
                  <div class="card-header">
                    <h5>Ordenes de Compra</h5>
                  </div>
                  <div class="card-body">
                    <table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0">
                    <div id="btn-no"><button id="btn_nueva_orden" class="btn btn-outline-primary float-right">Nueva orden</button></div>
                        <thead>
                            <tr>
                              <th>Codigo Proyecto</th>
                              <th>OrderID</th>
                              <th>OrderDescription</th>
                              <th>Supplier</th>
                              <th>Employee</th>
                              <th>OrderDate</th>
                              <th>DateRequired</th>
                              <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="datos_ordenes">
                          
                        </tbody>
                    </table>
                  </div><!--.card-body-->
                </div><!--.card-->
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
                          <input id="var_descripcion_proyecto" type="text" class="form-control">
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

<script type="text/javascript">


$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function() { 


    

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

   recargaOrdenes(id_proyecto,id_cliente);

}


$('#select_clientes').on('change', function(){

    var cliente = this.value;

    if(cliente > 0){

      recargaOrdenes(0,0);
      recargaProyectos(cliente);

    }else{
      $('#datos_proyectos').html('<td class="text-center" colspan="4">No hay datos disponibles en la tabla.</td>');
    }

});

$('#btn_nuevo_proyecto').on('click', function(){
 
  let select     = $('#select_clientes');
  let id_cliente = $('#select_clientes').val();
  let nombre = $('#select_clientes option:selected').data('name');

  if(id_cliente == 0){

    alert('Debe seleccionar un Cliente');

  }else{

    $('#var_cliente').val(id_cliente);
    $('#var_nombre_cliente').val(nombre);


    $('#modal_nuevo_proyecto').modal('show');
    
  }

});


$('#btn-guardar').on('click', function(){

  let id_cliente      = $('#var_cliente').val();
  let nombre_proyecto = $('#var_descripcion_proyecto').val(); 

  $.ajax({
    url: 		'<?php echo base_url('index.php/ingenieria/guardarProyecto'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_cliente : id_cliente,
            nombre_proyecto: nombre_proyecto
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

    var tabla_proyecto =  $('#tbl_proyectos').DataTable();

    tabla_proyecto.destroy();

    $.ajax({
      url: 		'<?php echo base_url('index.php/ingenieria/listProyectosCliente'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              cliente: cliente
            },
    }).done(function(result) {

      $.each(result.proyectos,function(key, proyecto) {
        proyectos_html += '<tr>';
          proyectos_html += '<td>' + proyecto.codigo_proyecto + '</td>';
          proyectos_html += '<td>' + proyecto.nombre_proyecto + '</td>';
          proyectos_html += '<td>' + proyecto.estado + '</td>';
          proyectos_html += '<td>';
          proyectos_html += '<button data-nombre="'+ proyecto.nombre_proyecto +'" data-toggle="tooltip" data-placement="top" title="Listar ordenes" onclick="listar_ordenes('+ proyecto.codigo_proyecto +','+ cliente +',this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
          proyectos_html += '<button data-toggle="tooltip" data-placement="top" title="Editar Proyecto" onclick="edita_proyecto('+ proyecto.codigo_proyecto +','+ cliente +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          proyectos_html += '<button data-toggle="tooltip" data-placement="top" title="Eliminar Proyecto" onclick="elimina_proyecto('+ proyecto.codigo_proyecto +','+ cliente +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          proyectos_html += '</td>';
        proyectos_html += '</tr>';

      });
        
        
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
          "autoWidth": false,
          "responsive": true
      });

    }).fail(function() {
      console.log("error change cliente");
    })

}

function edita_proyecto(id_proyecto, id_cliente){

  $.ajax({
    url: 		'<?php echo base_url('index.php/ingenieria/editarProyecto'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
            id_proyecto: id_proyecto,
            id_cliente:id_cliente
          },
  }).done(function(result) {
      
    $('#act_nombre_cliente').val(result.nombre_cliente);
    $('#act_nombre_proyecto').val(result.nombre_proyecto);
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


function recargaOrdenes(id_proyecto,id_cliente){

  var ordenes_html ='';
  var tabla_ordenes =  $('#ListOrdenes').DataTable();

  tabla_ordenes.destroy();

  $.ajax({
      url: 		'<?php echo base_url('index.php/ingenieria/obtieneOrdenes'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
              id_proyecto: id_proyecto,
              id_cliente:id_cliente
            },
    }).done(function(result) {

      console.log(result);
      

      $.each(result.ordenes,function(key, orden) {
        ordenes_html += '<tr>';
          ordenes_html += '<td>' + orden.codigo_proyecto + '</td>';
          ordenes_html += '<td>' + orden.order_id + '</td>';
          ordenes_html += '<td>' + orden.order_description + '</td>';
          ordenes_html += '<td>' + orden.supplier + '</td>';
          ordenes_html += '<td>' + orden.employee + '</td>';
          ordenes_html += '<td>' + orden.order_date + '</td>';
          ordenes_html += '<td>' + orden.date_required + '</td>';
          ordenes_html += '<td>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="top" title="Ver Bucksheet" onclick="ver_bucksheet()" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="top" title="Editar Orden" onclick="editar_orden()" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>';
          ordenes_html += '<button data-toggle="tooltip" data-placement="top" title="Eliminar Orden" onclick="eliminar_orden('+ id_cliente +','+ id_proyecto +','+ orden.order_id +')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
          ordenes_html += '</td>';
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
            "autoWidth": false,
            "responsive": true
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


</script>