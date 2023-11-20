<?php
session_start();

// Inicializar el array de usuarios si no existe en la sesión
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

// Referencia al array de usuarios
$usuarios = &$_SESSION['usuarios'];

// Verificar el envío del formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Validar datos (agrega más validaciones según sea necesario)
    if (empty($nombre) || empty($usuario) || empty($password)) {
        $_SESSION['mensajeError'] = "Todos los campos son obligatorios.";
    } elseif (isset($usuarios[$usuario])) {
        $_SESSION['mensajeError'] = "El nombre de usuario ya está en uso. Por favor, elige otro.";
    } else {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Registrar al usuario en el array
        $usuarios[$usuario] = [
            'nombre' => $nombre,
            'password' => $hashedPassword,
        ];

        // Iniciar sesión y redirigir a la página de contenido
        $_SESSION['usuario'] = $usuario;
        header("Location: content.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <h1>Registro de Usuario</h1>

    <?php
    // Mostrar mensajes de error
    if (isset($_SESSION['mensajeError'])) {
        echo "<p>{$_SESSION['mensajeError']}</p>";
        unset($_SESSION['mensajeError']); // Limpiar el mensaje después de mostrarlo
    }
    ?>

    <form method="post" action="register.php">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Registrar">
    </form>

    <p><a href="login.php" class="resaltado">¿Ya tienes cuenta? Iniciar sesión</a></p>
</body>

</html>
