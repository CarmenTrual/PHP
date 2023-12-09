<?php

$host = "db";
$dbUsername = "root";
$dbPassword = "test";
$db = "tareas";
$conn = mysqli_connect($host, $dbUsername, $dbPassword, $db);

// Verificar la conexión
if($conn->connect_error) {
  die("Error de conexión: ".$conn->connect_error);
}

?>