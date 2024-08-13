<?php
session_start();

function isAdmin() {
    if (!isset($_SESSION['user_id'])) {
        return false;
    }

    $conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $userId = $_SESSION['user_id'];
    $query = "SELECT tipo_usuario FROM usuarios WHERE id = '$userId'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        mysqli_close($conexion);
        return $user['tipo_usuario'] === 'admin';
    }

    mysqli_close($conexion);
    return false;
}

if (!isAdmin()) {
    header("Location: acceso_denegado.php");
    exit();
}
?>