<?php



require_once  './gestorMysql/conexion.php';

class userModel extends conexion {

    public function __construct($config) {
       
        parent::__construct($config);
    }

    public function usuarios() {
        $querys = $this->queryConsulta("select * from usuarios");
        if ($this->numeroFilas($querys) > 0) {
            while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }

            return $dataRow;
        } else {
            return false;
        }
    }
    
       public function createToken($mail) {
        $token = md5($mail . rand(0, 9) . rand(0, 9) . date("Ymd"));
        return $token;
    }
    
    public function insertToken($token,$userID){
        $status = 1; 
        try{
            
          $query = "INSERT INTO token (id,token,status,usuarios_id) 
                   VALUES (NULL, '".$token."','".$status."','".$userID."')";
          $response = $this->queryConsulta($query);
          return $response; 
          
        } catch (Exception $ex) {
          return false; 
        }
        
    }
    
    public function getToken($token){
       $query = "select * from token 
        LEFT  JOIN usuarios on token.usuarios_id = usuarios.id  
        LEFT JOIN personal ON   usuarios.id = personal.usuarios_id 
        LEFT JOIN tipos_usuarios ON tipos_usuarios.id = usuarios.tipos_usuarios_id 
        LEFT JOIN personal_areas ON personal_areas.id = personal.personal_areas_id
        LEFT JOIN cat_depa ON personal_areas.cat_puesto_id = cat_depa.id 
        LEFT JOIN cat_puesto ON  personal_areas.cat_puesto_id = cat_puesto.id
        LEFT JOIN cat_area ON  personal_areas.cat_area_id = cat_puesto.id
        where token = '".$token."'";
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
    
    
//    public function GetUsuariobyToken($token){
//        $query = "SELECT  monitorista.id ,monitorista.usuarios_id,usuarios.user,monitorista.nombre FROM token INNER JOIN usuarios ON token.usuarios_id = usuarios.id INNER JOIN monitorista ON usuarios.ID =monitorista.usuarios_id WHERE token ='".$token."' "; 
//         $querys = $this->queryConsulta($query);
//         if($this->numeroFilas($querys)>0){
//          while ($row = $this->fetch_assoc($querys)) {
//                $dataRow[] = $row;
//            } 
//            return $dataRow;
//         }else{
//             
//             return false; 
//         } 
//    }
//    
    
    
    
    public function GetUserExist($nombre,$usuarios){
      $consulta = "SELECT * FROM usuarios where username = '".$nombre."' and password = '".$usuarios."'"; 
      $querys = $this->queryConsulta($consulta); 
      if ($this->numeroFilas($querys) > 0) {
         while ($row = $this->fetch_assoc($querys)) {
                $dataRow[] = $row;
            }
           return $dataRow;   
        } else {
            return false;
        } 
    }
    
    public function existUser($nombre,$usuarios){
   $user = $this->GetUser($nombre,$Usuarios); 
    if($user){
         return true ;         
   }else{
        return false ;  
     }
    }

    
     public function updateStatusToken($token) {
         $status = 0;
         try {
     $query = ("UPDATE token SET status = '".$status."' WHERE token = '".$token."'"); 
            $response = $this->queryConsulta($query);            
           return $response;
        } catch (Exception $e) {
            return false;
        }
    }
    
      public function procedimiento(){
        $query = "CALL prue(0)"; 
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


