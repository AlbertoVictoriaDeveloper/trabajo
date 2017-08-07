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
       $tipoPerfil = $datosToken[0]['type']; 
       $perfil = 2;
       $idPersonal= $datosToken[0]['id']; 
       $idCliente = 0; 
        $datosSoporteHistory = $soporteDatos->getHistoryAdmin($idPersonal); 
       $estadistica =  $soporteDatos->estadisticaAdmin($perfil,$idPersonal,$idCliente);
      // $noUser = $datosToken[0]['user']; 
		 //$AlertReport = GetAlertas(); 
	
	 $usuarioNivel = $nivelUsuarios->menus($tipoPerfil);  
         $datosVista['nombre'] = $datosToken[0]['nombre'];
         $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
        $datosVista['template'] =$usuarioNivel['viewTablero'];  
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
       
         require_once './view/headers/layoutNewAdmin.phtml';
      }else{
          header("Location:index.php"); 
      }
     
