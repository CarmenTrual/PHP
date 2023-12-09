<?php
session_start();
if(isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_SESSION['idUsuario'])) {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $idUsuario = $_SESSION['idUsuario'];
  try {
    include '../include/config.db.php';
    $sql = 'INSERT INTO tarea(titulo, descripcion) values (?,?)';
    $insertStatement = $conn->prepare($sql);
    $insertStatement->bind_param('ss', $titulo, $descripcion);
    $insertStatement->execute();
    $idTarea = mysqli_insert_id( $conn );
    $result = $insertStatement->get_result();
    if(isset($result)) {
      $sql = 'INSERT INTO usuarios_tarea(tarea, usuario) values (?,?)';
      $insertStatement = $conn->prepare($sql);
      $insertStatement->bind_param('ii', $idTarea, $idUsuario);
      $insertStatement->execute();
      $result = $insertStatement->get_result();
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  $conn->close();
  $insertStatement->close();
  header ('Location: contenido.php');
} else {
}
require '../views/crearTarea.view.php';