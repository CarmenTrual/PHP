<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear tarea</title>
  <link rel="stylesheet" href="../Style/miEstilo.css">
</head>

<body>

  <h1>Tareas</h1>
  <form method="POST" style="text-align: center;">
    <label for="titulo"><br><br>Título:</label>
    <input type="text" name="titulo" id="titulo" placeholder="Título de la tarea" maxlength="20" required><br>
    <label for="descripcion">Descripción:</label><br>
    <textarea name="descripcion" id="descripcion" placeholder="Descripción de la tarea" maxlength="200" required></textarea><br>
    <button type="submit">Añadir tarea</button><br>
  </form>
  <br>
  <a href="contenido.php"> Volver a mis tareas</a>
  <br>

</body>

</html>