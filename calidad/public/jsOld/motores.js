function getMotores(){
      var  motores = $("#motores").val(); 
      var   idUser = $("#idUser").val(); 

 
   var data ={
       
       idUser:idUser,
       motores:motores
   }; 
       $.ajax({async: true,
            type: "POST",
            dataType: "JSON",
            url: "getMotores.php",
            data: data,
            success: function (data) {
                if (data.response == "ok") {
                   
              $("#panelAgentes").attr("style", "display:hidden");
             var registers = ("registers",JSON.stringify(data.info['agente']));
            
                    //       var  arrayregister = $.parseJSON(registers);
              var arrayregister = $.parseJSON(registers); 
              var a = 0; 
         var tableregisters = "<thead>"+
                    "<tr>"+
                    "<th>Agente</th>"
                    "<th>   </th>"+
                    "</tr>"+
                    "</thead><tbody>"; 
                   if (arrayregister) {
            $.each(arrayregister, function (i, v)
            { 
                 a++;
                tableregisters = tableregisters + "<tr role='row' class='odd'>" +
                        "<td>" + v.id_agente + "</td>" +
                        "<td><input type='hidden' name='idUser' id='idUser"+a+"' value="+idUser+"><button  class='btn btn-info btn-small' id='idAgente"+a+"' name='idAgente"+a+"' onclick='validareAudios("+a+")' value='"+v.id_agente+"'     ><i class='btn-icon-only icon-pencil'> </i></button></td>"+
                        "</tr>";
                //$("#contador").val(a); 
              
            });
            tableregisters = tableregisters + "</tbody>";
            $("#datatable-responsives").html(tableregisters);

        }

               }

            },
            timeout: 1000000,
            error: function (data) {
                alert("ocurrio error");
            }

        });  
   
     
}


