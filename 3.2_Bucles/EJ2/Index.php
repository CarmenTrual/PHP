<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
Los múltiplos de 5 son:
  <?php
  /*Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle while*/

  $i = 0;
  while ($i <= 100){
    $i +=5;

    echo "<br>" . $i . " " ;
  }
  ?>
</body>
</html>

