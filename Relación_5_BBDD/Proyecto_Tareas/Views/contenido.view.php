<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="../Style/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>
    <div class="contenedor">
        <h1>Mis tareas</h1>
        <!-- Lista de tareas -->
        <?php foreach ($tareas as $tarea): ?>
            <div class="tarea">
                <p><strong>ID:</strong> <?php echo $tarea['id']; ?></p>
                <p><strong>Título:</strong> <?php echo $tarea['titulo']; ?></p>
                <p><strong>Descripción:</strong> <?php echo $tarea['descripcion']; ?></p>
                <!-- Aquí irían los botones o enlaces para modificar y eliminar -->
            </div>
        <?php endforeach; ?>

        <!-- Formulario para añadir nuevas tareas -->
        <form action="contenido.php" method="post">
            <input type="text" name="titulo" placeholder="Título de la tarea" required>
            <textarea name="descripcion" placeholder="Descripción de la tarea" required></textarea>
            <input type="submit" name="accion" value="Añadir">
        </form>

        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>
</html>
