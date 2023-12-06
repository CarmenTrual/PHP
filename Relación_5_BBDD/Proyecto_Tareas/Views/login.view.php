<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="../Style/estilo.css">
</head>
<body>
  <div class="contenedor">
    <h1>Inicia sesión</h1>
    <!-- Mensajes de error -->
    <?php if (isset($mensajeError)) echo "<p class='mensaje-error'>$mensajeError</p>"; ?>

    <form action="Login.php" method="post">
      <div class="campo-formulario">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
      </div>
      <div class="campo-formulario">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="campo-formulario">
        <input type="submit" value="Iniciar Sesión">
      </div>
    </form>
    <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
  </div>
</body>
</html>