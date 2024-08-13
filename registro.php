

<?php
// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");

// Verificar si el formulario de registro fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $tipo_usuario = $_POST["tipo_usuario"];
    $email = $_POST["email"];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $tipo_usuario = "usuario"; // Asignar el tipo de usuario como "usuario" por defecto
    $query = "INSERT INTO usuarios (username, password, tipo_usuario, email) VALUES ('$username', '$hashed_password', '$tipo_usuario', '$email')";
    mysqli_query($conexion, $query);

    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="estiloregistro.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="fotosbuap/logo_utp.png" alt="Logo UTP">
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
        <h2>Registro de usuario</h2>
        <form method="POST" action="registro.php">
            <label>Nombre de usuario:</label>
            <input type="text" name="username" required><br>

            <label>Contraseña:</label>
            <input type="password" name="password" required><br>

            <label>Email:</label>
            <input type="email" name="email" required><br>

            <input type="submit" value="Registrarse">
        </form>
    </main>
</body>
</html>