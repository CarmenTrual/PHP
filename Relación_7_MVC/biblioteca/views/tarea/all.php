<?php
// VISTA PARA LA LISTA DE LIBROS

// Recuperamos la lista de libros
$listaLibros = $data["listaLibros"];

echo "<form action='index.php'>
        <input type='hidden' name='action' value='buscarLibros'>
        <input type='text' name='textoBusqueda'>
        <input type='submit' value='Buscar'>
      </form><br>";

// Ahora, la tabla con los datos de los libros
if (count($listaLibros) == 0) {
  echo "No hay datos";
} else {
  echo "<table border ='1'>";
  foreach ($listaLibros as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->titulo . "</td>";
    echo "<td>" . $fila->genero . "</td>";
    echo "<td>" . $fila->numPaginas . "</td>";
    echo "<td>" . $fila->pais . "</td>";
    echo "<td><a href='index.php?action=formularioModificarLibro&idLibro=" . $fila->idLibro . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=borrarLibro&idLibro=" . $fila->idLibro . "'>Borrar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}
echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";