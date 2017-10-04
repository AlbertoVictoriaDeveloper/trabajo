<?php
date_default_timezone_set("Mexico/General");
require_once "./model/modelSession.php";

class controllerSession {
     public  $modelSession ; 
  
  public function __construct($config) {
      
    $this->modelSession = new modelSession($config); 
  }
    public function  getSession($typeSession){
        
        if($typeSession  == 0){
            $data = array('textoPrincipal' => "Sin  Asignaciones Activas",
                          'textoPanel'=>""); 
            return $data;  
        }else if($typeSession == 1){
            $data = array('textoPrincipal'=>"Campañas Activas a Monitoriar",
                          'textoPanel'=>"<div class='panel-heading'  style='background-color:#125c86;'>
                                        <h3 class='panel-title' style='color:#FFF' >Campañas Activas</h3>                                        
                                    </div>",
                        'tablaValidacion'=>"./view/monitoreo/tablaRamdon.phtml"
                         );
            return $data ;   
        }else if($typeSession == 2){
            $data = array('textoPrincipal'=>"Audios a Monitoriar", 
                          'textoPanel'=>"<div class='panel-heading'  style='background-color:#125c86;'>
                                        <h3 class='panel-title' style='color:#FFF' >Audios Activos</h3>                                        
                                    </div>",
                         'tablaValidacion'=>"./view/monitoreo/tablaAsignacion.phtml"
                                       
                );
            return $data ;         
        }    
    }
    
   
    public function  getConsultas($tipoSession,$idUser){
        if($tipoSession == 0 && $tipoSession == 1){
            return false; 
            
        }else{
       $query =  "select id_audio from asignacion_personal where asignacion_personal.estatus_regla = 1 and asignacion_personal.`user` = '".$idUser."' ";
      return  $datosUsuarios = $this->modelSession->getConsulta($query);

       //return     $id['id_audio'];
      // $queryAudios  = "select * from audio where id =  ".$idAudios['id_audio']." and status_audio = 1"; 
      // return $dateAudiosCompleto  =   $this->modelSession->getConsulta($queryAudios);  
       

        }
        
        
    }


  public function  getAudiosEscucha($idAudio){
    
      $queryAudios  = "select * from audio where id =  ".$idAudio." and status_audio = 1"; 
      return $dateAudiosCompleto  =   $this->modelSession->getConsulta($queryAudios);  
      
  }


  
    
    
    
    
    
    
    
    
    public function  getConsultaSession($idMonitorista){
        $query = "select   DISTINCT campana from asignacion_random where  asignacion_random.id_monitorista  = '".$idMonitorista."' and 
           asignacion_random.estatus_regla = 1 "; 
        return $this->modelSession->getConsulta($query); 

    }
    
    public function  getConsultaAsignacion($idMonitorista){
        $query = "select id_audio from asignacion_personal where id_monitorista = '".$idMonitorista."'"; 
        return  $this->modelSession->getConsulta($query);       
    }

    







    public function  getConsultaMotor($idMonitorista){
        $query = "select DISTINCT asignacion_random.motor_marcacion,campana from asignacion_random where  asignacion_random.id_monitorista  = '".$idMonitorista."' and 
           asignacion_random.estatus_regla = 1 "; 
        return $this->modelSession->getConsulta($query);   
    }
    
    public function  getDatosMonitorista($idMonitorista){
        $query = "select usuarios.`user`,nombre_validador,num_empleado from monitorista INNER JOIN usuarios  ON 
usuarios.id = monitorista.usuarios_id  where `user` = '".$idMonitorista."'";
        return $this->modelSession->getConsulta($query);   
        
    }
    
    
    
}