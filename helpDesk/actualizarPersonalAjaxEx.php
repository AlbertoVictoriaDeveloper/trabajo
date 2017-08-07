<?php
 
date_default_timezone_set('America/Mexico_City');
include ("controller/controllerAdmin.php"); 
      $config= ''; 
      $soporteDatos = new controllerAdmin($config); 
      $idPersonal = $_GET['idPersonal'];
      $ideDepa =$_GET['ideDepa'];
      $datosDepa = $soporteDatos->getDepartamentos(); 
      $getDatosActualizar =$soporteDatos->geDatosPersonalUpdate($idPersonal);  
      $datosVista['template'] = "./view/updatePersonAdmin.phtml"; 
      require_once 'view/headers/layoutRecepcionModal.phtml';