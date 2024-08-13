<?php
function verificar_permisos($tipo_usuario_requerido) {
    session_start();

    if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== $tipo_usuario_requerido) {
        header("Location: login.php");
        exit();
    }
}


