<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerRegistrar.php");
include ("controller/controllerSession.php");
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $datosUsuarios = new controllerRegistrar($config); 
      $datosSession = new  controllerSession($config); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
      $token = $_SESSION['token'];
      $datosToken =  $sessionObject->getToken($token);
      $tipoPerfil = $datosToken[0]['tiposPerfil_id']; 
     $tipoSession = $datosToken[0]['type_session'];
      $idUser = $datosToken[0]['user']; 
      $datosSessiona = $datosSession->getSession($tipoSession);

           $datosMonitorista =   $datosUsuarios->getMonitorista(); 
          $usuarioNivel = $nivelUsuarios->menus($tipoPerfil); 
          
          
         $datosAudioAsignacion  = $datosSession->getConsultas($tipoSession,$idUser);
 
         //$datosAudiosEscucha = $datosSession->getAudiosEscucha($idAudio); 
         
          
          $datosVista['nombre'] = $datosToken[0]['nombre_validador'];
          $datosVista['user'] = $datosToken[0]['user'];
          $datosVista['template'] = $usuarioNivel['templateStaff'];  
          $datosVista['texto'] =  $datosSessiona ['textoPrincipal'];
          $datosVista['barraTexto'] = $datosSessiona['textoPanel']; 
          $datosVista['tabla']   = $datosSessiona['tablaValidacion'];  
          
      //    $datosVista['barraTexto'] = $datosSessiona ['barraTexto'];
        // $datosVista['template'] = './view/staff/panelStaff.phtml';
         $datosVista['menu'] = $usuarioNivel['menu']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
         require_once  $usuarioNivel['header'];
       //  require_once './view/header/headerStaff.phtml';
      }else{
          header("Location:index.php"); 
      }