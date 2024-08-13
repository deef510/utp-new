<?php
session_start();

// Verificar si el usuario ha iniciado sesión
$userLoggedIn = isset($_SESSION['user_id']);
$isAdmin = false;
$username = '';
$userImage = 'fotosbuap/logo_utp.png'; // Imagen por defecto

// Si el usuario ha iniciado sesión, obtener su información
if ($userLoggedIn) {
    $conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $userId = $_SESSION['user_id'];
    $query = "SELECT username, img, tipo_usuario FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $username = htmlspecialchars($user['username']);
        if ($user['img']) {
            $userImage = "data:image/jpeg;base64," . base64_encode($user['img']);
        }
        $isAdmin = ($user['tipo_usuario'] === 'admin');
    }

    mysqli_close($conexion);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Tecnologica del Estado de Puebla</title>
    <link rel="stylesheet" href="prueba.css">
    <link rel="stylesheet" href="prueba2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <?php if ($userLoggedIn) { ?>
                    <li><a href="ejercicios.php">Lecciones</a></li>
                    <?php if ($isAdmin) { ?>
                        <li><a href="admin.php">Administrador</a></li>
                    <?php } ?>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Lecciones</a></li>
                    <li><a href="registro.php">Registro</a></li>
                    <li><a href="login.php">Iniciar sesión</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <div class="container">
        <?php if ($userLoggedIn): ?>
        <div class="sidebar">
            <div class="head">
                <div class="delitutti-img">
                    <img src="<?php echo $userImage; ?>" alt="Perfil de usuario" />
                </div>
                <div class="user-details">
                    <p class="title">Universidad Tecnologica de Puebla</p>
                    <p class="name">¡Bienvenido <?php echo $username; ?>!</p>
                </div>
                <div class="menu-btn">
                    <i class="fas fa-x"></i>
                </div>
            </div>
            <div class="nav">
                <div class="menu">
                    <p class="title">Menu</p>
                    <ul>
                        <li class="active">
                            <a href="historia.php">
                                <i class="icon">
                                    <img src="iconos/historia.svg" alt="">
                                </i>
                                <span class="text">Historia</span>
                            </a>
                        </li>
                        <li>
                            <a href="ejercicios.php">
                                <i class="icon">
                                    <img src="iconos/mate.svg" alt="">
                                </i>
                                <span class="text">Matematicas</span>
                            </a>
                        </li>
                        <li>
                            <a href="literatura.php">
                                <i class="icon">
                                    <img src="iconos/libro.svg" alt="">
                                </i>
                                <span class="text">Literatura</span>
                            </a>
                        </li>
                        <li>
                            <a href="quimica.php">
                                <i class="icon">
                                    <img src="iconos/quimica.svg" alt="">
                                </i>
                                <span class="text">Quimica</span>
                            </a>
                        </li>
                        <li>
                            <a href="fisica.php">
                                <i class="icon">
                                    <img src="iconos/fisica.svg" alt="">
                                </i>
                                <span class="text">Fisica</span>
                            </a>
                        </li>
                        <li>
                            <a href="ingles.php">
                                <i class="icon">
                                    <img src="iconos/ingles.svg" alt="">
                                </i>
                                <span class="text">Ingles</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <main>
            <section id="slider">
                <div class="slide">
                    <img src="fotosbuap/buapinicio1.jpeg" alt="Slide 1">
                </div>
                <div class="slide">
                    <img src="fotosbuap/buapinicio2.jpeg" alt="Slide 2">
                </div>
                <div class="slide">
                    <img src="fotosbuap/buapinicio3.jpeg" alt="Slide 3">
                </div>
            </section>

            <section id="descripcion">
                <h2>Bienvenido a los cursos de la UTP</h2>
                <p>Aquí encontrarás lecciones interactivas para aprender y practicar conceptos</p>
            </section>

            <section id="materias">
                <div class="card">
                    <img src="fotosbuap/matematicas.jpeg" alt="Matemáticas">
                    <h3>Matemáticas</h3>
                    <a href="ejercicios.php" class="btn">Ver curso</a>
                </div>
                <div class="card">
                    <img src="fotosbuap/literatura.jpeg" alt="Literatura">
                    <h3>Literatura</h3>
                    <a href="literatura.php" class="btn">Ver curso</a>
                </div>
                <div class="card">
                    <img src="fotosbuap/quimica.jpeg" alt="Química">
                    <h3>Química</h3>
                    <a href="quimica.php" class="btn">Ver curso</a>
                </div>
                <div class="card">
                    <img src="fotosbuap/fisica.jpeg" alt="Física">
                    <h3>Física</h3>
                    <a href="fisica.php" class="btn">Ver curso</a>
                </div>
                <div class="card">
                    <img src="fotosbuap/ingles.jpeg" alt="Inglés">
                    <h3>Inglés</h3>
                    <a href="ingles.php" class="btn">Ver curso</a>
                </div>
                <div class="card">
                    <img src="fotosbuap/historia.jpeg" alt="Historia">
                    <h3>Historia</h3>
                    <a href="historia.php" class="btn">Ver curso</a>
                </div>
            </section>
        </main>
    </div>

    <div class="footer-container">
        <footer>
            <p>&copy; 2024 UTP. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.querySelectorAll('.slide');
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = 'block';
            setTimeout(showSlides, 3000); // Cambia la imagen cada 3 segundos
        }
    </script>
</body>
</html>