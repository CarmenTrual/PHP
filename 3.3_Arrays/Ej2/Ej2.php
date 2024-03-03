<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Escribe un formulario que pida 4 números y que luego muestre los números introducidos
  junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo
  respectivamente.*/
  if ($_SERVER["REQUEST_METHOD"] == "GET") {

  $num1 = $_GET['num1'];
  $num2 = $_GET['num2'];
  $num3 = $_GET['num3'];
  $num4 = $_GET['num4'];

  $numbers = array($num1, $num2, $num3, $num4);
  $max = max($numbers);
  $min = min($numbers);

  foreach ($numbers as $number) {
    echo $number;
    if ($number == $max) {
      echo " máximo";
    } elseif ($number == $min) {
      echo " mínimo";
      }
      echo "<br>";
  }
}
    ?>
    </table>
  </body>
</html>