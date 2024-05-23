<?php
session_start();
if (!isset($_SESSION['cont'])){
  $_SESSION['cont']=1;
}else{
  $_SESSION['cont']++;
}
echo "<p>" . $_SESSION['cont'] . "</p>";

//Hacer un contador de visitas que cada vez que se cargue la página se aumente el contador.
?>



