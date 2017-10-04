<?php
include ("controller/controllerRegistrar.php");
  $config= ''; 
  $saveRegistrar = new controllerRegistrar($config);
  $carpeta = '//10.1.1.245/audiosrespaldo/20170907/VECI';
 //$carpeta = 'C:\Nueva carpeta\VECI';
    //$carpeta = 'C:\xampp\htdocs\veci\audiosrespaldo\VECI';
 
 
 if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){  
 
	           $datosAudios = explode('_',$archivo);  
                   $nombreCampana =  $datosAudios[0];      
                   $fechaAudio = $datosAudios[1];
                  $agente = $datosAudios[2];
                   $clave = $datosAudios[3];
                   $tel = $datosAudios[5];
                   $status = $datosAudios[6] == 1 ? 'SIN TIPIFICACION': $datosAudios[6];
                    $ruta = $carpeta.'/'.$archivo; 
                   
                $saveDatos =  $saveRegistrar->saveAudio($nombreCampana,$fechaAudio,$agente,$clave,$tel,$status,$ruta); 
               
            }
            }
            closedir($dir);
        }
    }

?>