<?php
date_default_timezone_set('America/Mexico_City');
include ("./controller/controllerAdmin.php");
$config = '';
$soporteDatos = new controllerAdmin($config);
$IDdepartamento = $_POST['departamento'];
$IDpuesto = $_POST['puestoEmple'];
    if ($datosAreas = $soporteDatos->getAreas($IDdepartamento,$IDpuesto)) {
            echo json_encode(array("response" => "ok", "message" => "Informacion","info"=>array("depa"=>$datosAreas)));
        } else{
          echo json_encode(array("response" => "error", "message" => "informacion nula","info"=>array("depa"=>"")));
        }