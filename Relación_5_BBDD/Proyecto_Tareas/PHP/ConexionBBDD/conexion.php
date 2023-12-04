<?php
// Parámetros de conexión a la base de datos
$host = 'db'; // o la IP del servidor de la base de datos
$usuario_db = 'root'; // tu nombre de usuario de la base de datos
$password_db = 'test'; // la contraseña de tu usuario de la base de datos
$nombre_db = 'tareas'; // el nombre de tu base de datos

// Crear la conexión con la base de datos
$conexion = new mysqli($host, $usuario_db, $password_db, $nombre_db);

// Verificar la conexión
if ($conexion->connect_error) {
  die("La conexión ha fallado: " . $conexion->connect_error);
}

?>
