<?php
include ("controller/controllerRegistrar.php"); 
      $config= ''; 
      $datosEncuesta = new controllerRegistrar($config); 
      $motores  = $_POST['motores'];
      $idUser = $_POST['idUser'];
      $agente = $datosEncuesta->getAgentesValidar($idUser,$motores); 
     if($agente){
        echo json_encode(array("response" => "ok", "message" => "Informacion de la variable correcta", "info" => array("agente" =>$agente)));
      }else{
      echo json_encode(array("response" => "error", "message" => "No hay informacion de variables", "info" => array("variables" => "")));  
      }
      