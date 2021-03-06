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
                                             <dd class="col-sm-9"><?php echo $PurchaseOrderNumber;?></dd>
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
                                     <th>Usuario</th>
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
                                 ESTADOS DE PAGO
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table" cellspacing="0" width="100%">
                             <tbody>
                                 <tr>
                                     <td>
                                     <dl class="row">
                                             <dt class="col-sm-8">ORDEN DE COMPRA:</dt>
                                             <dd class="col-sm-9"><?php echo $PurchaseOrderNumber;?></dd>
                                             <dt class="col-sm-8">MONTO ORDEN DE COMPRA:</dt>
                                             <dd class="col-sm-9"><?php echo urldecode($montoOrden);?>
                                             
                                         </dl>
                                    </td>
                                    <td>
                                     <dl class="row">
                                             <dt class="col-sm-8">DESCRIPCIÓN ORDEN:</dt>
                                             <dd class="col-sm-9"><?php echo $PurchaseOrderDescription;?></dd>
                                             <dt class="col-sm-8">Monto Pagado</dt>
                                             <dd id="monto_pagado" class="col-sm-9">11111</dd>
                                             <dt class="col-sm-8">Monto Por Pagar</dt>
                                             <dd id="monto_por_pagar"class="col-sm-9">11111</dd>
                                             
                                         </dl>
                                    </td>
                                 </tr>

                                 
                             </tbody>
                         </table>
                         <table class="table" cellspacing="0" width="99%">
                             <tbody>
                                 <tr>
                                     <th>
                                     <button id="btn_recargar_edp"
                                             class="btn btn-outline-secondary float-right"><i class="fas fa-spinner">
                                                     </i>  Actualizar</button>
                                         <button id="btn_nuevo_registro_edp"
                                             class="btn btn-outline-primary float-right">Nuevo Registro</button>
                                 </tr>
                             </tbody>
                         </table>
                         <table id="tbl_edp" class="table table-striped table-bordered" cellspacing="0" width=100%>
                             <thead>
                             <tr>
                                <th>ACCIONES</th>
                                <th>Usuario</th>
                                <th>FECHA INGRESO EDP</th>
                                <th>N° EDP</th>
                                <th>ESTADO</th>
                                <th>FECHA DE PAGO</th>
                                <th>ACTUAL / PROGRAMADO</th>
                                <th>PROVEEDOR</th>
                                <th>IMPORTE EDP</th>
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
                                 <th>Usuario</th>
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
                            edp_html +='<button data-toggle="tooltip" data-placement="left" title="Editar Registro" onclick="editar_edp('+ edp.ID_EDP +')" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-edit"></i></button>'+
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
                            edp_html += '<td>' + edp.RESPALDO + '</td>';
                            edp_html += '<td>' + edp.COMENTARIOS + '</td>';
                            edp_html += '</tr>';

                        });

                        $('#monto_pagado').html(result.monto_pagado);
                        $('#monto_por_pagar').html(result.monto_por_pagar);

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

function editar_edp(id_edp){


$.ajax({
  url: 		'<?php echo base_url('index.php/Edp/obtieneEdp'); ?>',
  type: 		'POST',
  dataType: 'json',
  data: {
    id_edp: id_edp
        },
}).done(function(result) {
    
    $('#ID_EDP').val(result.datos_edt.ID_EDP);
    $('#ACT_ID_EMPLEADO').val(result.datos_edt.ID_EMPLEADO);
    $('#ACT_FECHA_INGRESO').val(result.datos_edt.FECHA_INGRESO);
    $('#select_act_estado_edp').html(result.datos_edt.select_act_estado_edp);
    $('#select_act_apedp').html(result.datos_edt.select_act_apedp);
    $('#ACT_FECHA_PAGO').val(result.datos_edt.FECHA_PAGO);
    $('#ACT_PROVEEDOR').val(result.datos_edt.PROVEEDOR);
    $('#ACT_IMPORTE_EDP').val(result.datos_edt.IMPORTE_EDP);
    $('#ACT_COMENTARIOS').val(result.datos_edt.COMENTARIOS);

   

  $('#modal_act_edp').modal('show');


}).fail(function() {
  console.log("error edita_proyecto");
})



}



function Actualizar_Edp() {


// validar campos
var valido = false;
var falso = 0;

data = new FormData(document.getElementById("formActEdp"));

var cliente = <?php echo $idCliente?> ;
                var orden = <?php echo $idOrden?>;
                var proyecto = <?php echo $codProyecto?>;

             
   $.ajax({
           url: '<?php echo base_url('index.php/Edp/ActualizaEdp');?>',
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

                       $('#modal_act_edp').modal('hide');
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

             </script>


             <script>
             $(function() {
                 //Initialize Select2 Elements


             



             })
             </script>



<!--.modal nuevo orden-->
<div class="modal fade" id="modal_control_calidad">
     <div class="modal-dialog modal-xl  modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">NUEVO REGISTRO GESTIÓN DE ACTIVACIÓN</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form action="#" id="miForm" class="form-horizontal">

                <input type="hidden" id="tipo" name="tipo" value="2">
                <input type="hidden" id="id_orden_compra" name="id_orden_compra" value="<?php echo $idOrden?>">  
                <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $idCliente?>">
                <input type="hidden" id="id_proyecto" name="id_proyecto" value="<?php echo $codProyecto?>">
                <input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $this->session->userdata('id_usuario')?>">

                     <section class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">GESTIÓN DE ACTIVACIÓN</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                        <div class="col-md-12">
                                                           
                                                        <div class="form-group"><label for="NOMBRE EMPELADO">NOMBRE EMPELADO</label><input name="nombre_empleado" placeholder="" class="form-control" type="text" value="<?php echo $nombreEmpleador;?>" readonly></div>
                                                            <div class="form-group"><label for="TIPO INTERACCION<">TIPO INTERACCION</label> <select name="tipo_interaccion" id="var_tipo_interaccion" class="form-control"  style="width: 100%;"  tabindex="-1"  aria-hidden="true"> <?php echo $select_cc;?></select></div>
                                                            <div class="form-group"><label for="NUMERO REFERENCIAL"> NÚMERO REFERENCIAL</label>  <input name="numero_referencial" placeholder="" class="form-control" type="text" id="var_numero_referencial"></div>
                                                            <div class="form-group"><label for="SOLICITADOR POR">SOLICITADOR POR</label><input name="solicitado_por" placeholder="" class="form-control" type="text" id="var_solicitado_por"></div>
                                                            <div class="form-group"><label for="APROBADO POR">APROBADO POR</label><input name="aprobado_por" placeholder="" class="form-control" type="text" id="var_aprobado_por"></div>
                                                            <div class="form-group"><label for="COMENTARIOS GENERALES">COMENTARIOS GENERALES</label><textarea id="var_comentarios_generales" name="comentarios_generales" class="form-control" rows="10" placeholder="Ingresar ..."></textarea></div>
                                                            <div class="form-group"><label for="APROBADO POR">RESPALDO</label><input type="file"  class="form-control" id="var_respaldos" name="respaldos"></div>
                                                            <div class="form-group"><label for="NOTIFICAR">NOTIFICAR</label> <select name="notificacion" id="select_interaccion" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" onchange="MostrarEmail(this);"><option value="" selected></option> <option value="S">SI</option> <option value="N">NO</option></select></div>

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
                                            <h3 class="card-title">NOTIFICAR POR EMAIL</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                                <div class="card-body">
                                                  <div class="row show-grid">

                                                    <div class="col-md-12">

                                                        <div id="mailFrm" style="display: none;" class="col-md-12">    
                                                                <div class="field_wrapper">
                                                                    <table class="table table-striped table-bordered" cellspacing="1" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>
                                                                                    <div class="col-md-12">
                                                                                        <a href="javascript:void(0);"
                                                                                            class="btn btn-block btn-primary add_button"
                                                                                            title="Add field"><i class="far fa-envelope"></i>
                                                                                            Agregar Mail</a>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                         </div>
                                                          
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
                    <button onclick="Guardar();" type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
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
                                <div class="form-group"><label for="FECHA INGRESO">FECHA INGRESO</label><input type="text" id="FECHA_INGRESO" class="form-control fechapicker" name="FECHA_INGRESO"></div>
                                <div class="form-group"><label for="ESTADO EDP">ESTADO EDP</label>
                                <select name="ESTADO_EDP" id="ESTADO_EDP" class="form-control">
                                                             <?php echo $select_edp;?>
                                                         </select></div>
                                <div class="form-group"><label for="FECHA PAGO">FECHA PAGO</label><input type="text" id="FECHA_PAGO" class="form-control fechapicker" name="FECHA_PAGO"></div>
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


             <!--.modal actualizar control Calidad-->
             <div id="modal_act_edp" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Editar Registro EDP</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="container">
                                 <form id="formActEdp" class="form-horizontal" enctype="multipart/form-data" method="post">
                                
                            
                                <input type="hidden" id="ID_EDP" class="form-control" name="ID_EDP">

                                
                                <div class="form-group"><label for="ID EMPLEADO">ID EMPLEADO</label><input type="text" id="ACT_ID_EMPLEADO" class="form-control" name="ACT_ID_EMPLEADO" readonly></div>
                                <div class="form-group"><label for="FECHA INGRESO">FECHA INGRESO</label><input type="text" id="ACT_FECHA_INGRESO" class="form-control fechapicker" name="ACT_FECHA_INGRESO"></div>
                                <div class="form-group"><label for="ESTADO EDP">ESTADO EDP</label><div id="select_act_estado_edp"></div></div>
                                <div class="form-group"><label for="FECHA PAGO">FECHA PAGO</label><input type="text" id="ACT_FECHA_PAGO" class="form-control fechapicker" name="ACT_FECHA_PAGO"></div>
                                <div class="form-group"><label for="AP PROVEEDOR">AP PROVEEDOR</label> <div id="select_act_apedp"></div></div>
                                <div class="form-group"><label for="PROVEEDOR">PROVEEDOR</label><input type="text" id="ACT_PROVEEDOR" class="form-control" name="ACT_PROVEEDOR"></div>
                                <div class="form-group"><label for="IMPORTE EDP">IMPORTE EDP</label><input type="text" id="ACT_IMPORTE_EDP" class="form-control" name="ACT_IMPORTE_EDP" onkeyup="formatoNumero(this)" onchange="formatoNumero(this)"></div> 
                                <div class="form-group"><label for="COMENTARIOS">COMENTARIOS</label><input type="textarea" id="ACT_COMENTARIOS" class="form-control" name="ACT_COMENTARIOS"></div>
                                <div class="form-group"><label for="RESPALDO">RESPALDO</label><div class="custom-file"> <input type="file" id="ACT_RESPALDO" name="ACT_RESPALDO"> </div>
                                </div>
                                 



                                 </form>

                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button onclick="Actualizar_Edp();" type="button"
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
                                <div class="form-group"><label for="FECHA EMISION">FECHA EMISION</label><input type="text" id="FECHA_EMISION" class="form-control fechapicker" name="FECHA_EMISION"></div>
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

