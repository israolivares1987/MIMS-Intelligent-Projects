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
                              <div class="card mt-5">
                               <div class="card-header">
                                   <h5>Proyectos</h5>
                               </div>
                               <div class="card-body">
                                   <table id="tbl_proyectos" class="table table-striped table-bordered" cellspacing="0">
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
                               </div>
                               <!--.card-body-->
                           </div>
                           <!--.card-->
                           <div class="card mt-5">
                               <div class="card-header">
                                   <h5>Ordenes de Compra</h5>
                               </div>
                               <div class="card-body">
                                   <table id="ListOrdenes" class="table table-striped table-bordered" cellspacing="0">
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
                               </div>
                               <!--.card-body-->
                           </div>
                           <!--.card-->
                       </div>
                       <!--.card-header-->
                       <!-- /.card-header -->
                   </div>
                   <!--.card-->
               </div>
               <!--.col-12-->
           </div>
           <!--.row-->

           <script type="text/javascript">
           $('[data-toggle="tooltip"]').tooltip();

           $(document).ready(function() {

            var cliente = <?php echo $idCliente?>;

              recargaOrdenes(0, 0);
              recargaProyectos(cliente);

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



           function listar_ordenes(id_proyecto, id_cliente) {

               recargaOrdenes(id_proyecto, id_cliente);

           }


           function recargaProyectos(cliente) {

               var proyectos_html = '';

               var tabla_proyecto = $('#tbl_proyectos').DataTable();

               tabla_proyecto.destroy();

               $.ajax({
                   url: '<?php echo base_url('index.php/Proyectos/listProyectosCliente'); ?>',
                   type: 'POST',
                   dataType: 'json',
                   data: {
                       cliente: cliente
                   },
               }).done(function(result) {

                   $.each(result.proyectos, function(key, proyecto) {
                       proyectos_html += '<tr>';
                       proyectos_html += '<td>' + proyecto.codigo_proyecto + '</td>';
                       proyectos_html += '<td>' + proyecto.nombre_proyecto + '</td>';
                       proyectos_html += '<td>' + proyecto.estado + '</td>';
                       proyectos_html += '<td>';
                       proyectos_html += '<button data-nombre="' + proyecto.nombre_proyecto +
                           '" data-toggle="tooltip" data-placement="top" title="Listar ordenes" onclick="listar_ordenes(' +
                           proyecto.codigo_proyecto + ',' + cliente +
                           ',this)" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-list-ul"></i></button>';
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



           function recargaOrdenes(id_proyecto, id_cliente) {

               var ordenes_html = '';
               var tabla_ordenes = $('#ListOrdenes').DataTable();

               tabla_ordenes.destroy();

               $.ajax({
                   url: '<?php echo base_url('index.php/Proyectos/obtieneOrdenes'); ?>',
                   type: 'POST',
                   dataType: 'json',
                   data: {
                       id_proyecto: id_proyecto,
                       id_cliente: id_cliente
                   },
               }).done(function(result) {

                   console.log(result);


                   $.each(result.ordenes, function(key, orden) {
                       ordenes_html += '<tr>';
                       ordenes_html += '<td>' + orden.codigo_proyecto + '</td>';
                       ordenes_html += '<td>' + orden.order_id + '</td>';
                       ordenes_html += '<td>' + orden.order_description + '</td>';
                       ordenes_html += '<td>' + orden.supplier + '</td>';
                       ordenes_html += '<td>' + orden.employee + '</td>';
                       ordenes_html += '<td>' + orden.order_date + '</td>';
                       ordenes_html += '<td>' + orden.date_required + '</td>';
                       ordenes_html += '<td>';
                       ordenes_html +=
                           '<button data-toggle="tooltip" data-placement="top" title="Ver Bucksheet" onclick="ver_bucksheet('+orden.order_id+',\''+orden.order_description+'\')" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-eye"></i></button>';
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

            function ver_bucksheet(id, descripcion)
            {
                window.open('<?php echo site_url('BuckSheet/listaBucksheet')?>/' + id + '/'+descripcion , '_blank');
            }


           </script>