<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['$idUsuario'])) {
  header('Location: contenido.php');
} elseif (isset($_POST['usuario']) && isset($_POST['password'])) {
  $usuario = strtolower($_POST['usuario']);
  $password = hash('sha512', $_POST['password']);
  try {
    include('../include/config.db.php');
    $selectStatement = $conn->stmt_init();
    $selectStatement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = ? AND password = ? LIMIT 1');
    $selectStatement->bind_param('ss', $usuario, $password);
    $selectStatement->execute();
    $result = $selectStatement->get_result();
    $fila = $result->fetch_assoc();
    if ($result->num_rows == 1) {
      $_SESSION['idUsuario'] = $fila['id'];
      $_SESSION['usuario'] = $usuario;
      header("Location: contenido.php");
    } else {
      header("Location: registro.php");
    }
    $selectStatement->close();
    $conn->close();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
}
require '../views/login.view.php';
