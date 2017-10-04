function   getLocalCampanas(i){
   var  idMoni = $("#idMoni"+i).val(); 
     $.pgwModal({
       url: "./audiosValidacion.php?idMoni="+idMoni+"",
     maxWidth: 1200, 
     loadingContent: '<span style="text-align:center">Cargando...</span>',
      closable: true,
      titleBar: false
});
}   

   function getAudio(i) {
       var idAudio = $("#idAudi"+i).val();
       var idUser = $("#idUser"+i).val();  
             $.pgwModal({
       url: "./audiosValidacion.php?idAudio="+idAudio+"&idUser="+idUser+"",
     maxWidth: 1200, 
     loadingContent: '<span style="text-align:center">Cargando...</span>',
      closable: true,
      titleBar: false
});
       
       
   }
    
    



