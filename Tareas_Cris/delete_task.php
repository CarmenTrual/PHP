<?php
// Inicia la sesión al principio del archivo
session_start();

include("db.php");

// Verificar si la conexión a la base de datos está establecida
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID del usuario actual desde la sesión
$idUsuarioActual = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;

if (isset($_GET['id'])) {
    $idTarea = $_GET['id'];

    try {
        // Comenzar una transacción para asegurar operaciones atómicas
        $conexion->beginTransaction();

        // Verificar si la tarea pertenece al usuario actual
        $queryVerificarUsuario = "SELECT usuario FROM usuarios_tarea WHERE tarea = :idTarea AND usuario = :idUsuarioActual";
        $statementVerificarUsuario = $conexion->prepare($queryVerificarUsuario);
        $statementVerificarUsuario->execute([':idTarea' => $idTarea, ':idUsuarioActual' => $idUsuarioActual]);

        // Obtener el resultado de la consulta
        $resultado = $statementVerificarUsuario->fetch();

        if (!$idUsuarioActual || !$resultado || $resultado['usuario'] != $idUsuarioActual) {
            // La tarea no pertenece al usuario actual, mostrar un mensaje de error o redirigir a una página de error
            $_SESSION['mensaje'] = "No tienes permiso para borrar esta tarea";
            $_SESSION['mensaje_tipo'] = 'danger';
            header("Location: index.php");
            exit;
        }

        // Eliminar filas correspondientes en usuarios_tarea
        $queryDeleteUsuariosTarea = "DELETE FROM usuarios_tarea WHERE tarea = :idTarea";
        $statementDeleteUsuariosTarea = $conexion->prepare($queryDeleteUsuariosTarea);
        $statementDeleteUsuariosTarea->execute([':idTarea' => $idTarea]);

        // Después de eliminar las filas en usuarios_tarea, eliminar la tarea
        $queryDeleteTarea = "DELETE FROM tarea WHERE id = :idTarea";
        $statementDeleteTarea = $conexion->prepare($queryDeleteTarea);
        $statementDeleteTarea->execute([':idTarea' => $idTarea]);

        // Confirmar la transacción
        $conexion->commit();

        $_SESSION['mensaje'] = "Tarea borrada satisfactoriamente";
        $_SESSION['mensaje_tipo'] = 'danger';
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollBack();
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    // Redirigir si no se proporcionó un ID para borrar
    $_SESSION['mensaje'] = "No se proporcionó un ID para borrar";
    $_SESSION['mensaje_tipo'] = 'danger';
    header("Location: index.php");
    exit;
}

?>
