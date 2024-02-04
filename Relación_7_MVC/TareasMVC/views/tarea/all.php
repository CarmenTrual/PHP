<?php
// VISTA PARA LA LISTA DE TAREAS

// Recuperamos la lista de tareas
$listaTareas = $data["listaTareas"];

echo "<form action='index.php' method='GET'>"; 
echo "  <input type='hidden' name='action' value='buscarTarea'>";
echo "  <input type='text' name='textoBusqueda'>";
echo "  <input type='submit' value='Buscar'>";
echo "</form><br>";

// Ahora, la tabla con los datos de las tareas
if (count($listaTareas) == 0) {
  echo "No hay datos";
} else {
  echo "<table border='1'>";
  foreach ($listaTareas as $fila) {
    echo "<tr>";
    echo "  <td>" . $fila->titulo . "</td>";
    echo "  <td>" . $fila->descripcion . "</td>";
    echo "  <td><a href='index.php?action=formularioModificarTarea&id=" . $fila->id . "'>Modificar</a></td>"; // Actualizado el enlace
    echo "  <td><a href='index.php?action=borrarTarea&id=" . $fila->id . "'>Borrar</a></td>"; // Actualizado el enlace
    echo "</tr>";
  }
  echo "</table>";
}

echo "<p><a href='index.php?action=formularioInsertarTarea'>Nuevo</a></p>";
