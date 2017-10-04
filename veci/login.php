<?php

include ("controller/loginUser.php");
include ("controller/controllerUsuarios.php");
$config = ''; 
$sessionObject = new loginUser($config);
$typeUsuario = new controllerUsuarios();
 $user = $_POST['username'];
 $pass = $_POST['password'];

$sign = $sessionObject->signIn($user,$pass);



If ($sign) {
    $token = $_SESSION['token'];
    $type = $sessionObject->getToken($token); 
    $tipoPerfil = $type[0]['tiposPerfil_id'];
    $urlIndex = $typeUsuario->menus($tipoPerfil);
    $index = $urlIndex['index'];  
    header("Location:".$index."");
} else {
   // echo "no paso"; 
  header("Location:index.php");
}
 


