<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerAdmin.php");
include ("controller/controllerEstadistica.php"); 
include  ("controller/controllerReportes.php");
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $soporteDatos = new controllerAdmin($config); 
      $parametrosEstadistica = new   controllerEstadistica ();
      $reportesDatos = new controllerReportes($config);
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
       
       $idPersonal= $datosToken[0]['usuarios_id']; 
       $datosPerson =  $reportesDatos->getUsuariosRegisrados();
       
//  $esruad = $datosPerson[0]['statusPerson']; 
       
       $tipoPerfil =   $datosToken[0]['tipos_usuarios_id'];
       $estadisticaDatos = $parametrosEstadistica->estadisticaDatos($tipoPerfil,$idPersonal);
       $estadistica =  $soporteDatos->estadisticaAdmin($estadisticaDatos);
       
       
       $usuarioNivel = $nivelUsuarios->menus($tipoPerfil); 
       $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
       $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
       $datosVista['template'] =  $usuarioNivel['viewAlta']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
        $datos_Vista['template'] =  $usuarioNivel['viewAlta'];  
         require_once  $usuarioNivel['header'] ;
      }else{
          header("Location:index.php"); 
      }
     
