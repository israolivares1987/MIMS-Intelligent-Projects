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
  

  var n = num, prec = 0;

    var toFixedFix = function (n,prec) {
        var k = Math.pow(10,prec);
        return (Math.round(n*k)/k).toString();
    };

    n = !isFinite(+n) ? 0 : +n;
    prec = !isFinite(+prec) ? 0 : Math.abs(prec);
    var sep = '.';
    var dec = ',' ;

    var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec); 
    //fix for IE parseFloat(0.55).toFixed(0) = 0;

    var abs = toFixedFix(Math.abs(n), prec);
    var _, i;

    if (abs >= 1000) {
        _ = abs.split(/\D/);
        i = _[0].length % 3 || 3;

        _[0] = s.slice(0,i + (n < 0)) +
               _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
        s = _.join(dec);
    } else {
        s = s.replace('.', dec);
    }

    var decPos = s.indexOf(dec);
    if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
        s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
    }
    else if (prec >= 1 && decPos === -1) {
        s += dec+new Array(prec).join(0)+'0';
    }

input.value = s;
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


  

  $('#fecha_entrega').daterangepicker({
    "autoUpdateInput": false,
    "singleDatePicker": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
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
    $('#fecha_entrega').val(chosen_date.format('DD-MM-YYYY'));
  });


  $('#var_fecha_inicio').daterangepicker({
    "autoUpdateInput": false,
    "singleDatePicker": true,
    "showDropdowns": true,
    "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
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
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
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
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
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
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
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
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
    "applyLabel": "Aplicar",
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
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
    "applyLabel": "Aplicar",
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
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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


$('#FECHA_TC').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_TC').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FECHA_TP').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_TP').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FECHA_TCF').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_TCF').val(chosen_date.format('DD-MM-YYYY'));
});





$('#FECHA_COMIENZO_FABRICACION').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_COMIENZO_FABRICACION').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FECHA_TERMINO_FABRICACION').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_TERMINO_FABRICACION').val(chosen_date.format('DD-MM-YYYY'));
});

$('#FECHA_GRANALLADO').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_GRANALLADO').val(chosen_date.format('DD-MM-YYYY'));
});



$('#FECHA_PINTURA').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_PINTURA').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FECHA_LISTO_INSPECCION').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_LISTO_INSPECCION').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FECHA_SALIDA_FABRICA').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_SALIDA_FABRICA').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FECHA_EMBARQUE').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_EMBARQUE').val(chosen_date.format('DD-MM-YYYY'));
});



$('#FECHA_INGRESO').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_INGRESO').val(chosen_date.format('DD-MM-YYYY'));
});


$('#FECHA_PAGO').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_PAGO').val(chosen_date.format('DD-MM-YYYY'));
});



$('#FECHA_PAGO').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_PAGO').val(chosen_date.format('DD-MM-YYYY'));
});




$('#FECHA_EMISION').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#FECHA_EMISION').val(chosen_date.format('DD-MM-YYYY'));
});



$('#VENCIMIENTO').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
  "autoUpdateInput": false,
  "locale": {
      "format": "DD-MM-YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
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
  $('#VENCIMIENTO').val(chosen_date.format('DD-MM-YYYY'));
});

}