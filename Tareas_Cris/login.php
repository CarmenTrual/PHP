<?php
ob_start();
session_start();
//echo "Usuario ID: " . $_SESSION['usuario_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);

    try {
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "tareas";
        $conexion = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario and password= :password');
        $statement->execute(array(':usuario' => $usuario, ':password' => $password));
        $resultado = $statement->fetch();

        if ($resultado) {
            $_SESSION['usuario_id'] = $resultado['id'];
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            exit;
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="loggin/estilos/estilo1.css" rel="stylesheet">
</head>
<body>
    <div id="contenedor">
        <div id="log" style="display:block;" background>
            <h2>Iniciar sesión</h2>
            <form action="login.php" method="post">
                Usuario: <input type="text" name="usuario"><br>
                Contraseña: <input type="password" name="password"><br>
                <input type="submit" value="Iniciar sesión">
            </form>
            <br>
            <p>¿Nuevo usuario? <a href="registro.php">Registrar</a></p>
        </div>
    </div>
</body>
</html>
