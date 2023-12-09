<?php
session_start();
include("db.php");

// Verificar si se ha enviado un formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Obtener el id de la tarea a modificar
    $id = $_POST['id'];

    // Obtener los datos de la tarea
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    try {
        // Verificar si la tarea pertenece al usuario actual
        $queryVerificarUsuario = "SELECT usuario FROM usuarios_tarea WHERE tarea = :idTarea AND usuario = :idUsuarioActual";
        $statementVerificarUsuario = $conexion->prepare($queryVerificarUsuario);
        $statementVerificarUsuario->execute([':idTarea' => $id, ':idUsuarioActual' => $_SESSION['usuario_id']]);
        $resultado = $statementVerificarUsuario->fetch();

        if (!$resultado) {
            // La tarea no pertenece al usuario actual, mostrar un mensaje de error o redirigir a una página de error
            $_SESSION['mensaje'] = "No tienes permiso para modificar esta tarea";
            $_SESSION['mensaje_tipo'] = 'danger';
            header("Location: index.php");
            exit;
        }

        // Realizar la actualización en la base de datos
        $query = "UPDATE tarea SET titulo=:titulo, descripcion=:descripcion WHERE id=:id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':titulo', $titulo);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $_SESSION['mensaje'] = 'Tarea modificada correctamente';
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}

// Obtener el id de la tarea a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Verificar si la tarea pertenece al usuario actual
        $queryVerificarUsuario = "SELECT usuario FROM usuarios_tarea WHERE tarea = :idTarea AND usuario = :idUsuarioActual";
        $statementVerificarUsuario = $conexion->prepare($queryVerificarUsuario);
        $statementVerificarUsuario->execute([':idTarea' => $id, ':idUsuarioActual' => $_SESSION['usuario_id']]);
        $resultado = $statementVerificarUsuario->fetch();

        if (!$resultado) {
            // La tarea no pertenece al usuario actual, mostrar un mensaje de error o redirigir a una página de error
            $_SESSION['mensaje'] = "No tienes permiso para modificar esta tarea";
            $_SESSION['mensaje_tipo'] = 'danger';
            header("Location: index.php");
            exit;
        }

        // Obtener los datos de la tarea
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
    <title>Modificar Tarea</title>
    <link rel="stylesheet" href="estilos_task/estilo_registro.css">
</head>
<body>
<div class="container">
    <div class="col_4">
        <div class="card-body">
            <form action="edit_task.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <input type="text" name="titulo" value="<?php echo $titulo; ?>" placeholder="Actualizar título">
                </div>
                <div class="form-group">
                    <textarea name="descripcion" rows="2" placeholder="Actualizar descripción"><?php echo $descripcion; ?></textarea>
                </div>
                <input type="submit" name="update" value="Modificar" class="enviar">
            </form>
        </div>
    </div>
</div>
</body>
</html>
