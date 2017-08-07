function  editDatos(i){
    var idPersonal = $("#editPerson"+i).val(); 
//    var typeUser = $("#typeUser"+i).val(); 

      $.pgwModal({
      url: "./actualizarPersonal.php?idPersonal="+idPersonal+"",
     maxWidth: 1200, 
     loadingContent: '<span style="text-align:center">Cargando...</span>',
      closable: false,
      titleBar: false
  });     
}



function editDatosPeson(i){
 var idPersonal = $("#editPerson"+i).val(); 
 var ideDepa = $("#typeDepartameto"+i).val();
  $.pgwModal({
      url: "./actualizarPersonalAjaxEx.php?idPersonal="+idPersonal+"&ideDepa="+ideDepa+"",
     maxWidth: 1200, 
     loadingContent: '<span style="text-align:center">Cargando...</span>',
      closable: false,
      titleBar: false
  });     
}







function updateDatePerson(){
    var idPersonal = $("#idPersonalUp").val(); 
    var nombreUpdate = $("#nombreEmpleUpdate").val(); 
    var departamentoValue  = $("#departamentoValue").val(); 
    var areaDepartamento = $("#AreaEmple").val(); 
    var  puestoEmple   = $("#puestoEmple").val(); 
    var  statusPerson = $("#idEstatusPerson").val(); 
    var  email = $("#emailUpdate").val();  
    var idExtension = $("#idExtension").val(); 

    
    var data = {
          idPersonal : idPersonal, 
          nombreUpdate : nombreUpdate,
          departamentoValue: departamentoValue,
          areaDepartamento : areaDepartamento, 
          puestoEmple : puestoEmple, 
          statusPerson : statusPerson,
          email : email
      };
      $.ajax({async: true,
           type: "POST",
            dataType: "JSON",
           url: "updateAjaxPerson.php",
          data: data,
           success: function(data) {
               $.pgwModal('close');
               $("#alertatitulos2").html("Solicitud Atendida !!"); 
             $("#alertarte2").html(data.message);
                  alert(data.message); 
			   var time = 1;
								 setInterval( function() {
									time--;
									$('#time').html(time);
									 if (time === 0) {
										location.reload();
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
//
////function inputselect(){
////    if(("#Checkbox3").is(':checked')){
////        alert("activo");
////    }else{
////        alert("no activo"); 
////    }  
//}