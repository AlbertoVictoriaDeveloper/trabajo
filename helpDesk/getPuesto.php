<?php
date_default_timezone_set('America/Mexico_City');
include ("./controller/controllerAdmin.php");
$config = '';
$soporteDatos = new controllerAdmin($config);
$areaEmple = $_POST['areaEmple'];
    if ($datosPuesto = $soporteDatos->getPuestoIde($areaEmple)) {
            echo json_encode(array("response" => "ok", "message" => $datosPuesto,"info"=>array("puesto"=>$datosPuesto)));
        } else{
          echo json_encode(array("response" => "error", "message" => "informacion nula","info"=>array("puesto"=>"")));
        }