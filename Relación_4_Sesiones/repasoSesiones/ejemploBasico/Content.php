<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contenido Principal</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
    <p><a href="page1.php" class="resaltado">Ir a la Página 1</a></p>
    <p><a href="page2.php" class="resaltado">Ir a la Página 2</a></p>
    <p><a href="logout.php" class="resaltado">Cerrar Sesión</a></p>
</body>

</html>
