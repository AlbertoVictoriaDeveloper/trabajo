<?php

/*
 * Recuperamos los datos del usuario 
 *  
 */
require_once "./model/reportesModel.php";

class controllerReportes {

    public function __construct($config) {
        $this->modelReportes = new reportesModel($config);
    }

    public function GetAlertas($noUser, $tipoPerfil,$callCenter) {
        if ($tipoPerfil == 3) {  
            $perfil = 2;
            return $this->modelReportes->getAlertas($perfil,$noUser,'');
        }else if ($tipoPerfil == 4  || $tipoPerfil == 5 || $tipoPerfil == 2) {
            $perfil = 1;
            return  $this->modelReportes->getAlertas($perfil,'',$callCenter);      
       }else if ($tipoPerfil == 6 || $tipoPerfil == 7  ||  $tipoPerfil == 8 ||  $tipoPerfil == 9
             ||  $tipoPerfil == 10   ||  $tipoPerfil == 11 ) {
          $perfil = 3 ;     
              return  $this->modelReportes->getAlertas($perfil,$noUser,$callCenter);    
                      }
        }
    

    public function GetEstadistica($fechaInicio,$fechaFin) {
        if($fechaInicio == "" && $fechaFin == ""){
        $queryEstadis = "SELECT
	CASE calificacion.`status`
        WHEN 1 THEN
	'Aceptadas'
        WHEN 0 THEN
	'Rechazadas'
        END AS Estadistica,
        COUNT(calificacion.`status`) AS Valores
        FROM
	calificacion INNER JOIN audio ON audio.id = calificacion.audio_id
        where audio.`status` = 0
        GROUP BY
	calificacion.`status`";  
         return $datosEstadistica = $this->modelReportes->getAlertasEstadistica($queryEstadis);   
        }else{
        $queryEstadis = "SELECT
	CASE calificacion.`status`
        WHEN 1 THEN
	'Aceptadas'
        WHEN 0 THEN
	'Rechazadas'
        END AS Estadistica,
        COUNT(calificacion.`status`) AS Valores
        FROM
	calificacion INNER JOIN audio ON audio.id = calificacion.audio_id
        where audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."' and audio.`status` = 0
        GROUP BY
	calificacion.`status`";    
        return $datosEstadistica = $this->modelReportes->getAlertasEstadistica($queryEstadis);  
        }
    }

    public function GetAceptados($noUser, $tipoPerfil,$callCenter) {
        if ($tipoPerfil == 5 || $tipoPerfil == 2  ) {
            $queryAceptadas = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
           WHERE
     calificacion.`status` = 1  and audio.`status` = 0 ";
            return $this->modelReportes->getAceptados($queryAceptadas);
        } else if ($tipoPerfil == 3) {
            $queryAceptadas = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
     WHERE
          calificacion.numero_empleado ='" . $noUser . "'
          AND calificacion.`status` = 1   and audio.`status` = 0";
            return $this->modelReportes->getAceptados($queryAceptadas);
        }else if ($tipoPerfil == 4) {
		            $queryAceptadas = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
           WHERE
     calificacion.`status` = 1   and audio.`status` = 0";
            return $this->modelReportes->getAceptados($queryAceptadas);		
		}else if($tipoPerfil == 6 || $tipoPerfil == 7  ||  $tipoPerfil == 8 ||  $tipoPerfil == 9
             ||  $tipoPerfil == 10   ||  $tipoPerfil == 11 ){
           $queryAceptadas = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
           WHERE
     calificacion.`status` = 1 and audio.call_center = '".$callCenter."' and audio.`status` = 0 ";
            return $this->modelReportes->getAceptados($queryAceptadas);    
                    
             }        
    }

    public function GetRechazos($noUser,$tipoPerfil,$callCenter) 
            {
       if ($tipoPerfil == 5  || $tipoPerfil == 2 ) {
            $queryRechazos = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
           WHERE
     calificacion.`status` = 1   and audio.`status` = 0  ";
            return $this->modelReportes->getRechazos($queryRechazos);
        } else if ($tipoPerfil == 3) {
            $queryRechazos = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
     WHERE
          calificacion.numero_empleado ='" . $noUser . "'
          AND calificacion.`status` = 0   and audio.`status` = 0     ";
            return $this->modelReportes->getRechazos($queryRechazos);
        } else if ($tipoPerfil == 4) {
		 $queryRechazos = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
           WHERE
     calificacion.`status` = 0    and audio.`status` = 0 ";
            return $this->modelReportes->getRechazos($queryRechazos);		
       }else if($tipoPerfil == 6 || $tipoPerfil == 7  ||  $tipoPerfil == 8 ||  $tipoPerfil == 9
             ||  $tipoPerfil == 10   ||  $tipoPerfil == 11 ){
              $queryRechazos = "SELECT No_cliente,	
            nombre,
            membresia,
            codigo_tel_venta,
            fecha_resgistro as 'Fecha Validacion',
            call_center    FROM
	                   audio
         INNER JOIN calificacion ON audio.id = calificacion.audio_id
           WHERE
     calificacion.`status` = 0 and audio.call_center = '".$callCenter."'   and audio.`status` = 0    ";
            return $this->modelReportes->getRechazos($queryRechazos);	       
                }
    }

    public function GetAsignados($noUser) {
        return $this->modelReportes->GetAsignados($noUser);
    }

    public function GetAceptadosCallCenter($fechaInicio,$fechaFin) {
        if($fechaInicio == "" &&  $fechaFin == ""){
         $queryAceptadas = "SELECT audio.call_center ,COUNT(*) AS Aceptadas  from audio INNER JOIN calificacion ON audio.id = calificacion.audio_id 
                 where calificacion.`status` = 1  and audio.`status` = 0 
                 GROUP BY audio.call_center ;";
           return $this->modelReportes->aceptadasCallcenter($queryAceptadas);                
        }else{
       $queryAceptadas = "SELECT audio.call_center,COUNT(*) AS Aceptadas  from audio INNER JOIN calificacion ON audio.id = calificacion.audio_id 
                 where calificacion.`status` = 1 and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'  and audio.`status` = 0 
                 GROUP BY audio.call_center";
             return $this->modelReportes->aceptadasCallcenter($queryAceptadas);             
        }      
    }

    public function GetRechazadasCallCenter($fechaInicio,$fechaFin) {
         if($fechaInicio == ""   && $fechaFin == ""){
         $queryRechazos = "SELECT audio.call_center,COUNT(*) AS Rechazadas  from audio INNER JOIN calificacion ON audio.id = calificacion.audio_id 
                 where calificacion.`status` = 0  and audio.`status` = 0 
                 GROUP BY audio.call_center";    
           return $this->modelReportes->rechazadasCallcenter($queryRechazos); 
         }else{
        $queryRechazos = "SELECT audio.call_center,COUNT(*) AS Rechazadas  from audio INNER JOIN calificacion ON audio.id = calificacion.audio_id 
                 where calificacion.`status` = 0 and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'  
                 GROUP BY audio.call_center";     
             return $this->modelReportes->rechazadasCallcenter($queryRechazos);    
         }
    }

    public function GetRealizadas($fechaInicio,$fechaFin) {
        if($fechaInicio == "" &&  $fechaFin == ""){
                  $query = "SELECT audio.call_center ,COUNT(*) AS Realizadas  from audio 
                   where audio.`status` = 0   and audio.`status` = 0 
                   GROUP BY audio.call_center ;";
                  return $this->modelReportes->realizadasCallcenter($query);               
        }else{
         $query = "SELECT audio.call_center ,COUNT(*) AS Realizadas  from audio 
                   where audio.`status` = 0  and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'  
                   GROUP BY audio.call_center ;";
                   return $this->modelReportes->realizadasCallcenter($query);
        }
    }

//        
//        public function GetEstadisticaMoni(){
//            
//            return $this->modelReportes->estadisticaMonitorista();
//        }

    public function GetFallidasCall($fechaInicio,$fechaFin) {
          if($fechaInicio == "" && $fechaFin == "" ){
           $queryFall = "SELECT
           detallecalificaciones.catPreguntas_id,
	  pregunta,
          COUNT(respuesta) as 'Cuentas de Rechazo', (select count(*) FROM detallecalificaciones where respuesta = 0 ) as 'todos'
          FROM
	  detallecalificaciones
          INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
          INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
          where respuesta = 0  
          GROUP BY catPreguntas_id,pregunta 
          ORDER BY COUNT(respuesta) DESC" ;  
           return $this->modelReportes->getPreguntasFalli($queryFall);
          }else{
        $queryFall = "SELECT
        detallecalificaciones.catPreguntas_id,
	pregunta,
        COUNT(respuesta) as 'Cuentas de Rechazo', (select count(*) FROM detallecalificaciones where respuesta = 0 ) as 'todos'
        FROM
	detallecalificaciones
        INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
        INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
        where respuesta = 0 and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'
         GROUP BY catPreguntas_id,pregunta 
         ORDER BY COUNT(respuesta) DESC";  

           return $this->modelReportes->getPreguntasFalli($queryFall); 
          }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function  getDetallesTotales($callCenter){
     return    $this->modelReportes->getValidadasCallCenter($callCenter); 
    }
    
    
        public function getMotivoDetalles($idPregunta,$fechaInicio,$fechaFin){
         if($fechaInicio == ""  && $fechaFin == ""){
            $queryMotiDetalles = "SELECT
                             audio.call_center,catpreguntas.pregunta,
                             COUNT(respuesta) as 'Cuentas de Rechazo'
                              FROM
	                     detallecalificaciones
                         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
                         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
                         where respuesta = 0 and catPreguntas_id = '".$idPregunta."'
                         GROUP BY catPreguntas_id,pregunta,call_center
                         ORDER BY COUNT(respuesta) DESC";
                    return $this->modelReportes->getPreguntasDetalles($queryMotiDetalles); 
         }else{
           $queryMotiDetalles = "SELECT
                             audio.call_center,catpreguntas.pregunta,
                             COUNT(respuesta) as 'Cuentas de Rechazo'
                              FROM
	                     detallecalificaciones
                         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
                         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
                         where respuesta = 0 and catPreguntas_id = '".$idPregunta."'  and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'
                         GROUP BY catPreguntas_id,pregunta,call_center
                         ORDER BY COUNT(respuesta) DESC";
                    return $this->modelReportes->getPreguntasDetalles($queryMotiDetalles);  
            
         }     
    }
    
    public function getRechazoMotivo($idPregunta,$callCenter){

       return  $this->modelReportes->GetMotivoRechazo($idPregunta,$callCenter);
    }
    
    public function getMotiRechazo($callCenter,$fechaInicio,$fechaFin){
        if($fechaInicio == ""  && $fechaFin == ""){
         $queryRechaMoti = "SELECT
         detallecalificaciones.catPreguntas_id,pregunta,
         COUNT(respuesta) as 'Cuentas de Rechazo', (select count(*) FROM detallecalificaciones where respuesta = 0 ) as 'todos'
          FROM
	 detallecalificaciones
         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
         where respuesta = 0 and  audio.call_center = '".$callCenter."'  
         GROUP BY catPreguntas_id,pregunta 
         ORDER BY COUNT(respuesta) DESC";
         return  $this->modelReportes->getRechazosMotiCallCenter($queryRechaMoti);
        }else{
           $queryRechaMoti = "SELECT
         detallecalificaciones.catPreguntas_id,pregunta,
         COUNT(respuesta) as 'Cuentas de Rechazo', (select count(*) FROM detallecalificaciones where respuesta = 0 ) as 'todos'
          FROM
	detallecalificaciones
INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
 where respuesta = 0 and  audio.call_center = '".$callCenter."'  and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."' 
GROUP BY catPreguntas_id,pregunta 
ORDER BY COUNT(respuesta) DESC";
       return  $this->modelReportes->getRechazosMotiCallCenter($queryRechaMoti);
        }
     }
    
    
   public function getMotiviCall($idPregunta,$callCenter,$fechaInicio,$fechaFin){
       if($fechaInicio == "" && $fechaFin == ""){
         $queryMotivoCall = "select audio.No_cliente,audio.nombre,audio.membresia,audio.fecha,audio.call_center from detallecalificaciones 
INNER JOIN audio ON audio.id = detallecalificaciones.audio_id where detallecalificaciones.catPreguntas_id = '".$idPregunta."' and 
audio.call_center = '".$callCenter."'   and respuesta = 0 ";          
        return $this->modelReportes->getdetalleCallMoti($queryMotivoCall);   
       }else{
   $queryMotivoCall = "select audio.No_cliente,audio.nombre,audio.membresia,audio.fecha,audio.call_center from detallecalificaciones 
INNER JOIN audio ON audio.id = detallecalificaciones.audio_id where detallecalificaciones.catPreguntas_id = '".$idPregunta."' and 
audio.call_center = '".$callCenter."'   and respuesta = 0  and audio.fecha  BETWEEN '".$fechaInicio."' AND '".$fechaFin."'";           
       return $this->modelReportes->getdetalleCallMoti($queryMotivoCall);    
       }
   }
   
       
   public function getMotiviCallUsuario($idPregunta,$fechaInicio,$fechaFin){
       if($fechaInicio == ""){
         $queryMotivoCall = "SELECT
                             calificacion.nombre_empleado,
                             COUNT(respuesta) as 'Cuentas de Rechazo'
                              FROM
	                     detallecalificaciones
                         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
                         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
                         INNER JOIN calificacion ON  audio.id = calificacion.audio_id
                         where respuesta = 0 and catPreguntas_id = '".$idPregunta."'
                         GROUP BY catPreguntas_id,calificacion.nombre_empleado
                         ORDER BY COUNT(respuesta) DESC";          
                        return $this->modelReportes->getdetalleCallMoti($queryMotivoCall);   
       }else{
   $queryMotivoCall = "SELECT
                             calificacion.nombre_empleado,
                             COUNT(respuesta) as 'Cuentas de Rechazo'
                              FROM
	                     detallecalificaciones
                         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
                         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
                         INNER JOIN calificacion ON  audio.id = calificacion.audio_id
                         where respuesta = 0 and catPreguntas_id = '".$idPregunta."' 
                   and calificacion.fecha_resgistro BETWEEN '".$fechaInicio."' and '".$fechaFin."'
                         GROUP BY catPreguntas_id,calificacion.nombre_empleado
                         ORDER BY COUNT(respuesta) DESC";           
       return $this->modelReportes->getdetalleCallMoti($queryMotivoCall);    
       }
   }
   
   
       public function motivosRechazo($fechaInicio,$fechaFin,$callCenter){
        if($fechaInicio == "" && $fechaFin == "" ){
           $queryFall = "SELECT  catpreguntas.pregunta,count(detallecalificaciones.respuesta) as Rechazadas FROM detallecalificaciones 
                         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id 
                         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id 
                         where respuesta = 0  and audio.call_center like '%".$callCenter."%'
                         GROUP BY catpreguntas.pregunta   ORDER BY Rechazadas DESC";  
                        
           return $this->modelReportes->getPreguntasFalli($queryFall);
          }else{
        $queryFall = "SELECT  catpreguntas.pregunta,count(detallecalificaciones.respuesta) as Rechazadas FROM detallecalificaciones 
                         INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id 
                         INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id 
                         INNER JOIN calificacion ON  audio.id = calificacion.audio_id
                         where respuesta = 0   and 
                         calificacion.fecha_resgistro BETWEEN '".$fechaInicio."' and '".$fechaFin."'
                         and audio.call_center like '%".$callCenter."%'    
                         GROUP BY catpreguntas.pregunta  ORDER BY Rechazadas DESC"; 
           return $this->modelReportes->getPreguntasFalli($queryFall); 
          }
       }
   
      public function rangeMotivos($fechaInicio,$fechaFin,$callCenter){
        if($fechaInicio == "" && $fechaFin == "" ){
           $queryFall = "Select  DISTINCT calificacion.fecha_resgistro ,COUNT(membresia) as Realizadas from audio 
         INNER JOIN calificacion on audio.id = calificacion.audio_id where  
          audio.`status` = 0  and calificacion.`status` = 0 and audio.call_center like '%".$callCenter."%'
          GROUP BY calificacion.fecha_resgistro";           
           return $this->modelReportes->getPreguntasFalli($queryFall);
          }else{
        $queryFall = "Select  DISTINCT calificacion.fecha_resgistro ,COUNT(membresia) as Realizadas from audio 
         INNER JOIN calificacion on audio.id = calificacion.audio_id where  
          audio.`status` = 0  and calificacion.`status` = 0 and audio.call_center like '%".$callCenter."%'
          and calificacion.fecha_resgistro BETWEEN '".$fechaInicio."' and '".$fechaFin."'
          GROUP BY calificacion.fecha_resgistro"; 
           return $this->modelReportes->getPreguntasFalli($queryFall); 
          }
       }
       
       
       
       
       
       
       
       
       
   
   
   
       public function GetFallidasCallI($fechaInicio,$fechaFin) {
          if($fechaInicio == "" && $fechaFin == "" ){
           $queryFall = "SELECT
           detallecalificaciones.catPreguntas_id,
	  pregunta,
          COUNT(respuesta) as 'Cuentas de Rechazo', (select count(*) FROM detallecalificaciones where respuesta = 0 ) as 'todos'
          FROM
	  detallecalificaciones
          INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
          INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
           INNER JOIN calificacion ON  audio.id = calificacion.audio_id
          where respuesta = 0 
          GROUP BY catPreguntas_id,pregunta 
          ORDER BY COUNT(respuesta) DESC" ;  
           return $this->modelReportes->getPreguntasFalli($queryFall);
          }else{
        $queryFall = "SELECT
        detallecalificaciones.catPreguntas_id,
	pregunta,
        COUNT(respuesta) as 'Cuentas de Rechazo', (select count(*) FROM detallecalificaciones where respuesta = 0 ) as 'todos'
        FROM
	detallecalificaciones
        INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id
        INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id
         INNER JOIN calificacion ON  audio.id = calificacion.audio_id
        where respuesta = 0 and calificacion.fecha_resgistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."'
         GROUP BY catPreguntas_id,pregunta 
         ORDER BY COUNT(respuesta) DESC";  

           return $this->modelReportes->getPreguntasFalli($queryFall); 
          }
  
    }
   
   public function  validacionesDiariasRechazos($fechaInicio,$fechaFin){
     	 	   if($fechaInicio == ""  && $fechaFin == ""){
         $queryAllAceptadas = "Select  DISTINCT calificacion.fecha_resgistro ,COUNT(membresia) as Realizadas from audio 
         INNER JOIN calificacion on audio.id = calificacion.audio_id where  
          audio.`status` = 0  and calificacion.status = 0
          GROUP BY calificacion.fecha_resgistro";
		return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }else{
           $queryAllAceptadas  = "Select  DISTINCT calificacion.fecha_resgistro ,COUNT(membresia) as Realizadas from audio 
           INNER JOIN calificacion on audio.id = calificacion.audio_id where audio.`status` = 0  and calificacion.status = 0 
           and   calificacion.fecha_resgistro BETWEEN '".$fechaInicio."' AND '".$fechaFin."' 
           GROUP BY calificacion.fecha_resgistro";
           return $this->modelController->allValidadasAgente($queryAllAceptadas);
        }  
     }
     
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  public function getMembresias(){
     return $this->modelReportes->getCuadrarMembresias();   
      
  } 
  
  public function  UpdateMembresiaSin($audioID){
  return $this->modelReportes->getUpdateMebresia($audioID);   
      }
  
      
    public function  updateCalificacionCron($audioID){
    $query = "update calificacion set calificacion.status = 1,calificacion.calificacion = 18 where calificacion.audio_id = ".$audioID." ";     
  return $this->modelReportes->getUpdateCaliCron($query);   
      }    
      
      
   public function  updateDetalles($audioID){
     $query = "update detallecalificaciones set  detallecalificaciones.comentario = '' , respuesta = 1
                where detallecalificaciones.audio_id = ".$audioID."";
     return $this->modelReportes->getUpdateCaliCron($query);
  
   }


   
      
      
      
      
      
      public function InsertMembresiaSin($audioID,$membresia){
       return $this->modelReportes->getGuardarMembresia($audioID,$membresia);   
      }
    
}
