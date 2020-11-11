function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function validatefecha(date) {
   
    var dob = date;
    var pattern = /^([0-9]{2})-([0-9]{2})-([0-9]{4})$/;
    if (dob == null || dob == "" || !pattern.test(dob)) {
        return false;
    }
    else {
        return true
    }
  }

function formToggleDesactivar(ID) {


  var element = document.getElementById(ID);
  
      element.style.display = "none";

}

function formToggleActivar(ID) {

  var element = document.getElementById(ID);

      element.style.display = "block";
}

function formatoNumero(input)
{
var num = input.value.replace(/\./g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
input.value = num;
}
 
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}


}

function replaceAll( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
      text = text.toString().replace(busca,reemplaza);
  return text;
}


function validaDvRut(T)    //digito verificador
{  
      var M=0,S=1;
	  for(;T;T=Math.floor(T/10))
      S=(S+T%10*(9-M++%6))%11;
	  return S?S-1:'K';
}


function cargaCalendarioFechas()
{

  let date = new Date()

  let day = date.getDate() -1
  let month = date.getMonth() + 1
  let year = date.getFullYear()
  let fechaactual="";

  if(month < 10){
    fechaactual= `${day}-0${month}-${year}`;
  }else{
    fechaactual= `${day}-${month}-${year}`;
  }

  $('#var_fecha_inicio').daterangepicker({
    "autoUpdateInput": false,
    "singleDatePicker": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Clear",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
  }, function(chosen_date) {
    $('#var_fecha_inicio').val(chosen_date.format('DD-MM-YYYY'));
  });



  $('#var_fecha_termino').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoUpdateInput": false,
    "locale": {
        "format": "DD-MM-YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sab",
          "Dom"
        ],
        "monthNames": [
          "Ene",
          "Feb",
          "Mar",
          "Abr",
          "May",
          "Jun",
          "Jul",
          "Ago",
          "Sep",
          "Oct",
          "Nov",
          "Dic"
        ],
        "firstDay": 0
    },
    "startDate": fechaactual,
    "endDate": "01-01-2030",
    "opens": "top"
  },function(chosen_date) {
    $('#var_fecha_termino').val(chosen_date.format('DD-MM-YYYY'));
  });


  $('#var_edit_fecha_inicio').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoUpdateInput": false,
    "locale": {
        "format": "DD-MM-YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sab",
          "Dom"
        ],
        "monthNames": [
          "Ene",
          "Feb",
          "Mar",
          "Abr",
          "May",
          "Jun",
          "Jul",
          "Ago",
          "Sep",
          "Oct",
          "Nov",
          "Dic"
        ],
        "firstDay": 0
    },
    "startDate": fechaactual,
    "endDate": "01-01-2030",
    "opens": "top"
  },function(chosen_date) {
    $('#var_edit_fecha_inicio').val(chosen_date.format('DD-MM-YYYY'));
  });

  


  $('#fecha_ingreso').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoUpdateInput": false,
    "locale": {
        "format": "DD-MM-YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sab",
          "Dom"
        ],
        "monthNames": [
          "Ene",
          "Feb",
          "Mar",
          "Abr",
          "May",
          "Jun",
          "Jul",
          "Ago",
          "Sep",
          "Oct",
          "Nov",
          "Dic"
        ],
        "firstDay": 0
    },
    "startDate": fechaactual,
    "endDate": "01-01-2030",
    "opens": "top"
  },function(chosen_date) {
    $('#fecha_ingreso').val(chosen_date.format('DD-MM-YYYY'));
  });

$('#var_edit_fecha_termino').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
},function(chosen_date) {
  $('#var_edit_fecha_termino').val(chosen_date.format('DD-MM-YYYY'));
});

$('#or_order_date').daterangepicker({
  "autoUpdateInput": false,
  "singleDatePicker": true,
  "showDropdowns": true,
  "locale": {
    "format": "DD-MM-YYYY",
    "separator": " - ",
    "applyLabel": "Apply",
    "cancelLabel": "Clear",
    "fromLabel": "From",
    "toLabel": "To",
    "customRangeLabel": "Custom",
    "weekLabel": "W",
    "daysOfWeek": [
      "Lun",
      "Mar",
      "Mie",
      "Jue",
      "Vie",
      "Sab",
      "Dom"
    ],
    "monthNames": [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic"
    ],
    "firstDay": 0
},
"startDate": fechaactual,
"endDate": "01-01-2030",
"opens": "top"
}, function(chosen_date) {
  $('#or_order_date').val(chosen_date.format('DD-MM-YYYY'));
});





$('#or_date_required').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#or_date_required').val(chosen_date.format('DD-MM-YYYY'));
});




$('#or_ship_date').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#or_ship_date').val(chosen_date.format('DD-MM-YYYY'));
});


$('#or_act_order_date').daterangepicker({
  "autoUpdateInput": false,
  "singleDatePicker": true,
  "showDropdowns": true,
  "locale": {
    "format": "DD-MM-YYYY",
    "separator": " - ",
    "applyLabel": "Apply",
    "cancelLabel": "Clear",
    "fromLabel": "From",
    "toLabel": "To",
    "customRangeLabel": "Custom",
    "weekLabel": "W",
    "daysOfWeek": [
      "Lun",
      "Mar",
      "Mie",
      "Jue",
      "Vie",
      "Sab",
      "Dom"
    ],
    "monthNames": [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic"
    ],
    "firstDay": 0
},
"startDate": fechaactual,
"endDate": "01-01-2030",
"opens": "top"
}, function(chosen_date) {
  $('#or_act_order_date').val(chosen_date.format('DD-MM-YYYY'));
});





$('#or_act_date_required').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#or_act_date_required').val(chosen_date.format('DD-MM-YYYY'));
});

$('#or_act_ship_date').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#or_act_ship_date').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FechaRAS').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaRAS').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FechaComienzoFabricacion').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaComienzoFabricacion').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FechaTerminoFabricacion').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaTerminoFabricacion').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FechaGranallado').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaGranallado').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FechaPintura').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaPintura').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FechaListoInspeccion').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaListoInspeccion').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FechaSalidaFabrica').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaSalidaFabrica').val(chosen_date.format('DD-MM-YYYY'));
});



$('#FechaEmbarque').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaEmbarque').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FechaTC').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaTC').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FechaTV').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Apply",
      "cancelLabel": "Cancel",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sab",
        "Dom"
      ],
      "monthNames": [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic"
      ],
      "firstDay": 0
  },
  "startDate": fechaactual,
  "endDate": "01-01-2030",
  "opens": "top"
}, function(chosen_date) {
  $('#FechaTV').val(chosen_date.format('DD-MM-YYYY'));
});




}