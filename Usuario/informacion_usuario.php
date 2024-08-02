<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Usuario</title>
    <link rel="stylesheet" href="styles_informacion.css">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-bar">
                <li><a href="/MAGUS/Usuario/perfil.html">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <section id="perfil" class="user-section">
            <h2>Perfil del Usuario</h2>
            <?php
            include 'config.php';
            $id_usuario = 1; // Aquí deberías usar el ID del usuario actualmente autenticado

            // Consulta para obtener la información del usuario
            $sql = "SELECT nombre, correo, telefono, nombre FROM usuarios WHERE id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_usario);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<p><strong>Nombre:</strong> " . htmlspecialchars($row['nombre']) . "</p>";
                echo "<p><strong>Correo Electrónico:</strong> " . htmlspecialchars($row['correo']) . "</p>";
                echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($row['telefono']) . "</p>";
                echo "<p><strong>Nombre de Usuario:</strong> " . htmlspecialchars($row['nombre']) . "</p>";
            } else {
                echo "<p>No se encontró información del usuario.</p>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </section>
    </div>
</body>
</html>




