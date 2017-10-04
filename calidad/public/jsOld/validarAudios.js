function validareAudios(a){
    var numAgente = $("#idAgente"+a).val(); 
    var idUser =  $("#idUser"+a).val(); 
       $.pgwModal({
       url: "./calidadAudios.php?numAgente="+numAgente+"&idUser="+idUser+"",
     maxWidth: 1200, 
     loadingContent: '<span style="text-align:center">Cargando...</span>',
      closable: true,
      titleBar: false
});
 }
function  encuesta(){
        var  gestion = $("#gestion").val();  
    var data = {
         gestion : gestion     
      };
            $.ajax({async: true,
            type: "POST",
            dataType: "JSON",
            url: "encuestas.php",
            data: data,
            success: function (data) {
                if (data.response == "ok") { 
              $("#panelPreguntas").attr("style", "display:hidden");
              var registers = ("registers",JSON.stringify(data.info['variables']));
              var  arrayregister = $.parseJSON(registers);
              
               // alert(arrayregister); 
               var  a = 0 ;
              
         var tableregisters = "<thead>" +
                '<tr>' +
                 "<th>#</th>" +
                "<th>VARIABLE</th>" +
                "<th>VALOR</th>" +
                 "<th>COMENTARIO</th>" +
                "</tr>" +
                "</thead><tbody>";
        if (arrayregister) {
            $.each(arrayregister, function (i, v)
            { 
                 a++;
                tableregisters = tableregisters + "<tr role='row' class='odd'>" +
                         "<td>" + a + "</td>" +
                        "<td>" + v.variable + "</td>" +
                        "<td><div class='radio i-checks'><label> <input type='radio' value='"+v.valor+"' name='resp"+a+"' id='resp"+a+"'> <i></i> Si </label></div><div class='radio i-checks'><label> <input type='radio' value='0' name='resp"+a+"' id='resp"+a+"'> <i></i> NO </label></div>                                      </td>" +
                        "<td><input type='text' name='comentario"+a+"' id='comentario"+a+"'><input type='hidden' id='idVariables"+a+"' name='idVariables"+a+"' value='"+v.id+"'>  </td>" +
                        "</tr>";
                $("#contador").val(a); 
              
            });
            tableregisters = tableregisters + "</tbody>";
            $("#datatable-responsive").html(tableregisters);
            var button = "<button class='btn btn-danger' id='btnCerrar' onclick='cerrar()' name='btnCerrar'  type='button'>Cerrar</button> " +
                         "<button type='button' class='btn btn-primary' id='buttonGuardar"+a+"' onclick='saveEncuesta("+a+")' name='buttonGuardar"+a+"'  data-toggle='modal' data-target='#myModal6'              >Guardar Encuesta  </button>";
                 
                 $("#buttonGuardar").html(button); 
            
         
        }
                 
               }  else {
                    $("#panelPreguntas").attr("style", "display:none");
                   
                    $("#alert").attr("style", "display:none");
                    $("#alert").fadeToggle("slow");
                    $("#messageAlert").html("<strong>Attention!</strong>" + (data.message));
                    $("#userParanoid").attr("style", "border-color:red");
                    $("#alert").fadeOut(6000);
                    $("#information").attr("style", "display:none");
                }
            },
            timeout: 1000000,
            error: function (data) {
                alert("ocurrio error");
            }

        });   
}


 
   function cerrar(){
         $.pgwModal('close');  
      }


   function saveEncuesta(a){
    //   var contador = $("#contador").val();
      //  var resp = $("#resp"+a).val();
        //var comentario = $("#comentario"+a).val();
      //  var idVariables = $("#idVariables"+a).val(); 
        //var  idAgente  = $("#idAgente").val(); 
        //var idAudio   = $("#idAudio").val(); 

        /* var data = {
                   
                          contador: contador,
                          resp : resp             

    };
       */
       
    $.ajax({async: true,
        type: "POST",
       // dataType: "JSON",
        url: "guardarEncuesta.php",
        data:$("#preguntase").serialize(),
        cache : false,
        success: function (data) {

          if(data == "ok"){
                $("#alerta").html("Solicitud Atendida !!"); 
                 $("#alertar").html("Se Guardo Correctamente");

                   var time = 2
								 setInterval( function() {
									time--;
									$('#time').html(time);
									 if (time === 0) {
										location.reload();
                                                                                     
                                                                                      
									   }    
                               }, 1000 );  
          }else{
                  $("#alerta").html("Alerta!!"); 
                   $("#alertar").html(data);
                   	   var time = 2
								 setInterval( function() {
									time--;
									$('#time').html(time);
									 if (time === 0) {
										//location.reload();
                                                                                      $("#myModal6").modal('toggle');
									   }    
                               }, 1000 );  
                   
                   
          }
        },
        timeout: 1000000,
        error: function (data) {
            alert("ocurrio error");
        }

    }); 
        
            // alert(resp); 
        // var resp = $("#resp"+a).v
  } 







   