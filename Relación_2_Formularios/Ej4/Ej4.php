<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <?php 
  /*Escribe un programa que sume, reste, multiplique y divida dos números introducidos por
  teclado*/
  $resultado = $_GET['num1'] + $_GET['num2'];
  echo "El resultado de " . $_GET ['num1'] . " + " . $_GET ['num2'] . " es " . $resultado."<br>";

  $resultado = $_GET['num1'] - $_GET['num2'];
  echo "El resultado de " . $_GET ['num1'] . " - " . $_GET ['num2'] . " es " . $resultado."<br>";

$resultado = $_GET['num1'] * $_GET['num2'];
  echo "El resultado de " . $_GET ['num1'] . " * " . $_GET ['num2'] . " es " . $resultado."<br>";

  $resultado = $_GET['num1'] / $_GET['num2'];
  echo "El resultado de " . $_GET ['num1'] . " / " . $_GET ['num2'] . " es " . $resultado."<br>";
  ?>

</body>
</html>