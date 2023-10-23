<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<?php
//Escribe un programa que pase de binario a decimal.
include("../ej1/Funciones.php");

if (isset($_GET["num"])) {
  $num = $_GET["num"];
  echo "El número en decimal es: " . bindec($num); // bindec convierte un nº binario a decimal.
}
?>
</body>
</html>