<?php

include ("./gestorMysql/loginUser.php");

 $session = new loginUser($config); 
 
 $isConnect =  $session->isConnected();
//var_dump($isConnect);
require_once   './view/login.phtml';
/*
 $sessionObject = new loginUser($config); 
 $user = $_POST['nombreUser']; 
 $pass = $_POST['passUser'];
 $sign= $sessionObject->signIn($user,$pass);
    If($sign){
       $datos_vista['menuHorizontal']= '../view/menu/menu-horizontal.phtml';
       require_once '../view/principalEstadis.phtml';    
  }else{
      
     
  }
 
  */