<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $query = "SELECT * FROM tarea WHERE id=:id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        } else {
            // Manejar el error de la consulta
            die("Error en la consulta: No se encontró la tarea");
        }
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
} else {
    // Si no se proporciona un id, redirigir a la página de inicio
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido de Tarea</title>
    <link rel="stylesheet" href="estilos_task/estilo_registro.css">
</head>
<body>
    <div class="container">
        <div class="col_4">
            <div class="card-body">
                <h2><?php echo $titulo; ?></h2>
                <p><?php echo $descripcion; ?></p>
                <a href="index.php">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>
