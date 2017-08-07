<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerAdmin.php");
include ("controller/controllerEstadistica.php"); 
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $parametrosEstadistica = new  controllerEstadistica(); 
      $soporteDatos = new controllerAdmin($config); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
       $idPersonal= $datosToken[0]['id'];
       $tipoPerfil = $tipoPerfil = $datosToken[0]['tipos_usuarios_id'];
       $historyDatos =$tipoPerfil == 2 ? $soporteDatos->getHistoryAdmin($idPersonal) : $soporteDatos->getHistoryAll();
       // $historyDatos = $soporteDatos->getHistoryAdmin($datosToken[0]['nombre']);
       $estadisticaDatos = $parametrosEstadistica->estadisticaDatos($tipoPerfil,$idPersonal);
       $estadistica =  $soporteDatos->estadisticaAdmin($estadisticaDatos);
      // $noUser = $datosToken[0]['user']; 
		 //$AlertReport = GetAlertas(); 
	
	 $usuarioNivel = $nivelUsuarios->menus($tipoPerfil);  
         $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
         $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
         $datosVista['template'] =  $usuarioNivel['viewHistory'];  
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
        
         require_once  $usuarioNivel['header'];
      }else{
          header("Location:index.php"); 
      }
     
