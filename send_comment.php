<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "juanluisruizbalcarcel@gmail.com";
    $subject = "Nuevo comentario desde el sitio web";
    $comment = strip_tags(trim($_POST['comment']));
    $message = "Se ha recibido un nuevo comentario:\n\n" . $comment;
    $headers = "From: no-reply@marckbusiness.com\r\n";
    $headers .= "Reply-To: no-reply@marckbusiness.com\r\n";

    if(mail($to, $subject, $message, $headers)){
        echo "<script>alert('Gracias por tu comentario, será enviado.');window.location='index.html';</script>";
    } else {
        echo "<script>alert('Error al enviar el comentario, intenta de nuevo.');window.location='index.html';</script>";
    }
}
?>
