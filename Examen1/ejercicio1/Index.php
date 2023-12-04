<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
/*FizzBuzz es un reto de programación que consiste en pintar los números del 1al 100 que cumplen las siguientes condiciones:
○ Si el número que toca pintar es múltiplo de 3, en su lugar pintaremos Fizz.○ Si es múltiplo de 5 pintaremos Buzz,
○ Si es múltiplo 3 y 5 a la vez, pintaremos FizzBuzz. */

//Solución. Yo no lo entregué.

// Iniciamos un bucle que recorre los números del 1 al 100
for ($i = 1; $i <= 100; $i++) {
    // Comprobamos si el número es múltiplo de 3 y de 5
    if ($i % 3 == 0 && $i % 5 == 0) {
        // Si es múltiplo de ambos, imprimimos "FizzBuzz" en una nueva línea
        echo "FizzBuzz<br>";
    } 
    // Si no es múltiplo de ambos, comprobamos si es múltiplo de 3
    elseif ($i % 3 == 0) {
        // Si es múltiplo de 3, imprimimos "Fizz" en una nueva línea
        echo "Fizz<br>";
    } 
    // Si no es múltiplo de 3, comprobamos si es múltiplo de 5
    elseif ($i % 5 == 0) {
        // Si es múltiplo de 5, imprimimos "Buzz" en una nueva línea
        echo "Buzz<br>";
    } else {
        // Si no es múltiplo ni de 3 ni de 5, imprimimos el número en una nueva línea
        echo $i . "<br>";
    }
}
?>




