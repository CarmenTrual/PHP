<?php
session_start();

include("../include/config.db.php");

if (isset($_POST['idTarea'], $_SESSION['idUsuario'])) {
  
  $idTarea = $_POST['idTarea'];
  $idUsuario = $_SESSION['idUsuario'];

  // Consulta para verificar si la tarea pertenece al usuario
  $statement = $conn->prepare("SELECT * FROM `usuarios_tarea` WHERE `tarea` = ? AND `usuario` = ?");
  $statement->bind_param('ii', $idTarea, $idUsuario);
  $statement->execute();
  $result = $statement->get_result();

  // Verificar si la tarea pertenece al usuario
  if ($result->num_rows > 0) {

    // Preparar la consulta para eliminar la tarea
    $deleteStatement = $conn->prepare("DELETE FROM `usuarios_tarea` WHERE `tarea` = ?");
    $deleteStatement->bind_param('i', $idTarea);
    
    // Ejecutar la consulta para eliminar la relación de usuarios_tarea
    if ($deleteStatement->execute()) {

      // Preparar la consulta para eliminar la tarea
      $deleteStatementTarea = $conn->prepare("DELETE FROM `tarea` WHERE id = ?");
      $deleteStatementTarea->bind_param('i', $idTarea);

      // Ejecutar la consulta para eliminar la tarea
      if ($deleteStatementTarea->execute()) {
        header("Location: contenido.php");
      } else {
        // Manejar el error al eliminar la tarea
        // Por ejemplo, podrías redirigir a una página de error
        header("Location: contenido.php?error");
      }

      // Cerrar la segunda sentencia preparada
      $deleteStatementTarea->close();
    } else {
      // Manejar el error al eliminar la relación de usuarios_tarea
      // Por ejemplo, podrías redirigir a una página de error
      header("Location: contenido.php?error");
    }

    // Cerrar la primera sentencia preparada
    $deleteStatement->close();
  } else {
    // La tarea no pertenece al usuario, redirigir a contenido.php o mostrar un mensaje de error
    header("Location: contenido.php?error=Tarea_no_pertenece_a_usuario");
  }

  // Cerrar la sentencia preparada principal
  $statement->close();

} else {
  // Si no se enviaron las variables requeridas, redirigir a la página de inicio
  header("Location: ../index.html");
}

// Cerrar la conexión
$conn->close();
?>
