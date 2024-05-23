<?php
session_start();

if (isset($_POST['nombre'])){
  $_SESSION['nombre'] = $_POST['nombre'];
  echo $_SESSION ['nombre'];

  ?>
  <a href="index.php">Volver al inicio</a>
  <?php

} else {
  header("Location: nombre-1.php");
}
?>








