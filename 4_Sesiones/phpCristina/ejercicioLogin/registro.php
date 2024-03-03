<?

/**
 * En esta página se encuentra el código que crea el usuario. Por ahora no se hace la conexión a BD, simplemente si el usuario introducido en el formulario 
 * es test/test se redirige a la página de login. En otro caso se indicará que el usuario es incorrecto.
 *  
 * Al recuperar la password automáticamente se le aplicará un cifrado sha512.
 * 
 * Autor: Nombre Apellidos
 * 
 */


if (
    isset($_POST['usuario']) && isset($_POST['password'])
    && isset($_POST['password2'])
) {

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);


    if ($password == $password2) { //si las pass coinciden
        //comprobamos que el usuario no existe ya en BD
        try {
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "usuarios";
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();

            if ($resultado) {
                echo "el usuario ya existe";
            } else {
                //guardo en BD el usuario
                $statement = $conn->prepare('INSERT INTO usuarios(usuario, password) values (:usuario, :pass)');
                $statement->execute(array(
                    ':usuario' => $usuario,
                    ':pass' => $password
                ));
            }


            /****************************
            $conexion = mysqli_connect('db', 'root', 'test', "usuarios");
            $query = 'SELECT * From usuarios';
            $result = mysqli_query($conexion, $query);

            while ($value = $result->fetch_array(MYSQLI_ASSOC)) {
                foreach ($value as $element) {
                    echo $element ;
                }
            }
            
             */
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
