<?php
    date_default_timezone_set('America/Mexico_City');
    require_once "./controller/controllerAdmin.php";
    $config = ''; 
    $soporteUpdates = new controllerAdmin($config); 
    /*
     * Datos Servicio     '2017-07-19 23:00:00
     */
  $observaciones = $_POST['desc']; 
   $fechaInicio = date("Y-m-d H:i:s"); 
   $tipoServicioID = $_POST['servicio']; 
   $departamentoID = $_POST['departamento'];
    /*
     * Datos Asignacion
     * 
     */
    
   $clienteID = $_POST['idPersonal']; 
   $nombreClient = $_POST['nombreCliente']; 
   $puestoClient = $_POST['puestoCliente'];
   $guardarTicket =  $soporteUpdates->InsertTicket($observaciones,$fechaInicio,$tipoServicioID,$departamentoID); 
  if($guardarTicket){
     $serviceID  = $soporteUpdates->GetServiciosID();
     $servicioID = $serviceID[0]['id']; 
     $guardarAsignacion = $soporteUpdates->InsertAsignacion($servicioID,$clienteID); 
        if($guardarAsignacion){
     echo    json_encode(array("response" => "ok", "message" => "Se Guardo Correctamente"));
      }else{
        echo json_encode(array("response" => "error", "message" => "No Guardo Correctamente la asignacion")); 
    }
      }else{
         echo json_encode(array("response" => "error", "message" => "No Guardo Correctamente"));   
      }
    
    
    
    
    
    
    
    
    