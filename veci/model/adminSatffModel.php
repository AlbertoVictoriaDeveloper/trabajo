<?php

require_once  './gestorMysql/conexion.php';

class adminSatffModel extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }
    
   public function allValidadasAgente($queryAllValidaciones ){
    $query = $queryAllValidaciones ;
    $querys = $this->queryConsulta($query);
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        }    
   }
/*    
   
   public function rechazadasAgente(){
	       $querys = $this->queryConsulta();
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        }
   }
   
   public function aceptadaAgente(){
		       $querys = $this->queryConsulta("Select  calificacion.nombre_empleado,COUNT(membresia) as realizadas from audio 
        INNER JOIN calificacion on audio.id = calificacion.audio_id where   audio.`status` = 0 and 
		calificacion.status = 1
        GROUP BY numero_empleado ");
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        }     
   } */
   
}
    
    