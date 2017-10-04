<?php

class controllerUsuarios {

    public function menus($tipoPerfil) {
        if ($tipoPerfil == 1) {
            $data = array('menu' => "view/menu/menuStaff.phtml",
                'index' => "panelPrincipalStaff.php",
                'header'=> "view/header/headers.phtml",
                 'tablaValidados'=>"",
                 'estadistica'=>""); 
            return $data;
        }else if($tipoPerfil == 2){
         $data = array('menu' => "view/menu/menuStaff.phtml",
                'index' => "agentesValidaciones.php",
                 'templateStaff'=>"./view/staff/panelStaff.phtml",
                 'header'=> "view/header/headerStaff.phtml",
                  'estadistica'=>"view/estadistica/estadistica.phtml");
            return $data;      
            
        
        }
    }
    


}
