<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba de funciones</title>
</head>
<body>
  <?php
/*Crea una biblioteca de funciones para arrays (de una dimensión) de números enteros que
contenga las siguientes funciones (Funciones.php)*/
include 'Funciones.php';

echo "<h1><strong>Prueba de funciones:</strong></h1>";

//Función 1.
echo "<h3>generaArrayInt</h3>";
$array = generaArrayInt(5, 1, 20);

echo implode(", ", $array); // implode - Imprime el array como una cadena todo seguido y con ", " lo separamos.

//Función 2.
echo "<h3>minimoArrayInt</h3>";

$array = generaArrayInt(5, 1, 20);
$minimo = minimoArrayInt($array);

echo "Array " . implode(", ", $array) . "<br>";
echo "<p>El número más bajo del array es: ". $minimo . ".</p>";

//Función 3.
echo "<h3>maximoArrayInt</h3>";

$array = generaArrayInt(5, 1, 20);
$maximo = maximoArrayInt($array);

echo "Array " . implode(", " , $array) . "<br>";
echo "<p>El número más alto del array es: " . $maximo . ".</p>";

//Función 4.
echo "<h3>mediaArrayInt</h3>";

$array = generaArrayInt(5, 1, 20);
$media = mediaArrayInt($array);

echo "Array: " . implode(", ", $array) . "<br>";
echo "<p>La media del array es: " . $media . ".</p>" ;

  ?>
  </body>
  </html>
  

