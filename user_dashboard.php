<?php
require_once("verificar_permisos.php");
verificar_permisos("usuario");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de usuario</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <header>
        <h1>Panel de usuario</h1>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="ejercicios.html">Lecciones</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Bienvenido, usuario</h2>
            <p>Aquí puedes acceder a las lecciones y ejercicios de fracciones.</p>
        </section>
    </main>

    <footer>
        <p>© 2023 BUAP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

