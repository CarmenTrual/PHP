<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar tarea</title>
  <link rel="stylesheet" href="../Style/estilo_contenido.css">
</head>

<body>

  <!-- Formulario para modificar la tarea -->
  <form action="../PHP/modificar.php" method="POST">
    <h2>Modificar tarea</h2>
    <input type="text" name="titulo"  maxlength="20" required>
    <textarea id="descripcion" name="descripcion" maxlength="200" required></textarea>
    <input type="hidden" name="idTarea" value="<?= $idTarea; ?>">
    <input type="submit" value="Guardar cambios">
    <a href="contenido.php">Volver a Mis Tareas</a>
  </form>

  <script>
      document.getElementById("descripcion").value =
        "<?php echo $tarea['descripcion']; ?>";
    </script>

</body>

</html>
