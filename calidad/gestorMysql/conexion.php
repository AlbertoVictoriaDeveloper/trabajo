<?php
class conexion {
protected $config ; 
protected $conexion ; 

public function __construct($config) 
    { 
          $this->config =     parse_ini_file("./config/bd.ini"); 
    } 
    
  public function conectionBD() {
      $user = $this->config['user'];
      $host = $this->config['host'];
      $pass = $this->config['pass'];
      $dbName = $this->config['bdName']; 
      $this->conexion = mysql_connect($host,$user,$pass);
      if ($this->conexion == 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
      $this->db = mysql_select_db($dbName, $this->conexion);
      if ($this->db == 0) DIE("Lo sentimos, no se ha podido conectar con la base datos: ". mysql_error());
		return $this->conexion;

      }
      
      
      public function queryConsulta($query){
        $query = mysql_query($query,$this->conectionBD()); 
           if(!$query){
            return false;
    }
          return $query;
        
      }

   public function numeroFilas($resul){
       if(!is_resource($resul)){
           return false;
       }
       return mysql_num_rows($resul); 
   }

   public function fetch_assoc($resul){
     if(!is_resource($resul)){
         return false ; 
     }  
       return mysql_fetch_assoc($resul);
   }   
      
 
    
      
   public function isConnectBD(){
      if(!isset($this->conexion)){
          return true ; 
      }else{
          return false; 
      }    
   }

   public function disconnectes(){
         
          if(mysql_close($this->conectionBD())){
              return true;
      }else{
          return false;
      }
   
   }
  }  
    
