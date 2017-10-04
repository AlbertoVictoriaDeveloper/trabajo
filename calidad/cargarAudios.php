<?php
include ("controller/controllerRegistrar.php");
include ("class/MP3File.class.php"); 
  $config= ''; 
  $saveRegistrar = new controllerRegistrar($config);
  $carpeta = '//10.1.1.245/audiosrespaldo/20170907/VECI';
 //$carpeta = 'C:\Nueva carpeta\VECI';
    //$carpeta = 'C:\xampp\htdocs\veci\audiosrespaldo\VECI';
 
 
 if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){  
                  $date = new DateTime($datosAudios[1]);
                 $fechaCompleta =  $date->format('Y-m-d H:i:s'); 
	           $datosAudios = explode('_',$archivo);  
                   $nombreCampana =  $datosAudios[0];      
                   $fechaAudio = $datosAudios[1];
                  $agente = $datosAudios[2];
                   $clave = $datosAudios[3];
                   $tel = $datosAudios[5];
                   $status = $datosAudios[6] == 1 ? 'SIN TIPIFICACION': $datosAudios[6];
                    $ruta = $carpeta.'/'.$archivo; 
                    $mp3file = new  MP3File($ruta);
                     $duration1 = $mp3file->getDurationEstimate();
    $duration2 = $mp3file->getDuration();
    $segundos =  $duration1 ;
     $total =      MP3File::formatTime($duration2);
                    
               $saveDatos =  $saveRegistrar->saveAudio($nombreCampana,$fechaAudio,$agente,$clave,$tel,$status,$ruta,$duration2,$segundos); 
               var_dump($saveDatos);  
            }
            }
            closedir($dir);
        }
    }

?>