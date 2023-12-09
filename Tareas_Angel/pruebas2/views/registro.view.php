<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>

  <link rel="stylesheet" type="text/css" href="../css/registro.style.css">

</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <h2>Regístrate</h2>

    <br>

    <input type="text" name="usuario" placeholder="Usuario" maxlength="20" required>
    <input type="password" name="password" placeholder="Contraseña" maxlength="16" required>
    <input type="password" name="password2" placeholder="Repite la contraseña" maxlength="16" required>
    <br><br>
    <input type="submit" value="Aceptar">

    <p>¿Tienes cuenta? <a href="login.php">Inicia sesión</a></p>

  </form>



</body>

</html>
