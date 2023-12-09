<?php

if(
  isset($_POST['usuario']) && isset($_POST['password'])
  && isset($_POST['password2'])
) {

  $usuario = strtolower($_POST['usuario']);
  $password = hash('sha512', $_POST['password']);
  $password2 = hash('sha512', $_POST['password2']);

  if($password == $password2) {

    try {

      include '../include/config.db.php';

      $sql = 'SELECT * FROM usuarios WHERE usuario = ? LIMIT 1';
      $selectStatement = $conn->stmt_init();
      $selectStatement->prepare($sql);
      $selectStatement->bind_param('s', $usuario);
      $selectStatement->execute();
      $resultado = $selectStatement->get_result();

      if($resultado->num_rows > 0) {

      } else {

        $sql = 'INSERT INTO usuarios(usuario, password) values (?, ?)';
        $insertStatement = $conn->prepare($sql);
        $insertStatement->bind_param('ss', $usuario, $password);
        $insertStatement->execute();
        $insertStatement->close();
      }

      $selectStatement->close();
      $conn->close();

    } catch (Exception $e) {

      // echo  "Error: " . $e->getMessage();

    }
    header("Location: login.php");
  } else {
    // $errores .= "usuario incorrecto";
  }
} else {
  // $errores .= '<li>Rellena todos los datos correctamente</li>';
}

require '../views/registro.view.php';
