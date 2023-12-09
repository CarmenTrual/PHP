<?php

$host = 'db';
$usuario_db = 'root';
$password_db = 'test';
$nombre_db = 'tareas';

// Crear la conexión con la base de datos
$conexion = new mysqli($host, $usuario_db, $password_db, $nombre_db);

// Verificar la conexión
if ($conexion->connect_error) {
  die("La conexión ha fallado: " . $conexion->connect_error);
}
