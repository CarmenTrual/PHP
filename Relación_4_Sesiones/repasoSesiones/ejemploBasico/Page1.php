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
    <title>Página 1</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <div class="image-container">
        <h1>Welcome, <?php echo $_SESSION['usuario']; ?>!</h1>
        <h5>Te dejo unas imágenes generadas por IA para tu disfrute. Estas personas no existen realmente:</h5>
        <div class="image-row">
            <div class="image-column">
                <img class="image" src="Img/Cara1.png" alt="Imagen 1">
            </div>
            <div class="image-column">
                <img class="image" src="Img/Cara2.png" alt="Imagen 2">
            </div>
            <div class="image-column">
                <img class="image" src="Img/Cara3.png" alt="Imagen 3">
            </div>
        </div>
        <div class="image-row">
            <div class="image-column">
                <img class="image" src="Img/Cara4.png" alt="Imagen 4">
            </div>
            <div class="image-column">
                <img class="image" src="Img/Cara5.png" alt="Imagen 5">
            </div>
            <div class="image-column">
                <img class="image" src="Img/Cara6.png" alt="Imagen 6">
            </div>
        </div>
    </div>
    <p><a href="content.php" class="resaltado">Volver al Contenido Principal</a></p>
    <p><a href="page2.php" class="resaltado">Ir a la Página 2</a></p>
    <p><a href="logout.php" class="resaltado">Cerrar Sesión</a></p>
</body>

</html>