<?php

/*
 * Recuperamos los datos del usuario 
 *  
 */
require_once "./model/detallesModel.php";

class controllerDetalles {

    public function __construct($config) {
        $this->detallesModel = new detallesModel($config);
    }


    public function  GetTotales($callCenter,$fechaInicio,$fechaFin){
        $callCenterNueva = trim($callCenter);
        if($fechaInicio == "" && $fechaFin == ""){
         $queryGetTotales ="select nombre,audio.No_cliente,audio.membresia,audio.fecha,audio.codigo_tel_venta,audio.call_center,calificacion.`status` from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
                 where  audio.`status` = 0 and call_center like '".$callCenterNueva."'ORDER BY audio.fecha asc "; 
       return  $this->detallesModel->getValidadasCallCenter($queryGetTotales);     
        }else{
      $queryGetTotales ="select nombre,audio.No_cliente,audio.membresia,audio.fecha,audio.codigo_tel_venta,audio.call_center,calificacion.`status` from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
                 where  audio.`status` = 0 and call_center like '".$callCenterNueva."' and audio.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin."' ORDER BY audio.fecha asc "; 
       return  $this->detallesModel->getValidadasCallCenter($queryGetTotales);     
        }
    }
    
    public function GetTotalesGeneralStatus($status,$fechaInicio,$fechaFin){
         $statusNueva = trim($status);
        if($fechaInicio == "" && $fechaFin == ""){
             $queryGeneRecha = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  calificacion.`status` = '".$statusNueva."'"; 
             return $this->detallesModel->getTotalGenerales($queryGeneRecha); 
        }else{
             $queryGeneRecha = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  calificacion.`status` = '".$statusNueva."' and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'"; 
             return $this->detallesModel->getTotalGenerales($queryGeneRecha);   
        }
    }
    
    public function getCallCenterStatus($aceptadasCall,$fechaInicio,$fechaFin){
        $callCenterNueva = trim($aceptadasCall); 
        if ($fechaInicio == "" && $fechaFin == "") {
        $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  calificacion.`status` = 1 and call_center like '".$callCenterNueva."'";    
        return $this->detallesModel->getDetallescallCenter($queryAceptadasCall);  
          }else{
                 $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  calificacion.`status` = 1 and call_center like '".$callCenterNueva."' and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'";    
        return $this->detallesModel->getDetallescallCenter($queryAceptadasCall);           
          }
    }   
    
    
    
  public function  getValidadasUsuarios($usuarios,$fechaInicio,$fechaFin){
    $usuariosNuevos = trim($usuarios);
    if($fechaInicio == "" &&  $fechaFin == ""){
        $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  audio.`status` = 0 and calificacion.nombre_empleado like '%".$usuarios."%';"; 
        return $this->detallesModel->getDetallescallCenter($queryAceptadasCall);   
    } else{
      $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  audio.`status` = 0 and calificacion.nombre_empleado like '%".$usuarios."%' and 
            fecha_resgistro  BETWEEN  '".$fechaInicio."' and '".$fechaFin."' ;"; 
           return $this->detallesModel->getDetallescallCenter($queryAceptadasCall); 
  }     
}

   
  public function  getAceptadasUsuarios($usuarios,$fechaInicio,$fechaFin){
    $usuariosNuevos = trim($usuarios);
    if($fechaInicio == "" &&  $fechaFin == ""){
        $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  audio.`status` = 0 and calificacion.status = 1 and calificacion.nombre_empleado like '%".$usuarios."%';";  
        return $this->detallesModel->getDetallescallCenter($queryAceptadasCall);   
    } else{
      $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  audio.`status` = 0 and calificacion.nombre_empleado like '%".$usuarios."%' and calificacion.status = 1 and 
            fecha_resgistro  BETWEEN  '".$fechaInicio."' and '".$fechaFin."' ;"; 
           return $this->detallesModel->getDetallescallCenter($queryAceptadasCall); 
  }     
}
    public function  getRechazadasUsuarios($usuarios,$fechaInicio,$fechaFin){
    $usuariosNuevos = trim($usuarios);
    if($fechaInicio == "" &&  $fechaFin == ""){
        $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  audio.`status` = 0 and  calificacion.status = 0 and calificacion.nombre_empleado  like '%".$usuarios."%';"; 
        return $this->detallesModel->getDetallescallCenter($queryAceptadasCall);   
    } else{
      $queryAceptadasCall = "select * from audio INNER JOIN calificacion on audio.id = calificacion.audio_id 
             where  audio.`status` = 0 and calificacion.nombre_empleado like '%".$usuarios."%' and calificacion.status = 0 and 
            fecha_resgistro  BETWEEN  '".$fechaInicio."' and '".$fechaFin."' ;"; 
           return $this->detallesModel->getDetallescallCenter($queryAceptadasCall); 
  }     
}






  public function getDetallesRechazosUsuarios($usuario,$idPregunta,$fechaInicio,$fechaFin){
         if($fechaInicio == "" ){
          $queryDetallesUsuarios = "select audio.nombre,audio.membresia,audio.call_center,detallecalificaciones.comentario from audio 
        INNER JOIN   detallecalificaciones ON detallecalificaciones.audio_id = audio.id
        INNER JOIN  calificacion ON calificacion.audio_id = audio.id
       where detallecalificaciones.catPreguntas_id = '".$idPregunta."' and  calificacion.nombre_empleado like '%".$usuario."%' 
         and detallecalificaciones.respuesta = 0"; 

        return $this->detallesModel->getDetallescallCenter($queryDetallesUsuarios);   
    } else{
        $queryDetallesUsuarios = "select audio.nombre,audio.membresia,audio.call_center,detallecalificaciones.comentario from audio 
         INNER JOIN   detallecalificaciones ON detallecalificaciones.audio_id = audio.id
         INNER JOIN   monitorista ON monitorista.id = detallecalificaciones.monitorista_id
         INNER JOIN  calificacion ON calificacion.audio_id = audio.id
         where detallecalificaciones.catPreguntas_id = '".$idPregunta."' and calificacion.nombre_empleado like '%".$usuario."%' 
         and  detallecalificaciones.respuesta = 0 and fecha_resgistro BETWEEN '".$fechaInicio."' and '".$fechaFin."'";  
        return $this->detallesModel->getDetallescallCenter($queryDetallesUsuarios); 
  }          
   }










 public function getvalidacionesDiarias($fecha){
     $query = "SELECT
	t1.nombre_empleado,
	count(t2.`status`) AS Rechazadas,
  count(t3.`status`) AS Aceptadas,
  count(t4.`status`) AS Realizadas
FROM
	calificacion AS t1
LEFT JOIN calificacion t2  on t2.`status` = 0 and t1.id = t2.id 
 LEFT JOIN  calificacion t3 on t3.`status`  = 1 and t1.id = t3.id
  LEFT JOIN  calificacion t4 on   t1.id = t4.id
 where t1.fecha_resgistro = '".$fecha."'
GROUP BY
	t1.nombre_empleado "; 
     return $this->detallesModel->getDetallescallCenter($query);    
  }
public function getRechazadasDiarias($fecha,$callCenter){
    $query = "select  No_cliente,nombre,membresia,fecha  from 
audio  INNER JOIN calificacion  on audio.id = calificacion.audio_id
where calificacion.`status` = 0  and calificacion.fecha_resgistro = '".$fecha."'
and call_center like '".$callCenter."' "; 
     return $this->detallesModel->getDetallescallCenter($query);     

}
  
  public function  getRechazosAsw($res,$callcenter){
         if($fechaInicio == "" ){
             return $res ; exit; 
          $queryDetallesAsw = "select No_cliente,nombre,membresia,fecha  from 
          audio INNER JOIN detallecalificaciones on audio.id = detallecalificaciones.audio_id
          INNER JOIN catpreguntas on  detallecalificaciones.catPreguntas_id = catpreguntas.id
          where catpreguntas.pregunta like '%".$pregunta."%' and 
          call_center like '%".$callcenter."%' and detallecalificaciones.respuesta = 0"; 
          return $queryDetallesAsw ; exit ; 
        return $this->detallesModel->getDetallescallCenter($queryDetallesAsw);   
    } else{
        $queryDetallesAsw = "";  
        return $this->detallesModel->getDetallescallCenter( $queryDetallesAsw); 
  }                    
   }
   
   
   public function getPregunta($res,$callCenter){
     if($fechaInicio == "" ){
          $queryDetallesAsw = "select No_cliente,nombre,membresia,fecha  from 
          audio INNER JOIN detallecalificaciones on audio.id = detallecalificaciones.audio_id
          INNER JOIN catpreguntas on  detallecalificaciones.catPreguntas_id = catpreguntas.id
          where catpreguntas.pregunta like '%".$res."%' and 
          call_center like '%".$callCenter."%' and detallecalificaciones.respuesta = 0";  
        return $this->detallesModel->getDetallescallCenter($queryDetallesAsw);   
    } else{
        $queryDetallesAsw = "";  
        return $this->detallesModel->getDetallescallCenter( $queryDetallesAsw); 
  }                    
   }
  
   
   
   public function  getAudio(){
       
       $query = "select * from audio"; 
        return $this->detallesModel->getDetallescallCenter($query); 
       
   }
  
  
 }



