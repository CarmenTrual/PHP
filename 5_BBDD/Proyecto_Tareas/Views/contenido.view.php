<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Tareas</title>
  <link rel="stylesheet" href="../Style/estilo_contenido.css">
</head>

<body>
  <div class="lista-tareas">
    <h1>Mis tareas</h1>
    <!-- Lista de tareas -->
    <ul>
      <?php foreach ($tareas as $tarea) : ?>
        <li class="tarea-item">
          <span class="tarea-id"><?php echo $tarea['id']; ?></span>
          <details class="tarea-detalle">
            <summary class="tarea-titulo">
              <?php echo htmlspecialchars(substr($tarea['titulo'], 0, 20)); ?>
            </summary>
            <p class="tarea-descripcion">
              <?php echo htmlspecialchars($tarea['descripcion']); ?>
            </p>
          </details>
          <!-- Botones -->
          <div class="tarea-acciones">
            <form action="modificar.php" method="post">
              <input type="hidden" name="idTarea" value="<?php echo $tarea['id']; ?>">
              <input type="submit" value="Modificar" class="accion-btn">
            </form>
            <form action="borrar.php" method="post">
              <input type="hidden" name="idTarea" value="<?php echo $tarea['id']; ?>">
              <input type="submit" value="Borrar" class="accion-btn borrar-btn">
            </form>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Formulario para añadir tareas -->
    <form action="contenido.php" method="post">
      <input type="text" name="titulo" placeholder="Título de la tarea" required maxlength="20">
      <textarea name="descripcion" placeholder="Descripción de la tarea" required maxlength="200"></textarea>
      <input type="submit" name="accion" value="Añadir">
    </form>

    <p><a href="cerrarSesion.php">Cerrar sesión</a></p>
  </div>
  
</body>

</html>





