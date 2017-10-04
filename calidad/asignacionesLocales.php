<?php
date_default_timezone_set("Mexico/General");
include ("controller/controllerSession.php");
include ("controller/controllerRegistrar.php");
      $config= '';
      $userNamer = $_GET['user']; 
      $typeAsignacion = $_GET['typeAsignacion'];    
      $sessionNivel =  new controllerSession($config);
      $datosUsuarios = new controllerRegistrar($config); 
    if($typeAsignacion== "random"){
      //$getDatosAudios = $datosUsuarios->getAudioId($idAudio); 
     // $nombreUser  =   $datosUsuarios->getNombreAgente($userNum);
     //$rutaArchvivo = $getDatosAudios[0]['ruta_archivo']; 
      //$date = new DateTime($getDatosAudios[0]['fecha_gestion']);
     //$fechaCompleta =  $date->format('Y-m-d H:i:s'); 
    ///     require_once './view/audios.phtml';
        
    }else if ($typeAsignacion == "asignacion"){     
        $i = ""; 
        $audiosTotales = $datosUsuarios->getAudios(); 
        require_once './view/supervisor/asignacionMoni.phtml';
    }