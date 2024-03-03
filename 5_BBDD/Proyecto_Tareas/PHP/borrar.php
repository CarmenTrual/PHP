<?php
session_start();

// Verificar si el usuario está logueado
if (isset($_POST['idTarea']) && isset($_SESSION['usuario_id'])) {
  $idTarea = $_POST['idTarea'];
  $usuario_id = $_SESSION['usuario_id'];

  // Conexión a la base de datos
  require './ConexionBBDD/conexion.php';

  // Intentar eliminar los registros relacionados en usuarios_tarea
  $consulta_eliminar_relacion = $conexion->prepare("DELETE FROM usuarios_tarea WHERE tarea = ?");
  $consulta_eliminar_relacion->bind_param('i', $idTarea);
  $consulta_eliminar_relacion->execute();

  // Intentar eliminar la tarea
  $consulta_borrar = $conexion->prepare("DELETE FROM tarea WHERE id = ?");
  $consulta_borrar->bind_param('i', $idTarea);
  $consulta_borrar->execute();

  // Comprobar si se ha eliminado la tarea
  if ($consulta_borrar->affected_rows > 0) {
    header('Location: contenido.php');
    exit;
  } else {
    // Mensaje de error si no se elimina la tarea
    echo "Error. La tarea no se ha eliminado.";
  }
} else {
  // Mensaje de error si no se reciben los datos necesarios
  echo "Error: No se ha proporcionado el ID de la tarea o no estás logueado.";
}
?>


