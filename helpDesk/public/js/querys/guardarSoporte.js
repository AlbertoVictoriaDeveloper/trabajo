function guardarTicket(i){
   var status =$("#statusTicket"+i).val(); 
   //$("#textEstatus"+i).value(status); 
   if(status == 3){
        $("#observaciones"+i).removeAttr("readonly");
        $("#idservice"+i).attr("disabled",true); 
   }else if(status == 2){
        $("#observaciones"+i).attr("readonly",true);
        $("#idservice"+i).attr("disabled",false); 
   }else if(status == ""){
        $("#observaciones"+i).attr("readonly",true); 
         $("#idservice"+i).attr("disabled",true); 
   }
//  alert("hola");    
}



function limitar(i){
    var input = document.getElementById('observaciones'+i);
if(input.value.length < 100) {
     $("#idservice"+i).attr("disabled",false); 
//alert('Escribe más de 15 carácteres.');
 }else{
    $("#idservice"+i).attr("disabled",true);   
 }
}       
 








function saveTicket(i){
   var  idServicio = $("#idservice"+i).val(); 
   var  status = $("#statusTicket"+i).val();
   var  descripcion = $("#observaciones"+i).val();
   var  atiende = $("#atiende"+i).val();
   var  id_asignaciones  = $("#idAsignacion"+i).val();
   var  idPersonal = $("#idPersonal"+i).val(); 
   var  tipoServicio = $("#tipoServicio"+i).val();
   var  descripcionClient = $("#observacionClient"+i).val();
   var  fechaInicio = $("#fechaInicio"+i).val();
  // var idClienteEmail = $("#idClienteEmail"+i).val();

        var data = {
       idServicio:idServicio, 
       status: status,
       observaciones: descripcion,
       atiende:atiende,
       id_asignaciones:id_asignaciones,
       idPersonal:idPersonal,
       tipoServicio:tipoServicio,
       descripcionClient:descripcionClient,
       fechaInicio:fechaInicio
      };
      
  $.ajax({async: true,
           type: "POST",
            dataType: "JSON",
           url: "actualizarServicio.php",
          data: data,
           success: function(data) {
             $("#alertatitulos2").html("Solicitud Atendida !!"); 
                $("#alertarte2").html(data.message);
			   var time = 2
								 setInterval( function() {
									time--;
									$('#time').html(time);
									 if (time === 0) {
										//location.reload();
										 location.reload();   
									   }    
                                }, 1000 );
           },
            timeout: 1000000,
          error: function (data) {
               alert("ocurrio error");
          }
    });   
    
}



 function guardarServicio(){
    var   desc  = $("#desc").val();
    var   servicio     = $("#servicio").val();
    var  departamento = $("#departamento").val();
    var idPersonal =  $("#idPersonal").val(); 
    var nombreCliente = $("#nombreCliente").val(); 
    var puestoCliente = $("#puestoCliente").val(); 
               var data = {
       desc: desc,
       servicio:servicio, 
       departamento: departamento,
       idPersonal: idPersonal,
       nombreCliente: nombreCliente,
       puestoCliente :puestoCliente
      };
  $.ajax({async: true,
           type: "POST",
            dataType: "JSON",
            url: "guardarTicket.php",
           data: data,
            success: function(data) {
                      $("#alertatitulo").html("Solicitud Atendida !!"); 
                      $("#alertar").html("Se Guardo Correctamente");
		  var time = 1
								 setInterval( function() {
									time--;
									$('#time').html(time);
									 if (time === 0) {
										//location.reload();
										 location = "servicioClient.php";   
									   }    
                                }, 1000 );
            },
            timeout: 1000000,
            error: function (data) {
                alert("ocurrio error");
           }
    });   
 }
 

 function guardarPersonal(){
    var   noEmple           =   $("#noEmple").val();
    var   nombreEmple       =   $("#nombreEmple").val();
    var   departamentoValue =   $("#departamentoValue").val(); 
    var   AreaEmple         =   $("#AreaEmple").val(); 
    var   puestoEmple       =   $("#puestoEmple").val(); 

           var data = {
            noEmple: noEmple,
            nombreEmple:nombreEmple, 
            departamentoValue: departamentoValue,
            AreaEmple:AreaEmple,
            puestoEmple: puestoEmple
         }; 
     
     $.ajax({async: true,
           type: "POST",
            dataType: "JSON",
            url: "guardarUsuario.php",
           data: data,
            success: function(data) { 
                     $("#personalTitulo").html("Solicitud Atendida"); 
					 $("#textoPersonal").html(data.message);
		  var time = 1
								 setInterval( function() {
									time--;
									$('#time').html(time);
									 if (time === 0) {
										//location.reload();
										 location = "servicioRecepcion.php";   
									   }    
                                }, 1000 );
            },
            timeout: 1000000,
            error: function (data) {
                alert("ocurrio error");
           }
    });  
 
 } 
 
 
 
 
 