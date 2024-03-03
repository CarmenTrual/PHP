<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body>

  <?php
include 'estudiante.php';
include 'estudianteGraduado.php';

$estudiante1 = new EstudianteGraduado("Carmen", 20, "2º", "doctorado");
$estudiante1->agregarNota(8);
$estudiante1->agregarNota(7);
$estudiante1->agregarNota(7);

$estudiante2 = new EstudianteGraduado("Jose", 21, "3º", "posgrado");
$estudiante2->agregarNota(9);
$estudiante2->agregarNota(8);
$estudiante2->agregarNota(6);

$estudiante3 = new EstudianteGraduado("Belén", 23, "4º", "posgrado");
$estudiante3->agregarNota(9);
$estudiante3->agregarNota(9);
$estudiante3->agregarNota(10);
?>

<h2>Notas de los estudiantes</h2>

<div>
  <h3>Estudiante: <?php echo $estudiante1->getNombre(); ?></h3>
  <p>Nivel: <?php echo $estudiante1->getNivel(); ?></p>
  <p>Media: <?php echo $estudiante1->obtenerMedia(); ?></p>
</div>

<div>
  <h3>Estudiante: <?php echo $estudiante2->getNombre(); ?></h3>
  <p>Nivel: <?php echo $estudiante2->getNivel(); ?></p>
  <p>Media: <?php echo $estudiante2->obtenerMedia(); ?></p>
</div>

<div>
  <h4>Estudiante: <?php echo $estudiante3->getNombre(); ?></h4>
  <p>Media: <?php echo $estudiante3->obtenerMedia(); ?></p>
</div>

</body>

</html>




