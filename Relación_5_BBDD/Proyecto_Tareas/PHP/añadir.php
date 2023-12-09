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

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

      // Verificar 
      if ($consulta->affected_rows > 0) {
        header('Location: contenido.php');
        exit;
      } else {
        // Si hubo un error al insertar, mostrar un mensaje
        echo "Ha ocurrido un error.";
      }
    } catch (Exception $e) {
      // Mensaje de error si ocurre una excepción
      echo "Ha ocurrido un error: " . $e->getMessage();
    }
  }
}
require '../Views/contenido.view.php';
