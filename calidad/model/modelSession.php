<?php
require_once  './gestorMysql/conexion.php';
class modelSession extends conexion{
   
    public function __construct($config) {
       
        parent::__construct($config);
    }

     public function  getConsulta($query){
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