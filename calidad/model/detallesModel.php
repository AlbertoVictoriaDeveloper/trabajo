<?php
require_once  './gestorMysql/conexion.php';

class  detallesModel extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }

     public function  getValidadasCallCenter($queryGetTotales){
         
        $query = $queryGetTotales; 
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
     
        public function  getTotalGenerales($queryGeneRecha){
        $query = $queryGeneRecha; 
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
     
     
     public function getDetallescallCenter($queryAceptadasCall){
  
        $query = $queryAceptadasCall;  
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
    
  
     public function getUsuario($queryUsuario){
                  
         $query = $queryUsuario ;
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
 
}

          