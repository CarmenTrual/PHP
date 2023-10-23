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

//Función 5.
echo "<h3>estaEnArray</h3>";

$array = generaArrayInt(5, 1, 20);
$numero = 12;//probamos con el 12 por ejemplo.
$estaEnArray = estaEnArrayInt($array, $numero);

echo "Array: " . implode(", ", $array) . "</br>";
if($estaEnArray){
  echo "<p>El número " . $numero . " si está en el array.". "</p>";
}else{
  echo "<p>El número " . $numero . " no está en el array.". "</p>";
}

//Función 6.
echo "<h3>posicionEnArray</h3>";

$array = generaArrayInt(5, 1, 20);
$numero = 12;
$posicion = posicionEnArray($array, $numero);

echo "Array: " . implode(", ", $array) . "</br>";
echo "<p>" . $posicion . "</p>";

//Función 7.
echo "<h3>volteaArrayInt</h3>";

$array = generaArrayInt(5, 1, 20);
$arrayVolteado = volteaArrayInt($array);

echo "Array: " . implode(", ", $array) . " => " . implode(", ", $arrayVolteado) . "<br>";

//Función 8.
echo "<h3>rotaDerechaArrayInt</h3>";

$array = generaArrayInt(5, 1, 20);
$n = 2; // probamos con 2 rotaciones por ejemplo.
$arrayRotado = rotaDerechaArrayInt($array, $n);

echo "Array: " . implode(", ", $array) . " => " . implode(", ", $arrayRotado) . "<br>";
echo "Hemos rotado " . $n . " posiciones a la derecha el array: " ;

//Función 9.
echo "<h3>rotaIzquierdaArrayInt</h3>";

$array = generaArrayInt(5, 1, 20);
$n = 2;
$arrayRotado = rotaIzquierdaArrayInt($array, $n);

echo "Array: " . implode(", ", $array) . " => " . implode(", ", $arrayRotado) . "<br>";
echo "Hemos rotado " . $n . " posiciones a la izquierda el array: " ;



  ?>
  </body>
  </html>


