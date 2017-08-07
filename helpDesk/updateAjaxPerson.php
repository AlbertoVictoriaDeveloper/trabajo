<?php
date_default_timezone_set('America/Mexico_City');
include ("./controller/controllerAdmin.php");
$config = '';
$soporteDatos = new controllerAdmin($config);
       $idPersonal = $_POST['idPersonalUp'];
       $nombreUpdate = $_POST['nombreEmpleUpdate']; 
       $email = $_POST['emailUpdate'];
       $extension = $_POST['idExtension']; 
   echo   $statusPerson  = $_POST['idEstatusPersoni'];
      $departamentoValue = $_POST['AreaEmple']; 
      $puestoEmple = $_POST['puestoEmple'];
     $AreaEmple = $_POST['idArea']; 
     $getIdentificadro = $soporteDatos->getIdenticadorPuestos($departamentoValue,$puestoEmple,$AreaEmple); 
     $ideIdentificador = $getIdentificadro[0]['id'];  
      $fechaBaja = date("Y-m-d");
      $datos = $soporteDatos->updatePersonData($idPersonal,$nombreUpdate,$email,$extension,$statusPerson,
              $departamentoValue,$puestoEmple,$AreaEmple,$ideIdentificador,$fechaBaja);
      var_dump($datos); 
//      $departamentoValue = $_POST['departamentoValue']; 
//      $areaDepartamento = $_POST['areaDepartamento']; 
//      $puestoEmple  = $_POST['puestoEmple']; 
//     
//if ($datos = $soporteDatos->updatePersonData($nombreUpdate,$fechaBaja,$statusPerson,$departamentoValue,$areaDepartamento,$puestoEmple,$idPersonal,$email)) {
//        echo json_encode(array("response" => "OK", "message" => "Se Actualizo Correctamente el Usuario"));
//       } else {
//            echo json_encode(array("response" => "ERROR", "message" =>"No se Actualizo Correctamente el Usuario"));
//       }

