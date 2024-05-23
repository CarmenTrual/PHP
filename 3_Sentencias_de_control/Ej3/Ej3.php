<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre
  del día de la semana.*/
  $dia = $_GET['num'];
  switch($dia){ 
    case ($dia == 1);
      echo 'Lunes';
      break;
    case ($dia == 2);
      echo 'Martes';
      break;
    case ($dia == 3);
      echo 'Miércoles';
      break;
    case ($dia == 4);
      echo 'Jueves';
      break;
    case ($dia == 5);
      echo 'Viernes';
      break;
    case ($dia == 6);
      echo 'Sábado';
      break;
    case ($dia == 7);
      echo 'Domingo';
      break;
    default;
      echo 'Número no válido';
    }
  ?>
</body>
</html>