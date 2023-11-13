<?
session_start(); 

if(isset($_POST['usuario']) && isset($_POST['password'])){

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512',$_POST['password']);


    if ($usuario == $_SESSION['usuario'] && $password == $_SESSION['password']){
        $_SESSION['usuario'] = $usuario;
        header("Location: contenido.php");
    } else {
        header("Location: registro.php");
    }
}
require 'views/login.view.php';
