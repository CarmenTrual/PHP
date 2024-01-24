<?php
session_start(); 

//Comprobamos si hay un usuario en la sesión
if(isset($_SESSION['usuario'])) { 
  // Si hay, mostrar la página de tareas
  echo "<h1>MIS TAREAS</h1>";
} else {
  // Si no hay, mandamos al login
  header("Location: login.php");
}
?>

