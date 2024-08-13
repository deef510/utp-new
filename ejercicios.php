<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lecciones de Fracciones</title>
  <link rel="stylesheet" href="estilolecciones.css">
</head>
<body>
  <header>
    <h1>Lecciones de Fracciones</h1>
    <nav>
    <div class="logo">
                <a href="index.php">
                    <img src="fotosbuap/logo_utp.png" alt="Logo BUAP">
                </a>
            </div>
        <ul>
             <li><a href="index.php">Inicio</a></li>
             <li><a href="ejercicios.php">Ejercicios</a></li>
             <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
      </nav>
    <nav>
      <ul>
        <li><a href="#" id="opcion-sincrona-1">Introducción a las fracciones</a></li>
        <li><a href="#" id="opcion-sincrona-2">Tipos de fracciones</a></li>
        <li><a href="#" id="opcion-sincrona-3">Fracciones equivalentes</a></li>
        <li><a href="#" id="opcion-sincrona-4">Comparación de fracciones</a></li>
      </ul>
    </nav>
    <nav>
      <ul>
        <li><a href="#" id="opcion-asincrona-1">Suma y resta de fracciones</a></li>
        <li><a href="#" id="opcion-asincrona-2">Multiplicación de fracciones</a></li>
        <li><a href="#" id="opcion-asincrona-3">División de fracciones</a></li>
        <li><a href="#" id="opcion-asincrona-4">Fracciones mixtas</a></li>
        <li><a href="#" id="opcion-asincrona-5">Aplicaciones de las fracciones</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="contenido">
      <!-- Aquí se mostrarán las lecciones y los ejercicios interactivos -->
    </section>
  </main>

  <footer>
    <p>© 2023 Lecciones de Fracciones. Todos los derechos reservados.</p>
  </footer>

  <script src="app.js"></script>
</body>
</html>