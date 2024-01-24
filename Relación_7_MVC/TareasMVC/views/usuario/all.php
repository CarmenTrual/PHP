<?php
// VISTA PARA LA LISTA DE PERSONAS
extract($data);
// Recuperamos la lista de Personas
$listaPersonas = $data["listaPersonas"];

echo "<form action='index.php'>
      </form><br>";

// Ahora, la tabla con los datos de los libros
/*if (count($listaPersonas) == 0) {
  echo "No hay datos";
} else {*/
  echo "<table border ='1'>";
  foreach ($listaPersonas as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->nombre . "</td>";
    echo "<td>" . $fila->apellido . "</td>";
    echo "<td><a href='index.php?action=borrarPersona&idPersona=" . $fila->idPersona . "'>Borrar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
//}
echo "<p><a href='index.php?action=formularioInsertarPersonas'>Nuevo</a></p>";