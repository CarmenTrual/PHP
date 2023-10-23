<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <?php 
  /*Realiza un programa que pida dos números y luego muestre el resultado de su
  multiplicación.*/
  $resultado = $_GET['num1'] * $_GET['num2'];
  echo "El resultado de " . $_GET ['num1'] . "multiplicado por " . $_GET ['num2'] . " es " . $resultado;
  ?>

</body>
</html>