<?php
date_default_timezone_set('America/Mexico_City');
include ("controller/controllerAdmin.php"); 
      $config= ''; 
      $soporteDatos = new controllerAdmin($config); 
      $idPersonal = $_GET['idPersonal'];
      $getDatosActualizar =$soporteDatos->geDatosPersonalUpdate($idPersonal); 
 $datosVista['template'] = "./view/viewRecepcion/updateRecepcionPerson.phtml"; 
 require_once 'view/headers/layoutRecepcionModal.phtml';





