<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerAdmin.php");
include  ("controller/controllerReportes.php");
include ("controller/controllerEstadistica.php"); 
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $soporteDatos = new controllerAdmin($config); 
      $reportesDatos = new controllerReportes($config);
      $parametrosEstadistica = new controllerEstadistica (); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
       $idPersonal= $datosToken[0]['id']; 
       $soportesDiarios = $reportesDatos->getSoportesDiarios(); 
       $soportesFrecuencia = $reportesDatos->serviciosSolicitados();
       $soporteClientFrencuencia = $reportesDatos->getUsuarioFrecuencia(); 
       $soporteDepaFrencuencia = $reportesDatos-> getDepartamentoFrecuencia(); 
       $tipoPerfil = $datosToken[0]['tipos_usuarios_id']; 
       
       //$datosSoporte = $soporteDatos->getSoportes($idPersonal);
       $estadisticaDatos = $parametrosEstadistica->estadisticaDatos($tipoPerfil,$idPersonal);
       $estadistica =  $soporteDatos->estadisticaAdmin($estadisticaDatos);
       
      // $noUser = $datosToken[0]['user']; 
		 //$AlertReport = GetAlertas(); 
	 
	 $usuarioNivel = $nivelUsuarios->menus($tipoPerfil); 
         $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
         $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
         $datosVista['template'] =  $usuarioNivel['viewTablero']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
       // $datos_Vista['template'] =  $usuarioNivel['viewInicio'];  
         require_once './view/headers/layoutSuperAdmin.phtml';
      }else{
          header("Location:index.php"); 
      }
     
