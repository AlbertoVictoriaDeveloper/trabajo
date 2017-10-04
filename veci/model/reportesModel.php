<?php

require_once  './gestorMysql/conexion.php';

class reportesModel extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }
        /*
        public function  estadistica($mebresia){
         $status = 0;
         try {
     $query = ("UPDATE audio SET status = '".$status."' WHERE membresia = '".$mebresia."'"); 
            $response = $this->queryConsulta($query);            
           return $response;
        } catch (Exception $e) {
            return false;
        } 
    }
	*/
	 public function getAlertas($perfil,$noUser,$callCenter = null)
	 {
         $query = "CALL Alertas('".$perfil."','".$noUser."','".$callCenter."')";
         $querys = $this->queryConsulta($query);    
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             return false; 
         }   
    }
	
    
    
    	 public function getAceptados($queryAceptadas)
	 {
         $query = $queryAceptadas;
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
            
         }else{
             
             return false; 
         }

}

          public function getRechazos($queryRechazos)
	 {
             
         $query = $queryRechazos ;
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
            
         }else{
             
             return false; 
         }
         }

         

 public function  GetAsignados($noEmple){
 
      $query = "SELECT
	calificacion.id,
	nombre,
	membresia,
	fecha,
	codigo_tel_venta,
	calificacion.`status`,
	No_cliente, 
        call_center
        
FROM
	calificacion
INNER JOIN audio ON calificacion.audio_id = audio.id
WHERE
	calificacion.numero_empleado = '".$noEmple."';";
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
            
         }else{
             
             return false; 
         }  
 }

   public function getAlertasEstadistica($queryEstadistica)
	 {
         $query = $queryEstadistica; 
         $querys = $this->queryConsulta($query); 
       
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }
            
    }
    
    public function aceptadasCallcenter($queryAceptadas){
        $query = $queryAceptadas;
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }     
    }
    
    
    public function  rechazadasCallcenter($queryRechazos){
         $query = $queryRechazos;
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }      
        
        
    }
    
    
    
     public function  realizadasCallcenter($queryReaalizadas){
         
       $query =  $queryReaalizadas;
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }         
    }    
    
    
    
//    public function  estadisticaMonitorista(){
//         $query = "CALL cursorTest;"; 
//         $querys = $this->queryConsulta($query); 
//             if($this->numeroFilas($querys)>0){
//                   while ($row = $this->fetch_assoc($querys)) {
//                $dataRow[] = $row;
//            } 
//            return $dataRow;
//        }else{
//            
//            return false; 
//        }        
//    }
    
    
    
  public function getPreguntasFalli($queryFall)
	 {
         $query = $queryFall; 
         $querys = $this->queryConsulta($query); 
       
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }
            
    }
    
 public function getPreguntasDetalles($queryMotiDetalles)
	 {
         $query = $queryMotiDetalles ; 
         $querys = $this->queryConsulta($query); 
       
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }
            
    }
    
    
  public function GetMotivoRechazo($idPregunta,$callcenter){
      $Preguntas = (int)$idPregunta;
      $query = "SELECT detallecalificaciones.comentario FROM detallecalificaciones INNER JOIN catpreguntas ON detallecalificaciones.catPreguntas_id = catpreguntas.id INNER JOIN audio ON  audio.id = detallecalificaciones.audio_id where respuesta = 0 and catPreguntas_id =".$Preguntas."  and call_center = '".$callcenter."'";        
      $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         } 
  }  
    
  
   public function getRechazosMotiCallCenter($queryRechaMoti){
            $query = $queryRechaMoti;        
      $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }  
       
   }
   
   
  public function  getdetalleCallMoti($queryMotivoCall){
      $query =$queryMotivoCall;        
      $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }  
  }
  
  public function getCuadrarMembresias(){
   $query =  "select * from membresia";   
   $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            } 
            return $dataRow;
         }else{
             
             return false; 
         }    
  }
  
  
  
 public function getGuardarMembresia($audioID,$membresia){
     try{
   $query = "INSERT INTO calificacion (
	id,
	calificacion,
	calificacion.`status`,
	nombre_empleado,
	fecha_resgistro,
	audio_id,
	numero_empleado,
	mebresia_cliente,
	ecd_registro
)VALUES(NULL,18,1,'SONIA ROSALVA','2017-07-11',".$audioID.",0868,'".$membresia."','ECD-1'
	)";   
     
     $response = $this->queryConsulta($query);
          return $response;      
        }catch (Exception $ex){
          return false; 
        }   
 }
 
   public function getUpdateMebresia($audioID){
        try {
     $query = ("update audio set audio.status = 0 where id = ".$audioID." "); 
            $response = $this->queryConsulta($query);            
           return $response;
        } catch (Exception $e) {
            return false;
        }   
   }
   
     
  public function getUpdateCaliCron($queryUpdate){
        try {
     $query = $queryUpdate; 
            $response = $this->queryConsulta($query);            
           return $response;
        } catch (Exception $e) {
            return false;
        }   
   }   
   
   
   
   
}