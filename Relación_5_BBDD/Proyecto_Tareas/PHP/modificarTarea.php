<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
</head>
<body>
  
  <h1>Inicia Sesión</h1>

  <?php 
  // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
  if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
  } else {
    $action = "mostrarFormularioLogin";  // Acción por defecto
}


  ?>
  
</body>
</html>