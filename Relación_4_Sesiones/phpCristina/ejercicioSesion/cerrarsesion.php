<?
session_start();
session_destroy();

$_SESSION = array(); //nos aseguramos que $_SESSION se queda vacía

header("Location: login.php");
?>