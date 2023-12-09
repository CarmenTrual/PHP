<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
  header('location:login.php');
  exit;
}

// Conexión a la base de datos con mysqli  
require './ConexionBBDD/conexion.php';

$mensajeError = '';
$tareas = []; // Inicializa $tareas como un array vacío

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'Añadir') {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];

  // Comprobar la longitud del título y la descripción
  if (strlen($titulo) > 20 || strlen($descripcion) > 200) {
    $mensajeError = "Error. Has excedido el máximo de caracteres permitidos.";
  } else {
    // Insertar la nueva tarea en la base de datos
    try {
      $consulta = $conexion->prepare("INSERT INTO tarea (titulo, descripcion) VALUES (?, ?)");
      $consulta->bind_param('ss', $titulo, $descripcion);
      $consulta->execute();

      // Insertar la relación entre la tarea y el usuario en la tabla usuarios_tarea
      $tarea_id = $conexion->insert_id;
      $consulta = $conexion->prepare("INSERT INTO usuarios_tarea (tarea, usuario) VALUES (?, ?)");
      $consulta->bind_param('ii', $tarea_id, $_SESSION['usuario_id']);
      $consulta->execute();

      header('Location: contenido.php');
      exit;
    } catch (Exception $e) {
      $mensajeError = "Ha ocurrido un error: " . $e->getMessage();
    }
  }
}

// Recuperar las tareas del usuario logueado
$usuario_id = $_SESSION['usuario_id'];
try {
  $consulta = $conexion->prepare("SELECT tarea.id, tarea.titulo, tarea.descripcion FROM tarea INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea WHERE usuarios_tarea.usuario = ?");
  $consulta->bind_param('i', $usuario_id);
  $consulta->execute();
  $resultado = $consulta->get_result();
  $tareas = $resultado->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
  $mensajeError .= " Ha ocurrido un error: " . $e->getMessage();
}

require '../Views/contenido.view.php';
?>