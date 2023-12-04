<?php
session_start();

//Aquí va el archivo con la conexión a la base de datos con mysqli
require './ConexionBBDD/conexion.php';

//Comprobar si se ha enviado el formulario
if (isset($_POST['usuario']) && isset($_POST['password'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  // Consultar si existe el usuario en la base de datos
  $consulta = $conexion->stmt_init();
  $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password =?");
  $consulta->bind_param('ss', $usuario, $password);
  $consulta->execute();
  $resultado = $consulta->get_result();
  $fila = $resultado->fetch_assoc();

  // Consultamos si el usuario y la contraseña son correctos
  if ($resultado->num_rows > 0) {
    // Si es correcto, guardamos la información del usuario en la sesión
    $_SESSION['usuario_id'] = $fila['id'];
    $_SESSION['usuario_nombre'] = $fila['usuario'];

    // Redirigimos al usuario a la página de tareas pendientes
    header('Location: contenido.php');
    exit;
  } else {
    // Si no encontramos al usuario, mostramos un mensaje de error
    // Si la contraseña no es correcta, mostramos un mensaje de error
    echo "El usuario o la contraseña es incorrecta.";
  }
}
require '../Views/login.view.php';
