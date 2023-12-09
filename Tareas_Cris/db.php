<?php
$host = "db";
$dbUsername = "root";
$dbPassword = "test";
$dbName = "tareas";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
