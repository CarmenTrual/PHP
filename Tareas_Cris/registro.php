<?php
session_start(); // Iniciar la sesión al principio del script

if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['usuario']) &&
    isset($_POST['password']) &&
    isset($_POST['password2'])
) {
    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);

    // Validar que los campos no estén vacíos
    if (empty($usuario) || empty($_POST['password']) || empty($_POST['password2'])) {
        echo "Rellena todos los campos.";
    } else {
        // Validar si las contraseñas coinciden
        if ($password != $password2) {
            echo "Las contraseñas no coinciden. Introduce contraseñas iguales.";
        } else {
            try {
                $host = "db";
                $dbUsername = "root";
                $dbPassword = "test";
                $dbName = "tareas";
                $conexion = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Validar si el usuario ya existe
                $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
                $statement->execute(array(':usuario' => $usuario));
                $resultado = $statement->fetch();

                if ($resultado) {
                    echo "El usuario ya existe. Introduce un usuario diferente.";
                } else {
                    // Almacenar el usuario en la sesión
                    $_SESSION['usuario'] = $usuario;

                    // Insertar el nuevo usuario en la base de datos
                    $statement = $conexion->prepare('INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)');
                    $statement->execute(array(':usuario' => $usuario, ':password' => $password));

                    header("Location: login.php");
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
} else {
    echo "Rellena correctamente todos los datos.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="loggin/estilos/estilo2.css">
</head>
<body>
    <div id="registro" style="display: block;">
        <h2>Registro de Usuario</h2>
        <form action="registro.php" method="post">
            Usuario: <input type="text" name="usuario"><br>
            Contraseña: <input type="password" name="password"><br>
            Repite contraseña: <input type="password" name="password2"><br>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
