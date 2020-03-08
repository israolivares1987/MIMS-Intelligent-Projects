$(document).ready(function() {
  $('#ListExpediting').DataTable( {
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

     //datepicker
     $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

  
  $('#ListBuckSheet').DataTable( {
   
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


