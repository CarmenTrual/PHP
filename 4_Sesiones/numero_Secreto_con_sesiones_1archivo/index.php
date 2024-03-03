<?php
session_start();

if (!isset($_SESSION['aleatorio'])) {
  $_SESSION['aleatorio'] = rand(1, 100);
  $_SESSION['intentos'] = 0;
}

if (!isset($_REQUEST['numero'])) {
  echo "<form action='index.php' method='get'>
        Adivina mi número:
        <input type='text' name='numero'><br>
        <input type='submit'>
        </form>";
} else {
  $n = $_REQUEST['numero'];
  $_SESSION['intentos']++;
  echo "Tu número es: $n<br>";
  
  if ($n > $_SESSION['aleatorio']) {
    echo "Mi número es MENOR";
  } else if ($n < $_SESSION['aleatorio']) {
    echo "Mi número es MAYOR";
  } else {
    echo "<p>ENHORABUENA, HAS ACERTADO</p>";
    echo "Has necesitado " . $_SESSION['intentos'] . " intentos";
    session_destroy();
  }
  echo "<br><a href='index.php'>Sigue jugando...</a>";
}
?> 
