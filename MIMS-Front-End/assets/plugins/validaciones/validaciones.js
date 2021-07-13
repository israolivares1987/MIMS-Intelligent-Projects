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

  let day = date.getDate()-1
  let month = date.getMonth() + 1
  let year = date.getFullYear()
  let fechaactual="";


  if(month < 10){
    fechaactual= `${day}-0${month}-${year}`;
  }else{
    fechaactual= `${day}-${month}-${year}`;
  }



  $('.fechapicker').datepicker({
  
      language: 'es',
      format: 'dd-mm-yyyy',
      todayHighlight:'TRUE',
      autoclose: true,
      forceParse: false,
      orientation:'auto',
      showOnFocus:	true
  
});

}