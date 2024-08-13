<?php
require_once("verificar_permisos.php");
verificar_permisos("admin");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control de administrador</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Panel de control de administrador</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="admin_usuarios.php">Gestión de usuarios</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Bienvenido, administrador</h2>
            <p>Aquí puedes gestionar los usuarios y realizar tareas administrativas.</p>
        </section>
    </main>

    <footer>
        <p>© 2024 UTP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>