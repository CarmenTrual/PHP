<?php
if(isset($_POST['editarTitulo']) && isset($_POST['editarDescripcion']) && isset($_POST['idTarea'])) {
  // VARIABLES
  $titulo = $_POST['editarTitulo'];
  $descripcion = $_POST['editarDescripcion'];
  $idTarea = $_POST['idTarea'];
  try {
    include '../include/config.db.php';
    $updateStatement = $conn->prepare("UPDATE tarea SET titulo = ?, descripcion = ? WHERE id = ?");
    $updateStatement->bind_param('ssi', $titulo, $descripcion, $idTarea);
    $updateStatement->execute() or die($updateStatement->error);
    $updateStatement->close();
    $conn->close();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  header("Location: contenido.php");
}
require '../views/editarTarea.view.php';
