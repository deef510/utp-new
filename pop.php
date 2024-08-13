<?php
session_start();

// Verificar si el usuario ha iniciado sesión
$userLoggedIn = isset($_SESSION['user_id']);

// Si el usuario ha iniciado sesión, obtener su información
if ($userLoggedIn) {
    // Conectar a la base de datos (asegúrate de usar tus propias credenciales)
    $conexion = mysqli_connect("localhost", "root", "", "buapsistema");

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $userId = $_SESSION['user_id'];
    $query = "SELECT username, img FROM usuarios WHERE id = '$userId'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $username = htmlspecialchars($user['username']);
        $userImage = $user['img'] ? "data:image/jpeg;base64," . base64_encode($user['img']) : "imagen/default-profile.png";
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ICONOS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" href="style_dos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <title>Universidad Tecnologica de Puebla</title>
</head>
<body>
    <!-- Barra Lateral -->
    <div class="container">
        <div class="sidebar">
            <div class="head">
                <div class="delitutti-img">
                    <!-- Imagen de perfil-->
                    <?php if ($userLoggedIn): ?>
                        <img src="<?php echo $userImage; ?>" alt="Perfil de usuario" />
                    <?php else: ?>
                        <img src="imagen/Logo_envolvente(1).png" alt="" />
                    <?php endif; ?>
                </div>
                <div class="user-details">
                    <p class="title">Universidad Tecnologica de Puebla</p>
                    <?php if ($userLoggedIn): ?>
                        <p class="name">¡Bienvenido <?php echo $username; ?>!</p>
                    <?php endif; ?>
                </div>
                <!-- Botón para mostrar/ocultar el menú lateral -->
                <div class="menu-btn">
                    <i class="fas fa-x"></i>
                </div>
            </div>
            <div class="nav">
                <div class="menu">
                    <p class="title">Menu</p>
                    <ul>
                        <li class="active">
                            <a href="#">
                                <i class="icon">
                                    <img src="iconos/historia.svg" alt="">
                                </i>
                                <span class="text">Historia</span>
                            </a>
                        </li>
                        <!-- Resto de los elementos del menú... -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie de página -->
    <footer>
        <div class="footer-content">
        </div>
    </footer>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>