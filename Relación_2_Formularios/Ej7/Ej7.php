<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Escribe un programa que calcule el total de una factura a partir de la base imponible.*/
  $factura = ($_GET['num']*21)/100;
  echo "El total de la factura es de : " . $_GET['num'] + $factura;
  ?>
</body>
</html>
