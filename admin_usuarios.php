<?php
require_once("verificar_permisos.php");
verificar_permisos("admin");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Gestión de usuarios</h1>
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
            <h2>Lista de usuarios</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre de usuario</th>
                    <th>Correo electrónico</th>
                    <th>Tipo de usuario</th>
                    <th>Acciones</th>
                </tr>
                <?php
                // Conexión a la base de datos
                $conexion = mysqli_connect("localhost", "root", "", "buapsistema");

                // Consulta para obtener la lista de usuarios
                $query = "SELECT * FROM usuarios";
                $resultado = mysqli_query($conexion, $query);

                // Mostrar la lista de usuarios en la tabla
                while ($usuario = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $usuario['id'] . "</td>";
                    echo "<td>" . $usuario['username'] . "</td>";
                    echo "<td>" . $usuario['email'] . "</td>";
                    echo "<td>" . $usuario['tipo_usuario'] . "</td>";
                    echo "<td>
                            <a href='admin_editar_usuario.php?id=" . $usuario['id'] . "'>Editar</a>
                            <a href='admin_eliminar_usuario.php?id=" . $usuario['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </main>

    <footer>
        <p>© 2023 BUAP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>