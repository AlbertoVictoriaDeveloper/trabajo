<?php

require_once "./model/adminSatffModel.php";
class controllerAdminSatff
{
   public  $modelController ; 
  
  public function __construct($config) {
      
    $this->modelController = new   adminSatffModel($config); 
  }
  
  
public function getAllValidaciones($fechaInicio,$fechaFin){
	   if($fechaInicio == ""  && $fechaFin == ""){
         $queryAllValidaciones = "Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
        INNER JOIN calificacion on audio.id = calificacion.audio_id  where audio.`status` = 0
        GROUP BY numero_empleado";
		return  $this->modelController->allValidadasAgente($queryAllValidaciones);
        }else{
           $queryAllValidaciones  = "Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
           INNER JOIN calificacion on audio.id = calificacion.audio_id where  audio.`status` = 0
           and fecha_resgistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."'
            GROUP BY numero_empleado ";
           return $this->modelController->allValidadasAgente($queryAllValidaciones); 
        }
}	

public function getAllRechazadas($fechaInicio,$fechaFin){
	 	   if($fechaInicio == ""  && $fechaFin == ""){
         $queryAllRechazadas = "Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
        INNER JOIN calificacion on audio.id = calificacion.audio_id where  audio.`status` = 0 and 
		calificacion.status = 0 GROUP BY numero_empleado ";
	return 	$this->modelController->allValidadasAgente($queryAllRechazadas);
        }else{
          $queryAllRechazadas  = "Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
           INNER JOIN calificacion on audio.id = calificacion.audio_id where  audio.`status` = 0
           and fecha_resgistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."' and calificacion.status = 0
            GROUP BY numero_empleado ";
      return    $this->modelController->allValidadasAgente($queryAllRechazadas);
        }
	
	
	
	 
	
}

public function getAllAceptdas($fechaInicio,$fechaFin){
	 	 	   if($fechaInicio == ""  && $fechaFin == ""){
         $queryAllAceptadas = "Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
        INNER JOIN calificacion on audio.id = calificacion.audio_id where  audio.`status` = 0 and 
		calificacion.status = 1 GROUP BY numero_empleado ";
		return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }else{
           $queryAllAceptadas  = "Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
           INNER JOIN calificacion on audio.id = calificacion.audio_id where  audio.`status` = 0
           and fecha_resgistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."' and calificacion.status = 1
            GROUP BY numero_empleado ";
           return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }
	
	
}

public function  validacionesDiarias($fechaInicio,$fechaFin){
     	 	   if($fechaInicio == ""  && $fechaFin == ""){
         $queryAllAceptadas = "Select  DISTINCT calificacion.fecha_resgistro ,COUNT(membresia) as Realizadas from audio 
         INNER JOIN calificacion on audio.id = calificacion.audio_id where  
          audio.`status` = 0  
          GROUP BY calificacion.fecha_resgistro";
		return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }else{
           $queryAllAceptadas  = "Select  DISTINCT calificacion.fecha_resgistro ,COUNT(membresia) as Realizadas from audio 
           INNER JOIN calificacion on audio.id = calificacion.audio_id where audio.`status` = 0 
           and   calificacion.fecha_resgistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."' 
           GROUP BY calificacion.fecha_resgistro";
           return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }  
     }
     
     
public function validacionesTotales($fechaInicio,$fechaFin){
       	 	   if($fechaInicio == ""  && $fechaFin == ""){
         $queryAllAceptadas = "select 
       (select COUNT(*) from calificacion) as Realizados ,
       (select COUNT(*) from calificacion where `status` ='1') as Positivos,
       (select COUNT(*) from calificacion WHERE `status` ='0') as Rechazados
       FROM calificacion LIMIT 1;";
		return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }else{
           $queryAllAceptadas  = "select 
       (select COUNT(*) from calificacion where  calificacion.fecha_resgistro BETWEEN   '".$fechaInicio."'  and '".$fechaFin."') as Realizados ,
       (select COUNT(*) from calificacion where `status` ='1' and calificacion.fecha_resgistro BETWEEN  '".$fechaInicio."'  and '".$fechaFin."' ) as Positivos,
       (select COUNT(*) from calificacion WHERE `status` ='0' and calificacion.fecha_resgistro BETWEEN  '".$fechaInicio."'  and '".$fechaFin."') as Rechazados
        FROM calificacion LIMIT 1;"; 
           return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }  
    
    
    }
}