<?php
/*
 * Recuperamos los datos del usuario 
 *  
*/
require_once "./model/modelSoporte.php";
class controllerAdmin
{
   public  $modelSoporte ; 
  
  public function __construct($config) {
    $this->modelSoporte = new  modelSoporte($config); 
  }
 //$user = $_POST['nombreUser']; 
 //$pass = $_POST['passUser']; 
  
  public function getSoportes(){
     $query = "select  * from personal t1 
    INNER JOIN asignaciones t2 on t2.personal_id = t1.id
    INNER JOIN servicios t3 on t2.servicios_id = t3.id
    INNER JOIN cat_depa t4 ON t3.cat_depa_id = t4.id
    INNER JOIN cat_servicios t5 ON t3.cat_servicios_id = t5.id    
    INNER JOIN personal_areas t6 ON  t6.id = t1.personal_areas_id
    INNER JOIN cat_puesto t7 ON  t6.cat_puesto_id = t7.id
     INNER JOIN cat_area   t8 ON  t6.cat_area_id = t8.id
 where t3.status in ('1','2')"; 
   
   return $this->modelSoporte->viewDatos($query);   
  }
  /*con fecha 
  public function getHistoryAdmin($idPersonal){
     $query = "select  * from personal t1 
INNER JOIN asignaciones t2 on t2.personal_id = t1.id
INNER JOIN servicios t3 on  t3.id= t2.servicios_id
INNER JOIN tipo_servicios t4 on t4.id = t3.tipo_servicios_id
INNER JOIN departamento t5 on t5.id = t3.departamento_id
where  t3.status = 3 and t2.personal_id = ".$idPersonal." and CONVERT(fecha_servicio_fin,date) = CONVERT(now(),date)"; 
   return $this->modelSoporte->viewDatos($query);   
  }
  */
   public function getHistoryAdmin($nombre){
  $query = "select  * from personal t1 
            INNER JOIN asignaciones t2 on t2.personal_id = t1.id
            INNER JOIN servicios t3 on  t3.id= t2.servicios_id
            INNER JOIN cat_servicios t4 on t4.id = t3.cat_servicios_id
            INNER JOIN cat_depa t5 on t5.id = t3.cat_depa_id
            where  t3.status = 3 and t2.asignacion LIKE '%".$nombre."%'"; 
   
   return $this->modelSoporte->viewDatos($query);   
  }
  
  
  
  public function  insertNewUser($noEmple){
      $query = "INSERT INTO `usuarios` (`username`, `password`,active,`tipos_usuarios_id`) VALUES (".$noEmple.", 'temporal1',0,'3')";
      return $this->modelSoporte->queryModel($query);
  }

  
  public function   insetNewPerson($nombreEmpleado,$fechaIngreso,$departamentoValue,$usuarioID,$ideIdentificador,$puestoEmple,$AreaEmple,$departamentoValue){
      $query = "INSERT INTO `personal` (`id`,`nombre_personal`,`fecha_ingreso`,`fecha_baja`,`statusPerson`, `usuarios_id`,`personal_areas_id`, `personal_areas_cat_puesto_id`,`personal_areas_cat_area_id`,`personal_areas_cat_depa_id`) VALUES (".$usuarioID.",'".$nombreEmpleado."', '".$fechaIngreso."',0000-00-00,0,".$usuarioID.",".$ideIdentificador.",".$puestoEmple.",".$AreaEmple.",".$departamentoValue.")";
      return $this->modelSoporte->queryModel($query); 
  }


  public function  updatePersonData($idPersonal,$nombreUpdate,$email,$extension,$statusPerson,
              $departamentoValue,$puestoEmple,$AreaEmple,$ideIdentificador,$fechaBaja){
 if($statusPerson == 2){
   $query = "UPDATE personal SET fecha_baja = '".$fechaBaja."',nombre_personal = '".$nombreUpdate."',email = '".$email."',extension = '".$extension."',statusPerson = '".$statusPerson."',personal_areas_id = ".$ideIdentificador.",personal_areas_cat_puesto_id = ".$puestoEmple.",personal_areas_cat_area_id = ".$AreaEmple.",personal_areas_cat_depa_id   = ".$departamentoValue."  WHERE  personal.usuarios_id = ".$idPersonal."";  
   return $this->modelSoporte->queryModel($query); 
 }elseif ($statusPerson == 1) {
  $query = "UPDATE personal SET fecha_ingreso = '".date("Y-m-d")."' ,fecha_baja = '0000-00-00',nombre_personal = '".$nombreUpdate."',email = '".$email."',extension = '".$extension."',statusPerson = '".$statusPerson."',personal_areas_id = ".$ideIdentificador.",personal_areas_cat_puesto_id = ".$puestoEmple.",personal_areas_cat_area_id = ".$AreaEmple.",personal_areas_cat_depa_id   = ".$departamentoValue."  WHERE  personal.usuarios_id = ".$idPersonal."";      
  return $this->modelSoporte->queryModel($query);
 }       
elseif($statusPerson == ""){
      $query = "UPDATE personal SET nombre_personal = '".$nombreUpdate."',email = '".$email."',extension = '".$extension."',statusPerson = '".$statusPerson."',personal_areas_id = ".$ideIdentificador.",personal_areas_cat_puesto_id = ".$puestoEmple.",personal_areas_cat_area_id = ".$AreaEmple.",personal_areas_cat_depa_id   = ".$departamentoValue."  WHERE  personal.usuarios_id = ".$idPersonal."";      
  return $this->modelSoporte->queryModel($query);    
}
 }
            
        
      
  

public function  getIdenticadorPuestos($departamentoValue,$puestoEmple,$AreaEmple){
$query = "select personal_areas.id  from personal_areas where personal_areas.cat_depa_id = ".$departamentoValue."  and  personal_areas.cat_puesto_id = ".$puestoEmple."
           and personal_areas.cat_area_id = ".$AreaEmple.""; 
return $this->modelSoporte->viewDatos($query); 

}



  
  
  
  
  
  public function getIDUser(){
      $query =  "SELECT usuarios.id from usuarios  ORDER BY usuarios.id DESC LIMIT 1";
      return $this->modelSoporte->viewDatos($query); 
  }

  
  public function geDatosPersonalUpdate($idPersonal){
      $query = "select * from  personal INNER JOIN usuarios ON usuarios.id = personal.usuarios_id 
   INNER JOIN personal_areas  ON  personal.personal_areas_id = personal_areas.id
    INNER JOIN cat_puesto  ON  personal_areas.cat_puesto_id = cat_puesto.id
     INNER JOIN cat_area    ON  personal_areas.cat_area_id = cat_puesto.id
      INNER JOIN  cat_depa ON   personal_areas.cat_depa_id = cat_depa.id
               where usuarios_id =".$idPersonal." LIMIT 1"; 
      return $this->modelSoporte->viewDatos($query);
      
  }
  
  
  
  
  
  
  
  
  
  public function getDirectotrio(){
      $query = "select nombre,cat_puesto.puesto,extension 
                from personal INNER JOIN cat_puesto ON  cat_puesto.id = personal.cat_puesto_id  where extension is not NULL";
      return $this->modelSoporte->viewDatos($query);  
  }
   
  
  public function getAreas($IDdepartamento,$IDpuesto){
      $query = "select cat_area.id ,cat_area.area from cat_area INNER JOIN personal_areas ON personal_areas.cat_area_id = cat_area.id
              where personal_areas.cat_depa_id= ".$IDdepartamento."  and personal_areas.cat_puesto_id = ".$IDpuesto."";
       return $this->modelSoporte->viewDatos($query); 
     }

  public function  getPuestoIde($identificadorPuesto){
     $query = "select cat_puesto.id ,cat_puesto.puesto
               from cat_puesto 
              INNER JOIN personal_areas ON  personal_areas.cat_puesto_id = cat_puesto.id
   where  personal_areas.cat_depa_id= ".$identificadorPuesto."  GROUP BY personal_areas.cat_puesto_id";  
     return $this->modelSoporte->viewDatos($query); 
      
  }


  
  
    public function getTodosClient($idPersonal){
     $query = "select  * from personal t1 
    INNER JOIN asignaciones t2 on t2.personal_id = t1.id
    INNER JOIN servicios t3 on t2.servicios_id = t3.id
    INNER JOIN cat_depa t4 ON t3.cat_depa_id = t4.id
    INNER JOIN cat_servicios t5 ON t3.cat_servicios_id = t5.id    
    INNER JOIN personal_areas t6 ON  t6.id = t1.personal_areas_id
    INNER JOIN cat_puesto t7 ON  t6.cat_puesto_id = t7.id
     INNER JOIN cat_area   t8 ON  t6.cat_area_id = t8.id
     where  t3.status  in (1,2) and t1.id = '".$idPersonal."'"; 
   return $this->modelSoporte->viewDatos($query);   
  }
  
    
  /*fecha
    public function getHistoryClient($idPersonal){
     $query = "select  * from personal t1 
INNER JOIN asignaciones t2 on t2.personal_id = t1.id
INNER JOIN servicios t3 on  t3.id= t2.servicios_id
INNER JOIN tipo_servicios t4 on t4.id = t3.tipo_servicios_id
INNER JOIN departamento t5 on t5.id = t3.departamento_id
where `status` = 3 and  t2.cliente_id = '".$idPersonal."' and CONVERT(fecha_servicio_fin,date) = CONVERT(now(),date)"; 
     return $this->modelSoporte->viewDatos($query);   
  }
  
  */
    
    public function getHistoryClient($idPersonal){
     $query = "select  * from personal t1 
     INNER JOIN asignaciones t2 on t2.personal_id = t1.id
     INNER JOIN servicios t3 on t2.servicios_id = t3.id
     INNER JOIN cat_servicios t4 on  t3.cat_servicios_id = t4.id 
     INNER JOIN cat_departamento t5 on t3.cat_departamento_id = t5.id 
     where  t3.status = 3  and t1.id = ".$idPersonal.""; 
     return $this->modelSoporte->viewDatos($query);   
  }
  
  
  
  
  
  
  
  
  
  
  
  
      public function getHistoryAll(){
     $query = "select  * from personal t1 
            INNER JOIN asignaciones t2 on t2.personal_id = t1.id
            INNER JOIN servicios t3 on  t3.id= t2.servicios_id
            INNER JOIN cat_servicios t4 on t4.id = t3.cat_servicios_id
            INNER JOIN cat_depa t5 on t5.id = t3.cat_depa_id
            where  t3.status = 3";
     return $this->modelSoporte->viewDatos($query);   
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  public function  getDepartamentos(){
      $query = "select * from cat_depa"; 
      return $this->modelSoporte->viewDatos($query); 
      
  }

  
  public function getServicios(){
      $query = "select * from cat_servicios"; 
      return $this->modelSoporte->viewDatos($query); 
      
  }
  
  
  public function  getPuesto(){
      $query = "select * from cat_puesto"; 
      return $this->modelSoporte->viewDatos($query); 
  }

  
  public function  getArea(){
      $query = "select * from cat_area"; 
       return $this->modelSoporte->viewDatos($query); 
      
  }

  
  
  
  
 public  function estadisticaAdmin($estadisticaDatos){
     $query = "CALL soporte ('".$estadisticaDatos['perfil']."','".$estadisticaDatos['nouser']."','".$estadisticaDatos['noemple']."')";
     return $this->modelSoporte->viewDatos($query); 
 }
 
 public function  actualizarAsignacion($atiende,$idAsignacion){
     $query = "UPDATE asignaciones SET  asignacion = '".$atiende."' WHERE idasignaciones = ".$idAsignacion.""; 
     return $this->modelSoporte->queryModel($query);
     
     
 }
 
 public function  actualizarServicio($status,$fechaFin,$observaciones,$servicioID){
  $query = "UPDATE servicios SET status = '".$status."',fecha_servicio_fin = '".$fechaFin."',observacionesTicket = '".$observaciones."' where id = '".$servicioID."'"; 
  return $this->modelSoporte->queryModel($query);
  }
  
  public function InsertTicket($observaciones,$fechaInicio,$idServicio,$idDepartamento){
   $query = "INSERT INTO `servicios` (`observaciones`, `status`, `fecha_servicio_inicio`,`cat_servicios_id`, `cat_depa_id`) VALUES ('".$observaciones."',1,'".$fechaInicio."',".$idServicio.",".$idDepartamento.")";     
   return $this->modelSoporte->queryModel($query);   
      
  }
  
  
  
  
  
  
  
  public function GetServiciosID(){
    $query =  "SELECT id  from servicios order by id desc  LIMIT 1"; 
    return $this->modelSoporte->viewDatos($query);
  }
  
   public function getEmail($personal){
    $query =  "SELECT  email  from personal where usuarios_id = ".$personal."";
    $queryAll = $this->modelSoporte->viewDatos($query); 
     return  $email = $queryAll[0]['email'];   
   }

  public function getAtienede($idAsignacion){
    $query = "select nombre from personal t1 
     INNER JOIN asignaciones t2 on t2.personal_id = t1.id
     INNER JOIN servicios t3 on  t3.id= t2.servicios_id
     INNER JOIN tipo_servicios t4 on t4.id = t3.tipo_servicios_id
     INNER JOIN departamento t5 on t5.id = t3.departamento_id
     where id_asignaciones = ".$idAsignacion."";   
     $queryAtiende = $this->modelSoporte->viewDatos($query); 
     return  $atiende = $queryAtiende[0]['nombre']; 
  }
   
  
  public function InsertAsignacion($servicioID,$clienteID){
    $query = "INSERT INTO `asignaciones` (`servicios_id`,`personal_id`,`asignacion`) VALUES (".$servicioID.",".$clienteID.",'Sin Asignacion')"; 
    return $this->modelSoporte->queryModel($query);  
      
      
  }
  

 
}