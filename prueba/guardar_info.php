<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Incluir archivo de configuración para conectar a la base de datos
    include 'configuracion.php';

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, correo, telefono) VALUES ('$nombre', '$correo', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "Información personal guardada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

