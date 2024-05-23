<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <?php
  /*Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras.
  El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el
  mensaje “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se
  ha abierto satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.*/
  $clave = 5234;
  $intento = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $intento = $_POST['combinacion'];
  }

  if ($intento == $clave) {
    echo 'La caja fuerte se ha abierto satisfactoriamente.';
  } else {
    if ($intento != '') {
      echo 'Lo siento, esa no es la combinación.<br>';
    }
    echo 'Introduce la clave:';
    echo '<form action="index.php" method="post">
      <input type="number" name="combinacion"><br>
      <input type="submit" value="Enviar">
      </form>';
  }
?>
</body>
</html>
