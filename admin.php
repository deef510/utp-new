<?php

require_once 'check_admin.php';
// Conexión a la base de datos
$conexion = mysqli_connect("buapsistema2.c9e8qugqqvig.us-east-2.rds.amazonaws.com", "deef1", "tanatos510.", "buapsistema");


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario de edición fue enviado
if (isset($_POST['submit_editar'])) {
    $id = mysqli_real_escape_string($conexion, $_POST['id']);
    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $tipo_usuario = mysqli_real_escape_string($conexion, $_POST['tipo_usuario']);
    
    // Iniciar la construcción de la consulta SQL
    $sql = "UPDATE usuarios SET username='$username', email='$email', tipo_usuario='$tipo_usuario'";
    
    // Manejar la actualización de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $contenidoImagen = file_get_contents($rutaTemporal);
        $contenidoImagenEscapado = mysqli_real_escape_string($conexion, $contenidoImagen);
        $sql .= ", img='$contenidoImagenEscapado'";
    }
    
    // Finalizar la consulta SQL
    $sql .= " WHERE id='$id'";
    
    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

// Eliminar un usuario
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conexion, $_GET['delete_id']);
    $sql = "DELETE FROM usuarios WHERE id = '$delete_id'";
    
    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Usuario eliminado correctamente.'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

// Obtener datos del usuario para edición
if (isset($_GET['id'])) {
    $userId = mysqli_real_escape_string($conexion, $_GET['id']);
    $resultado = mysqli_query($conexion, "SELECT id, username, email, tipo_usuario FROM usuarios WHERE id = '$userId'");
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        header('Content-Type: application/json');
        echo json_encode($usuario);
    } else {
        echo json_encode(["error" => "No se encontró el usuario"]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<nav>
            <div class="logo">
                <a href="index.php">
                    <img src="fotosbuap/logo_utp.png" alt="Logo BUAP">
                </a>
            </div>
            <ul>
                <li><a href="ejercicios.php">Lecciones</a></li>
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </nav>
    <header>
        <h1>Panel de Administración</h1>
    </header>
    
    <main>
        <h2>Lista de Usuarios</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Tipo Usuario</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            <?php
            $resultado = mysqli_query($conexion, "SELECT id, username, email, tipo_usuario, img FROM usuarios");
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['username']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['tipo_usuario']) . "</td>";
                if ($fila['img']) {
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($fila['img']) . "' width='100'></td>";
                } else {
                    echo "<td>No disponible</td>";
                }
                echo "<td><button class='edit-btn' onclick='editarUsuario(" . $fila['id'] . ")'>Editar</button> ";
                echo "<button class='delete-btn' onclick='eliminarUsuario(" . $fila['id'] . ")'>Eliminar</button></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Panel de Administración</p>
    </footer>

    <!-- Modal para editar usuario -->
    <div id="editarModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Usuario</h2>
            <form id="editarForm" action="admin.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="idEditar" name="id">
                
                <label for="usernameEditar">Username:</label>
                <input type="text" id="usernameEditar" name="username" required>

                <label for="emailEditar">Email:</label>
                <input type="email" id="emailEditar" name="email" required>

                <label for="tipo_usuarioEditar">Tipo de Usuario:</label>
                <select id="tipo_usuarioEditar" name="tipo_usuario" required>
                    <option value="admin">Admin</option>
                    <option value="usuario">Usuario</option>
                </select>

                <label for="imagenEditar">Imagen (opcional):</label>
                <input type="file" id="imagenEditar" name="imagen" accept="image/*">

                <button type="submit" name="submit_editar" class="save-btn">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <script>
        function editarUsuario(id) {
            var modal = document.getElementById('editarModal');
            var xhr = new XMLHttpRequest();
            
            xhr.open('GET', 'admin.php?id=' + id, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var usuario = JSON.parse(xhr.responseText);
                        document.getElementById('idEditar').value = usuario.id;
                        document.getElementById('usernameEditar').value = usuario.username;
                        document.getElementById('emailEditar').value = usuario.email;
                        document.getElementById('tipo_usuarioEditar').value = usuario.tipo_usuario;
                        document.getElementById('imagenEditar').value = ''; // Limpiar el campo de archivo
                        modal.style.display = "block";
                    } catch (e) {
                        console.error("Error al parsear JSON:", e);
                    }
                } else {
                    console.error("Error al cargar datos:", xhr.statusText);
                }
            };
            xhr.send();
        }

        function eliminarUsuario(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
                window.location.href = 'admin.php?delete_id=' + id;
            }
        }

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            document.getElementById('editarModal').style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById('editarModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php
// Cerrar la conexión al final del archivo
mysqli_close($conexion);
?>