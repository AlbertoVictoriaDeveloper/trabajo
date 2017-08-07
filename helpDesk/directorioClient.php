<?php

date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerAdmin.php");
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $soporteDatos = new controllerAdmin($config); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
       $datosDirectorio = $soporteDatos->getDirectotrio(); 
       $tipoPerfil = $datosToken[0]['tipos_usuarios_id'];
       $perfil = 3 ;
       $idPersonales= 0; 
       $idCliente = $datosToken[0]['id']; 
       $estadistica =  $soporteDatos->estadisticaAdmin($perfil,$idPersonales,$idCliente);
      // $noUser = $datosToken[0]['user']; 
		 //$AlertReport = GetAlertas(); 
	
	 $usuarioNivel = $nivelUsuarios->menus($tipoPerfil);  
         $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
         $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
         $datosVista['template'] =  $usuarioNivel['viewDirectory']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
         $datos_Vista['template'] =  $usuarioNivel['viewDirectory'];  
         require_once  $usuarioNivel['header'];
      }else{
          header("Location:index.php"); 
      }
     
