<?php
date_default_timezone_set("Mexico/General");
require_once "./model/reversasModel.php";

class controllerRegistrar {

    public $reversasModel;

    public function __construct($config) {

        $this->reversasModel = new reversasModel($config);
    }

    public function getInsertUsuario($user,$pass,$tipoUser) {
        $queryUsuario =  "INSERT INTO `usuarios` (`user`, `password`, `status`, `tiposperfil_id`) VALUES ('".$user."', '".$pass."', '1', '".$tipoUser."')"; 
        return $this->reversasModel-> guardarUsuarios($queryUsuario);
    }
    
    public function  updateContador($sumaContador,$idUsuario){
        $queryUpdate = "UPDATE `usuarios` SET `contador`='".$sumaContador."' WHERE (`id`='".$idUsuario."')"; 
               return  $this->reversasModel->getUsuario($queryUpdate); 
    }

   public function  updateStatuAudio($total,$idAudio,$comentarioObservaciones,$idUser,$nombreUser){
          $fecha = date("Y-m-d H:i:s"); 
         $queryUpdate = "UPDATE `audio` SET `status_audio`='0', `fecha_res`='".$fecha."', `calificacion`='".$total."',observaciones = '".$comentarioObservaciones."',id_usuario = '".$idUser."',nombre_usuario = '".$nombreUser."'  WHERE (`id`='".$idAudio."')"; 
          return  $this->reversasModel->getUsuario($queryUpdate); 
         
   }
           


   
    
    
    
     public function  saveAudio($nombreCampana,$fechaAudio,$agente,$clave,$tel,$status,$ruta){
     $query = "INSERT INTO `veci`.`audio`
(
`nombre_campana`,
`fecha_gestion`,
`agente`,
`clave_audio`,
`numero_marcado`,
`status_registro`,
`status_audio`,
`ruta_archivo`
)
VALUES(
'".$nombreCampana."',
'".$fechaAudio."',
'".$agente."',
'".$clave."',
'".$tel."',
'".$status."',
   '1',
 '".$ruta."'   
);";  
  
     
   return $this->reversasModel->guardarUsuarios($query);      
     
     
 }

 public function guardarVariables($respuestas,$statusRespuesta,$idUsuario,$variables,$idAudio ){
    $fecha = date("Y-m-d H:i:s"); 
     $query = "INSERT INTO `veci`.`detallescalifaciones`
(`respuesta`,
`status_respuesta`,
`fecha_respuesta`,
`usuarios_id`,
`catVariables_id`,
`audio_id`)
VALUES(
'".$respuestas."',
'".$statusRespuesta."',
'".$fecha."',
'".$idUsuario."',
'".$variables ."',
'".$idAudio."');"; 
        return $this->reversasModel->guardarUsuarios($query);    
      
 }
 
 
 
 
 
 
 
 
 
 public function  getAgentes(){
     $query = "select nombre_empleado,num_agente,contador from usuarios where usuarios.tiposPerfil_id = 3"; 
      return $this->reversasModel->getUsuario($query);
     
 }
  
 public function  getTotal($audio_id){
    $query = "select SUM(respuesta) AS total from detallescalifaciones where detallescalifaciones.audio_id = '".$audio_id."' GROUP BY audio_id"; 
            return $this->reversasModel->getUsuario($query);  
 }


 
 public function getUsuariosAgente($idAgente){
     $query = "select id,contador from usuarios where usuarios.num_agente = '".$idAgente."' LIMIT 1"; 
     return  $this->reversasModel->getUsuario($query);
     
 }
 
 
 
 
 public function  getVariables($gestion){
      $query = "select * from catvariables where tipo_variable = '".$gestion."' ORDER BY id asc"; 
      return $this->reversasModel->getUsuario($query);
   /*  $query = "select * from catvariables where tipo_variable = '".$gestion."' ORDER BY id asc ";
     return $this->reversasModel->getUsuario($query);*/
     
 }


 
 
 
 

 
 public function  getAudiosAgent($numAgente,$tipicacion){
     $query = "select * from audio WHERE audio.agente = '".$numAgente."' and status_audio = 1 and  audio.status_registro = '".$tipicacion."' ORDER BY RAND() LIMIT 1"; 
     return $this->reversasModel->getUsuario($query); 
     
 }

 
 
 
 public function  getTipificaciones(){
     $query = "select DISTINCT (audio.status_registro)  from audio"; 
      return $this->reversasModel->getUsuario($query); 
     
 }


 
 
 
 

    
    
    

     public function getUsuariosID(){
       $queryUsuario =  "select id from usuarios order by id desc  LIMIT 1";
       return $this->reversasModel->getUsuario($queryUsuario); 
     }
     
     public function getPassword($idUser){
       $queryUsuario =  "select usuarios.`password` from usuarios where id = ".$idUser."";
       return $this->reversasModel->getUsuario($queryUsuario);   
         
     }
    
     
     public function getAllDatosUsuarios($idUser){
          $queryUsuario =  "select usuarios.`user`,usuarios.`password`,monitorista.nombre,usuarios.tiposperfil_id from usuarios 
             INNER JOIN monitorista ON  usuarios.id = monitorista.usuarios_id
               where usuarios.id = ".$idUser."";
       return $this->reversasModel->getUsuario($queryUsuario);    
         
     }
     
     
     
    
    public function getInsertMonitorista($nombreUsuario,$idUser,$usuario) {
        $queryMonitorista = "INSERT INTO `monitorista` (`nombre`, `tipo`, `status`, `usuarios_id`, `numero_empleado`) VALUES ('".$nombreUsuario."', 'user', '1', '".$idUser."', '".$usuario."')"; 
        return $this->reversasModel->guardarUsuarios($queryMonitorista);
    }
    
    public function updateUser($idUser){
       $queryUpdateUser = "UPDATE `usuarios` SET `status`='0' WHERE `id`=".$idUser.""; 
        return $this->reversasModel-> updateUsuario($queryUpdateUser);
    }
    
    public function  updateMoni($idUser){
       $queryUpdateUser = "UPDATE `monitorista` SET `status`='1' WHERE `usuarios_id`=".$idUser.""; 
       return $this->reversasModel-> updateUsuario($queryUpdateUser);
        
    }
    
    
    
    public function  updateDatosUser($user,$pass,$tipo,$idUser){
     $queryUpdateDatos = "UPDATE `usuarios` SET `user`='".$user."',"
             . " `password`='".$pass."', `tiposperfil_id`='".$tipo."'  WHERE `id`=".$idUser.""; 
        return $this->reversasModel-> updateUsuario($queryUpdateDatos); 
        
    }
    
    public function  updateDatosMoni($nombreUsuario,$idUser){
        $queryUpdateDatos = "UPDATE `monitorista`SET `nombre`='".$nombreUsuario."'  WHERE `usuarios_id`=".$idUser.""; 
        return $this->reversasModel-> updateUsuario($queryUpdateDatos);    
        
        
    }
    
    
    

}