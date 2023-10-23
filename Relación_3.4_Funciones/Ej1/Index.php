<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba de funciones</title>
</head>
<body>
  <?php
  /*Crea una biblioteca de funciones matemáticas que contenga las siguientes funciones.
Recuerda que puedes usar unas dentro de otras si es necesario.*/
include 'Funciones.php';

echo "<h1><strong>Prueba de funciones:</strong></h1>";
//Función 1.
echo "<h3>esCapicua</h3>";

$num1 = 5986;
$num2 = 1221;

echo "<p>El número $num1 " . (esCapicua($num1) ? "es capicúa" : "no es capicúa") . "</p>";
echo "<p>El número $num2 " . (esCapicua($num2) ? "es capicúa" : "no es capicúa") . "</p>";

//Función 2.
echo "<h3>esPrimo</h3>";

$num = 469;

echo "<p>$num " . (esPrimo($num) ? "es un número primo" : "No es un número primo") . "</p>";

//Función 3.
echo "<h3>siguientePrimo</h3>";

$num = 469;

echo "<p>El siguiente número primo después de $num es " . siguientePrimo($num) . "</p>";

//Función 4.
echo "<h3>potencia</h3>";

$base = 3;
$exponente = 4;

echo "<p>$base elevado a $exponente es " . potencia($base, $exponente) . "</p>";

//Función 5.
echo "<h3>digitos</h3>";

$num = 65785;

echo "<p>El número $num tiene " . digitos($num) . " dígitos.</p>";

//Función 6.
echo "<h3>voltea</h3>";

$num = 1574;

echo "<p>El número $num volteado sería " . voltea($num) . ".</p>";

//Función 7.
echo "<h3>digitoN</h3>";

$num = 68756;
$posicion = 3;

echo "<p>El dígito en la posición $posicion del número $num es " . digitoN($num, $posicion) . ".</p>";

//Función 8.
echo "<h3>posicionDeDigito</h3>";

$num = 229;
$digito = 2;

echo "<p>El dígito $digito en el número $num está en la posición: " . posicionDeDigito($num, $digito) . "</p>";

$num = 4738;
$digito = 3;

echo "<p>El dígito $digito en el número $num está en la posición: " . posicionDeDigito($num, $digito) . "</p>";

//Función 9.
echo "<h3>quitaPorDetras</h3>";

$num = 87548;
$n = 3;

echo "<p>Si quitas $n dígitos por detrás al número $num el número que queda es " . quitaPorDetras($num, $n) . ".</p>";

//Función 10.
echo "<h3>quitaPorDelante</h3>";

$num = 632566;
$n = 2;

echo "<p>Si quitas $n dígitos por delante al número $num el número que queda es " . quitaPorDelante($num, $n) . ".</p>";

//Función 11.
echo "<h3>pegaPorDetras</h3>";

$num = 174887;
$digito = 7;

echo "<p>Si agregas el dígito $digito por detrás al número $num el número que queda es " . pegaPorDetras($num, $digito) . ".</p>";

//Función 12.
echo "<h3>pegaPorDelante</h3>";

$num = 35526;
$digito = 7;

echo "<p>Si agregas el dígito $digito por delante al número $num el número que queda es " . pegaPorDelante($num, $digito) . ".</p>";

//Función 13.
echo "<h3>trozoDeNumero</h3>";

$num = 354687;
$primera = 1;
$ultima = 3;

echo "<p>El trozo de número entre las posiciones $primera y $ultima en el número $num es " . trozoDeNumero($num, $primera, $ultima) . ".</p>";

//Función 14.
echo "<h3>juntaNumeros</h3>";

$num1 = 123;
$num2 = 456;

echo "<p>Si juntamos los números $num1 y $num2 obtenemos " . juntaNumeros($num1, $num2) . ".</p>";
?>
  
</body>
</html>
