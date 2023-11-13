<!DOCTYPE html>
<html lang="en">
<body>
    <h1>¿Podrás abrir la caja fuerte?</h1>
    <p>la combinación de la caja fuerte es cualquier número entre 0 y 9999.</p>
    <p>Tienes <?=$_SESSION['intentos']?> intentos.</p>
    <p>Número secreto = <?=$_SESSION['numSecreto']?></p>
    <form action="index.php" method="post">
        <input type="number" name="prueba" id="prueba">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>