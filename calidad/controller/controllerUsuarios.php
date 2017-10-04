<?php

class controllerUsuarios {

    public function menus($tipoPerfil) {
        if ($tipoPerfil == 1) {
            $data = array('menu' => "view/menu/menuStaff.phtml",
                'index' => "pruebas.php",
                'header'=> "view/header/headers.phtml",
                 'tablaValidados'=>"",
                 'estadistica'=>""); 
            return $data;
        }else if($tipoPerfil == 2){
         $data = array('menu' => "view/menu/menuStaff.phtml",
                'index' => "monitoreosCalidad.php",
                 'templateStaff'=>"./view/monitoreo/principalMonitoreos.phtml",
                 'header'=> "view/header/headerStaff.phtml",
                 'menu'=> "view/menu/menuStaff.phtml",
                  'estadistica'=>"view/estadistica/estadistica.phtml");
            return $data;      
        }else if($tipoPerfil == 3){
            $data = array('menu' => "view/menu/menuStaff.phtml",
                'index' => "agentesValidaciones.php",
                 'templateStaff'=>"./view/staff/panelStaff.phtml",
                 'header'=> "view/header/headerStaff.phtml",
                  'estadistica'=>"view/estadistica/estadistica.phtml");
            return $data;        

        }else if ($tipoPerfil == 4){
             $data = array('menu' => "view/menu/menuSupervision.phtml",
                'index' => "supervisorCalidad.php",
                 'templateSupervisor'=>"./view/supervisor/panelsupervisor.phtml",
                 'header'=> "view/header/headerSupervirsor.phtml",
                 'asignaciones'=>"./view/supervisor/asignaciones.phtml",
                  'estadistica'=>"view/estadistica/estadistica.phtml");
            return $data;        

            
            
        }
    }
    


}
