<?php
// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");

// Verificar si se recibió el ID del usuario a editar
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Consulta para obtener los datos del usuario
    $query = "SELECT * FROM usuarios WHERE id = $id_usuario";
    $resultado = mysqli_query($conexion, $query);
    $usuario = mysqli_fetch_assoc($resultado);
}

// Verificar si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Consulta para actualizar los datos del usuario
    $query = "UPDATE usuarios SET username = '$username', email = '$email', tipo_usuario = '$tipo_usuario' WHERE id = $id_usuario";
    mysqli_query($conexion, $query);

    // Redirigir de vuelta a la página de gestión de usuarios
    header("Location: admin_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Editar usuario</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Inicio</a></li>
                <li><a href="admin_usuarios.php">Gestión de usuarios</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Editar usuario</h2>
            <form method="POST" action="admin_editar_usuario.php">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <label>Nombre de usuario:</label>
                <input type="text" name="username" value="<?php echo $usuario['username']; ?>" required><br>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
                <label>Tipo de usuario:</label>
                <select name="tipo_usuario">
                    <option value="usuario" <?php if ($usuario['tipo_usuario'] == 'usuario') echo 'selected'; ?>>Usuario</option>
                    <option value="admin" <?php if ($usuario['tipo_usuario'] == 'admin') echo 'selected'; ?>>Administrador</option>
                </select><br>
                <input type="submit" value="Guardar cambios">
            </form>
        </section>
    </main>

    <footer>
        <p>© 2023 BUAP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>