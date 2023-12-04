<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear tarea</title>
</head>
<body>
  
  <h1>Tareas</h1>
  <form method="POST" style="text-align: center;">
        <label for="titulo"><br><br>Título:</label>
        <input type="text" name="titulo" id="titulo" placeholder="20 caracteres"><br><br>
        <label for="descripcion">Descripción:</label><br><br>
        <textarea name="descripcion" id="descripcion" placeholder="100 caracteres"></textarea><br><br>
        <button type="submit">Crear tarea</button><br><br>
    </form>
    <br>
    <a href="contenido.php"> Volver a mis tareas</a>;
  
</body>
</html>