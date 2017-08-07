<?php
require_once "./library/class.phpmailer.php";
require_once "./library/class.smtp.php";
class controllerMail{
    // public $mailing;
   function Send_Mail($to,$subject,$body)
{
$from       = "soporte_sistemas@ecd.mx";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->PluginDir = "includes/";
$mail->Mailer = "smtp";
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.ecd.mx"; // SMTP host
$mail->Port       =  587;                    // set the SMTP port
$mail->SMTPSecure = 'tls'; //ssl
$mail->SMTPAuth   = true;
$mail->Username   = "soporte_sistemas@ecd.mx";  // SMTP  username
$mail->Password   = "so@ecd@15";  // SMTP password
$mail->timeout = 30;

$mail->SetFrom($from, 'Soporte ECD');
$mail->AddReplyTo($from,'Soporte ECD');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
//$mail->Body= $body;
$address = $to;
$mail->AddAddress($address, $to);
$exito = $mail->Send();
$intentos = 1; 
        while ((!$exito) && ($intentos < 3)) {
            sleep(5);
            //echo $mail->ErrorInfo;
            $exito = $mail->Send();
            $intentos = $intentos + 1;
        }
        if ($exito) {
            return true;
        } else {
            return false;
        }
}
  }   

