<?php
session_start();
include("db.php");

if (isset($_POST['save_task'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Verifica si los campos están en blanco
    if (empty($titulo) || empty($descripcion)) {
        $_SESSION['mensaje'] = 'Por favor, completa todos los campos';
        header("Location: index.php");
        exit();
    }

    try {
        // Continúa con la lógica de guardar la tarea en la base de datos
        $query_insertar_tarea = "INSERT INTO tarea (titulo, descripcion) VALUES (:titulo, :descripcion)";
        $statement_insertar_tarea = $conexion->prepare($query_insertar_tarea);
        $statement_insertar_tarea->bindParam(':titulo', $titulo);
        $statement_insertar_tarea->bindParam(':descripcion', $descripcion);
        $statement_insertar_tarea->execute();

        // Obtén el ID de la tarea recién insertada
        $tarea_id = $conexion->lastInsertId();

        // Obtén el ID de usuario de la sesión
        $usuario_id = $_SESSION['usuario_id'];

        // Asocia la tarea con el usuario en la tabla usuarios_tarea
        $query_asociar_tarea = "INSERT INTO usuarios_tarea (usuario, tarea) VALUES (?, ?)";
        $statement_asociar_tarea = $conexion->prepare($query_asociar_tarea);
        $statement_asociar_tarea->execute([$usuario_id, $tarea_id]);

        $_SESSION['mensaje'] = 'Tarea guardada correctamente';
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}
?>
