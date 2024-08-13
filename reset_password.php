<?php
// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");

// Verificar si se proporcionó un token de restablecimiento válido
if (isset($_GET["token"])) {
    $token = $_GET["token"];

    // Verificar si el token existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE reset_token = '$token'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificar si el formulario de restablecimiento de contraseña fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST["new_password"];

            // Hashear la nueva contraseña
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Actualizar la contraseña y eliminar el token de restablecimiento en la base de datos
            $query = "UPDATE usuarios SET password = '$hashed_password', reset_token = NULL WHERE id = " . $usuario["id"];
            mysqli_query($conexion, $query);

            // Mostrar un mensaje de éxito y un enlace para iniciar sesión
            $success_message = "Tu contraseña ha sido restablecida exitosamente. <a href='login.php'>Haz clic aquí para iniciar sesión</a>.";
        }
    } else {
        $error_message = "Token de restablecimiento inválido.";
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="recuperacion.css">
</head>
<body>
    <h2>Restablecer contraseña</h2>
    <?php if (isset($success_message)) { ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php } ?>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <?php if (!isset($success_message)) { ?>
        <form method="POST" action="reset_password.php?token=<?php echo $token; ?>">
            <label>Nueva contraseña:</label>
            <input type="password" name="new_password" required><br>

            <input type="submit" value="Restablecer">
        </form>
    <?php } ?>
</body>
</html>