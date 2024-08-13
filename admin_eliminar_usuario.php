<?php
// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");

// Verificar si se recibió el ID del usuario a eliminar
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Consulta para eliminar el usuario
    $query = "DELETE FROM usuarios WHERE id = $id_usuario";
    mysqli_query($conexion, $query);

    // Redirigir de vuelta a la página de gestión de usuarios
    header("Location: admin_usuarios.php");
    exit();
}
?>