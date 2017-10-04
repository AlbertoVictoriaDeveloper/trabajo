
   function asignacion(i) {
    var typeAsignacion = $("#asig"+i).val(); 
    var user = $("#user"+i).val();    
    
    if(typeAsignacion == "random"){
        alert("random"); 
        
    }else if(typeAsignacion == "asignacion"){
           $.pgwModal({
       url: "./asignacionesLocales.php?user="+user+"&typeAsignacion="+typeAsignacion+"",
     maxWidth: 1200, 
     loadingContent: '<span style="text-align:center">Cargando...</span>',
      closable: true,
      titleBar: false
}); 

    }
    
    
    
    
}

