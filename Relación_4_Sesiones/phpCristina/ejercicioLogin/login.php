<?
    session_start();
/**
 * En esta página se encuentra el código de que comprueba que el usuario conectado es "test" y su password es "test".
 * Si el usuario es test/test se mostrará la página de contenido.php. En caso contrario se mostrará la de registro.php. 
 * 
 * Al recuperar la password automáticamente se le aplicará un cifrado sha512.
 * 
 * Autor: Nombre Apellidos
 * 
 */

if (isset($_POST['usuario']) && isset($_POST['password'])){

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);

        try {
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "usuarios";
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password LIMIT 1');
            $statement->execute(array(':usuario' => $usuario, ':password' => $password));
            $resultado = $statement->fetch();

            if ($resultado) {
                $_SESSION["usuario"] = $usuario;
                header("location: contenido.php");
            } else {
                echo "<p>Usuario o contraseña incorrecto.</p>";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

require 'views/login.view.php';
