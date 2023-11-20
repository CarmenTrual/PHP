<?php
  session_start();

  $palos = array('c', 'd', 'p', 't');

  if (!isset($_SESSION['numero1']) || isset($_POST['jugador1']) && isset($_POST['jugador2'])) {
    $_SESSION['jugador1'] = $_POST['jugador1'];
    $_SESSION['jugador2'] = $_POST['jugador2'];
    $_SESSION['palo1'] = $palos[array_rand($palos)];
    $_SESSION['palo2'] = $palos[array_rand($palos)];
    $_SESSION['numero1'] = rand(1, 10);
    $_SESSION['numero2'] = rand(1, 10);
  }

  echo $_SESSION['jugador1'] . ' sacó: <img src="./img/' . $_SESSION['palo1'] . $_SESSION['numero1'] . '.svg" width="100"><br>';
  echo $_SESSION['jugador2'] . ' sacó: <img src="./img/' . $_SESSION['palo2'] . $_SESSION['numero2'] . '.svg" width="100"><br>';
  echo '<br>';
  echo '<br>';

  if ($_SESSION['numero1'] > $_SESSION['numero2']) {
    echo 'Gana ' . $_SESSION['jugador1'];
  } elseif ($_SESSION['numero1'] < $_SESSION['numero2']) {
    echo 'Gana ' . $_SESSION['jugador2'];
  } else {
    echo 'Empate';
  }
?>

<form method="post" action="index.php">
  <input type="submit" value="Jugar de nuevo">
</form>




