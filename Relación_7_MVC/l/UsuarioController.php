<?
class UsuarioController {
  public function login() {
    //Archivo con la conexión a la base de datos con mysqli
    require './ConexionBBDD/conexion.php';

    $mensajeError = '';

    //Comprobar si se ha enviado el formulario
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
      $usuario = $_POST['usuario'];
      $password = $_POST['password'];

      // Consultar si existe el usuario en la base de datos
      $consulta = $conexion->stmt_init();
      $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
      $consulta->bind_param('s', $usuario);
      $consulta->execute();
      $resultado = $consulta->get_result();

      // Verificar si encontramos al usuario
      if ($fila = $resultado->fetch_assoc()) {
        // Verificar si la contraseña es correcta
        if (password_verify($password, $fila['password'])){
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
  }
}
