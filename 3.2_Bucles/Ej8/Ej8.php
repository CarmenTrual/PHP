<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Muestra la tabla de multiplicar de un número introducido por teclado. El resultado se debe
  mostrar en una tabla (<table> en HTML).*/
  $num = $_GET['num'];
  $i = 0;
  echo "<table>";
  for($i = 1; $i <= 10; $i++){
    $result = $num * $i;
    echo "<tr><td>" . $num . " x " . $i . " = " . $result . "</td></tr>";
  }
  echo "</table>";
  ?>
</body>
</html>