<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Escribe un programa que genere 15 números aleatorios y que los almacene en un array.
  Rota los elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la
  posición 1, el de la 1 a la 2, etc. El número que se encuentra en la última posición debe
  pasar a la posición 0. Finalmente, muestra el contenido del array del inicio y el array rotado.*/

  $numero = array();
  $cuadrado = array();
  $cubo = array();

  for ($i = 0; $i <20; $i++){
    $numero[$i] = rand(0, 100);
  }

  for ($i = 0; $i <20; $i++){
    $cuadrado[$i] = $numero[$i] * $numero[$i];
  }

  for ($i = 0; $i <20; $i++){
    $cubo[$i] = $numero[$i] * $numero[$i] * $numero[$i];
  }

  echo "<table border='1'>
    <tr>
      <th>Número</th>
    </tr>";

    for ($i = 0; $i < 20; $i++) {
      echo "<tr><td>$numero[$i]</td><td>$cuadrado[$i]</td><td>$cubo[$i]</td></tr>";
    }
    ?>
    </table>
  </body>
</html>