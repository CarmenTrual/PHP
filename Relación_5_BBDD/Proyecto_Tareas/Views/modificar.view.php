<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar tarea</title>
  <link rel="stylesheet" href="../Style/miEstilo.css">
</head>

<body>
  <?php
  // Archivo de la base de datos
  require './ConexionBBDD/conexion.php';

  // Comprobar si se ha recibido el ID de la tarea y si el usuario está logueado
  if (isset($_POST['idTarea']) && isset($_SESSION['usuario_id'])) {
    $idTarea = $_POST['idTarea'];
    $usuario_id = $_SESSION['usuario_id'];

    // Consulta para seleccionar la tarea
    $consulta = $conexion->prepare("SELECT * FROM tarea WHERE id = ? AND usuario_id = ?");
    $consulta->bind_param('ii', $idTarea, $usuario_id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Comprobar si se encontró la tarea
    if ($resultado->num_rows > 0) {
      $tarea = $resultado->fetch_assoc();
    } else {
      // Si no se encuentra la tarea
      header("Location: contenido.php?error=no_se_encontro_la_tarea");
      exit;
    }
  } else {
    echo "Error: No se ha proporcionado el ID de la tarea o no estás logueado.";
    exit;
  }
  ?>

  <!-- Formulario para modificar la tarea -->
  <form action="modificar.php" method="POST">
    <h2>Modificar tarea</h2>
    <input type="text" name="titulo" value="<?= htmlspecialchars($tarea['titulo']); ?>" maxlength="20" required>
    <textarea name="descripcion" maxlength="200" required><?= htmlspecialchars($tarea['descripcion']); ?></textarea>
    <input type="hidden" name="idTarea" value="<?= $idTarea; ?>">
    <input type="submit" value="Guardar cambios">
    <a href="contenido.php">Volver a Mis Tareas</a>
  </form>
</body>

</html>
