<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $comment = strip_tags(trim($_POST['comment']));

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tuemail@gmail.com'; // Cambia esto por tu correo de Gmail
        $mail->Password   = 'tu_app_password'; // Usa una contraseña de aplicación, no tu contraseña normal
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Destinatarios
        $mail->setFrom('juanluisruizbalcarcel@gmail.com', 'Sitio Web Marck Business');
        $mail->addAddress('juanluisruizbalcarcel@gmail.com'); 

        // Contenido
        $mail->isHTML(false);
        $mail->Subject = 'Nuevo comentario desde el sitio web';
        $mail->Body    = "Se ha recibido un nuevo comentario:\n\n" . $comment;

        $mail->send();
        echo "<script>alert('Gracias por tu comentario, será enviado.');window.location='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error al enviar el comentario. Intenta de nuevo.');window.location='index.html';</script>";
    }
}
?>
