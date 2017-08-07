function  getArea(){
var departamento = $("#AreaEmple").val(); 
var puestoEmple = $("#puestoEmple").val();

   var data = {
          departamento:departamento,
          puestoEmple:puestoEmple
     };
      
  $.ajax({async: true,
           type: "POST",
           dataType: "JSON",
          url: "getDepartamento.php",
          data: data,
          success: function(data) {
             var derpatamentoData = ("derpatamentoData",JSON.stringify(data.info['depa'])); 
             var arrayDepa = $.parseJSON(derpatamentoData);
              //var option = '<option  value = "" selected>Selecciona una Area</option>'; 
              $.each(arrayDepa, function (i, v)
            {
             $("#AreaEmpleado").val(v.area); 
             $("#idArea").val(v.id); 
//            //  option +=('');
           });
                   
          },
           timeout: 1000000,
           error: function (data) {
               alert("ocurrio error");
         }
   });   
}

function getPuesto(){
    var areaEmple = $("#AreaEmple").val();
    var data = {
         areaEmple:areaEmple
      };

  $.ajax({async: true,
           type: "POST",
            dataType: "JSON",
           url: "getPuesto.php",
          data: data,
           success: function(data) {
             var puestoData = ("puestoData",JSON.stringify(data.info['puesto'])); 
             var arrayPuesto = $.parseJSON(puestoData);  
             var option = '<option  value = "" selected>Selecciona una Area</option>'; 
             $.each(arrayPuesto, function (i, v)
            {
          option += ('<option value = "'+v.id+'" >'+v.puesto+'</option>');

  
          });
         $("#puestoEmple").html(option); 
           
               
               
            
                   },
                   timeout: 1000000,
           error: function (data) {
               alert("ocurrio error");
          }
    });      
}

