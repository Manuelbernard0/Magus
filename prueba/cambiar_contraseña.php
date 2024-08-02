<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contraseña = $_POST['contraseña'];
    $nueva_contraseña = $_POST['nueva-contraseña'];
    $confirmar_contraseña = $_POST['confirmar-contraseña'];

    // Validar que las nuevas contraseñas coincidan
    if ($nueva_contraseña !== $confirmar_contraseña) {
        die("Las nuevas contraseñas no coinciden.");
    }

    // Incluir archivo de configuración para conectar a la base de datos
    include 'configuracion.php';

    // Obtener el id del usuario autenticado desde la sesión (por ejemplo)
    $id_usuario = $_SESSION['id_usuario'];

    // Obtener la contraseña actual del usuario desde la base de datos
    $sql = "SELECT contraseña FROM usuarios WHERE id_usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar que la contraseña actual es correcta
        if (password_verify($contraseña, $row['contraseña'])) {
            // Hash de la nueva contraseña
            $nueva_contraseña_hashed = password_hash($nueva_contraseña, PASSWORD_DEFAULT);

            // Preparar y ejecutar la consulta SQL para actualizar la contraseña
            $sql = "UPDATE usuarios SET contraseña=? WHERE id_usuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $nueva_contraseña_hashed, $id_usuario);

            if ($stmt->execute()) {
                echo "Contraseña actualizada correctamente";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "La contraseña actual no es correcta.";
        }
    } else {
        echo "No se encontró el usuario.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>


