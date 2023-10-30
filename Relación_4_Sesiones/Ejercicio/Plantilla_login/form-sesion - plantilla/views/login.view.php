<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

</head>
<body>
    <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">

    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Aceptar">
    </form>

    <p>¿No tienes cuenta?</p>
    <a href="registro.php">Registrate</a>
</body>
</html>