<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['usuario'])) {
    header("Location: content.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí deberías validar las credenciales del usuario.
    // En este ejemplo, simplemente redirigimos al usuario a la página de contenido.

    // Simulamos una autenticación exitosa
    $usuario = $_POST['usuario'];
    $_SESSION['usuario'] = $usuario;

    // Redirigir a la página de contenido
    header("Location: content.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="login.php">
        Usuario: <input type="text" name="usuario" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <p><a href="register.php" class="resaltado">Registro</a></p>
</body>

</html>

