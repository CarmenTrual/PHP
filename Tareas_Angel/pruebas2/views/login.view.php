<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" type="text/css" href="../css/login.style.css">
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
    <h2>Inicia sesión</h2>
    <br>
    <input type="text" name="usuario" placeholder="Usuario" maxlength="20" required>
    <input type="password" name="password" placeholder="Password" maxlength="16" required>
    <br><br>
    <input type="submit" value="Aceptar">
    <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
  </form>
</body>
</html>