<?php
// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");
// Verificar si el formulario de inicio de sesión fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"]; // Cambiado de "username" a "input"
    $password = $_POST["password"];

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE username = '$input' OR email = '$input'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        if (password_verify($password, $usuario["password"])) {
            // Iniciar sesión y redirigir según el tipo de usuario
            session_start();
            $_SESSION["user_id"] = $usuario["id"];
            $_SESSION["user_type"] = $usuario["tipo_usuario"];

            if ($usuario["tipo_usuario"] == "admin") {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        }
    }

    // Si las credenciales son inválidas, mostrar un mensaje de error
    $error_message = "Nombre de usuario, correo electrónico o contraseña incorrectos.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="fotosbuap/logo_utp.png" alt="Logo BUAP">
                </a>
            </div>
            <ul>
                <li><a href="ejercicios.php">Lecciones</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Inicio de sesión</h2>
        <?php if (isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
        <form method="POST" action="login.php">
            <label>Nombre de usuario o correo electrónico:</label>
            <input type="text" name="input" required><br>

            <label>Contraseña:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Iniciar sesión">
        </form>
        <p class="register-link">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
        <p class="forgot-password-link">¿Olvidaste tu contraseña? <a href="forgot_password.php">Recuperar contraseña</a></p>
    </main>
</body>
</html>
