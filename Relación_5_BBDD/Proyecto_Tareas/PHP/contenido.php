<?php
session_start();

// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
  // Si no está logueado, redirigir a la página de inicio de sesión
  header('Location: login.php');
  exit;
}

// Aquí va el archivo con la conexión a la base de datos con mysqli  
require './ConexionBBDD/conexion.php';

// Lógica para añadir una nueva tarea
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'Añadir') {
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

  // Redirigir para evitar reenvío del formulario
  header('Location: contenido.php');
  exit;
}

// Obtener las tareas del usuario logueado
$usuario_id = $_SESSION['usuario_id'];
$consulta = $conexion->prepare("SELECT tarea.id, tarea.titulo, tarea.descripcion FROM tarea INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea WHERE usuarios_tarea.usuario = ?");
$consulta->bind_param('i', $usuario_id);
$consulta->execute();
$resultado = $consulta->get_result();
$tareas = $resultado->fetch_all(MYSQLI_ASSOC);

require '../Views/contenido.view.php';
?>
