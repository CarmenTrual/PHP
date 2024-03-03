<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener el usuario actual desde el array de usuarios (simulado)
$usuarioActual = $_SESSION['usuarios'][$_SESSION['usuario']];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de cambio de contraseña
    $nuevaContraseña = $_POST['nuevaContraseña'];

    // Validar y actualizar la contraseña en el array de usuarios
    // En un entorno real, deberías utilizar consultas preparadas y realizar validación adicional.

    // Simulando actualización en el array de usuarios
    $usuarioActual['password'] = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
    $_SESSION['usuarios'][$_SESSION['usuario']] = $usuarioActual;

    // Redirigir al usuario después de cambiar la contraseña
    $_SESSION['mensaje'] = "Contraseña actualizada con éxito.";
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <h1>Cambiar Contraseña</h1>

    <?php
    if (isset($_SESSION['mensaje'])) {
        echo "<p>{$_SESSION['mensaje']}</p>";
        unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
    }
    ?>

    <form method="post" action="change_password.php">
        <label for="nuevaContraseña">Nueva Contraseña:</label>
        <input type="password" id="nuevaContraseña" name="nuevaContraseña" required><br>

        <input type="submit" value="Cambiar Contraseña">
    </form>

    <p><a href="profile.php" class="resaltado">Volver al Perfil</a></p>
    <p><a href="content.php" class="resaltado">Volver al Contenido</a></p>
    <p><a href="logout.php" class="resaltado">Cerrar Sesión</a></p>
</body>

</html>
