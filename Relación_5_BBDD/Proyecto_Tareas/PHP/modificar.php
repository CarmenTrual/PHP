<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
  header('location:login.php');
  exit;
}

// Conexión a la base de datos
require './ConexionBBDD/conexion.php';

// Comprobar si se ha enviado el formulario
if(isset($_POST['titulo'], $_POST['descripcion'], $_POST['idTarea'])) {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $idTarea = $_POST['idTarea'];

  // Consulta para actualizar la tarea
$consulta = $conexion->prepare("UPDATE tarea INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea SET tarea.titulo = ?, tarea.descripcion = ? WHERE tarea.id = ? AND usuarios_tarea.usuario = ?");
$consulta->bind_param('ssii', $titulo, $descripcion, $idTarea, $_SESSION['usuario_id']);
$consulta->execute();


  try {
  // Comprobar la actualización
  if($consulta->affected_rows > 0) {
    header('Location: contenido.php');
    exit;
  } else {
    // Si no se pudo actualizar 
    echo "Error al actualizar la tarea.";
  }
} catch (Exception $e) {
  // Mensaje de error si ocurre una excepción
  echo "Ha ocurrido un error: " . $e->getMessage();
}
} else {
// Mensaje de error si no se reciben los datos del formulario
echo "Error: No se ha podido modificar la tarea.";
}
?>
