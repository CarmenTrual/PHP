<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestclient</title>
</head>

<body>
  <h1>GESTCLIENT</h1>
  <h2>Gestión de clientes de CertiBank</h2>
  <form action="index.php" action="GET">
    <input type="text" name="dni" value="<?= $_GET['dni'] ?>">
    <input type="text" name="nombre" value="<?= $_GET['nombre'] ?>">
    <input type="text" name="direccion" value="<?= $_GET['direccion'] ?>">
    <input type="text" name="telefono" value="<?= $_GET['telefono'] ?>">
    <input type="hidden" name="dniAntiguo" value="<?= $_GET['dni'] ?>">
    <input type="hidden" name="accion" value="modificar">
    <br><br>
    <input type="submit" value="Aceptar">
    <a href="index.php">
      <button type="button">Cancelar</button>
    </a>
  </form>
</body>

</html>