<?php
date_default_timezone_set('America/Mexico_City');
include ("./controller/loginUser.php");
include ("./controller/controllerUsuarios.php");
$config = '';
$sessionObject = new loginUser($config);
$typeUsuario = new controllerUsuarios();
$statusSession = $sessionObject->isConnected();
if ($statusSession) {
   $token = $_SESSION['token'];
      $type = $sessionObject->getToken($token);
      var_dump($type);
     $tipoPerfil = $type[0]['tipos_usuarios_id'];
     $urlIndex = $typeUsuario->menus($tipoPerfil);
      $index = $urlIndex['index'];
      header("Location:" . $index . "");
   } else {    
      $datos_vista['template'] = "./view/login.phtml";
      require_once './view/headers/layout.phtml';  
    
   }    
