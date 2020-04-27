 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Registros Control Calidad</h1>
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
                         <h3 class="card-title"></h3>
                     </div>
                     <div class="col-md-12">
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
                                     <dt class="col-sm-4">Order ID:</dt>
                                     <dd class="col-sm-6"><?php #echo $PurchaseOrderID;?></dd>
                                     <dt class="col-sm-4">Descripción:</dt>
                                     <dd class="col-sm-6"><?php #echo urldecode($purchaseOrdername);?></dd>
                                     </dd>
                                 </dl>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                     <br />
                     <table class="table" cellspacing="0" width="99%">
                                 <tbody>
                                     <tr>
                                         <th>
                                             <button  id="btn_recargar" class="btn btn-outline-secondary float-right">Recargar</button>
                                             <button id="btn_nuevo_registro" class="btn btn-outline-primary float-right">Nuevo Registro</button>
                                         </th>
                                     </tr>
                                 </tbody>
                             </table>

                             <br />

                         <table id="tbl_ccalidad" class="table table-striped table-bordered" cellspacing="0">                             <thead>
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
                             <tbody id="datos_ccalidad">
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>


       <script type="text/javascript">
            
            $('#btn_recargar').on('click', function(){
            
                var cliente = <?php echo $idCliente?>;
                 var orden = <?php echo $idOrden?>;

                 recargaControlCalidad(orden, cliente);

            });

            $('#btn_nuevo_registro').on('click', function(){
            
                var element = document.getElementById('mailFrm');

                if (element.style.display === "block") {
                        element.style.display = "none";
                    }  
                
                $('#miForm')[0].reset();   
                $('#modal_control_calidad').modal('show');

        });

     function envioCorreo(orden){

        var arrayEmail = new Array();
           var inputEmails = document.getElementsByClassName('varEmail'),
           emailValues = [].map.call(inputEmails,function(dataEmail){
                arrayEmail.push(dataEmail.value);
           });

           arrayEmail.forEach(function(inputsValuesData){
               console.log("El dato es: "+ inputsValuesData);

           });


     }


     /**
 * Función que pone el archivo en un FormData
 * @return FormData
 */
            function getFiles()
            {
                var idFiles=document.getElementById("var_respaldos");
                // Obtenemos el listado de archivos en un array
                var archivos=idFiles.files;
                // Creamos un objeto FormData, que nos permitira enviar un formulario
                // Este objeto, ya tiene la propiedad multipart/form-data
                var data=new FormData();
                // Recorremos todo el array de archivos y lo vamos añadiendo all
                // objeto data
                for(var i=0;i<archivos.length;i++)
                {
                    // Al objeto data, le pasamos clave,valor
                    data.append("archivo"+i,archivos[i]);
                }
                return data;
            }
 
/**
 * Función que recorre todo el formulario para apadir en el FormData los valores del formulario
 * @param string id hace referencia al id del formulario
 * @param FormData data hace referencia al FormData
 * @return FormData
 */
function getFormData(id,data)
{
	$("#"+id).find("input,select,textarea").each(function(i,v) {
        if(v.type!=="file") {
            if(v.type==="checkbox" && v.checked===true) {
                data.append(v.name,"on");
            }else{
                data.append(v.name,v.value);
            }
        }
	});
	return data;
}


      function Guardar() {

      


        var data=getFiles();
        data=getFormData("miForm",data);
          

                $.ajax({
                url: 		'<?php echo base_url('index.php/Journal/guardarJournal'); ?>',
                type:"POST",
                data:data,
                dataType:"json",
                contentType:false,
                processData:false,
                cache:false
                }).done(function(result) {
                   
                if(result.resp){

                    //recargaControlCalidad(orden, cliente);
                    //envioCorreo(orden);
                    $('#modal_control_calidad').modal('hide');

                    toastr.success(result.mensaje);

                    
                }else{

                    $('#modal_control_calidad').modal('hide');
                    toastr.warning(result.mensaje);
                }
                    

                }).fail(function() {
                console.log("error guardar proy");
                })

           }

        function MostrarEmail(selectObj) { 

                // get the index of the selected option 
                var idx = selectObj.selectedIndex; 
                // get the value of the selected option 
                var which = selectObj.options[idx].value; 
                var element = document.getElementById('mailFrm');

                if (which === 'S'){

                    

                    if (element.style.display === "none") {
                        element.style.display = "block";
                    } else {
                        element.style.display = "none";
                    }       


                }else{
                
                    if (element.style.display === "block") {
                        element.style.display = "none";
                    } else {
                        element.style.display = "block";
                    }  

                }


                }
            
            

             function recargaControlCalidad(orden, cliente) {

                        var calidad_html = '';

                        var tabla_calidad = $('#tbl_ccalidad').DataTable();



                        tabla_calidad.destroy();

                        $.ajax({
                            url: '<?php echo base_url('index.php/Journal/obtienejournalCalidad'); ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id_orden_compra: orden,
                                id_cliente: cliente
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
                                    '<button data-toggle="tooltip" data-placement="top" title="Desactiva Registro" onclick="desactiva_registro_cc(' +
                                    journal.id_interaccion +
                                    ')" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                                calidad_html += '</td>';
                                calidad_html += '</tr>';

                            });


                            $('#datos_ccalidad').html(calidad_html);
                            $('#tbl_ccalidad').DataTable({
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

               
             $(document).ready(function() {
               
                


                
                 var cliente = <?php echo $idCliente?>;
                 var orden = <?php echo $idOrden?>;

                 recargaControlCalidad(orden, cliente);



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
                var fieldHTML = '<div col-md-12>'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text"><i class="fas fa-envelope"></i></span>'+
                                    '<input type="text" name="var_email" value="" class="form-control varEmail"/>'+
                                '<a href="javascript:void(0);" class="btn btn-block btn-outline-danger btn-sm remove_button" title="Add field"><i class="far fa-envelope"></i> Eliminar Mail</a>'+
                                '</div>'+
                            '</div>'; //New input field html 



               //Once add button is clicked
                    $(addButton).click(function(){
                        //Check maximum number of input fields
                        if(x < maxField){ 
                            x++; //Increment field counter
                            $(wrapper).append(fieldHTML); //Add field html
                        }
                    });
                    
                    //Once remove button is clicked
                    $(wrapper).on('click', '.remove_button', function(e){
                        e.preventDefault();
                        $(this).parent('div').remove(); //Remove field html
                        x--; //Decrement field counter
                    });




             });


            
             </script>





             <!--.modal nuevo control Calidad-->
             <div id="modal_control_calidad" class="modal fade" tabindex="-1" role="dialog">
                 <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">

                         <div class="modal-header">
                             <h5 class="modal-title">Nuevo Registro Control Calidad</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="container">
                                 <form  id="miForm" class="form-horizontal" enctype="multipart/form-data" method="post">
                                     <div class="col-md-12">

                                         <div class="form-group" data-select2-id="89">
                                             <div class="form-group">
                                                 <label class="control-label col-md-9">Nombre Empleado</label>
                                                 <div class="col-md-12">
                                                 <input name="nombre_empleado" placeholder="" class="form-control"
                                                     type="text" value="<?php echo $nombreEmpleador;?>" disabled>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group" data-select2-id="89">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Tipo Interaccion</label>
                                                     <div class="col-md-12">
                                                         <select name="tipo_interaccion" id="var_tipo_interaccion"
                                                             class="form-control select2bs4 select2-hidden-accessible"
                                                             style="width: 100%;" data-select2-id="17" tabindex="-1"
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
                                             <label class="control-label col-md-9">Fecha Ingreso</label>
                                             <div class="col-md-12">
                                                 <div class="input-group">
                                                     <div class="input-group-prepend">
                                                         <span class="input-group-text"><i
                                                                 class="far fa-calendar-alt"></i></span>
                                                     </div>
                                                     <input name="fecha_ingreso" type="text" class="form-control" id="var_fecha_ingreso"
                                                         data-inputmask-alias="datetime"
                                                         data-inputmask-inputformat="dd-mm-yyyy" data-mask=""
                                                         im-insert="false">
                                                 </div>
                                             </div>
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
                                                 <textarea id="var_comentarios_generales" name="comentarios_generales" class="form-control" rows="10" placeholder="Ingresar ..."></textarea>
                                                 <span class="help-block"></span>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="col-md-12">

                                     
                                            <div class="form-group">
                                                <label for="exampleInputFile">Respaldo</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <input id="var_respaldos" name="respaldos" type="file" class="custom-file-input" id="exampleInputFile"  data-allowed-file-extensions="[doc,docx,pdf,csv,txt,DOC,DOCX,PDF,CSV,TXT,xls,xlsx,XLS,XLSX]"
                                                    accept=".doc,.docx,.pdf,.csv,.txt,.DOC,.DOCX,.PDF,.CSV,.TXT,.xls,.xlsx,.XLS,.XLSX">
                                                    <label class="custom-file-label" for="exampleInputFile">Seleccionar Archivo</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                                </div>
                                            </div>

                                     </div>



                                     <div class="col-md-12">
                                         <div class="form-horizontal">
                                             <div class="form-group" data-select2-id="89">
                                                 <div class="form-group">
                                                     <label class="control-label col-md-9">Notificar</label>
                                                     <div class="col-md-12">
                                                         <select name="tipo_interaccion" id="select_interaccion" 
                                                             class="form-control select2bs4 select2-hidden-accessible"
                                                             style="width: 100%;" data-select2-id="17" tabindex="-1"
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
                                     <input type="hidden" id="id_orden_compra" name="id_orden_compra" value="<?php echo $idOrden?>">
                                     <input type="hidden" id="id_cliente"  name="id_cliente" value="<?php echo $idCliente?>">
                                     <input type="hidden" id="id_proyecto" name="id_proyecto" value="<?php echo $codProyecto?>">
                                     <input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $this->session->userdata('id_usuario')?>">
                                  
                                    <div id="mailFrm" style="display: none;" class="col-md-12">
                                         <div class="field_wrapper">
                                         <table class="table table-striped table-bordered" cellspacing="1" width="99%">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0);" class="btn btn-block btn-outline-success btn-sm add_button" title="Add field"><i class="far fa-envelope"></i> Agregar Mail</a>
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
                             <button id="btn-guardar"  onclick="Guardar();" type="button" class="btn btn-outline-primary">Guardar</button>
                             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                         </div>
                     </div>
                 </div>
             </div>