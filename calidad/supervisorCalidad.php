<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
include ("controller/controllerRegistrar.php");
include ("controller/controllerSession.php");
      $config= ''; 
      $sessionObject = new loginUser($config); 
      $nivelUsuarios = new controllerUsuarios();
      $sessionNivel =  new controllerSession($config);  
      $datosUsuarios = new controllerRegistrar($config); 
      $statusSession = $sessionObject->isConnected();
      if($statusSession){
      $token = $_SESSION['token'];
       $datosToken =  $sessionObject->getToken($token);
         $tipoPerfil = $datosToken[0]['tiposPerfil_id']; 
       $tipoSession = $datosToken[0]['type_session'];
       $textNiveles =  $sessionNivel->getSession($tipoSession);
      $idUser = $datosToken[0]['user']; 
       $datosFiltro  = $sessionNivel->getConsultaSession($idUser);
       
       /*Funcionara cuando el estatus session sea 1 */
       $datosAudioAsignacion = $sessionNivel->getConsultas($tipoSession,$idUser); 
       
        
       
       // var_dump($datosFiltro); 
       //$idPersonal= $datosToken[0]['id'];    
       // $datosusUsuariose = $datosUsuarios->getAgentes();
       // $tipificacion = $datosUsuarios->getTipificaciones();
 
        
       //  $datosusUsuariose->getTipificaciones(); 
        //var_dump($tipoTipificacion); 
       //$estadistica =  $soporteDatos->estadisticaAdmin($perfil,$idPersonal,$idCliente);
      // $noUser = $datosToken[0]['user']; 
		 //$AlertReport = GetAlertas(); 
	
          $usuarioNivel = $nivelUsuarios->menus($tipoPerfil);  
          $datosVista['nombre'] = $datosToken[0]['nombre_validador'];
          $datosVista['user'] = $datosToken[0]['user'];
          $datosVista['texto'] = $textNiveles['textoPrincipal']; 
          $datosVista['barraTexto']  = $textNiveles['textoPanel']; 
        // $datosVista['id_user'] = $datosToken[0]['usuarios_id'];
         //$datosVista['estadistica'] = $usuarioNivel['estadistica']; 
         $datosVista['template'] = $usuarioNivel['templateSupervisor'];  
         $datosVista['tabla'] =   $textNiveles['tablaValidacion']; 
        // $datosVista['template'] = './view/staff/panelStaff.phtml';
         $datosVista['menu'] = $usuarioNivel['menu']; 
         //$datos_vista['menuHorizontal']= $usuarioNivel;
         $i=0;
         require_once  $usuarioNivel['header'];
       //  require_once './view/header/headerStaff.phtml';
      }else{
          header("Location:index.php"); 
      }