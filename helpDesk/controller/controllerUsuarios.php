<?php

class controllerUsuarios {

    public function menus($tipoPerfil) {
        if ($tipoPerfil == 3) {
            $data = array('index' => "servicioClient.php",
                'estadistica' => "view/estadistica/estadisticaClient.phtml",
                'viewInicio' => "view/serviceClient.phtml",
                 'viewDirectory' => "view/directory.phtml",
                'viewHistoryClient' => "view/historyClientView.phtml",
                'viewNewServicio' => "view/newServicio.phtml",
                'header' => "./view/headers/layoutNewClient.phtml");
            return $data;
        }
        elseif ($tipoPerfil == 5) {
            $data = array('index' => "servicioAdmin.php",
                'estadistica' => "view/estadistica/estadistica.phtml",
                'viewInicio' => "view/serviceAdmin.phtml",
                'viewHistory' => "view/viewSuperAdmin/historySuperAdmin.phtml",
                'viewAlta'=>"view/altasUser.phtml",
                'viewNew'=>"view/viewRecepcion/newUsuarioAlta.phtml",
                'viewDirectory' => "view/directory.phtml",
                'header' => "./view/headers/layoutNewAdmin.phtml");
            return $data;
        }else if($tipoPerfil == 2){
            $data = array('index' => "servicioSuperAdmin.php",
                'estadistica' => "view/estadistica/estadistica.phtml",
                 'viewInicio' => "view/serviceAdmin.phtml",
                'viewTablero' => "view/viewSuperAdmin/superAdmin.phtml",
                'viewDirectory' => "view/directory.phtml",
                 'viewHistory' => "view/viewSuperAdmin/historySuperAdmin.phtml",
                'header' => "view/headers/layoutSuperAdmin.phtml");
            return $data;  
        }else if($tipoPerfil == 6 ){
            $data = array('index'=> "servicioRecepcion.php",
                           'viewInicio'=>"view/viewRecepcion/altaUsuario.phtml",
                            'viewDirectory' => "view/directory.phtml",
                            'viewNew'=>"view/viewRecepcion/newUsuarioAlta.phtml",
                             'estadistica' => "",
                            'header'=>"view/headers/layoutRecepcion.phtml");
            
            return $data;
            
            
            
            
        }
    }

}
