<?php
session_start();

if (isset($_POST['modificarTitulo']) && isset($_POST['modificarDescripcion']) && isset($_POST['idTarea']) && isset($_SESSION['usuario_id'])) {

  // VARIABLES
  $titulo = $_POST['modificarTitulo'];
  $descripcion = $_POST['modificarDescripcion'];
  $idTarea = $_POST['idTarea'];
  $usuario_id = $_SESSION['usuario_id'];

  try {

    require '../PHP/ConexionBBDD/conexion.php';

    $sql = "SELECT * FROM usuarios_tarea WHERE tarea = ? AND usuario = ?";
    $$consulta = $conexion->prepare($sql);
    $$consulta->bind_param('ii', $idTarea, $usuario_id);
    $$consulta->execute();
    $result = $$consulta->get_result();

    if ($result->num_rows > 0) {

      $update = $conexion->prepare("UPDATE tarea SET titulo = ?, descripcion = ? WHERE id = ?");
      $update->bind_param('ssi', $titulo, $descripcion, $idTarea);
      $update->execute() or die($update->error);
      $update->close();
    } else {

      header('Location: contenido.php?error=la_tarea_no_pertenece_al_usuario');
    }

    $$consulta->close();
    $conexion->close();
  } catch (Exception $e) {

    echo $e->getMessage();
  }

  header("Location: contenido.php");
}

require '../views/modificar.view.php';
