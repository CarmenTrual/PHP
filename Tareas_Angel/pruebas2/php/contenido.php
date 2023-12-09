<?
session_start();

//COMPROBAMOS QUE HAY UN USUARIO O NO EN LA SESIÓN

if(isset($_SESSION['usuario']) && isset($_SESSION['idUsuario'])) {
  require '../views/contenido.view.php';
} else {
  header('Location: ../index.html');
}

?>