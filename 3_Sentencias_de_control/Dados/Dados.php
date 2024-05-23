<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>



<?php
  $tirada1=(rand(1,6));

  echo '<img src="./img/' . $tirada1 . '.svg">';

  $tirada2=(rand(1,6));

  echo '<img src="./img/' . $tirada2 . '.svg"> <br>';

  echo 'La suma de los dados es ' . ($tirada1+$tirada2);

  
?>
</body>
</html>