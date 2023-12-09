<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar tarea</title>

  <link rel="stylesheet" type="text/css" href="../css/editarTarea.style.css">
</head>
<body>
  <?php
  include '../include/config.db.php';
  if(isset($_POST['idTarea']) && isset($_SESSION['idUsuario'])) {
    $idTarea = $_POST['idTarea'];
    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT * FROM `usuarios_tarea` WHERE `tarea` = ? AND `usuario` = ?";
    $selectStatement = $conn->prepare($sql);
    $selectStatement->bind_param('ii', $idTarea, $idUsuario);
    $selectStatement->execute() or die('Error: '.mysqli_stmt_error($selectStatement));
    $result = $selectStatement->get_result();
    if($result->num_rows > 0) {
      $sql = "SELECT * FROM tarea WHERE id = ?";
      $selectStatement = $conn->prepare($sql);
      $selectStatement->bind_param('i', $idTarea);
      $selectStatement->execute() or die('Error: '.mysqli_stmt_error($selectStatement));
      $result = $selectStatement->get_result();
      if($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
      } else {
        header("Location: contenido.php?error=algo_a_fallado_a_la_hora_de_seleccionar_la_tarea_en_tarea");
      }
    } else {
      header("Location: contenido.php?error=algo_a_fallado_a_la_hora_de_seleccionar_la_tarea_en_usuarios_tarea");
    }
  }
  if(isset($idTarea) && isset($fila)){
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h2>Edita tu tarea</h2>
    <br>
    <input type="text" name="editarTitulo" value="<?= htmlspecialchars($fila['titulo']); ?>" maxlength="20" required>
    <br>
    <textarea name="editarDescripcion" cols="30" rows="10" maxlength="200"
      required><?= htmlspecialchars($fila['descripcion']); ?></textarea>
    <br><br>
    <input type="hidden" name="idTarea" value="<?= htmlspecialchars($idTarea); ?>">
    <input type="submit" value="Editar">
    <a href="contenido.php">Cancelar</a>
  </form>
</body>
</html>
<?php 
} else {
  echo 'Que haces, no toques porque tocas...' . '<a href="contenido.php">vuelve</a>'; 
}
if(isset($selectStatement) && isset($conn)){
  $selectStatement->close();
  $conn->close();
}
?>