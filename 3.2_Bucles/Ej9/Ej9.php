<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Realiza un programa que nos diga cuántos dígitos tiene un número introducido por teclado.*/
  $num = $_GET['num'];
  $contador = 0;

  if ($num == 0){
    $contador = 1;
  }

  if ($num <0){
      $num = $num * -1;
  }
  while ($num >= 1){
    $num = intval($num / 10);
    $contador++;
  }

  echo "El número tiene " . $contador . " dígitos.";
  ?>
</body>
</html>