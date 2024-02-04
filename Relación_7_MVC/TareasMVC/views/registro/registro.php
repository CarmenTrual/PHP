<?php
// Iniciamos la sesión
session_start();

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
  header('Location: index.php');
  exit;
}

// Aquí va el archivo con la conexión a la base de datos con mysqli
require_once '../../Db.php';
$db = new Db();

$mensajeError = '';

// Comprobar si se ha enviado el formulario
if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['password2'])) {
  // Almacenar los datos
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  // Verificamos que las dos contraseñas coinciden
  if ($password === $password2) {
    try {
      // Consultar si existe el usuario 
      $resultado = $db->dataQuery("SELECT * FROM usuarios WHERE usuario = '$usuario'");

      // Si existe, salta mensaje de error
      if (!empty($resultado)) {
        $mensajeError = "El usuario ya está registrado.";
      } else {
        // Si no existe, encriptar la contraseña y registrar el nuevo usuario en la bbdd
        $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);
        $consulta = $db->dataManipulation("INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$passwordEncriptada')");
        if ($consulta > 0) {
          header('Location: ../login/login.php');
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
require_once("./view.php");
