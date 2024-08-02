<?php
include 'config.php';

$usuario_id = 1; // Aquí debes establecer el ID del usuario que quieres mostrar, o mejor, usar una sesión para el ID de usuario autenticado.

// Consulta para obtener la información del usuario
$sql = "SELECT nombre, correo, telefono, nombre FROM usuarios WHERE id_usuario = $usuario_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
    $nombre_usuario = $row['nombre'];
} else {
    echo "No se encontró el usuario.";
}

$conn->close();
?>
