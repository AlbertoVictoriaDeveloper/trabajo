<?php

include ("model/userModel.php");
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
$config = ''; 
$sessionObject = new loginUser($config);
$typeUsuario = new controllerUsuarios();
$statusSession = $sessionObject->isConnected();
if ($statusSession) {
  
   $token = $_SESSION['token'];

  $type = $sessionObject->getToken($token);
  $tipoPerfil = $type[0]['tiposPerfil_id'];
    $urlIndex = $typeUsuario->menus($tipoPerfil);
   $index = $urlIndex['index'];
    header("Location:" . $index . "");
} else {
    require_once './view/login.phtml';
}