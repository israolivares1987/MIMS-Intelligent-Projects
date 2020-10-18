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

  let day = date.getDate()
  let month = date.getMonth() + 1
  let year = date.getFullYear()
  let fechaactual="";

  if(month < 10){
    fechaactual= `${day}-0${month}-${year}`;
  }else{
    fechaactual= `${day}-${month}-${year}`;
  }


  $('#var_fecha_inicio').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
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
  }, function(start, end, label) {
  console.log('New date range selected: ' + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
  });


  $('#var_fecha_termino').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
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
  }, function(start, end, label) {
  console.log('New date range selected: ' + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
  });


  $('#var_edit_fecha_inicio').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
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
  }, function(start, end, label) {
  console.log('New date range selected: ' + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
  });



$('#var_edit_fecha_termino').daterangepicker({
  "singleDatePicker": true,
  "showDropdowns": true,
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
  "endDate": "01-012030",
  "opens": "top"
}, function(start, end, label) {
console.log('New date range selected: ' + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
});


}