<?
// Consultar si existe el usuario en la base de datos
  $consulta = $conexion->stmt_init();
  $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
  $consulta->bind_param('s', $usuario);
  $consulta->execute();
  $resultado = $consulta->get_result();

  // Verificar si encontramos al usuario
  if ($fila = $resultado->fetch_assoc()) {
    // Verificar si la contraseña es correcta
    if (password_verify($password, $fila['password'])){}
  }