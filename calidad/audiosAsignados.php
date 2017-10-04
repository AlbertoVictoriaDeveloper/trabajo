<?php
  include ("controller/controllerRegistrar.php");
  $config= ''; 
  $saveRegistrar = new controllerRegistrar($config);
  $contador = $_POST['contador']; 
  $user = $_POST['userID'];

for($i = 1 ; $i <= $contador ; $i++){
    
    $opcion = $_POST['idAudio'.$i];
    
    $insertAsignacion = $saveRegistrar->guardarAsignacion($opcion,$user);
    
    var_dump($insertAsignacion); 
    
    
    
}