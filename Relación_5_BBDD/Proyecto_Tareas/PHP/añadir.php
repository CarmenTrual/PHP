<?php
  session_start();

  // Verificar si el usuario está logueado
  if (!isset ($_SESSION['usuario'])) {
    header('location:login.php');
    exit;
  }

  // Aquí va el archivo con la conexión a la base de datos con mysqli  
require './ConexionBBDD/conexion.php';

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];

  // Insertar la nueva tarea en la base de datos
  $consulta = $conexion->prepare("INSERT INTO tarea (titulo, descripcion) VALUES (?, ?)");
  $consulta->bind_param('ss', $titulo, $descripcion);
  $consulta->execute();

  // Insertar la relación entre la tarea y el usuario en la tabla usuarios_tarea
  $tarea_id = $conexion->insert_id;
  $consulta = $conexion->prepare("INSERT INTO usuarios_tarea (tarea, usuario) VALUES (?, ?)");
  $consulta->bind_param('ii', $tarea_id, $_SESSION['usuario_id']);
  $consulta->execute();

  // Verificar si la inserción fue exitosa
  if ($consulta->affected_rows > 0) {
    // Redirigir al usuario a la página de tareas pendientes
    header('Location: contenido.php');
    exit;
  } else {
    // Si hubo un error al insertar, mostrar un mensaje
    echo "Error al añadir la tarea.";
  }
}
?>

  
