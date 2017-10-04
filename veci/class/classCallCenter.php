<?php

class classCallCenter {

    public function getCallCenter($tipoPerfil) {
        if ($tipoPerfil == 6) {
            return "CONTACTO";
        } else if ($tipoPerfil == 7) {
            return "MEXA";
        } else if ($tipoPerfil == 8) {
            return "Digitex";
        } else if ($tipoPerfil == 9) {
            return "Teleperformance";
        } else if ($tipoPerfil == 10) {
            return "Salescom";
        } else if ($tipoPerfil == 11) {
            return "VCIP";
        }
    }

}
