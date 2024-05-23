<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  /*Vamos a ampliar uno de los ejercicios de la relación anterior para considerar las horas
  extras. Escribe un programa que calcule el salario semanal de un trabajador teniendo en
  cuenta que las horas ordinarias (40 primeras horas de trabajo) se pagan a 12 euros la hora.
  A partir de la hora 41, se pagan a 16 euros la hora.*/
  $horas = $_GET['num'];
  if ($horas >=1 && $horas<=40){
    $total = $hora*12;
    echo 'Tu salario es ' . $total . '€. ';
  }
  if ($horas >40){
    $total = (40*12)+(($horas - 40)*16);
    echo 'Tu salario semanal es ' . $total . '€. ';
  }
  ?>
</body>
</html>