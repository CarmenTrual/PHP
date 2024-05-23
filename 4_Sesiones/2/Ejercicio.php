<?php
session_start();
if (isset($_POST['reset'])) {
  $_SESSION['cont'] = 0;
} elseif (!isset($_SESSION['cont'])){
  $_SESSION['cont'] = 1;
} else {
  $_SESSION['cont']++;
}
echo "<p>" . $_SESSION['cont'] . "</p>";

//Amplía el ejercicio anterior y añade un botón para inicializar a cero el contador.
?>
