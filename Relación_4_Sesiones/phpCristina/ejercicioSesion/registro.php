<?
session_start();

if(isset($_POST['usuario']) && isset($_POST['password'])
&& isset($_POST['password2'])){

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512',$_POST['password']);
    $password2 = hash('sha512',$_POST['password2']);


    if ($password == $password2) {
        //más adelante guardaremos en BD el usuario
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $password;
        header("Location: login.php");
    } else {
        echo "Las contraseñas deben coincidir";
    }
}

require 'views/registro.view.php';
?>