<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="../Style/estilo.css">
</head>
<body>
  
  <h1>Inicia Sesión</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">

  <input type="text" name="usuario" placeholder="Usuario" required>
  <input type="password" name="password" placeholder="Contraseña" required>
  <input type="submit" value="Aceptar">
  </form>
  <p>¿No tienes cuenta?</p>
  <a href="registro.php">Regístrate</a>
  
</body>
</html>