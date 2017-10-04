<?php
/*
 * Recuperamos los datos del usuario 
 *  
*/
require_once "./model/userModel.php";
class loginUser
{
   public  $modelUser ; 
  
  public function __construct($config) {
      
    $this->modelUser = new  userModel($config); 
  }
 //$user = $_POST['nombreUser']; 
 //$pass = $_POST['passUser']; 
  
  public function isConnected(){
      session_start(); 
       if (isset($_SESSION['token'])) {
            return true;
        } else {
            return false;
        }
  }
  
  
  public function existUser($user,$password){
  $userValidate =$this->modelUser->GetUserExist($user,$password);  
   if(isset($userValidate[0]['id'])){
     return true; 
   }else{
       return false;  
   }
  }
  
  public function signIn($user,$password){
   $userValidates =$this->modelUser->GetUserExist($user,$password);  
   
   if(isset($userValidates[0]['id'])){
    $token = $this->modelUser->createToken($user); 
    session_start();
   $_SESSION['token'] = $token; 
   $idUser = $userValidates[0]['id']; 
   return  $this->modelUser->insertToken($token,$idUser); 
   }else{
       return false;  
   }
  }
  
  
  public function signOut($token) {
        $response = $this->modelUser->updateStatusToken($token);
        session_destroy();
        return $response;
    }
    
     public function getToken($token){
     return  $datosToken = $this->modelUser->getToken($token);  
     }
     
     public function getTokenBy($token){
        return  $this->modelUser->GetUsuariobyToken($token); 
         
     }
     public function procedimiento(){
         return  $this->modelUser->procedimiento(); 
        
     }
    
}


     
     
     
 
/* if($userValidate == True){
     
  require_once '../view/principalEstadis.phtml';
     
 }else{
     header('Location:http://localhost:8080/mapfre/');
 
 * }
 */
 
