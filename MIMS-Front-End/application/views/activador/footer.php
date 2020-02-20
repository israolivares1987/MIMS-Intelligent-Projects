
 <footer>
        <div class="col-md-12" style="text-align:center;">
            <hr>
            Copyright - 2020 | <a href="http://mimsprojects.com">mimsprojects.com</a>
        </div>
    </footer>
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.fixedHeader.min.js');?>"></script>


  <script src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
  <script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.buttons.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/jszip.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/pdfmake.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.fixedColumns.min.js');?>"></script>
  

  <style type="text/css">
 /* Ensure that the demo table scrolls */
 th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
    }
  </style>
  
  <script type="text/javascript" class="init">
	
  $(document).ready(function() {
    $('#ListExpediting').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        {
            extend: 'csvHtml5',
            text: 'Exportar a CSV',
            exportOptions: {
                modifier: {
                    search: 'none'
                }
            }
        }
    ],
    language: {
				"emptyTable":			"No hay datos disponibles en la tabla.",
				"info":		   			"Del _START_ al _END_ de _TOTAL_ ",
				"infoEmpty":			"Mostrando 0 registros de un total de 0.",
				"infoFiltered":			"(filtrados de un total de _MAX_ registros)",
				"infoPostFix":			"(actualizados)",
				"lengthMenu":			"Mostrar _MENU_ registros",
				"loadingRecords":		"Cargando...",
				"processing":			"Procesando...",
				"search":				"Buscar:",
				"searchPlaceholder":	"Dato para buscar",
				"zeroRecords":			"No se han encontrado coincidencias.",
				"aria": {
					"sortAscending":	"Ordenación ascendente",
					"sortDescending":	"Ordenación descendente"
				}
			},
      fixedHeader: {
            header: true,
            footer: true
        },
        paging: false,
        fixedColumns: true,
        scrollX: "400px",
        scrollCollapse: true
    } );
    
    $('#ListBuckSheet').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        {
            extend: 'csvHtml5',
            text: 'Exportar a CSV',
            exportOptions: {
                modifier: {
                    search: 'none'
                }
            }
        }
    ],
    language: {
				"emptyTable":			"No hay datos disponibles en la tabla.",
				"info":		   			"Del _START_ al _END_ de _TOTAL_ ",
				"infoEmpty":			"Mostrando 0 registros de un total de 0.",
				"infoFiltered":			"(filtrados de un total de _MAX_ registros)",
				"infoPostFix":			"(actualizados)",
				"lengthMenu":			"Mostrar _MENU_ registros",
				"loadingRecords":		"Cargando...",
				"processing":			"Procesando...",
				"search":				"Buscar:",
				"searchPlaceholder":	"Dato para buscar",
				"zeroRecords":			"No se han encontrado coincidencias.",
				"aria": {
					"sortAscending":	"Ordenación ascendente",
					"sortDescending":	"Ordenación descendente"
				}
			},
      fixedHeader: {
            header: true,
            footer: true
        },
        fixedColumns: true,
        scrollX:        "400px",
        scrollCollapse: true,
        paging:         false,
        columnDefs: [
            { width: '20%', targets: 0 }
        ],
        fixedColumns: true
    } );
  } );

  
    </script>
  
  </body>
</html>
