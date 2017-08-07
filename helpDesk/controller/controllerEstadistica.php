<?php

class controllerEstadistica {

    public function estadisticaDatos($tipoPerfil, $idPersonal) {
        if ($tipoPerfil == 3) {
            $data = array('perfil' => 2,
                'nouser' => $idPersonal,
                'noemple' => 0);
            return $data;
        } elseif ($tipoPerfil == 5) {
            $data = array('perfil' => 1,
                'nouser' => 0,
                'noemple' => $idPersonal);
            return $data;
        }elseif($tipoPerfil == 2){
               $data = array('perfil' => 1,
                'nouser' => 0,
                'noemple' => 0);
            return $data;
        }
    }

}
