<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../Style/estilo_registro.css">
</head>

<body>
  <div class="contenedor">
    <h1>Regístrate</h1>
    <!-- Mensajes de error -->
    <?php if (!empty($mensajeError)) echo "<p class='mensaje-error'>$mensajeError</p>"; ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
      <div class="campo-formulario">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" placeholder="Usuario" required>
      </div>

      <div class="campo-formulario">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña" required>
      </div>

      <div class="campo-formulario">
        <label for="password2">Contraseña:</label>
        <input type="password" name="password2" placeholder="Repite Contraseña" required>
      </div>

      <div class="campo-formulario">
        <br>
        <input type="submit" value="Registrar">
      </div>

    </form>

    <p>¿Tienes cuenta? <a href="../login/login.php">Inicia sesión</a></p>
  </div>
  
</body>

</html>