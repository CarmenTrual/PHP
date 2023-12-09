<?php
session_start();
include("db.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Si no está autenticado, redirigir al login
    header('Location: login.php');
    exit;
}

// Obtener el usuario_id de la sesión
$usuario_id = $_SESSION['usuario_id'];

// Consulta para obtener las tareas del usuario actual
$query = "SELECT tarea.id, tarea.titulo, tarea.descripcion 
FROM tarea 
INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea 
INNER JOIN usuarios ON usuarios_tarea.usuario = usuarios.id 
WHERE usuarios.id = ?";

// Preparar y ejecutar la consulta
$statement = $conexion->prepare($query);
$statement->execute([$usuario_id]);

// Obtener todas las filas de resultados como un array asociativo
$resultados_tareas = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos_task/estilos.css">
</head>

<body>
    <?php if (isset($_SESSION['mensaje'])) : ?>
        <div id="alerta" style="color: green;">
            <?php echo $_SESSION['mensaje']; ?>
        </div>

        <script>
            // Código JavaScript para ocultar la alerta después de 3 segundos
            setTimeout(function() {
                var alerta = document.getElementById('alerta');
                alerta.style.display = 'none';
            }, 3000);
        </script>

        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>

    <div class="container p-4">
        <div class="col_4">
            <div class="card-body">
                <form action="save_task.php" method="post">
                    <div class="form-group">
                        <input type="text" name="titulo" class="task" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="10" class="description" placeholder="Task Description" autofocus></textarea>
                    </div>
                    <input type="submit" class="enviar" name="save_task" value="Guardar">
                </form>
            </div>
        </div>
    </div>

    <div class="informacion">
        <?php if (empty($resultados_tareas)) : ?>
            <p>Este usuario no tiene registrada ninguna tarea.</p>
        <?php else : ?>
            <table border="2">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                <tbody>
                    <?php foreach ($resultados_tareas as $row) : ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['titulo'] ?></td>
                            <td>
                                <?php
                                // Obtén las primeras tres palabras de la descripción
                                $descripcionArray = explode(' ', $row['descripcion']);
                                $primerasTresPalabras = implode(' ', array_slice($descripcionArray, 0, 3));

                                // Imprime las primeras tres palabras seguidas de puntos suspensivos
                                echo $primerasTresPalabras;

                                // Agrega un enlace para ver el contenido completo
                                echo ' <a href="contenido_task.php?id=' . $row['id'] . '">Ver más</a>';
                                ?>
                            </td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="boton-editar">Editar</a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="boton-borrar">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        <?php endif; ?>

    </div>
    <a href="login.php">Cerrar Sesión</a>
</body>

</html>