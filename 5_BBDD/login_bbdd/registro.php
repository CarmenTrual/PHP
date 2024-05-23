<?

if (
    isset($_POST['usuario']) && isset($_POST['password'])
    && isset($_POST['password2'])
) {

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);


    if ($password == $password2) { 
        try {
            $host = "wep-app-database.cloarl2hwxs2.us-east-1.rds.amazonaws.com";
  $dbUsername = "webuser";
  $dbPassword = "MKKQFuk54LBON6TtSeBJ";
  $dbName = "database1";
  $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('SELECT * FROM Usuarios WHERE Nombre = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();

            if ($resultado) {
            } else {

                $statement = $conn->prepare('INSERT INTO Usuarios(Nombre, Id) values (:usuario, :password)');
                $statement->execute(array(
                    ':usuario' => $usuario,
                    ':password' => $password
                ));
            }


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        header("Location: login.php");
    } else {
        echo "usuario incorrecto";
    }
} else {
   // $errores .= '<li>Rellena todos los datos correctamente</li>';
}

require 'views/registro.view.php';