<?php
session_start();

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
  header('Location: contenido.php');
  exit;
}

//Archivo con la conexión a la base de datos con mysqli
require './ConexionBBDD/conexion.php';

$mensajeError = '';

//Comprobar si se ha enviado el formulario
if (isset($_POST['usuario']) && isset($_POST['password'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];


      // Si es correcto, guardamos la información del usuario en la sesión
      $_SESSION['usuario_id'] = $fila['id'];
      $_SESSION['usuario_nombre'] = $fila['usuario'];

      // Redirigimos al usuario a la página de tareas pendientes
      header('Location: index.php');
      exit;
    } else {
      // Mensaje de error si la contraseña es incorrecta
      $mensajeError = "La contraseña es incorrecta.";
    }
  } else {
    // Mensaje de error si el usuario no existe en la base de datos
    $mensajeError = "El usuario no se encuentra registrado.";
  }
  $consulta->close();
}
require './views/login/view.php';
?>
