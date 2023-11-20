<?php
session_start();

if (!isset($_SESSION['nombre'])){
?>
<h4>Introduce tu nombre</h4>

<form action="nombre-2.php" method="post">
  <input type="text" name="nombre">
  <input type="submit" value="Enviar" >
</form>

  <?php 
} else {
  echo $_SESSION['nombre'];
}
?>




