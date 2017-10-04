function asignarAudios(){
  var checkboxes = asigAudios.checkbox;  //Array que contiene los checkbox
var cont = 0; //Variable que lleva la cuenta de los checkbox pulsados
for (var x=0; x < checkboxes.length; x++) {
if (checkboxes[x].checked) {
cont = cont + 1;
}
}
alert ("El número de checkbox pulsados es " + cont);
}
 
    
   
