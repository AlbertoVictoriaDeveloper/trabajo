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
      $parametrosEstadistica = new controllerEstadistica(); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
       $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
       /*Datos Hidden */
       $idPersonal= $datosToken[0]['usuarios_id'];
       $nombreCliente = $datosToken[0]['nombre_personal'];
       $puestoCliente = $datosToken[0]['puesto'];
       $tipoPerfil = $datosToken[0]['tipos_usuarios_id'];
       $departamentoID  = $datosToken[0]['cat_depa_id']; 
       
       
       /*****/
     //  $datosDerpatamento = $soporteDatos->getDepartamentos();
       $datosServicios = $soporteDatos->getServicios();
       $estadisticaDatos = $parametrosEstadistica->estadisticaDatos($tipoPerfil,$idPersonal);
       $estadistica =  $soporteDatos->estadisticaAdmin($estadisticaDatos);
 
       $i = 0 ; 
       $usuarioNivel = $nivelUsuarios->menus($tipoPerfil); 
       $datosVista['nombre'] = $datosToken[0]['nombre_personal'];
       $datosVista['estadistica'] = $usuarioNivel['estadistica']; 
       $datos_Vista['template'] =  $usuarioNivel['viewNewServicio'];  
       require_once './view/headers/layoutNewClient.phtml';
      }else{
          header("Location:index.php"); 
      }
     

