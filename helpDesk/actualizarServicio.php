<?php

date_default_timezone_set('America/Mexico_City');
include ("./controller/controllerAdmin.php");
include ("sendMail/sendCorreo.php");
$config = '';
$soporteDatos = new controllerAdmin($config);
$correo = new sendCorreo();
$observacionesAdmin = $_POST['observaciones'];
$servicioID = $_POST['idServicio'];
$status = $_POST['status'];
$fechaFin = date("Y-m-d H:i:s");
$personal = $_POST['atiende'];
$asignacionID = $_POST['id_asignaciones'];
$idPersonal = $_POST['idPersonal'];
$tipoServicio = $_POST['tipoServicio'];
$descripcionClient = $_POST['descripcionClient'];
$fechaInicio = $_POST['fechaInicio'];
//$personal = $_POST['idPersonal'];
//$descripcionClient = $_POST['descripcionClient'];
//$idClienteEmail = $_POST['idClienteEmail'];
//$fechaInicio = $_POST['fechaInicio'];
$email = $soporteDatos->getEmail($idPersonal);

if ($soporteDatos->actualizarServicio($status, $fechaFin, $observacionesAdmin, $servicioID)) {
    if ($soporteDatos->actualizarAsignacion($personal, $asignacionID)) {
        if ($status == 2) {
            echo json_encode(array("response" => "OK", "message" => "Tu Ticket Esta en Proceso"));
        } else {
            $send = $correo->enviarMail($servicioID, $tipoServicio, $descripcionClient, $personal, $observacionesAdmin, $fechaFin, $fechaInicio, $email);
            echo json_encode(array("response" => "OK", "message" => "Tu Ticket Esta Finalizado"));
        }
    } else {
        echo json_encode(array("response" => "error", "message" => "No Guardo Correctamente"));
    }
} else {
    echo json_encode(array("response" => "error", "message" => "No Guardo Correctamente"));
}