<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Escribe un programa que muestre en tres columnas, el cuadrado y el cubo de los 5 primeros
  números enteros a partir de uno que se introduce por teclado.*/

  $num = $_GET['num'];


  echo "<table border='1'>
    <tr>
      <th>Número</th>
      <th>Cuadrado</th>
      <th>Cubo</th>
    </tr>";


    for ($i = 0; $i < 5; $i++) {
      $cuadrado = $num * $num;
      $cubo = $num * $num * $num;
      echo "<tr><td>$num</td><td>$cuadrado</td><td>$cubo</td></tr>";
      $num++;
    }
    ?>
    </table>
  </body>
</html>
