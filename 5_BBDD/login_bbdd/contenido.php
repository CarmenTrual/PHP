<?
session_start();
//echo $_SESSION['usuario'];
if (isset($_SESSION['usuario'])) {
    require 'views/contenido.view.php';
} else {
    require 'views/login.view.php';
}

?>