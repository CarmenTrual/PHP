<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí deberías validar y procesar los datos del formulario.
    // En este ejemplo, solo almacenaremos el nombre de usuario en la sesión.

    $usuario = $_POST['usuario'];
    
    // Almacenar el nombre de usuario en la sesión
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
    <title>Registro</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <h1>Registro</h1>
    <form method="post" action="register.php">
        Usuario: <input type="text" name="usuario" required>
        <br>
        <br>
        Password: <input type="password" name="password" required>
        <br>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <br>
    <p><a href="login.php" class="resaltado">Iniciar Sesión</a></p>
</body>

</html>
