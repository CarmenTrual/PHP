<?
session_start();

if (isset($_POST['usuario']) && isset($_POST['password'])) {

  $usuario = strtolower($_POST['usuario']);
  $password = hash('sha512', $_POST['password']);

  try {

  $host = "wep-app-database.cloarl2hwxs2.us-east-1.rds.amazonaws.com";
  $dbUsername = "webuser";
  $dbPassword = "MKKQFuk54LBON6TtSeBJ";
  $dbName = "database1";
  $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $statement = $conn->prepare('SELECT * FROM Usuarios WHERE Nombre = :usuario AND Id = :password');
  $statement->execute(array(':usuario' => $usuario,':password' => $password));
  $resultado = $statement->fetch();



  if ($resultado) {
    $_SESSION['usuario'] = $usuario;
    header("Location: contenido.php");
  } else {
    header("Location: registro.php");
  }

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  };
}
require 'views/login.view.php';