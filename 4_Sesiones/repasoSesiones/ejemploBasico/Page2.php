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
    <title>Página 2</title>
    <link href="Style/style.css" rel="stylesheet">
</head>

<body>
    <div class="image-container">
        <h1>Welcome, <?php echo $_SESSION['usuario']; ?>!</h1>
        <h5>Y esta es la interpretación de la IA de un bosque con diferentes estilos artisticos:</h5>
        <div class="image-row">
            <div class="image-column">
                <img class="image" src="Img/bosque1.png" alt="Imagen 7">
            </div>
            <div class="image-column">
                <img class="image" src="Img/bosque2.png" alt="Imagen 8">
            </div>
            <div class="image-column">
                <img class="image" src="Img/bosque3.png" alt="Imagen 9">
            </div>
        </div>
        <div class="image-row">
            <div class="image-column">
                <img class="image" src="Img/bosque4.png" alt="Imagen 10">
            </div>
            <div class="image-column">
                <img class="image" src="Img/bosque5.png" alt="Imagen 11">
            </div>
            <div class="image-column">
                <img class="image" src="Img/bosque6.png" alt="Imagen 12">
            </div>
        </div>
        <p><a href="content.php" class="resaltado">Volver al Contenido Principal</a></p>
        <p><a href="page1.php" class="resaltado">Ir a la Página 1</a></p>
        <p><a href="logout.php" class="resaltado">Cerrar Sesión</a></p>
</body>

</html>