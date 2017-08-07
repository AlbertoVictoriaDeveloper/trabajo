
<?php
/*
 * Recuperamos los datos del usuario 
 *  
*/
require_once "./model/modelSoporte.php";
class controllerReportes
{
   public  $modelSoporte ; 
  
  public function __construct($config) {
    $this->modelSoporte = new  modelSoporte($config); 
  }
 //$user = $_POST['nombreUser']; 
 //$pass = $_POST['passUser']; 
  
  public function getSoportesDiarios(){
     $query = "select CONVERT(servicios.fecha_servicio_inicio,date)as fecha,COUNT(*) as servicios from  servicios 
GROUP BY CONVERT(servicios.fecha_servicio_inicio,date)"; 
   return $this->modelSoporte->viewDatos($query);   
  }
  
  public function  serviciosSolicitados(){
      $query = "select cat_servicios.servicio,COUNT(servicios.cat_servicios_id ) as total from servicios   
                INNER JOIN cat_servicios ON cat_servicios.id = servicios.cat_servicios_id
                 GROUP BY servicios.cat_servicios_id ORDER BY total DESC"; 
                  return $this->modelSoporte->viewDatos($query);   
  }
  
  public function getUsuarioFrecuencia(){
      $query = "select  nombre_personal,COUNT(servicios.id) as total from servicios
  INNER JOIN asignaciones ON  servicios.id = asignaciones.servicios_id
  INNER JOIN  personal ON personal.id = asignaciones.personal_id
  GROUP BY nombre_personal";
      return $this->modelSoporte->viewDatos($query); 
  }
 
  
  public function  getDepartamentoFrecuencia(){
      $query = "select cat_depa.nombre_depa,COUNT(servicios.id) AS Peticiones from servicios
   INNER JOIN cat_servicios ON servicios.cat_servicios_id = cat_servicios.id
   INNER JOIN cat_depa ON  cat_depa.id = servicios.cat_depa_id
   GROUP BY cat_depa.nombre_depa ORDER BY servicios.id DESC";
       return $this->modelSoporte->viewDatos($query);
             
  }
  
  public function  getUsuariosRegisrados(){
      $query = "select * from  personal  INNER JOIN usuarios ON usuarios.id = personal.usuarios_id 
     INNER JOIN personal_areas ON personal_areas.id = personal.personal_areas_id
    INNER JOIN cat_depa ON personal_areas.cat_depa_id = cat_depa.id 
    INNER JOIN cat_puesto ON  personal_areas.cat_puesto_id = cat_puesto.id
     INNER JOIN cat_area ON  personal_areas.cat_area_id = cat_area.id ORDER BY personal.id ASC";
      return $this->modelSoporte->viewDatos($query); 
      
  }
 
 
}