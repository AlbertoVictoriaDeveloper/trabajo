<?php
 date_default_timezone_set('America/Mexico_City');
    require_once "./controller/controllerAdmin.php";
    $config = ''; 
    $soporteUpdates = new controllerAdmin($config); 
 
    
  $noEmpleado = $_POST['noEmple']; 
  $nombreEmpleado = $_POST['nombreEmple']; 
  $departamentoValue = $_POST['AreaEmple']; 
  $puestoEmple = $_POST['puestoEmple'];
  $AreaEmple = $_POST['idArea']; 
  $fechaIngreso = date("Y-m-d");
  $getIdentificadro = $soporteUpdates->getIdenticadorPuestos($departamentoValue,$puestoEmple,$AreaEmple); 
  $ideIdentificador = $getIdentificadro[0]['id'];  
  $guardarUsuario = $soporteUpdates->insertNewUser($noEmpleado); 
  $idUsuario = $soporteUpdates->getIDUser();
 $usuarioID = $idUsuario[0]['id']; 
 $savePersonal =   $soporteUpdates->insetNewPerson($nombreEmpleado,$fechaIngreso,$departamentoValue,$usuarioID,$ideIdentificador,$puestoEmple,$AreaEmple,$departamentoValue); 
   /*-  
   if($guardarUsuario){
       $idUsuario = $soporteUpdates->getIDUser();
       $usuarioID = $idUsuario[0]['id']; 
      if($soporteUpdates->insetNewPerson($nombreEmpleado,$fechaIngreso,$departamentoValue,$usuarioID,$AreaEmple,$puestoEmple)){
         echo json_encode(array("response" => "ok", "message" => "Se Guardo Correctamente el Usuario"));
      }else{ 
          echo  json_encode(array("response" => "ok", "message" => "No Guardo Correctamente el Usuario"));
      }  
   }else{
         echo  json_encode(array("response" => "ok", "message" => "No Guardo Correctamente el Usuario"));
   }
   
 */
   
   
   
   
   
