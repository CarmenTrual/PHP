<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>escapicua</title>
</head>
<body>
<?php
//Muestra los números capicúa que hay entre 1 y 99999.
include("../ej1/Funciones.php");

for ($i = 1; $i <= 99999; $i++){
  if(esCapicua($i)){
    echo $i . ", ";
  }
}
?>
</body>
</html>