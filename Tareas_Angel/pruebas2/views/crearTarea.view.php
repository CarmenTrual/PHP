<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Tarea</title>
  <link rel="stylesheet" type="text/css" href="../css/crearTarea.style.css">
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h2>Crea una nueva tarea</h2>
    <br>
    <input type="text" name="titulo" placeholder="Titulo" maxlength="20" required>
    <br>
    <textarea name="descripcion" cols="30" rows="10" placeholder="Descripcion" maxlength="200" required></textarea>
    <br><br>
    <input type="submit" value="Crear">
    <a href="contenido.php">Cancelar</a>
  </form>
</body>
</html>