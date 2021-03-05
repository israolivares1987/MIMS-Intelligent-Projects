 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Gestión de Activación</h1>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Detalle Orden de Compra
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">Order ID:</dt>
                                             <dd class="col-sm-9"><?php echo $idOrden;?></dd>
                                             <dt class="col-sm-8">Descripción:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($PurchaseOrderDescription);?>
                                             </dd>
                                             </dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                             <div class="col-lg-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">
                                             <i class="fas fa-text-width"></i>
                                             Detalle Proyecto
                                         </h3>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body">
                                         <dl class="row">
                                             <dt class="col-sm-8">Cliente:</dt>
                                             <dd class="col-sm-9"><?php echo $nombreCliente;?></dd>
                                             <dt class="col-sm-8">Proyecto:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($DescripcionProyecto);?></dd>
                                             </dd>
                                         </dl>
                                     </div>
                                     <!-- /.card-body -->
                                 </div>
                             </div>
                             <!-- /.col-md-6 -->
                         </div>
                         <!-- /.row -->
                     <!-- /.card-header -->
                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                                Actividades de Gestión de Activación
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                     <button id="btn_recargar"
                                             class="btn btn-outline-secondary float-right"><i class="fas fa-spinner">
                                                     </i>  Actualizar</button>
                                       
                                    </th>
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_corden" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                     <th>Nombre Empleado</th>
                                     <th>Fecha Ingreso</th>
                                     <th>Numero Referencial</th>
                                     <th>Tipo Interaccion</th>
                                     <th>Solicitado por</th>
                                     <th>Aprobado por</th>
                                     <th>Comentarios Generales</th>
                                     <th>Respaldos</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_corden">
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->


                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                                 EDP
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <td>
                                     <dl class="row">
                                             <dt class="col-sm-8">ORDEN DE COMPRA:</dt>
                                             <dd class="col-sm-9"><?php echo $idOrden;?></dd>
                                             <dt class="col-sm-8">MONTO ORDEN DE COMPRA:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($montoOrden);?>
                                             </dd>
                                             </dd>
                                         </dl>
                                    </td>
                                    <td>
                                    
                                    </td>
                                    <td>
                                     <button id="btn_recargar_edp"
                                             class="btn btn-outline-secondary float-right"><i class="fas fa-spinner">
                                                     </i>  Actualizar</button>
                                      
                                    </td>
                                 </tr>

                                 
                             </tbody>
                         </table>
                         <table id="tbl_edp" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                             <tr>
                                <th>NOMBRE EMPLEADO</th>
                                <th>FECHA INGRESO EDP</th>
                                <th>N° EDP</th>
                                <th>ESTADO</th>
                                <th>FECHA DE PAGO</th>
                                <th>ACTUAL / PROGRAMADO</th>
                                <th>PROVEEDOR</th>
                                <th>IMPORTE EDP</th>
                                <th>SALDO INSOLUTO O.C</th>
                                <th>RESPALDO</th>
                                <th>COMENTARIOS</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_edp">
                             </tbody>
                         </table>
                        </div>


                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-tasks"></i>
                                 GARANTIAS
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                     <button id="btn_recargar_gara"
                                             class="btn btn-outline-secondary float-right"><i class="fas fa-spinner">
                                                     </i>  Actualizar</button>
                                        
                                    </th>
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_garantias" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                 <th>NOMBRE EMPLEADO</th>
                                 <th>FECHA DE EMISIÓN</th>
                                 <th>N° DOCUMENTO</th>
                                 <th>TIPO DE GARANTÍA</th>
                                 <th>REFERENCIA</th>
                                 <th>MONTO</th>
                                 <th>VENCIMIENTO</th>
                                 <th>DÍAS ANTES DEL VENCIMIENTO</th>
                                 <th>RESPALDO</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_garantias">
                             </tbody>
                         </table>
                        </div>



                        
                    </div>
                 </div>
                 
                 
                </div><!-- /.container-fluid -->
     </section>

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

                            var cliente = <?php echo $idCliente?> ;
                            var orden = <?php echo $idOrden?> ;
                            var proyecto = <?php echo $codProyecto?> ;

                            recargaControlOrden(orden, cliente);

                            recargaEdp(orden, cliente, proyecto);

                            recargaGarantias(orden, cliente, proyecto);

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

                            var x = 1; //Initial field counter is 1 
                            var maxField = 10; //Input fields increment limitation
                            var addButton = $('.add_button'); //Add button selector
                            var wrapper = $('.field_wrapper'); //Input field wrapper
                            var fieldHTML = '<div col-md-12>' +
                                '<div class="input-group-prepend">' +
                                '<span class="input-group-text"><i class="fas fa-envelope"></i></span>' +
                                '<input autocomplete="off" type="text" name="var_email" value="" class="form-control varEmail"/>' +
                                '<a href="javascript:void(0);" class="btn btn-block btn-outline-danger btn-sm remove_button" title="Add field"><i class="far fa-envelope"></i> Eliminar Mail</a>' +
                                '</div>' +
                                '</div>'; //New input field html 



                            //Once add button is clicked
                            $(addButton).click(function() {
                                //Check maximum number of input fields
                                if (x < maxField) {
                                    x++; //Increment field counter
                                    $(wrapper).append(fieldHTML); //Add field html
                                }
                            });

                            //Once remove button is clicked
                            $(wrapper).on('click', '.remove_button', function(e) {
                                e.preventDefault();
                                $(this).parent('div').remove(); //Remove field html
                                x--; //Decrement field counter
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

             $('#btn_recargar').on('click', function() {

                 var cliente = <?php echo $idCliente?> ;
                 var orden = <?php echo $idOrden?>;

                 recargaControlOrden(orden, cliente);

             });

             $('#btn_recargar_edp').on('click', function() {

                var cliente = <?php echo $idCliente?> ;
                var orden = <?php echo $idOrden?>;
                var proyecto = <?php echo $codProyecto?>;

                recargaEdp(orden, cliente, proyecto);

                });


                $('#btn_recargar_gara').on('click', function() {

                    var cliente = <?php echo $idCliente?> ;
                    var orden = <?php echo $idOrden?>;
                    var proyecto = <?php echo $codProyecto?>;

                    recargaGarantias(orden, cliente, proyecto);

                    });
                

            


             function recargaEdp(orden, cliente, proyecto) {

                    var edp_html = '';

                    var tabla_edp = $('#tbl_edp').DataTable();

                    var cod_empresa = '<?php echo $this->session->userdata('cod_emp');?>'

                    tabla_edp.destroy();

                    $.ajax({
                        url: '<?php echo base_url('index.php/Edp/listasEdp'); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            codEmpresa: cod_empresa,
                            idCliente: cliente,
                            idProyecto: proyecto,
                            idOrden: orden

                        },
                    }).done(function(result) {

                   
                        $.each(result.edps, function(key, edp) {
                            edp_html += '<tr>';
                            edp_html += '<td>' + edp.ID_EMPLEADO + '</td>';
                            edp_html += '<td>' + edp.FECHA_INGRESO + '</td>';
                            edp_html += '<td>' + edp.NUM_EDP + '</td>';
                            edp_html += '<td>' + edp.ESTADO_EDP + '</td>';
                            edp_html += '<td>' + edp.FECHA_PAGO + '</td>';
                            edp_html += '<td>' + edp.AP_PROVEEDOR + '</td>';
                            edp_html += '<td>' + edp.PROVEEDOR + '</td>';
                            edp_html += '<td>' + edp.IMPORTE_EDP + '</td>';
                            edp_html += '<td>' + edp.SALDO_INSOLUTO_EDP + '</td>';
                            edp_html += '<td>' + edp.RESPALDO + '</td>';
                            edp_html += '<td>' + edp.COMENTARIOS + '</td>';
                            edp_html += '</tr>';

                        });


                        $('#datos_edp').html(edp_html);
                        $('#tbl_edp').DataTable({
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
                        }).buttons().container().appendTo('#tbl_corden_wrapper .col-md-6:eq(0)');

                    }).fail(function() {
                        console.log("error change cliente");
                    })

                    }

             function recargaControlOrden(orden, cliente) {

                 var calidad_html = '';

                 var tabla_calidad = $('#tbl_corden').DataTable();



                 tabla_calidad.destroy();

                 $.ajax({
                     url: '<?php echo base_url('index.php/Journal/obtieneJournalOrden'); ?>',
                     type: 'POST',
                     dataType: 'json',
                     data: {
                         id_orden_compra: orden,
                         id_cliente: cliente,
                         filtro: <?php echo $filtro;?>
                     },
                 }).done(function(result) {


                     $.each(result.journals, function(key, journal) {
                         calidad_html += '<tr>';
                         calidad_html += '<td>' + journal.nombre_empleado + '</td>';
                         calidad_html += '<td>' + journal.fecha_ingreso + '</td>';
                         calidad_html += '<td>' + journal.numero_referencial + '</td>';
                         calidad_html += '<td>' + journal.tipo_interaccion + '</td>';
                         calidad_html += '<td>' + journal.solicitado_por + '</td>';
                         calidad_html += '<td>' + journal.aprobado_por + '</td>';
                         calidad_html += '<td>' + journal.comentarios_generales + '</td>';
                         calidad_html += '<td>' + journal.respaldos + '</td>';
                         calidad_html += '</tr>';

                     });


                     $('#datos_corden').html(calidad_html);
                     $('#tbl_corden').DataTable({
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
                        }).buttons().container().appendTo('#tbl_corden_wrapper .col-md-6:eq(0)');

                 }).fail(function() {
                     console.log("error change cliente");
                 })

             }



function recargaGarantias(orden, cliente, proyecto) {

var garantias_html = '';

var tabla_garantias = $('#tbl_garantias').DataTable();

var cod_empresa = '<?php echo $this->session->userdata('cod_emp');?>'

tabla_garantias.destroy();

$.ajax({
    url: '<?php echo base_url('index.php/Garantias/listasGarantias'); ?>',
    type: 'POST',
    dataType: 'json',
    data: {
        codEmpresa: cod_empresa,
        idCliente: cliente,
        idProyecto: proyecto,
        idOrden: orden

    },
}).done(function(result) {


    $.each(result.garantias, function(key, garantia) {
        garantias_html += '<tr>';
        garantias_html += '<td>' + garantia.ID_EMPLEADO, + '</td>';
        garantias_html += '<td>' + garantia.FECHA_EMISION, + '</td>';
        garantias_html += '<td>' + garantia.NUMERO_DOCTO, + '</td>';
        garantias_html += '<td>' + garantia.TIPO_GARANTIA, + '</td>';
        garantias_html += '<td>' + garantia.REFERENCIA, + '</td>';
        garantias_html += '<td>' + garantia.MONTO, + '</td>';
        garantias_html += '<td>' + garantia.VENCIMIENTO, + '</td>';
        garantias_html += '<td>' + garantia.DIAS_VENCIMIENTO, + '</td>';
        garantias_html += '<td>' + garantia.RESPALDO, + '</td>';

        garantias_html += '</tr>';

    });


    $('#datos_garantias').html(garantias_html);
    $('#tbl_garantias').DataTable({
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
    }).buttons().container().appendTo('#tbl_corden_wrapper .col-md-6:eq(0)');

}).fail(function() {
    console.log("error change cliente");
})

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
                 $('#datemask2').inputmask('mm/dd/yyyy', {
                     'placeholder': 'mm/dd/yyyy'
                 })
                 //Money Euro
                 $('[data-mask]').inputmask()



             })
             </script>

