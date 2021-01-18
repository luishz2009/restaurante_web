<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: ".$nombre."<br>Correo: ".$correo."<br>Teléfono: ".$telefono."<br>;Mensaje: ".$mensaje;

/* Aqui llamo a las funciones que voy a usar */
use PHPMailer\PHPMailer\PHPMailer;      
use PHPMailer\PHPMailer\Exception;


/* Aqui llamo a los archivos */
require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
    $mail->SMTPDebug = 0;                                        //Para que no envíe archivos de depuración
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Aqui va el servidor SMTP de correo con el que vas a trabajar
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'luishz2009@gmail.com';                 // SMTP username
    $mail->Password   = 'serway2009';                           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('luishz2009@gmail.com', $nombre);           // De: (origen)
    $mail->addAddress('luishz2009@gmail.com', 'Mi mismo');           // Para: (destino)
    $mail->addAddress('luznora2010@gmail.com');                      // Para otros
    $mail->addAddress('serway2009@gmail.com'); 
     //$mail->addReplyTo('serway2009@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');                                  //Con copia a...
    // $mail->addBCC('bcc@example.com');

    // Archivos adjuntos
    // $mail->addAttachment('/var/tmp/file.tar.gz');                    // Adicionar archivos
    //$mail->addAttachment('htdocs/banner/img', 'invitado4.jpg');          // Optional name

    // Content
    $mail->isHTML(true);                                  // Para que permita usar html
    $mail->Subject = 'Hola! Envío correo desde localhost';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';                            // Para que tome las tildes y otros signos ortográficos
    $mail->AltBody = 'Este es un mensaje alternativo del correo de prueba';

    $mail->send();
    echo '<script>
    alert("El mensaje se envió correctamente");
    window.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}


?>