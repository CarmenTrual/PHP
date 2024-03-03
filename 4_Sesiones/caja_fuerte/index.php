<?php
session_start();

if (!isset($_SESSION['clave'])) {
  $_SESSION['intentos'] = 3;
  $_SESSION['clave'] = 5234;
}

if (!isset($_REQUEST['numero'])) {
  echo "<form action='index.php' method='get'>
        Introduce la clave:
        <input type='text' name='numero'><br>
        <input type='submit'>
        </form>";
}else{
  $n = $_REQUEST['numero'];
  $_SESSION['intentos']--;
  $clave = $_SESSION['clave'];
  
  echo "Has introducido: $n<br>";

  if ($n == $clave) {
echo "Caja fuerte abierta. ";
session_destroy() ;
  } else {
    if ($_SESSION['intentos'] <= 0) {
      echo " intentos maximos superados <br>";
      session_destroy();
    } echo "te quedan ". $_SESSION['intentos'] . " intentos <br>";
    echo "<a href='index.php'>Siguiente intento</a><br>";
    
  }
}
?>




