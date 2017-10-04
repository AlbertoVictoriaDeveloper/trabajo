<?php

require_once  './gestorMysql/conexion.php';

class audiosModel extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }

    
    public function GetAudios(){
      $querys = $this->queryConsulta("select * from audio where status = 1 ");
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        } 
        
    }
    
    public function getPreguntas(){
        $querys = $this->queryConsulta("select* from catpreguntas");
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        } 
    }
    
    public function todasPreguntas(){
     $querys = $this->queryConsulta("SELECT count(*) as total FROM catpreguntas WHERE status= 1   ORDER BY id");
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        } 
        
        
    }
    
      public function GetIdAudio($membresia){
     $querys = $this->queryConsulta("SELECT id FROM audio where membresia = '".$membresia."'");
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        } 
        
        
    }
    
      public function  GetComprobacion($membresia){
       $querys = $this->queryConsulta("SELECT id FROM audio where membresia = '".$membresia."'");
        if ($this->numeroFilas($querys) > 0) {
           return true ; 
        } else {
            return false;
        }   
      }
    
    
    
    
    public function  UpdateAudio($mebresia){
         $status = 0;
         try {
     $query = ("UPDATE audio SET status = '".$status."' WHERE membresia = '".$mebresia."'"); 
            $response = $this->queryConsulta($query);            
           return $response;
        } catch (Exception $e) {
            return false;
        } 
    }
    
   
    
    public function  guardarPregunta($idMonitorista,$IDAudios,$idPregunta,$comentario,$respuesta){
      
       $hora = date("Y-m-d  H:i:s",strtotime("-5 hour"));
       try{ 
      $query = "INSERT INTO detallecalificaciones 
          (id, monitorista_id, audio_id, catPreguntas_id,comentario,respuesta,fecha_res) 
          VALUES (NULL, '".$idMonitorista."', '".$IDAudios."','".$idPregunta."', '".$comentario."', '".$respuesta."', '".$hora."')"; 
           $response = $this->queryConsulta($query);
          return $response;  
       } catch (Exception $ex){
           return false;            
       }       
    }
    
    public function  guardarCalificacion($califiacion,$nombreMonitorista,$idAudi,$numeroEmpleado,$poliza){
        $status = $califiacion >= 18  ? 1 : 0; 
        $fecha = date("Y-m-d  H:i:s",strtotime("-5 hour"));
        try{
       $query = "INSERT INTO calificacion (id,calificacion,status,nombre_empleado,fecha_resgistro,audio_id,numero_empleado,mebresia_cliente) VALUES (NULL, '".$califiacion."', '".$status."', '".$nombreMonitorista."', '".$fecha."', '".$idAudi."','".$numeroEmpleado."','".$poliza."' )";   
       $response = $this->queryConsulta($query);
       return $response ; 
        }catch (Exception $ex){
            
            return false; 
            
        }
    }
    
    
    
    public function limpiarParametros(){
       try{
       $query = "update calificacion set  calificacion.nombre_empleado = REPLACE(calificacion.nombre_empleado,' ','');";   
       $response = $this->queryConsulta($query);
       return $response ; 
        }catch (Exception $ex){
            return false;
        }        
    }
   
    
   public function allValidadas($queryValidar){
    $querys = $this->queryConsulta($queryValidar);
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        }    
       
       
   }
    
    
    
    
    
    
    
    
    
    
}