<?php

require_once "./model/audiosModel.php";
class controllerAudios
{
   public  $modelController ; 
  
  public function __construct($config) {
      
    $this->modelController = new  audiosModel($config); 
  }
  
  
public function getIDAudios($membresia){
    return $this->modelController->GetIdAudio($membresia); 
    
}

public function getUpdateAudios($membresia){
    
     return $this->modelController->UpdateAudio($membresia); 
    
}
 

public function setAudios(){
   return $this->modelController->GetAudios();  
}


public function setPreguntas(){
     return $this->modelController->getPreguntas();  
    
    
}

public function setAllAudios(){
    return  $this->modelController->todasPreguntas(); 
    
}

 public function  savePreguntas($idMonitorista,$IDAudios ,$idPregunta,$comentario,$respuesta){
    return    $this->modelController->guardarPregunta($idMonitorista,$IDAudios,$idPregunta,$comentario,$respuesta);
      
 }
 
 public function saveCalificacion($califiacion,$nombreMonitorista,$idAudi,$numeroEmpleado,$poliza){
 if( $califiacion >= 18 ){
          return $this->modelController->guardarCalificacion($califiacion,$nombreMonitorista,$idAudi,$numeroEmpleado,$poliza); 
       }else{
        return $this->modelController->guardarCalificacion($califiacion,$nombreMonitorista,$idAudi,$numeroEmpleado,$poliza); 
       }
    
 }
 
 public function  setAudiosValidados($callCenter){
     if($callCenter == ""){
    $query = "select audio.id as audioID,calificacion.id 
         ,audio.No_cliente,membresia,call_center,audio.nombre,audio.fecha
         ,audio.codigo_tel_venta,audio.grabaciones,calificacion.`status`,calificacion.nombre_empleado,audio.status as statusA
         from audio INNER JOIN calificacion ON  audio.id = calificacion.audio_id 
         ORDER BY calificacion.audio_id ASC";
     return $this->modelController->allValidadas($query);
     }else{
     $query = "select audio.id as audioID,calificacion.id 
         ,audio.No_cliente,membresia,call_center,audio.nombre,audio.fecha
         ,audio.codigo_tel_venta,audio.grabaciones,calificacion.`status`,calificacion.nombre_empleado,audio.status as statusA
         from audio INNER JOIN calificacion ON  audio.id = calificacion.audio_id where audio.call_center = '".$callCenter."'
         ORDER BY calificacion.audio_id ASC";
     return $this->modelController->allValidadas($query);    
         
     }
 }
 
 
 public  function getTipoUsuarios(){
      $query = "select * from tiposperfil"; 
       return $this->modelController->allValidadas($query);  
 }

 public function  getAllUsuarios(){
     $query = "select usuarios.id,usuarios.user,monitorista.nombre,monitorista.tipo 
         from  usuarios inner JOIN monitorista on usuarios.id = monitorista.usuarios_id 
           where usuarios.`status` = 1 and monitorista.status = 1"; 
      return $this->modelController->allValidadas($query);  
     
     
 }


 
 public function limpiar(){
     
     return $this->modelController->limpiarParametros();
 }
 public function  existMembresia($poliza){
     
     return $this->modelController->GetComprobacion($poliza);
 }
 
}