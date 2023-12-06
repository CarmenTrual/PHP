<?php
// Iniciamos la sesión
session_start();

// Aquí va el archivo con la conexión a la base de datos con mysqli
require './ConexionBBDD/conexion.php';

// Comprobar si se ha enviado el formulario
if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['password2'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  // Inicializar variable mensajeError como una cadena vacía
  $mensajeError = '';

  // Verificamos que las dos contraseñas coinciden
  if ($password == $password2) {
    // Encriptamos la contraseña antes de insertarla en la base de datos
    $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);

    // Insertamos el usuario y la contraseña encriptada en la base de datos
    $consulta = $conexion->stmt_init();
    $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
    $consulta->bind_param('ss', $usuario, $passwordEncriptada);
    $consulta->execute();

    // Verificamos si la inserción fue exitosa
    if ($consulta->affected_rows > 0) {
      // Redirigimos al usuario a la página de inicio de sesión
      header('Location: login.php');
      exit;
    } else {
      // Si hubo un error al insertar, mostramos un mensaje
      echo "Error al registrar el usuario.";
    }
  } else {
    // Si las contraseñas no coinciden, asignamos un mensaje de error
    $mensajeError = "Las contraseñas no coinciden.";
  }
}

require("../Views/registro.view.php");
