<?php
// Incluir la biblioteca PHPMailer
require 'vendor/autoload.php';

// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");

// Verificar si el formulario de recuperación de contraseña fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Verificar si el correo electrónico existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Generar un token único de restablecimiento de contraseña
        $reset_token = bin2hex(random_bytes(32));

        // Actualizar el token de restablecimiento en la base de datos
        $query = "UPDATE usuarios SET reset_token = '$reset_token' WHERE id = " . $usuario["id"];
        mysqli_query($conexion, $query);

        // Configurar PHPMailer para usar SendGrid SMTP
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar el contenido del correo electrónico
        $mail->setFrom('utp0146465@alumno.utpuebla.edu.mx', 'Universidad Tecnologica de Puebla');
        $mail->addAddress($email);
        $mail->Subject = '=?UTF-8?B?'.base64_encode('Restablecimiento de contraseña').'?=';
        $mail->isHTML(true);
        $mail->Body = "
        <html>
        <head>
            <style>
                .email-container {
                    font-family: Arial, sans-serif;
                    color: #333;
                    line-height: 1.5;
                }
                .email-header {
                    background-color: #f7f7f7;
                    padding: 20px;
                    text-align: center;
                }
                .email-header img {
                    max-width: 150px;
                }
                .email-content {
                    padding: 20px;
                }
                .email-footer {
                    background-color: #f7f7f7;
                    padding: 20px;
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                }
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    margin: 20px 0;
                    background-color: #28a745;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                }
                .button:hover {
                    background-color: #218838;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <img src='https://virtual.utpuebla.edu.mx/pluginfile.php/1/theme_academi/logo/1672678911/logoUTP.png' alt='Logo UTP'>
                </div>
                <div class='email-content'>
                    <h2>Restablecimiento de contraseña</h2>
                    <p>Hola " . $usuario['username'] . ",</p>
                    <p>Hemos recibido una solicitud para restablecer tu contraseña. Por favor, haz clic en el siguiente enlace para proceder:</p>
                    <p><a href='http://localhost/nuevapaginabuap002/reset_password.php?token=$reset_token' class='button'>Restablecer contraseña</a></p>
                    <p>Si no solicitaste un restablecimiento de contraseña, por favor, ignora este correo.</p>
                </div>
                <div class='email-footer'>
                    <p>&copy; 2024 UTP. Todos los derechos reservados.</p>
                </div>
            </div>
        </body>
        </html>";

        // Enviar el correo electrónico
        if ($mail->send()) {
            $success_message = "Se ha enviado un enlace de restablecimiento de contraseña a su correo electrónico.";
        } else {
            $error_message = "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
        }
    } else {
        $error_message = "No se encontró una cuenta con ese correo electrónico.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperación de contraseña</title>
    <link rel="stylesheet" href="recuperacion.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="fotosbuap/logo_UTP.png" alt="Logo UTP">
                </a>
            </div>
            <ul>
                <li><a href="ejercicios.php">Lecciones</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>
    <h2>Recuperación de contraseña</h2>
    <?php if (isset($success_message)) { ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php } ?>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="POST" action="forgot_password.php">
        <label>Correo electrónico:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
