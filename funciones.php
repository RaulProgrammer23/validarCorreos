<?php 
require_once 'constantes.php';
//Definimos los espacios de nombre (name space)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Incluyamos los archivos de PHPMailer con el autoload
require 'vendor/autoload.php';


function enviarCorreo($email, $nombre, $sbj, $body) {
    
    //Creamos una instancia de PHPMailer
    $mail = new PHPMailer();
    try {

        //Ajustes del servidor
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;  con esta opcion nos muestra la depuracion en caso se ha producido un un error        
        //Set mailer to use smtp
        $mail->isSMTP();
        //Definimos smtp host
        $mail->Host = "smtp.gmail.com";
        //Habilitamos smtp authentication
        $mail->SMTPAuth = true;
        //Eligmos el tipy de encriptación (ssl/tls)
        $mail->SMTPSecure = "ssl";
        //Eligmos el puerto
        $mail->Port = "465";

        //Establecemos el nombre del usuario de nuestro correo 
        $mail->Username = EMAIL;
        //Set gmail password
        $mail->Password = EMAIL_PASSWORD; 
        //Establecemos nuestro correo electronico que va a ser el remitente
        $mail->setFrom(EMAIL,EMPRESA_EMISORA);
        //Añadimos el corrreo y nombre del Destinatari@
        $mail->addAddress($email, $nombre); 
        //Añadimos el correo al que vamos a mandar una copia pero este correo será visible
        //$mail->addCC('cc@example.com');
        //lo mismo que antes pero está vez el correo será oculto
        //$mail->addBCC('bcc@example.com');            

        //Contenido
        //Habilitamos HTML para que el contenido del correo puede tener codigo de html
        $mail->isHTML(true);
        //Establecemos este Formato UTF-8
        $mail->CharSet = 'UTF-8';                               
        // El objeto del correo
        $mail->Subject = $sbj;
        //Archibos que podemos adjuntar con este correo
        //$mail->addAttachment('');
        //El contendio del correo
        $mail->Body = $body;
        //Enviamos el correo
        if ( $mail->send() ) {
            echo "Email enviado..!";
        }else{
            echo "Message no se ha enviado! Mailer Error: ".$mail->ErrorInfo;
        }
        //Cerramos la conexion de smtp 
        $mail->smtpClose();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

 }


?>
