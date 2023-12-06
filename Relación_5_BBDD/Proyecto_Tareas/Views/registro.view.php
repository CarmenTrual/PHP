<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../Style/estilo.css">
</head>

<body>
  <div class="contenedor">
    <h1>Regístrate</h1>
    <!-- Mensajes de error -->
    <?php if(!empty($mensajeError)) echo "<p class='mensaje-error'>$mensajeError</p>"; ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <input type="password" name="password2" placeholder="Repite Contraseña" required>
      <input type="submit" value="Aceptar">
    </form>
    <p>¿Tienes cuenta? <a href="login.php">Inicia sesión</a></p>
  </div>
</body>

</html>