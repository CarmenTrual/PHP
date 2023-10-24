<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <?php 
  /*Realiza un conversor de dólares a euros. La cantidad en dólares que se quiere convertir se
deberá introducir por teclado.*/
  $conversor = $_GET['num'] * 0.94;
  echo $_GET ['num'] . " dólares son " . $conversor . " euros. ";
  ?>

</body>
</html>