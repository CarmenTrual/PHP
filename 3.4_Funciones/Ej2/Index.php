<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>esPrimo</title>
</head>
<body>
<?php
//Muestra los números primos que hay entre 1 y 1000.
include("../ej1/Funciones.php");

for ($i = 1; $i <= 1000; $i++){
  if(esPrimo($i)){
    echo $i . " ";
  }
}
?>
</body>
</html>