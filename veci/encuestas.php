<?php
include ("controller/controllerRegistrar.php"); 
      $config= ''; 
      $datosEncuesta = new controllerRegistrar($config); 
      $variables = $_POST['gestion'];
      $variablesPreguntas = $datosEncuesta->getVariables($variables); 
     if($variablesPreguntas){
        echo json_encode(array("response" => "ok", "message" => "Informacion de Variables", "info" => array("variables" =>$variablesPreguntas)));
      }else{
      echo json_encode(array("response" => "error", "message" => "No hay informacion de variables", "info" => array("variables" => "")));  
      }
      
 
 
 