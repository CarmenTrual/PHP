<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Escribe un programa que calcule el área de un triángulo.*/
  $resultado = ($_GET['base'] * $_GET['altura']) / 2;
  echo "El área del Triángulo es " . $resultado."<br>";
  ?>
</body>
</html>