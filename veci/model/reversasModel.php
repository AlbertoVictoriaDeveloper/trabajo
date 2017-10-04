<?php

require_once './gestorMysql/conexion.php';

class reversasModel extends conexion {

    public function __construct($config) {

        parent::__construct($config);
    }

    public function updateStatus($membresia) {
        try {
            $query = ("update audio set audio.status = 1 where membresia = '" .
                    $membresia . "'");
            $response = $this->queryConsulta($query);
            return $response;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteCalifacion($audioID) {
        try {
            $query = ("delete from calificacion where calificacion.audio_id =" . $audioID . "");
            $response = $this->queryConsulta($query);
            return $response;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteDetalles($audioID) {
        try {
            $query = ("delete from detallecalificaciones where detallecalificaciones.audio_id =" . $audioID . "");
            $response = $this->queryConsulta($query);
            return $response;
        } catch (Exception $e) {
            return false;
        }
    }
    
        public function  guardarUsuarios($queryInsert){
     
       try{ 
      $query = $queryInsert; 
           $response = $this->queryConsulta($query);
          return $response;  
       } catch (Exception $ex){
           return false;            
       }       
    }
    
         public function getUsuario($queryUsuario){
                  
         $query = $queryUsuario ;
         $querys = $this->queryConsulta($query); 
         if($this->numeroFilas($querys)>0){
          while ($row = $this->fetch_assoc($querys)) {
           $dataRow[] = array_map('utf8_encode',$row);
            } 
            return $dataRow;
            
         }else{
             return false; 
         }      
     }
     
     
         public function updateUsuario($queryUpdate) {
        try {
            $query = $queryUpdate;
            $response = $this->queryConsulta($query);
            return $response;
        } catch (Exception $e) {
            return false;
        }
    }
    
    
    
    
    
    
    
    

}
