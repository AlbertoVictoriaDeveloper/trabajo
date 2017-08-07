<?php

require_once  './gestorMysql/conexion.php';

class modelSoporte extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }

    public function viewDatos($query) {
        $querys = $this->queryConsulta($query);
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = array_map('utf8_encode',$row);
            }

            return $dataRow;
        } else {
            return false;
        }
    }
    
    
    public function queryModel($insertQuery){
        try{
          $query = $insertQuery;
          $response = $this->queryConsulta($query);
          return $response; 
        } catch (Exception $ex) {
          return false; 
        }
        
    }    
}


