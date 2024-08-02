<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
    <link rel="stylesheet" href="prueba.css">
</head>
<body>
    <div class="container">
        <h1>Configuración de Usuario</h1>
        
        <div class="user-info">
            <h2>Información Personal</h2>
            <form action="guardar_info.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
                
                <label for="correo">Correo Electrónico:</label>
                <input type="correo" id="correo" name="correo">
                
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono">
                
                <button type="submit">Guardar Cambios</button>
            </form>
        </div>

        <div class="user-settings">
            <h2>Configuración de Cuenta</h2>
            <form action="cambiar_contraseña.php" method="POST">
                <label for="contraseña">Contraseña Actual:</label>
                <input type="password" id="contraseña" name="contraseña">
                
                <label for="nueva-contraseña">Nueva Contraseña:</label>
                <input type="password" id="nueva-contraseña" name="nueva-contraseña">
                
                <label for="confirmar-contraseña">Confirmar Nueva Contraseña:</label>
                <input type="password" id="confirmar-contraseña" name="confirmar-contraseña">
                <button type="submit">Actualizar Contraseña</button>
            </form>
        </div>
    </div>
</body>
</html>

