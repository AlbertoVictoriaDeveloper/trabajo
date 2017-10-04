<?php

require_once  './gestorMysql/conexion.php';

class  adminSfattModel extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }
    
   public function allValidadasAgente(){
    $querys = $this->queryConsulta("Select  calificacion.nombre_empleado,COUNT(membresia) as Aceptadas from audio 
INNER JOIN calificacion on audio.id = calificacion.audio_id where  
fecha_resgistro BETWEEN '2017-06-22' AND '2017-06-23' and  audio.`status` = 0
GROUP BY numero_empleado ");
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
    