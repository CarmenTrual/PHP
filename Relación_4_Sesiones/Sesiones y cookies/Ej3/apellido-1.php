<?php
session_start();
?>

<?php
if (!isset($_SESSION['apellido'])){
?>
<h4>Introduce tu apellido</h4>

<form action="apellido-2.php" method="post">
  <input type="text" name="apellido">
  <input type="submit" value="Enviar" >
</form>
  <?php 
} else {
  echo $_SESSION['apellido'];
}
?>
