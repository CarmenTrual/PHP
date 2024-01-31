<?
class UsuarioController {
  //instancia de la clase Db
  private $db;
  public function __construct() {
    $this->db = new Db(); 
  }
  public function login() {
    //Archivo con la conexión a la base de datos con mysqli
    require_once '../../Db.php';

    $mensajeError = '';
    //Comprobar si se ha enviado el formulario
    if (isset($_POST['usuario']) && isset($_POST['password'])) {

      $usuario = $_POST['usuario'];
      $password = $_POST['password'];

      // Consultar si existe el usuario en la base de datos
      $resultado = $this->db->dataQuery("SELECT * FROM usuarios WHERE usuario = '$usuario'");

      // Verificar si encontramos al usuario
      if (is_array($resultado) && count($resultado) > 0) {
        $fila = $resultado[0];

        // Verificar si la contraseña es correcta
        if (password_verify($password, $fila->password)){
          $_SESSION['usuario_id'] = $fila->id;
          $_SESSION['usuario_nombre'] = $fila->usuario;

          header('Location: /PHP/Relación_7_MVC/TareasMVC/index.php');
          exit;
        } else {
          $mensajeError = "La contraseña es incorrecta.";
        }
      } else {
        $mensajeError = "El usuario no se encuentra registrado.";
      }
    }
    require_once './view.php';
  }
}
