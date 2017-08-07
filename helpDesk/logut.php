<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/loginUser.php");
$config= ''; 
$sessionObject = new loginUser($config);
$token = "afd0de87aee4c5d773cc0119b3c6fa7a";
session_start();
$destroySession = $sessionObject->signOut($_SESSION['token']);
if ($destroySession) {
    header("Location:index.php");
} else {
    
}