<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerAdmin.php");
include ("controller/controllerEstadistica.php"); 
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $parametrosEstadistica = new   controllerEstadistica (); 
      $soporteDatos = new controllerAdmin($config); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token); 
       $idPersonal= $datosToken[0]['usuarios_id']; 
       $datosSoporteClient = $soporteDatos->getTodosClient($idPersonal);
       $tipoPerfil = $datosToken[0]['tipos_usuarios_id']; 
       $nombre = $datosSoporteClient[0]['nombre_personal']; 
       
       $estadisticaDatos = $parametrosEstadistica->estadisticaDatos($tipoPerfil,$idPersonal);
       $estadistica =  $soporteDatos->estadisticaAdmin($estadisticaDatos);
 
       $usuarioNivel = $nivelUsuarios->menus($tipoPerfil);
       $i = 0; 
       $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
       $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
       $datos_Vista['template'] =  $usuarioNivel['viewInicio'];  
       require_once './view/headers/layoutNewClient.phtml';
      }else{
          header("Location:index.php"); 
      }
     
