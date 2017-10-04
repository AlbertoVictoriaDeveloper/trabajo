<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerRegistrar.php");
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $datosUsuarios = new controllerRegistrar($config); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
      $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
     
     $tipoPerfil = $datosToken[0]['tiposPerfil_id']; 
       //$perfil = 2;
       //$idPersonal= $datosToken[0]['id']; 
       //$idCliente = 0; 
        $datosusUsuariose = $datosUsuarios->getAgentes();
        $tipificacion = $datosUsuarios->getTipificaciones();
 
        
       //  $datosusUsuariose->getTipificaciones(); 
        //var_dump($tipoTipificacion); 
       //$estadistica =  $soporteDatos->estadisticaAdmin($perfil,$idPersonal,$idCliente);
      // $noUser = $datosToken[0]['user']; 
		 //$AlertReport = GetAlertas(); 
	
        $usuarioNivel = $nivelUsuarios->menus($tipoPerfil);  
        $datosVista['nombre'] = $datosToken[0]['nombre_empleado'];
         $datosVista['id_user'] = $datosToken[0]['usuarios_id'];
         $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
         $datosVista['template'] = $usuarioNivel['templateStaff'];  
        // $datosVista['template'] = './view/staff/panelStaff.phtml';
         $datosVista['menu'] = $usuarioNivel['menu']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
       
         
         require_once './view/header/headerVeci.phtml';
      }else{
          header("Location:index.php"); 
      }
     
