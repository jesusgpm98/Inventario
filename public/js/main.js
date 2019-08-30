$(document).ready(function(){
  console.log( "ready!" );
  $('#ingredientes').select2();
});

//calcular total de los dropdownlist
function calcularSuma(){

  tamano = $("#tamano option:selected").data('precio');
  if(tamano == '' || tamano == null){
    return false;
  }

  masa = $("#masa option:selected").data('precio');
  if(masa == '' || masa == null){
    return false;
  }

  total = tamano + masa;
  $("#total").val(total);
}//end function calcularSuma
