<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerAdmin.php");
include ("controller/controllerEstadistica.php"); 
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $soporteDatos = new controllerAdmin($config); 
      $parametrosEstadistica = new   controllerEstadistica (); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
       
       $idPersonal= $datosToken[0]['usuarios_id']; 
       $datosSoporte = $soporteDatos->getSoportes();  
       $tipoPerfil =   $datosToken[0]['tipos_usuarios_id'];
       $estadisticaDatos = $parametrosEstadistica->estadisticaDatos($tipoPerfil,$idPersonal);
       $estadistica =  $soporteDatos->estadisticaAdmin($estadisticaDatos);
       
       
       $usuarioNivel = $nivelUsuarios->menus($tipoPerfil); 
       $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
       $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
       $datosVista['template'] =  $usuarioNivel['viewInicio']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
        $datos_Vista['template'] =  $usuarioNivel['viewInicio'];  
         require_once  $usuarioNivel['header'] ;
      }else{
          header("Location:index.php"); 
      }
     
