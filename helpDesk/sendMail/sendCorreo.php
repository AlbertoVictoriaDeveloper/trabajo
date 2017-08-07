<?php
 date_default_timezone_set('America/Mexico_City');
include ("./controller/controllerMail.php");

class sendCorreo{

    public $mail;

    public function __construct() {
        $this->mail = new controllerMail();
    }

    public function enviarMail($servicioID,$tipoServicio,$descripcionClient,$observacionesAdmin,$atiende,$fechaFin,$fechaInicio,$email) {
        $to = $email;
        $subject = 'Soporte Finalizado';
        $file = "view/bodyCorreo.html";
        $body = file_get_contents($file);
        $pattern[] = "{{noTic}}";
        $pattern[] = "{{fallo}}";
        $pattern[] = "{{observacionS}}";
        $pattern[] = "{{atendio}}";
        $pattern[] = "{{observacionF}}";
        $pattern[] = "{{horaI}}";
        $pattern[] = "{{horaT}}";
        $content[] =  $servicioID;
        $content[] =  $tipoServicio;
        $content[] =  $descripcionClient;
        $content[] =  $observacionesAdmin;
        $content[] =  $atiende;
        $content[] =  $fechaInicio;
        $content[] =  $fechaFin;
        $bodySend = preg_replace($pattern, $content, $body);
        $sendCorreo = $this->mail->Send_Mail($to, $subject, $bodySend);
        return $sendCorreo; 
    
    }

}
