<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
$config = ''; 
 $sessionObject = new loginUser($config);
 $typeUsuario = new controllerUsuarios();
 $user = $_POST['userName'];
 $pass = $_POST['pass'];
 $sign = $sessionObject->signIn($user,$pass);
If ($sign){
    $token = $_SESSION['token'];
   $type = $sessionObject->getToken($token);
      $tipoPerfil = $type[0]['tipos_usuarios_id'];
    $urlIndex = $typeUsuario->menus($tipoPerfil); 
    $index = $urlIndex['index'];  
    header("Location:".$index."");
} else {
    header("Location:index.php");
}
 


