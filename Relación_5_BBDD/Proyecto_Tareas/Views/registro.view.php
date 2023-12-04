<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">

<input type="text" name="usuario" placeholder="Usuario" required>
<input type="password" name="password" placeholder="Contraseña" required>

<input type="password" name="password2" placeholder="Repite Contraseña" required>
<input type="submit" value="Aceptar">
</form>
<p>¿Tienes cuenta?</p>
<a href="login.php">Inicia sesión</a>
  
</body>
</html>