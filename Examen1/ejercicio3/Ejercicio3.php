<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 
  /*Crea un formulario por pantalla en el que se inserte un número no mayor a 1000 y muestre los números que son primos entre 
  1 y el número introducido. Si el número es menor que 1 ó mayor que 1000 o no se ha introducido muestre un error por pantalla 
  y un enlace para volver al formulario.*/
  include 'Funciones.php';


  //Lo que yo hice y entregué:
  /*$num = $_GET['num'];
  for($i = 1; $i <= $_GET['num']; ++$i){
    if(primo($i)){
      echo "<p>" . $i . "</p>";
    }
    if ($_GET['num'] != '' || $_GET['num'] < 1 || $_GET['num'] > 1000) {
      echo '<h2><strong>Error</strong></h2>';
    echo 'Introduce un número válido:';
    echo '<form action="ejercicio3.php" method="get">
      <input type="number" name="num"><br>
      <input type="submit" value="Enviar">
      </form>';
  }
}*/

//Corrección:
$num = $_GET['num'];
if ($num == '' || $num < 1 || $num > 1000) {
    echo '<h2><strong>Error</strong></h2>';
    echo 'Introduce un número válido:';
    echo '<form action="ejercicio3.php" method="get">
      <input type="number" name="num"><br>
      <input type="submit" value="Enviar">
      </form>';
} else {
    for($i = 1; $i <= $_GET['num']; ++$i){
        if(primo($i)){
            echo "<p>" . $i . "</p>";
        }
    }
}
?>
</body>
</html>