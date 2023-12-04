<?
//Aquí va el archivo con la conexión a la base de datos con mysqli
require './ConexionBBDD/conexion.php';
//Comprobar si se ha enviado el formulario
if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['password2'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  if ($password == $password2) {
    // Consultar si existe el usuario en la base de datos


    //insertar
    $consulta = $conexion->stmt_init();
    $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
    $consulta->bind_param('ss', $usuario, $password);
    $consulta->execute();


    // Consultamos si el usuario y la contraseña son correctos
    //if ($consulta->num_rows > 0) {

      // Redirigimos al usuario a la página de tareas pendientes
      header('Location: login.php');
      exit;
   // } else {
   //   echo "error al insertar el usuario";
   // }
  } else {
    //error las contraseñas no conidicen
  }
}
require("../Views/registro.view.php");
