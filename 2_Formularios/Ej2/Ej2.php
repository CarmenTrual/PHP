<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <?php 
  /*Realiza un conversor de euros a dólares. Ahora la cantidad en euros que se quiere convertir
  se deberá introducir por teclado.*/
  $conversor = $_GET['num'] * 1.06;
  echo $_GET ['num'] . " euros son " . $conversor . " dólares. ";
  ?>

</body>
</html>