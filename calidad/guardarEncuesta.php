<?php

  include ("controller/controllerRegistrar.php");
  $config= ''; 
  $saveRegistrar = new controllerRegistrar($config);
$idAgente = $_POST['idAgente'];
$idAudio = $_POST['idAudio'];
 $contador = $_POST['contador'];
$dataUsuario  =  $saveRegistrar->getUsuariosAgente($idAgente);
$idUsuario = $dataUsuario[0]['id']; 
$contadoUser = $dataUsuario[0]['contador'];
$comentarioObservaciones = trim($_POST['comentarioEncuesta']);
 $idUser = $_POST['idUser']; 
 $nombreUser = $_POST['nombreUser'];  
//$idVariables = $_POST['idVariables'];

for($i = 1;$i <= $contador ; $i++ ){
  
    
    if(($_POST['resp'.$i] ) == null ){
        
        echo "Falta Respuesta de la pregunta " . $i;
        exit ;
    }else if($_POST["resp" . $i] == 0 and trim($_POST["comentario" . $i]) == ''){
       
        echo "Falta comentario de la pregunta " . $i;
         exit ; 
        
    }
    
    
    $variables  =  $_POST['idVariables'.$i]; 
    $respuestas =  $_POST['resp'.$i];
    $statusRespuesta = $_POST['resp'.$i] <> 0 ? 1 : '0';  
    $comentario =  utf8_decode($_POST['comentario'.$i]);
    $insertDatos = $saveRegistrar->guardarVariables($respuestas,$statusRespuesta,$variables,$idAudio,$idUser);  
    }
    if(!empty($comentarioObservaciones)){
 if($insertDatos){
   $sumaData =  $saveRegistrar->getTotal($idAudio); 
   $total = $sumaData[0]['total'];
   // $sumaContador =  $contadoUser+1; 
  // $updateContador = $saveRegistrar->updateContador($sumaContador,$idUsuario);
  $updateStatus  = $saveRegistrar->updateStatuAudio($total,$idAudio,$comentarioObservaciones,$idUser,$nombreUser );
    echo "ok";
     
     //    header('Location: agentesValidaciones.php');
 }else{
     
     
     	echo "Error de base de datos";
    // echo "no paso"; 
 }
 }else{
     echo "Faltan  observaciones";
 }






 
 
 
 
 
 
 
 
 
 
?>