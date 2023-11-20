<?php
session_start();

/* Lo dejamos comentado para comprobar que aún yendo a inicio de sesión 
Verificar si el usuario ya está autenticado
if (isset($_SESSION['usuario'])) {
    header("Location: content.php");
    exit();
}*/

// Referencia al array de usuarios
$usuarios = &$_SESSION['usuarios'];

// Verificar el envío del formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Validar credenciales
    if (isset($usuarios[$usuario]) && password_verify($password, $usuarios[$usuario]['password'])) {
        // Iniciar sesión y redirigir a la página de contenido
        $_SESSION['usuario'] = $usuario;
        header("Location: content.php");
        exit();
    } else {
        $mensajeError = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
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

    <?php
    // Mostrar mensajes de error
    if (isset($mensajeError)) {
        echo "<p>{$mensajeError}</p>";
    }
    ?>

    <form method="post" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>

    <p><a href="register.php" class="resaltado">¿No tienes cuenta? Regístrate</a></p>
</body>

</html>
