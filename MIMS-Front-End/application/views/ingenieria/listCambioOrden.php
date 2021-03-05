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
                         </div>
                         <!-- /.row -->
                     <!-- /.card-header -->
                    
                     </div>
                     <div class="col-12">  
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
                                         <button id="btn_nuevo_registro"
                                             class="btn btn-outline-primary float-right">Nuevo Registro</button>
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
                                     <th>Acciones</th>
                                 </tr>
                             </thead>
                             <tbody id="datos_corden">
                             </tbody>
                         </table>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="col-12">  

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
                                         <button id="btn_nuevo_registro_edp"
                                             class="btn btn-outline-primary float-right">Nuevo Registro</button>
                                    </td>
                                 </tr>

                                 
                             </tbody>
                         </table>
                         <table id="tbl_edp" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                             <tr>
                                <th>ACCIONES</th>
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
                        </div>
                        <div class="col-12">  

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
                                         <button id="btn_nuevo_registro_gara"
                                             class="btn btn-outline-primary float-right">Nuevo Registro</button>
                                    </th>
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_garantias" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                                 <tr>
                                 <th>ACCION</th>
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
                 </div> 
                 

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
                

             $('#btn_nuevo_registro').on('click', function() {

                var element = document.getElementById('mailFrm');

                    if (element.style.display === "block") {
                        element.style.display = "none";
                    }

               

                 $('#miForm')[0].reset();
                 $('#modal_control_calidad').modal('show');
                 $('#nombre_empleado').val('<?php echo $nombreEmpleador;?>');
                 $('#name_respaldo').html("");

             });

                 $('#btn_nuevo_registro_edp').on('click', function() {
 
              
                    $('#formEdp')[0].reset();
                    $('#modal_edp').modal('show');
                    $('#ID_EMPLEADO').val('<?php echo $nombreEmpleador;?>');
                    $('#ID_CLIENTE').val('<?php echo $idCliente;?>');
                    $('#ID_PROYECTO').val('<?php echo $codProyecto;?>');
                    $('#ID_ORDEN').val('<?php echo $idOrden;?>');
                   // $('#name_respaldo').html("");

                    });

                    $('#btn_nuevo_registro_gara').on('click', function() {
 
              
                        $('#formGarantias')[0].reset();
                        $('#modal_garantias').modal('show');
                        $('#ID_EMPLEADO_GARA').val('<?php echo $nombreEmpleador;?>');
                        $('#ID_CLIENTE_GARA').val('<?php echo $idCliente;?>');
                        $('#ID_PROYECTO_GARA').val('<?php echo $codProyecto;?>');
                        $('#ID_ORDEN_GARA').val('<?php echo $idOrden;?>');
                        // $('#name_respaldo').html("");

                        });


                    

             function envioCorreo(idInsertado) {

                 var arrayEmail = new Array();
                 var inputEmails = document.getElementsByClassName('varEmail'),
                     emailValues = [].map.call(inputEmails, function(dataEmail) {
                         arrayEmail.push(dataEmail.value);
                     });

                 arrayEmail.forEach(function(inputsValuesData) {



                     let idControlCalidad = idInsertado;
                     let email = inputsValuesData;
                     let cod_empresa = '<?php echo $this->session->userdata('cod_emp');?>'
                     $.ajax({
                         url: '<?php echo base_url('index.php/Journal/enviarMail'); ?>',
                         type: 'POST',
                         dataType: 'json',
                         data: {
                             id_control_calidad: idControlCalidad,
                             email: email,
                             cod_empresa: cod_empresa
                         },
                     }).done(function(result) {

                         if (result.resp) {
                             toastr.success(result.mensaje);
                         } else {
                             toastr.error(result.mensaje);
                         }


                     }).fail(function() {
                         console.log("error guardar proy");
                     })

                 });


             }
             function ver_archivo(){
                
                var archivo = document.getElementById('var_respaldos').value;
                var nombre = archivo.substring(archivo.lastIndexOf("\\")+1,archivo.length-4);
                $('#name_respaldo').html(nombre);
             }

           function Guardar() {


                 // validar campos
                 var valido = false;
                 var falso = 0;

                 data = new FormData(document.getElementById("miForm"));

                 var cliente = <?php echo $idCliente?>;
                 var orden = <?php echo $idOrden?>;


                 if (!validatefecha(data.get('fecha_ingreso'))) {

                     toastr.warning('Fecha incorrecta, favor validar');

                 } else {

                    
                    if (data.get('notificacion') === 'S') {

                            var arrayEmail = new Array();
                            var inputEmails = document.getElementsByClassName('varEmail'),
                                emailValues = [].map.call(inputEmails, function(dataEmail) {
                                    arrayEmail.push(dataEmail.value);
                                });

                                    arrayEmail.forEach(function(inputsValuesData) {

                                            let email = inputsValuesData;
                                            if (!validateEmail(email)) {
                                            falso++;
                                            }
                                            if (falso > 0) {

                                                toastr.warning('Email: ' + email + ' no valido, favor revisar.');
                                        }                
                                    });
                    } 
                 
                 
                 }
                 


                 
                 if(falso == 0 ){

  

                    $.ajax({
                            url: '<?php echo base_url('index.php/Journal/guardarJournal');?>',
                            type: 'post',
                            data: data,
                            contentType: false,
                            processData: false,
                            dataType: "JSON",
                            beforeSend: function(){
                            mostrarBlock();
                            },
                            success: function(result){

                                if (result.resp) {

                                        $('#modal_control_calidad').modal('hide');
                                        recargaControlOrden(orden, cliente);
                                        toastr.success(result.mensaje);


                                        if (data.get('notificacion') === 'S') {

                                            envioCorreo(result.idInsertado);
                                        }


                                        }else{

                                        toastr.warning(result.mensaje);
                                        }

                            },
                            complete:function(result){
                                $.unblockUI();
                            },
                            error: function(request, status, err) {
    
                            toastr.error("error: " + request + status + err);
      
       }
                            });

                 }


             }

             function MostrarEmail(selectObj) {

                 // get the index of the selected option 
                 var idx = selectObj.selectedIndex;
                 // get the value of the selected option 
                 var which = selectObj.options[idx].value;
                 var element = document.getElementById('mailFrm');

                 if (which === 'S') {



                     if (element.style.display === "none") {
                         element.style.display = "block";
                     } else {
                         element.style.display = "none";
                     }


                 } else {

                     if (element.style.display === "block") {
                         element.style.display = "none";
                     } else {
                         element.style.display = "none";
                     }

                 }


             }

             


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
                            edp_html += '<td>';
                            edp_html +=
                                '<button data-toggle="tooltip" data-placement="left" title="Elimina Registro" onclick="elimina_edp(' +
                                edp.ID_EDP +','+ orden + ',' + cliente + ',' +  proyecto +
                                ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            edp_html += '</td>';
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
                         calidad_html += '<td>';
                         calidad_html +=
                             '<button data-toggle="tooltip" data-placement="left" title="Desactiva Registro" onclick="desactiva_registro_cc(' +
                             journal.id_interaccion +','+ orden + ',' + cliente +
                             ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                         calidad_html += '</td>';
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


             function desactiva_registro_cc(id_interaccion, orden, cliente){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

      $.ajax({
      url: 		'<?php echo base_url('index.php/Journal/desactivaJournal'); ?>',
      type: 		'POST',
      dataType: 'json',
      data: {
        id_interaccion  : id_interaccion,
              id_orden : orden
            },
    }).done(function(result) {

      if(result.resp){

        recargaControlOrden(orden, cliente)
        toastr.success(result.mensaje);

      }else{

        toastr.error(result.mensaje);
      
      }
        

    }).fail(function() {
      console.log("error eliminar journal");
    })
  

}     
             }

             function Guardar_Edp() {


// validar campos
var valido = false;
var falso = 0;

data = new FormData(document.getElementById("formEdp"));

var cliente = <?php echo $idCliente?> ;
                var orden = <?php echo $idOrden?>;
                var proyecto = <?php echo $codProyecto?>;

             
   $.ajax({
           url: '<?php echo base_url('index.php/Edp/guardarEdp');?>',
           type: 'post',
           data: data,
           contentType: false,
           processData: false,
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {

                       $('#modal_edp').modal('hide');
                       recargaEdp(orden, cliente, proyecto);

                       toastr.success(result.mensaje);


                       }else{

                       toastr.warning(result.mensaje);
                       }

           },
           complete:function(result){
               $.unblockUI();
           },
           error: function(request, status, err) {

           toastr.error("error: " + request + status + err);

}
           });


}



function elimina_edp(ID_EDP ,orden, cliente,proyecto){

var opcion = confirm("Esta seguro que quiere borrar este registro");

if(opcion){

    $.ajax({
    url: 		'<?php echo base_url('index.php/Edp/eliminaEdp'); ?>',
    type: 		'POST',
    dataType: 'json',
    data: {
        ID_EDP  : ID_EDP
            },
    }).done(function(result) {

    if(result.resp){

        recargaEdp(orden, cliente, proyecto);
        toastr.success(result.mensaje);

    }else{

        toastr.error(result.mensaje);

    }
        

    }).fail(function() {
    console.log("error eliminar bucksheet");
    })


}

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
        garantias_html += '<td>';
        garantias_html +=
            '<button data-toggle="tooltip" data-placement="left" title="Elimina Registro" onclick="elimina_garantia(' +
            garantia.ID_GARANTIA +','+ orden + ',' + cliente + ',' +  proyecto +
            ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
            garantias_html += '</td>';
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


function Guardar_Garantias() {


// validar campos
var valido = false;
var falso = 0;

data = new FormData(document.getElementById("formGarantias"));

var cliente = <?php echo $idCliente?> ;
                var orden = <?php echo $idOrden?>;
                var proyecto = <?php echo $codProyecto?>;

             
   $.ajax({
           url: '<?php echo base_url('index.php/Garantias/guardarGarantias');?>',
           type: 'post',
           data: data,
           contentType: false,
           processData: false,
           dataType: "JSON",
           beforeSend: function(){
           mostrarBlock();
           },
           success: function(result){

               if (result.resp) {

                       $('#modal_garantias').modal('hide');
                       recargaGarantias(orden, cliente, proyecto);

                       toastr.success(result.mensaje);


                       }else{

                       toastr.warning(result.mensaje);
                       }

           },
           complete:function(result){
               $.unblockUI();
           },
           error: function(request, status, err) {

           toastr.error("error: " + request + status + err);

}
           });


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


             <!--.modal nuevo control Calidad-->
             <div id="modal_control_calidad" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Nuevo Registro Gestión de Activación</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="container">
                                 <form id="miForm" class="form-horizontal" enctype="multipart/form-data" method="post">
                                     <div class="col-md-12">

                                         <div class="form-group" data-select2-id="89">
                                             <div class="form-group">
                                                 <label class="control-label col-md-9">Nombre Empleado</label>
                                                 <div class="col-md-12">
                                                     <input name="nombre_empleado" placeholder="" class="form-control"
                                                         type="text" value="<?php echo $nombreEmpleador;?>" readonly>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Tipo Interaccion</label>
                                                     <div class="col-md-12">
                                                         <select name="tipo_interaccion" id="var_tipo_interaccion"
                                                             class="form-control"
                                                             style="width: 100%;"  tabindex="-1"
                                                             aria-hidden="true">
                                                             <?php echo $select_cc;?>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!--.form-horizontal-->
                                     </div>



                                     <div class="col-md-12">


                                     <div class="form-group">
                                             <label>Fecha Ingreso</label>

                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="far fa-calendar-alt"></i></span>
                                                 </div>
                                                 <input name="fecha_ingreso"  id="fecha_ingreso"  type="text" class="form-control"
                                                     data-inputmask-alias="datetime"
                                                     data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                                     im-insert="false">
                                             </div>
                                             <!-- /.input group -->
                                         </div>

                                     </div>




                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Numero Referencial</label>
                                             <div class="col-md-12">
                                                 <input name="numero_referencial" placeholder="" class="form-control"
                                                     type="text" id="var_numero_referencial">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>

                                     </div>




                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Solicitado por</label>
                                             <div class="col-md-12">
                                                 <input name="solicitado_por" placeholder="" class="form-control"
                                                     type="text" id="var_solicitado_por">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                         <!--.col-md-12-->

                                     </div>


                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Aprobado por</label>
                                             <div class="col-md-12">
                                                 <input name="aprobado_por" placeholder="" class="form-control"
                                                     type="text" id="var_aprobado_por">
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                         <!--.col-md-12-->

                                     </div>


                                     <div class="col-md-12">

                                         <div class="form-group">
                                             <label class="control-label col-md-3">Comentarios Generales</label>
                                             <div class="col-md-12">
                                                 <textarea id="var_comentarios_generales" name="comentarios_generales"
                                                     class="form-control" rows="10"
                                                     placeholder="Ingresar ..."></textarea>
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="col-md-12">


                                         <div class="form-group">
                                             <label for="exampleInputFile">Respaldo</label>
                                             <div class="custom-file">
                                                <input type="file"  onChange="ver_archivo();" class="custom-file-input" id="var_respaldos" name="respaldos" required="">
                                                <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                                             </div>
                                             <div>
                                                 <label>Archivo seleccionado: <p id="name_respaldo"></p></label>
                                             </div>
                                         </div>
                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Notificar</label>
                                                     <div class="col-md-12">
                                                         <select name="notificacion" id="select_interaccion"
                                                             class="form-control"
                                                             style="width: 100%;" tabindex="-1"
                                                             aria-hidden="true" onchange="MostrarEmail(this);">
                                                             <option value="" selected></option>
                                                             <option value="S">SI</option>
                                                             <option value="N">NO</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                     </div>

                                     <input type="hidden" id="tipo" name="tipo"
                                         value="2">
                                     <input type="hidden" id="id_orden_compra" name="id_orden_compra"
                                         value="<?php echo $idOrden?>">
                                     <input type="hidden" id="id_cliente" name="id_cliente"
                                         value="<?php echo $idCliente?>">
                                     <input type="hidden" id="id_proyecto" name="id_proyecto"
                                         value="<?php echo $codProyecto?>">
                                     <input type="hidden" id="id_empleado" name="id_empleado"
                                         value="<?php echo $this->session->userdata('id_usuario')?>">

                                     <div id="mailFrm" style="display: none;" class="col-md-12">
                                         <div class="field_wrapper">
                                             <table class="table table-striped table-bordered" cellspacing="1"
                                                 width="100%">
                                                 <tbody>
                                                     <tr>
                                                         <th>
                                                             <div class="col-md-12">
                                                                 <a href="javascript:void(0);"
                                                                     class="btn btn-block btn-outline-success btn-sm add_button"
                                                                     title="Add field"><i class="far fa-envelope"></i>
                                                                     Agregar Mail</a>
                                                             </div>
                                                         </th>
                                                     </tr>
                                                 </tbody>
                                             </table>

                                         </div>
                                     </div>
                                 </form>

                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button onclick="Guardar();" type="button"
                                 class="btn btn-outline-primary">Guardar</button>
                             <button type="button" class="btn btn-outline-secondary"
                                 data-dismiss="modal">Cerrar</button>
                         </div>
                     </div>
                 </div>
             </div>
    


             <!--.modal nuevo control Calidad-->
             <div id="modal_edp" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Nuevo Registro EDP</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="container">
                                 <form id="formEdp" class="form-horizontal" enctype="multipart/form-data" method="post">
                                
                                <input type="hidden" id="ID_CLIENTE" class="form-control" name="ID_CLIENTE">
                                <input type="hidden" id="ID_PROYECTO" class="form-control" name="ID_PROYECTO">
                                <input type="hidden" id="ID_ORDEN" class="form-control" name="ID_ORDEN">

                                
                                <div class="form-group"><label for="ID EMPLEADO">ID EMPLEADO</label><input type="text" id="ID_EMPLEADO" class="form-control" name="ID_EMPLEADO"></div>
                                <div class="form-group"><label for="FECHA INGRESO">FECHA INGRESO</label><input type="text" id="FECHA_INGRESO" class="form-control" name="FECHA_INGRESO"></div>
                                <div class="form-group"><label for="ESTADO EDP">ESTADO EDP</label>
                                <select name="ESTADO_EDP" id="ESTADO_EDP" class="form-control">
                                                             <?php echo $select_edp;?>
                                                         </select></div>
                                <div class="form-group"><label for="FECHA PAGO">FECHA PAGO</label><input type="text" id="FECHA_PAGO" class="form-control" name="FECHA_PAGO"></div>
                                <div class="form-group"><label for="AP PROVEEDOR">AP PROVEEDOR</label> 
                                 <select name="AP_PROVEEDOR" id="AP_PROVEEDOR" class="form-control">
                                                             <?php echo $select_apedp;?>
                                                         </select></div>
                                <div class="form-group"><label for="PROVEEDOR">PROVEEDOR</label><input type="text" id="PROVEEDOR" class="form-control" name="PROVEEDOR"></div>
                                <div class="form-group"><label for="IMPORTE EDP">IMPORTE EDP</label>
                                <input type="text" id="IMPORTE_EDP" class="form-control" name="IMPORTE_EDP" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)"></div> 
                                <div class="form-group"><label for="COMENTARIOS">COMENTARIOS</label><input type="textarea" id="COMENTARIOS" class="form-control" name="COMENTARIOS"></div>
                                <div class="form-group"><label for="RESPALDO">RESPALDO</label>
                                <div class="custom-file"> <input type="file" id="RESPALDO" name="RESPALDO"> </div>
                                </div>
                                 



                                 </form>

                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button onclick="Guardar_Edp();" type="button"
                                 class="btn btn-outline-primary">Guardar</button>
                             <button type="button" class="btn btn-outline-secondary"
                                 data-dismiss="modal">Cerrar</button>
                         </div>
                     </div>
                 </div>
             </div>



              <!--.modal nuevo control Calidad-->
              <div id="modal_garantias" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Nuevo Registro Garantia</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="container">
                                 <form id="formGarantias" class="form-horizontal" enctype="multipart/form-data" method="post">
                                
                                <input type="hidden" id="ID_CLIENTE_GARA" class="form-control" name="ID_CLIENTE_GARA">
                                <input type="hidden" id="ID_PROYECTO_GARA" class="form-control" name="ID_PROYECTO_GARA">
                                <input type="hidden" id="ID_ORDEN_GARA" class="form-control" name="ID_ORDEN_GARA">

                                <div class="form-group"><label for="ID EMPLEADO">ID EMPLEADO</label>
                                <input type="text" id="ID_EMPLEADO_GARA" class="form-control" name="ID_EMPLEADO_GARA" readonly>
                                </div>
                                <div class="form-group"><label for="FECHA EMISION">FECHA EMISION</label><input type="text" id="FECHA_EMISION" class="form-control" name="FECHA_EMISION"></div>
                                <div class="form-group"><label for="NUMERO DOCTO">NUMERO DOCTO</label><input type="text" id="NUMERO_DOCTO" class="form-control" name="NUMERO_DOCTO"></div>
                                <div class="form-group"><label for="TIPO GARANTIA">TIPO GARANTIA</label>
                                
                               <select name="TIPO_GARANTIA" id="TIPO_GARANTIA" class="form-control">
                                                             <?php echo $select_tipoGarantia;?>
                                                         </select>
                                
                                </div>
                                
                                <div class="form-group"><label for="REFERENCIA">REFERENCIA</label><input type="text" id="REFERENCIA" class="form-control" name="REFERENCIA"></div>
                                
                                <div class="form-group"><label for="VENCIMIENTO">VENCIMIENTO</label><input type="text" id="VENCIMIENTO" class="form-control" name="VENCIMIENTO"></div>
                              
                                <div class="form-group"><label for="RESPALDO">RESPALDO</label>
                                <div class="custom-file"> <input type="file" id="RESPALDO_GARA" name="RESPALDO_GARA"> </div>
                                </div>
                                 



                                 </form>

                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button onclick="Guardar_Garantias();" type="button"
                                 class="btn btn-outline-primary">Guardar</button>
                             <button type="button" class="btn btn-outline-secondary"
                                 data-dismiss="modal">Cerrar</button>
                         </div>
                     </div>
                 </div>
             </div>

