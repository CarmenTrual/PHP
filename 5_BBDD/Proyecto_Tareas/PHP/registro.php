<?php
// Iniciamos la sesión
session_start();

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
  header('Location: index.php');
  exit;
}

// Aquí va el archivo con la conexión a la base de datos con mysqli
require './ConexionBBDD/conexion.php';

$mensajeError = '';

// Comprobar si se ha enviado el formulario
if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['password2'])) {
  //Almacenar los datos
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  // Verificamos que las dos contraseñas coinciden
  if ($password === $password2) {
    try {
      // Consultar si existe el usuario 
      $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
      $consulta->bind_param('s', $usuario);
      $consulta->execute();
      $resultado = $consulta->get_result();
      // Si existe, salta mensaje de error
      if ($resultado->num_rows > 0) {
        $mensajeError = "El usuario ya está registrado.";
      } else {
        // Encriptar la contraseña y registrar el nuevo usuario
        $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);
        $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        $consulta->bind_param('ss', $usuario, $passwordEncriptada);
        $consulta->execute();

        if ($consulta->affected_rows > 0) {
          header('Location: login.php');
          exit;
        } else {
          $mensajeError = "Error al registrar el usuario.";
        }
      }
    } catch (Exception $e) {
      $mensajeError = "Ha ocurrido un error: " . $e->getMessage();
    }
  } else {
    $mensajeError = "Las contraseñas no coinciden.";
  }
}
require("./views/registro/view.php");
