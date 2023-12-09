<!-- la sesión ya está abierta en contenido.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/contenido.style.css">
  <title>Tus tareas</title>

</head>

</head>

<body>
  <br>
  <div class="container">
    <div class="h2">
      <h2>Tus tareas</h2>
    </div>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"><a href="crearTarea.php"><button class="btn-add">+</button></a></th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("../include/config.db.php");
          $idUsuario = $_SESSION['idUsuario'];
          try {
            $sql = 'SELECT tarea.id, tarea.titulo, tarea.descripcion
                    FROM tarea
                    JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
                    WHERE usuarios_tarea.usuario = ?';
            $selectStatement = $conn->stmt_init();
            $selectStatement->prepare($sql);
            $selectStatement->bind_param("i", $idUsuario);
            $selectStatement->execute();
            $resultado = $selectStatement->get_result();
            foreach($resultado as $key => $value) {
              ?>
              <tr>
                <th scope="row">
                  <input type="checkbox">
                </th>
                <td>
                  <?= htmlspecialchars($value['titulo']); ?>
                </td>
                <td>
                  <?php
                  $descripcion = htmlspecialchars($value['descripcion']);
                  echo strlen($descripcion) > 100 ? substr($descripcion, 0, 100).'...' : $descripcion;
                  ?>
                </td>
                <td>
                  <form action="editarTarea.php" method="post">
                    <input type="hidden" name="idTarea" value="<?= htmlspecialchars($value['id']); ?>">
                    <button class="btn-editar">Ver/Editar</button>
                  </form>
                  <form action="borrarTarea.php" method="post">
                    <input type="hidden" name="idTarea" value="<?= htmlspecialchars($value['id']); ?>">
                    <button class="btn-eliminar">Eliminar</button>
                  </form>
                </td>
              </tr>
              <?php
            }
            $conn->close();
            $selectStatement->close();
          } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
          }
          ?>
        </tbody>
      </table>
    </div>
    <a href="cerrarSesion.php">
      <button class="btn-cerrar">Cerrar sesion</button>
    </a>
  </div>
  </form>
</body>
</html>