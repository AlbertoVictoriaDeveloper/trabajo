<?php
include ("controller/controllerRegistrar.php");
      $config= ''; 
      $datosUsuarios = new controllerRegistrar($config); 
    $numAgente = $_GET['numAgente'];
    $tipicacion = $_GET['tipicacion'];
    $idUser = $_GET['idUser'];
     $nombreUser = $_GET['nombreUser'];
     $getDatosAudios = $datosUsuarios->getAudiosAgent($numAgente,$tipicacion); 
     $rutaArchvivo = $getDatosAudios[0]['ruta_archivo']; 
      $date = new DateTime($getDatosAudios[0]['fecha_gestion']);
     $fechaCompleta =  $date->format('Y-m-d H:i:s'); 
         require_once './view/audios.phtml';
      
      
      
   


