<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
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
  ?>

</body>

</html>