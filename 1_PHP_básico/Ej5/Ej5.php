<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 5</title>

</head>
<body>
  <?php
  /*Escribe un programa que utilice las variables $x y $y. Asignales los valores 144 y
  999 respectivamente. A continuación, muestra por pantalla el valor de cada
  variable, la suma, la resta, la división y la multiplicación.*/
  $x = 144;
  $y = 999;
  
  $suma = $x + $y;
  $resta = $x - $y;
  $multiplicacion = $x * $y;
  $division = $x / $y;
  
  echo "Valor de \$x: $x<br>
  Valor de \$y: $y<br>
  
  Suma: $suma<br>
  Resta: $resta<br>
  Multiplicación: $multiplicacion<br>
  División: $division<br>";
  ?>
</body>
</html>