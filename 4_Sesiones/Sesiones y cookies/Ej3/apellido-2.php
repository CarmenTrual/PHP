<?php
session_start();

if (isset($_POST['apellido'])){
  $_SESSION['apellido'] = $_POST['apellido'];

  echo $_SESSION ['apellido'];

  ?>
  <a href="index.php">Volver al inicio</a>
  <?php

} else {
  header("Location: apellido-1.php");
}
?>