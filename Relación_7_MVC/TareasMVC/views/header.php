<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
</head>

<body>
  <h1>MIS TAREAS</h1>
  <!-- si hay usuario en la sesion(comprobar y si no hay mandar al login)-->
  <?php /*if(isset($_SESSION['usuario'])): 
    ?>
    <p>Hola <?= $_SESSION['usuario'] ?></p>
    <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
    <a href="login.php">Iniciar sesión</a>
    <?php endif; ?>
</body>
</html>

    <?php 
    //si no hay usuario en la sesion(comprobar y si no hay mandar al login)
    if(!isset($_SESSION['usuario'])){
      header('Location: login.php');
      exit;
    }*/
    ?>