<?php
date_default_timezone_set("Mexico/General");
include ("controller/controllerSession.php");
include ("controller/controllerRegistrar.php");
      $config= '';
      $idAudio = $_GET['idAudio']; 
      $userNum = $_GET['idUser'];    
      $sessionNivel =  new controllerSession($config);
      $datosUsuarios = new controllerRegistrar($config); 
    if($idAudio != null){
      $getDatosAudios = $datosUsuarios->getAudioId($idAudio); 
      $nombreUser  =   $datosUsuarios->getNombreAgente($userNum);
     $rutaArchvivo = $getDatosAudios[0]['ruta_archivo']; 
      $date = new DateTime($getDatosAudios[0]['fecha_gestion']);
     $fechaCompleta =  $date->format('Y-m-d H:i:s'); 
         require_once './view/audios.phtml';
        
    }else{    
      $idMoni = $_GET['idMoni'];
      $getMotorMarcacion = $sessionNivel->getConsultaMotor($idMoni); 
      $datosMonitorista =  $sessionNivel->getDatosMonitorista($idMoni); 
      require_once './view/monitoreo/motoresAgentes.phtml';
    }
      
      
      /*
     $getDatosAudios = $datosUsuarios->getAudiosAgent($numAgente,$tipicacion); 
     $rutaArchvivo = $getDatosAudios[0]['ruta_archivo']; 
      $date = new DateTime($getDatosAudios[0]['fecha_gestion']);
     $fechaCompleta =  $date->format('Y-m-d H:i:s'); 
         require_once './view/audios.phtml';
      
    */  
      
